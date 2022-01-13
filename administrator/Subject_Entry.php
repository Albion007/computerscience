<?php
$id="";
$opr="";
if(isset($_GET['opr']))
    $opr=$_GET['opr'];

if(isset($_GET['rs_id']))
    $id=$_GET['rs_id'];
    
if(isset($_POST['btn_sub'])){
    $fa_name=$_POST['factxt'];
    $teach_name=$_POST['techtxt'];
    $semester=$_POST['semestertxt'];
    $sub_name=$_POST['subtxt'];
    $num_stud=$_POST['numtxt'];
    $num_stud_less=$_POST['numtxtl'];
    $num_stud_exer=$_POST['numtxte'];
    $note=$_POST['notetxt'];    
    
    

$sql_ins=mysqli_query($conn, "INSERT INTO sub_tbl 
                        VALUES(
                            NULL,
                            '$fa_name',
                            '$teach_name' ,
                            '$semester',
                            '$sub_name' ,
                            '$num_stud' ,
                            '$num_stud_less' ,
                            '$num_stud_exer' ,
                            '$note'
                            )
                    ");
    
if($sql_ins==true)
    $msg="1 Row Inserted";
else
    $msg="Insert Error:" or die (mysqli_error());
    
}

//------------------update data----------
if(isset($_POST['btn_upd'])){
    $fa_name=$_POST['factxt'];
    $teach_name=$_POST['techtxt'];
    $semester=$_POST['semestertxt'];
    $sub_name=$_POST['subtxt'];
    $num_stud=$_POST['numtxt'];
    $num_stud_less=$_POST['numtxtl'];
    $num_stud_exer=$_POST['numtxte'];
    $note=$_POST['notetxt'];
    
    
    $sql_update=mysqli_query($conn, "UPDATE sub_tbl SET
                            fa_name='$fa_name' ,
                            teach_name='$teach_name' ,
                            semester='$semester' ,
                            sub_name='$sub_name' ,
                            num_stud='$num_stud' ,
                            num_stud_less='$num_stud_less' ,
                            num_stud_exer='$num_stud_exer' ,
                            note='$note' 
                        WHERE sub_id=$id

                    ");
                    
if($sql_update==true)
    echo "<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "Record Updated Successfully... !"
                . "</span>"
                . "</div>";
    else
        $msg="Update Failed...!";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
</head>

<body>


<?php

if($opr=="upd")
{
    $sql_upd=mysqli_query($conn, "SELECT * FROM sub_tbl WHERE sub_id=$id");
    $rs_upd=mysqli_fetch_array($sql_upd);
    
?>
<div class="panel panel-default">
        <div class="panel-heading"><h1><span class="glyphicon glyphicon-th-list"></span> Subject's Update Form</h1></div>
            <div class="panel-body">
            <div class="container">
                <p style="text-align:center;">Here, you'll update your subject's records into database.</p>
            </div>
                  <form method="post">    
                    <div class="teacher_bday_box" style="margin-left: 0px;">
                    <div class="select_style">
                        <select name="factxt" style="width: 200px;">
                                            <option>Facultie's name</option>
                            <?php
                               $fa_name=mysqli_query($conn, "SELECT * FROM facuties_tbl");
                               while($row=mysqli_fetch_array($fa_name)){
                                   if($row['faculties_id']==$rs_upd['faculties_id'])
                                        $iselect="selected";
                                    else
                                        $iselect="";
                                ?>
                                <option value="<?php echo $row['faculties_id'];?>" <?php echo $iselect;?> > <?php echo $row['faculties_name'];?> </option>
                                <?php 
                               }
                            
                            ?>
                                        </select>
                                        </div>
                    </div><br><br>
            
            <div class="teacher_bday_box" style="margin-left: 0px;">
                    <div class="select_style">
                                            <select name="techtxt" style="width: 200px">
                                            <option>Teacher's name</option>
                            <?php
                                $teach_name=mysqli_query($conn, "SELECT * FROM teacher_tbl");
                                while($row=mysqli_fetch_array($teach_name)){
                                    if($row['teacher_id']==$rs_upd['teacher_id'])
                                        $iselect="selected";
                                    else
                                        $iselect="";
                                ?>
                                <option value="<?php echo $row['teacher_id'];?>" <?php echo $iselect?> > <?php echo $row['f_name'] ; echo " "; echo $row['l_name'];?> </option>
                                    
                                <?php   
                                    }
                            ?>
                                        </select>
                                        </div>
            </div><br><br>
            
                            <div class="teacher_note_pos">
                                <input type="text" class="form-control" name="semestertxt" id="textbox" value="<?php echo $rs_upd['semester'];?>"  />
                            </div><br>
            
                            <div class="teacher_note_pos">
                                <input type="text" class="form-control" name="subtxt"  id="textbox" value="<?php echo $rs_upd['sub_name'];?>" />
                            </div><br>

                            <div class="teacher_note_pos">
                                <input type="text" class="form-control" name="numtxt" id="textbox" value="<?php echo $rs_upd['semester'];?>"  />
                            </div><br>

                            <div class="teacher_note_pos">
                                <input type="text" class="form-control" name="numtxtl" id="textbox" value="<?php echo $rs_upd['semester'];?>"  />
                            </div><br>

                            <div class="teacher_note_pos">
                                <input type="text" class="form-control" name="numtxte" id="textbox" value="<?php echo $rs_upd['semester'];?>"  />
                            </div><br>
            
                            <div class="text_box_pos">
                                <textarea name="notetxt" class="form-control" cols="23" rows="3"><?php echo $rs_upd['note'];?></textarea>
                            </div><br><br>
            
                            <div>
                                <input type="submit" class="btn btn-primary btn-large" name="btn_upd" value="Update" id="button-in"  />
                                <input type="reset" style="margin-left: 9px;" class="btn btn-primary btn-large" value="Cancel" id="button-in"/>                                
                            </div>
                  </form>            
        </div>
    </form>
</div>
<?php
}
else
{
?>

<div class="panel panel-default">
        <div class="panel-heading"><h1><span class="glyphicon glyphicon-th-list"></span> Subject Entry Form</h1></div>
            <div class="panel-body">
                        <form method="post">    
            <div class="container">
                <p style="text-align:center;">Here, you'll add new subject's detail to record into database.</p>
            </div>


<div class="teacher_bday_box" style="margin-left: 0px;">
                    <div class="select_style">
                        <select name="factxt" style="width: 200px;">
                                            <option>Facultie's name</option>
                            <?php
                               $fac_name=mysqli_query($conn, "SELECT * FROM facuties_tbl");
                               while($row=mysqli_fetch_array($fac_name)){
                                ?>
                                <option value="<?php echo $row['faculties_id'];?>"> <?php echo $row['faculties_name'];?> </option>
                                <?php 
                               }
                            ?>
                    </select>
                                        </div>
</div><br><br>
            
            <div class="teacher_bday_box" style="margin-left: 0px;">
                    <div class="select_style">
                                            <select name="techtxt" style="width: 200px">
                                            <option>Teacher's name</option>
                            <?php
                                $te_name=mysqli_query($conn, "SELECT * FROM teacher_tbl");
                                while($row=mysqli_fetch_array($te_name)){
                                ?>
                                <option value="<?php echo $row['teacher_id'];?>"> <?php echo $row['f_name'] ; echo " "; echo $row['l_name'];?> </option>
                                    
                                <?php   
                                    }
                            ?>
                    </select>
                                        </div>
            </div><br><br>
            
                <div class="teacher_note_pos">
                    <input type="text" class="form-control" name="semestertxt" id="textbox" placeholder="Semester" />
                </div><br>
            
                <div class="teacher_note_pos">
                    <input type="text" class="form-control" name="subtxt"  id="textbox" placeholder="Subject's name"/>
                </div><br>

                <div class="teacher_note_pos">
                    <input type="text" class="form-control" name="numtxt" id="textbox" placeholder="Number of Students" />
                </div><br>

                <div class="teacher_note_pos">
                    <input type="text" class="form-control" name="numtxtl" id="textbox" placeholder="Number of groups for lessons" />
                </div><br>

                <div class="teacher_note_pos">
                    <input type="text" class="form-control" name="numtxte" id="textbox" placeholder="Number of groups for exercises" />
                </div><br>
                
                <div class="text_box_pos">
                    <textarea class="form-control" name="notetxt" cols="23" rows="3" placeholder='Add note..'></textarea>
                </div><br><br>
            
                <div>
                    <input type="submit" class="btn btn-primary btn-large" name="btn_sub" value="Add Now" id="button-in"  />
                        <input type="reset" class="btn btn-primary btn-large" style="margin-left: 9px;" value="Cancel" id="button-in"/>
                </div>
           </form>
        </div>
    </form>
</div><!-- end of style_informatios -->

<?php
}
?>
</body>
</html>