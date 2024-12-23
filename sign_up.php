<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="sign.css">
  </head>
  <body>
      <div id="form">
            <h1 id="heading">SignUp</h1><br>
            <?php
include_once("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $phone = $_POST['phone'];
    
    $userimage_name = $_FILES['userimage']['name'];
    $userimage_tmp = $_FILES['userimage']['tmp_name'];
    
    // تحديد المسار الكامل للصورة
    $userimage_destination =  $username . ".png"; // هنا نستخدم اسم المستخدم كاسم للصورة مع الإضافة ".png"
   
    if ($password == $cpassword) {
        // تعديل الاستعلام ليشمل المسار الكامل للصورة
        $sql = "INSERT INTO signup (Username, Email, Password, UserImage, phone) 
                VALUES ('$username', '$email', MD5('$password'), '$userimage_destination', '$phone')";
        
        // التأكد من وجود مجلد الرفع
        if (!file_exists('uploads')) {
            mkdir('uploads', 0777, true);
        }

        // رفع الصورة إلى المجلد المحدد
        if (move_uploaded_file($userimage_tmp, $userimage_destination)) {
            // إدخال البيانات إلى قاعدة البيانات
            if ($conn->query($sql) === TRUE) {
                header("Location: login.php");
                exit(); 
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error uploading image";
        }
    } else {
        echo "Password does not match";
    }
}
?>

            <form method="POST" enctype="multipart/form-data">
    <i class="fa fa-user fa-lg"></i>
    <input type="text" id="user" name="username" placeholder="Enter Username" required></br></br>
    <i class="fa-solid fa-envelope fa-lg"></i>
    <input type="email" id="email" name="email" placeholder="Enter Email" required></br></br>
    <i class="fa-solid fa-lock fa-lg"></i>
    <input type="password" id="pass" name="password" placeholder="Create Password" required></br></br>
    <i class="fa-solid fa-lock fa-lg"></i>
    <input type="password" id="cpass" name="cpassword" placeholder="Retype Password" required></br></br>
    <i class="fa-solid fa-mobile-alt fa-lg"></i>
    <input type="tel" id="phone" name="phone" placeholder="Enter Phone Number" required></br></br>

    <!-- إضافة عنصر الرفع للصورة -->
    <input type="file" id="userimage" name="userimage" accept="image/*" required></br></br>
    
    <input type="submit" id="btn" value="SignUp" name="submit"/>
</form>

      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>