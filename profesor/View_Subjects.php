

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style_view.css" />
</head>

<body>
<div class="btn_pos">
        <form method="post">
            <input type="text" name="searchtxt" class="input_box_pos form-control" placeholder="Search with proffesor's ID" />
            <div class="btn_pos_search">
            <input type="submit" class="btn btn-primary btn-large" value="Search"/>
            </div>
        </form>
    </div><br><br>
<br />

<div class="table_margin">
<table class="table table-bordered">
        <thead>
            <tr>
            <th style="text-align: center;">No</th>
            <th style="text-align: center;">Faculties ID</th>
            <th style="text-align: center;">Professor's ID</th>
            <th style="text-align: center;">Semester</th>
            <th style="text-align: center;">Subject Name</th>
            <th style="text-align: center;">Number of Students</th>
            <th style="text-align: center;">Number of Groups for lessons</th>
            <th style="text-align: center;">Number of Groups for exercises</th>
            <th style="text-align: center;">Note</th>
            </tr>
        </thead>
        
         <?php

         $key="";
    if(isset($_POST['searchtxt']))
        $key=$_POST['searchtxt'];
    
    if($key !="")
        $sql_sel=mysqli_query($conn, "SElECT * FROM sub_tbl WHERE teacher_id  like '%$key%' or sub_name like '%$key%'");
    else
        $sql_sel=mysqli_query($conn, "SELECT * FROM sub_tbl");
        
    $i=0;
    while($row=mysqli_fetch_array($sql_sel)){
    $i++;

        ?>

      <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $row['faculties_id'];?></td>
            <td><?php echo $row['teacher_id'];?></td>
            <td><?php echo $row['semester'];?></td>
            <td><?php echo $row['sub_name'];?></td>
            <td><?php echo $row['num_stud'];?></td>
            <td><?php echo $row['num_stud_less'];?></td>
            <td><?php echo $row['num_stud_exer'];?></td>
            <td><?php echo $row['note'];?></td>
            
        </tr>
    <?php	
    }
    ?>
</table>
</div><!--end of content_input -->
</body>
</html>