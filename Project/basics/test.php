<?php
include('../Assets/Connection/Connection.php');
if(isset($_POST['btn_submit']))
{
    $Name = $_POST['txt_id'];
    $Place = $_POST['sel_place'];
	$Location=$_POST['sel_Location'];
    $Email = $_POST['txt_email'];
    $Contact = $_POST['txt_contact'];
    $Password = $_POST['txt_password'];
	$Address=$_POST['txt_Address'];
	$Workshoptype=$_POST['sel_Workshoptype'];
	
	
	$Proof=$_POST['image_Proof'];
		
	$Proof = $_FILES["image_Proof"]["name"];
	$path = $_FILES["image_Proof"]["tmp_name"];
    move_uploaded_file($path,"../Assets/File/Mechanic/".$Proof);
	
	$photo = $_FILES[""]["image_Photo"];
	$path = $_FILES["image_photo"]["tmp_name"];
    move_uploaded_file($path,"../Assets/File/Mechanic/".$photo);
    $ins = "INSERT INTO tbl_workshopreg (workshop_name, workshop_email,workshop_contact,workshop_address,workshop_password,workshoptype_id,	location_id,	workshop_photo,workshop_proof)VALUES ('".$Name."', '".$Email."', '".$Contact."', '".$Address."', '". $Password."','".$Workshoptype."','".$Location."','".$photo."','".$Proof."')";
			
 if($conn->query($ins))
    {
        echo "<script>
        alert('inserted');
        window.location='Newuser.php';
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
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1">
    <tr>
      <td>Name</td>
      <td><label for="txt_Name"></label>
      <input type="text" name="txt_Name" id="txt_Name" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_Email"></label>
      <input type="text" name="txt_Email" id="txt_Email" /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_Contact"></label>
      <input type="text" name="txt_Contact" id="txt_Contact" /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_Address"></label>
      <input type="text" name="txt_Address" id="txt_Address" /></td>
    </tr>
    <tr>
     <td>Password</td>
      <td><label for="txt_Password"></label>
      <input type="text" name="txt_Password" id="txt_Password" /></td>
    </tr>
       <tr>
      <td>Workshoptype</td>
      <td><label for="sel_Workshoptype"></label>
        <select name="sel_Workshoptype" id="sel_Workshoptype">
        <option>--select--</option>
         <?php
		$sel="select * from tbl_workshoptype";
		$r=$conn->query($sel);
		while($res=$r->fetch_assoc())
		{
			?>
            <option value="<?php echo $res['workshoptype_id']?>"><?php echo $res['workshoptype_name']?></option>
            <?php
		}
		?>
         

      </select></td>
    </tr>
    <tr>
      <td>District</td>
      <td><label for="sel_District"></label>
        <select name="sel_District" id="sel_District" onchange="getPlace(this.value)">
         <option>--select--</option>
      <?php
$sel="select * from tbl_district";
$r=$conn->query($sel);
while($res=$r->fetch_assoc())
{
	?>
	<option value="<?php echo $res['district_id']?>">
	<?php echo $res['district_name']?></option>
    <?php
}

?>
      </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="sel_Place"></label>
        <select name="sel_Place" id="sel_Place" onchange="getLocation(this.value)">
        <option>--select--</option>
      </select></td>
    </tr>
    <tr>
      <td> Location</td>
      <td><label for="sel_Location"></label>
        <select name="sel_Location" id="sel_Location" >
         <option>--select--</option>
      </select></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="image_Photo"></label>
      <input type="file" name="image_Photo" id="image_Photo" /></td>
    </tr>
    <tr>
      <td>Proof</td>
      <td><label for="image_Proof"></label>
      <input type="file" name="image_Proof" id="image_Proof" /></td>
    </tr>
    <tr>
      <td colspan="2"align="center"><input type="submit" name="btn_Submit" id="btn_Submit" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getPlace(did) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
      success: function (result) {

        $("#sel_Place").html(result);
      }
    });
  }
	function getLocation(pid) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxLocation.php?pid=" + pid,
      success: function (result) {

        $("#sel_Location").html(result);
      }
	});
	}
	</script>
    