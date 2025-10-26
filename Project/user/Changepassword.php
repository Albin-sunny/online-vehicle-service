<?php
include("../Assets/Connection/Connection.php");

include('Head.php');
$sel = "SELECT * FROM tbl_newuser WHERE user_id ='" . $_SESSION['userid'] . "'";
$row = $conn->query($sel);
$data = $row->fetch_assoc();
$dbPassword = $data['user_password'];

if (isset($_POST['txt_btn'])) {
    $Oldpassword = $_POST['txt_oldPassword'];
    $NewPassword = $_POST['txt_Newpassword'];
    $Repassword = $_POST['txt_RePassword'];

    if ($dbPassword == $Oldpassword) {
        if ($NewPassword == $Repassword) {
            $upqury = "UPDATE tbl_newuser SET user_password='" . $NewPassword . "' WHERE user_id='" . $_SESSION['userid'] . "'";
            if ($conn->query($upqury)) {
                echo "<script>
                alert('Password updated successfully.');
                window.location='Editprofile.php';
                </script>";
            }
        } else {
            echo "<script>alert('New passwords do not match');</script>";
        }
    } else {
        echo "<script>alert('Old password is incorrect');</script>";
    }
}
?>
<br><br>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table td {
            padding: 15px;
            text-align: left;
            vertical-align: middle;
        }

        table input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border 0.3s ease, box-shadow 0.3s ease;
            background-color: #ffffff; /* White background for inputs */
        }

        table input[type="password"]:focus {
            border-color: #3498db; /* Highlight border color on focus */
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.5); /* Box shadow on focus */
            outline: none; /* Remove default outline */
        }

        table input[type="submit"] {
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

        table input[type="submit"]:hover {
            background-color: #3b5b9a; /* Darker Royal Blue on hover */
            transform: translateY(-2px); /* Slight lift effect */
        }

        table input[type="submit"].cancel-btn {
            background-color: coral; /* Coral background for Cancel button */
        }

        table input[type="submit"].cancel-btn:hover {
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
                        <td><b>Old Password</b></td>
                        <td><input type="password" name="txt_oldPassword" id="txt_oldPassword" placeholder="Enter Old Password" required /></td>
                    </tr>
                    <tr>
                        <td><b>New Password</b></td>
                        <td><input type="password" name="txt_Newpassword" id="txt_Newpassword" placeholder="Enter New Password" required /></td>
                    </tr>
                    <tr>
                        <td><b>Re-Type Password</b></td>
                        <td><input type="password" name="txt_RePassword" id="txt_RePassword" placeholder="Re-type New Password" required /></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" name="txt_btn" id="txt_btn" value="Change Password" />
                            <input type="submit" name="txt_btn2" id="txt_btn2" value="Cancel" class="cancel-btn" />
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

