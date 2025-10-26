<?php
include('../Assets/Connection/Connection.php');
include("Head.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h1 align="center" style="color:#844fc1">View Complaint</h1>
<form id="form1" name="form1" method="post" action="">
  <table width="650" height="350" border="1">
    <tr>
    <th style="background-color: #4169E1; color: white; text-align: center;">Si no</th>
    <th style="background-color: #4169E1; color: white; text-align: center;">User</th>
    <th style="background-color: #4169E1; color: white; text-align: center;">Title</th>
    <th style="background-color: #4169E1; color: white; text-align: center;">Content</th>
    <th style="background-color: #4169E1; color: white; text-align: center;">Date</th>
    <th style="background-color: #4169E1; color: white; text-align: center;">Action</th>
    </tr>
    <tr>
        <?php
	 $i=0;
	//  include('../Assets/Connection/Connection.php');
    
     $sel="select * from tbl_complaint c inner join tbl_newuser u on c.user_id=u.user_id";
	 $res=$conn->query($sel);
	 while($row=$res->fetch_assoc())
	 	{
			$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row['user_name']?></td>
       <td><?php echo $row['complaint_title']?></td>
      <td><?php echo $row['complaint_content']?></td>
      <td><?php echo $row['complaint_date']?></td>
      <td><a href="Reply.php?rid=<?php echo $row['complaint_id']?>">Reply</a></td>
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