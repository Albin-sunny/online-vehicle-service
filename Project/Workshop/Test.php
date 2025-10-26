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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Registration</title>
</head>

<body>
<p>&nbsp;</p>
<form name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" value="<?php echo $ename; ?>"></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email" value="<?php echo $eemail; ?>"></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_pass"></label>
      <input type="text" name="txt_pass" id="txt_pass" value="<?php echo $epassword; ?>"></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit">
      </td>
    </tr>
  </table> 

  <!-- Display Admin List -->
  <table width="200" border="1">
    <tr>
      <td>SINO</td>
      <td>NAME</td>
      <td>EMAIL</td>
      <td>PASSWORD</td>
      <td>ACTION</td>
    </tr>
    <?php
    $i = 0;
    $sel = "SELECT * FROM tbl_admin";
    $row = $conn->query($sel);
    
    // Display data from the admin table
    while ($data = $row->fetch_assoc()) {
        $i++;
        ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $data['admin_name']; ?></td>
          <td><?php echo $data['admin_email']; ?></td>
          <td><?php echo $data['admin_password']; ?></td>
          <td>
            <a href="AdminRegistration.php?id=<?php echo $data['admi_id']; ?>">Delete</a> |
            <a href="AdminRegistration.php?Eid=<?php echo $data['admi_id']; ?>">Edit</a>
          </td>
        </tr>
    <?php
    }
    ?>
  </table>
  <p>&nbsp;</p>
</form>

</body>
</html>
