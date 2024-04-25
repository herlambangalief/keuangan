<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Data Permainan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Build whatever layout you need with our Architect framework.">
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

        <?php 
            $id=$_GET['id'];
            $query=mysqli_query($konek,"SELECT * FROM permainan WHERE id_permainan = '$id'");
            $fetch=mysqli_fetch_assoc($query);
        ?>
                     <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="tab-content">
                            
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Ubah Data Permainan</h5>
                                        <form action="" method="post" class="">
                                            <div class="position-relative row form-group"><label for="examplePassword" class="col-sm-2 col-form-label">Permainan</label>
                                                <div class="col-sm-10"><input name="permainan" id="examplePassword" placeholder="Permainan" type="text" class="form-control" value="<?php echo $fetch['permainan'] ?>"></div>
                                            </div>
                                           
                                            <div class="position-relative row form-check">
                                                <div class="col-sm-10 ">
                                                    <input type="submit" value="Ubah Data" name="masukan" class="btn btn-info">
                                                </div>
                                            </div>
                                        </form>
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

<?php
    

    if (isset($_POST['masukan'])) {
        $permainan=$_POST['permainan'];

        $masuk=mysqli_query($konek,"UPDATE `permainan` SET `permainan` = '$permainan' WHERE `permainan`.`id_permainan` = '$id';");

        
        if ($masuk) {
             echo "<script>location.href='permainan.php'</script>";   
        }



    }

?>

