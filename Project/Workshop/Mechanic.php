<?php
include('../Assets/Connection/Connection.php');

include('Head.php');

if(isset($_POST['btn_submit']))
{
    $Name =$_POST['txt_name'];
    $Email=$_POST['txt_email'];
    $Contact=$_POST['txt_Contact'];
    $password=$_POST['txt_Password'];
    $photo=$_FILES["img_photo"]["name"];
    $path1=$_FILES["img_photo"]["tmp_name"];
    move_uploaded_file($path1,"../Assets/File/Mechanic/".$photo);
    
    $ins="insert into tbl_mechanic(mechanic_name,mechanic_email,mechanic_contact,mechanic_password,mechanic_photo,workshopreg_id)
          values('".$Name."','".$Email."','".$Contact."','".$password."','".$photo."','".$_SESSION['workshop']."')";
    
    if($conn->query($ins))
    {
        ?>
        <script>
        alert('Inserted');
        window.location='Mechanic.php';
        </script>
        <?php
    }
}
if(isset($_GET['mid']))
{
	$del="delete from tbl_mechanic where mechanic_id=".$_GET['mid'];
	if($conn->query($del))
	{
		echo "<script>
		alert('deleted'
		 );
		window.location='Mechanic.php';
		</script>";
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
    <script>
        function validateForm() {
            var name = document.getElementById("txt_name").value;
            var email = document.getElementById("txt_email").value;
            var contact = document.getElementById("txt_Contact").value;
            var password = document.getElementById("txt_Password").value;
            var photo = document.getElementById("img_photo").value;

            // Validate Name
            if (!/^[A-Z][a-zA-Z ]*$/.test(name)) {
                alert("Name allows only alphabets, spaces, and the first letter must be capital.");
                return false;
            }

            // Validate Email
            var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!emailPattern.test(email)) {
                alert("Please enter a valid email address.");
                return false;
            }

            // Validate Contact
            var contactPattern = /^[7-9][0-9]{9}$/; // Indian phone number pattern
            if (!contactPattern.test(contact)) {
                alert("Contact number must start with 7, 8, or 9 and should have 10 digits.");
                return false;
            }

            // Validate Password
            if (password.length < 8 || !/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/.test(password)) {
                alert("Password must be at least 8 characters long and contain at least one number, one uppercase, and one lowercase letter.");
                return false;
            }

            // Validate Photo
            if (!photo) {
                alert("Please upload a photo.");
                return false;
            }

            return true; // Form is valid
        }
    </script>
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

table {
    width: 60%; /* Adjust width as needed */
    border-collapse: collapse;
    margin: 20px auto; /* Center the table */
    background-color: white;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease;
}

th, td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #4169E1 !important; /* Royal Blue */
    color: white !important; /* Ensure text is white */
    text-align: center; /* Center align the header */
}

td {
    background-color: #f9f9f9;
}

tr:hover td {
    background-color: #C0C0C0; /* Silver Grey on hover */
    color: black;
}

/* New Styles for Label Text */
label {
    color: #4169E1; /* Royal Blue for labels */
    font-weight: bold; /* Make label text bold */
}

/* Button Styles */
input[type="submit"] {
    background-color: #4169E1; /* Royal Blue */
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
    width: 100%; /* Full width for button */
    font-size: 16px; /* Larger font size */
    text-align: center; /* Center text */
}

/* Make the table responsive */
@media (max-width: 768px) {
    table {
        width: 100%;
        font-size: 14px;
    }
    th, td {
        padding: 10px;
    }
}
</style>
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

table {
    width: 60%; /* Adjust width as needed */
    border-collapse: collapse;
    margin: 20px auto; /* Center the table */
    background-color: white;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease;
}

th, td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #4169E1 !important; /* Royal Blue */
    color: white !important; /* Ensure text is white */
    text-align: center; /* Center align the header */
}

td {
    background-color: #f9f9f9;
}

tr:hover td {
    background-color: #C0C0C0; /* Silver Grey on hover */
    color: black;
}

/* New Styles for Label Text */
label {
    color: #4169E1; /* Royal Blue for labels */
    font-weight: bold; /* Make label text bold */
}

/* Button Styles */
input[type="submit"] {
    background-color: #4169E1; /* Royal Blue */
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
    width: 100%; /* Full width for button */
    font-size: 16px; /* Larger font size */
    text-align: center; /* Center text */
}

/* Make the table responsive */
@media (max-width: 768px) {
    table {
        width: 100%;
        font-size: 14px;
    }
    th, td {
        padding: 10px;
    }
}
</style>

</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="return validateForm();">
  <table width="200" border="1">
    <tr>
      <td>Name</td>
      <td>
        <label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" required title="Name allows only alphabets, spaces, and the first letter must be capital." pattern="^[A-Z][a-zA-Z ]*$" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="email" name="txt_email" id="txt_email" required /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_Contact"></label>
      <input type="text" name="txt_Contact" id="txt_Contact" required pattern="[7-9]{1}[0-9]{9}" title="Phone number must start with 7-9 followed by 9 digits." /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_Password"></label>
      <input type="password" name="txt_Password" id="txt_Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain at least one number, one uppercase, and one lowercase letter, and be at least 8 characters long." /></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="img_photo"></label>
      <input type="file" name="img_photo" id="img_photo" required /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
  <table width="200" border="1">
    <tr>
      <th style="background-color: #4169E1; color: white; text-align: center;">#</th>
    <th style="background-color: #4169E1; color: white; text-align: center;">Name</th>
    <th style="background-color: #4169E1; color: white; text-align: center;">Email</th>
    <th style="background-color: #4169E1; color: white; text-align: center;">Contact</th>
    <th style="background-color: #4169E1; color: white; text-align: center;">Photo</th>
    <th style="background-color: #4169E1; color: white; text-align: center;">Action</th>
    </tr>
    <?php 
	  $sel="select * from tbl_mechanic where  workshopreg_id='".$_SESSION['workshop']."'";
	$res=$conn->query($sel);
	$i=0;
	while($row=$res->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row['mechanic_name'] ?></td>
      <td><?php echo $row['mechanic_email']?></td>
      <td><?php echo $row['mechanic_contact']?></td>
      <td><img src="../Assets/File/Mechanic/<?php echo $row['mechanic_photo']?>"  width="150" height="150"/></td>
       <td><a href="Mechanic.php?mid=<?php echo $row['mechanic_id']?>">Delete</a> </td>
    </tr>
    <?php
	}
	?>
  </table>

</form>
</body>
</html>
<?php
include('Foot.php');
?>
