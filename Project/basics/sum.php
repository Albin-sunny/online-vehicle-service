<?php
$result="";
if(isset($_POST["btnsum"]))
{
	$NUMBER1=$_POST["txtnum1"];
	$NUMBER2=$_POST["txtnum2"];
	$result=$NUMBER1+$NUMBER2;	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Addtwonum</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="353" height="158" border="1">
    <tr>
      <td width="108">NUMBER1</td>
      <td width="76"><label for="txtnum1"></label>
      <input type="text" name="txtnum1" id="txtnum1" /></td>
    </tr>
    <tr>
      <td>NUMBER2</td>
      <td><label for="txtnum2"></label>
      <input type="text" name="txtnum2" id="txtnum2" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsum" id="btnsum" value="SUM" /></td>
    </tr>
    <tr>
      <td>RESULT</td>
      <td><?php echo $result ?></td>
    </tr>
  </table>
</form>


</body>
</html>