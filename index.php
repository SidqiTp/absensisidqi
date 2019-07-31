<?php
include "data/koneksi.php";
include "data/config.php";

$ds = new config();

?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
      <title>Login</title>
  
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
<form method="post">
  <div class="login-form">
     <h5 align="center"><font color="#666">LOGIN</font></h5>
     <div class="form-group ">
       <input type="text" class="form-control" placeholder="Username " id="UserName" name="user">
       <i class="fa fa-user"></i>
     </div>
     <div class="form-group">
       <input type="password" class="form-control" placeholder="Password" id="Passwod" name="pwd">
       <i class="fa fa-lock"></i>
     </div>
     <button type="submit" name="lgn" class="log-btn" >Log in</button>
   <!-- <h5 align="center">Belum mendaftar Klik <a href="daftar.php">Disini</a> -->
     <?php $ds->login(); ?>
    </h5>
   </div>
   </form>
  <script src='js/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
<style type="text/css">
  body{background-color: #CCC;
   -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  }
</style>