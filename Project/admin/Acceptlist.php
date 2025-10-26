<?php
include('../Assets/Connection/Connection.php');
include("Head.php");
if(isset ($_GET['Rid']))
{
 $update="update tbl_workshopreg set workshopreg_status='2' where workshopreg_id='".$_GET['Rid']."'";
 if($conn->query($update))
	{
		?>
        <script>
		alert('rejected');
		window.location='Acceptlist.php';
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
</head>

<body>
<h1 align="center" style="color:#844fc1">Accept List</h1>
<form id="form1" name="form1" method="post" action="">
  
<table width="200" border="1">
    <tr>
    <th style="background-color: #4169E1; color: white; text-align: center;">Si no</th>
    <th style="background-color: #4169E1; color: white; text-align: center;">Workshop name</th>
    <th style="background-color: #4169E1; color: white; text-align: center;">Contact</th>
    <th style="background-color: #4169E1; color: white; text-align: center;">Address</th>
    <th style="background-color: #4169E1; color: white; text-align: center;">District</th>
    <th style="background-color: #4169E1; color: white; text-align: center;">Place</th>
    <th style="background-color: #4169E1; color: white; text-align: center;">Location</th>
    <th style="background-color: #4169E1; color: white; text-align: center;">photo</th>
    <th style="background-color: #4169E1; color: white; text-align: center;">Action</th>
    </tr>
    <?php
	$i=0;
	$sel="select * from tbl_workshopreg w  inner join tbl_location l on w.location_id=l.location_id inner join tbl_place p on l.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id where workshopreg_status='1'";
$row=$conn->query($sel);
    while ($result=$row->fetch_assoc())
	{
		$i++;
	?>
     <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $result['workshopreg_name'] ?></td>
      <td><?php echo $result['workshopreg_contact'] ?></td>
      <td><?php echo $result['workshopreg_address'] ?></td>
      <td><?php echo $result['district_name'] ?></td>
      <td><?php echo $result['place_name'] ?></td>
      <td><?php echo $result['location_name'] ?></td>
      <td><img src="../Assets/File/Workshop/<?php echo $result['workshopreg_photo']?>" width="50px" height="80px"/></td>
      <td>
      
      <a href="Acceptlist.php?Rid=<?php echo $result['workshopreg_id']?>">reject</a>
      </td>
      
    </tr>
    <?php 
	}
	?>
  </table>
  </form>

</body>
</html>
<?php
include("Foot.php");
?>