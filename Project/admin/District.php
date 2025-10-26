+<?php
include('../Assets/Connection/Connection.php');
$eid=0;
$ename="";
include("Head.php");

if(isset($_POST['btnSubmit'])) {
    $name = $_POST['txtDistrict'];
    $eid = $_POST['txthidden'];
    $selqry = "select * from tbl_district where district_name='" . $name . "'";
    $ro = $conn->query($selqry);

    if($da = $ro->fetch_assoc()) {
        ?><script>
        alert('Already exist');
        window.location='District.php';
        </script><?php
    } else {
        if($eid != 0) {
            $upqry = "update tbl_district set district_name='" . $name . "' where district_id='" . $eid . "'";
            if($conn->query($upqry)) {
                ?><script>
                alert('updated');
                window.location='District.php';
                </script><?php
            }
        } else if($eid == 0) {
            $ins = "insert into tbl_district(district_name) values('" . $name . "')";
            if($conn->query($ins)) {
                echo "<script>
                alert('inserted');
                window.location='District.php';
                </script>";
            }
        }
    }
}

if(isset($_GET['id'])) {
    $del = "delete from tbl_district where district_id=" . $_GET['id'];
    if($conn->query($del)) {
        echo "<script>
        alert('deleted');
        window.location='District.php';
        </script>";
    }
}

if(isset($_GET['Eid'])) {
    $selqry = "select * from tbl_district where district_id=" . $_GET['Eid'];
    $r = $conn->query($selqry);
    if($d = $r->fetch_assoc()) {
        $eid = $d['district_id'];
        $ename = $d['district_name'];
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>District</title>
</head>

<body>
    <h1 align="center" style="color:#844fc1">District</h1>
    <form id="form1" name="form1" method="post" action="">
      <table width="319" height="120" border="1">
        <tr>
          <td width="92">District name</td>
          <td width="90"><label for="txtDistrict"></label>
          <input type="hidden" name="txthidden" value="<?php echo $eid ?>"/>
          <input type="text" name="txtDistrict" id="txtDistrict" value="<?php echo $ename ?>" 
                 required pattern="^[A-Z]+[a-zA-Z ]*$" title="Name allows only alphabets, spaces, and must start with a capital letter" /> </td>
        </tr>
        <tr>
          <td colspan="2" align="center">
          <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" />
          <input type="submit" name="btnCancel" id="btnCancel" value="Cancel" />
          </td>
        </tr>
      </table>
      <br>
      <br>
      
      <table width="332" border="1">
        <tr>
        <th style="background-color: #4169E1; color: white; text-align: center;">Sl No</th>
        <th style="background-color: #4169E1; color: white; text-align: center;">District Name</th>
        <th style="background-color: #4169E1; color: white; text-align: center;">Action</th>
        </tr>
        <?php
        $i = 0;
        $sel = "select * from tbl_district";
        $result = $conn->query($sel);  
        while($row = $result->fetch_assoc()) {
            $i++;
        ?>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $row['district_name'] ?></td>    
          <td><a href="District.php?id=<?php echo $row['district_id'] ?>">Delete</a>
          <a href="District.php?Eid=<?php echo $row['district_id'] ?>">Edit</a></td>
        </tr>
        <?php } ?>
      </table>
    </form>
</body>
</html>
<?php
include("Foot.php");
?>
