<?php
include('../Assets/Connection/Connection.php');
include("Head.php");
$eid=0;
$ename="";
if(isset($_POST['btn_Submit']))
{
	$name=$_POST['txt_Workshop'];
	$eid=$_POST['txthidden'];
	
    if($eid!=0)
    	{
    	$upqry="update tbl_Workshoptype set workshoptype_name='".$name."' where Workshoptype_id='".$eid."'";
    if($conn->query($upqry))
	{
		echo "<script>
		alert('updated');
		window.location='Workshoptype.php';
		</script>";
	}
		}
	else if($eid==0)
	{
	
		$ins="insert into tbl_Workshoptype(workshoptype_name)value('".$name."')";
	if($conn->query($ins))
		{
			echo "<script>
			alert('inserted' );
			window.location='Workshoptype.php';
			</script>";
		   }
		}
	  else
	  {
		  echo "<script>
			alert('edit failed' );
			window.location='Workshoptype.php';
			</script>";
	  }
	}
if(isset($_GET['id']))
{
$del="delete from tbl_Workshoptype where Workshoptype_id=".$_GET['id'];
	if($conn->query($del))
	{
		echo "<script>
		alert('deleted'
		 );
		window.location='Workshoptype.php';
		</script>";
	}
}
if(isset($_GET['Eid']))
{
$selqry="select * from tbl_Workshoptype where  workshoptype_id=".$_GET['Eid'];
$r=$conn->query($selqry);
if($d=$r->fetch_assoc())
	{
		$eid=$d['workshoptype_id'];
        $ename=$d['workshoptype_name'];
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
<h1 align="center" style="color:#844fc1">Workshop Type</h1>
<form id="form1" name="form1" method="post" action="">
  <table width="700" border="1">
    <tr>
      <td>Workshop Type</td>
      <td><label for="txt_Workshop"></label>
      <input type="hidden" name="txthidden" value="<?php echo $eid?>"/>
      <input type="text" name="txt_Workshop" id="txt_Workshop" value="<?php echo $ename ?>" 
       required maxlength="50" pattern="[A-Z][A-Za-z\s]*" 
       title="First letter must be capital, only letters and spaces are allowed."/>

    </tr>
    <tr>
      <td colspan="2"align="center"><input type="submit" name="btn_Submit" id="btn_Submit" value="Submit" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="500" border="1">
    <tr>
	<th style="background-color: #4169E1; color: white; text-align: center;">SI no</th>
	<th style="background-color: #4169E1; color: white; text-align: center;">Workshop Type</th>
	<th style="background-color: #4169E1; color: white; text-align: center;">Action</th>
    </tr>
     <?php
	$i=0;
	$sel="select * from tbl_Workshoptype";
	$result=$conn->query($sel);  
	while($row=$result->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row['workshoptype_name']?></td>
      <td><a href="Workshoptype.php?id=<?php echo $row['workshoptype_id']?>">Delete</a>
    <a href="Workshoptype.php?Eid=<?php echo $row['workshoptype_id']?>">Edit</a>
     </td>
    </tr>
    <?php
	}
	?>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>
