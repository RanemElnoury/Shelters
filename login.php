<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="css/all.css">
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/lightbox.css">
	<link rel="stylesheet" type="text/css" href="css/flexslider.css">
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="css/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.rateyo.css"/>
	<link  rel="stylesheet" type="text/css" href="login.css">
	 <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
	<title></title>
</head>
<body>
	
	<div id="div">
  <h2>welcome</h2>
  <img src="images/logo.jpg">
  <br><br>
  <form method="POST">
  	 <?php
              include_once("db.php");

				session_start();

              if ($_SERVER["REQUEST_METHOD"] == "POST") {
              $username = $_POST['username'];
              $password = $_POST['password'];
    
             
        
    		  $sql = "SELECT * FROM signup WHERE username='$username' AND Password=MD5('$password')";
    		  $result = $conn->query($sql);
    
    		if ($result->num_rows > 0) {
    			
                $_SESSION['username'] = $username;
                header("Location: index.php");
                exit(); 

        
    		} else {
        $sql = "SELECT * FROM signup WHERE username='$username'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "Password is incorrect";
        } 
        else {
            echo "Username is incorrect";
        }
   }
}
    ?>
  	<div class="div2" ><i class="login__icon fas fa-user"></i>
  	<input class="in" class="wrap-input100 validate-input" type="text" name="username" placeholder="Username" required ></div>
  	<br>
  	<div class="div2"><i class="login__icon fas fa-lock"></i>
  	<input class="in" type="password" name="password" placeholder="password" required></div>
  <input  type="submit" id="btn" value="login" name = "submit"/>
            
  </form>
   <div>
  	<ul>
  		<li>Don't have an account?<a href="sign_up.php"><span>Sign up</span></a></li>
  	</ul>
  </div>
  </div>
 
 
</body>
</html>
