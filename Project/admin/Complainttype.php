<?php
include('../Assets/Connection/Connection.php');
$eid=0;
$ename="";
include("Head.php");

if(isset($_POST['btn_submit'])) {
    $name = $_POST['txt_ComplaintType'];
    $eid = $_POST['txthidden'];
    $selqry = "SELECT * FROM tbl_Complainttype WHERE Complainttype_name='" . $name . "'";
    $ro = $conn->query($selqry);
    
    if($da = $ro->fetch_assoc()) {
        echo "<script>
        alert('Already exist');
        window.location='Complainttype.php';
        </script>";
    } else {
        if ($eid != 0) {
            $upqry = "UPDATE tbl_Complainttype SET Complainttype_name='" . $name . "' WHERE Complainttype_id='" . $eid . "'";
            if($conn->query($upqry)) {
                echo "<script>
                alert('Updated');
                window.location='Complainttype.php';
                </script>";
            }
        } else {
            $ins = "INSERT INTO tbl_Complainttype(Complainttype_name) VALUES('" . $name . "')";
            if($conn->query($ins)) {
                echo "<script>
                alert('Inserted');
                window.location='Complainttype.php';
                </script>";
            }
        }
    }
}

if(isset($_GET['id'])) {
    $del = "DELETE FROM tbl_Complainttype WHERE Complainttype_id=" . $_GET['id'];
    if($conn->query($del)) {
        echo "<script>
        alert('Deleted');
        window.location='Complainttype.php';
        </script>";
    }
}

if(isset($_GET['Eid'])) {
    $selqry = "SELECT * FROM tbl_Complainttype WHERE Complainttype_id=" . $_GET['Eid'];
    $r = $conn->query($selqry);
    if($d = $r->fetch_assoc()) {
        $eid = $d['Complainttype_id'];
        $ename = $d['Complainttype_name'];
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaint Type</title>
</head>

<body>
<h1 align="center" style="color:#844fc1">Complaint Type</h1>
<form id="form1" name="form1" method="post" action="">
  <table width="500" height="300" border="1">
    <tr>
      <td>Complaint Type</td>
      <td>
        <label for="txt_Type"></label>
        <input type="hidden" name="txthidden" value="<?php echo $eid ?>" />
        <input type="text" name="txt_ComplaintType" id="txt_Type" value="<?php echo $ename ?>"
               required 
               pattern="^[A-Z][a-zA-Z ]*$" 
               title="Must start with a capital letter, followed by letters and spaces only." /> 
      </td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
  <br>
  <br>
  
  <table width="600" height="300"border="1">
    <tr>
    <th style="background-color: #4169E1; color: white; text-align: center;">Si No</th>
    <th style="background-color: #4169E1; color: white; text-align: center;">Type</th>
    <th style="background-color: #4169E1; color: white; text-align: center;">Action</th>
    </tr>
    <?php
    $i = 0;
    $sel = "SELECT * FROM tbl_Complainttype";
    $result = $conn->query($sel);  
    while($row = $result->fetch_assoc()) {
        $i++;
    ?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row['Complainttype_name'] ?></td>
      <td>
        <a href="Complainttype.php?id=<?php echo $row['Complainttype_id'] ?>">Delete</a>
        <a href="Complainttype.php?Eid=<?php echo $row['Complainttype_id'] ?>">Edit</a>
      </td>
    </tr>
    <?php } ?>
  </table>
</form>
</body>
</html>
<?php
include("Foot.php");
?>


