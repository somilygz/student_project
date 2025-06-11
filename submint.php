<?php
$host = getenv("DB_HOST");
$db   = getenv("DB_NAME");
$user = getenv("DB_USER");
$pass = getenv("DB_PASS");

$conn = pg_connect("host=$host dbname=$db user=$user password=$pass");
if (!$conn) {
  echo "❌ Failed to connect to database.";
  exit;
}

$name = $_POST['name'];
$email = $_POST['email'];

$query = "INSERT INTO students (name, email) VALUES ($1, $2)";
$result = pg_query_params($conn, $query, array($name, $email));

if ($result) {
  echo "✅ Data saved successfully.";
} else {
  echo "❌ Error saving data.";
}
?>
