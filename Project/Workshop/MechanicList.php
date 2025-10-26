<?php
include("../Assets/Connection/Connection.php");

include('Head.php');

if(isset($_GET['mid']))
{
$ins=" insert into tbl_assignwork (request_id,mechanic_id,assign_date)values('".$_GET['wid']."','".$_GET['mid']."',curdate()) ";
if($conn->query($ins))
{
	
 $updt="update tbl_rereques set request_status='3' where request_id ='".$_GET['wid']."'";
 $conn->query($updt);
	?>
    <script>
	alert('Assigned ');
	window.location="MechanicList.php?wid=<?php echo $_GET['wid'] ?>";
	</script>
    <?php
	
	
	
 
	
 
}
}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f0f4f8;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    .content {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 40px 20px;
    }

    table {
        width: 60%; /* Adjust width as needed */
        border-collapse: collapse;
        margin: 20px auto; /* Center the table */
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    th, td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #4169E1 !important; /* Royal Blue */
        color: white !important; /* Ensure text is white */
        text-align: center; /* Center align the header */
    }

    td {
        background-color: #f9f9f9;
    }

    tr:hover td {
        background-color: #C0C0C0; /* Silver Grey on hover */
        color: black;
    }

    /* Make the table responsive */
    @media (max-width: 768px) {
        table {
            width: 100%;
            font-size: 14px;
        }
        th, td {
            padding: 10px;
        }
    }
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
    <th style="background-color: #4169E1; color: white; text-align: center;">#</th>
    <th style="background-color: #4169E1; color: white; text-align: center;">Name</th>
    <th style="background-color: #4169E1; color: white; text-align: center;">Email</th>
    <th style="background-color: #4169E1; color: white; text-align: center;">Contact</th>
    <th style="background-color: #4169E1; color: white; text-align: center;">Photo</th>
    <th style="background-color: #4169E1; color: white; text-align: center;">Action</th>
    </tr>
    <?php 
	  $sel="select * from tbl_mechanic where  workshopreg_id='".$_SESSION['workshop']."'";
	$res=$conn->query($sel);
	$i=0;
	while($row=$res->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row['mechanic_name'] ?></td>
      <td><?php echo $row['mechanic_email']?></td>
      <td><?php echo $row['mechanic_contact']?></td>
      <td><img src="../Assets/File/Mechanic/<?php echo $row['mechanic_photo']?>"  width="150" height="150"/></td>
       <td><a href="MechanicList.php?mid=<?php echo $row['mechanic_id']?>&wid=<?php echo $_GET['wid']?>">Assign</a> </td>
    </tr>
    <?php
	}
	?>
  </table>
</form>
</body>
</html>
<?php
include('Foot.php');
?>
