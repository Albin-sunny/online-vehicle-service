<?php
include('../Assets/Connection/Connection.php');

 include('Head.php');
  
 
 if(isset($_GET['oid']))
 {
	$up="update tbl_rereques set request_status='".$_GET['sts']."' where request_id=".$_GET['oid'];
	if($conn->query($up))
	{
       echo" <script>
		alert('Updated..');
		window.location='MyWorks.php';
		</script>";
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

        .profile-card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 600px; /* Adjusted width */
            transition: transform 0.3s ease;
        }

        .profile-card:hover {
            transform: translateY(-5px);
        }

        .profile-header {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
            text-align: center;
            padding: 30px 20px;
        }

        .profile-header img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            margin-bottom: 15px;
        }

        .profile-name {
            font-size: 24px;
            font-weight: bold;
            margin: 10px 0 5px;
        }

        .profile-info {
            padding: 20px;
        }

        table {
            width: 50%;
            margin: 20px auto; /* Center the table */
            border-collapse: collapse;
            border-radius: 12px; /* Rounds the table corners */
    overflow: hidden; /* Ensures corners are clipped */
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
            cursor: pointer;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tr:hover {
            background-color: #C0C0C0; /* Silver Grey for hover */
            color: black;
        }

        tr.selected {
            background-color: #C0C0C0; /* Silver Grey for selected rows */
        }

        .profile-actions {
            background-color: #f9f9f9;
            padding: 20px;
            text-align: center;
        }

        .profile-actions a {
            display: inline-block;
            padding: 10px 20px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            margin: 0 10px;
        }

        .profile-actions a:nth-child(1) {
            background-color: #01796F; /* Pine Green */
        }

        .profile-actions a:nth-child(1):hover {
            background-color: #016B61;
        }

        .profile-actions a:nth-child(2) {
            background-color: #4169E1; /* Royal Blue */
        }

        .profile-actions a:nth-child(2):hover {
            background-color: #355ACD;
        }
    </style>
    <script>
        // Function to toggle row selection
        function toggleRowSelection(row) {
            var rows = document.querySelectorAll("tr");
            rows.forEach(function(r) {
                r.classList.remove('selected');
            });
            row.classList.add('selected');
        }
    </script>

</head>

<body>
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
   $select=" select * from tbl_assignwork a inner join  tbl_rereques r  on a.request_id=r.request_id inner join tbl_newuser n on r.user_id=n.user_id inner join tbl_location  l on n.location_id=l.location_id inner join tbl_place p on l.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id inner join tbl_vechicletype v on r.vehicletype_id =v.vehicletype_id inner join tbl_complainttype c on r.Complainttype_id=c.Complainttype_id inner join tbl_workshopreg w on r.workshop_id=w.workshopreg_id  where a.mechanic_id=".$_SESSION['mechanic'];
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
    <td><?php echo $result['request_details']?></td>
   
    <td><?php 
	if($result['assignwork_status']==0)
	{
		?>
        <a href="MyWorks.php?oid=<?php echo $result['assignwork_id']?>&sts=1">On the Way</a>
        <?php
	}
	else if($result['assignwork_status']==1 &&  $result['request_status']==3)
	{
		?>
        <a href="MyWorks.php?oid=<?php echo $result['request_id']?>&sts=4 ">Work Started</a>

        <?php
	}
	else if($result['assignwork_status']==1 &&  $result['request_status']==4)
	{
		?>
        <a href="MyWorks.php?oid=<?php echo $result['request_id']?>&sts=5">Work Completed</a>
        <?php
	}
	else if($result['assignwork_status']==1 &&  $result['request_status']==5)
	{
		?>
        <a href="MyWorks.php?oid=<?php echo $result['request_id']?>&sts=6">Work Ended</a>
        <?php
	}
  else if($result['assignwork_status']==1 &&  $result['request_status']==6)
	{
		echo "Delivered";
	}
	?></td>
    <?php
	}
	?>
  </tr>
</table>
</body>
</html>
<?php
include('Foot.php');
?>