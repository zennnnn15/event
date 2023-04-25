<?php
   session_start();
   $error = '';
   if($_SERVER["REQUEST_METHOD"] == "POST") {
  include '../database/dbcon.php';

      // check the user's credentials
      $username = $_POST['username'];
      $password = $_POST['password'];
      $sql = "SELECT * FROM admin WHERE adminUser = '$username' and adminPass = '$password'";
      $result = mysqli_query($con,$sql);
      $count = mysqli_num_rows($result);

      if($count == 1) {
         $_SESSION['login_user'] = $username;
         header("location: dashboard.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
   </head>
   
   <body>
      
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
               
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>Username :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
                  
            </div>
               
         </div>
            
      </div>

   </body>
</html>
