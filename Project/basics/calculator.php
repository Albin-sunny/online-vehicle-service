<?php
$result="";
if(isset($_POST["plus"]))
{
	$Number1=$_POST["txtn1"];
	$Number2=$_POST["txtn2"];
	$result= $Number1+$Number2;
}
if(isset($_POST["min"]))
{
	$Number1=$_POST["txtn1"];
	$Number2=$_POST["txtn2"];
	$result= $Number1-$Number2;
}
if(isset($_POST["mul"]))
{
	$Number1=$_POST["txtn1"];
	$Number2=$_POST["txtn2"];
	$result= $Number1*$Number2;
}
if(isset($_POST["div"]))
{
	$Number1=$_POST["txtn1"];
	$Number2=$_POST["txtn2"];
	$result= $Number1/$Number2;
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
  <table width="491" height="219" border="1">
    <tr>
      <td width="99">Number 1</td>
      <td width="85"><label for="txtn1"></label>
      <input type="text" name="txtn1" id="txtn1" /></td>
    </tr>
    <tr>
      <td>Number 2</td>
      <td><label for="txtn2"></label>
      <input type="text" name="txtn2" id="txtn2" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="plus" id="plus" value="+" />     <input type="submit" name="min" id="min" value="-" />
      <input type="submit" name="mul" id="mul" value="*" />
      <input type="submit" name="div" id="div" value="/" /></td>
    </tr>
    <tr>
      <td>Result</td>
      <td><?php echo $result ?></td>
    </tr>
  </table>
</form>
</body>
</html>