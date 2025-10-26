<?php
	
	$Gender="";
	$Department="";
	$Mark1="";
	$Mark2="";
	$Mark3="";
	$Grade="";
	$name="";
	$percentage="";
	$total="";
	if(isset($_POST["btn_submit"]))
	{
			$Firstname=$_POST["txt_name"];
			$lastname=$_POST["txt_lname"];
			$Gender=$_POST["radio"];
			$Department=$_POST["sel_dept"];
			$Mark1=$_POST["txt_mark1"];
			$Mark2=$_POST["txt_mark2"];
			$Mark3=$_POST["txt_mark3"];
			$total=$Mark1+$Mark2+$Mark3;
			$percentage=($total/300)*100;

			if($Gender=="male")
			{
				$name="mr. " .$Firstname." ".$lastname;
			} 
			else 
			{
    		 $name="mrs .".$Firstname." ".$lastname;
			}
			if($percentage>90)
			{
				$Grade="A+";
			}
			else if($percentage>80)
			{
				$Grade="A";
			}
			else if($percentage>70)
			{
				$Grade="b+";
			}
			else if($percentage>60)
			{
				$Grade="b";
			}
			else if($percentage>50)
			{
				$Grade="c+";
			}
			else if($percentage>40)
			{
			$Grade="c";
			}
			else if($percentage>30)
			{
				$Grade="d+";
			}
			else if($percentage>20)
			{
				$Grade="d";
			}
			else
			{
				$Grade="fail";
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
  <table width="315" border="1">
    <tr>
      <td>first name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_fname" /></td>
    </tr>
    <tr>
      <td>last name</td>
      <td><label for="txt_lname"></label>
      <input type="text" name="txt_lname" id="txt_lname" /></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><input type="radio" name="radio" id="radio1" value="male" />Male
      <label for="radio"></label>
      <input type="radio" name="radio" id="radio2" value="female" />Female
      <label for="radio"></label></td>
    </tr>
    <tr>
      <td>department</td>
      <td><label for="sel_dept"></label>
        <select name="sel_dept" id="select"><option>--select--</option>
        <option value="cs">computer science</option>
         <option value="eng">literature</option>
          <option value="psy">psycology</option>
           <option value="bsw">social study</option>
      </select></td>
    </tr>
    <tr>
      <td>mark 1</td>
      <td><label for="txt_mark1"></label>
      <input type="text" name="txt_mark1" id="txt_mark1" /></td>
    </tr>
    <tr>
      <td>mark 2</td>
      <td><label for="txt_mark2"></label>
      <input type="text" name="txt_mark2" id="txt_mark2" /></td>
    </tr>
    <tr>
      <td>mark 3</td>
      <td><label for="txt_mark3"></label>
      <input type="text" name="txt_mark3" id="txt_mark3" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="cancel" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="200" border="1">
    <tr>
      <td>Name:</td>
      <td><?php echo $name ?></td>
    </tr>
    <tr>
      <td>Gender:</td>
      <td><?php echo $Gender ?></td>
    </tr>
    <tr>
      <td>Department:</td>
      <td><?php echo $Department ?></td>
    </tr>
    <tr>
      <td>Total mark:</td>
      <td><?php echo $total ?></td>
    </tr>
    <tr>
      <td>Percentage</td>
      <td><?php echo $percentage?></td>
    </tr>
    <tr>
      <td>Grade:</td>
      <td><?php echo $Grade ?></td>
    </tr>
  </table>
</form>
</body>
</html>
