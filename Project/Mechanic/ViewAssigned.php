
<?php
include('../Assets/Connection/Connection.php');

 include('Head.php');
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
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
    <th style="background-color: #4169E1; color: white; text-align: center;">SINO</th>
      <th style="background-color: #4169E1; color: white; text-align: center;">Name</th>
            <th style="background-color: #4169E1; color: white; text-align: center;">Email</th>
            <th style="background-color: #4169E1; color: white; text-align: center;">Contact</th>
            <th style="background-color: #4169E1; color: white; text-align: center;">District</th>
            <th style="background-color: #4169E1; color: white; text-align: center;">Place</th>
            <th style="background-color: #4169E1; color: white; text-align: center;">Location</th>
            
    </tr>
    <?php
	$i=0;
	$sel="SELECT * 
FROM tbl_assignwork a 
INNER JOIN tbl_rereques r ON a.request_id = r.request_id
INNER JOIN tbl_newuser n ON r.user_id = n.user_id
INNER JOIN tbl_location l ON n.location_id = l.location_id
INNER JOIN tbl_place p ON l.place_id = p.place_id
INNER JOIN tbl_district d ON d.district_id = p.district_id
INNER JOIN tbl_workshopreg w ON w.workshopreg_id = r.workshop_id 
WHERE a.mechanic_id = '".$_SESSION['mechanic']."' 
  AND a.assignwork_status = 1";

	$row=$conn->query($sel);
	while($data=$row->fetch_assoc())
	{
		$i++;
		?>
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data['user_name']?></td>
      <td><?php echo $data['user_email']?></td>
      <td><?php echo $data['user_contact']?></td>
      <td><?php echo $data['location_name']?></td>
      <td><?php echo $data['place_name']?></td>
      <td><?php echo $data['district_name']?></td>
    </tr>
    <?php } ?>
  </table> 
</form>
</body>
</html>
<?php
include('foot.php')
?>