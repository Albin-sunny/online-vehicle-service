<?php
include("../Assets/Connection/Connection.php");
session_start();
include('Head.php');

if (isset($_POST['btn_login'])) {
    $email = $_POST['txt_email'];
    $password = $_POST['txt_pass'];
    
    // Various selection queries for different user types
    $sel = "SELECT * FROM tbl_newuser WHERE user_email='$email' AND user_password='$password'";
    $row = $conn->query($sel);
    
    $selWork = "SELECT * FROM tbl_workshopreg WHERE workshopreg_email='$email' AND workshopreg_password='$password'";
    $ro = $conn->query($selWork);
    
    $sel = "SELECT * FROM tbl_mechanic WHERE mechanic_email='$email' AND mechanic_password='$password'";
    $roo = $conn->query($sel);
    
    $sel = "SELECT * FROM tbl_admin WHERE admin_email='$email' AND admin_password='$password'";
    $rows = $conn->query($sel);
    
    // Session management for different user types
    if ($data = $row->fetch_assoc()) {
        $_SESSION['userid'] = $data['user_id'];
        $_SESSION['username'] = $data['user_name'];
        header("Location:../user/HomePage.php");
    } else if ($dataWork = $ro->fetch_assoc()) {
        $_SESSION['workshop'] = $dataWork['workshopreg_id'];
        $_SESSION['workshopname'] = $dataWork['workshopreg_name'];
        header("Location:../Workshop/HomePage.php");
    } else if ($datamec = $roo->fetch_assoc()) {
        $_SESSION['mechanic'] = $datamec['mechanic_id'];
        $_SESSION['mechanicname'] = $datamec['mechanic_name'];
        header("Location:../Mechanic/HomePage.php");
    } else if ($datad = $rows->fetch_assoc()) {
        $_SESSION['admiid'] = $datad['admi_id'];
        $_SESSION['adminname'] = $datad['admin_name'];
        header("Location:../admin/HomePage.php");
    } else {
        echo "<script>
        alert('Invalid Details');
        window.location='WorkshopRegistration.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        table {
            width: 800px; /* Increased width of the table */
            margin: 40px auto;
            border-collapse: collapse;
            background-color: #ffffff; /* White background for the table */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3); /* More prominent shadow */
            border-radius: 12px; /* Rounded corners */
            overflow: hidden; /* Ensures rounded corners are visible */
        }
        th, td {
            padding: 15px; /* Increased padding for better spacing */
            text-align: left;
        }
        th {
            background-color: #007bff; /* Header background color */
            color: white; /* Header text color */
            font-weight: bold; /* Bold text in header */
        }
        td {
            background-color: #f9f9f9; /* Light grey for table cells */
            border-bottom: 1px solid #ccc; /* Bottom border for cells */
        }
        tr:hover td {
            background-color: #e9ecef; /* Change background on hover */
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
            border: 1px solid #ccc; /* Border for inputs */
            border-radius: 4px; /* Rounded input corners */
        }
        input[type="submit"] {
            padding: 10px 20px;
            margin: 10px 0;
            background-color: #28a745; /* Green button */
            color: white; /* Button text color */
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 5px; /* Rounded button corners */
        }
        input[type="submit"]:hover {
            background-color: #218838; /* Darker green on hover */
        }
        .links a {
            text-decoration: none;
            color: #007bff;
            margin: 0 10px;
        }
        .links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<form id="form1" name="form1" method="post" action="">
    <table>
        <tr>
            <th colspan="2" align="center">Login</th>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="txt_email" id="txt_email" required /></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="txt_pass" id="txt_pass" required /></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="btn_login" id="btn_login" value="Login" />
                <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" />
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center" class="links">
                <a href="Newuser.php">New User</a> 
                <a href="WorkshopRegistration.php">New Workshop</a>
                
                <!-- <a href="AdminRegistration.php">Admin Registration</a> -->
            </td>
        </tr>
    </table>
</form>

</body>
</html>

<?php
include('Foot.php');
?>
