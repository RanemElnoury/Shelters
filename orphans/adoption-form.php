<?php
session_start();
if(isset($_SESSION['username'])){
include_once("header.php");
include_once("../dbPDO.php");
include_once("../toastr_headers.php");
?>
<link rel="stylesheet" href="css/adoption-form.css">
<?php
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST") {
  $f_name = filter_var($_POST['f_name'], FILTER_SANITIZE_STRING);
  $l_name = filter_var($_POST['l_name'], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $ID_Number= filter_var($_POST['ID_Number'], FILTER_SANITIZE_STRING);
  $phone= filter_var($_POST['phone'], FILTER_SANITIZE_STRING); 
  $kid_id= filter_var($_POST['kid_id'], FILTER_SANITIZE_STRING); 


  $personal_image_name = $_FILES["userimage"]["name"];
  $personal_image_size = $_FILES["userimage"]["size"];
  $personal_image_tmp_name = $_FILES["userimage"]["tmp_name"];
  $personal_image_type = $_FILES["userimage"]["type"];
  $extention_allowed = array("png","jpg","jpeg","webp");  
  
  
 @$personal_image_extention  = strtolower(end(explode(".",$personal_image_name)));
 if(in_array($personal_image_extention,$extention_allowed)){
  $final_personal_image_name = $_POST['f_name'] . "_" . rand(0,1000) . "." . $personal_image_extention;
  $personal_image_destination = "uploads/" . $final_personal_image_name;
  
  move_uploaded_file( $personal_image_tmp_name , $personal_image_destination);



  $sql = "INSERT INTO orphans_adopt (f_name, l_name, email, ID_Number,phone,userimage,kid_id)  VALUES(?,?,?,?,?,?,?)";

  
  try {
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($f_name,$l_name,$email,$ID_Number,$phone,$final_personal_image_name,$kid_id));
    ?>
    <script>
        toastr.success('Added successfully');
    </script>
    <?php
     }
      catch(PDOException $e) {
        // Handle errors gracefully
        echo "Error: " . $e->getMessage();
        return false;
    }
}
}
?>
<div class="col-lg-4 div-form position-absolute top-50 end-0 translate-middle-y">
 <form class="card w-100" method="POST" enctype="multipart/form-data">
  <div class="justify-content-center flex-row d-flex mt-5">
   <img src="uploads/OIP (5).jpeg" id="profile-pic">
  </div>

  <div class="m-3">
    <label for="exampleInput" class="form-label">F-Name</label>
    <input type="text" class="col-auto" id="exampleInputtext" aria-describedby="textHelp"name="f_name" required>
  </div>
  <div class="m-3">
    <label for="exampleInput" class="form-label">L-Name</label>
    <input type="text" class="col-auto" id="exampleInputtext" aria-describedby="textHelp"name="l_name"required>
  </div>
  <div class="m-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="col-auto" id="exampleInputEmail1" aria-describedby="emailHelp" name="email"required>
    <br>
    <span id="emailHelp" class="form-text" style="font-size:10px;">We'll never share your email with anyone else.</span>
  </div>

  <div class="m-3">
    <label for="exampleInputnumber" class="form-label">ID-Number</label>
    <input type="number" class="col-auto" id="exampleInputPassword1" name="ID_Number"required>
  </div>
  <div class="m-3">
    <label for="exampleInputnumber" class="form-label">Phone-Number</label>
    <input type="number" class="col-auto" id="exampleInputPassword1" name="phone"required>
  </div>
  <div class="m-3">

        <label for="input-file" id="label-photo" class="w-25 p-2">Upload Photo</label>
        <input type="file" name="userimage" accept="image/*" id="input-file" required>
  </div>
  <?php
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        $stmt = $conn->prepare('SELECT id FROM kids_data WHERE id=?');
        $stmt->execute(array($_GET['id']));
        $kids_data = $stmt->fetchAll();    
?>
    <?php foreach($kids_data as $data){ ?>
    <input type="hidden" name="kid_id" value="<?php echo $data['id']?>">
<?php
    }
  }
    }
    ?>

  <button type="submit" class="btn btn-1 btn-primary py-3">Submit</button>
 </form>
</div>



<script>
    let profilePic = document.getElementById("profile-pic");
    let inputFile = document.getElementById("input-file");
    

    inputFile.onchange = function(){
        profilePic.src =    URL.createObjectURL(inputFile.files[0]);
    }

</script>
<?php
}else{
  header('location:../login.php');
}
?>