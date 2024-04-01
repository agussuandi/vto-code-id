<?php
//try {
$db_host = "localhost";
$db_user = "postgres";
$db_pass = "12345678";
$db_name = "db_uat";
 
//$koneksi = new PDO("pgsql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
$koneksi = pg_connect("host=localhost port=5432 dbname=db_uat user=postgres password=12345678");
	
/*} catch (PDOException  $e) {
echo "Gagal melakukan koneksi ke Database : " . $e->getMessage() . "<br/>";
die();	
}*/

?>