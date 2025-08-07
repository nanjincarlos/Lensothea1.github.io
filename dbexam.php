<html>
<?php

// Show PHP errors (for debugging)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername="localhost";
$username="root";
$password="";
$dbname="dbexam1";
$conn= new mysqli($servername,$username,$password,$dbname);
if(!$conn){
    echo "Database can't connet";
}
else{
    echo "Database was connected";
}
?>
</html>
