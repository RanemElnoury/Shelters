<?php
session_start();
if(isset($_SESSION['username'])){
include_once("header.php");
include_once("../dbPDO.php");

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'GET') {
  if (isset($_GET['id'])) {
      $stmt = $conn->prepare('SELECT * FROM animals_data WHERE shelter_id=?');
      $stmt->execute(array($_GET['id']));
      $animals_data = $stmt->fetchAll();



?> 
<link rel="stylesheet" href="css/pets.css">
<div class=" align-items-center justify-content-center mr-auto home w-100 ">   
    <div class="container" >
        <div class=" col-lg-8 column align-items-center justify-content-center vertical-center">
          <h1 class="text-upper mt-1" style="font-size:70px;">ADOPT US</h1>
        </div>
    </div> 
</div>



    <div class="our-work text-center mt-5">
      <div class="container">
      <div class="row d-flex">
      <?php foreach($animals_data as $data){ ?>


      <div class=" col-lg-3 col-md-6">

      <a href="adoption-form.php?id=<?php echo $data['id']?>" data-lightbox="example-set">
        <div class="box mb-3 bg-white" data-work=" <?php echo $data['name']?> <?php echo"\n" ?>Age: <?php echo $data['age']?>">

					<img src="img/<?php echo $data['img']?>" alt="gallery-images" style="  max-width: none;  height: 300px; width: 300px;">
         </div>
				</a>
        </div>
        <?php
}
?>
       
       
        
			</div>
      </div>
      </div>


    

    <?php
  }
}
}else{
  header('location:../login.php');
}
?>