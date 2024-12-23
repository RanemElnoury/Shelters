<?php
session_start();
if(isset($_SESSION['username'])){
include_once("header.php");
include_once("../dbPDO.php");

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        $stmt = $conn->prepare('SELECT * FROM animals_shelters WHERE id=?');
        $stmt->execute(array($_GET['id']));
        $shelter_data = $stmt->fetchAll();



?> 
   
<link rel="stylesheet" href="css/ned.css">


<div class="col-lg-4 div-s position-absolute top-50 start-50 translate-middle">
<?php foreach($shelter_data as $data){ ?>
  <img src="uploads/<?php echo $data['img']?>"alt="gallery-images"class="w-100" style="  max-width: none;  height: 250px;">

<div class="item container">
<h2 style="text-align:center;"class="my-4"><?php echo $data['name']?></h2>
 <p class="desc my-4"style="text-align:center;color: #707b8e;font-size: 15px; font-weight: 300;"><?php echo $data['description']?></p>
 <h6 style="text-align:center;"class="my-4"><?php echo $data['address']?></h6>
 <p class="desc my-4"style="text-align:center;color: #707b8e;font-size: 15px; font-weight: 300;"><?php echo $data['needs']?></p>


 <div class="justify-content-center flex-row d-flex">
 <a href="donation-form.php?id=<?php echo $data['id']?>"  class="btn  btn-light py-2 px-5 text-uppercase justify-content-center my-3" style="align-item:center;">Donate For Ous</a>
 </div>
 <div class="justify-content-center flex-row d-flex">
   <a href="pets.php?id=<?php echo $data['id']?>"  class="btn btn-light py-2 px-5 text-uppercase justify-content-center mb-3" style="align-item:center;">want to see our pets ?!</a>
 </div>
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