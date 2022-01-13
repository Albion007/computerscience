 <?php  
 //insert.php  
 if(isset($_POST["languages"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "", "assignment");  
      $query = "INSERT INTO tbl_subjects(name) VALUES ('".$_POST["languages"]."')";  
      $result = mysqli_query($connect, $query);  
      echo 'The subjects are recorded in databases';  

 }  
 ?>  