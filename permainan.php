<?php 
	require 'koneksi.php';
	$sql=mysqli_query($konek,"SELECT * FROM permainan");
	$no=0;


    if (isset($_POST['masukan'])) {
        $permainan=$_POST['permainan'];

        $masuk=mysqli_query($konek,"INSERT INTO `permainan` (`id_permainan`, `permainan`) VALUES (NULL, '$permainan')");

        
        if ($masuk) {
            echo "<script>location.href='permainan.php'</script>";   
        }
    }
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Data Permainan</title>
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
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    	<?php require 'header.php'; ?>
                     <div class="app-main">

         <div class="app-sidebar sidebar-shadow">
         	<?php require 'sidebar.php'; ?>
         </div>
                 <div class="app-main__outer">
                    <div class="app-main__inner">
                         <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Data Layanan</h5>
                                        <form action="" method="post" class="">
                                            <div class="position-relative row form-group"><label for="examplePassword" class="col-sm-2 col-form-label">Layanan</label>
                                                <div class="col-sm-10"><input name="permainan" id="examplePassword" placeholder="Permainan" type="text" class="form-control"></div>
                                            </div>
                                           
                                           
                                           
                                            <div class="position-relative row form-check">
                                                <div class="col-sm-10">
                                                    <input type="submit" value="Masukan Data" name="masukan" class="btn btn-info">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                           <div class="row">
                            <div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <table class="mb-0 table table-striped">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Layanan</th>
                                                <th colspan="2">Aksi</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            	<?php while ($data=mysqli_fetch_array($sql)) { $no++;?>
		                                            <tr>
		                                                <th scope="row"><?php echo $no; ?></th>
		                                                <td><?php echo $data['permainan']; ?></td>
		                                                <td><a href="permainan_update.php?id=<?php echo $data['id_permainan'] ?>" class="btn btn-warning">Ubah Data</a></td>
		                                                <td><a href="permainan_delete.php?id=<?php echo $data['id_permainan'] ?>" class="btn btn-danger">Hapus Data</a></td>
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
    </div>
<script type="text/javascript" src="./assets/scripts/main.js"></script></body>
</html>
