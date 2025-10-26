<?php
include('../Assets/Connection/Connection.php');
session_start();
include('Head.php');

// Check if the mechanic ID is set in the session
if (!isset($_SESSION['mechanic'])) {
    die("Session variable 'mechanic' is not set.");
}

// Update assignment status if `oid` and `sts` are present in the query parameters
if (isset($_GET['oid']) && isset($_GET['sts'])) {
    $up = "UPDATE tbl_assignwork SET assignwork_status='" . $_GET['sts'] . "' WHERE assignwork_id=" . $_GET['oid'];
    if ($conn->query($up)) {
        ?>
        <script>
            alert('Updated..');
            window.location = "MyWorks.php";
        </script>
        <?php
    }
}

// Start the HTML output
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>My Works</title>
</head>

<body>
<table width="569" border="1">
    <tr>
        <td width="22">SI No</td>
        <td width="37">User</td>
        <td width="60">Contact</td>
        <td width="60">District</td>
        <td width="44">Place</td>
        <td width="69">Location</td>
        <td width="66">Vehicle Type</td>
        <td width="82">Complaint</td>
        <td>Details</td>
        <td width="137">Action</td>
    </tr>
    <?php
    $i = 0;

    // SQL query to fetch assigned work for the mechanic
    $mechanic_id = $_SESSION['mechanic']; // Get mechanic ID from session

    // Debugging: output the mechanic ID
    echo "<!-- Mechanic ID: " . $mechanic_id . " -->";

    $select = "
        SELECT * 
        FROM tbl_assignwork a 
        INNER JOIN tbl_rereques r ON a.request_id = r.request_id 
        INNER JOIN tbl_newuser n ON r.user_id = n.user_id 
        INNER JOIN tbl_location l ON n.location_id = l.location_id 
        INNER JOIN tbl_place p ON l.place_id = p.place_id 
        INNER JOIN tbl_district d ON p.district_id = d.district_id 
        INNER JOIN tbl_vechicletype v ON r.vehicletype_id = v.vehicletype_id 
        INNER JOIN tbl_complainttype c ON r.Complainttype_id = c.Complainttype_id 
        INNER JOIN tbl_workshopreg w ON r.workshop_id = w.workshopreg_id  
        WHERE a.mechanic_id = $mechanic_id";

    // Debugging: output the SQL query
    echo "<!-- SQL Query: " . $select . " -->";

    $row = $conn->query($select);

    // Check if the query executed successfully
    if ($row === false) {
        echo "SQL Error: " . $conn->error;
    } else if ($row->num_rows == 0) {
        // If no rows found
        echo "<tr><td colspan='10'>No data found.</td></tr>";
    } else {
        // Fetch and display the data
        while ($result = $row->fetch_assoc()) {
            $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $result['user_name'] ?></td>
                <td><?php echo $result['user_contact'] ?></td>
                <td><?php echo $result['district_name'] ?></td>
                <td><?php echo $result['place_name'] ?></td>
                <td><?php echo $result['location_name'] ?></td>
                <td><?php echo $result['vehicletype_name'] ?></td>
                <td><?php echo $result['Complainttype_name'] ?></td>
                <td><?php echo $result['request_details'] ?></td>
                <td>
                    <?php 
                    if ($result['assignwork_status'] == 0) {
                        ?>
                        <a href="MyWorks.php?oid=<?php echo $result['assignwork_id'] ?>&sts=1">On the Way</a>
                        <?php
                    } else if ($result['assignwork_status'] == 1) {
                        ?>
                        <a href="MyWorks.php?oid=<?php echo $result['assignwork_id'] ?>&sts=2">Work Started</a>
                        <?php
                    } else if ($result['assignwork_status'] == 2) {
                        ?>
                        <a href="MyWorks.php?oid=<?php echo $result['assignwork_id'] ?>&sts=3">Work Completed</a>
                        <?php
                    } else if ($result['assignwork_status'] == 3) {
                        echo "Work Completed";
                    }
                    ?>
                </td>
            </tr>
            <?php
        }
    }
    ?>
</table>
</body>
</html>

<?php
include('Foot.php');
?>
