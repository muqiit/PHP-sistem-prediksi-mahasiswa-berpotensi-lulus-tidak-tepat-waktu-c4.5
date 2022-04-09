<?php
  session_start();
  require_once'koneksi.php';
  

  if(isset($_POST['login']))
  {

     $username = strip_tags($_POST['username']);
     $password = strip_tags($_POST['password']);
     
     $username = $connect->real_escape_string($username);
     $password = $connect->real_escape_string($password);
     
     $query = $connect->query("SELECT * FROM tbl_user WHERE username='$username' and password='$password' and st_user=1");
     $query2 = $connect->query("SELECT nama_lengkap, email FROM tbl_user WHERE username='$username' and password='$password'");
     $row=$query->fetch_array();
     $row2 = mysqli_fetch_assoc($query2);
     

     $count = $query->num_rows;


      if ($count>=1) 
      {
         $_SESSION['status_login']="Aktif";
        $_SESSION['nama_user']=$row2['nama_lengkap'];
        $_SESSION['email']=$row2['email'];
        $_SESSION['lvl']=$row['lvl'];
       header('location: index.php');
       } else {
        
        echo '<script> alert("Username dan Password Salah");</script>';
        header('location: login.php');
       }
       $koneksi->close();
  }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | Sistem Prediksi</title>
    <!-- Favicon-->
    <link rel="icon" href="asset/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="asset/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="asset/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="asset/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="asset/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="login.php">Sistem<b> Prediksi</b></a>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg">Masukan username dan password anda</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                           
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" name="login" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                       
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="asset/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="asset/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="asset/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="asset/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="asset/js/admin.js"></script>
    <script src="asset/js/pages/examples/sign-in.js"></script>
</body>

</html>