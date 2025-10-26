<?php
include('../Assets/Connection/Connection.php');
include("Head.php");
$eid=0;
$ename="";
if(isset($_POST['btn_submit']))
{
	$name=$_POST['txt_ComplaintType'];
	$eid=$_POST['txthidden'];
	$selqry="select * from tbl_Complainttype where Complainttype_name='".$name."'";
	$ro=$conn->query($selqry);
	if($da=$ro->fetch_assoc())
	{
		echo "<script>
		alert('Already exist');
		window.location='Complainttype';
		</script>";
	}
    else
    {
    if($Eid=0)
    	{
    	$upqry="update tbl_Complainttype set Complainttype_name='".$name."' where Complainttype_id='".$eid."'";
    if($conn->query($upqry))
	{
		echo "<script>
		alert('updated');
		window.location='Complainttype';
		</script>";
	}
}
else
{

    $ins="insert into tbl_Complainttype(Complainttype_name)value('".$name."')";
if($conn->query($ins))
	{
		echo "<script>
		alert('inserted' );
		window.location='Complainttype.php';
		</script>";
	   }
    }
  }
}
if(isset($_GET['id']))
{
	$del="delete from tbl_Complainttype where Complainttype_id=".$_GET['id'];
	if($conn->query($del))
	{
		echo "<script>
		alert('deleted'
		 );
		window.location='Complainttype.php';
		</script>";
	}
}
if(isset($_GET['Eid']))
{
$selqry="select * from tbl_Complainttype where  Complainttype_id=".$_GET['Eid'];
$r=$conn->query($selqry);
if($d=$r->fetch_assoc())
	{
		$eid=$d['Complainttype_id'];
        $ename=$d['Complainttype_name'];
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
<h1 align="center" style="color:#844fc1">Complaint Type</h1>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>ComplaintType</td>
      <td><label for="txt_Type"></label>
      <input type="hidden" name="txthidden" value="<?php echo $Eid?>"/>
      <input type="text" name="txt_ComplaintType" id="txt_Type" value="<?php echo $ename ?>"/> </td> 
    </tr>
    <tr>
      <td colspan="2"align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table> 
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  
  <table width="200" border="1">
    <tr>
      <td>Si no</td>
      <td>Type</td>
      <td>Action</td>
    </tr>
    <tr> 
	<?php
	$i=0;
	$sel="select * from tbl_Complainttype";
	$result=$conn->query($sel);  
	while($row=$result->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row['Complainttype_name']?></td>
<td><a href="Complainttype.php?id=<?php echo $row['Complainttype_id']?>">Delete</a>
    <a href="Complainttype.php?Eid=<?php echo $row['Complainttype_id']?>">  Edit</a> </td>
    </tr>
    <?php
	}
	?>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>
<?php
include("Foot.php");
?>
