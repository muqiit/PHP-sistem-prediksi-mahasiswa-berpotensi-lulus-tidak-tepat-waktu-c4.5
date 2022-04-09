<?php 
	include 'koneksi.php';
?>


<div style="width: 800px;margin: 0px auto;">
		<div align="center"><h2>Grafik Hasil Prediksi Mahasiswa</h2></div>
		<canvas id="myChart"></canvas>
		<div>
		<br><h3>Jumlah</h3>
			<div>
				<h4 style="background-color: #FF6384;">Tidak Tepat Waktu = 
				<?php
					include 'koneksi.php';
					$jumlah_tdk1 = mysqli_query($connect,"select * from tbl_prediksi where ket='Tidak Tepat Waktu'");
					$jml_tdk1 = mysqli_num_rows($jumlah_tdk1);
					echo $jml_tdk1;
				 ?>
				</h4>
			</div>
			<div><h4 style="background-color: #36A2EB;">Tepat Waktu = 
				<?php
					//include 'koneksi.php';
					$jumlah_tpt1 = mysqli_query($connect,"select * from tbl_prediksi where ket='Tepat Waktu'");
					$jml_tpt1 = mysqli_num_rows($jumlah_tpt1);
					echo $jml_tpt1;
				 ?></h4>
			</div>
			<div><h4 style="background-color: #FFEE63;">Lebih Cepat = 
				<?php
					//include 'koneksi.php';
					$jumlah_lbh1 = mysqli_query($connect,"select * from tbl_prediksi where ket='Lebih Cepat'");
					$jml_lbh1 = mysqli_num_rows($jumlah_lbh1);
					echo $jml_lbh1;
				 ?>
			</h4>
				
			</div>
		</div>
</div>

<br>
<br>


    <script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: ["Tidak Tepat Waktu", "Tepat Waktu", "Lebih Cepat"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$jumlah_tdk = mysqli_query($connect,"select * from tbl_prediksi where ket='Tidak Tepat Waktu'");
					echo mysqli_num_rows($jumlah_tdk);
					?>, 
					<?php 
					$jumlah_tpt = mysqli_query($connect,"select * from tbl_prediksi where ket='Tepat Waktu'");
					echo mysqli_num_rows($jumlah_tpt);
                    ?>,
                    <?php 
					$jumlah_lbh = mysqli_query($connect,"select * from tbl_prediksi where ket='Lebih Cepat'");
					echo mysqli_num_rows($jumlah_lbh);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 238, 99, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 238, 99, 1)'
					],
					borderWidth: 1
				}]
			}
		});
	</script>
