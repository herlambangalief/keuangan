<?php 
    require 'koneksi.php';
    $sql=mysqli_query($konek,"SELECT * FROM transaksi");
    $no=0;

    if ($_GET['stat']==0) {
        echo "<script>alert('Id belum ada silahkan buat id player baru')</script>";
        echo "<script>location.href='transaksi.php?stat=1'</script>";
    }

    $q_agen=mysqli_query($konek,"SELECT * FROM agen");

    $query=mysqli_query($konek,"SELECT * FROM permainan");

    if (isset($_POST['masukan'])) {

    $ids=$_POST['maks'];
    $new=$ids.$ids;


        for ($i=0; $i < $ids; $i++) {

            $id        =$_POST[$i.'id'];
            $cek_id=mysqli_query($konek,"SELECT * FROM player WHERE id = $id");
            $ceks=mysqli_num_rows($cek_id);
            if ($ceks == 0 ) {
                echo "<script>location.href='transaksi.php?stat=0'</script>";
            }
            else{
                $permainan =$_POST['permainan'];
                $tanggal   =$_POST['tanggal'];
                $depo      =$_POST[$i.'depo'];
                $bonus     =$_POST[$i.'bonus'];
                $wd        =$_POST[$i.'wd'];
                $query="INSERT INTO `transaksi` (`id_transaksi`, `permainan`, `tanggal`, `ID`, `Depo`, `Bonus`, `WD`) VALUES (NULL, '$permainan', '$tanggal', '$id', '$depo', '$bonus', '$wd');";
                mysqli_query($konek,$query);
            }

                
        }
        echo "<script>location.href='transaksi.php?stat=1'</script>";

    } 

    if (isset($_POST['add_permainan'])) {
        $nama_permainan=$_POST['nama_permainan'];

        $masuk=mysqli_query($konek,"INSERT INTO `permainan` (`id_permainan`, `permainan`) VALUES (NULL, '$nama_permainan')");

        
        if ($masuk) {
            echo "<script>location.href='transaksi.php'</script>";   
        }
    }

    $q_cek=mysqli_query($konek,"SELECT * FROM player");
    $cek=mysqli_num_rows($q_cek);
    if ($cek <= 0) {
        echo "<script>alert('ID Belum Ada Silahkan Buat ID Baru')</script>";
        echo "<script>location.href='player.php'</script>";

    }

    $q_id=mysqli_query($konek,"SELECT * FROM player");

?>



<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Data Transaksi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Build whatever layout you need with our Architect framework.">
    <meta name="msapplication-tap-highlight" content="no">
    <style type="text/css">
        .gone{
            opacity: 0;
        }

        .vertical-center {
          margin: 0;
          top: 50%;
          -ms-transform: translateY(-50%);
          transform: translateY(-50%);
        }
    </style>
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
    <script type="text/javascript" src="assets/scripts/main.js"></script>
