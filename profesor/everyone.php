<?php
	session_start();
	require("conection/connect.php");
	$tag="";
	if (isset($_GET['tag']))
	$tag=$_GET['tag'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Faculty Management system</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="jquery-1.11.0.js"></script>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css"/>
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="css/home.css" />
</head>

<body>
    
    <div class="logout_btn">
        <a href="../loginsystem.php" class="btn btn-primary btn-large">Logout <i class="icon-white icon-check"></i></a>
    </div>
    
    <div class="img_home_pos">
        <a href="everyone.php"><img src="images/kampusi_33.jpg" height="90" alt="Projectworlds technical university" /></a><span class="header_pos">Faculty of Computer Science</span><br><h3>Welcome professor to your university webpage. We wish you health and success.<br /></h3>
    </div><br>
                        
                        <div class="dropdownmenu_container">
                            <?php        
                            include './drop_down_menu.php';
                            ?>
                        </div>
		
		<div class="container_middle">		
			
			<div class="container_show_post">
				<?php
   						if($tag=="home" or $tag=="")

							include("home.php");

						elseif($tag=="students_entry")
						    include("Students_Entry.php");

                        elseif($tag=="faculties_entry")
                        	include("Faculties_Entry.php");

                        elseif($tag=="subject_entry")
                            include("Subject_Entry.php");

                        elseif($tag=="classes_entry")
                            include("Classes_Entry.php");

                        elseif($tag=="dates_entry")
                            include("Dates_Entry.php");	

                        elseif($tag=="view_students")
                        	include("View_Students.php");

						elseif($tag=="view_subjects")
							include("View_Subjects.php");

						elseif($tag=="view_classes")
							include("View_Classes.php");

						elseif($tag=="view_faculties")
							include("View_Faculties.php");

						elseif($tag=="view_dates")
							include("View_dates.php");

						
							/*$tag= $_REQUEST['tag'];
							
							/*if(empty($tag)){
								include ("Students_Entry.php");
							}
							else{
								include $tag;
							}*/
									
                        ?>
                    </div>
		</div>                
	</div>
        
        <div class="bottom_pos">
            <a href="AboutManagement.php" style="text-decoration: none;">About management</a>
        </div>
</body>
</html>