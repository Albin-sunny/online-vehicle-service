<?php
include("../Connection/Connection.php");
$selqry="select * from tbl_location where place_id IN(".$_GET["pid"].")";
$result=$conn->query($selqry);
while($row=$result->fetch_assoc())
{
	?>
        <li class="list-group-item">
            <div class="form-check">
                <label class="form-check-label">
                    <input onchange="productCheck()"  type="checkbox" class="form-check-input product_check" value="<?php echo $row["location_id"]; ?>" id="location"><?php echo $row["location_name"]; ?>
                </label>
            </div>
        </li>
    <?php 
}
?>