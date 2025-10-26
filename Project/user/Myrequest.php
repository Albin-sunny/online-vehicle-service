<?php
include('../Assets/Connection/Connection.php');
 
 include('Head.php');
 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Request</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        table {
            width: 80%; /* Adjust width as needed */
            border-collapse: collapse;
            margin: 20px 0;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4169E1; /* Royal Blue */
            color: white;
        }

        td {
            background-color: #f9f9f9;
        }

        tr:hover td {
            background-color: #C0C0C0; /* Silver Grey on hover */
            color: black;
        }

        /* Make the table responsive */
        @media (max-width: 768px) {
            table {
                width: 100%;
                font-size: 14px;
            }
            th, td {
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="content">
        <form id="form1" name="form1" method="post" action="">
            <table>
                <tr>
                    <th>Sl. No</th>
                    <th>Workshop</th>
                    <th>Contact</th>
                    <th>Complaint</th>
                    <th>Work Status</th>
                </tr>
                <?php
                $i = 0;
                $sel = "SELECT * FROM tbl_rereques c
                        INNER JOIN tbl_workshopreg w ON c.workshop_id=w.workshopreg_id
                        INNER JOIN tbl_complainttype m ON c.complainttype_id=m.complainttype_id
                        WHERE user_id='" . $_SESSION['userid'] . "'";
                $row = $conn->query($sel);
                while ($result = $row->fetch_assoc()) {
                    $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $result['workshopreg_name']; ?></td>
                    <td><?php echo $result['workshopreg_contact']; ?></td>
                    <td><?php echo $result['Complainttype_name']; ?></td>
                    <td>
                        <?php
                        if ($result['request_status'] == 0) {
                            echo "Pending";
                        } else if ($result['request_status'] == 1) {
                            echo "Accepted";
                        } else if ($result['request_status'] == 3) {
                        ?>
                           
                            <a href="viewmechanic.php?mid=<?php echo $result['request_id']; ?>">View Mechanic</a>
                        <?php
                        } else if ($result['request_status'] == 4) {
                            echo "Work Started";
                            ?>
                             <a href="viewmechanic.php?mid=<?php echo $result['request_id']; ?>">View Mechanic</a>
                            <?php
                        } else if ($result['request_status'] == 5) {
                            echo "Work Ended";
                            ?>
                             <a href="viewmechanic.php?mid=<?php echo $result['request_id']; ?>">View Mechanic</a>
                            <?php
                        } else if ($result['request_status'] == 6) {
                            echo "Delivered";
                        ?>
                        </br>
                         <a href="viewmechanic.php?mid=<?php echo $result['request_id']; ?>">View Mechanic</a>
                         <a href="Rating.php?wid=<?php echo $result['workshopreg_id']; ?>">Rating</a>
                        </br>
                            <a href="../Assets/File/Workshop/Bill/<?php echo $result['user_bill']; ?>" download>Download Bill</a>
                        <?php
                        }
                        ?>
                    </td>
                </tr>
                <?php
                }
                ?>
            </table>
        </form>
    </div>
</body>
</html>
<?php
include('Foot.php');
?>
