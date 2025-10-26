
<?php
include('../Assets/Connection/Connection.php');
include("Head.php");
$eid=0;
$ename="";
if(isset($_POST['btn_submit']))
{
	$name=$_POST['txt_Type'];
	$eid=$_POST['txthidden'];
	
    if($eid!=0)
    	{
    	$upqry="update tbl_vechicletype set vehicletype_name='".$name."' where vehicletype_id='".$eid."'";
    if($conn->query($upqry))
	{
		echo "<script>
		alert('updated');
		window.location='vechicletype.php';
		</script>";
	}
		}
	else if($eid==0)
	{
	
		$ins="insert into tbl_vechicletype(vehicletype_name)value('".$name."')";
	if($conn->query($ins))
		{
			echo "<script>
			alert('inserted' );
			window.location='vechicletype.php   ';
			</script>";
		   }
		}
	  else
	  {
		  echo "<script>
			alert('edit failed' );
			window.location='vechicletype.php';
			</script>";
	  }
	}
if(isset($_GET['id']))
{
	$del="delete from tbl_vechicletype where vehicletype_id=".$_GET['id'];
	if($conn->query($del))
	{
		echo "<script>
		alert('deleted'
		 );
		window.location='vechicletype.php';
		</script>";
	}
}
if(isset($_GET['Eid']))
{
$selqry="select * from tbl_vechicletype where  vehicletype_id=".$_GET['Eid'];
$r=$conn->query($selqry);
if($d=$r->fetch_assoc())
	{
		$eid=$d['vehicletype_id'];
        $ename=$d['vehicletype_name'];
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
<h1 align="center" style="color:#844fc1">Vehicle Type</h1>
<form id="form1" name="form1" method="post" action="">
  <table  width="500" height="320"border="1">
    <tr>
      <td>Type</td>
      <td><label for="txt_Type"></label>
      <input type="hidden" name="txthidden" value="<?php echo $eid?>"/>
      <input type="text" name="txt_Type" id="txt_Type" value="<?php echo $ename ?>" 
	  required maxlength="50" pattern="[A-Z][A-Za-z\s]*" 
       title="First letter must be capital, only letters and spaces are allowed."/>

	 
    </tr>
    <tr>
      <td colspan="2"align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table  width="600" height="320"border="1">
    <tr>
	<th style="background-color: #4169E1; color: white; text-align: center;">SI no</th>
	<th style="background-color: #4169E1; color: white; text-align: center;">Type</th>
	<th style="background-color: #4169E1; color: white; text-align: center;">Action</th>
    </tr>
   <?php
	$i=0;
	$sel="select * from tbl_vechicletype";
	$result=$conn->query($sel);  
	while($row=$result->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row['vehicletype_name']?></td>
      <td><a href="Vechicletype.php?id=<?php echo $row['vehicletype_id']?>">Delete</a>
    <a href="Vechicletype.php?Eid=<?php echo $row['vehicletype_id']?>">Edit</a>
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
<?php
include("Foot.php");
?>
