<?php 
	$id=$_GET['id'];
	require 'koneksi.php';
	mysqli_query($konek,"DELETE FROM `agen` WHERE `id_agen` = $id");

    echo "<script>location.href='agen.php'</script>";
?>