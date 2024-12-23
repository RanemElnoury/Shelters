<?php
include_once("db.php");

if (isset($_GET['imagePath'])) {
    $absoluteImagePath = $_GET['imagePath'];
    $relativeImagePath = basename($absoluteImagePath);

    // استعلام لاسترجاع البيانات بناءً على المسار الذي تم تمريره
    $stmt = $conn->prepare("
        SELECT k.name AS kid_name, k.age, s.name, s.address
        FROM kids_data k
        INNER JOIN orphan_shelters s ON k.shelter_id = s.id
        WHERE k.img = ?
    ");

    // التحقق من نجاح عملية تحضير الاستعلام
    if ($stmt) {
        $stmt->bind_param("s", $relativeImagePath);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // عرض البيانات
            while ($row = $result->fetch_assoc()) {
                echo "Name: " . $row["kid_name"] . "<br>";
                echo "Age: " . $row["age"] . "<br>";
                echo "Shelter Name: " . $row["name"] . "<br>";
                echo "Address: " . $row["address"] . "<br>";
                // يمكنك عرض الصورة هنا أيضًا إذا كانت مخزنة في قاعدة البيانات
            }
        } else {
            echo "No Data Found";
        }

        $stmt->close();
    } else {
        echo "Failed to prepare statement: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Image path not provided.";
}
?>
