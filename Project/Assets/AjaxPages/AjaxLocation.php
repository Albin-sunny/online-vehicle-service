<option>---select---</option>
<?php
include('../Connection/Connection.php');

echo $sel = "select * from tbl_location where place_id = '".$_GET['pid']."'";
$r = $conn->query($sel);
while($res = $r->fetch_assoc())
{
    ?>
    <option value="<?php echo $res['location_id']?>"><?php echo $res['location_name'] ?></option>
    <?php
}
?>
