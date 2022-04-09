<?php
  INI_SET("display_errors",0);
?>

<?php
@session_start();
if(empty($_SESSION['status_login']))
{
  header('Location:login.php');

}

  if($_GET['id']=="logout")
  {
     unset($_SESSION['status_login']);
   unset($_SESSION['email']); 
    unset($_SESSION['nama_user']);
    unset($_SESSION['lvl']);
    header('Location:login.php');
  }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sistem Prediksi | M. T. K.</title>
    <!-- Favicon-->
    <link rel="icon" href="asset/favicon.ico" type="image/x-icon">

    <script type="text/javascript" src="chartjs/Chart.js"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="asset/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="asset/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="asset/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="asset/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet"/>

    <!-- Morris Chart Css-->
    <link href="asset/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="asset/css/style.css" rel="stylesheet">

    <!-- Dropzone Css -->
    <link href="asset/plugins/dropzone/dropzone.css" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="asset/plugins/multi-select/css/multi-select.css" rel="stylesheet">

    <!-- Bootstrap Spinner Css -->
    <link href="asset/plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="asset/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="asset/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="asset/css/themes/all-themes.css" rel="stylesheet" />



</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <!-- <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div> -->
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.php">SISTEM PREDIKSI</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <!-- <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li> -->
                    <!-- #END# Call Search -->
                    
                    <li class="pull-right"><a href="index.php?id=logout" class="btn btn-warning waves-effect" title="Sign Out"><i class="material-icons">input</i></a></li>
                
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="asset/images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php  echo $_SESSION['nama_user'];?></div>
                    <div class="email"><?php  echo $_SESSION['email'];?></div>
                    
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MENU UTAMA</li>
                    <li>
                        <a href="index.php?id=1">
                            <i class="material-icons">home</i>
                            <span>Beranda</span>
                        </a>
                    </li>
                    <?php
                    if($_SESSION['lvl']=='2')
                    {
                    ?>
                    
                    <li>
                        <a href="index.php?id=2">
                            <i class="material-icons">assignment</i>
                            <span>Data Lama</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?id=10">
                            <i class="material-icons">pie_chart</i>
                            <span>Grafik</span>
                        </a>
                    </li>
                    <?php
                    }
                    elseif($_SESSION['lvl']=='3')
                    {
                        ?>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">widgets</i>
                            <span>Prediksi</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="index.php?id=6" class="menu-toggle">
                                    <span>Input Data Prediksi</span>
                                </a>
                            </li>
                            <li>
                                <a href="index.php?id=11" class="menu-toggle">
                                    <span>Lihat Data Prediksi</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                   
                    <?php
                    }
                    elseif($_SESSION['lvl']=='0')
                    {
                        ?>
                        <li>
                        <a href="index.php?id=2">
                            <i class="material-icons">assignment</i>
                            <span>Data Lama</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">widgets</i>
                            <span>Prediksi</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="index.php?id=6" class="menu-toggle">
                                    <span>Input Data Prediksi</span>
                                </a>
                            </li>
                            <li>
                                <a href="index.php?id=11" class="menu-toggle">
                                    <span>Lihat Data Prediksi</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="index.php?id=10">
                            <i class="material-icons">pie_chart</i>
                            <span>Grafik</span>
                        </a>
                    </li>


                    <?php
                    }
                    ?>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2019 - 2020 <a href="javascript:void(0);">M.T.K</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 0.0.1
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="asset/#skins" data-toggle="tab">SKINS</a></li>
                <li role="presentation"><a href="asset/#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <?php
            if($_GET['id']=="")
                {
                    include('blank.php');
                } 
            if($_GET['id']==1)
                {
                    include('blank.php');
                } 
            if($_GET['id']==2)
                {
                    include('data.php');
                } 
            if($_GET['id']==3)
                {
                    include('form.php');
                } 
            if($_GET['id']==4)
                {
                    include('mining.php');
                } 
            if($_GET['id']==5)
                {
                    include('rule.php');
                } 
            if($_GET['id']==6)
                {
                    include('prediksi.php');
                }
            if($_GET['id']==7)
                {
                    include('data_prediksi.php');
                } 
            if($_GET['id']==8)
                {
                    include('import_prediksi.php');
                } 
            if($_GET['id']==9)
                {
                    include('akurasi.php');
                } 
            if($_GET['id']==10)
                {
                    include('grafik.php');
                } 
            if($_GET['id']==11)
                {
                    include('view_prediksi.php');
                } 
            

        ?>
    </section>



    <!-- Jquery Core Js -->
    <script src="asset/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="asset/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="asset/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="asset/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="asset/plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="asset/plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="asset/plugins/raphael/raphael.min.js"></script>
    <script src="asset/plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="asset/plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="asset/plugins/flot-charts/jquery.flot.js"></script>
    <script src="asset/plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="asset/plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="asset/plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="asset/plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="asset/plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="asset/js/admin.js"></script>
    <script src="asset/js/pages/index.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="asset/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="asset/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="asset/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="asset/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="asset/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="asset/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="asset/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="asset/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="asset/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <script src="asset/js/pages/tables/jquery-datatable.js"></script>

     <!-- Dropzone Plugin Js -->
    <script src="asset/plugins/dropzone/dropzone.js"></script>

    <!-- Demo Js -->
    <script src="asset/js/demo.js"></script>
</body>

</html>
