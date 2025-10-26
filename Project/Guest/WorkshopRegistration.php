<?php
include('../Assets/Connection/Connection.php');
session_start();

if(isset($_POST['btn_submit']))
{
    $Name = $_POST['txt_Name'];
    $Place = $_POST['sel_Place'];
    $Location = $_POST['sel_Location'];
    $Email = $_POST['txt_Email'];
    $Contact = $_POST['txt_Contact'];
    $Password = $_POST['txt_Password'];
    $Address = $_POST['txt_Address'];
    $Workshoptype = $_POST['sel_Workshoptype'];
    
    // Handle Proof Image Upload
    $Proof = $_FILES['image_Proof']['name'];
    $path = $_FILES['image_Proof']['tmp_name'];
    move_uploaded_file($path, "../Assets/File/Workshop/Proof/".$Proof);

    // Handle Photo Upload
    $photo = $_FILES["image_Photo"]["name"];
    $path1 = $_FILES["image_Photo"]["tmp_name"];
    move_uploaded_file($path1, "../Assets/File/Workshop/Photo/".$photo);

    // Insert query
    $ins = "insert into tbl_workshopreg(workshopreg_name, workshopreg_email, workshopreg_contact,
    workshopreg_address, workshopreg_password, workshoptype_id, location_id, workshopreg_photo, workshopreg_proof) 
    values('$Name', '$Email', '$Contact', '$Address', '$Password', '$Workshoptype', '$Location', '$photo', '$Proof')";
    
    if($conn->query($ins))
    {
        echo "<script>
        alert('Inserted successfully!');
        window.location='WorkshopRegistration.php';
        </script>"; 
    }
}
?>
<?php include('Head.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Workshop Registration</title>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-image: ; /* New background image */
        background-size:cover; 
        background-position: center;
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
        width: 600px;
        transition: transform 0.3s ease;
    }

    .form-container:hover {
        transform: scale(1.02);
    }

    .header {
        background: linear-gradient(135deg, #00BFFF, #008B8B);
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
        background-color: #ffffff; /* Solid white background for table */
        border-collapse: separate;
        border-spacing: 0;
        margin: 20px auto;
        border-radius: 15px; /* Rounded corners for table */
        overflow: hidden; /* Ensures rounded corners appear correctly */
    }

    tr:nth-child(even) {
        background-color: #f9f9f9; /* Light gray for even rows */
    }

    tr:hover {
        background-color: #C0C0C0; /* Silver grey for hover effect */
    }

    td {
        padding: 15px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
    }

    input[type="text"] {
        width: calc(100% - 20px);
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        transition: border 0.3s ease, box-shadow 0.3s ease;
        background-color: #ffffff;
    }

    input[type="text"]:focus {
        border-color: #3498db;
        box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
        outline: none;
    }

    input[type="submit"] {
        background-color: #4169E1;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.3s ease;
        width: 100%;
        font-size: 16px;
    }

    input[type="submit"]:hover {
        background-color: #3b5b9a;
        transform: translateY(-2px);
    }
</style>


</head>

<body>
    <form action="" method="post" enctype="multipart/form-data" id="form1" onsubmit="return validateForm()">
        <table border="1">
            <tr>
                <td>Name</td>
                <td><input type="text" name="txt_Name" id="txt_Name" pattern="^[A-Z][a-zA-Z ]*$" title="Name should start with a capital letter and contain only alphabets and spaces" required /></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="txt_Email" id="txt_Email" required /></td>
            </tr>
            <tr>
                <td>Contact</td>
                <td><input type="text" name="txt_Contact" id="txt_Contact" pattern="[7-9]{1}[0-9]{9}" title="Enter a valid 10-digit mobile number starting with 7, 8, or 9" required /></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" name="txt_Address" id="txt_Address" required /></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="txt_Password" id="txt_Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number, one uppercase and lowercase letter, and at least 8 or more characters" required /></td>
            </tr>
            <tr>
                <td>Workshop Type</td>
                <td>
                    <label for="sel_Workshoptype"></label>
                    <select name="sel_Workshoptype" id="sel_Workshoptype" required>
                        <option value="">--select--</option>
                        <?php
                            $sel = "select * from tbl_workshoptype";
                            $r = $conn->query($sel);
                            while($res = $r->fetch_assoc())
                            {
                        ?>
                        <option value="<?php echo $res['workshoptype_id']?>"><?php echo $res['workshoptype_name']?></option>
                        <?php
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>District</td>
                <td>
                    <label for="sel_District"></label>
                    <select name="sel_District" id="sel_District" onchange="getPlace(this.value)" required>
                        <option value="">--select--</option>
                        <?php
                            $sel = "select * from tbl_district";
                            $r = $conn->query($sel);
                            while($res = $r->fetch_assoc())
                            {
                        ?>
                        <option value="<?php echo $res['district_id']?>">
                        <?php echo $res['district_name']?></option>
                        <?php
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Place</td>
                <td>
                    <select name="sel_Place" id="sel_Place" onchange="getLocation(this.value)" required>
                        <option value="">--select--</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Location</td>
                <td>
                    <select name="sel_Location" id="sel_Location" required>
                        <option value="">--select--</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Photo</td>
                <td><input type="file" name="image_Photo" id="image_Photo" required /></td>
            </tr>
            <tr>
                <td>Proof</td>
                <td><input type="file" name="image_Proof" id="image_Proof" required /></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
            </tr>
        </table>
    </form>
</body>
</html>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
    function getPlace(did) {
        $.ajax({
            url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
            success: function(result) {
                $("#sel_Place").html(result);
            }
        });
    }

    function getLocation(pid) {
        $.ajax({
            url: "../Assets/AjaxPages/AjaxLocation.php?pid=" + pid,
            success: function(result) {
                $("#sel_Location").html(result);
            }
        });
    }

    function validateForm() {
        var password = document.getElementById("txt_Password").value;

        // Custom validation can go here if required
        // You already have built-in pattern validations in your HTML
        return true;
    }
</script>
<?php include('Foot.php'); ?>
