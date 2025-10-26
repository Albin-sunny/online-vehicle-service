<?php
include("../Assets/Connection/Connection.php");

include('Head.php');

$sel = "SELECT * FROM tbl_mechanic WHERE mechanic_id='" . $_SESSION['mechanic'] . "'";
$res = $conn->query($sel);
$datamec = $res->fetch_assoc();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Mechanic Profile</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: url('../Assets/Templates/User/Main/images/mte.jpg'); /* Background image for the entire page */
            background-size: cover; /* Make the image cover the entire page */
            background-position: center; /* Center the image */
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

        .profile-card {
            background-color: white; /* Solid background color for the card */
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 600px;
            transition: transform 0.3s ease;
        }

        .profile-card:hover {
            transform: translateY(-5px);
        }

        .profile-header {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
            text-align: center;
            padding: 30px 20px;
        }

        .profile-header img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            margin-bottom: 15px;
        }

        .profile-name {
            font-size: 24px;
            font-weight: bold;
            margin: 10px 0 5px;
        }

        .profile-info {
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white; /* Solid background for the table */
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
            color: #333; /* Dark text for better visibility */
        }

        th {
            background-color: #f2f2f2; /* Light grey for header */
        }

        tr:hover {
            background-color: #C0C0C0; /* Light grey for hover */
            color: black; /* Change text color on hover */
        }

        .profile-actions {
            background-color: #f9f9f9;
            padding: 20px;
            text-align: center;
        }

        .profile-actions a {
            display: inline-block;
            padding: 10px 20px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            margin: 0 10px;
        }

        .profile-actions a:nth-child(1) {
            background-color: #01796F; /* Pine Green */
        }

        .profile-actions a:nth-child(1):hover {
            background-color: #016B61;
        }

        .profile-actions a:nth-child(2) {
            background-color: #4169E1; /* Royal Blue */
        }

        .profile-actions a:nth-child(2):hover {
            background-color: #355ACD;
        }
    </style>
    <script>
        function toggleRowSelection(row) {
            var rows = document.querySelectorAll("tr");
            rows.forEach(function(r) {
                r.classList.remove('selected');
            });
            row.classList.add('selected');
        }
    </script>
</head>

<body>
    <div class="content">
        <div class="profile-card">
            <div class="profile-header">
                <img src="../Assets/File/Mechanic/<?php echo $datamec['mechanic_photo']; ?>" alt="Profile Photo" />
                <div class="profile-name"><?php echo $datamec['mechanic_name']; ?></div>
            </div>
            <div class="profile-info">
                <table>
                    <tr onclick="toggleRowSelection(this)">
                        <th>Email</th>
                        <td><?php echo $datamec['mechanic_email']; ?></td>
                    </tr>
                    <tr onclick="toggleRowSelection(this)">
                        <th>Contact</th>
                        <td><?php echo $datamec['mechanic_contact']; ?></td>
                    </tr>
                </table>
            </div>
            <div class="profile-actions">
                <a href="Editprofile.php">Edit Profile</a>
                <a href="Changepassword.php">Change Password</a>
            </div>
        </div>
    </div>
</body>
</html>
<?php include('Foot.php'); ?>
