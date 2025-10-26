<?php
include('../Assets/Connection/Connection.php');
session_start();
include('Head.php');

if (isset($_POST['btn_submit'])) {
    $Name = $_POST['txt_name'];
    $Place = $_POST['sel_place'];
    $location = $_POST['sel_location'];
    $Email = $_POST['txt_email'];
    $Contact = $_POST['txt_contact'];
    $Password = $_POST['txt_password'];
    $photo = $_FILES["txt_photo"]["name"];
    $path = $_FILES["txt_photo"]["tmp_name"];
    
    // Upload photo
    move_uploaded_file($path, "../Assets/File/User/" . $photo);

    // Insert data into the database
    $ins = "INSERT INTO tbl_newuser(user_name, user_email, user_contact, user_password,user_photo, location_id)
            VALUES ('".$Name."','".$Email."','".$Contact."','".$Password."','".$photo."','".$location."')";

    if ($conn->query($ins)) {
        echo "<script>
                alert('Data inserted successfully');
                window.location='Newuser.php';
              </script>";
    } else {
        echo "<script>alert('Error inserting data');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User Registration</title>
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
        width: 50%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    tr:nth-child(allS) {
        background-color: #f9f9f9; /* Light gray for even rows */
    }

    tr:hover {
        background-color: #C0C0C0; /* Silver grey for hover effect */
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
    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <table width="259" border="1" align="center">
            <tr>
                <td width="153">Name</td>
                <td width="90">
                    <input type="text" name="txt_name" id="txt_name" pattern="^[A-Z]+[a-zA-Z ]*$" 
                        title="Name must start with a capital letter and contain only alphabets and spaces." required />
                </td>
            </tr>
            <tr>
                <td>District</td> 
                <td>
                    <select name="sel_district" id="sel_district" onchange="getPlace(this.value)" required>
                        <option value="">--select--</option>
                        <?php
                        $sel = "SELECT * FROM tbl_district";
                        $r = $conn->query($sel);
                        while ($res = $r->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $res['district_id'] ?>">
                                <?php echo $res['district_name'] ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Place</td>
                <td>
                    <select name="sel_place" id="sel_place" onchange="getLocation(this.value)" required>
                        <option value="">--select--</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Location</td>
                <td>
                    <select name="sel_location" id="sel_location" required>
                        <option value="">--select--</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>
                    <input type="email" name="txt_email" id="txt_email" required />
                </td>
            </tr>
            <tr>
                <td>Contact</td>
                <td>
                    <input type="text" name="txt_contact" id="txt_contact" pattern="[7-9]{1}[0-9]{9}" 
                        title="Phone number must start with 7, 8, or 9 and contain 10 digits." required />
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input type="password" name="txt_password" id="txt_password" 
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                        title="Password must contain at least one number, one uppercase and lowercase letter, and at least 8 or more characters." required />
                </td>
            </tr>
            
            <tr>
                <td>Photo</td>
                <td>
                    <input type="file" name="txt_photo" id="txt_photo" required />
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input name="btn_submit" type="submit" value="Submit" />
                </td>
            </tr>
        </table>
    </form>

    <!-- JavaScript for dynamic dropdowns and password validation -->
    <script src="../Assets/JQ/jQuery.js"></script>
    <script>
        function getPlace(did) {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
                success: function(result) {
                    $("#sel_place").html(result);
                }
            });
        }

        function getLocation(pid) {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxLocation.php?pid=" + pid,
                success: function(result) {
                    $("#sel_location").html(result);
                }
            });
        }

        function checkPasswordMatch() {
            var password = document.getElementById("txt_password").value;
            var confirmPassword = document.getElementById("txt_conformpassword").value;

            if (password != confirmPassword) {
                document.getElementById("txt_conformpassword").setCustomValidity("Passwords do not match.");
            } else {
                document.getElementById("txt_conformpassword").setCustomValidity("");
            }
        }
    </script>

    <?php include('Foot.php'); ?>
</body>
</html>
