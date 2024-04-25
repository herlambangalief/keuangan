<?php 
	$id=$_GET['id'];
	require 'koneksi.php';
	mysqli_query($konek,"DELETE FROM `player` WHERE `id_player` = $id");

    echo "<script>location.href='player.php'</script>";
?>