<!DOCTYPE html>
<html>
<head>
	<title>education</title>
	<meta name="viewport" content="width=device-width">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/all.css">
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/lightbox.css">
	<link rel="stylesheet" type="text/css" href="css/flexslider.css">
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="css/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.rateyo.css"/>
	<!-- <link rel="stylesheet" type="text/css" href="css/jquery.mmenu.all.css" /> -->
	<!-- <link rel="stylesheet" type="text/css" href="css/meanmenu.min.css"> -->
	<link rel="stylesheet" type="text/css" href="inner-page-style.css">
	<link rel="stylesheet" type="text/css" href="style.css">



	<link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500&display=swap" rel="stylesheet" />
</head>
<body>
	<div id="page" class="site" itemscope itemtype="http://schema.org/LocalBusiness">
		<header class="site-header">
			<div class="top-header">
				<div class="container">
					<div class="top-header-left">
						<div class="login-block">
							<a style="margin-top: 4%;" href="login.php">logout</a>
						</div>
						
					</div>
					<div class="top-header-right">
						
					 <a style="margin-top: 4%; margin-left:-5%; margin-right:5%; "; itemprop="Usernamef "><i class="fas fa-user"></i> Ranem Elnoury</a>
					 	<img class ="userimage"style="border-radius: 50%; "src="images/ranem.jpg.jpg" width="35px " height="35px">
					</div>
				</div>
			</div>
			<!-- Top header Close -->
			<div class="main-header">
				<div class="container">
					<div class="nav-wrap" style="margin-left: 22%;">
						<nav class="nav-desktop">
							<ul class="menu-list">
								<li><a href="index.php">Home</a></li>
								<li  class="menu-parent"><a href="#shelter">Shelters
									<ul class="sub-menu">
										<a href="orphanages.php"><li>Orphanages</li></a>
										<a href="elderly.php"><li>Elderly</li></a>
										<a href="animals.php"><li>Animals</li></a>
									</ul>
								</li>
								<li><a href="#search">Search</a></li>
								<li><a href="#gallery">Gallery</a></li>
								<li><a href="#contact">Contact</a></li>
							</ul>
						</nav>
						<div id="bar">
							<i class="fas fa-bars"></i>
						</div>
						<div id="close">
							<i class="fas fa-times"></i>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- Header Close -->
		<div class="banner">
			<div class="owl-four owl-carousel" itemprop="image">
				<img src="images/r.jpg" alt="Image of Bannner">
				<img src="images/a.webp" alt="Image of Bannner">
				<img src="images/e.jpg" alt="Image of Bannner">
			</div>
			<div class="container" itemprop="description">
				<!-- <h1>welcome to shelters</h1>
				<h3>With our advance search feature you can now find the trips for you...</h3> -->
			</div>
			 <div id="owl-four-nav" class="owl-nav"></div>
		</div>

		<div>  </div>
		

		<div class="page-heading">
			<div  id="shelter" class="container">
				<h2>Shelters</h2>
			</div>
		</div>
		<!-- Popular courses End -->
		<div class="learn-courses">
			<div class="container">
				<div class="courses">
					<div class="owl-one owl-carousel">
						<div class="box-wrap" itemprop="event" itemscope itemtype=" http://schema.org/Course">
							<div class="img-wrap" itemprop="image"><img style="height: 250px;" src="images/c.jpg" alt="courses picture"></div>
								<a href="orphanages.php" class="learn-desining-banner" itemprop="name">orphanages</a>
							<div style="height: 100px;"  class="box-body" itemprop="description">
							</div>
						</div>

						<div class="box-wrap"  itemprop="event" itemscope itemtype=" http://schema.org/Course">
							<div class="img-wrap"  itemprop="image"><img style="height: 250px;"   src="images/b.jpg" alt="courses picture"></div>
								<a href="elderly.php" class="learn-desining-banner" itemprop="name">elderly home</a>
							<div style="height: 100px;"  class="box-body" itemprop="description">
							</div>
		               </div>

						<div class="box-wrap" itemprop="event" itemscope itemtype=" http://schema.org/Course">
							<div class="img-wrap"  itemprop="image"><img style="height: 250px;"  src="images/a.png" alt="courses picture"></div>
								<a href="animals.php" class="learn-desining-banner" itemprop="name">animal shelters</a>
							<div style="height: 100px;" class="box-body" itemprop="description">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Learn courses End -->
		<section class="whyUs-section" style="background-color: white;  margin-top:2%;"></section>

		<section class="page-heading">
			<div id="search" class="container">
				<h2>Search</h2>
			</div>
<div  style=" background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    text-align: center;">
    <input type="file" id="fileUpload" accept="image/*">
    <div style="width:100%; height:500px; margin-top: 15px;  display: flex;
    justify-content: center;
    align-items: center; "><img style="width:40%; height:100%; margin-top: 20px; align-items: center; " id="preview" >
