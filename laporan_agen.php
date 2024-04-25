<?php 
	require 'koneksi.php';
    $id=$_GET['id'];
	$sql=mysqli_query($konek,"SELECT * FROM agen");  
    $no=0;

    $sekarang=date("Y-m-d");


?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laporan Transaksi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Tables are the backbone of almost all web applications.">
    <meta name="msapplication-tap-highlight" content="no">
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
<link href="./main.css" rel="stylesheet"></head>
<body id="display">
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    	<?php require 'header.php'; ?>
                     <div class="app-main">

         <div class="app-sidebar sidebar-shadow">
         	<?php require 'sidebar.php'; ?>
         </div>
                 <div class="app-main__outer">
                    <div class="app-main__inner">
                           <div class="row">
                            <div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <h6>Client : </h6>
                                        <select id="agen" class="form-control col-md-4">
                                            <option><---Pilih Client---></option>
                                            <?php while ($data=mysqli_fetch_array($sql)) {?>
                                                <option value="<?php echo $data['id_agen'] ?>"><?php echo $data['nama']; ?></option>
                                            <?php } ?>        
                                        </select>
                                        <br>
                                        <h6>Tanggal :</h6> 
                                        <input id="tanggal" class="form-control col-md-4" type="date" name="tanggal" value="<?php echo $sekarang ?>">
                                        <br>
                                        <table class="mb-0 col-md-12 table table-striped table-responsive-lg">
                                            <thead>
                                            <tr>
                                                <th>User</th>
                                                <th>Uang Muka</th>
                                                <th>Total Pembayaran</th>
                                                <th>Penarikan</th>
                                            </tr>
                                            </thead>
                                            <tbody id="laporan">
		                                      
                                              <input hidden="" type="" id="maks" name="">
                                            </tbody>
                                            <tbody>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tbody>
                                            <tbody>
                                                <td></td>
                                                <td><input style="border:none; width: 60%;" readonly="" id="tdepo"></td>
                                                <td><input style="border:none; width: 60%;" readonly="" id="tbonus"></td>
                                                <td><input style="border:none; width: 60%;" readonly="" id="twd"></td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="app-main__inner">
                           <div class="row">
                            <div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <center><h4>Pembayaran</h4></center>
                                        <table class="mb-0 col-md-12 table table-striped table-responsive-lg">
                                            <thead>
                                            <tr>
                                                <th>Pendapatan</th>
                                                <th><input id="omset" readonly="" style="border:none;"></th>
                                                <th>Tagihan Cash</th>
                                                <th><input id="tagihan" value="-625" style="border:none;" readonly=""></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Pemasukan</td>
                                                    <td><input id="setor" value="0" style="border:none;" ></td>
                                                    <td>Bayar Cash</td>
                                                    <td><input id="bayar" value="0" style="border:none;" ></td>
                                                </tr>
                                            </tbody>
                                            <tr>
                                                <td>Sisa</td>
                                                <td><input id="hasils" style="border:none;" readonly=""></td>
                                                <td>Selisih</td>
                                                <td><input id="selisih" style="border:none;" readonly=""></td>
                                            </tr>
                                            <tbody>
                                                <td>Penarikan</td>
                                                <td><input id="wd" style="border:none;" readonly=""></td>
                                                <td>Keterangan</td>
                                                <td></td>
                                            </tbody>
                                            <tr>
                                                <td>Adm Cash</td>
                                                <td><input id="cash"  value="0" style="border:none;"></td>
                                                <td>Hutang Sebelumnya</td>
                                                <td><input id="hutang" value="-200" style="border:none;" readonly=""></td>
                                            </tr>
                                            <tr>
                                                <td>Adm TR</td>
                                                <td><input id="tr" value="0" style="border:none;" ></td>
                                                <td>Sisa Hutang</td>
                                                <td><input id="sisa" value="-400" style="border:none;" readonly=""></td>
                                            </tr>
                                            <tr>
                                                <td>Sisa</td>
                                                <td><input id="hasil" style="border:none;" readonly=""></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><input onclick="proses()" type="button" class="btn btn-primary" value="Proses"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
<script type="text/javascript" src="./assets/scripts/main.js"></script></body>
<script type="text/javascript" src="./vendor/jquery-3.5.1.min.js"></script>
<script type="text/javascript">

        function hitung(){
            var maks=document.getElementById("maks").value;
            var hasild=0;
            for (var i = 1; i <= maks; i++) {
                var depo=document.getElementById("depo"+i).value;
                hasild+=parseInt(depo);
            }
            document.getElementById('tdepo').value=hasild;
            document.getElementById('omset').value=hasild;

            var hasils=0;
            for (var i = 1; i <= maks; i++) {
                var bonus=document.getElementById("bonus"+i).value;
                hasils+=parseInt(bonus);
            }
            document.getElementById('tbonus').value=hasils;

            var hasila=0;
            for (var i = 1; i <= maks; i++) {
                var wd=document.getElementById("wd"+i).value;
                hasila+=parseInt(wd);
            }
            document.getElementById('twd').value=hasila;
            document.getElementById('wd').value=hasila;
        }

        function proses(){
            var wds=document.getElementById('wd').value;
            var cashs=document.getElementById('cash').value;
            var trs=document.getElementById('tr').value;

            var setor=document.getElementById('setor').value;
            var omset=document.getElementById('omset').value;

            var tagihan=document.getElementById('tagihan').value;
            var bayar=document.getElementById('bayar').value;

            hasil1=wds-cashs-trs;
            document.getElementById('hasil').value=hasil1;

            hasil2=omset-setor;
            document.getElementById('hasils').value=hasil2;

            hasil3=tagihan-bayar;
            document.getElementById('selisih').value=hasil3;


        }
</script>

<script type="text/javascript">

    $("#agen").change(function() {                

      $.ajax({    //create an ajax request to display.php
        type: "POST",
        url: "lap1.php",             
        dataType: "html",
        data:  { "agen" : $('#agen').val(),"tanggal" : $('#tanggal').val()},              
        success: function(response){                    
            $("#laporan").html(response); 
            //alert(response);
            hitung();
            
        }

    });
    });

    $("#tanggal").change(function() {                

      $.ajax({    //create an ajax request to display.php
        type: "POST",
        url: "lap1.php",             
        dataType: "html",
        data:  { "agen" : $('#agen').val(),"tanggal" : $('#tanggal').val()},              
        success: function(response){                    
            $("#laporan").html(response); 
            //alert(response);
            hitung();
        }

    });
    });
</script>

</html>
