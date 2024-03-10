<?php 
session_start();
if(isset($_SESSION['unique_id'])){
	header("location: users.php");
}
include_once "header.php"; ?>

<body>
    <div class="wrapper">
    	<section class="form signup">
    		<header> Realtime chat App</header>
              <form action="#" method="post" enctype="multipart/form-data" autocomplete="off">
              	<div class="error-text"></div>
              	<div class="name-details">
                     <div class="field input">
                          <label>First name</label>
                          <input type="text" name="fname" placeholder="First Name" required="required">

                      </div>
                       <div class="field input">
                          <label>last name</label>
                          <input type="text" name="lname" placeholder="last Name" required="required">          
                      </div>
              	</div>
              	 <div class="field input">
                          <label>Email Address</label>
                          <input type="email" name="email" placeholder="Enter your Email " required="required">     
                      </div>
                   <div class="field input">
                          <label>Password</label>
                          <input type="password" name="password" placeholder="Enter New password" required="required"> 
                          <i class="bi bi-eye-fill"></i>    
                      </div>
                      
                      <div class=" field image">
                            <label>Profile Image</label>  
                            <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
                      </div>
                      <div class="field button">
                      	<input type="submit" name="submit" value="Continue to Chat">
                      </div>
              </form>
              <div class="link">Already signed up? <a href="login.php">Login Now</a> </div>
    	</section>
    </div>
    <script type="text/javascript" src="js/pass-show-hide.js"></script>
    <script type="text/javascript" src="js/signup.js"></script>
</body>
</html>
