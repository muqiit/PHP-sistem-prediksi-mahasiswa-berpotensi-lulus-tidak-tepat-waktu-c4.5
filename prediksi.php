 <?php
  include('koneksi.php');
  if(isset($_POST['simpan']))
  {
    if (empty($_POST['nama_mhs'])) 
    {
     echo"<script type='text/javascript'>
        alert('Data belum lengkap!');
        http_redirect('http://prediksi.com:8080/index.php?id=6');;
        </script>";
    }
    elseif($_POST['ips_4']>3.50)
    {
    // Simpan ke Database
    $a="INSERT INTO tbl_prediksi values ('".$_POST['kd_prediksi']."','".$_POST['nama_mhs']."','".$_POST['sks_2']."','".$_POST['sks_3']."','".$_POST['sks_4']."','".$_POST['ips_2']."','".$_POST['ips_3']."','".$_POST['ips_4']."','Lebih Cepat')";
    $proses=mysqli_query($connect,$a);

    echo"<script type='text/javascript'>
        alert('Berhasil Menyimpan Data!');
        http_redirect('http://prediksi.com:8080/index.php?id=11');;
        </script>";

    //http_redirect('http://localhost:8080/board/admin.php?id=8');

    }
    elseif($_POST['ips_4']<=3.50 and $_POST['ips_4']>=3.00 and $_POST['ips_2']>3.50 and $_POST['ips_3']>3.50)
    {
    // Simpan ke Database
    $a2="INSERT INTO tbl_prediksi values ('".$_POST['kd_prediksi']."','".$_POST['nama_mhs']."','".$_POST['sks_2']."','".$_POST['sks_3']."','".$_POST['sks_4']."','".$_POST['ips_2']."','".$_POST['ips_3']."','".$_POST['ips_4']."','Lebih Cepat')";
    $proses2=mysqli_query($connect,$a2);

    echo"<script type='text/javascript'>
        alert('Berhasil Menyimpan Data!');
        http_redirect('http://prediksi.com:8080/index.php?id=11');;
        </script>";

    //http_redirect('http://localhost:8080/board/admin.php?id=8');

    }
    elseif($_POST['ips_4']<=3.50 and $_POST['ips_4']>=3.00 and $_POST['ips_2']>3.50 and $_POST['ips_3']>=3.00 and $_POST['ips_3']<=3.50)
    {
    // Simpan ke Database
    $a3="INSERT INTO tbl_prediksi values ('".$_POST['kd_prediksi']."','".$_POST['nama_mhs']."','".$_POST['sks_2']."','".$_POST['sks_3']."','".$_POST['sks_4']."','".$_POST['ips_2']."','".$_POST['ips_3']."','".$_POST['ips_4']."','Tepat Waktu')";
    $proses3=mysqli_query($connect,$a3);

    echo"<script type='text/javascript'>
        alert('Berhasil Menyimpan Data!');
        http_redirect('http://prediksi.com:8080/index.php?id=11');;
        </script>";

    //http_redirect('http://localhost:8080/board/admin.php?id=8');

    }
    elseif($_POST['ips_4']<=3.50 and $_POST['ips_4']>=3.00 and $_POST['ips_2']>=3.00 and $_POST['ips_2']<=3.50 and $_POST['sks_4']='Tinggi' and $_POST['ips_3']>=3.00)
    {
    // Simpan ke Database
    $a4="INSERT INTO tbl_prediksi values ('".$_POST['kd_prediksi']."','".$_POST['nama_mhs']."','".$_POST['sks_2']."','".$_POST['sks_3']."','".$_POST['sks_4']."','".$_POST['ips_2']."','".$_POST['ips_3']."','".$_POST['ips_4']."','Tepat Waktu')";
    $proses4=mysqli_query($connect,$a4);

    echo"<script type='text/javascript'>
        alert('Berhasil Menyimpan Data!');
        http_redirect('http://prediksi.com:8080/index.php?id=11');;
        </script>";

    //http_redirect('http://localhost:8080/board/admin.php?id=8');

    }
    elseif($_POST['ips_4']<=3.50 and $_POST['ips_4']>=3.00 and $_POST['ips_2']>=3.00 and $_POST['ips_2']<=3.50 and $_POST['sks_4']='Tinggi' and $_POST['ips_3']<3.00)
    {
    // Simpan ke Database
    $a5="INSERT INTO tbl_prediksi values ('".$_POST['kd_prediksi']."','".$_POST['nama_mhs']."','".$_POST['sks_2']."','".$_POST['sks_3']."','".$_POST['sks_4']."','".$_POST['ips_2']."','".$_POST['ips_3']."','".$_POST['ips_4']."','Tidak Tepat Waktu')";
    $proses5=mysqli_query($connect,$a5);

    echo"<script type='text/javascript'>
        alert('Berhasil Menyimpan Data!');
        http_redirect('http://prediksi.com:8080/index.php?id=11');;
        </script>";

    //http_redirect('http://localhost:8080/board/admin.php?id=8');

    }
    elseif($_POST['ips_4']<=3.50 and $_POST['ips_4']>=3.00 and $_POST['ips_2']>=3.00 and $_POST['ips_2']<=3.50 and $_POST['sks_4']='Rendah')
    {
    // Simpan ke Database
    $a6="INSERT INTO tbl_prediksi values ('".$_POST['kd_prediksi']."','".$_POST['nama_mhs']."','".$_POST['sks_2']."','".$_POST['sks_3']."','".$_POST['sks_4']."','".$_POST['ips_2']."','".$_POST['ips_3']."','".$_POST['ips_4']."','Tidak Tepat Waktu')";
    $proses6=mysqli_query($connect,$a6);

    echo"<script type='text/javascript'>
        alert('Berhasil Menyimpan Data!');
        http_redirect('http://prediksi.com:8080/index.php?id=11');;
        </script>";

    //http_redirect('http://localhost:8080/board/admin.php?id=8');

    }
    elseif($_POST['ips_4']<=3.50 and $_POST['ips_4']>=3.00 and $_POST['ips_2']<3.00)
    {
    // Simpan ke Database
    $a7="INSERT INTO tbl_prediksi values ('".$_POST['kd_prediksi']."','".$_POST['nama_mhs']."','".$_POST['sks_2']."','".$_POST['sks_3']."','".$_POST['sks_4']."','".$_POST['ips_2']."','".$_POST['ips_3']."','".$_POST['ips_4']."','Tidak Tepat Waktu')";
    $proses7=mysqli_query($connect,$a7);

    echo"<script type='text/javascript'>
        alert('Berhasil Menyimpan Data!');
        http_redirect('http://prediksi.com:8080/index.php?id=11');;
        </script>";

    //http_redirect('http://localhost:8080/board/admin.php?id=8');

    }
    elseif($_POST['ips_4']<3.00 and $_POST['ips_2']>3.50)
    {
    // Simpan ke Database
    $a8="INSERT INTO tbl_prediksi values ('".$_POST['kd_prediksi']."','".$_POST['nama_mhs']."','".$_POST['sks_2']."','".$_POST['sks_3']."','".$_POST['sks_4']."','".$_POST['ips_2']."','".$_POST['ips_3']."','".$_POST['ips_4']."','Tepat Waktu')";
    $proses8=mysqli_query($connect,$a8);

    echo"<script type='text/javascript'>
        alert('Berhasil Menyimpan Data!');
        http_redirect('http://prediksi.com:8080/index.php?id=11');;
        </script>";

    //http_redirect('http://localhost:8080/board/admin.php?id=8');

    }
    elseif($_POST['ips_4']<3.00 and $_POST['ips_2']<=3.50)
    {
    // Simpan ke Database
    $a9="INSERT INTO tbl_prediksi values ('".$_POST['kd_prediksi']."','".$_POST['nama_mhs']."','".$_POST['sks_2']."','".$_POST['sks_3']."','".$_POST['sks_4']."','".$_POST['ips_2']."','".$_POST['ips_3']."','".$_POST['ips_4']."','Tidak Tepat Waktu')";
    $proses9=mysqli_query($connect,$a9);

    echo"<script type='text/javascript'>
        alert('Berhasil Menyimpan Data!');
        http_redirect('http://prediksi.com:8080/index.php?id=11');;
        </script>";

    //http_redirect('http://localhost:8080/board/admin.php?id=8');

    }
  }
 ?>
                                                <script>
                                                    function hanyaAngka(evt){
                                                        var charCode = (evt.which) ? evt.which : event.keyCode
                                                        if (charCode > 31 && (charCode <48 || charCode > 57))

                                                        return false;
                                                        return true;
                                                    }
                                                </script>
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Input Data Prediksi
                                <small>Diisi dengan data mahasiswa yang akan diprediksi</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <a href="index.php?id=8" class="btn btn-primary pull-right">
                                    <span class="glyphicon glyphicon-upload"></span> Import Data
                                </a>
                            </ul>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                                <div class="row clearfix">

                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    	
                                        <label for="email_address_2">Nama Mahasiswa</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                        	 
                                            <div class="form-line">

                                                <input type="text" name="nama_mhs" id="email_address_2" class="form-control" placeholder="Masukkan nama lengkap">

                                            </div>
                                           <input type="text" name="kd_prediksi" id="email_address_2" hidden="true" disabled="true" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">SKS Semester 2</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" onkeypress="return hanyaAngka(event)" maxlength="2" name="sks_2"  id="password_2" class="form-control" placeholder="Masukkan jumlah sks semester 2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">SKS Semester 3</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" onkeypress="return hanyaAngka(event)" maxlength="2" name="sks_3" id="email_address_2" class="form-control" placeholder="Masukkan jumlah sks semester 3">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">SKS Semester 4</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" onkeypress="return hanyaAngka(event)" maxlength="2" name="sks_4" id="password_2" class="form-control" placeholder="Masukkan jumlah sks semester 4">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">IPS Semester 2</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" step=".01" maxlength="4" min="0" max="4" name="ips_2" id="email_address_2" class="form-control" placeholder="Masukkan jumlah ips semester 2">
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">IPS Semester 3</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" step=".01" maxlength="4" min="0" max="4" name="ips_3" id="password_2" class="form-control" placeholder="Masukkan jumlah ips semester 3">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">IPS Semester 4</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" step=".01" maxlength="4" min="0" max="4" name="ips_4" id="email_address_2" class="form-control" placeholder="Masukkan jumlah ips semester 4">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" name="simpan" class="btn btn-success m-t-15 waves-effect">Prediksi</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

         