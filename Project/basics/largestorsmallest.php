<?php

if(isset($_POST["find"]))
$Number1=$_POST["num1"];
$Number2=$_POST["num2"];
$Number3=$_POST["num3"];
if($Number1>$Number2)
{
	if($Number1>$Number3)
	{
	$largest=$Number1;
}
else
{
   $largest	=$Number3;
}
}
if($Number2>$Number3)
{
	$largest=$Number2;
}
else
{
	$largest=$Number3;
	
}
if($Number1<$Number2)
{
	if($Number1<$Number3)
	{
	$smallest=$Number1;
}
else
{
   $smallest=$Number3;
}
}
if($Number2<$Number3)
{
	$smallest=$Number2;
}
else
{
	$smallest=$Number3;
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
  <table width="337" height="249" border="1">
    <tr>
      <td width="120">Number1</td>
      <td width="201"><label for="num1"></label>
      <input type="text" name="num1" id="num1" /></td>
    </tr>
    <tr>
      <td>Number2</td>
      <td><label for="num2"></label>
      <input type="text" name="num2" id="num2" /></td>
    </tr>
    <tr>
      <td>Number3</td>
      <td><label for="num3"></label>
      <input type="text" name="num3" id="num3" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="find" id="find" value="find" /></td>
    </tr>
    <tr>
      <td>Largest</td>
      <td><?php echo $largest ?></td>
    </tr>
    <tr>
      <td>Smallest</td>
      <td><?php echo $smallest ?></td>
    </tr>
  </table>
</form>
</body>
</html>