<?php
include('../Assets/Connection/Connection.php');

// Initialize variables for edit functionality
$eid = 0;
$ename = "";
$eemail = "";
$epassword = "";

if (isset($_POST['btn_submit'])) {
    $name = $_POST['txt_name'];
    $email = $_POST['txt_email'];
    $password = $_POST['txt_pass'];
    $eid = $_POST['txthidden']; // Get the hidden eid value from the form

    // Validate password complexity
    $password_pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/";
    if (!preg_match($password_pattern, $password)) {
        echo "<script>
        alert('Password must contain at least one uppercase letter, one lowercase letter, one number, and be at least 8 characters long.');
        </script>";
    } else {
        if ($eid != 0) {
            // Update query if admin ID exists (edit case)
            $upqry = "UPDATE tbl_admin SET admin_name = '$name', admin_email = '$email', admin_password = '$password' WHERE admi_id = '$eid'";
            if ($conn->query($upqry)) {
                echo "<script>
                alert('Updated successfully');
                window.location='AdminRegistration.php';
                </script>";
            }
        } else {
            // Insert query if it's a new admin
            $ins = "INSERT INTO tbl_admin (admin_name, admin_email, admin_password) VALUES ('$name', '$email', '$password')";
            if ($conn->query($ins)) {
                echo "<script>
                alert('Inserted successfully');
                window.location='AdminRegistration.php';
                </script>";
            }
        }
    }
}

// Delete functionality
if (isset($_GET['id'])) {
    $admin_id = $_GET['id']; // Get the admi_id from URL
    $del = "DELETE FROM tbl_admin WHERE admi_id=$admin_id";
    
    if ($conn->query($del)) {
        echo "<script>
        alert('Deleted successfully');
        window.location='AdminRegistration.php';
        </script>";
    } else {
        echo "<script>
        alert('Failed to delete');
        </script>";
    }
}

// Edit functionality: Fetch the details to populate the form
if (isset($_GET['Eid'])) {
    $eid = $_GET['Eid']; // Get the admi_id for editing
    $selqry = "SELECT * FROM tbl_admin WHERE admi_id=$eid";
    $r = $conn->query($selqry);
    
    if ($d = $r->fetch_assoc()) {
        $eid = $d['admi_id'];  // Set eid for update
        $ename = $d['admin_name'];
        $eemail = $d['admin_email'];
        $epassword = $d['admin_password'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Registration</title>
</head>
<body>
<div align="center">
    <form method="post" action="">
        <input type="hidden" name="txthidden" value="<?php echo $eid; ?>"> <!-- Hidden field to store eid for edit -->
        <table border="1">
            <tr>
                <td>Name</td>
                <td>
                    <input required type="text" name="txt_name" 
                           title="Name must start with an uppercase letter and can contain only letters and spaces."
                           pattern="^[A-Z][a-zA-Z ]*$" 
                           value="<?php echo htmlspecialchars($ename); ?>" />
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>
                    <input type="email" required name="txt_email" value="<?php echo htmlspecialchars($eemail); ?>" />
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input type="password" required name="txt_pass" 
                           pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$" 
                           title="Password must contain at least one uppercase letter, one lowercase letter, one number, and be at least 8 characters long."
                           value="<?php echo htmlspecialchars($epassword); ?>" />
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btn_submit" value="Submit" />
                </td>
            </tr>
        </table>

        <!-- Display Admin List -->
        <table width="200" border="1">
            <tr>
                <td>SINO</td>
                <td>NAME</td>
                <td>EMAIL</td>
                <td>ACTION</td>
            </tr>
            <?php
            $i = 0;
            $sel = "SELECT * FROM tbl_admin";
            $row = $conn->query($sel);
            while ($data = $row->fetch_assoc()) {
                $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo htmlspecialchars($data['admin_name']); ?></td>
                    <td><?php echo htmlspecialchars($data['admin_email']); ?></td>
                    <td>
                        <a href="AdminRegistration.php?id=<?php echo $data['admi_id']; ?>">Delete</a> |
                        <a href="AdminRegistration.php?Eid=<?php echo $data['admi_id']; ?>">Edit</a>
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
