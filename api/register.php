<?php
error_reporting(0);
 include("connect.php");

 $name = $_POST['name'];
 $phone = $_POST['phone'];
 $password = $_POST['password'];
 $Cpassword = $_POST['cpassword'];
 $address = $_POST['address'];
 $image = $_FILES['photo']['name'];
 $tmp_name = $_FILES['photo']['tmp_name'];
 $role = $_POST['role'];

   if($password==$Cpassword){
      move_uploaded_file($tmp_name,"../uploads/$image");
      $insert= mysqli_query($connect, "INSERT INTO voters (name, phone, address, password, photo, role, status, votes) VALUES 
      ('".$name."', '".$phone."', '".$address."','".$password."', '".$image."', '".$role."',0 ,0)");
      if($insert){
               echo '
               <script>
                    alert("Registration Successfull..!");
                    window.location = "../";          
               </script>';     
          }
          else{
               echo '
               <script>
                    alert("Some Error..!");
                    window.location = "../routes/register.html";          
               </script>';
          }
     }  
     else{
          echo '
               <script>
                    alert("Password and Confirm password does not match..!");
                    window.location = "../routes/register.html";          
               </script>';
        
     }  

?>