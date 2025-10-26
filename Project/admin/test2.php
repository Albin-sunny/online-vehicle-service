<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table border="1" align="center">
    <tr>
      <td>Sl No</td>
      <td>User</td>
      <td>Title</td>
      <td>Content</td>
      <td>Date</td>
      <td>Action</td>
    </tr>
    <?php
	 $i=0;
	 include('../Assests/Connection/Connection.php');
     session_start();
     $sel="select * from tbl_complaint c inner join tbl_user u on c.user_id=u.user_id";
	 $res=$conn->query($sel);
	 while($row=$res->fetch_assoc())
	 	{
			$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row['user_name']?></td>
       <td><?php echo $row['complaint_titles']?></td>
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
