<?php
session_start();
if(isset($_SESSION['username'])){
include_once("headers.php");
?>
  <header class="site-header">
			<div class="top-header">
				<div class="container">
					<div class="top-header-left">
						<div class="login-block">
							<a style="margin-top: 4%;" href="login.php">logout</a>
						</div>
						
					</div>
					<div class="top-header-right">
					<?php
					include_once("db.php"); 

					$username = "";
					$image_name_from_database = "";
					if (isset($_SESSION['username'])) {
    				$username = $_SESSION['username'];

   				 	$sql = "SELECT UserImage FROM signup WHERE Username = '$username'";
    				$result = $conn->query($sql);

    				if ($result->num_rows > 0) {
        
        				$row = $result->fetch_assoc();
        				$image_name_from_database = $row['UserImage'];

    				}
				}
				?>

					 <a style="margin-top: 4%; margin-left:-5%; margin-right:5%;"; itemprop="Usernamef "><i class="fas fa-user"></i>   <?php echo $username; ?></a>
					 	<img class ="userimage"style="border-radius: 50%; width:30px; height:30px; margin-top:-2%;" src="uploads/<?php echo $image_name_from_database; ?>" >
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
										<a href="orphans/orphans-home.php"><li>Orphanages</li></a>
										<a href="elderly/elderly-home.php"><li>Elderly</li></a>
										<a href="animals/animal-home.php"><li>Animals</li></a>
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



<div style="width: 100%; max-width: none; position: relative;">
    <img id="image" src="images/r.jpg"  style="  width: 100%;
            height: 560px;max-width: none;">
    <button style="top:9%" class="arrow-btn prev-btn" onclick="prevImage()"><i class="fas fa-arrow-left"></i></button>
    <button style="top:9%"  class="arrow-btn next-btn" onclick="nextImage()"><i class="fas fa-arrow-right"></i></button>

<script>
    var currentIndex = 0;
    var images = ['images/r.jpg', 'images/a.webp', 'images/e.jpg']; 
    function showImage(index) {
        var image = document.getElementById('image');
        image.src = images[index];
    }

    function nextImage() {
        currentIndex = (currentIndex + 1) % images.length;
        showImage(currentIndex);
    }

    function prevImage() {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        showImage(currentIndex);
    }
    showImage(currentIndex);
</script>

<a style="
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: black; /* Blue background */
    color: white; /* White arrow */
    padding: 15px;
    border-radius: 5px;
    cursor: pointer;
    z-index: 1000;
    text-decoration: none; /* Remove underline */
" href="#" id="back-to-top" title="Back to top" style="display: none;">&#8679;</a>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    jQuery(document).ready(function($) {
        var btn = $('#back-to-top');

        $(window).scroll(function() {
            if ($(window).scrollTop() > 300) {
                btn.show();
            } else {
                btn.hide();
            }
        });

        btn.on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({scrollTop:0}, '300');
        });
    });
</script>

<div class="page-heading">
			<div  id="shelter" class="container">
				<h2>Shelters</h2>
			</div>
</div>

<div class="learn-courses">
			<div class="container">
				<div class="courses">
					<div class="owl-one owl-carousel">
						<div class="box-wrap" itemprop="event" itemscope itemtype=" http://schema.org/Course">
							<div class="img-wrap" itemprop="image"><img style="height: 250px; max-width: none;" src="images/c.jpg" alt="courses picture"></div>
								<a href="orphans/orphans-home.php" class="learn-desining-banner" itemprop="name">orphanages</a>
							<div style="height: 100px;"  class="box-body" itemprop="description">
							</div>
						</div>

						<div class="box-wrap"  itemprop="event" itemscope itemtype=" http://schema.org/Course">
							<div class="img-wrap"  itemprop="image"><img style="height: 250px; max-width: none;"   src="images/b.jpg" alt="courses picture"></div>
								<a href="elderly/elderly-home.php" class="learn-desining-banner" itemprop="name">elderly home</a>
							<div style="height: 100px; "  class="box-body" itemprop="description">
							</div>
		               </div>

						<div class="box-wrap" itemprop="event" itemscope itemtype=" http://schema.org/Course">
							<div class="img-wrap"  itemprop="image"><img style="height: 250px; max-width: none;"  src="images/a.png" alt="courses picture"></div>
								<a href="animals/animal-home.php" class="learn-desining-banner" itemprop="name">animal shelters</a>
							<div style="height: 100px;" class="box-body" itemprop="description">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<section class="whyUs-section" style="background-color: white;  margin-top:2%;"></section>
		<section class="page-heading">
    <div id="search" class="container">
        <h2>Search</h2>
    </div>
	<div style="background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;">
    <input type="file" id="imageInput" accept="image/*">
    <div style="width: 100%; height: 500px; margin-top: 15px; display: flex;
                justify-content: center;
                align-items: center;">
        <img style="width: 40%; height: 100%; margin-top: 20px; align-items: center;" id="preview">
    </div>


    <button onclick="uploadFile()" style="background-color: #57b846; width: 25%; margin-left: 10px; padding: 1.4rem;
            text-align: center;
            text-transform: uppercase;
            font-weight: bold;
            border-radius: 5px; color: white; margin-top: 20px;">Search
    </button>
    <div style="font-size: 15px; color: black; margin-top: 10px;" id="matchedImages">

    </div>
