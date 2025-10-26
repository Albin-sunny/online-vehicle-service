<?php
include('../Assets/Connection/Connection.php');
include("Head.php");
if(isset ($_GET['Aid']))
{
 $update="update tbl_workshopreg set workshopreg_status='1' where workshopreg_id='".$_GET['Aid']."'";
 if($conn->query($update))
	{
		?>
        <script>
		alert('Accepted');
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
<h1 align="center" style="color:#844fc1">Reject List</h1>
<form id="form1" name="form1" method="post" action="">
  
<table width="200" border="1">
    <tr>
    <th style="background-color: #4169E1; color: white; text-align: center;">Si no</td>
    <th style="background-color: #4169E1; color: white; text-align: center;">Workshop name</td>
    <th style="background-color: #4169E1; color: white; text-align: center;">Contact</td>
    <th style="background-color: #4169E1; color: white; text-align: center;">Address</td>
    <th style="background-color: #4169E1; color: white; text-align: center;">District</td>
    <th style="background-color: #4169E1; color: white; text-align: center;">Place</td>
    <th style="background-color: #4169E1; color: white; text-align: center;">Location</td>
    <th style="background-color: #4169E1; color: white; text-align: center;">photo</td>
    <th style="background-color: #4169E1; color: white; text-align: center;">Action</td>
    </tr>
    <?php
	$i=0;
	$sel="select * from tbl_workshopreg w  inner join tbl_location l on w.location_id=l.location_id inner join tbl_place p on l.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id where workshopreg_status='2'";
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
      <a href="Rejectlist.php?Aid=<?php echo $result['workshopreg_id']?>">accept</a>
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
