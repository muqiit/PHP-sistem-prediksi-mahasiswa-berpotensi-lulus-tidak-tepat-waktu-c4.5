<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                CONFUSSION MATRIX
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <a href="index.php?id=4" class="btn btn-alert pull-right">
                                    <span class="glyphicon glyphicon-upload"></span> Kembali
                                </a>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-striped">
                               <tr align="center">
                                    <td rowspan="2"><h4>Classification</h4></td>
                                    <td colspan="3"><h5>Prediction</h5></td>
                                   
                               </tr>
                               <tr align="center">
                                    <td>Tidak Tepat Waktu</td>
                                    <td>Tepat Waktu</td>
                                    <td>Lebih Cepat</td>
                               </tr>
                               <tr align="center">
                                    <td>Tidak Tepat Waktu</td>
                                    <?php
                                        include "koneksi.php";
                                       

                                        function akurasi($a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9)
                                        {
                                            $p1 = $a1 + $a2 + $a3;
                                            $p2 = $a1 + $a2 + $a3 + $a4 + $a5 +  $a6 + $a7 + $a8 + $a9;
                                            $p3 = $p1 / $p2;
                                            $p4 = $p3 * 100;

                                            $hasil = $p4;
                                            return round($hasil,2);
                                        }

                                        $tdk = "SELECT COUNT(tbl_mhs_lama.kd_mhs) as jumlah FROM `tbl_mhs_lama`, tbl_kls_asli WHERE tbl_mhs_lama.kd_mhs=tbl_kls_asli.npm and tbl_mhs_lama.ket='Tidak Tepat Waktu' and tbl_kls_asli.ket_asli='Tidak Tepat Waktu'";
                                        $r = mysqli_query($connect, $tdk); // Result resource
                                        $row = mysqli_fetch_array($r);
                                        $tdk = $row['jumlah']; // Use something like this to get the result
                                        echo "<td>".$tdk."</td>"; 

                                        $tpttdk = "SELECT COUNT(tbl_mhs_lama.kd_mhs) as jumlah FROM `tbl_mhs_lama`, tbl_kls_asli WHERE tbl_mhs_lama.kd_mhs=tbl_kls_asli.npm and tbl_mhs_lama.ket='Tepat Waktu' and tbl_kls_asli.ket_asli='Tidak Tepat Waktu'";
                                        $r2 = mysqli_query($connect, $tpttdk); // Result resource
                                        $row2 = mysqli_fetch_array($r2);
                                        $tpttdk = $row2['jumlah']; // Use something like this to get the result
                                        echo "<td>".$tpttdk."</td>"; 

                                        $lbhtdk = "SELECT COUNT(tbl_mhs_lama.kd_mhs) as jumlah FROM `tbl_mhs_lama`, tbl_kls_asli WHERE tbl_mhs_lama.kd_mhs=tbl_kls_asli.npm and tbl_mhs_lama.ket='Lebih Cepat' and tbl_kls_asli.ket_asli='Tidak Tepat Waktu'";
                                        $r3 = mysqli_query($connect, $lbhtdk); // Result resource
                                        $row3 = mysqli_fetch_array($r3);
                                        $lbhtdk = $row3['jumlah']; // Use something like this to get the result
                                        echo "<td>".$lbhtdk."</td>"; 
                                    ?>
                               </tr>
                               <tr align="center">
                                    <td>Tepat Waktu</td>
                                    <?php
                                        $tdktpt = "SELECT COUNT(tbl_mhs_lama.kd_mhs) as jumlah FROM `tbl_mhs_lama`, tbl_kls_asli WHERE tbl_mhs_lama.kd_mhs=tbl_kls_asli.npm and tbl_mhs_lama.ket='Tidak Tepat Waktu' and tbl_kls_asli.ket_asli='Tepat Waktu'";
                                        $r4 = mysqli_query($connect, $tdktpt); // Result resource
                                        $row4 = mysqli_fetch_array($r4);
                                        $tdktpt = $row4['jumlah']; // Use something like this to get the result
                                        echo "<td>".$tdktpt."</td>"; 

                                        $tpt = "SELECT COUNT(tbl_mhs_lama.kd_mhs) as jumlah FROM `tbl_mhs_lama`, tbl_kls_asli WHERE tbl_mhs_lama.kd_mhs=tbl_kls_asli.npm and tbl_mhs_lama.ket='Tepat Waktu' and tbl_kls_asli.ket_asli='Tepat Waktu'";
                                        $r5 = mysqli_query($connect, $tpt); // Result resource
                                        $row5 = mysqli_fetch_array($r5);
                                        $tpt = $row5['jumlah']; // Use something like this to get the result
                                        echo "<td>".$tpt."</td>"; 

                                        $lbhtpt = "SELECT COUNT(tbl_mhs_lama.kd_mhs) as jumlah FROM `tbl_mhs_lama`, tbl_kls_asli WHERE tbl_mhs_lama.kd_mhs=tbl_kls_asli.npm and tbl_mhs_lama.ket='Lebih Cepat' and tbl_kls_asli.ket_asli='Tepat Waktu'";
                                        $r6 = mysqli_query($connect, $lbhtpt); // Result resource
                                        $row6 = mysqli_fetch_array($r6);
                                        $lbhtpt = $row6['jumlah']; // Use something like this to get the result
                                        echo "<td>".$lbhtpt."</td>"; 
                                    ?>
                               </tr>
                               <tr align="center">
                                    <td>Lebih Cepat</td>
                                    <?php
                                        $tdklbh = "SELECT COUNT(tbl_mhs_lama.kd_mhs) as jumlah FROM `tbl_mhs_lama`, tbl_kls_asli WHERE tbl_mhs_lama.kd_mhs=tbl_kls_asli.npm and tbl_mhs_lama.ket='Tidak Tepat Waktu' and tbl_kls_asli.ket_asli='Lebih Cepat'";
                                        $r7 = mysqli_query($connect, $tdklbh); // Result resource
                                        $row7 = mysqli_fetch_array($r7);
                                        $tdklbh = $row7['jumlah']; // Use something like this to get the result
                                        echo "<td>".$tdklbh."</td>"; 

                                        $tptlbh = "SELECT COUNT(tbl_mhs_lama.kd_mhs) as jumlah FROM `tbl_mhs_lama`, tbl_kls_asli WHERE tbl_mhs_lama.kd_mhs=tbl_kls_asli.npm and tbl_mhs_lama.ket='Tepat Waktu' and tbl_kls_asli.ket_asli='Lebih Cepat'";
                                        $r8 = mysqli_query($connect, $tptlbh); // Result resource
                                        $row8 = mysqli_fetch_array($r8);
                                        $tptlbh = $row8['jumlah']; // Use something like this to get the result
                                        echo "<td>".$tptlbh."</td>"; 

                                        $lbh = "SELECT COUNT(tbl_mhs_lama.kd_mhs) as jumlah FROM `tbl_mhs_lama`, tbl_kls_asli WHERE tbl_mhs_lama.kd_mhs=tbl_kls_asli.npm and tbl_mhs_lama.ket='Lebih Cepat' and tbl_kls_asli.ket_asli='Lebih Cepat'";
                                        $r9 = mysqli_query($connect, $lbh); // Result resource
                                        $row9 = mysqli_fetch_array($r9);
                                        $lbh = $row9['jumlah']; // Use something like this to get the result
                                        echo "<td>".$lbh."</td>";
                                    ?>
                               </tr>
                            </table>
                            <br>

                            <?php
                                echo "<h4>Accuracy =".akurasi($tdk,$tpt,$lbh,$tpttdk,$lbhtdk,$tdktpt,$lbhtpt,$tdklbh,$tptlbh)." % </h4>";
                            ?> 
                        </div>
                    </div>
                </div>
            </div>
		</div>