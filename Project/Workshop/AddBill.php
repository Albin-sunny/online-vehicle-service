<?php
include('../Assets/Connection/Connection.php');
include('Head.php');

if(isset($_POST['btnSubmit']))
{
    $errors = []; // Array to hold error messages

    // Check if a file is uploaded
    if (isset($_FILES['txtbill'])) {
        $Photo = $_FILES['txtbill']['name'];
        $path = $_FILES['txtbill']['tmp_name'];
        $fileSize = $_FILES['txtbill']['size'];
        $fileType = pathinfo($Photo, PATHINFO_EXTENSION);
        $allowedTypes = ['jpg', 'jpeg', 'png', 'pdf']; // Allowed file types

        // Validate the file type
        if (!in_array(strtolower($fileType), $allowedTypes)) {
            $errors[] = "File type not allowed. Only JPG, JPEG, PNG, and PDF files are accepted.";
        }

        // Validate the file size (maximum 5MB)
        if ($fileSize > 5 * 1024 * 1024) {
            $errors[] = "File size should not exceed 5 MB.";
        }

        // Proceed if there are no validation errors
        if (empty($errors)) {
            move_uploaded_file($path, "../Assets/File/Workshop/Bill/".$Photo);
            $upqry = "UPDATE tbl_rereques SET user_bill='".$Photo."' WHERE request_id='".$_GET['bid']."'";
            if ($conn->query($upqry)) {
                ?>
                <script>
                    alert('Updated successfully.');
                    window.location='Viewrequest.php?bid=<?php echo $_GET['bid']?>';
                </script>
                <?php
            } else {
                $errors[] = "Error updating the database.";
            }
        }
    } else {
        $errors[] = "No file was uploaded.";
    }

    // Display validation errors
    if (!empty($errors)) {
        echo '<script>alert("' . implode('\\n', $errors) . '");</script>';
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>District</title>
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
            width: 40%;
            border-collapse: collapse;
            margin: 20px auto; /* Center the table */
        }

        tr:nth-child(even) {
            background-color: #f9f9f9; /* Light gray for even rows */
        }

        tr:hover {
            background-color: #C0C0C0; /* Light cyan for row hover effect */
        }

        td {
            padding: 40px; /* Adjusted padding for better spacing */
            border: 1px solid #e0e0e0;
            border-radius: 8px; /* Rounded corners for cells */
        }

        input[type="text"], textarea {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border 0.3s ease, box-shadow 0.3s ease;
            background-color: #ffffff; /* White background for inputs */
        }

        input[type="text"]:focus, textarea:focus {
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
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table width="319" height="120" border="1">
    <tr>
      <td width="92">Bill</td>
      <td width="90"><label for="txtDistrict"></label>
      <input type="file" name="txtbill" id="txtbill" required /> </td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" />
      </td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
include('foot.php');
?>
