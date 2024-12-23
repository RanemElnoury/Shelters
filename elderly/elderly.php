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
  $shelter_id= filter_var($_POST['shelter_id'], FILTER_SANITIZE_STRING); 




  $sql = "INSERT INTO elderly_join (f_name, l_name, email, ID_Number,phone,shelter_id)  VALUES(?,?,?,?,?,?)";

  
  try {
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($f_name,$l_name,$email,$ID_Number,$phone,$shelter_id));
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

?>
<link rel="stylesheet" href="css/zzzz.css">
<div class="  justify-content-center mr-auto home w-100 ">   
    <div class="container" >
        <div class="align-items-center justify-content-center">
          <h1 class="text-upper text pt-1" style="font-size:70px; text-align:center;">Hurry and join us</h1>
        </div>
    </div> 
</div>


<div class="mt-5 p-5 w-100">
<div class=" col-lg-8 div-form my-5 p-5 ">
  <h1>Join Form</h1>
 <form  method="POST" enctype="multipart/form-data">

 <?php
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        $stmt = $conn->prepare('SELECT id,name FROM elderly_shelters WHERE id=?');
        $stmt->execute(array($_GET['id']));
        $shelter_data = $stmt->fetchAll();    
?>
    <?php foreach($shelter_data as $data){ ?>
 <h3 style="text-align:center;" class="p-3"><?php echo $data['name']?></h3>
    <input type="hidden" name="shelter_id" value="<?php echo $data['id']?>">
<?php
    }
  }
    }
    ?>
  <div class="m-3">
    <label for="exampleInput" class="form-label">F-Name</label>
    <input type="text" class="form-control" id="exampleInputtext" aria-describedby="textHelp"name="f_name" required>
  </div>
  <div class="m-3">
    <label for="exampleInput" class="form-label">L-Name</label>
    <input type="text" class="form-control" id="exampleInputtext" aria-describedby="textHelp"name="l_name" required>
  </div>
  <div class="m-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"name="email" required>
    <br>
    <span id="emailHelp" class="form-text" style="font-size:10px;">We'll never share your email with anyone else.</span>
  </div>
  <div class="m-3">
    <label for="exampleInputnumber" class="form-label">ID-Number</label>
    <input type="number" class="form-control" id="exampleInputPassword1"name="ID_Number" required>
  </div>
  <div class="m-3">
    <label for="exampleInputnumber" class="form-label">Phone-Number</label>
    <input type="number" class="form-control" id="exampleInputPassword1"name="phone" required>
  </div>

  <button type="submit" class="btn btn-1 btn-primary py-3 justify-content-center align-item-center col-lg-5">Submit</button>
 </form>
</div>
</div>

<div class="mt-5 p-5 w-100 cont">
    <h2 style="font-size: 35px;font-weight: 500; color: black; text-align:center;" class="mt-5">Some Memories Of Our Gallery</h2>
    <div class="our-work text-center pt-5 pb-5">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-4 col-lg-3">
                  <img class="img-fluid" src="img/download.jpeg" alt= />
          </div>
          
          <div class="col-sm-6 col-md-4 col-lg-3">
                  <img class="img-fluid" src="img/download (1).jpeg" alt= />
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3">
                  <img class="img-fluid" src="img/download (2).jpeg" alt= />
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3">
                  <img class="img-fluid" src="img/download (3).jpeg" alt= />
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3">
                  <img class="img-fluid" src="img/download (4).jpeg" alt= />
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3">
                  <img class="img-fluid" src="img/download.jpeg" alt= />
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3">
                  <img class="img-fluid" src="img/download (1).jpeg" alt= />
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3">
                  <img class="img-fluid" src="img/download (2).jpeg" alt= />
          </div>
        </div>
      </div>
</div>
 
</div>
<?php
}else{
  header('location:../login.php');
}
?>