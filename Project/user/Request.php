<?php

include('../Assets/Connection/Connection.php');

include('Head.php');
if(isset($_POST['btn_submit']))
{
    $details=$_POST['txt_details'];
    $Vehicletype=$_POST['sel_vehicletype'];
    $Complainttype=$_POST['sel_complainttype'];
    $ins="insert into tbl_rereques(request_date,request_status,request_details,complainttype_id,vehicletype_id,workshop_id,user_id)
    value(curdate(),'0','".$details."','".$Complainttype."','".$Vehicletype."','".$_GET['id']."','".$_SESSION['userid']."')";
    if($conn->query($ins))
    {
        echo"<script>
            alert('inserted');
            window.location='Request.php';
            </script>"; 
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Request</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        table {
            margin: 50px auto;
            border-collapse: collapse;
            width: 50%;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        select, input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        /* Hover effect for input fields */
        select:hover, input[type="text"]:hover {
            background-color: #e0f7fa; /* Light cyan background on hover */
            border-color: #3498db; /* Light blue border on hover */
        }

        /* Focus effect for input fields */
        select:focus, input[type="text"]:focus {
            background-color: #e0f7fa;
            border-color: #2980b9; /* Darker blue border on focus */
            outline: none; /* Remove default focus outline */
        }

        input[type="submit"] {
            background-color: #4169E1; /* Royal Blue */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #2E8B57; /* Slightly darker green on hover */
        }

        td {
            text-align: center;
        }

        tr:hover {
            background-color: #f1f1f1; /* Light grey background when hovering over a row */
        }
    </style>
</head>
<body>
<form id="form1" name="form1" method="post" action="">
    <table width="200" border="1">
        <tr>
            <td>Vehicletype</td>
            <td>
                <label for="sel_vehicletype"></label>
                <select name="sel_vehicletype" id="sel_vehicletype" required>
                    <option value="">--select--</option>
                    <?php
                    $sel="select * from tbl_vechicletype";
                    $r=$conn->query($sel);
                    while($res=$r->fetch_assoc())
                    {
                        ?>
                        <option value="<?php echo $res['vehicletype_id']?>"><?php echo $res['vehicletype_name']?></option>
                        <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Complainttype</td>
            <td>
                <label for="sel_complainttype"></label>
                <select name="sel_complainttype" id="sel_complainttype" required>
                    <option value="">--select--</option>
                    <?php
                    $sele="select * from tbl_complainttype";
                    $rs=$conn->query($sele);
                    while($resu=$rs->fetch_assoc())
                    {
                        ?>
                        <option value="<?php echo $resu['Complainttype_id']?>"><?php echo $resu['Complainttype_name']?></option>
                        <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Details</td>
            <td>
                <label for="txt_details"></label>
                <input type="text" name="txt_details" id="txt_details" required 
                       title="Please enter the details." />
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
            </td>
        </tr>
    </table>
</form>
</body>
</html>
<?php
include('Foot.php');
?>
