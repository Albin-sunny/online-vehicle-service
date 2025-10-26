<?php 
include("../Assets/Connection/Connection.php");  
include('Head.php');     

$sel = "SELECT * FROM tbl_workshopreg w 
        INNER JOIN tbl_location l ON w.location_id=l.location_id 
        INNER JOIN tbl_place p ON l.place_id=p.place_id 
        INNER JOIN tbl_district d ON d.district_id=p.district_id 
        WHERE workshopreg_id ='" . $_SESSION['workshop'] . "'"; 

$row = $conn->query($sel); 
$data = $row->fetch_assoc();  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>User Profile</title>
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

        .profile-card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 600px; /* Changed width to 600 pixels */
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
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
            cursor: pointer; /* Change cursor to pointer */
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        /* Change hover effect to silver grey */
        tr:hover {
            background-color: #C0C0C0; /* Silver Grey for hover */
            color: black; /* Black text on hover for contrast */
        }

        /* Selected row color */
        tr.selected {
            background-color: #C0C0C0; /* Silver Grey for selected rows */
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

        /* Edit Profile button to Pine Green */
        .profile-actions a:nth-child(1) {
            background-color: #01796F; /* Pine Green background */
        }

        .profile-actions a:nth-child(1):hover {
            background-color: #016B61; /* Darker Pine Green on hover */
        }

        /* Change Password button to Royal Blue */
        .profile-actions a:nth-child(2) {
            background-color: #4169E1; /* Royal Blue background */
        }

        .profile-actions a:nth-child(2):hover {
            background-color: #355ACD; /* Darker Royal Blue on hover */
        }
    </style>
    <script>
        // Function to toggle row selection
        function toggleRowSelection(row) {
            // Remove 'selected' class from all rows
            var rows = document.querySelectorAll("tr");
            rows.forEach(function(r) {
                r.classList.remove('selected');
            });
            // Add 'selected' class to the clicked row
            row.classList.add('selected');
        }
    </script>
</head>

<body>
    <div class="content">
        <div class="profile-card">
            <div class="profile-header">
                <img src="../Assets/File/Workshop/<?php echo $data['workshopreg_photo']?>" alt="Profile Photo"/>
                <div class="profile-name"><?php echo $data['workshopreg_name']?></div>
            </div>
            <div class="profile-info">
                <table>
                    <tr onclick="toggleRowSelection(this)">
                        <th>Email</th>
                        <td><?php echo $data['workshopreg_email']?></td>
                    </tr>
                    <tr onclick="toggleRowSelection(this)">
                        <th>Contact</th>
                        <td><?php echo $data['workshopreg_contact']?></td>
                    </tr>
                    <tr onclick="toggleRowSelection(this)">
                        <th>Address</th>
                        <td><?php echo $data['workshopreg_address']?></td>
                    </tr>
                    <tr onclick="toggleRowSelection(this)">
                        <th>District</th>
                        <td><?php echo $data['district_name']?></td>
                    </tr>
                    <tr onclick="toggleRowSelection(this)">
                        <th>Place</th>
                        <td><?php echo $data['place_name']?></td>
                    </tr>
                    <tr onclick="toggleRowSelection(this)">
                        <th>Location</th>
                        <td><?php echo $data['location_name']?></td>
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
