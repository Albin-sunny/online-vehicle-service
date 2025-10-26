<?php
include('../Assets/Connection/Connection.php');
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
<form id="form1" name="form1" method="post" action="">
  
<table width="569" border="1">
  <tr>
    <td width="22">SI no</td>
    <td width="37">User</td>
    <td width="60">Contact</td>
    <td width="60">district</td>
    <td width="44">Place</td>
    <td width="69">Location</td>
    <td width="66">Vehicle type</td>
    <td width="82">Complaint</td>
    <td width="82">status</td>
    <td width="137">Action</td>
  </tr>
  <?php
	$i=0;
$select="select * from tbl_rereques r inner join tbl_newuser u on r.user_id =u.user_id inner join tbl_location l on u.location_id=l.location_id
 inner join tbl_place p on l.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id inner join tbl_vechicletype v on r.vehicletype_id=v.vehicletype_id inner join tbl_complainttype m on r.Complainttype_id=m.Complainttype_id inner join tbl_workshopreg g on r.workshop_id=g.workshopreg_id";
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
     <td>
         <?php 
		 if($result['request_status']=='1') 
		 {
			 echo "accepted";
		 }
		 else
	     {
			 echo " Not accepted";
		 }
		 ?>
     </td>
    <td>
      <a href="Waccept.php?Aid=<?php echo $result['workshopreg_id']?>">accept</a>
      <a href="Waccept.php?Rid=<?php echo $result['workshopreg_id']?>">reject</a></td>
  </tr>
   <?php
	}
	?>
</table>
<body>
</body>
</html>