<?php
session_start();
if(isset($_SESSION['username'])){
include_once("header.php");
include_once("../dbPDO.php");
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST") {
  $money = filter_var($_POST['money'], FILTER_SANITIZE_STRING);
  $creditnum = filter_var($_POST['creditnum'], FILTER_SANITIZE_EMAIL);
  $password= filter_var($_POST['password'], FILTER_SANITIZE_STRING);
  $phone= filter_var($_POST['phone'], FILTER_SANITIZE_STRING); 
  $shelter_id= filter_var($_POST['shelter_id'], FILTER_SANITIZE_STRING); 




  $sql = "INSERT INTO elderly_donation (money, creditnum, password,phone,shelter_id)  VALUES(?,?,?,?,?)";

  
  try {
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($money,$creditnum,$password,$phone,$shelter_id));
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
<link rel="stylesheet" href="css/donation-form.css">


<!-- The video -->
<video autoplay muted loop id="myVideo">
  <source src="img/video (2160p) (1).mp4" type="video/mp4">
</video>

<!-- Optional: some overlay text to describe the video -->
<div class="content">
 <form class=" col-lg-8 position-absolute top-50 start-50 translate-middle" method="POST">
 <h1 style="text-align:center;">Donation Form</h1>
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

    <label for="exampleInputnumber" class="form-label">How Much Money</label>
    <input type="number" name="money" class="form-control" id="exampleInputPassword1" placeholder="Enter how much money for adoption" required="">
  </div>
  <div class="m-3">
    <label for="exampleInputnumber" class="form-label">Credit Card Number</label>
    <input type="number" name="creditnum" class="form-control" id="exampleInputPassword1"placeholder="Enter your credit card number" required="">
  </div>
  <div class="m-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="text" name="password"  placeholder="Enter your credit card password" class="form-control" id="exampleInputPassword1" required="">
  </div>
  <div class="m-3">
    <label for="exampleInputnumber" class="form-label">Phone-Number</label>
    <input type="number" name="phone" class="form-control" id="exampleInputPassword1"  placeholder="Enter your Phone-Number" required="">
  </div>
  <?php


?>  
  <div class="justify-content-center flex-row d-flex">
      <button type="submit" class="btn s-btn btn-light py-2 px-5 text-uppercase justify-content-center my-3" style="align-item:center;">Donate For Ous</button>

    </div>
</form>
</div>
<?php
}else{
  header('location:../login.php');
}
?>