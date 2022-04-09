<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<!-- Style untuk Loading -->
		<style>
        #loading{
			background: whitesmoke;
			position: absolute;
			top: 140px;
			left: 82px;
			padding: 5px 10px;
			border: 1px solid #ccc;
		}
		</style>
	</head>
	<body>

		<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA LAMA
                            </h2>
                            <ul class="header-dropdown m-r--5">
							<?php
								include "koneksi.php";
								$sql2 = mysqli_query($connect, "SELECT count(kd_mhs) as jumlah FROM tbl_mhs_lama");
								$row2 = mysqli_fetch_array($sql2);
                                $jml = $row2['jumlah']; 
								if	($jml>0)
								{
									echo "<a href='index.php?id=3' class='btn btn-success pull-right'>
									<span class='glyphicon glyphicon-upload'></span> Import Data
									</a>
									<a href='index.php?id=4' class='btn btn-alert pull-right'>
										<span class='glyphicon glyphicon-upload'></span> Proses Mining
									</a>";
								}
								else{
									echo "<a href='index.php?id=3' class='btn btn-success pull-right'>
									<span class='glyphicon glyphicon-upload'></span> Import Data
									</a>";
								}
							?>
                                
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
										<th>Nama</th>
										<th>SKS Semester 2</th>
										<th>SKS Semester 3</th>
										<th>SKS Semester 4</th>
										<th>IPS Semester 2</th>
										<th>IPS Semester 3</th>
										<th>IPS Semester 4</th>
										<th>Keterangan</th>
                                    </tr>
                                </thead>
                                <?php
									// Load file koneksi.php
									
									
									// Buat query untuk menampilkan semua data siswa
									$sql = mysqli_query($connect, "SELECT * FROM tbl_mhs_lama");
									
									$no = 1; // Untuk penomoran tabel, di awal set dengan 1
									while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
										echo "<tr>";
										echo "<td>".$no."</td>";
										echo "<td>".$data['nama_mhs']."</td>";
										echo "<td>".$data['sks_2']."</td>";
										echo "<td>".$data['sks_3']."</td>";
										echo "<td>".$data['sks_4']."</td>";
										echo "<td>".$data['ips_2']."</td>";
										echo "<td>".$data['ips_3']."</td>";
										echo "<td>".$data['ips_4']."</td>";
										echo "<td>".$data['ket']."</td>";
										echo "</tr>";
										
										$no++; // Tambah 1 setiap kali looping
									}
									?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</body>
</html>
