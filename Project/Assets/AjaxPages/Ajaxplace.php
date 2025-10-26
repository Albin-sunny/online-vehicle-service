
<option value="">--select--</option>
<?php
include('../Connection/Connection.php');

echo $sel = "select * from tbl_place where district_id = '".$_GET['did']."'";
$r = $conn->query($sel);
while($res = $r->fetch_assoc())
{
    ?>
    <option value="<?php echo $res['place_id']?>"><?php echo $res['place_name'] ?></option>
    <?php
}
?>
