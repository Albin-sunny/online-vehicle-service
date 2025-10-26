<?php
include('../Assets/Connection/Connection.php');
include("Head.php");
if (isset($_POST['btn_reply'])) {
    $reply = $_POST['txt_reply'];

    $update = "update tbl_complaint set complaint_reply='".$reply."',complaint_status='1' where complaint_id='".$_GET['rid']."'";
    if ($conn->query($update))
	 {
		 
		echo "<script>
		alert('replyed');
		window.location='veiwcomplaint.php';
		</script>";
	   
       
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h1 align="center" style="color:#844fc1">Reply</h1>
    <form name="form1" method="post" action="">
        <table width="200" border="1">
            <tr>
                <td>Reply</td>
                <td><label for="txt_reply"></label>
                <textarea name="txt_reply" id="txt_reply" cols="45" rows="5"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btn_reply" id="btn_reply" value="Submit" />
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
<?php
include("Foot.php");
?>

