
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                HASIL MINING
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <a href="index.php?id=5" class="btn btn-success pull-right">
                                    <span class="glyphicon glyphicon-upload"></span> Rule
                                </a>
                                <a href="index.php?id=9" class="btn btn-primary pull-right">
                                    <span class="glyphicon glyphicon-upload"></span> Akurasi
                                </a>
                                <a href="index.php?id=2" class="btn btn-alert pull-right">
                                    <span class="glyphicon glyphicon-upload"></span> Kembali
                                </a>
                                
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Atribut</th>
                                        <th>Jumlah Kasus</th>
                                        <th>Tidak Tepat Waktu</th>
                                        <th>Tepat Waktu</th>
                                        <th>Lebih Cepat</th>
                                        <th>Entrophy</th>
                                        <th>Gain</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Load file koneksi.php
                                    include "koneksi.php";
                                    $jml = "SELECT COUNT(*) AS jumlah FROM tbl_mhs_lama";
                                    $r = mysqli_query($connect, $jml); // Result resource
                                    $row = mysqli_fetch_array($r);
                                    $jml = $row['jumlah']; // Use something like this to get the result
                                    echo "Jumlah = " .$jml."<br>"; 

                                    $tdk = "SELECT COUNT(ket) AS ket FROM tbl_mhs_lama where ket='Tidak Tepat Waktu'";
                                    $r2 = mysqli_query($connect, $tdk); // Result resource
                                    $row2 = mysqli_fetch_array($r2); 
                                    $tdk = $row2['ket']; // Use something like this to get the result
                                    echo "Tidak Tepat Waktu = ".$tdk."<br>";

                                    $tpt = "SELECT COUNT(ket) AS ket2 FROM tbl_mhs_lama where ket='Tepat Waktu'";
                                    $r3 = mysqli_query($connect, $tpt); // Result resource
                                    $row3 = mysqli_fetch_array($r3); 
                                    $tpt = $row3['ket2']; // Use something like this to get the result
                                    echo "Tepat Waktu = ".$tpt."<br>";

                                    $lbh = "SELECT COUNT(ket) AS ket3 FROM tbl_mhs_lama where ket='Lebih Cepat'";
                                    $r4 = mysqli_query($connect, $lbh); // Result resource
                                    $row4 = mysqli_fetch_array($r4);
                                    $lbh = $row4['ket3']; // Use something like this to get the result
                                    echo "Lebih Cepat = ".$lbh."<br>";

                                    function format_decimal($value){
                                        return round($value, 2);
                                    }

                                   

                                    //fungsi menghitung entropy
                                    function hitung_entropy($nilai1, $nilai2, $nilai3) {
                                        $total = $nilai1 + $nilai2 + $nilai3;
                                        //jika salah satu nilai 0, maka entropy 0
                                    //    if ($nilai1 == 0 || $nilai2 == 0 || $nilai3 == 0 || $nilai4 == 0) {
                                    //        $entropy = 0;
                                    //    }
                                    //    else {
                                        $atribut1 = (-($nilai1 / $total) * (log(($nilai1 / $total), 2)));
                                        $atribut2 = (-($nilai2 / $total) * (log(($nilai2 / $total), 2)));
                                        $atribut3 = (-($nilai3 / $total) * (log(($nilai3 / $total), 2)));
                                        
                                        $atribut1 = is_nan($atribut1)?0:$atribut1;
                                        $atribut2 = is_nan($atribut2)?0:$atribut2;
                                        $atribut3 = is_nan($atribut3)?0:$atribut3;
                                        
                                            $entropy = $atribut1 + 
                                                        $atribut2 + 
                                                        $atribut3;
                                    //    }
                                        //desimal 3 angka dibelakang koma
                                        $entropy = format_decimal($entropy);
                                        return $entropy;
                                    }



                                    $entropy_all = hitung_entropy($tdk, $tpt, $lbh);
                                    echo "Entropy All = " . format_decimal($entropy_all) . "<br>";

                                    function hitung_gain($entropy_all, $jml, $kasus1, $kasus2, $ent_1, $ent_2)
                                     {
                                        
                                        $hasil1=$entropy_all-($kasus1/$jml*$ent_1)+($kasus2/$jml*$ent_2);

                                        return $hasil1; 
                                     }

                                    function hitung_gain2($entropy_all, $jml, $kasus1, $kasus2, $ent_1, $ent_2)
                                     {
                                        
                                        $hasil=$entropy_all-(($kasus1/$jml*$ent_1)+($kasus2/$jml*$ent_2));

                                        return $hasil; 
                                     }

                                     function hitung_gain3($entropy_all, $jml, $kasus1, $kasus2, $kasus3, $ent_1, $ent_2, $ent_3)
                                     {
                                        
                                        $hasil3=$entropy_all-(($kasus1/$jml*$ent_1)+($kasus2/$jml*$ent_2)+($kasus3/$jml*$ent_3));

                                        return $hasil3; 
                                     }
                                     function hitung_gain32($entropy_all, $jml, $kasus1, $kasus2, $kasus3, $ent_1, $ent_2, $ent_3)
                                     {
                                        
                                        $hasil32=$entropy_all-($kasus1/$jml*$ent_1)+($kasus2/$jml*$ent_2)+($kasus3/$jml*$ent_3);

                                        return $hasil32; 
                                     }

                                    ?> 
                                    <tr>
                                        <th scope="row" rowspan="2">1</th>
                                        <td>SKS Semester 2 Rendah </td>
                                            <?php
                                            

                                                $sks2 = "SELECT COUNT(sks_2) AS sks2 FROM tbl_mhs_lama where sks_2<18";
                                                $r5 = mysqli_query($connect, $sks2); // Result resource
                                                $row5 = mysqli_fetch_array($r5);
                                                $sks2 = $row5['sks2']; // Use something like this to get the result
                                                echo "<td>".$sks2."</td>";
                                        
                                            
                                            
                                                $sks2tdk = "SELECT COUNT(sks_2) AS sks2tdk FROM tbl_mhs_lama where sks_2<18 and ket='Tidak Tepat Waktu'";
                                                $r6 = mysqli_query($connect, $sks2tdk); // Result resource
                                                $row6 = mysqli_fetch_array($r6);
                                                $sks2tdk = $row6['sks2tdk']; // Use something like this to get the result
                                                echo "<td>".$sks2tdk."</td>";
                                            

                                            
                                                $sks2tpt = "SELECT COUNT(sks_2) AS sks2tpt FROM tbl_mhs_lama where sks_2<18 and ket='Tepat Waktu'";
                                                $r7 = mysqli_query($connect, $sks2tpt); // Result resource
                                                $row7 = mysqli_fetch_array($r7);
                                                $sks2tpt = $row7['sks2tpt']; // Use something like this to get the result
                                                echo "<td>".$sks2tpt."</td>";

                                                $sks2lbh = "SELECT COUNT(sks_2) AS sks2lbh FROM tbl_mhs_lama where sks_2<18 and ket='Lebih Cepat'";
                                                $r8 = mysqli_query($connect, $sks2lbh); // Result resource
                                                $row8 = mysqli_fetch_array($r8);
                                                $sks2lbh = $row8['sks2lbh']; // Use something like this to get the result
                                                echo "<td>".$sks2lbh."</td>";

                                                $entropy_sks2 = hitung_entropy($sks2tdk, $sks2tpt, $sks2lbh);
                                                echo "<td>".$entropy_sks2."</td>";

                                                

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>SKS Semester 2 Tinggi </td>
                                            <?php
                                                $sks22 = "SELECT COUNT(sks_2) AS sks22 FROM tbl_mhs_lama where sks_2>=18";
                                                $r9 = mysqli_query($connect, $sks22); // Result resource
                                                $row9 = mysqli_fetch_array($r9);
                                                $sks22 = $row9['sks22']; // Use something like this to get the result
                                                echo "<td>".$sks22."</td>";
                                        
                                            
                                            
                                                $sks2tdk2 = "SELECT COUNT(sks_2) AS sks2tdk2 FROM tbl_mhs_lama where sks_2>=18 and ket='Tidak Tepat Waktu'";
                                                $r10 = mysqli_query($connect, $sks2tdk2); // Result resource
                                                $row10 = mysqli_fetch_array($r10);
                                                $sks2tdk2 = $row10['sks2tdk2']; // Use something like this to get the result
                                                echo "<td>".$sks2tdk2."</td>";
                                            

                                            
                                                $sks2tpt2 = "SELECT COUNT(sks_2) AS sks2tpt2 FROM tbl_mhs_lama where sks_2>=18 and ket='Tepat Waktu'";
                                                $r11 = mysqli_query($connect, $sks2tpt2); // Result resource
                                                $row11 = mysqli_fetch_array($r11);
                                                $sks2tpt2 = $row11['sks2tpt2']; // Use something like this to get the result
                                                echo "<td>".$sks2tpt2."</td>";

                                                $sks2lbh2 = "SELECT COUNT(sks_2) AS sks2lbh2 FROM tbl_mhs_lama where sks_2>=18 and ket='Lebih Cepat'";
                                                $r12 = mysqli_query($connect, $sks2lbh2); // Result resource
                                                $row12 = mysqli_fetch_array($r12);
                                                $sks2lbh2 = $row12['sks2lbh2']; // Use something like this to get the result
                                                echo "<td>".$sks2lbh2."</td>";

                                                $entropy_sks22 = hitung_entropy($sks2tdk2, $sks2tpt2, $sks2lbh2);
                                                echo "<td>".$entropy_sks22."</td>";

                                                $gain = hitung_gain2($entropy_all, $jml, $sks2, $sks22, $entropy_sks2, $entropy_sks22);
                                                echo "<td>".format_decimal($gain)."</td>";
                                                
                                            ?>
                                        
                                       
                                        
                                    
                                    </tr>

                                    <tr>
                                        <th scope="row" rowspan="2">2</th>
                                        <td>SKS Semester 3 Rendah </td>
                                            <?php
                                            
                                                $sks3 = "SELECT COUNT(sks_3) AS sks3 FROM tbl_mhs_lama where sks_3<18";
                                                $r13 = mysqli_query($connect, $sks3); // Result resource
                                                $row13 = mysqli_fetch_array($r13);
                                                $sks3 = $row13['sks3']; // Use something like this to get the result
                                                echo "<td>".$sks3."</td>";
                                        
                                            
                                                $sks3tdk = "SELECT COUNT(sks_3) AS sks3tdk FROM tbl_mhs_lama where sks_3<18 and ket='Tidak Tepat Waktu'";
                                                $r14 = mysqli_query($connect, $sks3tdk); // Result resource
                                                $row14 = mysqli_fetch_array($r14);
                                                $sks3tdk = $row14['sks3tdk']; // Use something like this to get the result
                                                echo "<td>".$sks3tdk."</td>";
                                            

                                            
                                                $sks3tpt = "SELECT COUNT(sks_3) AS sks3tpt FROM tbl_mhs_lama where sks_3<18 and ket='Tepat Waktu'";
                                                $r15 = mysqli_query($connect, $sks3tpt); // Result resource
                                                $row15 = mysqli_fetch_array($r15);
                                                $sks3tpt = $row15['sks3tpt']; // Use something like this to get the result
                                                echo "<td>".$sks3tpt."</td>";

                                                $sks3lbh = "SELECT COUNT(sks_3) AS sks3lbh FROM tbl_mhs_lama where sks_3<18 and ket='Lebih Cepat'";
                                                $r16 = mysqli_query($connect, $sks3lbh); // Result resource
                                                $row16 = mysqli_fetch_array($r16);
                                                $sks3lbh = $row16['sks3lbh']; // Use something like this to get the result
                                                echo "<td>".$sks3lbh."</td>";

                                                $entropy_sks3 = hitung_entropy($sks3tdk, $sks3tpt, $sks3lbh);
                                                echo "<td>".$entropy_sks3."</td>";

                                                

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>SKS Semester 3 Tinggi </td>
                                            <?php
                                            
                                                $sks33 = "SELECT COUNT(sks_3) AS sks33 FROM tbl_mhs_lama where sks_3>=18";
                                                $r17 = mysqli_query($connect, $sks33); // Result resource
                                                $row17 = mysqli_fetch_array($r17);
                                                $sks33 = $row17['sks33']; // Use something like this to get the result
                                                echo "<td>".$sks33."</td>";
                                        
                                            
                                            
                                                $sks3tdk2 = "SELECT COUNT(sks_3) AS sks3tdk2 FROM tbl_mhs_lama where sks_3>=18 and ket='Tidak Tepat Waktu'";
                                                $r18 = mysqli_query($connect, $sks3tdk2); // Result resource
                                                $row18 = mysqli_fetch_array($r18);
                                                $sks3tdk2 = $row18['sks3tdk2']; // Use something like this to get the result
                                                echo "<td>".$sks3tdk2."</td>";
                                            

                                            
                                                $sks3tpt2 = "SELECT COUNT(sks_3) AS sks3tpt2 FROM tbl_mhs_lama where sks_3>=18 and ket='Tepat Waktu'";
                                                $r19 = mysqli_query($connect, $sks3tpt2); // Result resource
                                                $row19 = mysqli_fetch_array($r19);
                                                $sks3tpt2 = $row19['sks3tpt2']; // Use something like this to get the result
                                                echo "<td>".$sks3tpt2."</td>";

                                                $sks3lbh2 = "SELECT COUNT(sks_3) AS sks3lbh2 FROM tbl_mhs_lama where sks_3>=18 and ket='Lebih Cepat'";
                                                $r20 = mysqli_query($connect, $sks3lbh2); // Result resource
                                                $row20 = mysqli_fetch_array($r20);
                                                $sks3lbh2 = $row20['sks3lbh2']; // Use something like this to get the result
                                                echo "<td>".$sks3lbh2."</td>";

                                                $entropy_sks32 = hitung_entropy($sks3tdk2, $sks3tpt2, $sks3lbh2);
                                                echo "<td>".$entropy_sks32."</td>";

                                                $gain2 = hitung_gain2($entropy_all, $jml, $sks3, $sks33, $entropy_sks3, $entropy_sks32);
                                                echo "<td>".format_decimal($gain2)."</td>";

                                            ?>
                                        
                                    </tr>
                                    <tr>
                                        <th scope="row" rowspan="2">3</th>
                                        <td>SKS Semester 4 Rendah </td>
                                            <?php
                                            
                                                $sks4 = "SELECT COUNT(sks_4) AS sks4 FROM tbl_mhs_lama where sks_4<18";
                                                $r21 = mysqli_query($connect, $sks4); // Result resource
                                                $row21 = mysqli_fetch_array($r21);
                                                $sks4 = $row21['sks4']; // Use something like this to get the result
                                                echo "<td>".$sks4."</td>";
                                        
                                            
                                            
                                                $sks4tdk = "SELECT COUNT(sks_4) AS sks4tdk FROM tbl_mhs_lama where sks_4<18 and ket='Tidak Tepat Waktu'";
                                                $r22 = mysqli_query($connect, $sks4tdk); // Result resource
                                                $row22 = mysqli_fetch_array($r22);
                                                $sks4tdk = $row22['sks4tdk']; // Use something like this to get the result
                                                echo "<td>".$sks4tdk."</td>";
                                            

                                            
                                                $sks4tpt = "SELECT COUNT(sks_4) AS sks4tpt FROM tbl_mhs_lama where sks_4<18 and ket='Tepat Waktu'";
                                                $r23 = mysqli_query($connect, $sks4tpt); // Result resource
                                                $row23 = mysqli_fetch_array($r23);
                                                $sks4tpt = $row23['sks4tpt']; // Use something like this to get the result
                                                echo "<td>".$sks4tpt."</td>";

                                                $sks4lbh = "SELECT COUNT(sks_4) AS sks4lbh FROM tbl_mhs_lama where sks_4<18 and ket='Lebih Cepat'";
                                                $r24 = mysqli_query($connect, $sks4lbh); // Result resource
                                                $row24 = mysqli_fetch_array($r24);
                                                $sks4lbh = $row24['sks4lbh']; // Use something like this to get the result
                                                echo "<td>".$sks4lbh."</td>";

                                                $entropy_sks4 = hitung_entropy($sks4tdk, $sks4tpt, $sks4lbh);
                                                echo "<td>".$entropy_sks4."</td>";

                                                

                                            ?>
                                            <td></td>
                                    </tr>
                                    <tr>
                                        <td>SKS Semester 4 Tinggi </td>
                                            <?php
                                            
                                                $sks42 = "SELECT COUNT(sks_4) AS sks42 FROM tbl_mhs_lama where sks_4>=18";
                                                $r25 = mysqli_query($connect, $sks42); // Result resource
                                                $row25 = mysqli_fetch_array($r25);
                                                $sks42 = $row25['sks42']; // Use something like this to get the result
                                                echo "<td>".$sks42."</td>";
                                        
                                            
                                            
                                                $sks4tdk2 = "SELECT COUNT(sks_4) AS sks4tdk2 FROM tbl_mhs_lama where sks_4>=18 and ket='Tidak Tepat Waktu'";
                                                $r26 = mysqli_query($connect, $sks4tdk2); // Result resource
                                                $row26 = mysqli_fetch_array($r26);
                                                $sks4tdk2 = $row26['sks4tdk2']; // Use something like this to get the result
                                                echo "<td>".$sks4tdk2."</td>";
                                            

                                            
                                                $sks4tpt2 = "SELECT COUNT(sks_4) AS sks4tpt2 FROM tbl_mhs_lama where sks_4>=18 and ket='Tepat Waktu'";
                                                $r27 = mysqli_query($connect, $sks4tpt2); // Result resource
                                                $row27 = mysqli_fetch_array($r27);
                                                $sks4tpt2 = $row27['sks4tpt2']; // Use something like this to get the result
                                                echo "<td>".$sks4tpt2."</td>";

                                                $sks4lbh2 = "SELECT COUNT(sks_4) AS sks4lbh2 FROM tbl_mhs_lama where sks_4>=18 and ket='Lebih Cepat'";
                                                $r28 = mysqli_query($connect, $sks4lbh2); // Result resource
                                                $row28 = mysqli_fetch_array($r28);
                                                $sks4lbh2 = $row28['sks4lbh2']; // Use something like this to get the result
                                                echo "<td>".$sks4lbh2."</td>";

                                                $entropy_sks42 = hitung_entropy($sks4tdk2, $sks4tpt2, $sks4lbh2);
                                                echo "<td>".$entropy_sks42."</td>";

                                                $gain3 = hitung_gain2($entropy_all, $jml, $sks4, $sks42, $entropy_sks4, $entropy_sks42);
                                                echo "<td>".format_decimal($gain3)."</td>";

                                            ?>
                                    </tr>
                                    <tr>
                                        <th scope="row" rowspan="3">4</th>
                                        <td>IPS Semester 2 <'3.00' </td>
                                            <?php
                                            
                                                $ips2 = "SELECT COUNT(ips_2) AS ips2 FROM tbl_mhs_lama where ips_2<3.00";
                                                $r29 = mysqli_query($connect, $ips2); // Result resource
                                                $row29 = mysqli_fetch_array($r29);
                                                $ips2 = $row29['ips2']; // Use something like this to get the result
                                                echo "<td>".$ips2."</td>";
                                        
                                            
                                            
                                                $ips2tdk = "SELECT COUNT(ips_2) AS ips2tdk FROM tbl_mhs_lama where ips_2<3.00 and ket='Tidak Tepat Waktu'";
                                                $r30 = mysqli_query($connect, $ips2tdk); // Result resource
                                                $row30 = mysqli_fetch_array($r30);
                                                $ips2tdk = $row30['ips2tdk']; // Use something like this to get the result
                                                echo "<td>".$ips2tdk."</td>";
                                            

                                            
                                                $ips2tpt = "SELECT COUNT(ips_2) AS ips2tpt FROM tbl_mhs_lama where ips_2<3.00 and ket='Tepat Waktu'";
                                                $r31 = mysqli_query($connect, $ips2tpt); // Result resource
                                                $row31 = mysqli_fetch_array($r31);
                                                $ips2tpt = $row31['ips2tpt']; // Use something like this to get the result
                                                echo "<td>".$ips2tpt."</td>";

                                                $ips2lbh = "SELECT COUNT(ips_2) AS ips2lbh FROM tbl_mhs_lama where ips_2<3.00 and ket='Lebih Cepat'";
                                                $r32 = mysqli_query($connect, $ips2lbh); // Result resource
                                                $row32 = mysqli_fetch_array($r32);
                                                $ips2lbh = $row32['ips2lbh']; // Use something like this to get the result
                                                echo "<td>".$ips2lbh."</td>";

                                                $entropy_ips2 = hitung_entropy($ips2tdk, $ips2tpt, $ips2lbh);
                                                echo "<td>".$entropy_ips2."</td>";

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>IPS Semester 2 <='3.50' </td>
                                            <?php
                                            
                                                $ips22 = "SELECT COUNT(ips_2) AS ips22 FROM tbl_mhs_lama where ips_2>=3.00 and ips_2<=3.50";
                                                $r33 = mysqli_query($connect, $ips22); // Result resource
                                                $row33 = mysqli_fetch_array($r33);
                                                $ips22 = $row33['ips22']; // Use something like this to get the result
                                                echo "<td>".$ips22."</td>";
                                        
                                            
                                            
                                                $ips2tdk2 = "SELECT COUNT(ips_2) AS ips2tdk2 FROM tbl_mhs_lama where ips_2>=3.00 and ips_2<=3.50 and ket='Tidak Tepat Waktu'";
                                                $r34 = mysqli_query($connect, $ips2tdk2); // Result resource
                                                $row34 = mysqli_fetch_array($r34);
                                                $ips2tdk2 = $row34['ips2tdk2']; // Use something like this to get the result
                                                echo "<td>".$ips2tdk2."</td>";
                                            

                                            
                                                $ips2tpt2 = "SELECT COUNT(ips_2) AS ips2tpt2 FROM tbl_mhs_lama where ips_2>=3.00 and ips_2<=3.50 and ket='Tepat Waktu'";
                                                $r35 = mysqli_query($connect, $ips2tpt2); // Result resource
                                                $row35 = mysqli_fetch_array($r35);
                                                $ips2tpt2 = $row35['ips2tpt2']; // Use something like this to get the result
                                                echo "<td>".$ips2tpt2."</td>";

                                                $ips2lbh2 = "SELECT COUNT(ips_2) AS ips2lbh2 FROM tbl_mhs_lama where ips_2>=3.00 and ips_2<=3.50 and ket='Lebih Cepat'";
                                                $r36 = mysqli_query($connect, $ips2lbh2); // Result resource
                                                $row36 = mysqli_fetch_array($r36);
                                                $ips2lbh2 = $row36['ips2lbh2']; // Use something like this to get the result
                                                echo "<td>".$ips2lbh2."</td>";

                                                $entropy_ips22 = hitung_entropy($ips2tdk2, $ips2tpt2, $ips2lbh2);
                                                echo "<td>".$entropy_ips22."</td>";

                                            ?>
                                            <td></td>
                                    </tr>
                                    <tr>
                                        <td>IPS Semester 2 >'3.50' </td>
                                            <?php
                                            
                                                $ips23 = "SELECT COUNT(ips_2) AS ips23 FROM tbl_mhs_lama where  ips_2>3.50";
                                                $r37 = mysqli_query($connect, $ips23); // Result resource
                                                $row37 = mysqli_fetch_array($r37);
                                                $ips23 = $row37['ips23']; // Use something like this to get the result
                                                echo "<td>".$ips23."</td>";
                                        
                                            
                                            
                                                $ips2tdk3 = "SELECT COUNT(ips_2) AS ips2tdk3 FROM tbl_mhs_lama where ips_2>3.50 and ket='Tidak Tepat Waktu'";
                                                $r38 = mysqli_query($connect, $ips2tdk3); // Result resource
                                                $row38 = mysqli_fetch_array($r38);
                                                $ips2tdk3 = $row38['ips2tdk3']; // Use something like this to get the result
                                                echo "<td>".$ips2tdk3."</td>";
                                            

                                            
                                                $ips2tpt3 = "SELECT COUNT(ips_2) AS ips2tpt3 FROM tbl_mhs_lama where ips_2>3.50 and ket='Tepat Waktu'";
                                                $r39 = mysqli_query($connect, $ips2tpt3); // Result resource
                                                $row39 = mysqli_fetch_array($r39);
                                                $ips2tpt3 = $row39['ips2tpt3']; // Use something like this to get the result
                                                echo "<td>".$ips2tpt3."</td>";

                                                $ips2lbh3 = "SELECT COUNT(ips_2) AS ips2lbh3 FROM tbl_mhs_lama where ips_2>3.50 and ket='Lebih Cepat'";
                                                $r40 = mysqli_query($connect, $ips2lbh3); // Result resource
                                                $row40 = mysqli_fetch_array($r40);
                                                $ips2lbh3 = $row40['ips2lbh3']; // Use something like this to get the result
                                                echo "<td>".$ips2lbh3."</td>";

                                                $entropy_ips23 = hitung_entropy($ips2tdk3, $ips2tpt3, $ips2lbh3);
                                                echo "<td>".$entropy_ips23."</td>";

                                                $gain4 = hitung_gain3($entropy_all, $jml, $ips2, $ips22, $ips23, $entropy_ips2, $entropy_ips22, $entropy_ips23);
                                                echo "<td>".format_decimal($gain4)."</td>";

                                            ?>
                                    </tr>


                                    <tr>
                                        <th scope="row" rowspan="3">5</th>
                                        <td>IPS Semester 3 <'3.00' </td>
                                            <?php
                                            
                                                $ips3 = "SELECT COUNT(ips_3) AS ips3 FROM tbl_mhs_lama where ips_3<3.00";
                                                $r41 = mysqli_query($connect, $ips3); // Result resource
                                                $row41 = mysqli_fetch_array($r41);
                                                $ips3 = $row41['ips3']; // Use something like this to get the result
                                                echo "<td>".$ips3."</td>";
                                        
                                            
                                            
                                                $ips3tdk = "SELECT COUNT(ips_3) AS ips3tdk FROM tbl_mhs_lama where ips_3<3.00 and ket='Tidak Tepat Waktu'";
                                                $r42 = mysqli_query($connect, $ips3tdk); // Result resource
                                                $row42 = mysqli_fetch_array($r42);
                                                $ips3tdk = $row42['ips3tdk']; // Use something like this to get the result
                                                echo "<td>".$ips3tdk."</td>";
                                            

                                            
                                                $ips3tpt = "SELECT COUNT(ips_3) AS ips3tpt FROM tbl_mhs_lama where ips_3<3.00 and ket='Tepat Waktu'";
                                                $r43 = mysqli_query($connect, $ips3tpt); // Result resource
                                                $row43 = mysqli_fetch_array($r43);
                                                $ips3tpt = $row43['ips3tpt']; // Use something like this to get the result
                                                echo "<td>".$ips3tpt."</td>";

                                                $ips3lbh = "SELECT COUNT(ips_3) AS ips3lbh FROM tbl_mhs_lama where ips_3<3.00 and ket='Lebih Cepat'";
                                                $r44 = mysqli_query($connect, $ips3lbh); // Result resource
                                                $row44 = mysqli_fetch_array($r44);
                                                $ips3lbh = $row44['ips3lbh']; // Use something like this to get the result
                                                echo "<td>".$ips3lbh."</td>";

                                                $entropy_ips3 = hitung_entropy($ips3tdk, $ips3tpt, $ips3lbh);
                                                echo "<td>".$entropy_ips3."</td>";

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>IPS Semester 3 <='3.50' </td>
                                            <?php
                                            
                                                $ips32 = "SELECT COUNT(ips_3) AS ips32 FROM tbl_mhs_lama where ips_3>=3.00 and ips_3<=3.50";
                                                $r45 = mysqli_query($connect, $ips32); // Result resource
                                                $row45 = mysqli_fetch_array($r45);
                                                $ips32 = $row45['ips32']; // Use something like this to get the result
                                                echo "<td>".$ips32."</td>";
                                        
                                            
                                            
                                                $ips3tdk2 = "SELECT COUNT(ips_3) AS ips3tdk2 FROM tbl_mhs_lama where ips_3>=3.00 and ips_3<=3.50 and ket='Tidak Tepat Waktu'";
                                                $r46 = mysqli_query($connect, $ips3tdk2); // Result resource
                                                $row46 = mysqli_fetch_array($r46);
                                                $ips3tdk2 = $row46['ips3tdk2']; // Use something like this to get the result
                                                echo "<td>".$ips3tdk2."</td>";
                                            

                                            
                                                $ips3tpt2 = "SELECT COUNT(ips_3) AS ips3tpt2 FROM tbl_mhs_lama where ips_3>=3.00 and ips_3<=3.50 and ket='Tepat Waktu'";
                                                $r47 = mysqli_query($connect, $ips3tpt2); // Result resource
                                                $row47 = mysqli_fetch_array($r47);
                                                $ips3tpt2 = $row47['ips3tpt2']; // Use something like this to get the result
                                                echo "<td>".$ips3tpt2."</td>";

                                                $ips3lbh2 = "SELECT COUNT(ips_3) AS ips3lbh2 FROM tbl_mhs_lama where ips_3>=3.00 and ips_3<=3.50 and ket='Lebih Cepat'";
                                                $r48 = mysqli_query($connect, $ips3lbh2); // Result resource
                                                $row48 = mysqli_fetch_array($r48);
                                                $ips3lbh2 = $row48['ips3lbh2']; // Use something like this to get the result
                                                echo "<td>".$ips3lbh2."</td>";

                                                $entropy_ips32 = hitung_entropy($ips3tdk2, $ips3tpt2, $ips3lbh2);
                                                echo "<td>".$entropy_ips32."</td>";

                                            ?>
                                            <td></td>
                                    </tr>
                                    <tr>
                                        <td>IPS Semester 3 >'3.50' </td>
                                            <?php
                                            
                                                $ips33 = "SELECT COUNT(ips_3) AS ips33 FROM tbl_mhs_lama where  ips_3>3.50";
                                                $r49 = mysqli_query($connect, $ips33); // Result resource
                                                $row49 = mysqli_fetch_array($r49);
                                                $ips33 = $row49['ips33']; // Use something like this to get the result
                                                echo "<td>".$ips33."</td>";
                                        
                                            
                                                $ips3tdk3 = "SELECT COUNT(ips_3) AS ips3tdk3 FROM tbl_mhs_lama where ips_3>3.50 and ket='Tidak Tepat Waktu'";
                                                $r50 = mysqli_query($connect, $ips3tdk3); // Result resource
                                                $row50 = mysqli_fetch_array($r50);
                                                $ips3tdk3 = $row50['ips3tdk3']; // Use something like this to get the result
                                                echo "<td>".$ips3tdk3."</td>";
                                            

                                            
                                                $ips3tpt3 = "SELECT COUNT(ips_3) AS ips3tpt3 FROM tbl_mhs_lama where ips_3>3.50 and ket='Tepat Waktu'";
                                                $r51 = mysqli_query($connect, $ips3tpt3); // Result resource
                                                $row51 = mysqli_fetch_array($r51);
                                                $ips3tpt3 = $row51['ips3tpt3']; // Use something like this to get the result
                                                echo "<td>".$ips3tpt3."</td>";

                                                $ips3lbh3 = "SELECT COUNT(ips_3) AS ips3lbh3 FROM tbl_mhs_lama where ips_3>3.50 and ket='Lebih Cepat'";
                                                $r52 = mysqli_query($connect, $ips3lbh3); // Result resource
                                                $row52 = mysqli_fetch_array($r52);
                                                $ips3lbh3 = $row52['ips3lbh3']; // Use something like this to get the result
                                                echo "<td>".$ips3lbh3."</td>";

                                                $entropy_ips33 = hitung_entropy($ips3tdk3, $ips3tpt3, $ips3lbh3);
                                                echo "<td>".$entropy_ips33."</td>";

                                                $gain5 = hitung_gain3($entropy_all, $jml, $ips3, $ips32, $ips33, $entropy_ips3, $entropy_ips32, $entropy_ips33);
                                                echo "<td>".format_decimal($gain5)."</td>";
                                            ?>
                                    </tr>


                                    <tr>
                                        <th scope="row" rowspan="3">6</th>
                                        <td>IPS Semester 4 <'3.00' </td>
                                            <?php
                                            
                                                $ips4 = "SELECT COUNT(ips_4) AS ips4 FROM tbl_mhs_lama where ips_4<3.00";
                                                $r53 = mysqli_query($connect, $ips4); // Result resource
                                                $row53 = mysqli_fetch_array($r53);
                                                $ips4 = $row53['ips4']; // Use something like this to get the result
                                                echo "<td>".$ips4."</td>";
                                        
                                            
                                            
                                                $ips4tdk = "SELECT COUNT(ips_4) AS ips4tdk FROM tbl_mhs_lama where ips_4<3.00 and ket='Tidak Tepat Waktu'";
                                                $r54 = mysqli_query($connect, $ips4tdk); // Result resource
                                                $row54 = mysqli_fetch_array($r54);
                                                $ips4tdk = $row54['ips4tdk']; // Use something like this to get the result
                                                echo "<td>".$ips4tdk."</td>";
                                            

                                            
                                                $ips4tpt = "SELECT COUNT(ips_4) AS ips4tpt FROM tbl_mhs_lama where ips_4<3.00 and ket='Tepat Waktu'";
                                                $r55 = mysqli_query($connect, $ips4tpt); // Result resource
                                                $row55 = mysqli_fetch_array($r55);
                                                $ips4tpt = $row55['ips4tpt']; // Use something like this to get the result
                                                echo "<td>".$ips4tpt."</td>";

                                                $ips4lbh = "SELECT COUNT(ips_4) AS ips4lbh FROM tbl_mhs_lama where ips_4<3.00 and ket='Lebih Cepat'";
                                                $r56 = mysqli_query($connect, $ips4lbh); // Result resource
                                                $row56 = mysqli_fetch_array($r56);
                                                $ips4lbh = $row56['ips4lbh']; // Use something like this to get the result
                                                echo "<td>".$ips4lbh."</td>";

                                                $entropy_ips4 = hitung_entropy($ips4tdk, $ips4tpt, $ips4lbh);
                                                echo "<td>".$entropy_ips4."</td>";

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>IPS Semester 4 <='3.50' </td>
                                            <?php
                                            
                                                $ips42 = "SELECT COUNT(ips_4) AS ips42 FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50";
                                                $r57 = mysqli_query($connect, $ips42); // Result resource
                                                $row57 = mysqli_fetch_array($r57);
                                                $ips42 = $row57['ips42']; // Use something like this to get the result
                                                echo "<td>".$ips42."</td>";
                                        
                                            
                                            
                                                $ips4tdk2 = "SELECT COUNT(ips_4) AS ips4tdk2 FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ket='Tidak Tepat Waktu'";
                                                $r58 = mysqli_query($connect, $ips4tdk2); // Result resource
                                                $row58 = mysqli_fetch_array($r58);
                                                $ips4tdk2 = $row58['ips4tdk2']; // Use something like this to get the result
                                                echo "<td>".$ips4tdk2."</td>";
                                            

                                            
                                                $ips4tpt2 = "SELECT COUNT(ips_4) AS ips4tpt2 FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ket='Tepat Waktu'";
                                                $r59 = mysqli_query($connect, $ips4tpt2); // Result resource
                                                $row59 = mysqli_fetch_array($r59);
                                                $ips4tpt2 = $row59['ips4tpt2']; // Use something like this to get the result
                                                echo "<td>".$ips4tpt2."</td>";

                                                $ips4lbh2 = "SELECT COUNT(ips_4) AS ips4lbh2 FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ket='Lebih Cepat'";
                                                $r60 = mysqli_query($connect, $ips4lbh2); // Result resource
                                                $row60 = mysqli_fetch_array($r60);
                                                $ips4lbh2 = $row60['ips4lbh2']; // Use something like this to get the result
                                                echo "<td>".$ips4lbh2."</td>";

                                                $entropy_ips42 = hitung_entropy($ips4tdk2, $ips4tpt2, $ips4lbh2);
                                                echo "<td>".$entropy_ips42."</td>";

                                            ?>
                                            <td></td>
                                    </tr>
                                    <tr>
                                        <td>IPS Semester 4 >'3.50' </td>
                                            <?php
                                            
                                                $ips43 = "SELECT COUNT(ips_4) AS ips43 FROM tbl_mhs_lama where  ips_4>3.50";
                                                $r61 = mysqli_query($connect, $ips43); // Result resource
                                                $row61 = mysqli_fetch_array($r61);
                                                $ips43 = $row61['ips43']; // Use something like this to get the result
                                                echo "<td>".$ips43."</td>";
                                        
                                            
                                                $ips4tdk3 = "SELECT COUNT(ips_4) AS ips4tdk3 FROM tbl_mhs_lama where ips_4>3.50 and ket='Tidak Tepat Waktu'";
                                                $r62 = mysqli_query($connect, $ips4tdk3); // Result resource
                                                $row62 = mysqli_fetch_array($r62);
                                                $ips4tdk3 = $row62['ips4tdk3']; // Use something like this to get the result
                                                echo "<td>".$ips4tdk3."</td>";
                                            

                                            
                                                $ips4tpt3 = "SELECT COUNT(ips_4) AS ips4tpt3 FROM tbl_mhs_lama where ips_4>3.50 and ket='Tepat Waktu'";
                                                $r63 = mysqli_query($connect, $ips4tpt3); // Result resource
                                                $row63 = mysqli_fetch_array($r63);
                                                $ips4tpt3 = $row63['ips4tpt3']; // Use something like this to get the result
                                                echo "<td>".$ips4tpt3."</td>";

                                                $ips4lbh3 = "SELECT COUNT(ips_4) AS ips4lbh3 FROM tbl_mhs_lama where ips_4>3.50 and ket='Lebih Cepat'";
                                                $r64 = mysqli_query($connect, $ips4lbh3); // Result resource
                                                $row64 = mysqli_fetch_array($r64);
                                                $ips4lbh3 = $row64['ips4lbh3']; // Use something like this to get the result
                                                echo "<td>".$ips4lbh3."</td>";

                                                $entropy_ips43 = hitung_entropy($ips4tdk3, $ips4tpt3, $ips4lbh3);
                                                echo "<td>".$entropy_ips43."</td>";

                                                $gain6 = hitung_gain3($entropy_all, $jml, $ips4, $ips42, $ips43, $entropy_ips4, $entropy_ips42, $entropy_ips43);
                                                echo "<td>".format_decimal($gain6)."</td>";

                                            ?>
                                    </tr>
                                </tbody>
                            </table>

                            <?php
                                echo "Atribut Terpilih = IPS Semester 4 dengan Gain =".format_decimal($gain6)."<br>";
                                echo "==================================================================================="."<br>";
                                echo "Cabang 1"."<br>";
                                echo "(IPS Semester 4 >3.50)"."<br>";
                            ?>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Atribut</th>
                                        <th>Jumlah Kasus</th>
                                        <th>Tidak Tepat Waktu</th>
                                        <th>Tepat Waktu</th>
                                        <th>Lebih Cepat</th>
                                        <th>Entrophy</th>
                                        <th>Gain</th>
                                    </tr>
                                </thead>
                                <?php
                                    $q1     = "SELECT COUNT(ips_4) AS kurang from tbl_mhs_lama where ips_4>3.50";
                                    $read1  = mysqli_query($connect, $q1);
                                    $baris1 = mysqli_fetch_array($read1);
                                    $ips4k  = $baris1['kurang'];
                                    echo "Jumlah =".$ips4k."<br>";

                                    $q2     = "SELECT COUNT(ips_4) AS kurang_tidak from tbl_mhs_lama where ips_4>3.50 and ket='Tidak Tepat Waktu'";
                                    $read2  = mysqli_query($connect, $q2);
                                    $baris2 = mysqli_fetch_array($read2);
                                    $ips4ktdk  = $baris2['kurang_tidak'];
                                    echo "Tidak Tepat Waktu =".$ips4ktdk."<br>";

                                    $q3     = "SELECT COUNT(ips_4) AS kurang_tepat from tbl_mhs_lama where ips_4>3.50 and ket='Tepat Waktu'";
                                    $read3  = mysqli_query($connect, $q3);
                                    $baris3 = mysqli_fetch_array($read3);
                                    $ips4ktpt  = $baris3['kurang_tepat'];
                                    echo "Tepat Waktu =".$ips4ktpt."<br>"; 

                                    $q4     = "SELECT COUNT(ips_4) AS kurang_lebih from tbl_mhs_lama where ips_4>3.50 and ket='Lebih Cepat'";
                                    $read4  = mysqli_query($connect, $q4);
                                    $baris4 = mysqli_fetch_array($read4);
                                    $ips4klbh  = $baris4['kurang_lebih'];
                                    echo "Tepat Waktu =".$ips4klbh."<br>";  
                                    echo "Entrophy =".$entropy_ips43."<br>";                                  
                                ?>
                                <tbody>
                                     <tr>
                                        <th scope="row" rowspan="2">1</th>
                                        <td>SKS Semester 2 Rendah </td>
                                            <?php
                                            

                                                $sks2ips4kk = "SELECT COUNT(ips_4) AS sks2ips4kk FROM tbl_mhs_lama where ips_4>3.50 and sks_2<18";
                                                $read5 = mysqli_query($connect, $sks2ips4kk); // Result resource
                                                $baris5 = mysqli_fetch_array($read5);
                                                $sks2ips4kk = $baris5['sks2ips4kk']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4kk."</td>";
                                        
                                            
                                            
                                                $sks2ips4tdk = "SELECT COUNT(ips_4) AS sks2ips4tdk FROM tbl_mhs_lama where ips_4>3.50 and sks_2<18 and ket='Tidak Tepat Waktu'";
                                                $read6 = mysqli_query($connect, $sks2ips4tdk); // Result resource
                                                $baris6 = mysqli_fetch_array($read6);
                                                $sks2ips4tdk = $baris6['sks2ips4tdk']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4tdk."</td>";
                                            

                                            
                                                $sks2ips4tpt = "SELECT COUNT(ips_4) AS sks2ips4tpt FROM tbl_mhs_lama where ips_4>3.50 and sks_2<18 and ket='Tepat Waktu'";
                                                $read7 = mysqli_query($connect, $sks2ips4tpt); // Result resource
                                                $baris7 = mysqli_fetch_array($read7);
                                                $sks2ips4tpt = $baris7['sks2ips4tpt']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4tpt."</td>";

                                                $sks2ips4lbh = "SELECT COUNT(ips_4) AS sks2ips4lbh FROM tbl_mhs_lama where ips_4>3.50 and sks_2<18 and ket='Lebih Cepat'";
                                                $read8 = mysqli_query($connect, $sks2ips4lbh); // Result resource
                                                $baris8 = mysqli_fetch_array($read8);
                                                $sks2ips4lbh = $baris8['sks2ips4lbh']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4lbh."</td>";

                                                $entropy_sks2ips4kk = hitung_entropy($sks2ips4tdk, $sks2ips4tpt, $sks2ips4lbh);
                                                echo "<td>".$entropy_sks2ips4kk."</td>";

                                                

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>SKS Semester 2 Tinggi </td>
                                            <?php
                                            

                                                $sks2ips4kl = "SELECT COUNT(ips_4) AS sks2ips4kl FROM tbl_mhs_lama where ips_4>3.50 and sks_2>=18";
                                                $read9 = mysqli_query($connect, $sks2ips4kl); // Result resource
                                                $baris9 = mysqli_fetch_array($read9);
                                                $sks2ips4kl = $baris9['sks2ips4kl']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4kl."</td>";
                                        
                                            
                                            
                                                $sks2ips4tdkl = "SELECT COUNT(ips_4) AS sks2ips4tdkl FROM tbl_mhs_lama where ips_4>3.50 and sks_2>=18 and ket='Tidak Tepat Waktu'";
                                                $read10 = mysqli_query($connect, $sks2ips4tdkl); // Result resource
                                                $baris10 = mysqli_fetch_array($read10);
                                                $sks2ips4tdkl = $baris10['sks2ips4tdkl']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4tdkl."</td>";
                                            

                                            
                                                $sks2ips4tptl = "SELECT COUNT(ips_4) AS sks2ips4tptl FROM tbl_mhs_lama where ips_4>3.50 and sks_2>=18 and ket='Tepat Waktu'";
                                                $read11 = mysqli_query($connect, $sks2ips4tptl); // Result resource
                                                $baris11 = mysqli_fetch_array($read11);
                                                $sks2ips4tptl = $baris11['sks2ips4tptl']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4tptl."</td>";

                                                $sks2ips4lbhl = "SELECT COUNT(ips_4) AS sks2ips4lbhl FROM tbl_mhs_lama where ips_4>3.50 and sks_2>=18 and ket='Lebih Cepat'";
                                                $read12 = mysqli_query($connect, $sks2ips4lbhl); // Result resource
                                                $baris12 = mysqli_fetch_array($read12);
                                                $sks2ips4lbhl = $baris12['sks2ips4lbhl']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4lbhl."</td>";

                                                $entropy_sks2ips4kl = hitung_entropy($sks2ips4tdkl, $sks2ips4tptl, $sks2ips4lbhl);
                                                echo "<td>".$entropy_sks2ips4kl."</td>";

                                                $gain7 = hitung_gain2($entropy_ips43, $ips4k, $sks2ips4k, $sks2ips4kl, $entropy_sks2ips4k, $entropy_sks2ips4kl);
                                                echo "<td>".format_decimal($gain7)."</td>";
                                                

                                            ?>
                                    </tr>
                                    <tr>
                                        <th scope="row" rowspan="2">2</th>
                                        <td>SKS Semester 3 Rendah </td>
                                            <?php
                                            

                                                $sksk3ips4k = "SELECT COUNT(ips_4) AS sksk3ips4k FROM tbl_mhs_lama where ips_4>3.50 and sks_3<18";
                                                $read13 = mysqli_query($connect, $sksk3ips4k); // Result resource
                                                $baris13 = mysqli_fetch_array($read13);
                                                $sksk3ips4k = $baris13['sksk3ips4k']; // Use something like this to get the result
                                                echo "<td>".$sksk3ips4k."</td>";
                                        
                                            
                                            
                                                $sksk3ips4tdk = "SELECT COUNT(ips_4) AS sksk3ips4tdk FROM tbl_mhs_lama where ips_4>3.50 and sks_3<18 and ket='Tidak Tepat Waktu'";
                                                $read14 = mysqli_query($connect, $sksk3ips4tdk); // Result resource
                                                $baris14 = mysqli_fetch_array($read14);
                                                $sksk3ips4tdk = $baris14['sksk3ips4tdk']; // Use something like this to get the result
                                                echo "<td>".$sksk3ips4tdk."</td>";
                                            

                                            
                                                $sksk3ips4tpt = "SELECT COUNT(ips_4) AS sksk3ips4tpt FROM tbl_mhs_lama where ips_4>3.50 and sks_3<18 and ket='Tepat Waktu'";
                                                $read15 = mysqli_query($connect, $sksk3ips4tpt); // Result resource
                                                $baris15 = mysqli_fetch_array($read15);
                                                $sksk3ips4tpt = $baris15['sksk3ips4tpt']; // Use something like this to get the result
                                                echo "<td>".$sksk3ips4tpt."</td>";

                                                $sksk3ips4lbh = "SELECT COUNT(ips_4) AS sksk3ips4lbh FROM tbl_mhs_lama where ips_4>3.50 and sks_3<18 and ket='Lebih Cepat'";
                                                $read16 = mysqli_query($connect, $sksk3ips4lbh); // Result resource
                                                $baris16 = mysqli_fetch_array($read16);
                                                $sksk3ips4lbh = $baris16['sksk3ips4lbh']; // Use something like this to get the result
                                                echo "<td>".$sksk3ips4lbh."</td>";

                                                $entropy_sksk3ips4k = hitung_entropy($sksk3ips4tdk, $sksk3ips4tpt, $sksk3ips4lbh);
                                                echo "<td>".$entropy_sksk3ips4k."</td>";

                                                

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        
                                        <td>SKS Semester 3 Tinggi </td>
                                            <?php
                                            

                                                $sksk3ips4kl = "SELECT COUNT(ips_4) AS sksk3ips4kl FROM tbl_mhs_lama where ips_4>3.50 and sks_3>=18";
                                                $read17 = mysqli_query($connect, $sksk3ips4kl); // Result resource
                                                $baris17 = mysqli_fetch_array($read17);
                                                $sksk3ips4kl = $baris17['sksk3ips4kl']; // Use something like this to get the result
                                                echo "<td>".$sksk3ips4kl."</td>";
                                        
                                            
                                            
                                                $sksk3ips4tdkl = "SELECT COUNT(ips_4) AS sksk3ips4tdkl FROM tbl_mhs_lama where ips_4>3.50 and sks_3>=18 and ket='Tidak Tepat Waktu'";
                                                $read18 = mysqli_query($connect, $sksk3ips4tdkl); // Result resource
                                                $baris18 = mysqli_fetch_array($read18);
                                                $sksk3ips4tdkl = $baris18['sksk3ips4tdkl']; // Use something like this to get the result
                                                echo "<td>".$sksk3ips4tdkl."</td>";
                                            

                                            
                                                $sksk3ips4tptl = "SELECT COUNT(ips_4) AS sksk3ips4tptl FROM tbl_mhs_lama where ips_4>3.50 and sks_3>=18 and ket='Tepat Waktu'";
                                                $read19 = mysqli_query($connect, $sksk3ips4tptl); // Result resource
                                                $baris19 = mysqli_fetch_array($read19);
                                                $sksk3ips4tptl = $baris19['sksk3ips4tptl']; // Use something like this to get the result
                                                echo "<td>".$sksk3ips4tptl."</td>";

                                                $sksk3ips4lbhl = "SELECT COUNT(ips_4) AS sksk3ips4lbhl FROM tbl_mhs_lama where ips_4>3.50 and sks_3>=18 and ket='Lebih Cepat'";
                                                $read20 = mysqli_query($connect, $sksk3ips4lbhl); // Result resource
                                                $baris20 = mysqli_fetch_array($read20);
                                                $sksk3ips4lbhl = $baris20['sksk3ips4lbhl']; // Use something like this to get the result
                                                echo "<td>".$sksk3ips4lbhl."</td>";

                                                $entropy_sksk3ips4kl = hitung_entropy($sksk3ips4tdkl, $sksk3ips4tptl, $sksk3ips4lbhl);
                                                echo "<td>".$entropy_sksk3ips4kl."</td>";

                                                $gain8 = hitung_gain2($entropy_ips43, $ips4k, $sksk3ips4k, $sksk3ips4kl, $entropy_sksk3ips4k, $entropy_sksk3ips4kl);
                                                echo "<td>".format_decimal($gain8)."</td>";

                                            ?>
                                    </tr>
                                    <tr>
                                        <th scope="row" rowspan="2">3</th>
                                        <td>SKS Semester 4 Rendah </td>
                                            <?php
                                            

                                                $sks4ips4k = "SELECT COUNT(ips_4) AS sks4ips4k FROM tbl_mhs_lama where ips_4>3.50 and sks_4<18";
                                                $read21 = mysqli_query($connect, $sks4ips4k); // Result resource
                                                $baris21 = mysqli_fetch_array($read21);
                                                $sks4ips4k = $baris21['sks4ips4k']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4k."</td>";
                                        
                                            
                                            
                                                $sks4ips4tdk = "SELECT COUNT(ips_4) AS sks4ips4tdk FROM tbl_mhs_lama where ips_4>3.50 and sks_4<18 and ket='Tidak Tepat Waktu'";
                                                $read22 = mysqli_query($connect, $sks4ips4tdk); // Result resource
                                                $baris22 = mysqli_fetch_array($read22);
                                                $sks4ips4tdk = $baris22['sks4ips4tdk']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4tdk."</td>";
                                            

                                            
                                                $sks4ips4tpt = "SELECT COUNT(ips_4) AS sks4ips4tpt FROM tbl_mhs_lama where ips_4>3.50 and sks_4<18 and ket='Tepat Waktu'";
                                                $read23 = mysqli_query($connect, $sks4ips4tpt); // Result resource
                                                $baris23 = mysqli_fetch_array($read23);
                                                $sks4ips4tpt = $baris23['sks4ips4tpt']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4tpt."</td>";

                                                $sks4ips4lbh = "SELECT COUNT(ips_4) AS sks4ips4lbh FROM tbl_mhs_lama where ips_4>3.50 and sks_4<18 and ket='Lebih Cepat'";
                                                $read24 = mysqli_query($connect, $sks4ips4lbh); // Result resource
                                                $baris24 = mysqli_fetch_array($read24);
                                                $sks4ips4lbh = $baris24['sks4ips4lbh']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4lbh."</td>";

                                                $entropy_sks4ips4k = hitung_entropy($sks4ips4tdk, $sks4ips4tpt, $sks4ips4lbh);
                                                echo "<td>".$entropy_sks4ips4k."</td>";

                                                

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>SKS Semester 4 Tinggi </td>
                                            <?php
                                            

                                                $sks4ips4kl = "SELECT COUNT(ips_4) AS sks4ips4kl FROM tbl_mhs_lama where ips_4>3.50 and sks_4>=18";
                                                $read25 = mysqli_query($connect, $sks4ips4kl); // Result resource
                                                $baris25 = mysqli_fetch_array($read25);
                                                $sks4ips4kl = $baris25['sks4ips4kl']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4kl."</td>";
                                        
                                            
                                            
                                                $sks4ips4tdkl = "SELECT COUNT(ips_4) AS sks4ips4tdkl FROM tbl_mhs_lama where ips_4>3.50 and sks_4>=18 and ket='Tidak Tepat Waktu'";
                                                $read26 = mysqli_query($connect, $sks4ips4tdkl); // Result resource
                                                $baris26 = mysqli_fetch_array($read26);
                                                $sks4ips4tdkl = $baris26['sks4ips4tdkl']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4tdkl."</td>";
                                            

                                            
                                                $sks4ips4tptl = "SELECT COUNT(ips_4) AS sks4ips4tptl FROM tbl_mhs_lama where ips_4>3.50 and sks_4>=18 and ket='Tepat Waktu'";
                                                $read27 = mysqli_query($connect, $sks4ips4tptl); // Result resource
                                                $baris27 = mysqli_fetch_array($read27);
                                                $sks4ips4tptl = $baris27['sks4ips4tptl']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4tptl."</td>";

                                                $sks4ips4lbhl = "SELECT COUNT(ips_4) AS sks4ips4lbhl FROM tbl_mhs_lama where ips_4>3.50 and sks_4>=18 and ket='Lebih Cepat'";
                                                $read28 = mysqli_query($connect, $sks4ips4lbhl); // Result resource
                                                $baris28 = mysqli_fetch_array($read28);
                                                $sks4ips4lbhl = $baris28['sks4ips4lbhl']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4lbhl."</td>";

                                                $entropy_sks4ips4kl = hitung_entropy($sks4ips4tdkl, $sks4ips4tptl, $sks4ips4lbhl);
                                                echo "<td>".$entropy_sks4ips4kl."</td>";

                                                $gain9 = hitung_gain2($entropy_ips43, $ips4k, $sks4ips4k, $sks4ips4kl, $entropy_sks4ips4k, $entropy_sks4ips4kl);
                                                echo "<td>".format_decimal($gain9)."</td>";

                                            ?>
                                    </tr>
                                    <tr>
                                        <th scope="row" rowspan="3">4</th>
                                        <td>IPS Semester 2 <'3.00' </td>
                                            <?php
                                            

                                                $ips2ips4k = "SELECT COUNT(ips_4) AS ips2ips4k FROM tbl_mhs_lama where ips_4>3.50 and ips_2<3.00";
                                                $read29 = mysqli_query($connect, $ips2ips4k); // Result resource
                                                $baris29 = mysqli_fetch_array($read29);
                                                $ips2ips4k = $baris29['ips2ips4k']; // Use something like this to get the result
                                                echo "<td>".$ips2ips4k."</td>";
                                        
                                            
                                            
                                                $ips2ips4tdk = "SELECT COUNT(ips_4) AS ips2ips4tdk FROM tbl_mhs_lama where ips_4>3.50 and ips_2<3.00 and ket='Tidak Tepat Waktu'";
                                                $read30 = mysqli_query($connect, $ips2ips4tdk); // Result resource
                                                $baris30 = mysqli_fetch_array($read30);
                                                $ips2ips4tdk = $baris30['ips2ips4tdk']; // Use something like this to get the result
                                                echo "<td>".$ips2ips4tdk."</td>";
                                            

                                            
                                                $ips2ips4tpt = "SELECT COUNT(ips_4) AS ips2ips4tpt FROM tbl_mhs_lama where ips_4>3.50 and ips_2<3.00 and ket='Tepat Waktu'";
                                                $read31 = mysqli_query($connect, $ips2ips4tpt); // Result resource
                                                $baris31 = mysqli_fetch_array($read31);
                                                $ips2ips4tpt = $baris31['ips2ips4tpt']; // Use something like this to get the result
                                                echo "<td>".$ips2ips4tpt."</td>";

                                                $ips2ips4lbh = "SELECT COUNT(ips_4) AS ips2ips4lbh FROM tbl_mhs_lama where ips_4>3.50 and ips_2<3.00 and ket='Lebih Cepat'";
                                                $read32 = mysqli_query($connect, $ips2ips4lbh); // Result resource
                                                $baris32 = mysqli_fetch_array($read32);
                                                $ips2ips4lbh = $baris32['ips2ips4lbh']; // Use something like this to get the result
                                                echo "<td>".$ips2ips4lbh."</td>";

                                                $entropy_ips2ips4k = hitung_entropy($ips2ips4tdk, $ips2ips4tpt, $ips2ips4lbh);
                                                echo "<td>".$entropy_ips2ips4k."</td>";

                                                

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>IPS Semester 2 <='3.50' </td>
                                            <?php
                                            

                                                $ips2ips4kd = "SELECT COUNT(ips_4) AS ips2ips4kd FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50";
                                                $read33 = mysqli_query($connect, $ips2ips4kd); // Result resource
                                                $baris33 = mysqli_fetch_array($read33);
                                                $ips2ips4kd = $baris33['ips2ips4kd']; // Use something like this to get the result
                                                echo "<td>".$ips2ips4kd."</td>";
                                        
                                            
                                            
                                                $ips2ips4tdkd = "SELECT COUNT(ips_4) AS ips2ips4tdkd FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and ket='Tidak Tepat Waktu'";
                                                $read34 = mysqli_query($connect, $ips2ips4tdkd); // Result resource
                                                $baris34 = mysqli_fetch_array($read34);
                                                $ips2ips4tdkd = $baris34['ips2ips4tdkd']; // Use something like this to get the result
                                                echo "<td>".$ips2ips4tdkd."</td>";
                                            

                                            
                                                $ips2ips4tptd = "SELECT COUNT(ips_4) AS ips2ips4tptd FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and ket='Tepat Waktu'";
                                                $read35 = mysqli_query($connect, $ips2ips4tptd); // Result resource
                                                $baris35 = mysqli_fetch_array($read35);
                                                $ips2ips4tptd = $baris35['ips2ips4tptd']; // Use something like this to get the result
                                                echo "<td>".$ips2ips4tptd."</td>";

                                                $ips2ips4lbhd = "SELECT COUNT(ips_4) AS ips2ips4lbhd FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and ket='Lebih Cepat'";
                                                $read36 = mysqli_query($connect, $ips2ips4lbhd); // Result resource
                                                $baris36 = mysqli_fetch_array($read36);
                                                $ips2ips4lbhd = $baris36['ips2ips4lbhd']; // Use something like this to get the result
                                                echo "<td>".$ips2ips4lbhd."</td>";

                                                $entropy_ips2ips4kd = hitung_entropy($ips2ips4tdkd, $ips2ips4tptd, $ips2ips4lbhd);
                                                echo "<td>".$entropy_ips2ips4kd."</td>";

                                                

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>IPS Semester 2 >'3.50' </td>
                                            <?php
                                            

                                                $ips2ips4kl = "SELECT COUNT(ips_4) AS ips2ips4kl FROM tbl_mhs_lama where ips_4>3.50 and ips_2>3.50";
                                                $read37 = mysqli_query($connect, $ips2ips4kl); // Result resource
                                                $baris37 = mysqli_fetch_array($read37);
                                                $ips2ips4kl = $baris37['ips2ips4kl']; // Use something like this to get the result
                                                echo "<td>".$ips2ips4kl."</td>";
                                        
                                            
                                            
                                                $ips2ips4tdkl = "SELECT COUNT(ips_4) AS ips2ips4tdkl FROM tbl_mhs_lama where ips_4>3.50 and ips_2>3.50 and ket='Tidak Tepat Waktu'";
                                                $read38 = mysqli_query($connect, $ips2ips4tdkl); // Result resource
                                                $baris38 = mysqli_fetch_array($read38);
                                                $ips2ips4tdkl = $baris38['ips2ips4tdkl']; // Use something like this to get the result
                                                echo "<td>".$ips2ips4tdkl."</td>";
                                            

                                            
                                                $ips2ips4tptl = "SELECT COUNT(ips_4) AS ips2ips4tptl FROM tbl_mhs_lama where ips_4>3.50 and ips_2>3.50 and ket='Tepat Waktu'";
                                                $read39 = mysqli_query($connect, $ips2ips4tptl); // Result resource
                                                $baris39 = mysqli_fetch_array($read39);
                                                $ips2ips4tptl = $baris39['ips2ips4tptl']; // Use something like this to get the result
                                                echo "<td>".$ips2ips4tptl."</td>";

                                                $ips2ips4lbhl = "SELECT COUNT(ips_4) AS ips2ips4lbhl FROM tbl_mhs_lama where ips_4>3.50 and ips_2>3.50 and ket='Lebih Cepat'";
                                                $read40 = mysqli_query($connect, $ips2ips4lbhl); // Result resource
                                                $baris40 = mysqli_fetch_array($read40);
                                                $ips2ips4lbhl = $baris40['ips2ips4lbhl']; // Use something like this to get the result
                                                echo "<td>".$ips2ips4lbhl."</td>";

                                                $entropy_ips2ips4kl = hitung_entropy($ips2ips4tdkl, $ips2ips4tptl, $ips2ips4lbhl);
                                                echo "<td>".$entropy_ips2ips4kl."</td>";

                                                $gain10 = hitung_gain3($entropy_ips43, $ips4k, $ips2ips4k, $ips2ips4kd, $ips2ips4kl, $entropy_ips2ips4k, $entropy_ips2ips4kd, $entropy_ips2ips4kl);
                                                echo "<td>".format_decimal($gain10)."</td>";

                                            ?>
                                    </tr>

                                    <tr>
                                        <th scope="row" rowspan="3">5</th>
                                        <td>IPS Semester 3 <'3.00' </td>
                                            <?php
                                            

                                                $ips3ips4k = "SELECT COUNT(ips_4) AS ips3ips4k FROM tbl_mhs_lama where ips_4>3.50 and ips_3<3.00";
                                                $read41 = mysqli_query($connect, $ips3ips4k); // Result resource
                                                $baris41 = mysqli_fetch_array($read41);
                                                $ips3ips4k = $baris41['ips3ips4k']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4k."</td>";
                                        
                                            
                                            
                                                $ips3ips4tdk = "SELECT COUNT(ips_4) AS ips3ips4tdk FROM tbl_mhs_lama where ips_4>3.50 and ips_3<3.00 and ket='Tidak Tepat Waktu'";
                                                $read42 = mysqli_query($connect, $ips3ips4tdk); // Result resource
                                                $baris42 = mysqli_fetch_array($read42);
                                                $ips3ips4tdk = $baris42['ips3ips4tdk']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4tdk."</td>";
                                            

                                            
                                                $ips3ips4tpt = "SELECT COUNT(ips_4) AS ips3ips4tpt FROM tbl_mhs_lama where ips_4>3.50 and ips_3<3.00 and ket='Tepat Waktu'";
                                                $read43 = mysqli_query($connect, $ips3ips4tpt); // Result resource
                                                $baris43 = mysqli_fetch_array($read43);
                                                $ips3ips4tpt = $baris43['ips3ips4tpt']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4tpt."</td>";

                                                $ips3ips4lbh = "SELECT COUNT(ips_4) AS ips3ips4lbh FROM tbl_mhs_lama where ips_4>3.50 and ips_3<3.00 and ket='Lebih Cepat'";
                                                $read44 = mysqli_query($connect, $ips3ips4lbh); // Result resource
                                                $baris44 = mysqli_fetch_array($read44);
                                                $ips3ips4lbh = $baris44['ips3ips4lbh']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4lbh."</td>";

                                                $entropy_ips3ips4k = hitung_entropy($ips3ips4tdk, $ips3ips4tpt, $ips3ips4lbh);
                                                echo "<td>".$entropy_ips3ips4k."</td>";

                                                

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>IPS Semester 3 <='3.50' </td>
                                            <?php
                                            

                                                $ips3ips4kd = "SELECT COUNT(ips_4) AS ips3ips4kd FROM tbl_mhs_lama where ips_4>3.50 and ips_3>=3.00 and ips_3<=3.50";
                                                $read45 = mysqli_query($connect, $ips3ips4kd); // Result resource
                                                $baris45 = mysqli_fetch_array($read45);
                                                $ips3ips4kd = $baris45['ips3ips4kd']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4kd."</td>";
                                        
                                            
                                            
                                                $ips3ips4tdkd = "SELECT COUNT(ips_4) AS ips3ips4tdkd FROM tbl_mhs_lama where ips_4>3.50 and ips_3>=3.00 and ips_3<=3.50 and ket='Tidak Tepat Waktu'";
                                                $read46 = mysqli_query($connect, $ips3ips4tdkd); // Result resource
                                                $baris46 = mysqli_fetch_array($read46);
                                                $ips3ips4tdkd = $baris46['ips3ips4tdkd']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4tdkd."</td>";
                                            

                                            
                                                $ips3ips4tptd = "SELECT COUNT(ips_4) AS ips3ips4tptd FROM tbl_mhs_lama where ips_4>3.50 and ips_3>=3.00 and ips_3<=3.50 and ket='Tepat Waktu'";
                                                $read47 = mysqli_query($connect, $ips3ips4tptd); // Result resource
                                                $baris47 = mysqli_fetch_array($read47);
                                                $ips3ips4tptd = $baris47['ips3ips4tptd']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4tptd."</td>";

                                                $ips3ips4lbhd = "SELECT COUNT(ips_4) AS ips3ips4lbhd FROM tbl_mhs_lama where ips_4>3.50 and ips_3>=3.00 and ips_3<=3.50 and ket='Lebih Cepat'";
                                                $read48 = mysqli_query($connect, $ips3ips4lbhd); // Result resource
                                                $baris48 = mysqli_fetch_array($read48);
                                                $ips3ips4lbhd = $baris48['ips3ips4lbhd']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4lbhd."</td>";

                                                $entropy_ips3ips4kd = hitung_entropy($ips3ips4tdkd, $ips3ips4tptd, $ips3ips4lbhd);
                                                echo "<td>".$entropy_ips3ips4kd."</td>";

                                                

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>IPS Semester 3 >'3.50' </td>
                                            <?php
                                            

                                                $ips3ips4kl = "SELECT COUNT(ips_4) AS ips3ips4kl FROM tbl_mhs_lama where ips_4>3.50 and ips_3>3.50";
                                                $read49 = mysqli_query($connect, $ips3ips4kl); // Result resource
                                                $baris49 = mysqli_fetch_array($read49);
                                                $ips3ips4kl = $baris49['ips3ips4kl']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4kl."</td>";
                                        
                                            
                                            
                                                $ips3ips4tdkl = "SELECT COUNT(ips_4) AS ips3ips4tdkl FROM tbl_mhs_lama where ips_4>3.50 and ips_3>3.50 and ket='Tidak Tepat Waktu'";
                                                $read50 = mysqli_query($connect, $ips3ips4tdkl); // Result resource
                                                $baris50 = mysqli_fetch_array($read50);
                                                $ips3ips4tdkl = $baris50['ips3ips4tdkl']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4tdkl."</td>";
                                            

                                            
                                                $ips3ips4tptl = "SELECT COUNT(ips_4) AS ips3ips4tptl FROM tbl_mhs_lama where ips_4>3.50 and ips_3>3.50 and ket='Tepat Waktu'";
                                                $read51 = mysqli_query($connect, $ips3ips4tptl); // Result resource
                                                $baris51 = mysqli_fetch_array($read51);
                                                $ips3ips4tptl = $baris51['ips3ips4tptl']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4tptl."</td>";

                                                $ips3ips4lbhl = "SELECT COUNT(ips_4) AS ips3ips4lbhl FROM tbl_mhs_lama where ips_4>3.50 and ips_3>3.50 and ket='Lebih Cepat'";
                                                $read52 = mysqli_query($connect, $ips3ips4lbhl); // Result resource
                                                $baris52 = mysqli_fetch_array($read52);
                                                $ips3ips4lbhl = $baris52['ips3ips4lbhl']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4lbhl."</td>";

                                                $entropy_ips3ips4kl = hitung_entropy($ips3ips4tdkl, $ips3ips4tptl, $ips3ips4lbhl);
                                                echo "<td>".$entropy_ips3ips4kl."</td>";

                                                $gain11 = hitung_gain3($entropy_ips43, $ips4k, $ips3ips4k, $ips3ips4kd, $ips3ips4kl, $entropy_ips3ips4k, $entropy_ips3ips4kd, $entropy_ips3ips4kl);
                                                echo "<td>".format_decimal($gain11)."</td>";

                                            ?>
                                    </tr>
                                </tbody>
                            </table>

                             <?php
                                echo "Atribut Terpilih = IPS Semester 2 dengan Gain =".format_decimal($gain10)."<br>";
                                echo "==================================================================================="."<br>";
                                echo "Cabang 2"."<br>";
                                echo "(IPS Semester 4 >3.50) and (IPS Semester 2 <=3.50)"."<br>";
                            ?>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Atribut</th>
                                        <th>Jumlah Kasus</th>
                                        <th>Tidak Tepat Waktu</th>
                                        <th>Tepat Waktu</th>
                                        <th>Lebih Cepat</th>
                                        <th>Entrophy</th>
                                        <th>Gain</th>
                                    </tr>
                                </thead>
                                <?php
                                    $q5     = "SELECT COUNT(ips_4) AS kurangk from tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50";
                                    $read53  = mysqli_query($connect, $q5);
                                    $baris53 = mysqli_fetch_array($read53);
                                    $ips4kk  = $baris53['kurangk'];
                                    echo "Jumlah =".$ips4kk."<br>";

                                    $q6     = "SELECT COUNT(ips_4) AS kurangk_tidak from tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and ket='Tidak Tepat Waktu'";
                                    $read54  = mysqli_query($connect, $q6);
                                    $baris54 = mysqli_fetch_array($read54);
                                    $ips4kktdk  = $baris54['kurangk_tidak'];
                                    echo "Tidak Tepat Waktu =".$ips4kktdk."<br>";

                                    $q7     = "SELECT COUNT(ips_4) AS kurangk_tepat from tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and ket='Tepat Waktu'";
                                    $read55  = mysqli_query($connect, $q7);
                                    $baris55 = mysqli_fetch_array($read55);
                                    $ips4kktpt  = $baris55['kurangk_tepat'];
                                    echo "Tepat Waktu =".$ips4kktpt."<br>"; 

                                    $q8     = "SELECT COUNT(ips_4) AS kurangk_lebih from tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and ket='Lebih Cepat'";
                                    $read56  = mysqli_query($connect, $q8);
                                    $baris56 = mysqli_fetch_array($read56);
                                    $ips4kklbh  = $baris56['kurangk_lebih'];
                                    echo "Tepat Waktu =".$ips4kklbh."<br>";
                                    echo "Entrophy =".$entropy_ips2ips4kd."<br>";                                    
                                ?>
                                <tbody>
                                     <tr>
                                        <th scope="row" rowspan="2">1</th>
                                        <td>SKS Semester 2 Rendah </td>
                                            <?php
                                            

                                                $sks2ips4kk = "SELECT COUNT(ips_4) AS sks2ips4kk FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and sks_2<18";
                                                $read57 = mysqli_query($connect, $sks2ips4kk); // Result resource
                                                $baris57 = mysqli_fetch_array($read57);
                                                $sks2ips4kk = $baris57['sks2ips4kk']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4kk."</td>";
                                        
                                            
                                            
                                                $sks2ips4tdkk = "SELECT COUNT(ips_4) AS sks2ips4tdkk FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and sks_2<18 and ket='Tidak Tepat Waktu'";
                                                $read58 = mysqli_query($connect, $sks2ips4tdkk); // Result resource
                                                $baris58 = mysqli_fetch_array($read58);
                                                $sks2ips4tdkk = $baris58['sks2ips4tdkk']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4tdkk."</td>";
                                            

                                            
                                                $sks2ips4tptk = "SELECT COUNT(ips_4) AS sks2ips4tptk FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and sks_2<18 and ket='Tepat Waktu'";
                                                $read59 = mysqli_query($connect, $sks2ips4tptk); // Result resource
                                                $baris59 = mysqli_fetch_array($read59);
                                                $sks2ips4tptk = $baris59['sks2ips4tptk']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4tptk."</td>";

                                                $sks2ips4lbhk = "SELECT COUNT(ips_4) AS sks2ips4lbhk FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and sks_2<18 and ket='Lebih Cepat'";
                                                $read60 = mysqli_query($connect, $sks2ips4lbhk); // Result resource
                                                $baris60 = mysqli_fetch_array($read60);
                                                $sks2ips4lbhk = $baris60['sks2ips4lbhk']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4lbhk."</td>";

                                                $entropy_sks2ips4kk = hitung_entropy($sks2ips4tdkk, $sks2ips4tptk, $sks2ips4lbhk);
                                                echo "<td>".$entropy_sks2ips4kk."</td>";

                                                

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>SKS Semester 2 Tinggi </td>
                                            <?php
                                            

                                                $sks2ips4klk = "SELECT COUNT(ips_4) AS sks2ips4klk FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and sks_2>=18";
                                                $read61 = mysqli_query($connect, $sks2ips4klk); // Result resource
                                                $baris61 = mysqli_fetch_array($read61);
                                                $sks2ips4klk = $baris61['sks2ips4klk']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4klk."</td>";
                                        
                                            
                                            
                                                $sks2ips4tdklk = "SELECT COUNT(ips_4) AS sks2ips4tdklk FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and sks_2>=18 and ket='Tidak Tepat Waktu'";
                                                $read62 = mysqli_query($connect, $sks2ips4tdklk); // Result resource
                                                $baris62 = mysqli_fetch_array($read62);
                                                $sks2ips4tdklk = $baris62['sks2ips4tdklk']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4tdklk."</td>";
                                            

                                            
                                                $sks2ips4tptlk = "SELECT COUNT(ips_4) AS sks2ips4tptlk FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and sks_2>=18 and ket='Tepat Waktu'";
                                                $read63 = mysqli_query($connect, $sks2ips4tptlk); // Result resource
                                                $baris63 = mysqli_fetch_array($read63);
                                                $sks2ips4tptlk = $baris63['sks2ips4tptlk']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4tptlk."</td>";

                                                $sks2ips4lbhlk = "SELECT COUNT(ips_4) AS sks2ips4lbhlk FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and sks_2>=18 and ket='Lebih Cepat'";
                                                $read64 = mysqli_query($connect, $sks2ips4lbhlk); // Result resource
                                                $baris64 = mysqli_fetch_array($read64);
                                                $sks2ips4lbhlk = $baris64['sks2ips4lbhlk']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4lbhlk."</td>";

                                                $entropy_sks2ips4klk = hitung_entropy($sks2ips4tdklk, $sks2ips4tptlk, $sks2ips4lbhlk);
                                                echo "<td>".$entropy_sks2ips4klk."</td>";

                                                $gain12 = hitung_gain2($entropy_ips2ips4kd, $ips4kk, $sks2ips4kk, $sks2ips4klk, $entropy_sks2ips4kk, $entropy_sks2ips4klk);
                                                echo "<td>".format_decimal($gain12)."</td>";
                                                

                                            ?>
                                    </tr>
                                    <tr>
                                        <th scope="row" rowspan="2">2</th>
                                        <td>SKS Semester 3 Rendah </td>
                                            <?php
                                            

                                                $sksk3ips4kk = "SELECT COUNT(ips_4) AS sksk3ips4kk FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and sks_3<18";
                                                $read65 = mysqli_query($connect, $sksk3ips4kk); // Result resource
                                                $baris65 = mysqli_fetch_array($read65);
                                                $sksk3ips4kk = $baris65['sksk3ips4kk']; // Use something like this to get the result
                                                echo "<td>".$sksk3ips4kk."</td>";
                                        
                                            
                                            
                                                $sksk3ips4tdkk = "SELECT COUNT(ips_4) AS sksk3ips4tdkk FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and sks_3<18 and ket='Tidak Tepat Waktu'";
                                                $read66 = mysqli_query($connect, $sksk3ips4tdkk); // Result resource
                                                $baris66 = mysqli_fetch_array($read66);
                                                $sksk3ips4tdkk = $baris66['sksk3ips4tdkk']; // Use something like this to get the result
                                                echo "<td>".$sksk3ips4tdkk."</td>";
                                            

                                            
                                                $sksk3ips4tptk = "SELECT COUNT(ips_4) AS sksk3ips4tptk FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and sks_3<18 and ket='Tepat Waktu'";
                                                $read67 = mysqli_query($connect, $sksk3ips4tptk); // Result resource
                                                $baris67 = mysqli_fetch_array($read67);
                                                $sksk3ips4tptk = $baris67['sksk3ips4tptk']; // Use something like this to get the result
                                                echo "<td>".$sksk3ips4tptk."</td>";

                                                $sksk3ips4lbhk = "SELECT COUNT(ips_4) AS sksk3ips4lbhk FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and sks_3<18 and ket='Lebih Cepat'";
                                                $read68 = mysqli_query($connect, $sksk3ips4lbhk); // Result resource
                                                $baris68 = mysqli_fetch_array($read68);
                                                $sksk3ips4lbhk = $baris68['sksk3ips4lbhk']; // Use something like this to get the result
                                                echo "<td>".$sksk3ips4lbhk."</td>";

                                                $entropy_sksk3ips4kk = hitung_entropy($sksk3ips4tdkk, $sksk3ips4tptk, $sksk3ips4lbhk);
                                                echo "<td>".$entropy_sksk3ips4kk."</td>";

                                                

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        
                                        <td>SKS Semester 3 Tinggi </td>
                                            <?php
                                            

                                                $sksk3ips4kkl = "SELECT COUNT(ips_4) AS sksk3ips4kkl FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and sks_3>=18";
                                                $read69 = mysqli_query($connect, $sksk3ips4kkl); // Result resource
                                                $baris69 = mysqli_fetch_array($read69);
                                                $sksk3ips4kkl = $baris69['sksk3ips4kkl']; // Use something like this to get the result
                                                echo "<td>".$sksk3ips4kkl."</td>";
                                        
                                            
                                            
                                                $sksk3ips4tdkkl = "SELECT COUNT(ips_4) AS sksk3ips4tdkkl FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and sks_3>=18 and ket='Tidak Tepat Waktu'";
                                                $read70 = mysqli_query($connect, $sksk3ips4tdkkl); // Result resource
                                                $baris70 = mysqli_fetch_array($read70);
                                                $sksk3ips4tdkkl = $baris70['sksk3ips4tdkkl']; // Use something like this to get the result
                                                echo "<td>".$sksk3ips4tdkkl."</td>";
                                            

                                            
                                                $sksk3ips4tptkl = "SELECT COUNT(ips_4) AS sksk3ips4tptkl FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and sks_3>=18 and ket='Tepat Waktu'";
                                                $read71 = mysqli_query($connect, $sksk3ips4tptkl); // Result resource
                                                $baris71 = mysqli_fetch_array($read71);
                                                $sksk3ips4tptkl = $baris71['sksk3ips4tptkl']; // Use something like this to get the result
                                                echo "<td>".$sksk3ips4tptkl."</td>";

                                                $sksk3ips4lbhkl = "SELECT COUNT(ips_4) AS sksk3ips4lbhkl FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and sks_3>=18 and ket='Lebih Cepat'";
                                                $read72 = mysqli_query($connect, $sksk3ips4lbhkl); // Result resource
                                                $baris72 = mysqli_fetch_array($read72);
                                                $sksk3ips4lbhkl = $baris72['sksk3ips4lbhkl']; // Use something like this to get the result
                                                echo "<td>".$sksk3ips4lbhkl."</td>";

                                                $entropy_sksk3ips4kkl = hitung_entropy($sksk3ips4tdkkl, $sksk3ips4tptkl, $sksk3ips4lbhkl);
                                                echo "<td>".$entropy_sksk3ips4kkl."</td>";

                                                $gain13 = hitung_gain2($entropy_ips2ips4kd, $ips4kk, $sksk3ips4kk, $sksk3ips4kkl, $entropy_sksk3ips4kk, $entropy_sksk3ips4kkl);
                                                echo "<td>".format_decimal($gain13)."</td>";

                                            ?>
                                    </tr>
                                    <tr>
                                        <th scope="row" rowspan="2">3</th>
                                        <td>SKS Semester 4 Rendah </td>
                                            <?php
                                            

                                                $sks4ips4kk = "SELECT COUNT(ips_4) AS sks4ips4kk FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and sks_4<18";
                                                $read73 = mysqli_query($connect, $sks4ips4kk); // Result resource
                                                $baris73 = mysqli_fetch_array($read73);
                                                $sks4ips4kk = $baris73['sks4ips4kk']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4kk."</td>";
                                        
                                            
                                            
                                                $sks4ips4tdkk = "SELECT COUNT(ips_4) AS sks4ips4tdkk FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and sks_4<18 and ket='Tidak Tepat Waktu'";
                                                $read74 = mysqli_query($connect, $sks4ips4tdkk); // Result resource
                                                $baris74 = mysqli_fetch_array($read74);
                                                $sks4ips4tdkk = $baris74['sks4ips4tdkk']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4tdkk."</td>";
                                            

                                            
                                                $sks4ips4tptk = "SELECT COUNT(ips_4) AS sks4ips4tptk FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and sks_4<18 and ket='Tepat Waktu'";
                                                $read75 = mysqli_query($connect, $sks4ips4tptk); // Result resource
                                                $baris75 = mysqli_fetch_array($read75);
                                                $sks4ips4tptk = $baris75['sks4ips4tptk']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4tptk."</td>";

                                                $sks4ips4lbhk = "SELECT COUNT(ips_4) AS sks4ips4lbhk FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and sks_4<18 and ket='Lebih Cepat'";
                                                $read76 = mysqli_query($connect, $sks4ips4lbhk); // Result resource
                                                $baris76 = mysqli_fetch_array($read76);
                                                $sks4ips4lbhk = $baris76['sks4ips4lbhk']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4lbhk."</td>";

                                                $entropy_sks4ips4kk = hitung_entropy($sks4ips4tdkk, $sks4ips4tptk, $sks4ips4lbhk);
                                                echo "<td>".$entropy_sks4ips4kk."</td>";

                                                

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>SKS Semester 4 Tinggi </td>
                                            <?php
                                            

                                                $sks4ips4kkl = "SELECT COUNT(ips_4) AS sks4ips4kkl FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and sks_4>=18";
                                                $read77 = mysqli_query($connect, $sks4ips4kkl); // Result resource
                                                $baris77 = mysqli_fetch_array($read77);
                                                $sks4ips4kkl = $baris77['sks4ips4kkl']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4kkl."</td>";
                                        
                                            
                                            
                                                $sks4ips4tdkkl = "SELECT COUNT(ips_4) AS sks4ips4tdkkl FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and sks_4>=18 and ket='Tidak Tepat Waktu'";
                                                $read78 = mysqli_query($connect, $sks4ips4tdkkl); // Result resource
                                                $baris78 = mysqli_fetch_array($read78);
                                                $sks4ips4tdkkl = $baris78['sks4ips4tdkkl']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4tdkkl."</td>";
                                            

                                            
                                                $sks4ips4tptkl = "SELECT COUNT(ips_4) AS sks4ips4tptkl FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and sks_4>=18 and ket='Tepat Waktu'";
                                                $read79 = mysqli_query($connect, $sks4ips4tptkl); // Result resource
                                                $baris79 = mysqli_fetch_array($read79);
                                                $sks4ips4tptkl = $baris79['sks4ips4tptkl']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4tptkl."</td>";

                                                $sks4ips4lbhkl = "SELECT COUNT(ips_4) AS sks4ips4lbhkl FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and sks_4>=18 and ket='Lebih Cepat'";
                                                $read80 = mysqli_query($connect, $sks4ips4lbhkl); // Result resource
                                                $baris80 = mysqli_fetch_array($read80);
                                                $sks4ips4lbhkl = $baris80['sks4ips4lbhkl']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4lbhkl."</td>";

                                                $entropy_sks4ips4kkl = hitung_entropy($sks4ips4tdkkl, $sks4ips4tptkl, $sks4ips4lbhkl);
                                                echo "<td>".$entropy_sks4ips4kkl."</td>";

                                                $gain14 = hitung_gain2($entropy_ips2ips4kd, $ips4kk, $sks4ips4kk, $sks4ips4kkl, $entropy_sks4ips4kk, $entropy_sks4ips4kkl);
                                                echo "<td>".format_decimal($gain14)."</td>";

                                            ?>
                    

                                    <tr>
                                        <th scope="row" rowspan="3">5</th>
                                        <td>IPS Semester 3 <'3.00' </td>
                                            <?php
                                            

                                                $ips3ips4kk = "SELECT COUNT(ips_4) AS ips3ips4kk FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and ips_3<3.00";
                                                $read93 = mysqli_query($connect, $ips3ips4kk); // Result resource
                                                $baris93 = mysqli_fetch_array($read93);
                                                $ips3ips4kk = $baris93['ips3ips4kk']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4kk."</td>";
                                        
                                            
                                            
                                                $ips3ips4tdkk = "SELECT COUNT(ips_4) AS ips3ips4tdkk FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and ips_3<3.00 and ket='Tidak Tepat Waktu'";
                                                $read94 = mysqli_query($connect, $ips3ips4tdkk); // Result resource
                                                $baris94 = mysqli_fetch_array($read94);
                                                $ips3ips4tdkk = $baris94['ips3ips4tdkk']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4tdkk."</td>";
                                            

                                            
                                                $ips3ips4tptk = "SELECT COUNT(ips_4) AS ips3ips4tptk FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and ips_3<3.00 and ket='Tepat Waktu'";
                                                $read95 = mysqli_query($connect, $ips3ips4tptk); // Result resource
                                                $baris95 = mysqli_fetch_array($read95);
                                                $ips3ips4tptk = $baris95['ips3ips4tptk']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4tptk."</td>";

                                                $ips3ips4lbhk = "SELECT COUNT(ips_4) AS ips3ips4lbhk FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and ips_3<3.00 and ket='Lebih Cepat'";
                                                $read96 = mysqli_query($connect, $ips3ips4lbhk); // Result resource
                                                $baris96 = mysqli_fetch_array($read96);
                                                $ips3ips4lbhk = $baris96['ips3ips4lbhk']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4lbhk."</td>";

                                                $entropy_ips3ips4kk = hitung_entropy($ips3ips4tdkk, $ips3ips4tptk, $ips3ips4lbhk);
                                                echo "<td>".$entropy_ips3ips4kk."</td>";

                                                

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>IPS Semester 3 <='3.50' </td>
                                            <?php
                                            

                                                $ips3ips4kkd = "SELECT COUNT(ips_4) AS ips3ips4kkd FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and ips_3>=3.00 and ips_3<=3.50";
                                                $read97 = mysqli_query($connect, $ips3ips4kkd); // Result resource
                                                $baris97 = mysqli_fetch_array($read97);
                                                $ips3ips4kkd = $baris97['ips3ips4kkd']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4kkd."</td>";
                                        
                                            
                                            
                                                $ips3ips4tdkkd = "SELECT COUNT(ips_4) AS ips3ips4tdkkd FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and ips_3>=3.00 and ips_3<=3.50 and ket='Tidak Tepat Waktu'";
                                                $read98 = mysqli_query($connect, $ips3ips4tdkkd); // Result resource
                                                $baris98 = mysqli_fetch_array($read98);
                                                $ips3ips4tdkkd = $baris98['ips3ips4tdkkd']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4tdkkd."</td>";
                                            

                                            
                                                $ips3ips4tptkd = "SELECT COUNT(ips_4) AS ips3ips4tptkd FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and ips_3>=3.00 and ips_3<=3.50 and ket='Tepat Waktu'";
                                                $read99 = mysqli_query($connect, $ips3ips4tptkd); // Result resource
                                                $baris99 = mysqli_fetch_array($read99);
                                                $ips3ips4tptkd = $baris99['ips3ips4tptkd']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4tptkd."</td>";

                                                $ips3ips4lbhkd = "SELECT COUNT(ips_4) AS ips3ips4lbhkd FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and ips_3>=3.00 and ips_3<=3.50 and ket='Lebih Cepat'";
                                                $read100 = mysqli_query($connect, $ips3ips4lbhkd); // Result resource
                                                $baris100 = mysqli_fetch_array($read100);
                                                $ips3ips4lbhkd = $baris100['ips3ips4lbhkd']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4lbhkd."</td>";

                                                $entropy_ips3ips4kkd = hitung_entropy($ips3ips4tdkkd, $ips3ips4tptkd, $ips3ips4lbhkd);
                                                echo "<td>".$entropy_ips3ips4kkd."</td>";

                                                

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>IPS Semester 3 >'3.50' </td>
                                            <?php
                                            

                                                $ips3ips4kkl = "SELECT COUNT(ips_4) AS ips3ips4kkl FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and ips_3>3.50";
                                                $read101 = mysqli_query($connect, $ips3ips4kkl); // Result resource
                                                $baris101 = mysqli_fetch_array($read101);
                                                $ips3ips4kkl = $baris101['ips3ips4kkl']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4kkl."</td>";
                                        
                                            
                                            
                                                $ips3ips4tdkkl = "SELECT COUNT(ips_4) AS ips3ips4tdkkl FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and ips_3>3.50 and ket='Tidak Tepat Waktu'";
                                                $read102 = mysqli_query($connect, $ips3ips4tdkkl); // Result resource
                                                $baris102 = mysqli_fetch_array($read102);
                                                $ips3ips4tdkkl = $baris102['ips3ips4tdkkl']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4tdkkl."</td>";
                                            

                                            
                                                $ips3ips4tptkl = "SELECT COUNT(ips_4) AS ips3ips4tptkl FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and ips_3>3.50 and ket='Tepat Waktu'";
                                                $read103 = mysqli_query($connect, $ips3ips4tptkl); // Result resource
                                                $baris103 = mysqli_fetch_array($read103);
                                                $ips3ips4tptkl = $baris103['ips3ips4tptkl']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4tptkl."</td>";

                                                $ips3ips4lbhkl = "SELECT COUNT(ips_4) AS ips3ips4lbhkl FROM tbl_mhs_lama where ips_4>3.50 and ips_2>=3.00 and ips_2<=3.50 and ips_3>3.50 and ket='Lebih Cepat'";
                                                $read104 = mysqli_query($connect, $ips3ips4lbhkl); // Result resource
                                                $baris104 = mysqli_fetch_array($read104);
                                                $ips3ips4lbhkl = $baris104['ips3ips4lbhkl']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4lbhkl."</td>";

                                                $entropy_ips3ips4kkl = hitung_entropy($ips3ips4tdkkl, $ips3ips4tptkl, $ips3ips4lbhkl);
                                                echo "<td>".$entropy_ips3ips4kkl."</td>";

                                                $gain16 = hitung_gain32($entropy_ips2ips4kd, $ips4kk, $ips3ips4kk, $ips3ips4kkd, $ips3ips4kkl, $entropy_ips3ips4kk, $entropy_ips3ips4kkd, $entropy_ips3ips4kkl);
                                                echo "<td>".format_decimal($gain16)."</td>";

                                            ?>
                                    </tr>
                                </tbody>
                            </table>

                             <?php
                                echo "Atribut Terpilih = IPS Semester 3 dengan Gain =".format_decimal($gain16)."<br>";
                                echo "==================================================================================="."<br>";
                                echo "Cabang 2.1"."<br>";
                                echo "(IPS Semester 4 <=3.50)"."<br>";
                            ?>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Atribut</th>
                                        <th>Jumlah Kasus</th>
                                        <th>Tidak Tepat Waktu</th>
                                        <th>Tepat Waktu</th>
                                        <th>Lebih Cepat</th>
                                        <th>Entrophy</th>
                                        <th>Gain</th>
                                    </tr>
                                </thead>
                                <?php
                                    $q9     = "SELECT COUNT(ips_4) AS kurangk3 from tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50";
                                    $read105  = mysqli_query($connect, $q9);
                                    $baris105 = mysqli_fetch_array($read105);
                                    $ips4kk3  = $baris105['kurangk3'];
                                    echo "Jumlah =".$ips4kk3."<br>";

                                    $q10     = "SELECT COUNT(ips_4) AS kurangk3_tidak from tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ket='Tidak Tepat Waktu'";
                                    $read106  = mysqli_query($connect, $q10);
                                    $baris106 = mysqli_fetch_array($read106);
                                    $ips4kk3tdk  = $baris106['kurangk3_tidak'];
                                    echo "Tidak Tepat Waktu =".$ips4kk3tdk."<br>";

                                    $q11     = "SELECT COUNT(ips_4) AS kurangk3_tepat from tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ket='Tepat Waktu'";
                                    $read107  = mysqli_query($connect, $q11);
                                    $baris107 = mysqli_fetch_array($read107);
                                    $ips4kk3tpt  = $baris107['kurangk3_tepat'];
                                    echo "Tepat Waktu =".$ips4kk3tpt."<br>"; 

                                    $q12     = "SELECT COUNT(ips_4) AS kurangk3_lebih from tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ket='Lebih Cepat'";
                                    $read108  = mysqli_query($connect, $q12);
                                    $baris108 = mysqli_fetch_array($read108);
                                    $ips4kk3lbh  = $baris108['kurangk3_lebih'];
                                    echo "Tepat Waktu =".$ips4kk3lbh."<br>";
                                    echo "Entrophy =".$entropy_ips42."<br>";                                    
                                ?>
                                <tbody>
                                     <tr>
                                        <th scope="row" rowspan="2">1</th>
                                        <td>SKS Semester 2 Rendah </td>
                                            <?php
                                            

                                                $sks2ips4kk3 = "SELECT COUNT(ips_4) AS sks2ips4kk3 FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and sks_2<18";
                                                $read109 = mysqli_query($connect, $sks2ips4kk3); // Result resource
                                                $baris109 = mysqli_fetch_array($read109);
                                                $sks2ips4kk3 = $baris109['sks2ips4kk3']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4kk3."</td>";
                                        
                                            
                                            
                                                $sks2ips4tdkk = "SELECT COUNT(ips_4) AS sks2ips4tdkk FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and sks_2<18 and ket='Tidak Tepat Waktu'";
                                                $read110 = mysqli_query($connect, $sks2ips4tdkk); // Result resource
                                                $baris110 = mysqli_fetch_array($read110);
                                                $sks2ips4tdkk = $baris110['sks2ips4tdkk']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4tdkk."</td>";
                                            

                                            
                                                $sks2ips4tptk = "SELECT COUNT(ips_4) AS sks2ips4tptk FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and sks_2<18 and ket='Tepat Waktu'";
                                                $read111 = mysqli_query($connect, $sks2ips4tptk); // Result resource
                                                $baris111 = mysqli_fetch_array($read111);
                                                $sks2ips4tptk = $baris111['sks2ips4tptk']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4tptk."</td>";

                                                $sks2ips4lbhk = "SELECT COUNT(ips_4) AS sks2ips4lbhk FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and sks_2<18 and ket='Lebih Cepat'";
                                                $read112 = mysqli_query($connect, $sks2ips4lbhk); // Result resource
                                                $baris112 = mysqli_fetch_array($read112);
                                                $sks2ips4lbhk = $baris112['sks2ips4lbhk']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4lbhk."</td>";

                                                $entropy_sks2ips4kk3 = hitung_entropy($sks2ips4tdkk, $sks2ips4tptk, $sks2ips4lbhk);
                                                echo "<td>".$entropy_sks2ips4kk3."</td>";

                                                

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>SKS Semester 2 Tinggi </td>
                                            <?php
                                            

                                                $sks2ips4klk = "SELECT COUNT(ips_4) AS sks2ips4klk FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and sks_2>=18";
                                                $read113 = mysqli_query($connect, $sks2ips4klk); // Result resource
                                                $baris113 = mysqli_fetch_array($read113);
                                                $sks2ips4klk = $baris113['sks2ips4klk']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4klk."</td>";
                                        
                                            
                                            
                                                $sks2ips4tdklk = "SELECT COUNT(ips_4) AS sks2ips4tdklk FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and sks_2>=18 and ket='Tidak Tepat Waktu'";
                                                $read114 = mysqli_query($connect, $sks2ips4tdklk); // Result resource
                                                $baris114 = mysqli_fetch_array($read114);
                                                $sks2ips4tdklk = $baris114['sks2ips4tdklk']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4tdklk."</td>";
                                            

                                            
                                                $sks2ips4tptlk = "SELECT COUNT(ips_4) AS sks2ips4tptlk FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and sks_2>=18 and ket='Tepat Waktu'";
                                                $read115 = mysqli_query($connect, $sks2ips4tptlk); // Result resource
                                                $baris115 = mysqli_fetch_array($read115);
                                                $sks2ips4tptlk = $baris115['sks2ips4tptlk']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4tptlk."</td>";

                                                $sks2ips4lbhlk = "SELECT COUNT(ips_4) AS sks2ips4lbhlk FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and sks_2>=18 and ket='Lebih Cepat'";
                                                $read116 = mysqli_query($connect, $sks2ips4lbhlk); // Result resource
                                                $baris116 = mysqli_fetch_array($read116);
                                                $sks2ips4lbhlk = $baris116['sks2ips4lbhlk']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4lbhlk."</td>";

                                                $entropy_sks2ips4klk = hitung_entropy($sks2ips4tdklk, $sks2ips4tptlk, $sks2ips4lbhlk);
                                                echo "<td>".$entropy_sks2ips4klk."</td>";

                                                $gain17 = hitung_gain2($entropy_ips42, $ips4kk3, $sks2ips4kk3, $sks2ips4klk, $entropy_sks2ips4kk3, $entropy_sks2ips4klk);
                                                echo "<td>".format_decimal($gain17)."</td>";
                                                

                                            ?>
                                    </tr>
                                    <tr>
                                        <th scope="row" rowspan="2">2</th>
                                        <td>SKS Semester 3 Rendah </td>
                                            <?php
                                            

                                                $sksk3ips4kk3 = "SELECT COUNT(ips_4) AS sksk3ips4kk3 FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and sks_3<18";
                                                $read117 = mysqli_query($connect, $sksk3ips4kk3); // Result resource
                                                $baris117 = mysqli_fetch_array($read117);
                                                $sksk3ips4kk3 = $baris117['sksk3ips4kk3']; // Use something like this to get the result
                                                echo "<td>".$sksk3ips4kk3."</td>";
                                        
                                            
                                            
                                                $sksk3ips4tdkk = "SELECT COUNT(ips_4) AS sksk3ips4tdkk FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and sks_3<18 and ket='Tidak Tepat Waktu'";
                                                $read118 = mysqli_query($connect, $sksk3ips4tdkk); // Result resource
                                                $baris118 = mysqli_fetch_array($read118);
                                                $sksk3ips4tdkk = $baris118['sksk3ips4tdkk']; // Use something like this to get the result
                                                echo "<td>".$sksk3ips4tdkk."</td>";
                                            

                                            
                                                $sksk3ips4tptk = "SELECT COUNT(ips_4) AS sksk3ips4tptk FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and sks_3<18 and ket='Tepat Waktu'";
                                                $read119 = mysqli_query($connect, $sksk3ips4tptk); // Result resource
                                                $baris119 = mysqli_fetch_array($read119);
                                                $sksk3ips4tptk = $baris119['sksk3ips4tptk']; // Use something like this to get the result
                                                echo "<td>".$sksk3ips4tptk."</td>";

                                                $sksk3ips4lbhk = "SELECT COUNT(ips_4) AS sksk3ips4lbhk FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and sks_3<18 and ket='Lebih Cepat'";
                                                $read120 = mysqli_query($connect, $sksk3ips4lbhk); // Result resource
                                                $baris120 = mysqli_fetch_array($read120);
                                                $sksk3ips4lbhk = $baris120['sksk3ips4lbhk']; // Use something like this to get the result
                                                echo "<td>".$sksk3ips4lbhk."</td>";

                                                $entropy_sksk3ips4kk3 = hitung_entropy($sksk3ips4tdkk, $sksk3ips4tptk, $sksk3ips4lbhk);
                                                echo "<td>".$entropy_sksk3ips4kk3."</td>";

                                                

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        
                                        <td>SKS Semester 3 Tinggi </td>
                                            <?php
                                            

                                                $sksk3ips4kk3l = "SELECT COUNT(ips_4) AS sksk3ips4kk3l FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and sks_3>=18";
                                                $read121 = mysqli_query($connect, $sksk3ips4kk3l); // Result resource
                                                $baris121 = mysqli_fetch_array($read121);
                                                $sksk3ips4kk3l = $baris121['sksk3ips4kk3l']; // Use something like this to get the result
                                                echo "<td>".$sksk3ips4kk3l."</td>";
                                        
                                            
                                            
                                                $sksk3ips4tdkkl = "SELECT COUNT(ips_4) AS sksk3ips4tdkkl FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and sks_3>=18 and ket='Tidak Tepat Waktu'";
                                                $read122 = mysqli_query($connect, $sksk3ips4tdkkl); // Result resource
                                                $baris122 = mysqli_fetch_array($read122);
                                                $sksk3ips4tdkkl = $baris122['sksk3ips4tdkkl']; // Use something like this to get the result
                                                echo "<td>".$sksk3ips4tdkkl."</td>";
                                            

                                            
                                                $sksk3ips4tptkl = "SELECT COUNT(ips_4) AS sksk3ips4tptkl FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and sks_3>=18 and ket='Tepat Waktu'";
                                                $read123 = mysqli_query($connect, $sksk3ips4tptkl); // Result resource
                                                $baris123 = mysqli_fetch_array($read123);
                                                $sksk3ips4tptkl = $baris123['sksk3ips4tptkl']; // Use something like this to get the result
                                                echo "<td>".$sksk3ips4tptkl."</td>";

                                                $sksk3ips4lbhkl = "SELECT COUNT(ips_4) AS sksk3ips4lbhkl FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and sks_3>=18 and ket='Lebih Cepat'";
                                                $read124 = mysqli_query($connect, $sksk3ips4lbhkl); // Result resource
                                                $baris124 = mysqli_fetch_array($read124);
                                                $sksk3ips4lbhkl = $baris124['sksk3ips4lbhkl']; // Use something like this to get the result
                                                echo "<td>".$sksk3ips4lbhkl."</td>";

                                                $entropy_sksk3ips4kk3l = hitung_entropy($sksk3ips4tdkkl, $sksk3ips4tptkl, $sksk3ips4lbhkl);
                                                echo "<td>".$entropy_sksk3ips4kk3l."</td>";

                                                $gain18 = hitung_gain2($entropy_ips42, $ips4kk3, $sksk3ips4kk3, $sksk3ips4kk3l, $entropy_sksk3ips4kk3, $entropy_sksk3ips4kk3l);
                                                echo "<td>".format_decimal($gain18)."</td>";

                                            ?>
                                    </tr>
                                    <tr>
                                        <th scope="row" rowspan="2">3</th>
                                        <td>SKS Semester 4 Rendah </td>
                                            <?php
                                            

                                                $sks4ips4kk3 = "SELECT COUNT(ips_4) AS sks4ips4kk3 FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and sks_4<18";
                                                $read125 = mysqli_query($connect, $sks4ips4kk3); // Result resource
                                                $baris125 = mysqli_fetch_array($read125);
                                                $sks4ips4kk3 = $baris125['sks4ips4kk3']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4kk3."</td>";
                                        
                                            
                                            
                                                $sks4ips4tdkk = "SELECT COUNT(ips_4) AS sks4ips4tdkk FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and sks_4<18 and ket='Tidak Tepat Waktu'";
                                                $read126 = mysqli_query($connect, $sks4ips4tdkk); // Result resource
                                                $baris126 = mysqli_fetch_array($read126);
                                                $sks4ips4tdkk = $baris126['sks4ips4tdkk']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4tdkk."</td>";
                                            

                                            
                                                $sks4ips4tptk = "SELECT COUNT(ips_4) AS sks4ips4tptk FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and sks_4<18 and ket='Tepat Waktu'";
                                                $read127 = mysqli_query($connect, $sks4ips4tptk); // Result resource
                                                $baris127 = mysqli_fetch_array($read127);
                                                $sks4ips4tptk = $baris127['sks4ips4tptk']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4tptk."</td>";

                                                $sks4ips4lbhk = "SELECT COUNT(ips_4) AS sks4ips4lbhk FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and sks_4<18 and ket='Lebih Cepat'";
                                                $read128 = mysqli_query($connect, $sks4ips4lbhk); // Result resource
                                                $baris128 = mysqli_fetch_array($read128);
                                                $sks4ips4lbhk = $baris128['sks4ips4lbhk']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4lbhk."</td>";

                                                $entropy_sks4ips4kk3 = hitung_entropy($sks4ips4tdkk, $sks4ips4tptk, $sks4ips4lbhk);
                                                echo "<td>".$entropy_sks4ips4kk3."</td>";

                                                

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>SKS Semester 4 Tinggi </td>
                                            <?php
                                            

                                                $sks4ips4kk3l = "SELECT COUNT(ips_4) AS sks4ips4kk3l FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and sks_4>=18";
                                                $read129 = mysqli_query($connect, $sks4ips4kk3l); // Result resource
                                                $baris129 = mysqli_fetch_array($read129);
                                                $sks4ips4kk3l = $baris129['sks4ips4kk3l']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4kk3l."</td>";
                                        
                                            
                                            
                                                $sks4ips4tdkkl = "SELECT COUNT(ips_4) AS sks4ips4tdkkl FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and sks_4>=18 and ket='Tidak Tepat Waktu'";
                                                $read130 = mysqli_query($connect, $sks4ips4tdkkl); // Result resource
                                                $baris130 = mysqli_fetch_array($read130);
                                                $sks4ips4tdkkl = $baris130['sks4ips4tdkkl']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4tdkkl."</td>";
                                            

                                            
                                                $sks4ips4tptkl = "SELECT COUNT(ips_4) AS sks4ips4tptkl FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and sks_4>=18 and ket='Tepat Waktu'";
                                                $read131 = mysqli_query($connect, $sks4ips4tptkl); // Result resource
                                                $baris131 = mysqli_fetch_array($read131);
                                                $sks4ips4tptkl = $baris131['sks4ips4tptkl']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4tptkl."</td>";

                                                $sks4ips4lbhkl = "SELECT COUNT(ips_4) AS sks4ips4lbhkl FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and sks_4>=18 and ket='Lebih Cepat'";
                                                $read132 = mysqli_query($connect, $sks4ips4lbhkl); // Result resource
                                                $baris132 = mysqli_fetch_array($read132);
                                                $sks4ips4lbhkl = $baris132['sks4ips4lbhkl']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4lbhkl."</td>";

                                                $entropy_sks4ips4kk3l = hitung_entropy($sks4ips4tdkkl, $sks4ips4tptkl, $sks4ips4lbhkl);
                                                echo "<td>".$entropy_sks4ips4kk3l."</td>";

                                                $gain19 = hitung_gain2($entropy_ips42, $ips4kk3, $sks4ips4kk3, $sks4ips4kk3l, $entropy_sks4ips4kk3, $entropy_sks4ips4kk3l);
                                                echo "<td>".format_decimal($gain19)."</td>";

                                            ?>
                                    </tr>
                                    <tr>
                                        <th scope="row" rowspan="3">4</th>
                                        <td>IPS Semester 2 <'3.00' </td>
                                            <?php
                                            

                                                $ips2ips4kk3 = "SELECT COUNT(ips_4) AS ips2ips4kk3 FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2<3.00";
                                                $read133 = mysqli_query($connect, $ips2ips4kk3); // Result resource
                                                $baris133 = mysqli_fetch_array($read133);
                                                $ips2ips4kk3 = $baris133['ips2ips4kk3']; // Use something like this to get the result
                                                echo "<td>".$ips2ips4kk3."</td>";
                                        
                                            
                                            
                                                $ips2ips4tdkk = "SELECT COUNT(ips_4) AS ips2ips4tdkk FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2<3.00 and ket='Tidak Tepat Waktu'";
                                                $read134 = mysqli_query($connect, $ips2ips4tdkk); // Result resource
                                                $baris134 = mysqli_fetch_array($read134);
                                                $ips2ips4tdkk = $baris134['ips2ips4tdkk']; // Use something like this to get the result
                                                echo "<td>".$ips2ips4tdkk."</td>";
                                            

                                            
                                                $ips2ips4tptk = "SELECT COUNT(ips_4) AS ips2ips4tptk FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2<3.00 and ket='Tepat Waktu'";
                                                $read135 = mysqli_query($connect, $ips2ips4tptk); // Result resource
                                                $baris135 = mysqli_fetch_array($read135);
                                                $ips2ips4tptk = $baris135['ips2ips4tptk']; // Use something like this to get the result
                                                echo "<td>".$ips2ips4tptk."</td>";

                                                $ips2ips4lbhk = "SELECT COUNT(ips_4) AS ips2ips4lbhk FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2<3.00 and ket='Lebih Cepat'";
                                                $read136 = mysqli_query($connect, $ips2ips4lbhk); // Result resource
                                                $baris136 = mysqli_fetch_array($read136);
                                                $ips2ips4lbhk = $baris136['ips2ips4lbhk']; // Use something like this to get the result
                                                echo "<td>".$ips2ips4lbhk."</td>";

                                                $entropy_ips2ips4kk3 = hitung_entropy($ips2ips4tdkk, $ips2ips4tptk, $ips2ips4lbhk);
                                                echo "<td>".$entropy_ips2ips4kk3."</td>";

                                                

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>IPS Semester 2 <='3.50' </td>
                                            <?php
                                            

                                                $ips2ips4kk3d = "SELECT COUNT(ips_4) AS ips2ips4kk3d FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>=3.00 and ips_2<=3.50";
                                                $read137 = mysqli_query($connect, $ips2ips4kk3d); // Result resource
                                                $baris137 = mysqli_fetch_array($read137);
                                                $ips2ips4kk3d = $baris137['ips2ips4kk3d']; // Use something like this to get the result
                                                echo "<td>".$ips2ips4kk3d."</td>";
                                        
                                            
                                            
                                                $ips2ips4tdkkd = "SELECT COUNT(ips_4) AS ips2ips4tdkkd FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>=3.00 and ips_2<=3.50 and ket='Tidak Tepat Waktu'";
                                                $read138 = mysqli_query($connect, $ips2ips4tdkkd); // Result resource
                                                $baris138 = mysqli_fetch_array($read138);
                                                $ips2ips4tdkkd = $baris138['ips2ips4tdkkd']; // Use something like this to get the result
                                                echo "<td>".$ips2ips4tdkkd."</td>";
                                            

                                            
                                                $ips2ips4tptkd = "SELECT COUNT(ips_4) AS ips2ips4tptkd FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>=3.00 and ips_2<=3.50 and ket='Tepat Waktu'";
                                                $read139 = mysqli_query($connect, $ips2ips4tptkd); // Result resource
                                                $baris139 = mysqli_fetch_array($read139);
                                                $ips2ips4tptkd = $baris139['ips2ips4tptkd']; // Use something like this to get the result
                                                echo "<td>".$ips2ips4tptkd."</td>";

                                                $ips2ips4lbhkd = "SELECT COUNT(ips_4) AS ips2ips4lbhkd FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>=3.00 and ips_2<=3.50 and ket='Lebih Cepat'";
                                                $read140 = mysqli_query($connect, $ips2ips4lbhkd); // Result resource
                                                $baris140 = mysqli_fetch_array($read140);
                                                $ips2ips4lbhkd = $baris140['ips2ips4lbhkd']; // Use something like this to get the result
                                                echo "<td>".$ips2ips4lbhkd."</td>";

                                                $entropy_ips2ips4kk3d = hitung_entropy($ips2ips4tdkkd, $ips2ips4tptkd, $ips2ips4lbhkd);
                                                echo "<td>".$entropy_ips2ips4kk3d."</td>";

                                                

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>IPS Semester 2 >'3.50' </td>
                                            <?php
                                            

                                                $ips2ips4kk3l = "SELECT COUNT(ips_4) AS ips2ips4kk3l FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50";
                                                $read141 = mysqli_query($connect, $ips2ips4kk3l); // Result resource
                                                $baris141 = mysqli_fetch_array($read141);
                                                $ips2ips4kk3l = $baris141['ips2ips4kk3l']; // Use something like this to get the result
                                                echo "<td>".$ips2ips4kk3l."</td>";
                                        
                                            
                                            
                                                $ips2ips4tdkkl = "SELECT COUNT(ips_4) AS ips2ips4tdkkl FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and ket='Tidak Tepat Waktu'";
                                                $read142 = mysqli_query($connect, $ips2ips4tdkkl); // Result resource
                                                $baris142 = mysqli_fetch_array($read142);
                                                $ips2ips4tdkkl = $baris142['ips2ips4tdkkl']; // Use something like this to get the result
                                                echo "<td>".$ips2ips4tdkkl."</td>";
                                            

                                            
                                                $ips2ips4tptkl = "SELECT COUNT(ips_4) AS ips2ips4tptkl FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and ket='Tepat Waktu'";
                                                $read143 = mysqli_query($connect, $ips2ips4tptkl); // Result resource
                                                $baris143 = mysqli_fetch_array($read143);
                                                $ips2ips4tptkl = $baris143['ips2ips4tptkl']; // Use something like this to get the result
                                                echo "<td>".$ips2ips4tptkl."</td>";

                                                $ips2ips4lbhkl = "SELECT COUNT(ips_4) AS ips2ips4lbhkl FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and ket='Lebih Cepat'";
                                                $read144 = mysqli_query($connect, $ips2ips4lbhkl); // Result resource
                                                $baris144 = mysqli_fetch_array($read144);
                                                $ips2ips4lbhkl = $baris144['ips2ips4lbhkl']; // Use something like this to get the result
                                                echo "<td>".$ips2ips4lbhkl."</td>";

                                                $entropy_ips2ips4kk3l = hitung_entropy($ips2ips4tdkkl, $ips2ips4tptkl, $ips2ips4lbhkl);
                                                echo "<td>".$entropy_ips2ips4kk3l."</td>";

                                                $gain20 = hitung_gain32($entropy_ips42, $ips4kk3, $ips2ips4kk3, $ips2ips4kk3d, $ips2ips4kk3l, $entropy_ips2ips4kk3, $entropy_ips2ips4kk3d, $entropy_ips2ips4kk3l);
                                                echo "<td>".format_decimal($gain20)."</td>";

                                            ?>
                                    </tr>
                                    <tr>
                                        <th scope="row" rowspan="3">5</th>
                                        <td>IPS Semester 3 <'3.00' </td>
                                            <?php
                                            

                                                $ips3ips4kk3 = "SELECT COUNT(ips_4) AS ips3ips4kk3 FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_3<3.00";
                                                $read133 = mysqli_query($connect, $ips3ips4kk3); // Result resource
                                                $baris133 = mysqli_fetch_array($read133);
                                                $ips3ips4kk3 = $baris133['ips3ips4kk3']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4kk3."</td>";
                                        
                                            
                                            
                                                $ips3ips4tdkk = "SELECT COUNT(ips_4) AS ips3ips4tdkk FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_3<3.00 and ket='Tidak Tepat Waktu'";
                                                $read134 = mysqli_query($connect, $ips3ips4tdkk); // Result resource
                                                $baris134 = mysqli_fetch_array($read134);
                                                $ips3ips4tdkk = $baris134['ips3ips4tdkk']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4tdkk."</td>";
                                            

                                            
                                                $ips3ips4tptk = "SELECT COUNT(ips_4) AS ips3ips4tptk FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_3<3.00 and ket='Tepat Waktu'";
                                                $read135 = mysqli_query($connect, $ips3ips4tptk); // Result resource
                                                $baris135 = mysqli_fetch_array($read135);
                                                $ips3ips4tptk = $baris135['ips3ips4tptk']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4tptk."</td>";

                                                $ips3ips4lbhk = "SELECT COUNT(ips_4) AS ips3ips4lbhk FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_3<3.00 and ket='Lebih Cepat'";
                                                $read136 = mysqli_query($connect, $ips3ips4lbhk); // Result resource
                                                $baris136 = mysqli_fetch_array($read136);
                                                $ips3ips4lbhk = $baris136['ips3ips4lbhk']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4lbhk."</td>";

                                                $entropy_ips3ips4kk3 = hitung_entropy($ips3ips4tdkk, $ips3ips4tptk, $ips3ips4lbhk);
                                                echo "<td>".$entropy_ips3ips4kk3."</td>";

                                                

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>IPS Semester 3 <='3.50' </td>
                                            <?php
                                            

                                                $ips3ips4kk3d = "SELECT COUNT(ips_4) AS ips3ips4kk3d FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_3>=3.00 and ips_3<=3.50";
                                                $read137 = mysqli_query($connect, $ips3ips4kk3d); // Result resource
                                                $baris137 = mysqli_fetch_array($read137);
                                                $ips3ips4kk3d = $baris137['ips3ips4kk3d']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4kk3d."</td>";
                                        
                                            
                                            
                                                $ips3ips4tdkkd = "SELECT COUNT(ips_4) AS ips3ips4tdkkd FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_3>=3.00 and ips_3<=3.50 and ket='Tidak Tepat Waktu'";
                                                $read138 = mysqli_query($connect, $ips3ips4tdkkd); // Result resource
                                                $baris138 = mysqli_fetch_array($read138);
                                                $ips3ips4tdkkd = $baris138['ips3ips4tdkkd']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4tdkkd."</td>";
                                            

                                            
                                                $ips3ips4tptkd = "SELECT COUNT(ips_4) AS ips3ips4tptkd FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_3>=3.00 and ips_3<=3.50 and ket='Tepat Waktu'";
                                                $read139 = mysqli_query($connect, $ips3ips4tptkd); // Result resource
                                                $baris139 = mysqli_fetch_array($read139);
                                                $ips3ips4tptkd = $baris139['ips3ips4tptkd']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4tptkd."</td>";

                                                $ips3ips4lbhkd = "SELECT COUNT(ips_4) AS ips3ips4lbhkd FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_3>=3.00 and ips_3<=3.50 and ket='Lebih Cepat'";
                                                $read140 = mysqli_query($connect, $ips3ips4lbhkd); // Result resource
                                                $baris140 = mysqli_fetch_array($read140);
                                                $ips3ips4lbhkd = $baris140['ips3ips4lbhkd']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4lbhkd."</td>";

                                                $entropy_ips3ips4kk3d = hitung_entropy($ips3ips4tdkkd, $ips3ips4tptkd, $ips3ips4lbhkd);
                                                echo "<td>".$entropy_ips3ips4kk3d."</td>";

                                                

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>IPS Semester 3 >'3.50' </td>
                                            <?php
                                            

                                                $ips3ips4kk3l = "SELECT COUNT(ips_4) AS ips3ips4kk3l FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_3>3.50";
                                                $read141 = mysqli_query($connect, $ips3ips4kk3l); // Result resource
                                                $baris141 = mysqli_fetch_array($read141);
                                                $ips3ips4kk3l = $baris141['ips3ips4kk3l']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4kk3l."</td>";
                                        
                                            
                                            
                                                $ips3ips4tdkkl = "SELECT COUNT(ips_4) AS ips3ips4tdkkl FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_3>3.50 and ket='Tidak Tepat Waktu'";
                                                $read142 = mysqli_query($connect, $ips3ips4tdkkl); // Result resource
                                                $baris142 = mysqli_fetch_array($read142);
                                                $ips3ips4tdkkl = $baris142['ips3ips4tdkkl']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4tdkkl."</td>";
                                            

                                            
                                                $ips3ips4tptkl = "SELECT COUNT(ips_4) AS ips3ips4tptkl FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_3>3.50 and ket='Tepat Waktu'";
                                                $read143 = mysqli_query($connect, $ips3ips4tptkl); // Result resource
                                                $baris143 = mysqli_fetch_array($read143);
                                                $ips3ips4tptkl = $baris143['ips3ips4tptkl']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4tptkl."</td>";

                                                $ips3ips4lbhkl = "SELECT COUNT(ips_4) AS ips3ips4lbhkl FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_3>3.50 and ket='Lebih Cepat'";
                                                $read144 = mysqli_query($connect, $ips3ips4lbhkl); // Result resource
                                                $baris144 = mysqli_fetch_array($read144);
                                                $ips3ips4lbhkl = $baris144['ips3ips4lbhkl']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4lbhkl."</td>";

                                                $entropy_ips3ips4kk3l = hitung_entropy($ips3ips4tdkkl, $ips3ips4tptkl, $ips3ips4lbhkl);
                                                echo "<td>".$entropy_ips3ips4kk3l."</td>";

                                                $gain21 = hitung_gain3($entropy_ips42, $ips4kk3, $ips3ips4kk3, $ips3ips4kk3d, $ips3ips4kk3l, $entropy_ips3ips4kk3, $entropy_ips3ips4kk3d, $entropy_ips3ips4kk3l);
                                                echo "<td>".format_decimal($gain21)."</td>";

                                            ?>
                                    </tr>

                                </tbody>
                            </table>

                            <?php
                                echo "Atribut Terpilih = IPS Semester 2 dengan Gain =".format_decimal($gain20)."<br>";
                                echo "==================================================================================="."<br>";
                                echo "Cabang 3"."<br>";
                                echo "(IPS Semester 4 <=3.50) and (IPS Semester 2 >3.50)"."<br>";
                            ?>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Atribut</th>
                                        <th>Jumlah Kasus</th>
                                        <th>Tidak Tepat Waktu</th>
                                        <th>Tepat Waktu</th>
                                        <th>Lebih Cepat</th>
                                        <th>Entrophy</th>
                                        <th>Gain</th>
                                    </tr>
                                </thead>
                                <?php
                                    $q13     = "SELECT COUNT(ips_4) AS kurangk4 from tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50";
                                    $read145  = mysqli_query($connect, $q13);
                                    $baris145 = mysqli_fetch_array($read145);
                                    $ips4kips2lbh  = $baris145['kurangk4'];
                                    echo "Jumlah =".$ips4kips2lbh."<br>";

                                    $q14     = "SELECT COUNT(ips_4) AS kurangk4_tidak from tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and ket='Tidak Tepat Waktu'";
                                    $read146  = mysqli_query($connect, $q14);
                                    $baris146 = mysqli_fetch_array($read146);
                                    $ips4kips2ltdk  = $baris146['kurangk4_tidak'];
                                    echo "Tidak Tepat Waktu =".$ips4kips2ltdk."<br>";

                                    $q15     = "SELECT COUNT(ips_4) AS kurangk4_tepat from tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and ket='Tepat Waktu'";
                                    $read147  = mysqli_query($connect, $q15);
                                    $baris147 = mysqli_fetch_array($read147);
                                    $ips4kips2ltpt  = $baris147['kurangk4_tepat'];
                                    echo "Tepat Waktu =".$ips4kips2ltpt."<br>"; 

                                    $q16     = "SELECT COUNT(ips_4) AS kurangk4_lebih from tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and ket='Lebih Cepat'";
                                    $read148  = mysqli_query($connect, $q16);
                                    $baris148 = mysqli_fetch_array($read148);
                                    $ips4kips2llbh  = $baris148['kurangk4_lebih'];
                                    echo "Tepat Waktu =".$ips4kips2llbh."<br>";
                                    echo "Entrophy =".$entropy_ips2ips4kk3l."<br>";                                    
                                ?>
                                <tbody>
                                     <tr>
                                        <th scope="row" rowspan="2">1</th>
                                        <td>SKS Semester 2 Rendah </td>
                                            <?php
                                            

                                                $sks2ips4kips2l = "SELECT COUNT(ips_4) AS sks2ips4kips2l FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and sks_2<18";
                                                $read149 = mysqli_query($connect, $sks2ips4kips2l); // Result resource
                                                $baris149 = mysqli_fetch_array($read149);
                                                $sks2ips4kips2l = $baris149['sks2ips4kips2l']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4kips2l."</td>";
                                        
                                            
                                            
                                                $sks2ips4kips2ltdk = "SELECT COUNT(ips_4) AS sks2ips4kips2ltdk FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and sks_2<18 and ket='Tidak Tepat Waktu'";
                                                $read150 = mysqli_query($connect, $sks2ips4kips2ltdk); // Result resource
                                                $baris150 = mysqli_fetch_array($read150);
                                                $sks2ips4kips2ltdk = $baris150['sks2ips4kips2ltdk']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4kips2ltdk."</td>";
                                            

                                            
                                                $sks2ips4kips2ltpt = "SELECT COUNT(ips_4) AS sks2ips4kips2ltpt FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and sks_2<18 and ket='Tepat Waktu'";
                                                $read151 = mysqli_query($connect, $sks2ips4kips2ltpt); // Result resource
                                                $baris151 = mysqli_fetch_array($read151);
                                                $sks2ips4kips2ltpt = $baris151['sks2ips4kips2ltpt']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4kips2ltpt."</td>";

                                                $sks2ips4kips2llbh = "SELECT COUNT(ips_4) AS sks2ips4kips2llbh FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and sks_2<18 and ket='Lebih Cepat'";
                                                $read152 = mysqli_query($connect, $sks2ips4kips2llbh); // Result resource
                                                $baris152 = mysqli_fetch_array($read152);
                                                $sks2ips4kips2llbh = $baris152['sks2ips4kips2llbh']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4kips2llbh."</td>";

                                                $entropy_sks2ips4kips2l = hitung_entropy($sks2ips4kips2ltdk, $sks2ips4kips2ltpt, $sks2ips4kips2llbh);
                                                echo "<td>".$entropy_sks2ips4kips2l."</td>";

                                                

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>SKS Semester 2 Tinggi </td>
                                            <?php
                                            

                                                $sks2ips4kips2l2 = "SELECT COUNT(ips_4) AS sks2ips4kips2l2 FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and sks_2>=18";
                                                $read153 = mysqli_query($connect, $sks2ips4kips2l2); // Result resource
                                                $baris153 = mysqli_fetch_array($read153);
                                                $sks2ips4kips2l2 = $baris153['sks2ips4kips2l2']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4kips2l2."</td>";
                                        
                                            
                                            
                                                $sks2ips4kips2l2tdk = "SELECT COUNT(ips_4) AS sks2ips4kips2l2tdk FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and sks_2>=18 and ket='Tidak Tepat Waktu'";
                                                $read154 = mysqli_query($connect, $sks2ips4kips2l2tdk); // Result resource
                                                $baris154 = mysqli_fetch_array($read154);
                                                $sks2ips4kips2l2tdk = $baris154['sks2ips4kips2l2tdk']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4kips2l2tdk."</td>";
                                            

                                            
                                                $sks2ips4kips2l2tpt = "SELECT COUNT(ips_4) AS sks2ips4kips2l2tpt FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and sks_2>=18 and ket='Tepat Waktu'";
                                                $read155 = mysqli_query($connect, $sks2ips4kips2l2tpt); // Result resource
                                                $baris155 = mysqli_fetch_array($read155);
                                                $sks2ips4kips2l2tpt = $baris155['sks2ips4kips2l2tpt']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4kips2l2tpt."</td>";

                                                $sks2ips4kips2l2lbh = "SELECT COUNT(ips_4) AS sks2ips4kips2l2lbh FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and sks_2>=18 and ket='Lebih Cepat'";
                                                $read156 = mysqli_query($connect, $sks2ips4kips2l2lbh); // Result resource
                                                $baris156 = mysqli_fetch_array($read156);
                                                $sks2ips4kips2l2lbh = $baris156['sks2ips4kips2l2lbh']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4kips2l2lbh."</td>";

                                                $entropy_sks2ips4kips2l2 = hitung_entropy($sks2ips4kips2l2tdk, $sks2ips4kips2l2tpt, $sks2ips4kips2l2lbh);
                                                echo "<td>".$entropy_sks2ips4kips2l2."</td>";

                                                $gain22 = hitung_gain2($entropy_ips2ips4kk3l, $ips4kips2lbh,$sks2ips4kips2l, $sks2ips4kips2l2, $entropy_sks2ips4kips2l, $entropy_sks2ips4kips2l2);
                                                echo "<td>".format_decimal($gain22)."</td>";

                                            ?>
                                    </tr>
                                    <tr>
                                        <th scope="row" rowspan="2">2</th>
                                        <td>SKS Semester 3 Rendah </td>
                                            <?php
                                            

                                                $sks3ips4kips2l = "SELECT COUNT(ips_4) AS sks3ips4kips2l FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and sks_3<18";
                                                $read157 = mysqli_query($connect, $sks3ips4kips2l); // Result resource
                                                $baris157 = mysqli_fetch_array($read157);
                                                $sks3ips4kips2l = $baris157['sks3ips4kips2l']; // Use something like this to get the result
                                                echo "<td>".$sks3ips4kips2l."</td>";
                                        
                                            
                                            
                                                $sks3ips4kips2ltdk = "SELECT COUNT(ips_4) AS sks3ips4kips2ltdk FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and sks_3<18 and ket='Tidak Tepat Waktu'";
                                                $read158 = mysqli_query($connect, $sks3ips4kips2ltdk); // Result resource
                                                $baris158 = mysqli_fetch_array($read158);
                                                $sks3ips4kips2ltdk = $baris158['sks3ips4kips2ltdk']; // Use something like this to get the result
                                                echo "<td>".$sks3ips4kips2ltdk."</td>";
                                            

                                            
                                                $sks3ips4kips2ltpt = "SELECT COUNT(ips_4) AS sks3ips4kips2ltpt FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and sks_3<18 and ket='Tepat Waktu'";
                                                $read159 = mysqli_query($connect, $sks3ips4kips2ltpt); // Result resource
                                                $baris159 = mysqli_fetch_array($read159);
                                                $sks3ips4kips2ltpt = $baris159['sks3ips4kips2ltpt']; // Use something like this to get the result
                                                echo "<td>".$sks3ips4kips2ltpt."</td>";

                                                $sks3ips4kips2llbh = "SELECT COUNT(ips_4) AS sks3ips4kips2llbh FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and sks_3<18 and ket='Lebih Cepat'";
                                                $read160 = mysqli_query($connect, $sks3ips4kips2llbh); // Result resource
                                                $baris160 = mysqli_fetch_array($read160);
                                                $sks3ips4kips2llbh = $baris160['sks3ips4kips2llbh']; // Use something like this to get the result
                                                echo "<td>".$sks3ips4kips2llbh."</td>";

                                                $entropy_sks3ips4kips2l = hitung_entropy($sks3ips4kips2ltdk, $sks3ips4kips2ltpt, $sks3ips4kips2llbh);
                                                echo "<td>".$entropy_sks3ips4kips2l."</td>";

                                                

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>SKS Semester 3 Tinggi </td>
                                            <?php
                                            

                                                $sks3ips4kips2l2 = "SELECT COUNT(ips_4) AS sks3ips4kips2l2 FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and sks_3>=18";
                                                $read161 = mysqli_query($connect, $sks3ips4kips2l2); // Result resource
                                                $baris161 = mysqli_fetch_array($read161);
                                                $sks3ips4kips2l2 = $baris161['sks3ips4kips2l2']; // Use something like this to get the result
                                                echo "<td>".$sks3ips4kips2l2."</td>";
                                        
                                            
                                            
                                                $sks3ips4kips2l2tdk = "SELECT COUNT(ips_4) AS sks3ips4kips2l2tdk FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and sks_3>=18 and ket='Tidak Tepat Waktu'";
                                                $read162 = mysqli_query($connect, $sks3ips4kips2l2tdk); // Result resource
                                                $baris162 = mysqli_fetch_array($read162);
                                                $sks3ips4kips2l2tdk = $baris162['sks3ips4kips2l2tdk']; // Use something like this to get the result
                                                echo "<td>".$sks3ips4kips2l2tdk."</td>";
                                            

                                            
                                                $sks3ips4kips2l2tpt = "SELECT COUNT(ips_4) AS sks3ips4kips2l2tpt FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and sks_3>=18 and ket='Tepat Waktu'";
                                                $read163 = mysqli_query($connect, $sks3ips4kips2l2tpt); // Result resource
                                                $baris163 = mysqli_fetch_array($read163);
                                                $sks3ips4kips2l2tpt = $baris163['sks3ips4kips2l2tpt']; // Use something like this to get the result
                                                echo "<td>".$sks3ips4kips2l2tpt."</td>";

                                                $sks3ips4kips2l2lbh = "SELECT COUNT(ips_4) AS sks3ips4kips2l2lbh FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and sks_3>=18 and ket='Lebih Cepat'";
                                                $read164 = mysqli_query($connect, $sks3ips4kips2l2lbh); // Result resource
                                                $baris164 = mysqli_fetch_array($read164);
                                                $sks3ips4kips2l2lbh = $baris164['sks3ips4kips2l2lbh']; // Use something like this to get the result
                                                echo "<td>".$sks3ips4kips2l2lbh."</td>";

                                                $entropy_sks3ips4kips2l2 = hitung_entropy($sks3ips4kips2l2tdk, $sks3ips4kips2l2tpt, $sks3ips4kips2l2lbh);
                                                echo "<td>".$entropy_sks3ips4kips2l2."</td>";

                                                $gain23 = hitung_gain2($entropy_ips2ips4kk3l, $ips4kips2lbh,$sks3ips4kips2l, $sks3ips4kips2l2, $entropy_sks3ips4kips2l, $entropy_sks3ips4kips2l2);
                                                echo "<td>".format_decimal($gain23)."</td>";

                                            ?>
                                    </tr>
                                    <tr>
                                        <th scope="row" rowspan="2">3</th>
                                        <td>SKS Semester 4 Rendah </td>
                                            <?php
                                            

                                                $sks_4ips4kips2l = "SELECT COUNT(ips_4) AS sks_4ips4kips2l FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and sks_4<18";
                                                $read165 = mysqli_query($connect, $sks_4ips4kips2l); // Result resource
                                                $baris165 = mysqli_fetch_array($read165);
                                                $sks_4ips4kips2l = $baris165['sks_4ips4kips2l']; // Use something like this to get the result
                                                echo "<td>".$sks_4ips4kips2l."</td>";
                                        
                                            
                                            
                                                $sks_4ips4kips2ltdk = "SELECT COUNT(ips_4) AS sks_4ips4kips2ltdk FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and sks_4<18 and ket='Tidak Tepat Waktu'";
                                                $read166 = mysqli_query($connect, $sks_4ips4kips2ltdk); // Result resource
                                                $baris166 = mysqli_fetch_array($read166);
                                                $sks_4ips4kips2ltdk = $baris166['sks_4ips4kips2ltdk']; // Use something like this to get the result
                                                echo "<td>".$sks_4ips4kips2ltdk."</td>";
                                            

                                            
                                                $sks_4ips4kips2ltpt = "SELECT COUNT(ips_4) AS sks_4ips4kips2ltpt FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and sks_4<18 and ket='Tepat Waktu'";
                                                $read167 = mysqli_query($connect, $sks_4ips4kips2ltpt); // Result resource
                                                $baris167 = mysqli_fetch_array($read167);
                                                $sks_4ips4kips2ltpt = $baris167['sks_4ips4kips2ltpt']; // Use something like this to get the result
                                                echo "<td>".$sks_4ips4kips2ltpt."</td>";

                                                $sks_4ips4kips2llbh = "SELECT COUNT(ips_4) AS sks_4ips4kips2llbh FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and sks_4<18 and ket='Lebih Cepat'";
                                                $read168 = mysqli_query($connect, $sks_4ips4kips2llbh); // Result resource
                                                $baris168 = mysqli_fetch_array($read168);
                                                $sks_4ips4kips2llbh = $baris168['sks_4ips4kips2llbh']; // Use something like this to get the result
                                                echo "<td>".$sks_4ips4kips2llbh."</td>";

                                                $entropy_sks_4ips4kips2l = hitung_entropy($sks_4ips4kips2ltdk, $sks_4ips4kips2ltpt, $sks_4ips4kips2llbh);
                                                echo "<td>".$entropy_sks_4ips4kips2l."</td>";

                                                

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>SKS Semester 4 Tinggi </td>
                                            <?php
                                            

                                                $sks_4ips4kips2l2 = "SELECT COUNT(ips_4) AS sks_4ips4kips2l2 FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and sks_4>=18";
                                                $read169 = mysqli_query($connect, $sks_4ips4kips2l2); // Result resource
                                                $baris169 = mysqli_fetch_array($read169);
                                                $sks_4ips4kips2l2 = $baris169['sks_4ips4kips2l2']; // Use something like this to get the result
                                                echo "<td>".$sks_4ips4kips2l2."</td>";
                                        
                                            
                                            
                                                $sks_4ips4kips2l2tdk = "SELECT COUNT(ips_4) AS sks_4ips4kips2l2tdk FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and sks_4>=18 and ket='Tidak Tepat Waktu'";
                                                $read170 = mysqli_query($connect, $sks_4ips4kips2l2tdk); // Result resource
                                                $baris170 = mysqli_fetch_array($read170);
                                                $sks_4ips4kips2l2tdk = $baris170['sks_4ips4kips2l2tdk']; // Use something like this to get the result
                                                echo "<td>".$sks_4ips4kips2l2tdk."</td>";
                                            

                                            
                                                $sks_4ips4kips2l2tpt = "SELECT COUNT(ips_4) AS sks_4ips4kips2l2tpt FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and sks_4>=18 and ket='Tepat Waktu'";
                                                $read171 = mysqli_query($connect, $sks_4ips4kips2l2tpt); // Result resource
                                                $baris171 = mysqli_fetch_array($read171);
                                                $sks_4ips4kips2l2tpt = $baris171['sks_4ips4kips2l2tpt']; // Use something like this to get the result
                                                echo "<td>".$sks_4ips4kips2l2tpt."</td>";

                                                $sks_4ips4kips2l2lbh = "SELECT COUNT(ips_4) AS sks_4ips4kips2l2lbh FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and sks_4>=18 and ket='Lebih Cepat'";
                                                $read172 = mysqli_query($connect, $sks_4ips4kips2l2lbh); // Result resource
                                                $baris172 = mysqli_fetch_array($read172);
                                                $sks_4ips4kips2l2lbh = $baris172['sks_4ips4kips2l2lbh']; // Use something like this to get the result
                                                echo "<td>".$sks_4ips4kips2l2lbh."</td>";

                                                $entropy_sks_4ips4kips2l2 = hitung_entropy($sks_4ips4kips2l2tdk, $sks_4ips4kips2l2tpt, $sks_4ips4kips2l2lbh);
                                                echo "<td>".$entropy_sks_4ips4kips2l2."</td>";

                                                $gain24 = hitung_gain2($entropy_ips2ips4kk3l, $ips4kips2lbh,$sks_4ips4kips2l, $sks_4ips4kips2l2, $entropy_sks_4ips4kips2l, $entropy_sks_4ips4kips2l2);
                                                echo "<td>".format_decimal($gain24)."</td>";

                                            ?>
                                    </tr>
                                    <tr>
                                        <th scope="row" rowspan="3">4</th>
                                        <td>IPS Semester 3 <'3.00' </td>
                                            <?php
                                            

                                                $ips_3ips4kips2l = "SELECT COUNT(ips_4) AS ips_3ips4kips2l FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and ips_3<3.00";
                                                $read173 = mysqli_query($connect, $ips_3ips4kips2l); // Result resource
                                                $baris173 = mysqli_fetch_array($read173);
                                                $ips_3ips4kips2l = $baris173['ips_3ips4kips2l']; // Use something like this to get the result
                                                echo "<td>".$ips_3ips4kips2l."</td>";
                                        
                                            
                                            
                                                $ips_3ips4kips2ltdk = "SELECT COUNT(ips_4) AS ips_3ips4kips2ltdk FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and ips_3<3.00 and ket='Tidak Tepat Waktu'";
                                                $read174 = mysqli_query($connect, $ips_3ips4kips2ltdk); // Result resource
                                                $baris174 = mysqli_fetch_array($read174);
                                                $ips_3ips4kips2ltdk = $baris174['ips_3ips4kips2ltdk']; // Use something like this to get the result
                                                echo "<td>".$ips_3ips4kips2ltdk."</td>";
                                            

                                            
                                                $ips_3ips4kips2ltpt = "SELECT COUNT(ips_4) AS ips_3ips4kips2ltpt FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and ips_3<3.00 and ket='Tepat Waktu'";
                                                $read175 = mysqli_query($connect, $ips_3ips4kips2ltpt); // Result resource
                                                $baris175 = mysqli_fetch_array($read175);
                                                $ips_3ips4kips2ltpt = $baris175['ips_3ips4kips2ltpt']; // Use something like this to get the result
                                                echo "<td>".$ips_3ips4kips2ltpt."</td>";

                                                $ips_3ips4kips2llbh = "SELECT COUNT(ips_4) AS ips_3ips4kips2llbh FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and ips_3<3.00 and ket='Lebih Cepat'";
                                                $read176 = mysqli_query($connect, $ips_3ips4kips2llbh); // Result resource
                                                $baris176 = mysqli_fetch_array($read176);
                                                $ips_3ips4kips2llbh = $baris176['ips_3ips4kips2llbh']; // Use something like this to get the result
                                                echo "<td>".$ips_3ips4kips2llbh."</td>";

                                                $entropy_ips_3ips4kips2l = hitung_entropy($ips_3ips4kips2ltdk, $ips_3ips4kips2ltpt, $ips_3ips4kips2llbh);
                                                echo "<td>".$entropy_ips_3ips4kips2l."</td>";

                                                

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>IPS Semester 3 <='3.50' </td>
                                            <?php
                                            

                                                $ips_3ips4kips2l2 = "SELECT COUNT(ips_4) AS ips_3ips4kips2l2 FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and ips_3>=3.00 and ips_3<=3.50";
                                                $read177 = mysqli_query($connect, $ips_3ips4kips2l2); // Result resource
                                                $baris177 = mysqli_fetch_array($read177);
                                                $ips_3ips4kips2l2 = $baris177['ips_3ips4kips2l2']; // Use something like this to get the result
                                                echo "<td>".$ips_3ips4kips2l2."</td>";
                                        
                                            
                                            
                                                $ips_3ips4kips2l2tdk = "SELECT COUNT(ips_4) AS ips_3ips4kips2l2tdk FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and ips_3>=3.00 and ips_3<=3.50 and ket='Tidak Tepat Waktu'";
                                                $read178 = mysqli_query($connect, $ips_3ips4kips2l2tdk); // Result resource
                                                $baris178 = mysqli_fetch_array($read178);
                                                $ips_3ips4kips2l2tdk = $baris178['ips_3ips4kips2l2tdk']; // Use something like this to get the result
                                                echo "<td>".$ips_3ips4kips2l2tdk."</td>";
                                            

                                            
                                                $ips_3ips4kips2l2tpt = "SELECT COUNT(ips_4) AS ips_3ips4kips2l2tpt FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and ips_3>=3.00 and ips_3<=3.50 and ket='Tepat Waktu'";
                                                $read179 = mysqli_query($connect, $ips_3ips4kips2l2tpt); // Result resource
                                                $baris179 = mysqli_fetch_array($read179);
                                                $ips_3ips4kips2l2tpt = $baris179['ips_3ips4kips2l2tpt']; // Use something like this to get the result
                                                echo "<td>".$ips_3ips4kips2l2tpt."</td>";

                                                $ips_3ips4kips2l2lbh = "SELECT COUNT(ips_4) AS ips_3ips4kips2l2lbh FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and ips_3>=3.00 and ips_3<=3.50 and ket='Lebih Cepat'";
                                                $read180 = mysqli_query($connect, $ips_3ips4kips2l2lbh); // Result resource
                                                $baris180 = mysqli_fetch_array($read180);
                                                $ips_3ips4kips2l2lbh = $baris180['ips_3ips4kips2l2lbh']; // Use something like this to get the result
                                                echo "<td>".$ips_3ips4kips2l2lbh."</td>";

                                                $entropy_ips_3ips4kips2l2 = hitung_entropy($ips_3ips4kips2l2tdk, $ips_3ips4kips2l2tpt, $ips_3ips4kips2l2lbh);
                                                echo "<td>".$entropy_ips_3ips4kips2l2."</td>";

                                                

                                            ?>
                                    </tr>
                                    <tr>
                                        <td>IPS Semester 3 >'3.50' </td>
                                            <?php
                                            

                                                $ips_3ips4kips2l3 = "SELECT COUNT(ips_4) AS ips_3ips4kips2l3 FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and ips_3>3.50";
                                                $read177 = mysqli_query($connect, $ips_3ips4kips2l3); // Result resource
                                                $baris177 = mysqli_fetch_array($read177);
                                                $ips_3ips4kips2l3 = $baris177['ips_3ips4kips2l3']; // Use something like this to get the result
                                                echo "<td>".$ips_3ips4kips2l3."</td>";
                                        
                                            
                                            
                                                $ips_3ips4kips2l3tdk = "SELECT COUNT(ips_4) AS ips_3ips4kips2l3tdk FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and ips_3>3.50 and ket='Tidak Tepat Waktu'";
                                                $read178 = mysqli_query($connect, $ips_3ips4kips2l3tdk); // Result resource
                                                $baris178 = mysqli_fetch_array($read178);
                                                $ips_3ips4kips2l3tdk = $baris178['ips_3ips4kips2l3tdk']; // Use something like this to get the result
                                                echo "<td>".$ips_3ips4kips2l3tdk."</td>";
                                            

                                            
                                                $ips_3ips4kips2l3tpt = "SELECT COUNT(ips_4) AS ips_3ips4kips2l3tpt FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and ips_3>3.50 and ket='Tepat Waktu'";
                                                $read179 = mysqli_query($connect, $ips_3ips4kips2l3tpt); // Result resource
                                                $baris179 = mysqli_fetch_array($read179);
                                                $ips_3ips4kips2l3tpt = $baris179['ips_3ips4kips2l3tpt']; // Use something like this to get the result
                                                echo "<td>".$ips_3ips4kips2l3tpt."</td>";

                                                $ips_3ips4kips2l3lbh = "SELECT COUNT(ips_4) AS ips_3ips4kips2l3lbh FROM tbl_mhs_lama where ips_4>=3.00 and ips_4<=3.50 and ips_2>3.50 and ips_3>3.50 and ket='Lebih Cepat'";
                                                $read180 = mysqli_query($connect, $ips_3ips4kips2l3lbh); // Result resource
                                                $baris180 = mysqli_fetch_array($read180);
                                                $ips_3ips4kips2l3lbh = $baris180['ips_3ips4kips2l3lbh']; // Use something like this to get the result
                                                echo "<td>".$ips_3ips4kips2l3lbh."</td>";

                                                $entropy_ips_3ips4kips2l3 = hitung_entropy($ips_3ips4kips2l3tdk, $ips_3ips4kips2l3tpt, $ips_3ips4kips2l3lbh);
                                                echo "<td>".$entropy_ips_3ips4kips2l3."</td>";

                                                $gain25 = hitung_gain3($entropy_ips2ips4kk3l, $ips4kips2lbh, $ips_3ips4kips2l, $ips_3ips4kips2l2, $ips_3ips4kips2l3, $entropy_ips_3ips4kips2l, $entropy_ips_3ips4kips2l2, $entropy_ips_3ips4kips2l3);
                                                echo "<td>".format_decimal($gain25)."</td>";

                                            ?>
                                    </tr>
                                </tbody>
                            </table>

                            <?php
                                echo "Atribut Terpilih = IPS Semester 3 dengan Gain =".format_decimal($gain25)."<br>";
                                echo "==================================================================================="."<br>";
                                echo "Cabang 3"."<br>";
                                echo "(IPS Semester 4 <3.00)"."<br>";
                            ?>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Atribut</th>
                                        <th>Jumlah Kasus</th>
                                        <th>Tidak Tepat Waktu</th>
                                        <th>Tepat Waktu</th>
                                        <th>Lebih Cepat</th>
                                        <th>Entrophy</th>
                                        <th>Gain</th>
                                    </tr>
                                </thead>
                                <?php
                                    $q17     = "SELECT COUNT(ips_4) AS kurangk4 from tbl_mhs_lama where ips_4<3.00";
                                    $read181  = mysqli_query($connect, $q17);
                                    $baris181 = mysqli_fetch_array($read181);
                                    $ips4kkbh  = $baris181['kurangk4'];
                                    echo "Jumlah =".$ips4kkbh."<br>";

                                    $q18     = "SELECT COUNT(ips_4) AS kurangk4_tidak from tbl_mhs_lama where ips_4<3.00 and ket='Tidak Tepat Waktu'";
                                    $read182  = mysqli_query($connect, $q18);
                                    $baris182 = mysqli_fetch_array($read182);
                                    $ips4kktdk  = $baris182['kurangk4_tidak'];
                                    echo "Tidak Tepat Waktu =".$ips4kktdk."<br>";

                                    $q19     = "SELECT COUNT(ips_4) AS kurangk4_tepat from tbl_mhs_lama where ips_4<3.00 and ket='Tepat Waktu'";
                                    $read183  = mysqli_query($connect, $q19);
                                    $baris183 = mysqli_fetch_array($read183);
                                    $ips4kktpt  = $baris183['kurangk4_tepat'];
                                    echo "Tepat Waktu =".$ips4kktpt."<br>"; 

                                    $q20     = "SELECT COUNT(ips_4) AS kurangk4_lebih from tbl_mhs_lama where ips_4<3.00 and ket='Lebih Cepat'";
                                    $read184  = mysqli_query($connect, $q20);
                                    $baris184 = mysqli_fetch_array($read184);
                                    $ips4kklbh  = $baris184['kurangk4_lebih'];
                                    echo "Tepat Waktu =".$ips4kklbh."<br>";
                                    echo "Entrophy =".$entropy_ips4."<br>";                                    
                                ?>
                                <tbody>
                                     <tr>
                                        <th scope="row" rowspan="2">1</th>
                                        <td>SKS Semester 2 Rendah </td>
                                            <?php
                                            

                                                $sks2ips4kk = "SELECT COUNT(ips_4) AS sks2ips4kk FROM tbl_mhs_lama where ips_4<3.00 and sks_2<18";
                                                $read185 = mysqli_query($connect, $sks2ips4kk); // Result resource
                                                $baris185 = mysqli_fetch_array($read185);
                                                $sks2ips4kk = $baris185['sks2ips4kk']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4kk."</td>";
                                        
                                            
                                            
                                                $sks2ips4kktdk = "SELECT COUNT(ips_4) AS sks2ips4kktdk FROM tbl_mhs_lama where ips_4<3.00 and sks_2<18 and ket='Tidak Tepat Waktu'";
                                                $read186 = mysqli_query($connect, $sks2ips4kktdk); // Result resource
                                                $baris186 = mysqli_fetch_array($read186);
                                                $sks2ips4kktdk = $baris186['sks2ips4kktdk']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4kktdk."</td>";
                                            

                                            
                                                $sks2ips4kktpt = "SELECT COUNT(ips_4) AS sks2ips4kktpt FROM tbl_mhs_lama where ips_4<3.00 and sks_2<18 and ket='Tepat Waktu'";
                                                $read187 = mysqli_query($connect, $sks2ips4kktpt); // Result resource
                                                $baris187 = mysqli_fetch_array($read187);
                                                $sks2ips4kktpt = $baris187['sks2ips4kktpt']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4kktpt."</td>";

                                                $sks2ips4kklbh = "SELECT COUNT(ips_4) AS sks2ips4kklbh FROM tbl_mhs_lama where ips_4<3.00 and sks_2<18 and ket='Lebih Cepat'";
                                                $read188 = mysqli_query($connect, $sks2ips4kklbh); // Result resource
                                                $baris188 = mysqli_fetch_array($read188);
                                                $sks2ips4kklbh = $baris188['sks2ips4kklbh']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4kklbh."</td>";

                                                $entropy_sks2ips4kk = hitung_entropy($sks2ips4kktdk, $sks2ips4kktpt, $sks2ips4kklbh);
                                                echo "<td>".$entropy_sks2ips4kk."</td>";

                                                

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>SKS Semester 2 Tinggi </td>
                                            <?php
                                            

                                                $sks2ips4kk2 = "SELECT COUNT(ips_4) AS sks2ips4kk2 FROM tbl_mhs_lama where ips_4<3.00 and sks_2>=18";
                                                $read185 = mysqli_query($connect, $sks2ips4kk2); // Result resource
                                                $baris185 = mysqli_fetch_array($read185);
                                                $sks2ips4kk2 = $baris185['sks2ips4kk2']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4kk2."</td>";
                                        
                                            
                                            
                                                $sks2ips4kk2tdk = "SELECT COUNT(ips_4) AS sks2ips4kk2tdk FROM tbl_mhs_lama where ips_4<3.00 and sks_2>=18 and ket='Tidak Tepat Waktu'";
                                                $read186 = mysqli_query($connect, $sks2ips4kk2tdk); // Result resource
                                                $baris186 = mysqli_fetch_array($read186);
                                                $sks2ips4kk2tdk = $baris186['sks2ips4kk2tdk']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4kk2tdk."</td>";
                                            

                                            
                                                $sks2ips4kk2tpt = "SELECT COUNT(ips_4) AS sks2ips4kk2tpt FROM tbl_mhs_lama where ips_4<3.00 and sks_2>=18 and ket='Tepat Waktu'";
                                                $read187 = mysqli_query($connect, $sks2ips4kk2tpt); // Result resource
                                                $baris187 = mysqli_fetch_array($read187);
                                                $sks2ips4kk2tpt = $baris187['sks2ips4kk2tpt']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4kk2tpt."</td>";

                                                $sks2ips4kk2lbh = "SELECT COUNT(ips_4) AS sks2ips4kk2lbh FROM tbl_mhs_lama where ips_4<3.00 and sks_2>=18 and ket='Lebih Cepat'";
                                                $read188 = mysqli_query($connect, $sks2ips4kk2lbh); // Result resource
                                                $baris188 = mysqli_fetch_array($read188);
                                                $sks2ips4kk2lbh = $baris188['sks2ips4kk2lbh']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4kk2lbh."</td>";

                                                $entropy_sks2ips4kk2 = hitung_entropy($sks2ips4kk2tdk, $sks2ips4kk2tpt, $sks2ips4kk2lbh);
                                                echo "<td>".$entropy_sks2ips4kk2."</td>";

                                                $gain26 = hitung_gain2($entropy_ips4, $ips4kkbh, $sks2ips4kk, $sks2ips4kk2,  $entropy_sks2ips4kk, $entropy_sks2ips4kk2);
                                                echo "<td>".format_decimal($gain26)."</td>";

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" rowspan="2">2</th>
                                        <td>SKS Semester 3 Rendah </td>
                                            <?php
                                            

                                                $sks3ips4kk = "SELECT COUNT(ips_4) AS sks3ips4kk FROM tbl_mhs_lama where ips_4<3.00 and sks_3<18";
                                                $read189 = mysqli_query($connect, $sks3ips4kk); // Result resource
                                                $baris189 = mysqli_fetch_array($read189);
                                                $sks3ips4kk = $baris189['sks3ips4kk']; // Use something like this to get the result
                                                echo "<td>".$sks3ips4kk."</td>";
                                        
                                            
                                            
                                                $sks3ips4kktdk = "SELECT COUNT(ips_4) AS sks3ips4kktdk FROM tbl_mhs_lama where ips_4<3.00 and sks_3<18 and ket='Tidak Tepat Waktu'";
                                                $read190 = mysqli_query($connect, $sks3ips4kktdk); // Result resource
                                                $baris190 = mysqli_fetch_array($read190);
                                                $sks3ips4kktdk = $baris190['sks3ips4kktdk']; // Use something like this to get the result
                                                echo "<td>".$sks3ips4kktdk."</td>";
                                            

                                            
                                                $sks3ips4kktpt = "SELECT COUNT(ips_4) AS sks3ips4kktpt FROM tbl_mhs_lama where ips_4<3.00 and sks_3<18 and ket='Tepat Waktu'";
                                                $read191 = mysqli_query($connect, $sks3ips4kktpt); // Result resource
                                                $baris191 = mysqli_fetch_array($read191);
                                                $sks3ips4kktpt = $baris191['sks3ips4kktpt']; // Use something like this to get the result
                                                echo "<td>".$sks3ips4kktpt."</td>";

                                                $sks3ips4kklbh = "SELECT COUNT(ips_4) AS sks3ips4kklbh FROM tbl_mhs_lama where ips_4<3.00 and sks_3<18 and ket='Lebih Cepat'";
                                                $read192 = mysqli_query($connect, $sks3ips4kklbh); // Result resource
                                                $baris192 = mysqli_fetch_array($read192);
                                                $sks3ips4kklbh = $baris192['sks3ips4kklbh']; // Use something like this to get the result
                                                echo "<td>".$sks3ips4kklbh."</td>";

                                                $entropy_sks3ips4kk = hitung_entropy($sks3ips4kktdk, $sks3ips4kktpt, $sks3ips4kklbh);
                                                echo "<td>".$entropy_sks3ips4kk."</td>";

                                                

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>SKS Semester 3 Tinggi </td>
                                            <?php
                                            

                                                $sks3ips4kk2 = "SELECT COUNT(ips_4) AS sks3ips4kk2 FROM tbl_mhs_lama where ips_4<3.00 and sks_3>=18";
                                                $read193 = mysqli_query($connect, $sks3ips4kk2); // Result resource
                                                $baris193 = mysqli_fetch_array($read193);
                                                $sks3ips4kk2 = $baris193['sks3ips4kk2']; // Use something like this to get the result
                                                echo "<td>".$sks3ips4kk2."</td>";
                                        
                                            
                                            
                                                $sks3ips4kk2tdk = "SELECT COUNT(ips_4) AS sks3ips4kk2tdk FROM tbl_mhs_lama where ips_4<3.00 and sks_3>=18 and ket='Tidak Tepat Waktu'";
                                                $read194 = mysqli_query($connect, $sks3ips4kk2tdk); // Result resource
                                                $baris194 = mysqli_fetch_array($read194);
                                                $sks3ips4kk2tdk = $baris194['sks3ips4kk2tdk']; // Use something like this to get the result
                                                echo "<td>".$sks3ips4kk2tdk."</td>";
                                            

                                            
                                                $sks3ips4kk2tpt = "SELECT COUNT(ips_4) AS sks3ips4kk2tpt FROM tbl_mhs_lama where ips_4<3.00 and sks_3>=18 and ket='Tepat Waktu'";
                                                $read195 = mysqli_query($connect, $sks3ips4kk2tpt); // Result resource
                                                $baris195 = mysqli_fetch_array($read195);
                                                $sks3ips4kk2tpt = $baris195['sks3ips4kk2tpt']; // Use something like this to get the result
                                                echo "<td>".$sks3ips4kk2tpt."</td>";

                                                $sks3ips4kk2lbh = "SELECT COUNT(ips_4) AS sks3ips4kk2lbh FROM tbl_mhs_lama where ips_4<3.00 and sks_3>=18 and ket='Lebih Cepat'";
                                                $read196 = mysqli_query($connect, $sks3ips4kk2lbh); // Result resource
                                                $baris196 = mysqli_fetch_array($read196);
                                                $sks3ips4kk2lbh = $baris196['sks3ips4kk2lbh']; // Use something like this to get the result
                                                echo "<td>".$sks3ips4kk2lbh."</td>";

                                                $entropy_sks3ips4kk2 = hitung_entropy($sks3ips4kk2tdk, $sks3ips4kk2tpt, $sks3ips4kk2lbh);
                                                echo "<td>".$entropy_sks3ips4kk2."</td>";

                                                $gain27 = hitung_gain2($entropy_ips4, $ips4kkbh, $sks3ips4kk, $sks3ips4kk2,  $entropy_sks3ips4kk, $entropy_sks3ips4kk2);
                                                echo "<td>".format_decimal($gain27)."</td>";

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" rowspan="2">3</th>
                                        <td>SKS Semester 4 Rendah </td>
                                            <?php
                                            

                                                $sks4ips4kk = "SELECT COUNT(ips_4) AS sks4ips4kk FROM tbl_mhs_lama where ips_4<3.00 and sks_4<18";
                                                $read197 = mysqli_query($connect, $sks4ips4kk); // Result resource
                                                $baris197 = mysqli_fetch_array($read197);
                                                $sks4ips4kk = $baris197['sks4ips4kk']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4kk."</td>";
                                        
                                            
                                            
                                                $sks4ips4kktdk = "SELECT COUNT(ips_4) AS sks4ips4kktdk FROM tbl_mhs_lama where ips_4<3.00 and sks_4<18 and ket='Tidak Tepat Waktu'";
                                                $read198 = mysqli_query($connect, $sks4ips4kktdk); // Result resource
                                                $baris198 = mysqli_fetch_array($read198);
                                                $sks4ips4kktdk = $baris198['sks4ips4kktdk']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4kktdk."</td>";
                                            

                                            
                                                $sks4ips4kktpt = "SELECT COUNT(ips_4) AS sks4ips4kktpt FROM tbl_mhs_lama where ips_4<3.00 and sks_4<18 and ket='Tepat Waktu'";
                                                $read199 = mysqli_query($connect, $sks4ips4kktpt); // Result resource
                                                $baris199 = mysqli_fetch_array($read199);
                                                $sks4ips4kktpt = $baris199['sks4ips4kktpt']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4kktpt."</td>";

                                                $sks4ips4kklbh = "SELECT COUNT(ips_4) AS sks4ips4kklbh FROM tbl_mhs_lama where ips_4<3.00 and sks_4<18 and ket='Lebih Cepat'";
                                                $read200 = mysqli_query($connect, $sks4ips4kklbh); // Result resource
                                                $baris200 = mysqli_fetch_array($read200);
                                                $sks4ips4kklbh = $baris200['sks4ips4kklbh']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4kklbh."</td>";

                                                $entropy_sks4ips4kk = hitung_entropy($sks4ips4kktdk, $sks4ips4kktpt, $sks4ips4kklbh);
                                                echo "<td>".$entropy_sks4ips4kk."</td>";

                                                

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>SKS Semester 4 Tinggi </td>
                                            <?php
                                            

                                                $sks4ips4kk2 = "SELECT COUNT(ips_4) AS sks4ips4kk2 FROM tbl_mhs_lama where ips_4<3.00 and sks_4>=18";
                                                $read201 = mysqli_query($connect, $sks4ips4kk2); // Result resource
                                                $baris201 = mysqli_fetch_array($read201);
                                                $sks4ips4kk2 = $baris201['sks4ips4kk2']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4kk2."</td>";
                                        
                                            
                                            
                                                $sks4ips4kk2tdk = "SELECT COUNT(ips_4) AS sks4ips4kk2tdk FROM tbl_mhs_lama where ips_4<3.00 and sks_4>=18 and ket='Tidak Tepat Waktu'";
                                                $read202 = mysqli_query($connect, $sks4ips4kk2tdk); // Result resource
                                                $baris202 = mysqli_fetch_array($read202);
                                                $sks4ips4kk2tdk = $baris202['sks4ips4kk2tdk']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4kk2tdk."</td>";
                                            

                                            
                                                $sks4ips4kk2tpt = "SELECT COUNT(ips_4) AS sks4ips4kk2tpt FROM tbl_mhs_lama where ips_4<3.00 and sks_4>=18 and ket='Tepat Waktu'";
                                                $read203 = mysqli_query($connect, $sks4ips4kk2tpt); // Result resource
                                                $baris203 = mysqli_fetch_array($read203);
                                                $sks4ips4kk2tpt = $baris203['sks4ips4kk2tpt']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4kk2tpt."</td>";

                                                $sks4ips4kk2lbh = "SELECT COUNT(ips_4) AS sks4ips4kk2lbh FROM tbl_mhs_lama where ips_4<3.00 and sks_4>=18 and ket='Lebih Cepat'";
                                                $read204 = mysqli_query($connect, $sks4ips4kk2lbh); // Result resource
                                                $baris204 = mysqli_fetch_array($read204);
                                                $sks4ips4kk2lbh = $baris204['sks4ips4kk2lbh']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4kk2lbh."</td>";

                                                $entropy_sks4ips4kk2 = hitung_entropy($sks4ips4kk2tdk, $sks4ips4kk2tpt, $sks4ips4kk2lbh);
                                                echo "<td>".$entropy_sks4ips4kk2."</td>";

                                                $gain28 = hitung_gain2($entropy_ips4, $ips4kkbh, $sks4ips4kk, $sks4ips4kk2,  $entropy_sks4ips4kk, $entropy_sks4ips4kk2);
                                                echo "<td>".format_decimal($gain28)."</td>";

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" rowspan="3">4</th>
                                        <td>IPS Semester 2 <'3.00' </td>
                                            <?php
                                            

                                                $ips2ips4kk = "SELECT COUNT(ips_4) AS ips2ips4kk FROM tbl_mhs_lama where ips_4<3.00 and ips_2<3.00";
                                                $read205 = mysqli_query($connect, $ips2ips4kk); // Result resource
                                                $baris205 = mysqli_fetch_array($read205);
                                                $ips2ips4kk = $baris205['ips2ips4kk']; // Use something like this to get the result
                                                echo "<td>".$ips2ips4kk."</td>";
                                        
                                            
                                            
                                                $ips2ips4kktdk = "SELECT COUNT(ips_4) AS ips2ips4kktdk FROM tbl_mhs_lama where ips_4<3.00 and ips_2<3.00 and ket='Tidak Tepat Waktu'";
                                                $read206 = mysqli_query($connect, $ips2ips4kktdk); // Result resource
                                                $baris206 = mysqli_fetch_array($read206);
                                                $ips2ips4kktdk = $baris206['ips2ips4kktdk']; // Use something like this to get the result
                                                echo "<td>".$ips2ips4kktdk."</td>";
                                            

                                            
                                                $ips2ips4kktpt = "SELECT COUNT(ips_4) AS ips2ips4kktpt FROM tbl_mhs_lama where ips_4<3.00 and ips_2<3.00 and ket='Tepat Waktu'";
                                                $read207 = mysqli_query($connect, $ips2ips4kktpt); // Result resource
                                                $baris207 = mysqli_fetch_array($read207);
                                                $ips2ips4kktpt = $baris207['ips2ips4kktpt']; // Use something like this to get the result
                                                echo "<td>".$ips2ips4kktpt."</td>";

                                                $ips2ips4kklbh = "SELECT COUNT(ips_4) AS ips2ips4kklbh FROM tbl_mhs_lama where ips_4<3.00 and ips_2<3.00 and ket='Lebih Cepat'";
                                                $read208 = mysqli_query($connect, $ips2ips4kklbh); // Result resource
                                                $baris208 = mysqli_fetch_array($read208);
                                                $ips2ips4kklbh = $baris208['ips2ips4kklbh']; // Use something like this to get the result
                                                echo "<td>".$ips2ips4kklbh."</td>";

                                                $entropy_ips2ips4kk = hitung_entropy($ips2ips4kktdk, $ips2ips4kktpt, $ips2ips4kklbh);
                                                echo "<td>".$entropy_ips2ips4kk."</td>";

                                                

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>IPS Semester 2 <='3.50' </td>
                                            <?php
                                            

                                                $ips2ips4kk2 = "SELECT COUNT(ips_4) AS ips2ips4kk2 FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50";
                                                $read209 = mysqli_query($connect, $ips2ips4kk2); // Result resource
                                                $baris209 = mysqli_fetch_array($read209);
                                                $ips2ips4kk2 = $baris209['ips2ips4kk2']; // Use something like this to get the result
                                                echo "<td>".$ips2ips4kk2."</td>";
                                        
                                            
                                            
                                                $ips2ips4kk2tdk = "SELECT COUNT(ips_4) AS ips2ips4kk2tdk FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ket='Tidak Tepat Waktu'";
                                                $read210 = mysqli_query($connect, $ips2ips4kk2tdk); // Result resource
                                                $baris210 = mysqli_fetch_array($read210);
                                                $ips2ips4kk2tdk = $baris210['ips2ips4kk2tdk']; // Use something like this to get the result
                                                echo "<td>".$ips2ips4kk2tdk."</td>";
                                            

                                            
                                                $ips2ips4kk2tpt = "SELECT COUNT(ips_4) AS ips2ips4kk2tpt FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ket='Tepat Waktu'";
                                                $read211 = mysqli_query($connect, $ips2ips4kk2tpt); // Result resource
                                                $baris211 = mysqli_fetch_array($read211);
                                                $ips2ips4kk2tpt = $baris211['ips2ips4kk2tpt']; // Use something like this to get the result
                                                echo "<td>".$ips2ips4kk2tpt."</td>";

                                                $ips2ips4kk2lbh = "SELECT COUNT(ips_4) AS ips2ips4kk2lbh FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ket='Lebih Cepat'";
                                                $read212 = mysqli_query($connect, $ips2ips4kk2lbh); // Result resource
                                                $baris212 = mysqli_fetch_array($read212);
                                                $ips2ips4kk2lbh = $baris212['ips2ips4kk2lbh']; // Use something like this to get the result
                                                echo "<td>".$ips2ips4kk2lbh."</td>";

                                                $entropy_ips2ips4kk2 = hitung_entropy($ips2ips4kk2tdk, $ips2ips4kk2tpt, $ips2ips4kk2lbh);
                                                echo "<td>".$entropy_ips2ips4kk2."</td>";

                                                

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>IPS Semester 2 >'3.50' </td>
                                            <?php
                                            

                                                $ips2ips4kk3 = "SELECT COUNT(ips_4) AS ips2ips4kk3 FROM tbl_mhs_lama where ips_4<3.00 and ips_2>3.50";
                                                $read213 = mysqli_query($connect, $ips2ips4kk3); // Result resource
                                                $baris213 = mysqli_fetch_array($read213);
                                                $ips2ips4kk3 = $baris213['ips2ips4kk3']; // Use something like this to get the result
                                                echo "<td>".$ips2ips4kk3."</td>";
                                        
                                            
                                            
                                                $ips2ips4kk3tdk = "SELECT COUNT(ips_4) AS ips2ips4kk3tdk FROM tbl_mhs_lama where ips_4<3.00 and ips_2>3.50 and ket='Tidak Tepat Waktu'";
                                                $read214 = mysqli_query($connect, $ips2ips4kk3tdk); // Result resource
                                                $baris214 = mysqli_fetch_array($read214);
                                                $ips2ips4kk3tdk = $baris214['ips2ips4kk3tdk']; // Use something like this to get the result
                                                echo "<td>".$ips2ips4kk3tdk."</td>";
                                            

                                            
                                                $ips2ips4kk3tpt = "SELECT COUNT(ips_4) AS ips2ips4kk3tpt FROM tbl_mhs_lama where ips_4<3.00 and ips_2>3.50 and ket='Tepat Waktu'";
                                                $read215 = mysqli_query($connect, $ips2ips4kk3tpt); // Result resource
                                                $baris215 = mysqli_fetch_array($read215);
                                                $ips2ips4kk3tpt = $baris215['ips2ips4kk3tpt']; // Use something like this to get the result
                                                echo "<td>".$ips2ips4kk3tpt."</td>";

                                                $ips2ips4kk3lbh = "SELECT COUNT(ips_4) AS ips2ips4kk3lbh FROM tbl_mhs_lama where ips_4<3.00 and ips_2>3.50 and ket='Lebih Cepat'";
                                                $read216 = mysqli_query($connect, $ips2ips4kk3lbh); // Result resource
                                                $baris216 = mysqli_fetch_array($read216);
                                                $ips2ips4kk3lbh = $baris216['ips2ips4kk3lbh']; // Use something like this to get the result
                                                echo "<td>".$ips2ips4kk3lbh."</td>";

                                                $entropy_ips2ips4kk3 = hitung_entropy($ips2ips4kk3tdk, $ips2ips4kk3tpt, $ips2ips4kk3lbh);
                                                echo "<td>".$entropy_ips2ips4kk3."</td>";

                                                $gain29 = hitung_gain3($entropy_ips4, $ips4kkbh, $ips2ips4kk, $ips2ips4kk2, $ips2ips4kk3,  $entropy_ips2ips4kk, $entropy_ips2ips4kk2, $entropy_ips2ips4kk3);
                                                echo "<td>".format_decimal($gain29)."</td>";

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" rowspan="3">5</th>
                                        <td>IPS Semester 3 <'3.00' </td>
                                            <?php
                                            

                                                $ips3ips4kk = "SELECT COUNT(ips_4) AS ips3ips4kk FROM tbl_mhs_lama where ips_4<3.00 and ips_3<3.00";
                                                $read217 = mysqli_query($connect, $ips3ips4kk); // Result resource
                                                $baris217 = mysqli_fetch_array($read217);
                                                $ips3ips4kk = $baris217['ips3ips4kk']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4kk."</td>";
                                        
                                            
                                            
                                                $ips3ips4kktdk = "SELECT COUNT(ips_4) AS ips3ips4kktdk FROM tbl_mhs_lama where ips_4<3.00 and ips_3<3.00 and ket='Tidak Tepat Waktu'";
                                                $read218 = mysqli_query($connect, $ips3ips4kktdk); // Result resource
                                                $baris218 = mysqli_fetch_array($read218);
                                                $ips3ips4kktdk = $baris218['ips3ips4kktdk']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4kktdk."</td>";
                                            

                                            
                                                $ips3ips4kktpt = "SELECT COUNT(ips_4) AS ips3ips4kktpt FROM tbl_mhs_lama where ips_4<3.00 and ips_3<3.00 and ket='Tepat Waktu'";
                                                $read219 = mysqli_query($connect, $ips3ips4kktpt); // Result resource
                                                $baris219 = mysqli_fetch_array($read219);
                                                $ips3ips4kktpt = $baris219['ips3ips4kktpt']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4kktpt."</td>";

                                                $ips3ips4kklbh = "SELECT COUNT(ips_4) AS ips3ips4kklbh FROM tbl_mhs_lama where ips_4<3.00 and ips_3<3.00 and ket='Lebih Cepat'";
                                                $read220 = mysqli_query($connect, $ips3ips4kklbh); // Result resource
                                                $baris220 = mysqli_fetch_array($read220);
                                                $ips3ips4kklbh = $baris220['ips3ips4kklbh']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4kklbh."</td>";

                                                $entropy_ips3ips4kk = hitung_entropy($ips3ips4kktdk, $ips3ips4kktpt, $ips3ips4kklbh);
                                                echo "<td>".$entropy_ips3ips4kk."</td>";

                                                

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>IPS Semester 3 <='3.50' </td>
                                            <?php
                                            

                                                $ips3ips4kk2 = "SELECT COUNT(ips_4) AS ips3ips4kk2 FROM tbl_mhs_lama where ips_4<3.00 and ips_3>=3.00 and ips_3<=3.50";
                                                $read221 = mysqli_query($connect, $ips3ips4kk2); // Result resource
                                                $baris221 = mysqli_fetch_array($read221);
                                                $ips3ips4kk2 = $baris221['ips3ips4kk2']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4kk2."</td>";
                                        
                                            
                                            
                                                $ips3ips4kk2tdk = "SELECT COUNT(ips_4) AS ips3ips4kk2tdk FROM tbl_mhs_lama where ips_4<3.00 and ips_3>=3.00 and ips_3<=3.50 and ket='Tidak Tepat Waktu'";
                                                $read222 = mysqli_query($connect, $ips3ips4kk2tdk); // Result resource
                                                $baris222 = mysqli_fetch_array($read222);
                                                $ips3ips4kk2tdk = $baris222['ips3ips4kk2tdk']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4kk2tdk."</td>";
                                            

                                            
                                                $ips3ips4kk2tpt = "SELECT COUNT(ips_4) AS ips3ips4kk2tpt FROM tbl_mhs_lama where ips_4<3.00 and ips_3>=3.00 and ips_3<=3.50 and ket='Tepat Waktu'";
                                                $read223 = mysqli_query($connect, $ips3ips4kk2tpt); // Result resource
                                                $baris223 = mysqli_fetch_array($read223);
                                                $ips3ips4kk2tpt = $baris223['ips3ips4kk2tpt']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4kk2tpt."</td>";

                                                $ips3ips4kk2lbh = "SELECT COUNT(ips_4) AS ips3ips4kk2lbh FROM tbl_mhs_lama where ips_4<3.00 and ips_3>=3.00 and ips_3<=3.50 and ket='Lebih Cepat'";
                                                $read224 = mysqli_query($connect, $ips3ips4kk2lbh); // Result resource
                                                $baris224 = mysqli_fetch_array($read224);
                                                $ips3ips4kk2lbh = $baris224['ips3ips4kk2lbh']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4kk2lbh."</td>";

                                                $entropy_ips3ips4kk2 = hitung_entropy($ips3ips4kk2tdk, $ips3ips4kk2tpt, $ips3ips4kk2lbh);
                                                echo "<td>".$entropy_ips3ips4kk2."</td>";

                                                

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>IPS Semester 3 >'3.50' </td>
                                            <?php
                                            

                                                $ips3ips4kk3 = "SELECT COUNT(ips_4) AS ips3ips4kk3 FROM tbl_mhs_lama where ips_4<3.00 and ips_3>3.50";
                                                $read225 = mysqli_query($connect, $ips3ips4kk3); // Result resource
                                                $baris225 = mysqli_fetch_array($read225);
                                                $ips3ips4kk3 = $baris225['ips3ips4kk3']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4kk3."</td>";
                                        
                                            
                                            
                                                $ips3ips4kk3tdk = "SELECT COUNT(ips_4) AS ips3ips4kk3tdk FROM tbl_mhs_lama where ips_4<3.00 and ips_3>3.50 and ket='Tidak Tepat Waktu'";
                                                $read226 = mysqli_query($connect, $ips3ips4kk3tdk); // Result resource
                                                $baris226 = mysqli_fetch_array($read226);
                                                $ips3ips4kk3tdk = $baris226['ips3ips4kk3tdk']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4kk3tdk."</td>";
                                            

                                            
                                                $ips3ips4kk3tpt = "SELECT COUNT(ips_4) AS ips3ips4kk3tpt FROM tbl_mhs_lama where ips_4<3.00 and ips_3>3.50 and ket='Tepat Waktu'";
                                                $read227 = mysqli_query($connect, $ips3ips4kk3tpt); // Result resource
                                                $baris227 = mysqli_fetch_array($read227);
                                                $ips3ips4kk3tpt = $baris227['ips3ips4kk3tpt']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4kk3tpt."</td>";

                                                $ips3ips4kk3lbh = "SELECT COUNT(ips_4) AS ips3ips4kk3lbh FROM tbl_mhs_lama where ips_4<3.00 and ips_3>3.50 and ket='Lebih Cepat'";
                                                $read228 = mysqli_query($connect, $ips3ips4kk3lbh); // Result resource
                                                $baris228 = mysqli_fetch_array($read228);
                                                $ips3ips4kk3lbh = $baris228['ips3ips4kk3lbh']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4kk3lbh."</td>";

                                                $entropy_ips3ips4kk3 = hitung_entropy($ips3ips4kk3tdk, $ips3ips4kk3tpt, $ips3ips4kk3lbh);
                                                echo "<td>".$entropy_ips3ips4kk3."</td>";

                                                $gain30 = hitung_gain3($entropy_ips4, $ips4kkbh, $ips3ips4kk, $ips3ips4kk2, $ips3ips4kk3,  $entropy_ips3ips4kk, $entropy_ips3ips4kk2, $entropy_ips3ips4kk3);
                                                echo "<td>".format_decimal($gain30)."</td>";

                                            ?>
                                        <td></td>
                                    </tr>
                            </table>

                            <?php
                                echo "Atribut Terpilih = IPS Semester 2 dengan Gain =".format_decimal($gain29)."<br>";
                                echo "==================================================================================="."<br>";
                                echo "Cabang 3"."<br>";
                                echo "(IPS Semester 4 <3.00) and (IPS Semester 2 <=3.50)"."<br>";
                            ?>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Atribut</th>
                                        <th>Jumlah Kasus</th>
                                        <th>Tidak Tepat Waktu</th>
                                        <th>Tepat Waktu</th>
                                        <th>Lebih Cepat</th>
                                        <th>Entrophy</th>
                                        <th>Gain</th>
                                    </tr>
                                </thead>
                                <?php
                                    $q21     = "SELECT COUNT(ips_4) AS kurangk4 from tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50";
                                    $read229  = mysqli_query($connect, $q21);
                                    $baris229 = mysqli_fetch_array($read229);
                                    $ips4kips2k2  = $baris229['kurangk4'];
                                    echo "Jumlah =".$ips4kips2k2."<br>";

                                    $q22     = "SELECT COUNT(ips_4) AS kurangk4_tidak from tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ket='Tidak Tepat Waktu'";
                                    $read230  = mysqli_query($connect, $q22);
                                    $baris230 = mysqli_fetch_array($read230);
                                    $ips4kips2k2tdk  = $baris230['kurangk4_tidak'];
                                    echo "Tidak Tepat Waktu =".$ips4kips2k2tdk."<br>";

                                    $q23     = "SELECT COUNT(ips_4) AS kurangk4_tepat from tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ket='Tepat Waktu'";
                                    $read231  = mysqli_query($connect, $q23);
                                    $baris231 = mysqli_fetch_array($read231);
                                    $ips4kips2k2tpt  = $baris231['kurangk4_tepat'];
                                    echo "Tepat Waktu =".$ips4kips2k2tpt."<br>"; 

                                    $q24     = "SELECT COUNT(ips_4) AS kurangk4_lebih from tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ket='Lebih Cepat'";
                                    $read232  = mysqli_query($connect, $q24);
                                    $baris232 = mysqli_fetch_array($read232);
                                    $ips4kips2k2lbh  = $baris232['kurangk4_lebih'];
                                    echo "Tepat Waktu =".$ips4kips2k2lbh."<br>";
                                    echo "Entrophy =".$entropy_ips2ips4kk2."<br>";                                    
                                ?>
                                <tbody>
                                     <tr>
                                        <th scope="row" rowspan="2">1</th>
                                        <td>SKS Semester 2 Rendah </td>
                                            <?php
                                            

                                                $sks2ips4kips2k2 = "SELECT COUNT(ips_4) AS sks2ips4kips2k2 FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and sks_2<18";
                                                $read233 = mysqli_query($connect, $sks2ips4kips2k2); // Result resource
                                                $baris233 = mysqli_fetch_array($read233);
                                                $sks2ips4kips2k2 = $baris233['sks2ips4kips2k2']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4kips2k2."</td>";
                                        
                                            
                                            
                                                $sks2ips4kips2k2tdk = "SELECT COUNT(ips_4) AS sks2ips4kips2k2tdk FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and sks_2<18 and ket='Tidak Tepat Waktu'";
                                                $read234 = mysqli_query($connect, $sks2ips4kips2k2tdk); // Result resource
                                                $baris234 = mysqli_fetch_array($read234);
                                                $sks2ips4kips2k2tdk = $baris234['sks2ips4kips2k2tdk']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4kips2k2tdk."</td>";
                                            

                                            
                                                $sks2ips4kips2k2tpt = "SELECT COUNT(ips_4) AS sks2ips4kips2k2tpt FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and sks_2<18 and ket='Tepat Waktu'";
                                                $read235 = mysqli_query($connect, $sks2ips4kips2k2tpt); // Result resource
                                                $baris235 = mysqli_fetch_array($read235);
                                                $sks2ips4kips2k2tpt = $baris235['sks2ips4kips2k2tpt']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4kips2k2tpt."</td>";

                                                $sks2ips4kips2k2lbh = "SELECT COUNT(ips_4) AS sks2ips4kips2k2lbh FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and sks_2<18 and ket='Lebih Cepat'";
                                                $read236 = mysqli_query($connect, $sks2ips4kips2k2lbh); // Result resource
                                                $baris236 = mysqli_fetch_array($read236);
                                                $sks2ips4kips2k2lbh = $baris236['sks2ips4kips2k2lbh']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4kips2k2lbh."</td>";

                                                $entropy_sks2ips4kips2k2 = hitung_entropy($sks2ips4kips2k2tdk, $sks2ips4kips2k2tpt, $sks2ips4kips2k2lbh);
                                                echo "<td>".$entropy_sks2ips4kips2k2."</td>";

                                                

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>SKS Semester 2 Tinggi </td>
                                            <?php
                                            

                                                $sks2ips4kips2k23 = "SELECT COUNT(ips_4) AS sks2ips4kips2k23 FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and sks_2>=18";
                                                $read237 = mysqli_query($connect, $sks2ips4kips2k23); // Result resource
                                                $baris237 = mysqli_fetch_array($read237);
                                                $sks2ips4kips2k23 = $baris237['sks2ips4kips2k23']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4kips2k23."</td>";
                                        
                                            
                                            
                                                $sks2ips4kips2k23tdk = "SELECT COUNT(ips_4) AS sks2ips4kips2k23tdk FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and sks_2>=18 and ket='Tidak Tepat Waktu'";
                                                $read238 = mysqli_query($connect, $sks2ips4kips2k23tdk); // Result resource
                                                $baris238 = mysqli_fetch_array($read238);
                                                $sks2ips4kips2k23tdk = $baris238['sks2ips4kips2k23tdk']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4kips2k23tdk."</td>";
                                            

                                            
                                                $sks2ips4kips2k23tpt = "SELECT COUNT(ips_4) AS sks2ips4kips2k23tpt FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and sks_2>=18 and ket='Tepat Waktu'";
                                                $read239 = mysqli_query($connect, $sks2ips4kips2k23tpt); // Result resource
                                                $baris239 = mysqli_fetch_array($read239);
                                                $sks2ips4kips2k23tpt = $baris239['sks2ips4kips2k23tpt']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4kips2k23tpt."</td>";

                                                $sks2ips4kips2k23lbh = "SELECT COUNT(ips_4) AS sks2ips4kips2k23lbh FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and sks_2>=18 and ket='Lebih Cepat'";
                                                $read240 = mysqli_query($connect, $sks2ips4kips2k23lbh); // Result resource
                                                $baris240 = mysqli_fetch_array($read240);
                                                $sks2ips4kips2k23lbh = $baris240['sks2ips4kips2k23lbh']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4kips2k23lbh."</td>";

                                                $entropy_sks2ips4kips2k23 = hitung_entropy($sks2ips4kips2k23tdk, $sks2ips4kips2k23tpt, $sks2ips4kips2k23lbh);
                                                echo "<td>".$entropy_sks2ips4kips2k23."</td>";

                                                $gain31 = hitung_gain2($entropy_ips2ips4kk2, $ips4kips2k2, $sks2ips4kips2k2, $sks2ips4kips2k23,  $entropy_sks2ips4kips2k2, $entropy_sks2ips4kips2k23);
                                                echo "<td>".format_decimal($gain31)."</td>";

                                            ?>
                                    </tr> 
                                    <tr>
                                        <th scope="row" rowspan="2">2</th>
                                        <td>SKS Semester 3 Rendah </td>
                                            <?php
                                            

                                                $sks3ips4kips2k2 = "SELECT COUNT(ips_4) AS sks3ips4kips2k2 FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and sks_3<18";
                                                $read241 = mysqli_query($connect, $sks3ips4kips2k2); // Result resource
                                                $baris241 = mysqli_fetch_array($read241);
                                                $sks3ips4kips2k2 = $baris241['sks3ips4kips2k2']; // Use something like this to get the result
                                                echo "<td>".$sks3ips4kips2k2."</td>";
                                        
                                            
                                            
                                                $sks3ips4kips2k2tdk = "SELECT COUNT(ips_4) AS sks3ips4kips2k2tdk FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and sks_3<18 and ket='Tidak Tepat Waktu'";
                                                $read242 = mysqli_query($connect, $sks3ips4kips2k2tdk); // Result resource
                                                $baris242 = mysqli_fetch_array($read242);
                                                $sks3ips4kips2k2tdk = $baris242['sks3ips4kips2k2tdk']; // Use something like this to get the result
                                                echo "<td>".$sks3ips4kips2k2tdk."</td>";
                                            

                                            
                                                $sks3ips4kips2k2tpt = "SELECT COUNT(ips_4) AS sks3ips4kips2k2tpt FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and sks_3<18 and ket='Tepat Waktu'";
                                                $read243 = mysqli_query($connect, $sks3ips4kips2k2tpt); // Result resource
                                                $baris243 = mysqli_fetch_array($read243);
                                                $sks3ips4kips2k2tpt = $baris243['sks3ips4kips2k2tpt']; // Use something like this to get the result
                                                echo "<td>".$sks3ips4kips2k2tpt."</td>";

                                                $sks3ips4kips2k2lbh = "SELECT COUNT(ips_4) AS sks3ips4kips2k2lbh FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and sks_3<18 and ket='Lebih Cepat'";
                                                $read244 = mysqli_query($connect, $sks3ips4kips2k2lbh); // Result resource
                                                $baris244 = mysqli_fetch_array($read244);
                                                $sks3ips4kips2k2lbh = $baris244['sks3ips4kips2k2lbh']; // Use something like this to get the result
                                                echo "<td>".$sks3ips4kips2k2lbh."</td>";

                                                $entropy_sks3ips4kips2k2 = hitung_entropy($sks3ips4kips2k2tdk, $sks3ips4kips2k2tpt, $sks3ips4kips2k2lbh);
                                                echo "<td>".$entropy_sks3ips4kips2k2."</td>";

                                                

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>SKS Semester 3 Tinggi </td>
                                            <?php
                                            

                                                $sks3ips4kips2k23 = "SELECT COUNT(ips_4) AS sks3ips4kips2k23 FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and sks_3>=18";
                                                $read245 = mysqli_query($connect, $sks3ips4kips2k23); // Result resource
                                                $baris245 = mysqli_fetch_array($read245);
                                                $sks3ips4kips2k23 = $baris245['sks3ips4kips2k23']; // Use something like this to get the result
                                                echo "<td>".$sks3ips4kips2k23."</td>";
                                        
                                            
                                            
                                                $sks3ips4kips2k23tdk = "SELECT COUNT(ips_4) AS sks3ips4kips2k23tdk FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and sks_3>=18 and ket='Tidak Tepat Waktu'";
                                                $read246 = mysqli_query($connect, $sks3ips4kips2k23tdk); // Result resource
                                                $baris246 = mysqli_fetch_array($read246);
                                                $sks3ips4kips2k23tdk = $baris246['sks3ips4kips2k23tdk']; // Use something like this to get the result
                                                echo "<td>".$sks3ips4kips2k23tdk."</td>";
                                            

                                            
                                                $sks3ips4kips2k23tpt = "SELECT COUNT(ips_4) AS sks3ips4kips2k23tpt FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and sks_3>=18 and ket='Tepat Waktu'";
                                                $read247 = mysqli_query($connect, $sks3ips4kips2k23tpt); // Result resource
                                                $baris247 = mysqli_fetch_array($read247);
                                                $sks3ips4kips2k23tpt = $baris247['sks3ips4kips2k23tpt']; // Use something like this to get the result
                                                echo "<td>".$sks3ips4kips2k23tpt."</td>";

                                                $sks3ips4kips2k23lbh = "SELECT COUNT(ips_4) AS sks3ips4kips2k23lbh FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and sks_3>=18 and ket='Lebih Cepat'";
                                                $read248 = mysqli_query($connect, $sks3ips4kips2k23lbh); // Result resource
                                                $baris248 = mysqli_fetch_array($read248);
                                                $sks3ips4kips2k23lbh = $baris248['sks3ips4kips2k23lbh']; // Use something like this to get the result
                                                echo "<td>".$sks3ips4kips2k23lbh."</td>";

                                                $entropy_sks3ips4kips2k23 = hitung_entropy($sks3ips4kips2k23tdk, $sks3ips4kips2k23tpt, $sks3ips4kips2k23lbh);
                                                echo "<td>".$entropy_sks3ips4kips2k23."</td>";

                                                $gain32 = hitung_gain2($entropy_ips2ips4kk2, $ips4kips2k2, $sks3ips4kips2k2, $sks3ips4kips2k23,  $entropy_sks3ips4kips2k2, $entropy_sks3ips4kips2k23);
                                                echo "<td>".format_decimal($gain32)."</td>";

                                            ?>
                                    </tr>    
                                    <tr>
                                        <th scope="row" rowspan="2">3</th>
                                        <td>SKS Semester 4 Rendah </td>
                                            <?php
                                            

                                                $sks4ips4kips2k2 = "SELECT COUNT(ips_4) AS sks4ips4kips2k2 FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and sks_4<18";
                                                $read249 = mysqli_query($connect, $sks4ips4kips2k2); // Result resource
                                                $baris249 = mysqli_fetch_array($read249);
                                                $sks4ips4kips2k2 = $baris249['sks4ips4kips2k2']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4kips2k2."</td>";
                                        
                                            
                                            
                                                $sks4ips4kips2k2tdk = "SELECT COUNT(ips_4) AS sks4ips4kips2k2tdk FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and sks_4<18 and ket='Tidak Tepat Waktu'";
                                                $read250 = mysqli_query($connect, $sks4ips4kips2k2tdk); // Result resource
                                                $baris250 = mysqli_fetch_array($read250);
                                                $sks4ips4kips2k2tdk = $baris250['sks4ips4kips2k2tdk']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4kips2k2tdk."</td>";
                                            

                                            
                                                $sks4ips4kips2k2tpt = "SELECT COUNT(ips_4) AS sks4ips4kips2k2tpt FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and sks_4<18 and ket='Tepat Waktu'";
                                                $read251 = mysqli_query($connect, $sks4ips4kips2k2tpt); // Result resource
                                                $baris251 = mysqli_fetch_array($read251);
                                                $sks4ips4kips2k2tpt = $baris251['sks4ips4kips2k2tpt']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4kips2k2tpt."</td>";

                                                $sks4ips4kips2k2lbh = "SELECT COUNT(ips_4) AS sks4ips4kips2k2lbh FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and sks_4<18 and ket='Lebih Cepat'";
                                                $read252 = mysqli_query($connect, $sks4ips4kips2k2lbh); // Result resource
                                                $baris252 = mysqli_fetch_array($read252);
                                                $sks4ips4kips2k2lbh = $baris252['sks4ips4kips2k2lbh']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4kips2k2lbh."</td>";

                                                $entropy_sks4ips4kips2k2 = hitung_entropy($sks4ips4kips2k2tdk, $sks4ips4kips2k2tpt, $sks4ips4kips2k2lbh);
                                                echo "<td>".$entropy_sks4ips4kips2k2."</td>";

                                                

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>SKS Semester 4 Tinggi </td>
                                            <?php
                                            

                                                $sks4ips4kips2k23 = "SELECT COUNT(ips_4) AS sks4ips4kips2k23 FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and sks_4>=18";
                                                $read253 = mysqli_query($connect, $sks4ips4kips2k23); // Result resource
                                                $baris253 = mysqli_fetch_array($read253);
                                                $sks4ips4kips2k23 = $baris253['sks4ips4kips2k23']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4kips2k23."</td>";
                                        
                                            
                                            
                                                $sks4ips4kips2k23tdk = "SELECT COUNT(ips_4) AS sks4ips4kips2k23tdk FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and sks_4>=18 and ket='Tidak Tepat Waktu'";
                                                $read254 = mysqli_query($connect, $sks4ips4kips2k23tdk); // Result resource
                                                $baris254 = mysqli_fetch_array($read254);
                                                $sks4ips4kips2k23tdk = $baris254['sks4ips4kips2k23tdk']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4kips2k23tdk."</td>";
                                            

                                            
                                                $sks4ips4kips2k23tpt = "SELECT COUNT(ips_4) AS sks4ips4kips2k23tpt FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and sks_4>=18 and ket='Tepat Waktu'";
                                                $read255 = mysqli_query($connect, $sks4ips4kips2k23tpt); // Result resource
                                                $baris255 = mysqli_fetch_array($read255);
                                                $sks4ips4kips2k23tpt = $baris255['sks4ips4kips2k23tpt']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4kips2k23tpt."</td>";

                                                $sks4ips4kips2k23lbh = "SELECT COUNT(ips_4) AS sks4ips4kips2k23lbh FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and sks_4>=18 and ket='Lebih Cepat'";
                                                $read256 = mysqli_query($connect, $sks4ips4kips2k23lbh); // Result resource
                                                $baris256 = mysqli_fetch_array($read256);
                                                $sks4ips4kips2k23lbh = $baris256['sks4ips4kips2k23lbh']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4kips2k23lbh."</td>";

                                                $entropy_sks4ips4kips2k23 = hitung_entropy($sks4ips4kips2k23tdk, $sks4ips4kips2k23tpt, $sks4ips4kips2k23lbh);
                                                echo "<td>".$entropy_sks4ips4kips2k23."</td>";

                                                $gain33 = hitung_gain2($entropy_ips2ips4kk2, $ips4kips2k2, $sks4ips4kips2k2, $sks4ips4kips2k23,  $entropy_sks4ips4kips2k2, $entropy_sks4ips4kips2k23);
                                                echo "<td>".format_decimal($gain33)."</td>";

                                            ?>
                                    </tr>
                                    <tr>
                                        <th scope="row" rowspan="3">4</th>
                                        <td>IPS Semester 3 <'3.00' </td>
                                            <?php
                                            

                                                $ips3ips4kips2k2 = "SELECT COUNT(ips_4) AS ips3ips4kips2k2 FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3<3.00";
                                                $read257 = mysqli_query($connect, $ips3ips4kips2k2); // Result resource
                                                $baris257 = mysqli_fetch_array($read257);
                                                $ips3ips4kips2k2 = $baris257['ips3ips4kips2k2']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4kips2k2."</td>";
                                        
                                            
                                            
                                                $ips3ips4kips2k2tdk = "SELECT COUNT(ips_4) AS ips3ips4kips2k2tdk FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3<3.00 and ket='Tidak Tepat Waktu'";
                                                $read258 = mysqli_query($connect, $ips3ips4kips2k2tdk); // Result resource
                                                $baris258 = mysqli_fetch_array($read258);
                                                $ips3ips4kips2k2tdk = $baris258['ips3ips4kips2k2tdk']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4kips2k2tdk."</td>";
                                            

                                            
                                                $ips3ips4kips2k2tpt = "SELECT COUNT(ips_4) AS ips3ips4kips2k2tpt FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3<3.00 and ket='Tepat Waktu'";
                                                $read259 = mysqli_query($connect, $ips3ips4kips2k2tpt); // Result resource
                                                $baris259 = mysqli_fetch_array($read259);
                                                $ips3ips4kips2k2tpt = $baris259['ips3ips4kips2k2tpt']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4kips2k2tpt."</td>";

                                                $ips3ips4kips2k2lbh = "SELECT COUNT(ips_4) AS ips3ips4kips2k2lbh FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3<3.00 and ket='Lebih Cepat'";
                                                $read260 = mysqli_query($connect, $ips3ips4kips2k2lbh); // Result resource
                                                $baris260 = mysqli_fetch_array($read260);
                                                $ips3ips4kips2k2lbh = $baris260['ips3ips4kips2k2lbh']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4kips2k2lbh."</td>";

                                                $entropy_ips3ips4kips2k2 = hitung_entropy($ips3ips4kips2k2tdk, $ips3ips4kips2k2tpt, $ips3ips4kips2k2lbh);
                                                echo "<td>".$entropy_ips3ips4kips2k2."</td>";

                                                

                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>IPS Semester 3 <='3.50' </td>
                                            <?php
                                            

                                                $ips3ips4kips2k23 = "SELECT COUNT(ips_4) AS ips3ips4kips2k23 FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3>=3.00 and ips_3<=3.50";
                                                $read261 = mysqli_query($connect, $ips3ips4kips2k23); // Result resource
                                                $baris261 = mysqli_fetch_array($read261);
                                                $ips3ips4kips2k23 = $baris261['ips3ips4kips2k23']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4kips2k23."</td>";
                                        
                                            
                                            
                                                $ips3ips4kips2k23tdk = "SELECT COUNT(ips_4) AS ips3ips4kips2k23tdk FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3>=3.00 and ips_3<=3.50 and ket='Tidak Tepat Waktu'";
                                                $read262 = mysqli_query($connect, $ips3ips4kips2k23tdk); // Result resource
                                                $baris262 = mysqli_fetch_array($read262);
                                                $ips3ips4kips2k23tdk = $baris262['ips3ips4kips2k23tdk']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4kips2k23tdk."</td>";
                                            

                                            
                                                $ips3ips4kips2k23tpt = "SELECT COUNT(ips_4) AS ips3ips4kips2k23tpt FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3>=3.00 and ips_3<=3.50 and ket='Tepat Waktu'";
                                                $read263 = mysqli_query($connect, $ips3ips4kips2k23tpt); // Result resource
                                                $baris263 = mysqli_fetch_array($read263);
                                                $ips3ips4kips2k23tpt = $baris263['ips3ips4kips2k23tpt']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4kips2k23tpt."</td>";

                                                $ips3ips4kips2k23lbh = "SELECT COUNT(ips_4) AS ips3ips4kips2k23lbh FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3>=3.00 and ips_3<=3.50 and ket='Lebih Cepat'";
                                                $read264 = mysqli_query($connect, $ips3ips4kips2k23lbh); // Result resource
                                                $baris264 = mysqli_fetch_array($read264);
                                                $ips3ips4kips2k23lbh = $baris264['ips3ips4kips2k23lbh']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4kips2k23lbh."</td>";

                                                $entropy_ips3ips4kips2k23 = hitung_entropy($ips3ips4kips2k23tdk, $ips3ips4kips2k23tpt, $ips3ips4kips2k23lbh);
                                                echo "<td>".$entropy_ips3ips4kips2k23."</td>";

                                                

                                            ?>
                                    </tr>
                                    <tr>
                                        <td>IPS Semester 3 >'3.50' </td>
                                            <?php
                                            

                                                $ips3ips4kips2k233 = "SELECT COUNT(ips_4) AS ips3ips4kips2k233 FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3>3.50";
                                                $read265 = mysqli_query($connect, $ips3ips4kips2k233); // Result resource
                                                $baris265 = mysqli_fetch_array($read265);
                                                $ips3ips4kips2k233 = $baris265['ips3ips4kips2k233']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4kips2k233."</td>";
                                        
                                            
                                            
                                                $ips3ips4kips2k233tdk = "SELECT COUNT(ips_4) AS ips3ips4kips2k233tdk FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3>3.50 and ket='Tidak Tepat Waktu'";
                                                $read266 = mysqli_query($connect, $ips3ips4kips2k233tdk); // Result resource
                                                $baris266 = mysqli_fetch_array($read266);
                                                $ips3ips4kips2k233tdk = $baris266['ips3ips4kips2k233tdk']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4kips2k233tdk."</td>";
                                            

                                            
                                                $ips3ips4kips2k233tpt = "SELECT COUNT(ips_4) AS ips3ips4kips2k233tpt FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3>3.50 and ket='Tepat Waktu'";
                                                $read267 = mysqli_query($connect, $ips3ips4kips2k233tpt); // Result resource
                                                $baris267 = mysqli_fetch_array($read267);
                                                $ips3ips4kips2k233tpt = $baris267['ips3ips4kips2k233tpt']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4kips2k233tpt."</td>";

                                                $ips3ips4kips2k233lbh = "SELECT COUNT(ips_4) AS ips3ips4kips2k233lbh FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3>3.50 and ket='Lebih Cepat'";
                                                $read268 = mysqli_query($connect, $ips3ips4kips2k233lbh); // Result resource
                                                $baris268 = mysqli_fetch_array($read268);
                                                $ips3ips4kips2k233lbh = $baris268['ips3ips4kips2k233lbh']; // Use something like this to get the result
                                                echo "<td>".$ips3ips4kips2k233lbh."</td>";

                                                $entropy_ips3ips4kips2k233 = hitung_entropy($ips3ips4kips2k233tdk, $ips3ips4kips2k233tpt, $ips3ips4kips2k233lbh);
                                                echo "<td>".$entropy_ips3ips4kips2k233."</td>";

                                                $gain34 = hitung_gain3($entropy_ips2ips4kk2, $ips4kips2k2, $ips3ips4kips2k2,$ips3ips4kips2k23, $ips3ips4kips2k233,  $entropy_ips3ips4kips2k2, $entropy_ips3ips4kips2k23, $entropy_ips3ips4kips2k233);
                                                echo "<td>".format_decimal($gain34)."</td>";

                                            ?>
                                    </tr>
                            </table>   
                            
                            <?php
                                echo "Atribut Terpilih = IPS Semester 3 dengan Gain =".format_decimal($gain34)."<br>";
                                echo "==================================================================================="."<br>";
                                echo "Cabang 3.2"."<br>";
                                echo "(IPS Semester 4 <3.00) and (IPS Semester 2 <=3.50) and (IPS Semester 3 <=3.50)"."<br>";
                            ?>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Atribut</th>
                                        <th>Jumlah Kasus</th>
                                        <th>Tidak Tepat Waktu</th>
                                        <th>Tepat Waktu</th>
                                        <th>Lebih Cepat</th>
                                        <th>Entrophy</th>
                                        <th>Gain</th>
                                    </tr>
                                </thead>
                                <?php
                                    $q25     = "SELECT COUNT(ips_4) AS kurangk4 from tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3>=3.00 and ips_3<=3.50";
                                    $read269  = mysqli_query($connect, $q25);
                                    $baris269 = mysqli_fetch_array($read269);
                                    $ips4kips2kips3k  = $baris269['kurangk4'];
                                    echo "Jumlah =".$ips4kips2kips3k."<br>";

                                    $q26     = "SELECT COUNT(ips_4) AS kurangk4_tidak from tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3>=3.00 and ips_3<=3.50 and ket='Tidak Tepat Waktu'";
                                    $read270  = mysqli_query($connect, $q26);
                                    $baris270 = mysqli_fetch_array($read270);
                                    $ips4kips2kips3ktdk  = $baris270['kurangk4_tidak'];
                                    echo "Tidak Tepat Waktu =".$ips4kips2kips3ktdk."<br>";

                                    $q27     = "SELECT COUNT(ips_4) AS kurangk4_tepat from tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3>=3.00 and ips_3<=3.50 and ket='Tepat Waktu'";
                                    $read271  = mysqli_query($connect, $q27);
                                    $baris271 = mysqli_fetch_array($read271);
                                    $ips4kips2kips3ktpt  = $baris271['kurangk4_tepat'];
                                    echo "Tepat Waktu =".$ips4kips2kips3ktpt."<br>"; 

                                    $q28     = "SELECT COUNT(ips_4) AS kurangk4_lebih from tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3>=3.00 and ips_3<=3.50 and ket='Lebih Cepat'";
                                    $read272  = mysqli_query($connect, $q28);
                                    $baris272 = mysqli_fetch_array($read272);
                                    $ips4kips2kips3klbh  = $baris272['kurangk4_lebih'];
                                    echo "Tepat Waktu =".$ips4kips2kips3klbh."<br>";
                                    echo "Entrophy =".$entropy_ips3ips4kips2k23."<br>";                                    
                                ?>
                                <tbody>
                                     <tr>
                                        <th scope="row" rowspan="2">1</th>
                                        <td>SKS Semester 2 Rendah </td>
                                            <?php
                                            

                                                $sks2ips4kips2kips3k = "SELECT COUNT(ips_4) AS sks2ips4kips2kips3k FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3>=3.00 and ips_3<=3.50 and sks_2<18";
                                                $read273 = mysqli_query($connect, $sks2ips4kips2kips3k); // Result resource
                                                $baris273 = mysqli_fetch_array($read273);
                                                $sks2ips4kips2kips3k = $baris273['sks2ips4kips2kips3k']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4kips2kips3k."</td>";
                                        
                                            
                                            
                                                $sks2ips4kips2kips3ktdk = "SELECT COUNT(ips_4) AS sks2ips4kips2kips3ktdk FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3>=3.00 and ips_3<=3.50 and sks_2<18 and ket='Tidak Tepat Waktu'";
                                                $read274 = mysqli_query($connect, $sks2ips4kips2kips3ktdk); // Result resource
                                                $baris274 = mysqli_fetch_array($read274);
                                                $sks2ips4kips2kips3ktdk = $baris274['sks2ips4kips2kips3ktdk']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4kips2kips3ktdk."</td>";
                                            

                                            
                                                $sks2ips4kips2kips3ktpt = "SELECT COUNT(ips_4) AS sks2ips4kips2kips3ktpt FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3>=3.00 and ips_3<=3.50 and sks_2<18 and ket='Tepat Waktu'";
                                                $read275 = mysqli_query($connect, $sks2ips4kips2kips3ktpt); // Result resource
                                                $baris275 = mysqli_fetch_array($read275);
                                                $sks2ips4kips2kips3ktpt = $baris275['sks2ips4kips2kips3ktpt']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4kips2kips3ktpt."</td>";

                                                $sks2ips4kips2kips3klbh = "SELECT COUNT(ips_4) AS sks2ips4kips2kips3klbh FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3>=3.00 and ips_3<=3.50 and sks_2<18 and ket='Lebih Cepat'";
                                                $read276 = mysqli_query($connect, $sks2ips4kips2kips3klbh); // Result resource
                                                $baris276 = mysqli_fetch_array($read276);
                                                $sks2ips4kips2kips3klbh = $baris276['sks2ips4kips2kips3klbh']; // Use something like this to get the result
                                                echo "<td>".$sks2ips4kips2kips3klbh."</td>";

                                                $entropy_sks2ips4kips2kips3k = hitung_entropy($sks2ips4kips2kips3ktdk, $sks2ips4kips2kips3ktpt, $sks2ips4kips2kips3klbh);
                                                echo "<td>".$entropy_sks2ips4kips2kips3k."</td>";
                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>SKS Semester 2 Tinggi </td>
                                            <?php
                                            

                                                $sks22ips4kips2kips3k = "SELECT COUNT(ips_4) AS sks22ips4kips2kips3k FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3>=3.00 and ips_3<=3.50 and sks_2>=18";
                                                $read277 = mysqli_query($connect, $sks22ips4kips2kips3k); // Result resource
                                                $baris277 = mysqli_fetch_array($read277);
                                                $sks22ips4kips2kips3k = $baris277['sks22ips4kips2kips3k']; // Use something like this to get the result
                                                echo "<td>".$sks22ips4kips2kips3k."</td>";
                                        
                                            
                                            
                                                $sks22ips4kips2kips3ktdk = "SELECT COUNT(ips_4) AS sks22ips4kips2kips3ktdk FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3>=3.00 and ips_3<=3.50 and sks_2>=18 and ket='Tidak Tepat Waktu'";
                                                $read278 = mysqli_query($connect, $sks22ips4kips2kips3ktdk); // Result resource
                                                $baris278 = mysqli_fetch_array($read278);
                                                $sks22ips4kips2kips3ktdk = $baris278['sks22ips4kips2kips3ktdk']; // Use something like this to get the result
                                                echo "<td>".$sks22ips4kips2kips3ktdk."</td>";
                                            

                                            
                                                $sks22ips4kips2kips3ktpt = "SELECT COUNT(ips_4) AS sks22ips4kips2kips3ktpt FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3>=3.00 and ips_3<=3.50 and sks_2>=18 and ket='Tepat Waktu'";
                                                $read279 = mysqli_query($connect, $sks22ips4kips2kips3ktpt); // Result resource
                                                $baris279 = mysqli_fetch_array($read279);
                                                $sks22ips4kips2kips3ktpt = $baris279['sks22ips4kips2kips3ktpt']; // Use something like this to get the result
                                                echo "<td>".$sks22ips4kips2kips3ktpt."</td>";

                                                $sks22ips4kips2kips3klbh = "SELECT COUNT(ips_4) AS sks22ips4kips2kips3klbh FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3>=3.00 and ips_3<=3.50 and sks_2>=18 and ket='Lebih Cepat'";
                                                $read280 = mysqli_query($connect, $sks22ips4kips2kips3klbh); // Result resource
                                                $baris280 = mysqli_fetch_array($read280);
                                                $sks22ips4kips2kips3klbh = $baris280['sks22ips4kips2kips3klbh']; // Use something like this to get the result
                                                echo "<td>".$sks22ips4kips2kips3klbh."</td>";

                                                $entropy_sks22ips4kips2kips3k = hitung_entropy($sks22ips4kips2kips3ktdk, $sks22ips4kips2kips3ktpt, $sks22ips4kips2kips3klbh);
                                                echo "<td>".$entropy_sks22ips4kips2kips3k."</td>";

                                                $gain35 = hitung_gain2($entropy_ips3ips4kips2k23, $ips4kips2kips3k, $sks2ips4kips2kips3k, $sks22ips4kips2kips3k,  $entropy_sks2ips4kips2kips3k, $entropy_sks22ips4kips2kips3k);
                                                echo "<td>".format_decimal($gain35)."</td>";
                                            ?>
                                        
                                    </tr>
                                    <tr>
                                        <th scope="row" rowspan="2">2</th>
                                        <td>SKS Semester 3 Rendah </td>
                                            <?php
                                            

                                                $sks3ips4kips2kips3k = "SELECT COUNT(ips_4) AS sks3ips4kips2kips3k FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3>=3.00 and ips_3<=3.50 and sks_3<18";
                                                $read281 = mysqli_query($connect, $sks3ips4kips2kips3k); // Result resource
                                                $baris281 = mysqli_fetch_array($read281);
                                                $sks3ips4kips2kips3k = $baris281['sks3ips4kips2kips3k']; // Use something like this to get the result
                                                echo "<td>".$sks3ips4kips2kips3k."</td>";
                                        
                                            
                                            
                                                $sks3ips4kips2kips3ktdk = "SELECT COUNT(ips_4) AS sks3ips4kips2kips3ktdk FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3>=3.00 and ips_3<=3.50 and sks_3<18 and ket='Tidak Tepat Waktu'";
                                                $read282 = mysqli_query($connect, $sks3ips4kips2kips3ktdk); // Result resource
                                                $baris282 = mysqli_fetch_array($read282);
                                                $sks3ips4kips2kips3ktdk = $baris282['sks3ips4kips2kips3ktdk']; // Use something like this to get the result
                                                echo "<td>".$sks3ips4kips2kips3ktdk."</td>";
                                            

                                            
                                                $sks3ips4kips2kips3ktpt = "SELECT COUNT(ips_4) AS sks3ips4kips2kips3ktpt FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3>=3.00 and ips_3<=3.50 and sks_3<18 and ket='Tepat Waktu'";
                                                $read283 = mysqli_query($connect, $sks3ips4kips2kips3ktpt); // Result resource
                                                $baris283 = mysqli_fetch_array($read283);
                                                $sks3ips4kips2kips3ktpt = $baris283['sks3ips4kips2kips3ktpt']; // Use something like this to get the result
                                                echo "<td>".$sks3ips4kips2kips3ktpt."</td>";

                                                $sks3ips4kips2kips3klbh = "SELECT COUNT(ips_4) AS sks3ips4kips2kips3klbh FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3>=3.00 and ips_3<=3.50 and sks_3<18 and ket='Lebih Cepat'";
                                                $read284 = mysqli_query($connect, $sks3ips4kips2kips3klbh); // Result resource
                                                $baris284 = mysqli_fetch_array($read284);
                                                $sks3ips4kips2kips3klbh = $baris284['sks3ips4kips2kips3klbh']; // Use something like this to get the result
                                                echo "<td>".$sks3ips4kips2kips3klbh."</td>";

                                                $entropy_sks3ips4kips2kips3k = hitung_entropy($sks3ips4kips2kips3ktdk, $sks3ips4kips2kips3ktpt, $sks3ips4kips2kips3klbh);
                                                echo "<td>".$entropy_sks3ips4kips2kips3k."</td>";
                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>SKS Semester 3 Tinggi </td>
                                            <?php
                                            

                                                $sks32ips4kips2kips3k = "SELECT COUNT(ips_4) AS sks32ips4kips2kips3k FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3>=3.00 and ips_3<=3.50 and sks_3>=18";
                                                $read285 = mysqli_query($connect, $sks32ips4kips2kips3k); // Result resource
                                                $baris285 = mysqli_fetch_array($read285);
                                                $sks32ips4kips2kips3k = $baris285['sks32ips4kips2kips3k']; // Use something like this to get the result
                                                echo "<td>".$sks32ips4kips2kips3k."</td>";
                                        
                                            
                                            
                                                $sks32ips4kips2kips3ktdk = "SELECT COUNT(ips_4) AS sks32ips4kips2kips3ktdk FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3>=3.00 and ips_3<=3.50 and sks_3>=18 and ket='Tidak Tepat Waktu'";
                                                $read286 = mysqli_query($connect, $sks32ips4kips2kips3ktdk); // Result resource
                                                $baris286 = mysqli_fetch_array($read286);
                                                $sks32ips4kips2kips3ktdk = $baris286['sks32ips4kips2kips3ktdk']; // Use something like this to get the result
                                                echo "<td>".$sks32ips4kips2kips3ktdk."</td>";
                                            

                                            
                                                $sks32ips4kips2kips3ktpt = "SELECT COUNT(ips_4) AS sks32ips4kips2kips3ktpt FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3>=3.00 and ips_3<=3.50 and sks_3>=18 and ket='Tepat Waktu'";
                                                $read287 = mysqli_query($connect, $sks32ips4kips2kips3ktpt); // Result resource
                                                $baris287 = mysqli_fetch_array($read287);
                                                $sks32ips4kips2kips3ktpt = $baris287['sks32ips4kips2kips3ktpt']; // Use something like this to get the result
                                                echo "<td>".$sks32ips4kips2kips3ktpt."</td>";

                                                $sks32ips4kips2kips3klbh = "SELECT COUNT(ips_4) AS sks32ips4kips2kips3klbh FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3>=3.00 and ips_3<=3.50 and sks_3>=18 and ket='Lebih Cepat'";
                                                $read288 = mysqli_query($connect, $sks32ips4kips2kips3klbh); // Result resource
                                                $baris288 = mysqli_fetch_array($read288);
                                                $sks32ips4kips2kips3klbh = $baris288['sks32ips4kips2kips3klbh']; // Use something like this to get the result
                                                echo "<td>".$sks32ips4kips2kips3klbh."</td>";

                                                $entropy_sks32ips4kips2kips3k = hitung_entropy($sks32ips4kips2kips3ktdk, $sks32ips4kips2kips3ktpt, $sks32ips4kips2kips3klbh);
                                                echo "<td>".$entropy_sks32ips4kips2kips3k."</td>";

                                                $gain36 = hitung_gain2($entropy_ips3ips4kips2k23, $ips4kips2kips3k, $sks3ips4kips2kips3k, $sks32ips4kips2kips3k,  $entropy_sks3ips4kips2kips3k, $entropy_sks32ips4kips2kips3k);
                                                echo "<td>".format_decimal($gain36)."</td>";
                                            ?>
                                        
                                    </tr>
                                    <tr>
                                        <th scope="row" rowspan="2">3</th>
                                        <td>SKS Semester 4 Rendah </td>
                                            <?php
                                            

                                                $sks4ips4kips2kips3k = "SELECT COUNT(ips_4) AS sks4ips4kips2kips3k FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3>=3.00 and ips_3<=3.50 and sks_4<18";
                                                $read289 = mysqli_query($connect, $sks4ips4kips2kips3k); // Result resource
                                                $baris289 = mysqli_fetch_array($read289);
                                                $sks4ips4kips2kips3k = $baris289['sks4ips4kips2kips3k']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4kips2kips3k."</td>";
                                        
                                            
                                            
                                                $sks4ips4kips2kips3ktdk = "SELECT COUNT(ips_4) AS sks4ips4kips2kips3ktdk FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3>=3.00 and ips_3<=3.50 and sks_4<18 and ket='Tidak Tepat Waktu'";
                                                $read290 = mysqli_query($connect, $sks4ips4kips2kips3ktdk); // Result resource
                                                $baris290 = mysqli_fetch_array($read290);
                                                $sks4ips4kips2kips3ktdk = $baris290['sks4ips4kips2kips3ktdk']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4kips2kips3ktdk."</td>";
                                            

                                            
                                                $sks4ips4kips2kips3ktpt = "SELECT COUNT(ips_4) AS sks4ips4kips2kips3ktpt FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3>=3.00 and ips_3<=3.50 and sks_4<18 and ket='Tepat Waktu'";
                                                $read291 = mysqli_query($connect, $sks4ips4kips2kips3ktpt); // Result resource
                                                $baris291 = mysqli_fetch_array($read291);
                                                $sks4ips4kips2kips3ktpt = $baris291['sks4ips4kips2kips3ktpt']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4kips2kips3ktpt."</td>";

                                                $sks4ips4kips2kips3klbh = "SELECT COUNT(ips_4) AS sks4ips4kips2kips3klbh FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3>=3.00 and ips_3<=3.50 and sks_4<18 and ket='Lebih Cepat'";
                                                $read292 = mysqli_query($connect, $sks4ips4kips2kips3klbh); // Result resource
                                                $baris292 = mysqli_fetch_array($read292);
                                                $sks4ips4kips2kips3klbh = $baris292['sks4ips4kips2kips3klbh']; // Use something like this to get the result
                                                echo "<td>".$sks4ips4kips2kips3klbh."</td>";

                                                $entropy_sks4ips4kips2kips3k = hitung_entropy($sks4ips4kips2kips3ktdk, $sks4ips4kips2kips3ktpt, $sks4ips4kips2kips3klbh);
                                                echo "<td>".$entropy_sks4ips4kips2kips3k."</td>";
                                            ?>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>SKS Semester 4 Tinggi </td>
                                            <?php
                                            

                                                $sks42ips4kips2kips3k = "SELECT COUNT(ips_4) AS sks42ips4kips2kips3k FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3>=3.00 and ips_3<=3.50 and sks_4>=18";
                                                $read293 = mysqli_query($connect, $sks42ips4kips2kips3k); // Result resource
                                                $baris293 = mysqli_fetch_array($read293);
                                                $sks42ips4kips2kips3k = $baris293['sks42ips4kips2kips3k']; // Use something like this to get the result
                                                echo "<td>".$sks42ips4kips2kips3k."</td>";
                                        
                                            
                                            
                                                $sks42ips4kips2kips3ktdk = "SELECT COUNT(ips_4) AS sks42ips4kips2kips3ktdk FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3>=3.00 and ips_3<=3.50 and sks_4>=18 and ket='Tidak Tepat Waktu'";
                                                $read294 = mysqli_query($connect, $sks42ips4kips2kips3ktdk); // Result resource
                                                $baris294 = mysqli_fetch_array($read294);
                                                $sks42ips4kips2kips3ktdk = $baris294['sks42ips4kips2kips3ktdk']; // Use something like this to get the result
                                                echo "<td>".$sks42ips4kips2kips3ktdk."</td>";
                                            

                                            
                                                $sks42ips4kips2kips3ktpt = "SELECT COUNT(ips_4) AS sks42ips4kips2kips3ktpt FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3>=3.00 and ips_3<=3.50 and sks_4>=18 and ket='Tepat Waktu'";
                                                $read295 = mysqli_query($connect, $sks42ips4kips2kips3ktpt); // Result resource
                                                $baris295 = mysqli_fetch_array($read295);
                                                $sks42ips4kips2kips3ktpt = $baris295['sks42ips4kips2kips3ktpt']; // Use something like this to get the result
                                                echo "<td>".$sks42ips4kips2kips3ktpt."</td>";

                                                $sks42ips4kips2kips3klbh = "SELECT COUNT(ips_4) AS sks42ips4kips2kips3klbh FROM tbl_mhs_lama where ips_4<3.00 and ips_2>=3.00 and ips_2<=3.50 and ips_3>=3.00 and ips_3<=3.50 and sks_4>=18 and ket='Lebih Cepat'";
                                                $read296 = mysqli_query($connect, $sks42ips4kips2kips3klbh); // Result resource
                                                $baris296 = mysqli_fetch_array($read296);
                                                $sks42ips4kips2kips3klbh = $baris296['sks42ips4kips2kips3klbh']; // Use something like this to get the result
                                                echo "<td>".$sks42ips4kips2kips3klbh."</td>";

                                                $entropy_sks42ips4kips2kips3k = hitung_entropy($sks42ips4kips2kips3ktdk, $sks42ips4kips2kips3ktpt, $sks42ips4kips2kips3klbh);
                                                echo "<td>".$entropy_sks42ips4kips2kips3k."</td>";

                                                $gain37 = hitung_gain2($entropy_ips3ips4kips2k23, $ips4kips2kips3k, $sks4ips4kips2kips3k, $sks42ips4kips2kips3k,  $entropy_sks4ips4kips2kips3k, $entropy_sks42ips4kips2kips3k);
                                                echo "<td>".format_decimal($gain37)."</td>";
                                            ?>
                                        
                                    </tr>
                                </body>
                            </table>

                        </div>

                    </div>
                </div>
            </div>


            