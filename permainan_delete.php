<?php 
	$id=$_GET['id'];
	require 'koneksi.php';
	mysqli_query($konek,"DELETE FROM `permainan` WHERE `id_permainan` = $id");

    echo "<script>location.href='permainan.php'</script>";
?>