<?php
include_once("header.php");
?>
<div class=" w-100 contt mb-0">
      <div class="container pt-5">
      <div class="row mx-5 d-flex ">
      <div class="col-lg-4 p-4 ff">
          <p class="f-p mb-5">About Us</p>
          <p  style=" color:#707070;">This website is a great way to know address and needs to any shelter.And helping to find missing people or animals.</p>
           <ul class="list-contact mt-5">
            <li class="flex-row d-flex">
              <div class="icon mt-1">
                <i class="fa-solid fa-phone"style="color:#ffff;"></i>
              </div>
              <div class="detail ms-3">
                <h4 style=" color:#ffff;font-size:20px;">01264583140</h4>
                <p style=" color:#707070;">From 9 am to 6 pm</p>
              </div>
            </li>
            <li class="flex-row d-flex">
              <div class="icon mt-1">
                <i class="fa-solid fa-envelope"style="color:#ffff;"></i>
              </div>
              <div class="detail ms-3">
                <h4 style=" color:#ffff;font-size:20px;">Shelters@gmail.com</h4>
                <p style=" color:#707070;">Send us your question anytime!</p>
              </div>
            </li>
          </ul>
        </div>
        
        <div class="col-lg-3 p-4 ff"> 
        </div>
        <div class="col-lg-4 p-4 ff" class="box-wrap">
            <header>
               <p class="f-p">Contact Us</p>
          
            </header>
            <section class="quick-contact">
                <?php
                include_once("../db.php");

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                  $email = $_POST['email'];
                  $message = $_POST['message'];
                  $sql = "INSERT INTO contact (email, message) VALUES ('$email', '$message')";
            
                  if ($conn->query($sql) === TRUE) {
                    echo "<p style='color: white; padding: 6px;border-radius: 5px;'>Message sent successfully</p>";
                  } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                  }
              }
                 ?>
            <form method="POST">
              <input style="padding: 1em;border: 1px solid #fff;border-radius: 5px;margin-top: 10px;margin-bottom: 10px;background-color:whitesmoke; color: black;width: 250px;" type="email" name="email" placeholder="Your Email*">
              <textarea style="padding: 1em;border: 1px solid #fff;border-radius: 5px;margin-top: 15px;margin-bottom: 15px;background-color:whitesmoke; color: black; width: 250px;" placeholder="Type your message*" name="message"></textarea>
              <button  style="padding: 1em;border: 1px solid #fff;border-radius: 5px;margin-top: 15px;margin-bottom: 15px; width: 250px;">send message</button>
            </form>
            </section>
          </div>
      </div>
    </div>
</div>
<link rel="stylesheet" href="css/footer.css" />
</body>
</html>