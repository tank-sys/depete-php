<center>
<form action="./index.php" method="post"  class="d-flex">
          <input type="text" name="q" >
          <button type="submit" name="submit">Search</button>
</form>

<?php
///////////////
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "depete";
$conn = new MySQLi($servername, $username, $password, $dbname);
if ($conn->connect_error) {die("Connection failed: Error nda..." . $conn->connect_error);} 
//////////////

if (isset($_POST['submit'])) {
$q = trim ($_POST['q']);
$no = "1";
$cari = "SELECT * FROM karangrayung WHERE nama LIKE '%$q%';";
$hasil = $conn->query($cari);
echo "<table>";
echo "<tr><td colspan=10 align=center style=\"border: 1px solid black;\" height=25>".$q."</td></tr>";
echo "<tr><th>No</th><th>NIK</th><th>Name</th><th>TL</th><th>TL</th><th>Alamat</th><th>TPS</th></tr>";
while ($rows = $hasil->fetch_array()){
$dusun = $rows['dusun'];
$dusun = preg_replace("/dusun/i", "", $rows['dusun']);

echo "<tr><td>".$no++."</td><td>".$rows['nik']."</td><td>".$rows['nama']."</td><td>".$rows['tempat_lahir']."</td><td>".$rows['tanggal_lahir']."</td><td>".$dusun." RT ".$rows['rt']." RW ".$rows['rw']." Desa ".$rows['desa']."</td><td>".$rows['tps']."</td></tr>";
}
echo "</table>";
} else{
?>
<img src="./bawaslu.jpg">
<?php }?>