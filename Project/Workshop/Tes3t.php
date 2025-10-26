3;<?php
include('../Assets/Connection/Connection.php');
session_start();
include('Head.php');

// Debugging: Check if session workshop is set
if (!isset($_SESSION['workshop'])) {
    echo "Workshop session is not set!";
    exit;
} else {
    // Displaying the session value for debugging purposes
    echo "Workshop ID: " . $_SESSION['workshop'] . "<br>";
}

// Accept request
if (isset($_GET['aid'])) {
    $updt = "UPDATE tbl_rereques SET request_status='1' WHERE request_id = '" . $_GET['aid'] . "'";
    if ($conn->query($updt)) {
        ?>
        <script>
            alert("Accepted");
            window.location = "Viewrequest.php";
        </script>
        <?php
    } else {
        echo "Error updating request status to accepted: " . $conn->error;
    }
}

// Reject request
if (isset($_GET['rid'])) {
    $updt = "UPDATE tbl_rereques SET request_status='2' WHERE request_id = '" . $_GET['rid'] . "'";
    if ($conn->query($updt)) {
        ?>
        <script>
            alert("Rejected");
            window.location = "Viewworkshop.php";
        </script>
        <?php
    } else {
        echo "Error updating request status to rejected: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>View Requests</title>
</head>
<body>
<form id="form1" name="form1" method="post" action="">
    <table width="569" border="1">
        <tr>
            <td width="22">SI no</td>
            <td width="37">User</td>
            <td width="60">Contact</td>
            <td width="60">District</td>
            <td width="44">Place</td>
            <td width="69">Location</td>
            <td width="66">Vehicle type</td>
            <td width="82">Complaint</td>
            <td width="137">Action</td>
        </tr>
        <?php
        $i = 0;
        $select = "SELECT * FROM tbl_rereques r
                    INNER JOIN tbl_newuser n ON r.user_id = n.user_id
                    INNER JOIN tbl_location l ON n.location_id = l.location_id
                    INNER JOIN tbl_place p ON l.place_id = p.place_id
                    INNER JOIN tbl_district d ON p.district_id = d.district_id
                    INNER JOIN tbl_vechicletype v ON r.vehicletype_id = v.vehicletype_id
                    INNER JOIN tbl_complainttype c ON r.Complainttype_id = c.Complainttype_id
                    INNER JOIN tbl_workshopreg w ON r.workshop_id = w.workshopreg_id
                    WHERE w.workshopreg_id = '" . $_SESSION['workshop'] . "'";

        // Display the query for debugging purposes
        echo "Query: " . $select . "<br>";

        $row = $conn->query($select);

        // Check if there was an error in the query execution
        if ($row === false) {
            echo "<tr><td colspan='9'>Error: " . $conn->error . "</td></tr>";
        } else {
            // Output the number of rows found
            $num_rows = $row->num_rows;
            echo "Number of rows returned: " . $num_rows . "<br>";

            if ($num_rows > 0) {
                // If rows are found, display them
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
                        <td>
                            <?php
                            if ($result['request_status'] == 0) {
                                ?>

                                <a href="Viewrequest.php?aid=<?php echo $result['request_id'] ?>">Accept</a>
                                <a href="Viewrequest.php?rid=<?php echo $result['request_id'] ?>">Reject</a>
                                <?php
                            } elseif ($result['request_status'] == 1) {
                                echo "Request Accepted";
                                ?>
                                <a href="MechanicList.php?wid=<?php echo $result['request_id'] ?>">Assign Mechanic</a>
                                <?php
                            } elseif ($result['request_status'] == 3) {
                                echo "Assigned";
                            } else {
                                echo "Rejected";
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                // Display "No data found" if there are no rows
                echo "<tr><td colspan='9'>No data found</td></tr>";
            }
        }
        ?>
    </table>
</form>
</body>
</html>

<?php
include('Foot.php');
?>