</div> <script>
        function uploadFile() {
            var input = document.getElementById('imageInput');
            var file = input.files[0];

            if (!file) {
                alert('Please select an image file.');
                return;
            }

            var formData = new FormData();
            formData.append('image', file);

            document.getElementById('matchedImages').innerHTML = 'Searching...';

            fetch('http://127.0.0.1:5000/webcompare', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Failed to search for matching images');
                }
                return response.json();
            })
            .then(data => {
                if (!data.matched_images || data.matched_images.length === 0) {
                    document.getElementById('matchedImages').innerHTML = 'No matching images found';
                } else if (!data.ages || data.ages.length === 0) {
                    document.getElementById('matchedImages').innerHTML = 'No age data found';
                } else {
                    var matchedImagePath = data.matched_images[0];
                    var relativePath = matchedImagePath.replace(/^.*[\\\/]/, ''); // استخراج اسم الملف فقط
                    var age = data.ages[0]; // Assuming you want to check the age of the first detected face
                    fetchImageData(relativePath, age);
                }
            })
            .catch(error => {
                console.error('Error:', error.message);
                document.getElementById('matchedImages').innerHTML = 'An error occurred while searching for matching images';
            });
        }

        function fetchImageData(imagePath, age) {
            var targetPage = age < 4 ? 'fetch_image_kidsdata.php' : 'fetch_image_elderlydata.php';
            
            fetch(targetPage + '?imagePath=' + encodeURIComponent(imagePath))
            .then(response => response.text())
            .then(data => {
                if (data.trim() === '') {
                    document.getElementById('matchedImages').innerHTML = 'Not found any matched images';
                } else {
                    document.getElementById('matchedImages').innerHTML = data;
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        document.getElementById('imageInput').addEventListener('change', function() {
            const fileInput = this;
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
        });
    </script>


		<section class="whyUs-section" style="background-color: white; "></section>
		<!-- Closed WhyUs section -->
		<section class="page-heading">
			<div id="gallery" class="container">
				<h2>gallery</h2>
			</div>
		</section>
	
	 <section class="gallery-images-section" itemprop="image" itemscope itemtype=" http://schema.org/ImageGallery">

        <div class="gallery-img-wrap">
				<a href="images/b.webp" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/b.webp" alt="gallery-images" style="height: 200px; max-width: none;" class="col-lg-12">
				</a>
			</div>
            <div class="gallery-img-wrap">
				<a href="images/b.webp" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/c.webp" alt="gallery-images" style=" max-width: none;   height: 200px; width: 100%;">
				</a>
			</div>
            <div class="gallery-img-wrap">
				<a href="images/l.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/l.jpg" alt="gallery-images" style="  max-width: none;  height: 200px; width: 341px;">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/p.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/p.jpg" alt="gallery-images" style=" max-width: none;   height: 200px; width: 341px;">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/s.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/s.jpg" alt="gallery-images" style="  max-width: none;  height: 200px; width: 341px;">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/w.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/w.jpg" alt="gallery-images" style=" max-width: none;   height: 200px; width: 341px;">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/x.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/x.jpg" alt="gallery-images" style="  max-width: none;  height: 200px; width: 341px;">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/h.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/h.jpg" alt="gallery-images" style=" max-width: none;   height: 200px; width: 341px;">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/o.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/o.jpg" alt="gallery-images" style=" max-width: none;   height: 200px; width: 341px;">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/j.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/j.jpg" alt="gallery-images" style="  max-width: none;  height: 200px; width: 341px;">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/z.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/z.jpg" alt="gallery-images"style=" max-width: none;   height: 200px; width: 341px;">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/b.webp" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/b.webp" alt="gallery-images" style=" max-width: none;   height: 200px; width: 341px;">
				</a>
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

						<h4><a href="tel:+201020206038"><i class="fas fa-phone"></i>01020206038</a></h4>
						<h4><a href="mailto:Ranem.elnoury2003@gmail.com<"><i class="fas fa-envelope"></i> Shelters@gmail.com</a></h4>
					</div>

					<div class="box-wrap">
						<header>
							<h1>quick contact</h1>
						</header>
						<section class="quick-contact">
							  <?php
                               include_once("db.php");

        				if ($_SERVER["REQUEST_METHOD"] == "POST") {
            			$email = $_POST['email'];
            			$message = $_POST['message'];
            			$sql = "INSERT INTO contact (email, message) VALUES ('$email', '$message')";
            
            			if ($conn->query($sql) === TRUE) {
                		echo "Message sent successfully";
            			} else {
                		echo "Error: " . $sql . "<br>" . $conn->error;
            			}
        			}
       					 ?>
						<form method="POST">
							<input style="background-color:whitesmoke;" type="email" name="email" placeholder="Your Email*">
							<textarea style="background-color:whitesmoke; color: black;" placeholder="Type your message*" name="message"></textarea>
							<button>send message</button>
						</form>
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


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




	</div>

<?php
include_once("footer.php");

}else{
	header('location:login.php');
}
?>