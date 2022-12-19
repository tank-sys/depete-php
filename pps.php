 <?php
///////////////
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "depete";
$conn = new MySQLi($servername, $username, $password, $dbname);
if ($conn->connect_error) {die("Connection failed: Error nda..." . $conn->connect_error);} 
//////////////

$data = json_encode( explode("\r\n",file_get_contents('pps.txt')) );
$data = json_decode($data, true);
$no = "1";
foreach($data as $value) :
$stmt = "select * from karangrayung where nama like '%$value%'";
$result = $conn->query($stmt);
if(!empty($value)){
echo "<table>";
echo "<tr><td colspan=10 align=center style=\"border: 1px solid black;\" height=25>".$value."</td></tr>";
echo "<tr><th>No</th><th>NIK</th><th>Name</th><th>TL</th><th>TL</th><th>Alamat</th><th>TPS</th></tr>";
while ($rows = $result->fetch_array()){

$dusun = $rows['dusun'];
$dusun = preg_replace("/dusun/i", "", $rows['dusun']);

echo "<tr><td>".$no++."</td><td>".$rows['nik']."</td><td>".$rows['nama']."</td><td>".$rows['tempat_lahir']."</td><td>".$rows['tanggal_lahir']."</td><td>".$dusun." RT ".$rows['rt']." RW ".$rows['rw']." Desa ".$rows['desa']."</td><td>".$rows['tps']."</td></tr>";

}
echo "</table>";
////////
}
endforeach;

?> 