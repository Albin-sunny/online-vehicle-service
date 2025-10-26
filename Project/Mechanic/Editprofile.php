<?php
include("../Assets/Connection/Connection.php");

include('Head.php');

$sel = "SELECT * FROM tbl_mechanic WHERE mechanic_id='" . $_SESSION['mechanic'] . "'";
$row = $conn->query($sel);
$data = $row->fetch_assoc();

if (isset($_POST['btn_Edit'])) {
    $name = $_POST['txt_Name'];
    $email = $_POST['txt_Email'];
    $contact = $_POST['txt_Contact'];

    $upqry = "UPDATE tbl_mechanic SET mechanic_name='" . $name . "', mechanic_email='" . $email . "', mechanic_contact='" . $contact . "' WHERE mechanic_id='" . $_SESSION['mechanic'] . "'";
    
    if ($conn->query($upqry)) {
        echo "<script>
        alert('Updated');
        window.location='Editprofile.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mechanic Profile</title>
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

        input[type="submit"] {
            background-color: #4169E1; /* Royal Blue for Edit button */
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            width: 100%; /* Full width for button */
            font-size: 16px; /* Larger font size */
        }

        input[type="submit"]:hover {
            background-color: #3b5b9a; /* Darker Royal Blue on hover */
            transform: translateY(-2px); /* Slight lift effect */
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="form-container">
            <div class="header">Edit Your Profile</div>
            <form id="form1" name="form1" method="post" action="">
                <table>
                    <tr>
                        <td>Name</td>
                        <td>
                            <input type="text" name="txt_Name" id="txt_Name" value="<?php echo htmlspecialchars($data['mechanic_name']); ?>" required pattern="^[A-Z][a-zA-Z ]*$" title="Name allows only alphabets, spaces, and the first letter must be capital letter." />
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input type="text" name="txt_Email" id="txt_Email" value="<?php echo htmlspecialchars($data['mechanic_email']); ?>" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}" title="Please enter a valid email address." />
                        </td>
                    </tr>
                    <tr>
                        <td>Contact</td>
                        <td>
                            <input type="text" name="txt_Contact" id="txt_Contact" value="<?php echo htmlspecialchars($data['mechanic_contact']); ?>" required pattern="[7-9][0-9]{9}" title="Phone number must start with 7-9 followed by 9 digits (0-9)." />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align='center'>
                            <input type="submit" name="btn_Edit" id="btn_Edit" value="Edit" />
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
