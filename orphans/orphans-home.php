<?php
session_start();
if(isset($_SESSION['username'])){
include_once("header.php");
include_once("../dbPDO.php");


  $stmt = $conn->prepare("SELECT * FROM orphan_shelters");
  $stmt->execute();
  $shelter_data = $stmt->fetchAll();

?>
    
    
    <div class=" align-items-center justify-content-center mr-auto home w-100">   
       <div class="container h-100" >
        <div class=" col-lg-8 column align-items-center justify-content-center vertical-center">
          <h1 class="text-upper mt-1" style="font-size:70px;">ADOPT US. <br>
            WE NEED YOUR HELP.
          </h1>
          <p class="p-home my-3">Help Ous Find A New Home For A Child</p>
          <!-- <button type="button" class="btn btn-light py-2 px-4">FIND A child TO ADOPT</button> -->
        </div>
       </div> 
    </div>



<div class="mt-5 p-5 w-100 ">
<div class="container my-5">
<h1 style="font-size: 55px;font-weight: 550; color: black; text-align:center;" class="my-5">Our Shelters</h1>
 <div class="owl-carousel owl-theme">

 <?php foreach($shelter_data as $data){ ?>

<div class="item container div-s">
<img src="uploads/<?php echo $data['img']?>"alt="gallery-images"class="w-100" style="  max-width: none;  height: 250px;">
 <h2 style="text-align:center;"class="my-4"><?php echo $data['name']?></h2>

 <div class="justify-content-center flex-row d-flex">
 <a href="shelters.php?id=<?php echo $data['id']?>"  class="btn s-btn btn-light py-2 px-5 text-uppercase justify-content-center my-3" style="align-item:center;">See More</a>
 </div>
</div>
<?php
}
?>

 
   
  </div>
</div>
</div>


<div class="mt-5 p-5 w-100 cont">
  <div class="container">
    <h2 style="font-size: 35px;font-weight: 500; color: black; text-align:center;" class="mt-5">Process to adopt a child</h2>
    <p style="color: #707b8e;font-size: 15px; font-weight: 300;text-align:center;">The process to adopt a child can vary depending on the specific policies and procedures of the orphan shelter or rescue organization. However, <br> here is a general overview of the typical steps involved in adopting a child</p>
  </div>
   <div class="container mt-5">
    <div class="row d-flex">
      <div class="col-lg-3 col-md-6">
      <a href="" class="divs">
        <i class=" fa-regular fa-thumbs-up icons"></i>
        <h4 style="font-size:20px; color: black;" class="mt-5">child selection</h4>
        <p style="color: #707b8e;font-size: 15px; font-weight: 300;">select your lucky child</p>
      </a>
      </div>

      <div class="col-lg-3 col-md-6">
      <a href=""class="divs">
        <i class=" icons fa-regular fa-user"></i>
        <h4 style="font-size:20px; color: black;" class="mt-5">Meeting Authority</h4>
        <p style="color: #707b8e;font-size: 15px; font-weight: 300;"> This meeting serves as an opportunity for the adopter to interact with shelter staff or volunteers, discuss their preferences and requirements for a child, and potentially meet specific animals available for adoption</p>
      </a>  
    </div>

      <div class="col-lg-3 col-md-6">
      <a href=""class="divs">
        <i class="fa-regular fa-rectangle-list icons"></i>
        <h4 style="font-size:20px; color: black;" class="mt-5">Adoption Form Filling</h4>
        <p style="color: #707b8e;font-size: 15px; font-weight: 300;">This form serves as a way for the adopter to provide important information about themselves and their living situation, as well as to demonstrate their commitment to responsible child ownership. Here's an overview of what typically happens during the adoption form filling process</p>
      </a>
      </div>

      <div class="col-lg-3 col-md-6">
      <a href=""class="divs">
        <i class="fa-solid fa-wand-magic-sparkles icons"></i>
        <h4 style="font-size:20px; color: black;" class="mt-5">Bring to new family</h4>
        <p style="color: #707b8e;font-size: 15px; font-weight: 300;">Bringing a new child into a family through adoption involves several steps to ensure a smooth transition and successful integration into their new home.</p>
      </a>
      </div>
    </div>
   </div>
</div>

<!-- <div class="mt-5 w-100 header-pic mr-auto">
  <div class="w-100 header-layer overlay overlay-bg">
    <div class="container mt-5 p-5">
      <div class="container mt-5 p-5">
      <h1 style="font-size: 40px;font-weight: 600; color: #ffff; text-align:center;" class="mb-3 mt-2">Want to help? Become a Volunteer</h1>
      <p class="p-home my-3" style="text-align:center;">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus, sapiente! Lorem ipsum dolor,
         Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, praesentium? sit amet consectetur adipisicing elit. Reprehenderit, animi!</p>
     <div class="justify-content-center flex-row d-flex">
       <a href=""class="btn btn-light py-2 px-5 text-uppercase justify-content-center my-3">Register now</a>
     </div>
      </div>
   </div>
  </div>
</div> -->





 <script>
  

$('.owl-carousel').owlCarousel({
   autoPlay: true,  
   autoplayTimeout:1000,
   loop:true,
    margin:10,
    nav:true,
    dots:true,
    // stagePadding:50,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
})

 </script> 
 <?php
 include_once("footer.php");
 ?> 
<link rel="stylesheet" href="css/sama.css" />
 
</body>
</html>
<?php
}else{
  header('location:../login.php');
}
?>