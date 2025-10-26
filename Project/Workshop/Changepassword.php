<?php
include("../Assets/Connection/Connection.php");

include('Head.php');

$sel = "SELECT * FROM tbl_workshopreg WHERE workshopreg_id ='" . $_SESSION['workshop'] . "'";
$row = $conn->query($sel);
$data = $row->fetch_assoc();
$dbPassword = $data['workshopreg_password'];

if (isset($_POST['txt_btn'])) {
    $Oldpassword = $_POST['txt_oldPassword'];
    $NewPassword = $_POST['txt_Newpassword'];
    $Repassword = $_POST['txt_RePassword'];

    if ($dbPassword == $Oldpassword) {
        if ($NewPassword == $Repassword) {
            $upqury = "UPDATE tbl_workshopreg SET workshopreg_password='" . $NewPassword . "' WHERE workshopreg_id='" . $_SESSION['workshop'] . "'";
            if ($conn->query($upqury)) {
                echo "<script>
                alert('Updated');
                window.location='Changepassword.php';
                </script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Change Password</title>
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

        .form-container {
            background: linear-gradient(135deg, #ffffff, #f0f4f8);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 600px; /* Width set to 600 pixels */
            transition: transform 0.3s ease;
        }

        .form-container:hover {
            transform: scale(1.02);
        }

        .header {
            background: linear-gradient(135deg, #00BFFF, #008B8B); /* Blue Green gradient */
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 20px;
            font-weight: bold;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9; /* Light gray for even rows */
        }

        /* Change hover effect to silver grey */
        tr:hover {
            background-color: #C0C0C0; /* Silver Grey on hover */
            color: black; /* Black text on hover for contrast */
        }

        td {
            padding: 15px;
            border: 1px solid #e0e0e0;
            border-radius: 8px; /* Rounded corners for cells */
        }

        input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border 0.3s ease, box-shadow 0.3s ease;
            background-color: #ffffff; /* White background for inputs */
        }

        input[type="text"]:focus {
            border-color: #3498db; /* Highlight border color on focus */
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.5); /* Box shadow on focus */
            outline: none; /* Remove default outline */
        }

        /* Change Password button styles */
        input[type="submit"] {
            background-color: #4169E1; /* Royal Blue for Change Password button */
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            width: 48%; /* Slightly smaller than half for spacing */
            font-size: 16px; /* Larger font size */
        }

        input[type="submit"]:hover {
            background-color: #3b5b9a; /* Darker Royal Blue on hover */
            transform: translateY(-2px); /* Slight lift effect */
        }

        /* Cancel button styles */
        input[type="submit"]:nth-child(2) {
            background-color: coral; /* Coral background for Cancel button */
        }

        input[type="submit"]:nth-child(2):hover {
            background-color: #ff7f50; /* Lighter coral on hover for Cancel button */
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="form-container">
            <div class="header">Change Your Password</div>
            <form id="form1" name="form1" method="post" action="">
                <table>
                    <tr>
                        <td>Old Password</td>
                        <td>
                            <input type="text" name="txt_oldPassword" id="txt_oldPassword" />
                        </td>
                    </tr>
                    <tr>
                        <td>New Password</td>
                        <td>
                            <input type="text" name="txt_Newpassword" id="txt_Newpassword" />
                        </td>
                    </tr>
                    <tr>
                        <td>Re-Type Password</td>
                        <td>
                            <input type="text" name="txt_RePassword" id="txt_RePassword" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" name="txt_btn" id="txt_btn" value="Change Password" />
                            <input type="submit" name="txt_btn2" id="txt_btn2" value="Cancel" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>
<?php 
include('Foot.php');
?>
