<?php
$mysql_db_hostname = "localhost";
$mysql_db_user = "root";
$mysql_db_password = "";
$mysql_db_database = "kelasonline";

$op=$_GET['op'];

if($op=='load'){
		$con = @mysqli_connect($mysql_db_hostname, $mysql_db_user, $mysql_db_password,
		 $mysql_db_database);

		if (!$con) {
		 trigger_error('Could not connect to MySQL: ' . mysqli_connect_error());
		}
		$var = array();
		 $sql = "SELECT * FROM guru ORDER BY `nama` ASC";
		$result = mysqli_query($con, $sql);

		while($obj = mysqli_fetch_object($result)) {
		$var[] = $obj;
		}
		echo '{"guru_php":'.json_encode($var).'}';
}
elseif($op=='search'){
		$keyword=$_GET['keyword'];

		$con = @mysqli_connect($mysql_db_hostname, $mysql_db_user, $mysql_db_password,
		 $mysql_db_database);

		if (!$con) {
		 trigger_error('Could not connect to MySQL: ' . mysqli_connect_error());
		}
		$var = array();
		 $sql = "SELECT * FROM guru WHERE `nama` LIKE '%$keyword%' OR `nip` LIKE '%$keyword%' OR `alamat` LIKE '%$keyword%' ORDER BY `nama` ASC";
		$result = mysqli_query($con, $sql);

		while($obj = mysqli_fetch_object($result)) {
		$var[] = $obj;
		}
		echo '{"guru_php":'.json_encode($var).'}';
}
?>
