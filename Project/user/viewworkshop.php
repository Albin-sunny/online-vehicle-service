
<?php
include('../Assets/Connection/Connection.php');
 
 include('Head.php');
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Workshop</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">

<table width="200" border="1">
    <tr>
      <td>Si no</td>
      <td>Workshop name</td>
      <td>Contact</td>
      <td>Address</td>
      <td>District</td>
      <td>Place</td>
      <td>Location</td>
      <td>photo</td>
      <td>Action</td>
    </tr>
    <?php
	$i=0;
	$sel="select * from tbl_workshopreg w  inner join tbl_location l on w.location_id=l.location_id inner join tbl_place p on l.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id ";
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
      <td><a href="Request.php?id=<?php echo $result['workshopreg_id']?>">Request</a></td>
    </tr>
    <?php 
	}
	?>
  </table>
  </form>
  <?php
include('Foot.php');
?>