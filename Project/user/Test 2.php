<?php
include('../Assets/Connection/Connection.php');
 session_start();
 include('Head.php');
 
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Myrequest</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>slno</td>
      <td>Workshop</td>
      <td>Contact</td>
      <td>Complaint</td>
      <td>Work status</td>
      <th>Work </th>
    </tr>
    <?php
	$i=0;
	$sel = "SELECT * FROM tbl_rereques c
        INNER JOIN tbl_workshopreg w ON c.workshop_id=w.workshopreg_id
        INNER JOIN tbl_complainttype m ON c.complainttype_id=m.complainttype_id where user_id='".$_SESSION['userid']."'";
	$row=$conn->query($sel);
	while($result=$row->fetch_assoc())
	{
		$i++;
		?>
		
    <tr>
      <td><?php echo $i?></td>
      <td><?Php echo $result['workshopreg_name']?></td>
      <td><?Php echo $result['workshopreg_contact']?></td>
      <td><?Php echo $result['Complainttype_name']?></td>
      <td>
      <?php
	  if($result['request_status']==0)
	  {
		  echo "Not finished";
	  }
	  else if($result['request_status']==1)	
	  {
		  echo " finished";
	  }
	  else if($result['request_status']==3)
	  {
		  ?>
          </td>
          <td>
          <a href="viewmechanic.php?mid=<?php echo $result['request_id']?>">View Mechanic</a>
          <a href="viewmechanic.php?id=<?php echo $result['review_id']?>">View review</a></td>
          
          
          
  
          <?php
	  }
	  else
	  {
	   }
	  ?>
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
include('Foot.php');
?>