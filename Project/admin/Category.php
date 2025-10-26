<?php
include('../Assets/Connection/Connection.php');
	if(isset($_POST['btnals']))
  		{
         $name=$_POST['txtcategory'];
		 $ins="insert into tbl_cat(cat_name)values('".$name."')";
		 if($conn->query($ins))
		 	{
			echo "<script>
		alert('inserted'
		 );
		window.location='Category.php';
		</script>";
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
  <table width="373" border="1">
    <tr>
      <td width="142">Category name</td>
      <td width="215"><label for="txtcategory"></label>
      <input type="text" name="txtcategory" "txtcategory" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnals" id="btnals" value="Submit" />
        
      <input type="submit" name="txtaaa" id="txtaaa" value="cancel" /></td>
    </tr>
  </table><br /><br />
  <table width="200" border="1">
    <tr>
      <td>si no</td>
      <td>category name</td>
      <td>action</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>