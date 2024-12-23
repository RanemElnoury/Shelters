from flask import Flask, request, jsonify
from flask_cors import CORS
from PIL import Image
import numpy as np
import base64
from io import BytesIO
import os
import cv2
import tensorflow as tf
import face_recognition

# Enable memory growth for GPU
physical_devices = tf.config.list_physical_devices('GPU')
if len(physical_devices) > 0:
    tf.config.experimental.set_memory_growth(physical_devices[0], True)

app = Flask(__name__)
CORS(app)  # Enable CORS for the Flask application

def align_face(image_array, box):
    x, y, width, height = box
    x, y = max(0, x), max(0, y)  # Ensure coordinates are within bounds
    face = image_array[y:y+height, x:x+width]
    return face

def preprocess_image(image_array):
    gray = cv2.cvtColor(image_array, cv2.COLOR_BGR2GRAY)
    clahe = cv2.createCLAHE(clipLimit=2.0, tileGridSize=(8, 8))
    gray = clahe.apply(gray)
    image_array = cv2.cvtColor(gray, cv2.COLOR_GRAY2BGR)
    return image_array


@app.route('/webcompare', methods=['POST'])
def upload_file():
    try:
        print("Received POST request at /webcompare")
        
        file = request.files.get('image')
        if not file:
            print("No image file provided")
            return jsonify({"error": "No image file provided"}), 400

        print("Image file received, processing...")
        
        image = Image.open(file.stream)
        image_array = np.array(image)
        image_array = preprocess_image(image_array)
        
        results = face_recognition.face_locations(image_array)
        if not results:
            print("No face detected in the uploaded image")
            return jsonify({"error": "No face detected in the uploaded image"}), 400

        ages = []
        reference_encodings = []
        for result in results:
            top, right, bottom, left = result
            box = (left, top, right - left, bottom - top)
            aligned_face = align_face(image_array, box)
            aligned_face_rgb = cv2.cvtColor(aligned_face, cv2.COLOR_BGR2RGB)
            encodings = face_recognition.face_encodings(aligned_face_rgb)
            if encodings:
                reference_encodings.append(encodings[0])

                age_model = cv2.dnn.readNetFromCaffe("age_deploy.prototxt", "age_net.caffemodel")
                blob = cv2.dnn.blobFromImage(aligned_face_rgb, 1.0, (227, 227), (104, 117, 123), swapRB=False)
                age_model.setInput(blob)
                predictions = age_model.forward()
                age = int(predictions[0].dot(range(8)))
                ages.append(age)

        print(f"Ages of detected faces: {ages}")
        
        if not reference_encodings:
            print("No face encoding found in the uploaded image")
            return jsonify({"error": "No face encoding found in the uploaded image"}), 400

        folder_dir = os.path.join(os.getcwd(), "photos")
        matched_images = []
        thresholds = []

        if os.path.exists(folder_dir) and os.listdir(folder_dir):
            for image_name in os.listdir(folder_dir):
                if image_name.endswith((".png", ".jpg", ".jpeg")):
                    full_image_path = os.path.join(folder_dir, image_name)
                    target_image = face_recognition.load_image_file(full_image_path)
                    face_locations = face_recognition.face_locations(image, model="cnn")
                    target_image_array = cv2.cvtColor(target_image, cv2.COLOR_RGB2BGR)
                    target_image_array = preprocess_image(target_image_array)

                    target_results = face_recognition.face_locations(target_image_array)
                    for target_result in target_results:
                        top, right, bottom, left = target_result
                        box = (left, top, right - left, bottom - top)
                        target_aligned_face = align_face(target_image_array, box)
                        target_aligned_face_rgb = cv2.cvtColor(target_aligned_face, cv2.COLOR_BGR2RGB)
                        target_encodings = face_recognition.face_encodings(target_aligned_face_rgb)
                        for target_encoding in target_encodings:
                            for reference_encoding in reference_encodings:
                                distance = face_recognition.face_distance([reference_encoding], target_encoding)[0]
                                thresholds.append((distance, full_image_path))

            if thresholds:
                thresholds.sort(key=lambda x: x[0])
                matched_images = [image_path for distance, image_path in thresholds if distance <= 0.46]

        print(f"Matched images: {matched_images}")
        return jsonify({"ages": ages, "matched_images": matched_images})

    except Exception as e:
        print(f"Error: {e}")
        return jsonify({"error": str(e)}), 500

if __name__ == '__main__':
    app.run(host='127.0.0.1', port=5000)
