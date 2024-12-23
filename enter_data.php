<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Place</title>
</head>
<body>
    <h1>Add kids</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br><br>
        <label for="Shelter_name">Shelter name:</label><br>
        <input type="text" id="Shelter_name" name="Shelter_name"><br><br>
        <label for="age">Age:</label><br>
        <input type="number" id="age" name="age"><br><br>
        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address"><br><br>
        <label for="img">Image:</label><br>
        <input type="file" id="img" name="img"><br><br>
        <input type="submit" value="Submit">
    </form>

    <?php
    include_once("db.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // استقبال البيانات من النموذج
        $name = $_POST['name'];
        $Shelter_name = $_POST['Shelter_name'];
        $address = $_POST['address'];
        $age = $_POST['age'];
        $image = $_FILES['img']['name'];
        $image_temp = $_FILES['img']['tmp_name'];

        // تحديد مسار الحفظ للصورة
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image);

        // نقل الصورة المؤقتة إلى المسار المحدد
        move_uploaded_file($image_temp, $target_file);

        // استعداد الاستعلام لإدخال البيانات في قاعدة البيانات
        $sql = "INSERT INTO kids_data (name, Shelter_name, address,age, img) VALUES ('$name', '$Shelter_name', '$address','$age', '$image')";
        if ($conn->query($sql) === TRUE) {
            echo "Message sent successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
</body>
</html>
