<?php
require 'koneksi.php';

$agens=$_POST["agens"];
$players=$_POST["players"];
        
$insertq=mysqli_query($konek,"INSERT INTO `player` (`id_player`, `id`, `agen`) VALUES (NULL, '$players', '$agens')");
         
if($insertq){
echo 1;
}   else{
echo 0;
}           
    
?>
?>