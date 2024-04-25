<?php
include("koneksi.php");
$result=mysqli_query($konek,"SELECT * FROM permainan");


while($data = mysqli_fetch_array($result))
{   
    echo "<option>$data[permainan]</option>";
}
?>