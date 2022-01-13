<?php 
   session_start();

   require("conection/connect.php");

   $conn = new mysqli("localhost","root","","loginform");

   $msg = "";

   if (isset($_POST['login'])) {
   	     $username = $_POST['username'];
   	     $password = $_POST['password'];
   	     $password = sha1($password);
   	     $userType = $_POST[('userType')];

   	     $sql = "SELECT * FROM admin WHERE username=? AND password=? AND user_type=?";
   	     $stmt = $conn->prepare($sql);
   	     $stmt -> bind_param("sss",$username,$password,$userType);
   	     $stmt->execute();
   	     $result = $stmt->get_result();
   	     $row = $result->fetch_assoc();

   	     session_regenerate_id();
   	     $_SESSION['username'] = $row['username'];
   	     $_SESSION['role'] = $row['user_type'];
   	     session_write_close();

   	     if ($result->num_rows==1 && $_SESSION['role']=="student") {
   	     	header("location:student/everyone.php");
   	     }
   	     else if ($result->num_rows==1 && $_SESSION['role']=="profesor") {
   	     	header("location:profesor/everyone.php");
         }
         if ($result->num_rows==1 && $_SESSION['role']=="admin") {
   	     	header("location:administrator/everyone.php");
   	     }
   	     else { 
   	     	$msg = "Username or Password is Incorrect!";
   	     }
   	 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Albion Morina dhe Armend Fazliu">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Multi User Login System</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body style="color: #AAAAAA">
	<div class="container">
		<div class="row justify-content-center">
		    <div class="col-lg-5 bg-light mt-5 px-0">
			    <h3 class="text-center text-light bg-danger p-3">Login System</h3>
			       <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="p-4">
			       	   <div class="form-group">
			       	   	  <input type="text" name="username" class=" form-control form-control-lg" placeholder="Username" required>
			       	   </div>
			       	   <div class="form-group">
			       	   	  <input type="password" name="password" class=" form-control form-control-lg" placeholder="Password" required>
			       	   </div>
			       	   <div class="form-group lead" style="color: #111111">
			       	   	   <label for="userType"><b>I'am a:</b></label>
			       	   	       <input type="radio" name="userType" value="student" class="costum-radio" required>&nbsp; <b>Student</b> │
			       	   	       <input type="radio" name="userType" value="profesor" class="costum-radio" required>&nbsp;<b>Proffesor</b> │
			       	   	       <input type="radio" name="userType" value="admin" class="costum-radio" required>&nbsp;<b>Admin</b> 
			       	    </div>
			       	        <div>
			       	           <input type="submit" name="login" class="btn btn-danger btn-block">
			       	           <a href="index.php" class="btn btn-danger btn-block">Back</a>
			       	       </div>
			       	           <h5 class="tetx-danger text-center"><?= $msg; ?></h5>
			       </form>
		    </div>
	    </div>
    </div>

    <footer>
    	<br>
    	<br>
    	<style>
            .segment-one h3 {
                font-family: Courgette;
                color: #fff;
                letter-spacing: 3px;
                margin: 10px 0;
            }

            .segment-two h2 {
                color: #fff;
                font-family: Poppins;
                text-transform: uppercase;
            }
            .segment-two h2:before {
                content: '│';
                color: #c65039;
                padding-right: 10px;
            }
            .segment-two ul {
                margin: 0;
                padding: 0;
                list-style: none;
            }
             .segment-two ul li{
                border-bottom: 1px solid rgba(255,255,255,0.3);
                line-height: 40px;
             }
             .segment-two ul li a {
                color: #999;
                text-decoration: none;
             }
             .segment-three h2 {
                color: #fff;
                font-family: Poppins;
                text-transform: uppercase;
             }
             .segment-three h2:before {
                content: '│';
                color: #c65039;
                padding-right: 10px;
             }
             .segment-three a{
                background: #494848;
                width: 40px;
                height: 40px;
                display: inline-block;
                border-radius: 50%;
             }
             .segment-three a i{
                font-size: 20px;
                color: #fff;
                padding: 10px 12px;
             }
             .segment-four h2 {
                color: #fff;
                font-family: Poppins;
                text-transform: uppercase;
             }
             .segment-four h2:before {
                content: '│';
                color: #c65039;
                padding-right: 10px;
             }
             .segment-four form input[type=submit] {
                background: #c65039;
                border: none;
                padding: 3px 15px;
                margin-left: -5px;
                color: #fff;
                text-transform: uppercase;
             }
             .footer-bottom-text {
                text-align: center;
                background: #000;
                line-height: 75px;
             }
        </style>
        <br />
        <br />
        <br />
    	 <p class="footer-bottom-text">All Rights reserved by @COPYRIGHT: Faculty of Computer Science/UPZ</p>
    </footer>

</body>
</html>