</div>
 <button style="background-color:#57b846;;  width:25% ; margin-left: 10px;padding: 1.4rem;
    text-align: center;
    text-transform: uppercase;
    font-weight: bold;
    border-radius: 5px; color:white; margin-top:20px;">Search </button>
   
</div>

<script >function uploadFile() {
    const fileInput = document.getElementById('fileUpload');
    const file = fileInput.files[0];

    if (file) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            const preview = document.getElementById('preview');
            preview.src = e.target.result;
            preview.style.display = 'block';
        };

        reader.readAsDataURL(file);
    }
}

// Optional: Automatically show the image preview when the file is selected
document.getElementById('fileUpload').addEventListener('change', uploadFile);
</script> 
		</section>

		<section class="whyUs-section" style="background-color: white; "></section>
		<!-- Closed WhyUs section -->
		<section class="page-heading">
			<div id="gallery" class="container">
				<h2>gallery</h2>
			</div>
		</section>
		<section class="gallery-images-section" itemprop="image" itemscope itemtype=" http://schema.org/ImageGallery">
			<div class="gallery-img-wrap">
				<a href="images/t.jpg"  data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/t.jpg" alt="gallery-images" style="    height: 200px; width: 341px;">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/c.webp" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/c.webp" alt="gallery-images">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/l.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/l.jpg" alt="gallery-images" style="    height: 200px; width: 341px;">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/p.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/p.jpg" alt="gallery-images" style="    height: 200px; width: 341px;">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/s.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/s.jpg" alt="gallery-images" style="    height: 200px; width: 341px;">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/w.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/w.jpg" alt="gallery-images" style="    height: 200px; width: 341px;">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/x.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/x.jpg" alt="gallery-images" style="    height: 200px; width: 341px;">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/h.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/h.jpg" alt="gallery-images" style="    height: 200px; width: 341px;">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/o.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/o.jpg" alt="gallery-images" style="    height: 200px; width: 341px;">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/j.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/j.jpg" alt="gallery-images" style="    height: 200px; width: 341px;">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/z.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/z.jpg" alt="gallery-images"style="    height: 200px; width: 341px;">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/b.webp" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/b.webp" alt="gallery-images" style="    height: 200px; width: 341px;">
				</a>
			</div>
		</section>
	
		<section class="whyUs-section" style="background-color: white;  margin-top:5%;">
		</section>
	
		<!-- End of Query Section -->
		<footer style="background-color:#57b846;" class="page-footer" itemprop="footer" itemscope itemtype="http://schema.org/WPFooter">
			<div class="footer-first-section">
				<div id="contact" class="container">
					<div class="box-wrap" itemprop="about">
						<header>
							<h1>about</h1>
						</header>
						<p>This website is a great way to know address and needs to any shelter.And helping to find missing people or animals</p>

						<h4><a href="tel:+201020206038"><i class="fas fa-phone"></i> +201020206038</a></h4>
						<h4><a href="mailto:Ranem.elnoury2003@gmail.com<"><i class="fas fa-envelope"></i> Ranem.elnoury2003@gmail.com</a></h4>
					</div>

					<div class="box-wrap">
						<header>
							<h1>quick contact</h1>
						</header>
						<section class="quick-contact">
							<input style="background-color:whitesmoke;" type="email" name="email" placeholder="Your Email*">
							<textarea style="background-color:whitesmoke;" placeholder="Type your message*"></textarea>
							<button>send message</button>
						</section>
					</div>

				</div>
			</div>
			<!-- End of box-Wrap -->
			<div class="footer-second-section">
				<div class="container">
					<hr class="footer-line">
					<ul class="social-list">
						<li><a href=""><i class="fab fa-facebook-square"></i></a></li>
						<li><a href=""><i class="fab fa-twitter"></i></a></li>
						<li><a href=""><i class="fab fa-skype"></i></a></li>
						<li><a href=""><i class="fab fa-youtube"></i></a></li>
						<li><a href=""><i class="fab fa-instagram"></i></a></li>
					</ul>
					<hr class="footer-line">
				</div>
			</div>
			<div class="footer-last-section">
				<div class="container">
					<p>Copyright 2024 &copy; Shelters.com <span> | </span> Theme designed and developed by <a href="team.php">Our team</a></p>
				</div>
			</div>
		</footer>

		

	</div>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/lightbox.js"></script>
	<script type="text/javascript" src="js/all.js"></script>
	<script type="text/javascript" src="js/isotope.pkgd.min.js"></script>
	<script type="text/javascript" src="js/owl.carousel.js"></script>
	<script type="text/javascript" src="js/jquery.flexslider.js"></script>
	<script type="text/javascript" src="js/jquery.rateyo.js"></script>
	<!-- <script type="text/javascript" src="js/jquery.mmenu.all.js"></script> -->
	<!-- <script type="text/javascript" src="js/jquery.meanmenu.min.js"></script> -->
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>