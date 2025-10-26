  
<?php
$servername="localhost";
$username="root";
$password="";
$database="db_mini";
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn)
{
	echo"connection failed";
}
?>