<?php
include('../Assets/Connection/Connection.php');
session_start();
include('Head.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Complaint</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>#</td>
      <td>Name</td>
      <td>Email</td>
      <td>Contact</td>
      <td>Photo</td>
    </tr>
    <?php 
    if (isset($_GET['mid']) && !empty($_GET['mid'])) {
        $mid = $_GET['mid'];  // Get the 'mid' from the URL

        // Use a prepared statement to avoid SQL injection
        $stmt = $conn->prepare("SELECT * FROM tbl_assignwork a INNER JOIN tbl_mechanic m ON a.mechanic_id = m.mechanic_id WHERE request_id =".$_GET['mid']);
        $stmt->bind_param("i", $mid);  // "i" indicates that the parameter is an integer
        $stmt->execute();
        $res = $stmt->get_result();

        $i = 0;
        while ($row = $res->fetch_assoc()) {
            $i++;
    ?>
            <tr>
              <td><?php echo $i ?></td>
              <td><?php echo $row['mechanic_name'] ?></td>
              <td><?php echo $row['mechanic_email'] ?></td>
              <td><?php echo $row['mechanic_contact'] ?></td>
              <td><img src="../Assets/File/Mechanic/<?php echo $row['mechanic_photo'] ?>" width="150" height="150"/></td>
            </tr>
    <?php
        }
    } else {
        echo "<tr><td colspan='5'>No mechanic ID provided.</td></tr>";
    }
    ?>
  </table>
</form>
</body>
</html>

<?php
include('Foot.php');
?>
