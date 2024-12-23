<?php
session_start();
if(isset($_SESSION['username'])){
include_once("header.php");
include_once("../dbPDO.php");
include_once("../toastr_headers.php");
?>
<link rel="stylesheet" href="css/shelters.css">
<?php
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST") {
  $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
  $age = filter_var($_POST['age'], FILTER_SANITIZE_STRING);
  $shelter_id = filter_var($_POST['shelter_id'], FILTER_SANITIZE_STRING);

 


  $personal_image_name = $_FILES["img"]["name"];
  $personal_image_size = $_FILES["img"]["size"];
  $personal_image_tmp_name = $_FILES["img"]["tmp_name"];
  $personal_image_type = $_FILES["img"]["type"];
  $extention_allowed = array("png","jpg","jpeg","webp");  
  
  
 @$personal_image_extention  = strtolower(end(explode(".",$personal_image_name)));
 if(in_array($personal_image_extention,$extention_allowed)){
  $final_personal_image_name = $_POST['name'] . "_" . rand(0,1000) . "." . $personal_image_extention;
  $personal_image_destination = "img/" . $final_personal_image_name;
  
  move_uploaded_file( $personal_image_tmp_name , $personal_image_destination);



  $sql = "INSERT INTO animals_data (name,age,img,shelter_id)  VALUES(?,?,?,?)";

  
  try {
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($name,$age,$final_personal_image_name,$shelter_id));
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
<div class="col-lg-4 div-form position-absolute top-50 start-50 translate-middle">
 <form class="card w-100"form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">

  <div class="m-3">
    <label for="exampleInput" class="form-label">Name</label>
    <input type="text" class="col-auto" id="exampleInputtext" aria-describedby="textHelp"name="name" required>
  </div>
  <div class="m-3">
    <label for="exampleInput" class="form-label">age</label>
    <input type="text" class="col-auto" id="exampleInputtext" aria-describedby="textHelp"name="age" required>
  </div>
  <div class="m-3">

        <input type="file" name="img" accept="image/*" id="input-file" required>
  </div>
  <div class="m-3">
  <select  name="shelter_id" class="form-control" aria-label="Default select example" required>
                                        
    <?php
        $stmt = $conn->prepare("SELECT * FROM animals_shelters");
        $stmt->execute();
        $shelters = $stmt->fetchAll();
        foreach($shelters as $shelter)
        {
            echo "<option value = '".$shelter['id']."' selected>";
            echo ($shelter['name']);
            echo "</option>";
                                                    
        }
      ?>
  </select>
  </div>
  <div class="m-3">

  <button type="submit" class="btn btn-1 btn-primary py-3">Submit</button>
  </div>

 </form>
</div>

<?php
}else{
  header('location:../login.php');
}
?>