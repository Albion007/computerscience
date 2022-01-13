<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Record Semester</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body style="color:#001f3f; background-color:#DDDDDD;"> 
           <h1 style="text-align: center;">Welcome Student</h1> 
           <br />
           <h4><b>Notice:</b></h4>  
           <p>Please be careful when registering courses because they will be sent immediately to the administrator and recorded in the database. Therefore, below you have a total of 7 subjects from Semester 4 - Year 2. In total you have 4 mandatory subjects (O) and you have to choose only one elective (E) so please be careful. For any eventual errors you make please contact us at the official email uni-pz.com or you can find us at the university from 08:00 - 16:00. <b>IT office</b></p>
           <br />

           <div class="container" style="width:500px;">  

            <form action=" <?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <h4 style="text-align: left;">Record the subjects carefully</b></h4>  
                <div class="checkbox">  
                     <input type="checkbox" class="get_value" value="AD" id="Subject" />(O)Advanced Database - Prof.Ass.Dr Zirije Hasani - Credi 6<br />  
                     <input type="checkbox" class="get_value" value="RM" id="Subject" />(O)Research Methods - Prof.Asoc.Dr Samedin Krrabaj -Credi 6<br />  
                     <input type="checkbox" class="get_value" value="Matlab" id="Subject" />(O)Computer Graphics and Image Processing - Prof. Asoc. Dr Ercan Canhasi - Credi 6 <br />  
                     <input type="checkbox" class="get_value" value="AW" id="Subject" />(O)Advanced Web - Prof.Ass. Dr Zirije Hasani - Credi 6<br /> 
                     <input type="checkbox" class="get_value" value="DS" id="Subject" />(E)Designing Information Systems - Prof.Asoc. Dr  Malush Mjaku- Credi 6<br /> 
                     <input type="checkbox" class="get_value" value="OM" id="Subject" />(E)Online Marketing - Prof.Asoc. Dr  Naim Baftiu- Credi 6<br />
                     <input type="checkbox" class="get_value" value="EB" id="Subject" />(E)E-Bussines - Prof.Asoc. Dr  Naim Baftiu- Credi 6<br />

                </div>       
                <button type="button" name="submit" class="btn btn-info" id="submit">Submit</button>
                <button type="button" name="submit" class="btn btn-info" id="submit"><a href="../everyone.php"> Back </a></button>  
              </form>

                <br />  
                <div id="result"></div>  
           </div>  
      </body>  
 </html>

 <script>  
 $(document).ready(function(){  
      $('#submit').click(function(){  
           var languages = [];  
           $('.get_value').each(function(){  
                if($(this).is(":checked"))  
                {  
                     languages.push($(this).val());  
                }  
           });  
           languages = languages.toString();  
           $.ajax({  
                url:"insert.php",  
                method:"POST",  
                data:{languages:languages},  
                success:function(data){  
                     $('#result').html(data);  
                }  
           });  
      });  
 });  

 </script>  