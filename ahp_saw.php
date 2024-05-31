<style>
    .text-primary{font-weight: bold;}
</style>
<div class="page-header">
    <h1>AHP-SAW</h1>
</div>
<?php    
    $c = $db->get_results("SELECT * FROM tb_rel_alternatif WHERE nilai>0");
    if (!$ALTERNATIF|| !$KRITERIA):
        echo "Tampaknya anda belum mengatur alternatif dan kriteria. Silahkan tambahkan minimal 3 alternatif dan 3 kriteria.";
    elseif (!$c):
        echo "Tampaknya anda belum mengatur nilai alternatif. Silahkan atur pada menu <strong>Alternatif</strong> > <strong>Nilai Bobot Alternatif</strong>.";
    else:
?>
<div class="panel panel-primary">
<div class="panel-heading"><strong>Mengukur Konsistensi Kriteria (AHP)</strong></div>
<div class="panel-body">
    <div class="panel panel-default">
        <div role="button" class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#c11" aria-expanded="false" aria-controls="c11" style="background-color: #2C3E50; color:white;">
            <strong>Matriks Perbandingan Kriteria</strong>
            <span class="glyphicon glyphicon-menu-down"></span>
        </div>
        <div class="panel-body collapse" id="c11">
            <strong>Pairwise Comparison</strong>
            <p>Perbandingan antar kriteria dengan nilai perbandingan antara 1 sampai 9 dan sebaliknya</p>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                <?php           
                    $matriks = AHP_get_relkriteria();   
                    $total = AHP_get_total_kolom($matriks);
                    
                    echo "<thead><tr><th></th>";     
                    foreach($matriks as $key => $value){
                        echo "<th class='nw'>$key</th>";        
                    }    
                    echo "<tr></thead>";    
                    foreach($matriks as $key => $value){
                        echo "<tr><th class='nw'>$key</th>";
                        foreach($value as $k => $v){
                            echo "<td>".round($v,3)."</td>";
                        }        
                        echo "</tr>";
                    }    
                    echo "<tfoot><tr><th class='nw'>Total</th>";
                    foreach($total as $key => $value){
                        echo "<td class='text-primary'>".round($total[$key],3)."</td>";        
                    }
                    echo "</tr></tfoot>";
                ?>
                </table>
            </div>
        </div>    
    </div>
    
    <div class="panel panel-default">
        <div role="button" class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#c12" aria-expanded="false" aria-controls="c12" style="background-color: #2C3E50; color:white;">
            <strong>Matriks Bobot Prioritas Kriteria</strong>
            <span class="glyphicon glyphicon-menu-down"></span>
        </div>
        <div class="panel-body collapse" id="c12">
            <p>Setelah terbentuk matrik perbandingan maka dilihat bobot prioritas untuk perbandingan  kriteria.  
            Dengan  cara  membagi  isi  matriks  perbandingan  dengan jumlah  kolom  yang  bersesuaian,  kemudian  menjumlahkan  perbaris  setelah  itu hasil penjumlahan dibagi dengan banyaknya kriteria sehingga ditemukan bobot prioritas seperti terlihat pada berikut.</p>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                <?php                
                    $normal = AHP_normalize($matriks, $total);                  
                    $rata = AHP_get_rata($normal);
                    
                    echo "<thead><tr><th></th>";   
                    $no=1;
                    foreach($normal as $key => $value){
                        echo "<th class='nw'>$key</th>";
                        $no++;      
                    }      
                    echo "<th class='nw'>Bobot Prioritas</th></tr></thead>";  
                    $no=1;
                    foreach($normal as $key => $value){
                        echo "<tr>";
                        echo "<th class='nw'>$key</th>";
                        foreach($value as $k => $v){
                            echo "<td>".round($v,3)."</td>";
                        }				             
                        echo "<td class='text-primary'>".round($rata[$key],3)."</td>";
                        echo "</tr>";
                        $no++;
                    }    
                    echo "</tr>";	
                ?>
                </table> 
            </div> 
        </div>
    </div>
    
    <div class="panel panel-default">
        <div role="button" class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#c13" aria-expanded="false" aria-controls="c13" style="background-color: #2C3E50; color:white;">
            <strong>Matriks Konsistensi Kriteria</strong>
            <span class="glyphicon glyphicon-menu-down"></span>
        </div>
        <div class="panel-body collapse" id="c13">
            <p>Untuk  mengetahui  konsisten  matriks  perbandingan dilakukan  perkalian  seluruh  isi  kolom  matriks  A  perbandingan  dengan  bobot prioritas  kriteria  A,  isi  kolom  B  matriks  perbandingan  dengan  bobot  prioritas kriteria  B  dan  seterusnya.  Kemudian  dijumlahkan  setiap  barisnya  dan  dibagi penjumlahan baris dengan bobot prioritas bersesuaian seperti terlihat pada tabel berikut.</p> 
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                <?php                        
                    $cm = AHP_consistency_measure($matriks, $rata);
                    
                    echo "<thead><tr><th></th>";   
                    $no=1;
                    foreach($normal as $key => $value){
                        echo "<th class='nw'>$key</th>";
                        $no++;      
                    }      
                    echo "<th>Consistency Matrix</th></tr></thead>";  
                    $no=1;
                    foreach($normal as $key => $value){
                        echo "<tr>";
                        echo "<th class='nw'>$key</th>";
                        foreach($value as $k => $v){
                            echo "<td>".round($v,3)."</td>";
                        }				             
                        echo "<td class='text-primary'>".round($cm[$key],3)."</td>";
                        echo "</tr>";
                        $no++;
                    }    
                    echo "</tr>";	
                ?>
                </table> 
            </div>
            <p>Berikut tabel ratio index berdasarkan ordo matriks.</p>    
            
            <table class="table table-bordered">
                <tr>
                    <th>Ordo matriks</th>
                    <?php
                        foreach($nRI as $key => $value){
                            if(count($matriks)==$key)
                                echo "<td class='text-primary'>$key</td>";
                            else
                                echo "<td>$key</td>";
                        }
                    ?>
                </tr>
                <tr>
                    <th>Ratio index</th>
                    <?php
                        foreach($nRI as $key => $value){
                            if(count($matriks)==$key)
                                echo "<td class='text-primary'>$value</td>";
                            else
                                echo "<td>$value</td>";
                        }
                    ?>
                </tr>
            </table>
        </div>
        <div class="panel-footer">
            <?php
                $CI = ((array_sum($cm)/count($cm))-count($cm))/(count($cm)-1);	
                $RI = $nRI[count($matriks)];
                $CR = $CI/$RI;
                echo "<p>Consistency Index: ".round($CI, 3)."<br />";	
                echo "Ratio Index: ".round($RI, 3)."<br />";
                echo "Consistency Ratio: ".round($CR, 3);
                if($CR>0.10){
                    echo " (Tidak konsisten)<br />";	
                } else {
                    echo " (Konsisten)<br />";
                }
            ?>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading"><strong>Perhitungan SAW</strong></div>
    <div class="panel-body">
        <div class="panel panel-primary">
            <div class="panel-heading"><strong>Hasil Analisa</strong></div>
            <div class="panel-body oxa">
                <table class="table table-bordered table-striped table-hover">
                <?php                                            
                    echo SAW_hasil_analisa();                    
                ?>
                </table>
            </div>
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading"><strong>Normalisasi</strong></div>
            <div class="panel-body oxa">
                <table class="table table-bordered table-striped table-hover">
                <?php    
                $hasil_analisa = SAW_get_hasil_analisa(false);
                $normal_saw = SAW_normalize($hasil_analisa);

                $r = "<tr><th></th>";    
                $no = 1;    
                foreach ($normal_saw[key($normal_saw)] as $key => $value) {
                    $r .= "<th>$key</th>";
                    $no++;      
                }    

                $no = 1;    
                foreach ($normal_saw as $key => $value) {
                    $r .= "<tr>";
                    $r .= "<th>A" . $no . "</th>";
                    foreach ($value as $k => $v) {
                        $r .= "<td>" . round($v, 5) . "</td>";
                    }        
                    $r .= "</tr>";
                    $no++;    
                }    
                $r .= "</tr>"; 
                echo $r;
                ?>
                </table>
            </div>
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading"><strong>Normalisasi Terbobot</strong></div>
            <div class="panel-body oxa">
                <table class="table table-bordered table-striped table-hover">
                <?php    
                $rata = AHP_get_rata(AHP_normalize(AHP_get_relkriteria(), AHP_get_total_kolom(AHP_get_relkriteria())));
                $terbobot_saw = SAW_normal_terbobot($normal_saw, $rata);

                $r = "<tr><th></th>";    
                $no = 1;    
                foreach ($terbobot_saw[key($terbobot_saw)] as $key => $value) {
                    $r .= "<th>$key</th>";
                    $no++;      
                }    

                $no = 1;    
                foreach ($terbobot_saw as $key => $value) {
                    $r .= "<tr>";
                    $r .= "<th>A" . $no . "</th>";
                    foreach ($value as $k => $v) {
                        $r .= "<td>" . round($v, 5) . "</td>";
                    }        
                    $r .= "</tr>";
                    $no++;    
                }    
                $r .= "</tr>"; 
                echo $r;
                ?>
                </table>
            </div>
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading"><strong>Perangkingan</strong></div>
            <div class="panel-body oxa">
                <table class="table table-bordered table-striped table-hover">
                <tr>
                    <th>Alternatif</th>
                    <th>Total</th>
                    <th>Rank</th>
                </tr>
                <?php    
                $total_saw = SAW_total($terbobot_saw);
                $rank_saw = get_rank($total_saw);

                foreach ($total_saw as $key => $value) {
                    $db->query("UPDATE tb_alternatif SET total='$value', rank='$rank_saw[$key]' WHERE kode_alternatif='$key'");
                    echo "<tr>";
                    echo "<th>$key - $ALTERNATIF[$key]</th>";
                    echo "<td class='text-primary'>" . round($value, 3) . "</td>";
                    echo "<td class='text-primary'>" . $rank_saw[$key] . "</td>";
                    echo "</tr>";
                }                            
                ?>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" target="_blank" href="cetak.php?m=hitung"><span class="glyphicon glyphicon-print"></span> Cetak</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php endif?>
