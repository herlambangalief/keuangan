<?php
include("koneksi.php");

$ids=$_POST["ids"];

$result=mysqli_query($konek,"SELECT * FROM player WHERE id='$ids'");

$cek=mysqli_num_rows($result);

	if ($cek==0) {
	 	echo "<script>alert('ID Tidak Tersedia Silahkan Buat ID')</script>";
    	echo "<script>document.getElementById('ids').value=''</script>";
	 } 
    

?>