<?php
include("koneksi.php");
	$id=$_POST['agen'];
	$now=$_POST['tanggal'];
    $sql_p=mysqli_query($konek,"SELECT transaksi.* , player.* FROM transaksi,player WHERE player.agen=$id AND transaksi.id=player.id AND tanggal='$now' ");
$no=0;

while($data_p = mysqli_fetch_array($sql_p))
{   
	$ids=$data_p['id'];
    $trans=mysqli_query($konek,"SELECT * FROM transaksi WHERE ID = '$ids' ");
    $tran=mysqli_fetch_array($trans);
    $no++;

    echo "<tr>";
    echo '<td>'.$data_p['id'].'</td>';
    echo '<td><input readonly="" id="depo'.$no.'" style="border:none; width:60%;" value="'. $tran['Depo'] .'"></td>';
    echo '<td><input readonly="" id="bonus'.$no.'" style="border:none; width:60%;" value="'. $tran['Bonus'] .'"></td>';
    echo '<td><input readonly="" id="wd'.$no.'" style="border:none; width:60%;" value="'. $tran['WD'] .'"></td>';
    echo "</tr>";
}
	// echo '<input id="maks" value="'.$no.'">';
	echo '<script>document.getElementById("maks").value="'.$no.'"</script>';
?>


	
	
    
    
