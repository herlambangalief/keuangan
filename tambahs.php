<?php
require 'koneksi.php';

$nama_permainans=$_POST["nama_permainans"];
        
$insertq=mysqli_query($konek,"INSERT INTO `permainan` (`id_permainan`, `permainan`) VALUES (NULL, '$nama_permainans')");
         
if($insertq){
echo 1;
}   else{
echo 0;
}           
    
?>
?>