
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style_view.css" />
</head>

<body>
<div class="btn_pos">
        <form method="post">
            <input type="text" name="searchtxt" class="input_box_pos form-control" placeholder="Search with subject's name" />
            <div class="btn_pos_search">
            <input type="submit" class="btn btn-primary btn-large" name="btnsearch" value="Search"/>
            </div>
        </form>
    </div><br><br>

<div class="table_margin">
<table class="table table-bordered">
        <thead>
            <tr>
            <th style="text-align: center;">No</th>
            <th style="text-align: center;">Subject's Name</th>
            <th style="text-align: center;" width="250px">Date</th>
            </tr>
        </thead>    
        
         <?php

         $key="";
    if(isset($_POST['searchtxt']))
        $key=$_POST['searchtxt'];
    
    if($key !="")
        $sql_sel=mysqli_query($conn, "SElECT * FROM dates_tbl WHERE subject_name  like '%$key%' or date like '%$key%'");
    else
        $sql_sel=mysqli_query($conn, "SELECT * FROM dates_tbl");
        
    $i=0;
    while($row=mysqli_fetch_array($sql_sel)){
    $i++;

        ?>

        <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $row['subject_name'];?></td>
            <td><?php echo $row['date'];?></td>
        </tr>
    <?php   
    }
    ?>
    </table>
</div><!--end of content_input -->
</body>
</html>