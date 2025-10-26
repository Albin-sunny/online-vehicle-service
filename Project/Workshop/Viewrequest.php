<?php
include('../Assets/Connection/Connection.php');
 
 include('Head.php');
 
	
  if(isset($_GET['aid']))
 {
	$updt="update tbl_rereques set request_status='1' where request_id ='".$_GET['aid']."'";
	if($conn->query($updt))
	{
		?>
        <script>
		alert("Accepted");
		window.location="Viewrequest.php";
		</script>
        <?php
	}
 }
 if(isset($_GET['rid']))
 {
 $updt="update tbl_rereques set request_status='2' where request_id ='".$_GET['rid']."'";
	if($conn->query($updt))
	{
		?>
        <script>
		alert("Rejected");
		window.location="Viewworkshop.php";
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
        width: 50%; /* Adjust width as needed */
        border-collapse: collapse;
        margin: 20px auto; /* Center the table */
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    th, td {
        padding: 10px;
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
<table width="569" border="1">
  <tr>
  <th style="background-color: #4169E1; color: white; text-align: center;">SI no</th>
  <th style="background-color: #4169E1; color: white; text-align: center;">User</th>
  <th style="background-color: #4169E1; color: white; text-align: center;">Contact</th>
  <th style="background-color: #4169E1; color: white; text-align: center;">district</th>
  <th style="background-color: #4169E1; color: white; text-align: center;">Place</th>
  <th style="background-color: #4169E1; color: white; text-align: center;">Location</th>
  <th style="background-color: #4169E1; color: white; text-align: center;">Vehicle type</th>
  <th style="background-color: #4169E1; color: white; text-align: center;">Complaint</th>
  <th style="background-color: #4169E1; color: white; text-align: center;">Details</th>
  <th style="background-color: #4169E1; color: white; text-align: center;">Action</th>
  </tr>
  <?php
	$i=0;
	 $select = "
    SELECT * FROM tbl_rereques r
    INNER JOIN tbl_newuser n ON r.user_id = n.user_id
    INNER JOIN tbl_location l ON n.location_id = l.location_id
    INNER JOIN tbl_place p ON l.place_id = p.place_id
    INNER JOIN tbl_district d ON p.district_id = d.district_id
    INNER JOIN tbl_vechicletype v ON r.vehicletype_id = v.vehicletype_id
    INNER JOIN tbl_complainttype c ON r.Complainttype_id = c.Complainttype_id
    INNER JOIN tbl_workshopreg w ON r.workshop_id = w.workshopreg_id
    WHERE w.workshopreg_id='".$_SESSION['workshop']."'  ";	  
	  
$row=$conn->query($select);

	while($result=$row->fetch_assoc())
	{
		$i++;
		?>
  <tr>
    <td><?php echo $i?></td>
    <td><?Php echo $result['user_name']?></td>
    <td><?Php echo $result['user_contact']?></td>
    <td><?Php echo $result['district_name']?></td>
    <td><?Php echo $result['place_name']?></td>
    <td><?Php echo $result['location_name']?></td>
    <td><?Php echo $result['vehicletype_name']?></td>
    <td><?Php echo $result['Complainttype_name']?></td>
    <td><?Php echo $result['request_details']?></td>
    <td><?php 
	if($result['request_status']==0)
	{
		?>
        <a href="Viewrequest.php?aid=<?php echo $result['request_id']?>">accept</a>
      <a href="Viewrequest.php?rid=<?php echo $result['request_id']?>">reject</a>
        <?php
	}
	else if($result['request_status']==1)
	{
		echo "Request Accepted";
		?>
        <a href="MechanicList.php?wid=<?php echo $result['request_id']?>">Assign Mechanic</a>
        <?php
	}
	else if($result['request_status']==3)
	{
		echo "Assigned";
    
    
	}
  else if($result['request_status']==4)
	{
    echo "Work Started";
  }
  else if($result['request_status']==5)
	{
    echo "Work Ended";
  }
  else if($result['request_status']==6)
	{
    echo "Delivered";
    ?>
    <a href="AddBill.php?bid=<?php echo $result['request_id']?>">AddBill</a>
    <?php
  }
	else
	{
		echo "Rejected";
	}
	?>
    </td>
    <?php
	}
	?>
  </tr>
</table>
</form>
</body>
</html>
<?php
include('Foot.php');
?>