<?php
session_start();
if(isset($_SESSION['username'])){
include_once("header.php");
include_once("../dbPDO.php");

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        $stmt = $conn->prepare('SELECT id,name,needs FROM elderly_shelters WHERE id=?');
        $stmt->execute(array($_GET['id']));
        $shelter_data = $stmt->fetchAll();



?> 
   
<link rel="stylesheet" href="css/needdss.css">


<div class="col-lg-4 div-form position-absolute top-50 start-50 translate-middle">
<?php foreach($shelter_data as $data){ ?>
<div class="card text-center">
  <div class="card-header div-form" style="color:#ffff;">
    OUR NEEDS
  </div>
  <div class="card-body">
    <h2 class="card-title py-4"><?php echo $data['name']?></h2>
    <h6 class="card-text"><?php echo $data['needs']?></h6>
  </div>

  <div class="card-footer text-body-secondary div-form">
  <a class="btn btn-1 btn-primary w-50 h-100" href="donation-form.php?id=<?php echo $data['id']?>">Donate</a>
  </div>
  <?php
}
?>
</div>
</div>

<?php
    }
}

}
else{
  header('location:../login.php');
}
?>