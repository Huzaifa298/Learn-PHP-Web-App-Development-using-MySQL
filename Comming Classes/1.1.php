<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

echo '<h1>START</h1>';

$servername = "localhost";
// $servername = "192.168.10.2";
$username = "root";
$password = "";
$dbname = "awais";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM tbl1";

$stmt = $conn->prepare($sql);
// $stmt->bind_param("i", $_GET['id']);

if ($stmt->execute() === true) {
	$result = $stmt->get_result();

	while ($row = $result->fetch_assoc()) {
		?>
		<h1><?= $row['name'] ?></h1>
		<p><?= $row['description'] ?></p>
		<h2><?= $row['date'] ?></h2>
		<a href="2.php?id=<?= $row['id'] ?>&name=<?= $row['name'] ?>&desc=<?= $row['description'] ?>&dt=<?= $row['date'] ?>">Link</a>
		<!-- URL SYNTAX: FILE.EXT?VAR=VAL&VAR=VAL&VAR=VAL&VAR=VAL&VAR=VAL&VAR=VAL&VAR=VAL -->
		<hr>
		<?php
	} // while ($row = $result->fetch_assoc())
} // if ($stmt->execute() === true)

$conn->close();

echo '<h1>ENDED</h1>';