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

		<!-- Load File jquery.min.js yang ada difolder js -->
		<script src="js/jquery.min.js"></script>

		<script>
		$(document).ready(function(){
			// Sembunyikan alert validasi kosong
			$("#kosong").hide();
		});
		</script>
	</head>
	<body>
		<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                IMPORT DATA
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <a href="index.php?id=6" class="btn btn-danger pull-right">
									<span class="glyphicon glyphicon-remove"></span> Cancel
								</a>

                            </ul>
                        </div>
                        <div class="body">
                            <form method="post" action="" enctype="multipart/form-data" class="form-horizontal">
                            	<a href="Format.xlsx" class="btn btn-default">
									<span class="glyphicon glyphicon-download"></span>
									Download Format
								</a><br><br>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">File</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file" name="file" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" name="preview" class="btn btn-success btn-sm">
											<span class="glyphicon glyphicon-eye-open"></span> Preview
										</button>
                                    </div>
                                </div>
                            </form>
                            <!-- Buat Preview Data -->
			<?php
			// Jika user telah mengklik tombol Preview
			if(isset($_POST['preview'])){
				//$ip = ; // Ambil IP Address dari User
				$nama_file_baru = 'data.xlsx';

				// Cek apakah terdapat file data.xlsx pada folder tmp
				if(is_file('tmp2/'.$nama_file_baru)) // Jika file tersebut ada
					unlink('tmp2/'.$nama_file_baru); // Hapus file tersebut

				$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION); // Ambil ekstensi filenya apa
				$tmp_file = $_FILES['file']['tmp_name'];

				// Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
				if($ext == "xlsx"){
					// Upload file yang dipilih ke folder tmp
					// dan rename file tersebut menjadi data{ip_address}.xlsx
					// {ip_address} diganti jadi ip address user yang ada di variabel $ip
					// Contoh nama file setelah di rename : data127.0.0.1.xlsx
					move_uploaded_file($tmp_file, 'tmp2/'.$nama_file_baru);

					// Load librari PHPExcel nya
					require_once 'PHPExcel/PHPExcel.php';

					$excelreader = new PHPExcel_Reader_Excel2007();
					$loadexcel = $excelreader->load('tmp2/'.$nama_file_baru); // Load file yang tadi diupload ke folder tmp
					$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

					// Buat sebuah tag form untuk proses import data ke database
					echo "<form method='post' action='import2.php' enctype='multipart/form-data'>";

					// Buat sebuah div untuk alert validasi kosong
					echo "<div class='alert alert-danger' id='kosong'>
					Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
					</div>";

					echo "<table class='table table-bordered'>
					<tr>
						<th colspan='8' class='text-center'>Preview Data</th>
					</tr>
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
					</tr>";

					$numrow = 1;
					$kosong = 0;
					foreach($sheet as $row){ // Lakukan perulangan dari data yang ada di excel
						// Ambil data pada excel sesuai Kolom
						$no = $row['A']; // Ambil data NIS
						$nama = $row['B']; // Ambil data nama
						$sks_2 = $row['C']; // Ambil data jenis kelamin
						$sks_3 = $row['D']; // Ambil data telepon
						$sks_4 = $row['E']; // Ambil data alamat
						$ips_2 = $row['F']; // Ambil data alamat
						$ips_3 = $row['G']; // Ambil data alamat
						$ips_4 = $row['H']; // Ambil data alamat
						$ket = $row['I']; // Ambil data alamat

						// Cek jika semua data tidak diisi
						if($no == "" && $nama == "" && $ket == "")
							continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

						// Cek $numrow apakah lebih dari 1
						// Artinya karena baris pertama adalah nama-nama kolom
						// Jadi dilewat saja, tidak usah diimport
						if($numrow > 1){
							// Validasi apakah semua data telah diisi
							$no_td = ( ! empty($no))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$nama_td = ( ! empty($nama))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
							$sks_2_td = ( ! empty($sks_2))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
							$sks_3_td = ( ! empty($sks_3))? "" : " style='background: #E07171;'"; // Jika Telepon kosong, beri warna merah
							$sks_4_td = ( ! empty($sks_4))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
							$ips_2_td = ( ! empty($ips_2))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
							$ips_3_td = ( ! empty($ips_3))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
							$ips_4_td = ( ! empty($ips_4))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
							$ket_td = ( ! empty($ket))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah

							// Jika salah satu data ada yang kosong
							if($no == "" or $nama == ""or $ket == ""){
								$kosong++; // Tambah 1 variabel $kosong
							}

							echo "<tr>";
							echo "<td".$no_td.">".$no."</td>";
							echo "<td".$nama_td.">".$nama."</td>";
							echo "<td".$sks_2_td.">".$sks_2."</td>";
							echo "<td".$sks_3_td.">".$sks_3."</td>";
							echo "<td".$sks_4_td.">".$sks_4."</td>";
							echo "<td".$ips_2_td.">".$ips_2."</td>";
							echo "<td".$ips_3_td.">".$ips_3."</td>";
							echo "<td".$ips_4_td.">".$ips_4."</td>";
							echo "<td".$ket_td.">".$ket."</td>";
							echo "</tr>";
						}

						$numrow++; // Tambah 1 setiap kali looping
					}

					echo "</table>";

			
					
							echo "<button type='submit' name='import2' class='btn btn-primary'><span class='glyphicon glyphicon-upload'></span> Import</button>";
						
					

					echo "</form>";
				}else{ // Jika file yang diupload bukan File Excel 2007 (.xlsx)
					// Munculkan pesan validasi
					echo "<div class='alert alert-danger'>
					Hanya File Excel 2007 (.xlsx) yang diperbolehkan
					</div>";
				}
			}
			?>
                        </div>
                    </div>
                </div>
        </div>
        
	</body>
</html>
