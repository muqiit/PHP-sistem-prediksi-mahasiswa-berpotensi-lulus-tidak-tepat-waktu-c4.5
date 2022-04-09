<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="header">
                            <h2>
                                List Hasil Prediksi
                            </h2>
                           <!--  <ul class="header-dropdown m-r--5">
                                <button type="submit" name="update" class="btn btn-info pull-right"><span class="glyphicon glyphicon-upload"></span> Cek Prediksi</button>
                               
                            </ul> -->
                        </div>
                    </form>
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
                                <tbody>
                                      <?php
                                    // Load file koneksi.php
                                    include "koneksi.php";
                                    
                                    // Buat query untuk menampilkan semua data siswa
                                    $sql = mysqli_query($connect, "SELECT * FROM tbl_prediksi");
                                    
                                    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
                                    while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                                        echo "<tr>";
                                        echo "<td>".$no."</td>";
                                        // echo "<td>".$data['kd_prediksi']."</td>";
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
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
</div>