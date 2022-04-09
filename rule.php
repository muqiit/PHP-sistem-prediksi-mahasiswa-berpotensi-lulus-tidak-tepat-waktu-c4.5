<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Hasil Rule
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <a href="index.php?id=4" class="btn btn-alert pull-right">
                                    <span class="glyphicon glyphicon-upload"></span> Kembali
                                </a>
                                
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Rule</th>
                                        <th>Keputusan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	  <?php
									// Load file koneksi.php
									include "koneksi.php";
									
									// Buat query untuk menampilkan semua data siswa
									$sql = mysqli_query($connect, "SELECT * FROM tbl_keputusan");
									
									$no = 1; // Untuk penomoran tabel, di awal set dengan 1
									while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
										echo "<tr>";
										echo "<td>".$no."</td>";
										echo "<td>".$data['parent']." and ".$data['akar']."</td>";
										echo "<td>".$data['keputusan']."</td>";
										echo "</tr>";
										
										$no++; // Tambah 1 setiap kali looping
									}
									?>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>