<link href="./main.css" rel="stylesheet"></head>
<body  id="display">
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <?php require 'header.php'; ?>      
         <div class="app-main">
                <div class="app-sidebar sidebar-shadow">
                    <?php require 'sidebar.php'; ?>
                 </div>   
                     <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="tab-content">

                            
                            
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">

                                <div class="main-card mb-5 card">
                                    <div class="card-body">

                                            <div class="row"><h3>Form Tambah Data Transaksi</h3>
                                            </div>
                                            <a href="#" onclick="opened()" class="btn btn-success"><i class="fa fa-plus"></i> <b>Tambah Layanan</b></a>
                                            <a href="#" onclick="openeds()" class="btn btn-info"><i class="fa fa-plus"></i> <b>New User</b></a>
                                        
                                        <br><br>

                                        <form action="" method="post" class="">
                                            <div  class="position-relative row form-group"><label for="exampleSelect" class="col-sm-2 col-form-label">Layanan</label>
                                                <div class="col-sm-10">
                                                    <select name="permainan" id="permainan" class="form-control">
                                                       <?php while ($fetch=mysqli_fetch_array($query)) {?>
                                                            <option><?php echo $fetch['permainan']; ?></option>
                                                       <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="position-relative row form-group"><label for="examplePassword" class="col-sm-2 col-form-label">Tanggal</label>
                                                <div class="col-sm-10"><input name="tanggal" id="tanggal"  type="date" class="form-control"></div>
                                            </div>


                                        <input hidden="" type="text" name="maks" id="data_id" value="0">
                                        <table class="mb-0 col-md-12 table table-striped table-responsive-lg" style="overflow-x:auto; ">
                                            
                                            <thead class="col-md-12" id="data">
                                            <tr>
                                                <th class="col-md-3"><center> ID<span class="gone">...............</span> </center></th>
                                                <th class="col-md-3"><center> Uang Muka<span class="gone">..........</span> </center></th>
                                                <th class="col-md-3"><center> Total Pembayaran<span class="gone">.........</span> </center></th>
                                                <th class="col-md-3"><center> Jumlah Penarikan<span class="gone">............</span> </center></th>
                                                <th class=""><center> Aksi </center></th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                                    <tr>
                                                        <div class="form-group">
                                                            <td class="col-md-3">
                                                                <input class="form-control col-md-12" name="id" id="ids">
                                                            </td>
                                                            <td class="col-md-3">
                                                                <input class="form-control col-md-12" type="text" name="depo" id="depo">
                                                            </td>
                                                            <td class="col-md-3">
                                                                <input class="form-control col-md-12" type="text" name="bonus" id="bonus">
                                                            </td>
                                                            <td class="col-md-3">
                                                                <input class="form-control col-md-12" type="text" name="wd" id="wd">
                                                            </td>
                                                            <td class="">
                                                                <a onclick="tambah()" class="btn btn-success"><i class="fa fa-plus"></i></a>
                                                            </td>
                                                        </div>
                                                    </tr>
                                                    
                                            </tbody>
                                        </table>
                                        <table class="mb-0 table col-md-12 table-striped table-responsive">
                                            <thead>
                                            <?php 
                                                $data=mysqli_fetch_array($sql);
                                                $jml=$data['ID']+$data['Depo']+$data['Bonus']+$data['WD']; 
                                            ?>
                                            <tr>
                                                <th></th>
                                                <th><span class="gone">..................</span></th>
                                                <th><span class="gone">..................</span></th>
                                                <th><span class="gone">..................</span></th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <td class="col-md-3"><b>Total</b></td>
                                                <td class="col-md-3"><input type="" readonly="" class="form-control" id="tdepo"></td>
                                                <td class="col-md-3"><input type="" readonly="" class="form-control" id="tbonus"></td>
                                                <td class="col-md-3"><input type="" readonly="" class="form-control" id="twd"></td>
                                                <td class="col-md-1">
                                                </td>
                                            </tbody>
                                        </table>
                                            
                                           
                                           
                                           
                                            <div class="position-relative row form-check">
                                                <div class="col-sm-10">
                                                    <input type="submit" value="Enter" name="masukan" class="btn btn-success col-md-3">
                                                </div>
                                            </div>
                                        </form>

                                        <div id="tambah_permainan" style="position: absolute; z-index: 10; display: none;" class="col-md-12 main-card card vertical-center">
                                                <br>
                                                <a onclick="closed()" href="#"><i style="font-size: 15px;" class="fa fa-window-close btn btn-danger"></i></a>
                                                <center>
                                                    <form action="" id="myForm" method="post">
                                                        <div class="col-sm-10 card-body">
                                                            <input type="text" class="form-control" name="nama_permainan" placeholder="Nama Permainan" id="nama_permainans">
                                                            <br>
                                                            <input type="submit" class="btn btn-success"  value="Tambahkan Data">
                                                        </div>
                                                    </form>
                                                </center>
                                        </div>

                                        <div id="tambah_ids" style="position: absolute; z-index: 10; display: none;" class="col-md-12 main-card card vertical-center">
                                                <br>
                                                <a onclick="closeds()" href="#"><i style="font-size: 15px;" class="fa fa-window-close btn btn-danger"></i></a>
                                                <center>
                                                    <form action="" id="myForms" method="post">
                                                        <div class="col-sm-10 card-body">
                                                            <input type="text" class="form-control" name="players" placeholder="ID" id="players">
                                                            <select class="form-control" name="agens" id="agens">
                                                                <?php while ($agen=mysqli_fetch_array($q_agen)) {?>
                                                                    <option value="<?php echo $agen['id_agen'] ?>"><?php echo $agen['nama']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <br>
                                                            <input type="submit" class="btn btn-success"  value="Tambahkan Data">
                                                        </div>
                                                    </form>
                                                </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="message"></div>

                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title"></h5>
                                        <table class="mb-0 col-md-12 table table-striped table-responsive-lg">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Layanan</th>
                                                <th>Tanggal</th>
                                                <th>ID</th>
                                                <th>Uang Muka</th>
                                                <th>Total Pembayaran</th>
                                                <th>Penarikan</th>
                                                <th>Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($data=mysqli_fetch_array($sql)) { $no++;
                                                    $jml=$data['ID']+$data['Depo']+$data['Bonus']+$data['WD'];
                                                ?>

                                                    <tr>
                                                        <th scope="row"><?php echo $no; ?></th>
                                                        <td><?php echo $data['permainan']; ?></td>
                                                        <td><?php echo $data['tanggal']; ?></td>
                                                        <td><?php echo $data['ID']; ?></td>
                                                        <td><?php echo $data['Depo']; ?></td>
                                                        <td><?php echo $data['Bonus']; ?></td>
                                                        <td><?php echo $data['WD']; ?></td>
                                                        <td><?php echo $jml ?></td>
                                                        
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
<script type="text/javascript" src="./vendor/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    function opened(){
        document.getElementById("tambah_permainan").style.display="inline";
    }
    function closed(){
        document.getElementById("tambah_permainan").style.display="none";
    }
    function openeds(){
        document.getElementById("tambah_ids").style.display="inline";
    }
    function closeds(){
        document.getElementById("tambah_ids").style.display="none";
    }

    function tambah(){
        var permainan=document.getElementById("permainan").value;
        var tanggal=document.getElementById("tanggal").value;
        var ids=document.getElementById("ids").value;
        var depo=document.getElementById("depo").value;
        var bonus=document.getElementById("bonus").value;
        var wd=document.getElementById("wd").value;

        var id=document.getElementById("data_id").value;
        var hasil=1+parseInt(id);
        
        document.getElementById("data_id").value=hasil;
        document.getElementById("data").innerHTML+=
        "<tr><td><input type='text' class='form-control' name='"+id+"id' value='"+ids+"'></td><td><input type='text' class='form-control' id='"+id+"depo' name='"+id+"depo' value='"+depo+"'></td><td><input type='text' class='form-control' id='"+id+"bonus' name='"+id+"bonus' value='"+bonus+"'></td><td><input type='text' class='form-control' id='"+id+"wd' name='"+id+"wd' value='"+wd+"'></td></tr>"; 

        totaldepo();
        totalbonus();
        totalwd();

        document.getElementById("ids").value="";
        document.getElementById("depo").value="";
        document.getElementById("bonus").value="";
        document.getElementById("wd").value="";
    }

    function totaldepo(){
        var id=document.getElementById("data_id").value;
        var hasild=0;
        for (var i = 0; i < id; i++) {
            var depo=document.getElementById(i+"depo").value;
            hasild+=parseInt(depo);

        }
        document.getElementById('tdepo').value=hasild;
        
    }
    function totalbonus(){
        var id=document.getElementById("data_id").value;
        var hasilb=0;
        for (var i = 0; i < id; i++) {
            var bonus=document.getElementById(i+"bonus").value;
            hasilb+=parseInt(bonus);

        }
        document.getElementById('tbonus').value=hasilb;
        
    }
    function totalwd(){
        var id=document.getElementById("data_id").value;
        var hasilw=0;
        for (var i = 0; i < id; i++) {
            var wd=document.getElementById(i+"wd").value;
            hasilw+=parseInt(wd);

        }
        document.getElementById('twd').value=hasilw;
        
    }
</script>

<script type="text/javascript">
    $("#myForm").on("submit",function(e){

        var nama_permainans=$("#nama_permainans").val();
 
           $.ajax({
            type:"POST",
            url:"tambahs.php",
            data:{"nama_permainans":nama_permainans},
            dataType: "html",   //expect html to be returned                
            success: function(response){                    
                $("#tambah_permainan").css("display","none"); 
            }
 
    });
 

 
e.preventDefault();
 
 
  });


    $("#myForms").on("submit",function(e){

        var agens=$("#agens").val();
        var players=$("#players").val();
 
           $.ajax({
            type:"POST",
            url:"tambaha.php",
            data:{"agens":agens,"players":players},
            dataType: "html",   //expect html to be returned                
            success: function(response){                    
                $("#tambah_ids").css("display","none"); 
                //alert(response);
            }
 
    });
 

 
e.preventDefault();
 
 
  });


    $(document).ready(function() {

    $("#display").click(function() {                

      $.ajax({    //create an ajax request to display.php
        type: "GET",
        url: "tampils.php",             
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#permainan").html(response); 
            //alert(response);
        }

    });
    });
    });

    
    var typingTimer;                //timer identifier
    var doneTypingInterval = 600;  //time in ms, 5 second for example
    var $input = $('#ids');

    //on keyup, start the countdown
    $input.on('keyup', function () {
      clearTimeout(typingTimer);
      typingTimer = setTimeout(doneTyping, doneTypingInterval);
    });

    //on keydown, clear the countdown 
    $input.on('keydown', function () {
      clearTimeout(typingTimer);
    });

    //user is "finished typing," do something
    function doneTyping () {
      var ids=$("#ids").val();              

      $.ajax({    //create an ajax request to display.php
        type: "POST",
        url: "tampila.php",
        data:{"ids":ids},             
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#permainan").html(response); 
            //alert(response);
        }

    });
    }
</script>
</html>

