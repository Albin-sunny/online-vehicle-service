<?php
include('../Assets/Connection/Connection.php');
include("Head.php");
$eid = 0; // For editing
$ename = ""; // For place name
$district = ""; // For district id

if (isset($_POST['btnsubmit'])) {
    $name = trim($_POST['txt_place']); // Trim spaces
    $district = $_POST['sel_district'];
    $eid = $_POST['txthidden']; // Get hidden field value

    // Server-side validation for Place Name
    if (empty($name) || !preg_match("/^[A-Z][a-zA-Z ]*$/", $name)) {
        echo "<script>
        alert('Please enter a valid place name. It should start with a capital letter and contain only letters and spaces.');
        window.location='place.php';
        </script>";
        exit; // Stop execution if validation fails
    }

    if (empty($district)) {
        echo "<script>
        alert('Please select a district.');
        window.location='place.php';
        </script>";
        exit; // Stop execution if validation fails
    }

    // Capitalize the first letter of each word in the place name
    $name = ucwords(strtolower($name)); // Ensures the first letter of each word is capitalized

    // Check if place already exists
    $selqry = "SELECT * FROM tbl_place WHERE place_name='" . $name . "'";
    $ro = $conn->query($selqry);

    if ($da = $ro->fetch_assoc()) {
        echo "<script>
        alert('Already exists');
        window.location='place.php';
        </script>";
    } else {
        if ($eid != 0) { // Update case
            $upqry = "UPDATE tbl_place SET place_name='" . $name . "', district_id='" . $district . "' WHERE place_id='" . $eid . "'";
            if ($conn->query($upqry)) {
                echo "<script>
                alert('Updated successfully');
                window.location='place.php';
                </script>";
            }
        } else { // Insert case
            $ins = "INSERT INTO tbl_place(place_name, district_id) VALUES('" . $name . "', '" . $district . "')";
            if ($conn->query($ins)) {
                echo "<script>
                alert('Inserted successfully');
                window.location='place.php';
                </script>";
            }
        }
    }
}

// Delete functionality
if (isset($_GET['id'])) {
    $del = "DELETE FROM tbl_place WHERE place_id=" . $_GET['id'];
    if ($conn->query($del)) {
        echo "<script>
        alert('Deleted successfully');
        window.location='place.php';
        </script>";
    }
}

// Edit functionality: Fetch the details to populate the form
if (isset($_GET['Eid'])) {
    $eid = $_GET['Eid']; // Get the place_id for editing
    $selqry = "SELECT * FROM tbl_place WHERE place_id=" . $eid;
    $r = $conn->query($selqry);

    if ($d = $r->fetch_assoc()) {
        $eid = $d['place_id']; // Set eid for update
        $ename = $d['place_name'];
        $district = $d['district_id']; // Get the district_id for the selected option
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Manage Places</title>
</head>

<body>
<h1 align="center" style="color:#844fc1">Place</h1>
<form id="form1" name="form1" method="post" action="">
    <table border="1">
        <tr>
            <td>District</td>
            <td>
                <select name="sel_district" id="sel_district" required title="Please select a district.">
                    <option value="">--select--</option>
                    <?php
                    $sel = "SELECT * FROM tbl_district";
                    $r = $conn->query($sel);
                    while ($res = $r->fetch_assoc()) {
                        // Check if this district is selected
                        $selected = ($district == $res['district_id']) ? 'selected' : '';
                        ?>
                        <option value="<?php echo $res['district_id'] ?>" <?php echo $selected; ?>><?php echo $res['district_name'] ?></option>
                        <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Place Name</td>
            <td>
                <input type="hidden" name="txthidden" value="<?php echo $eid; ?>"/>
                <input type="text" name="txt_place" id="txt_place" value="<?php echo $ename; ?>" 
                       required 
                       pattern="^[A-Z][a-zA-Z ]*$" 
                       title="Place name must start with a capital letter and contain only letters and spaces."/>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit"/>
                <input type="submit" name="btncanceel" id="btncanceel" value="Cancel"/>
            </td>
        </tr>
    </table>
    <p>&nbsp; </p>
    <p>&nbsp; </p>
    <table border="1">
        <tr>
        <th style="background-color: #4169E1; color: white; text-align: center;">SI No</th>
        <th style="background-color: #4169E1; color: white; text-align: center;">District</th>
        <th style="background-color: #4169E1; color: white; text-align: center;">Place Name</th>
        <th style="background-color: #4169E1; color: white; text-align: center;">Action</th>
        </tr>
        <?php
        $i = 0;
        $selQry = "SELECT * FROM tbl_place p INNER JOIN tbl_district d ON p.district_id = d.district_id";
        $result = $conn->query($selQry);
        while ($row = $result->fetch_assoc()) {
            $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['district_name'] ?></td>
                <td><?php echo $row['place_name'] ?></td>
                <td>
                    <a href="place.php?id=<?php echo $row['place_id'] ?>">Delete</a>
                    <a href="place.php?Eid=<?php echo $row['place_id'] ?>">Edit</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</form>
</body>
</html>
<?php
include("Foot.php");
?>
