<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
if(isset($_POST['btn_submit']))
{
	$name=$_POST['txt_location'];
	$place=$_POST['sel_place'];
	$ins="insert into tbl_location(location_name,place_id)values('".$name."','".$place."')";
	if($conn->query($ins))
	{
	echo "<script>
		alert('inserted');
		window.location='location.php';
		</script>";



		
	}
}
if (isset($_GET['id'])) {
    $del = "DELETE FROM tbl_location WHERE location_id=" . $_GET['id'];
    if ($conn->query($del)) {
        echo "<script>
        alert('Deleted successfully');
        window.location='location.php';
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
<h1 align="center" style="color:#844fc1">Location</h1>
<form id="form1" name="form1" method="post" action="">
  <table  border="1">
     <tr>
      <td>District</td>
      <td><label for="txt_District"></label>
        <select name="sel_District" id="sel_District" onchange="getPlace(this.value)" required>
        <option value="">--select--</option>
      <?php
$sel="select * from tbl_district";
$r=$conn->query($sel);
while($res=$r->fetch_assoc())
{
	?>
	<option value="<?php echo $res['district_id']?>"><?php echo $res['district_name']?></option>
    <?php
}

?>
      </select></td>
    </tr>
    <tr>
      <td >place</td>
      <td ><label for="sel_place"></label>
        <select name="sel_place" id="sel_place" required>
         <option value="">--select--</option>
        
     </select> </td>`
    </tr>
    <tr>
      <td>location name</td>
      <td><label for="txt_location"></label>
      <input type="text" name="txt_location" id="txt_location" required pattern="^[A-Z]+[a-zA-Z ]*$" title="Name allows only alphabets, spaces, and must start with a capital letter" /></td>
    </tr>
    <tr>
      <td colspan="2"align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit"   />
        
      <input type="submit" name="btn_cancel" id="btn_cancel" value="cancel" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="200" border="1">
   
       <tr>
       <th style="background-color: #4169E1; color: white; text-align: center;">SI No</th>
       <th style="background-color: #4169E1; color: white; text-align: center;">District</th>
       <th style="background-color: #4169E1; color: white; text-align: center;">Place Name</th>
       <th style="background-color: #4169E1; color: white; text-align: center;">Location Name</th>
       <th style="background-color: #4169E1; color: white; text-align: center;">Action</th>
        </tr>
   
   
             <?php
        $i = 0;
        $selQry = "SELECT * FROM tbl_location l INNER JOIN tbl_place p ON p.place_id  = l.place_id  inner join  tbl_district d on d.district_id=p.district_id ";
        $result = $conn->query($selQry);
        while ($row = $result->fetch_assoc()) {
            $i++;
            ?>
             <tr>
             <td><?php echo $i?></td>
            <td><?php echo $row['district_name']?></td>
            <td><?php echo $row['place_name']?></td>
            <td><?php echo $row['location_name']?></td>
            <td>
			<a href="location.php?id=<?php echo $row['location_id']?>">Delete</a></td>
           

    </tr>
    <?php } ?>
  </table>
  <p>&nbsp;</p>
  
</form>
</body>
</html>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getPlace(did) {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
                success: function (result) {
                    $("#sel_place").html(result);
                }
            });
        }
</script>
<?php
include("Foot.php");
?>