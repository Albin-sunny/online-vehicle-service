<?php
include('../Assets/Connection/Connection.php');

include('Head.php');

if (isset($_POST['txt_btn'])) 
{
    $Title = $_POST['txt_Title'];
    $Content = $_POST['txt_content'];

    $ins = "INSERT INTO tbl_complaint(complaint_date,complaint_title,complaint_content,user_id) 
            VALUES (curdate(),'" . $Title . "','" . $Content . "','" . $_SESSION['userid'] . "')";
    
    if ($conn->query($ins)) 
    {
        echo "<script>
        alert('inserted');
        window.location='Complaint.php';
        </script>";
    }
}

if (isset($_GET['id'])) 
{
    $del = "DELETE FROM tbl_complaint WHERE complaint_id=" . $_GET['id'];
    
    if ($conn->query($del)) 
    {
        echo "<script>
        alert('deleted');
        window.location='Complaint.php';
        </script>";
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaint Submission</title>

<style>
  /* body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    
  } */

  h1 {
    text-align: center;
    color: #333;
    margin-top: 20px;
  }

  /* Center the first table (submission table) */
form {
    display: flex;
    justify-content: center;
}

table.center {
    width: auto; /* Keeps the width based on the content */
    margin: 0 auto; /* Horizontally centers the table */
    border-collapse: collapse;
    background-color: #fff;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
}

/* Styling for the second table (complaint list table) */
table {
    width: 70%; /* Complaint list table should fill the width */
    margin: 0 auto; /* Horizontally centers the table */
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #fff;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
}



  th, td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  th {
    background-color: #4CAF50;
    color: white;
  }

  tr:hover {
    background-color: #f1f1f1;
  }

  input[type="text"], textarea {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    font-size: 16px;
    border-radius: 5px;
    width: 100%;
    margin-top: 10px;
  }

  input[type="submit"]:hover {
    background-color: #45a049;
  }

  a {
    color: #4CAF50;
    text-decoration: none;
  }

  a:hover {
    text-decoration: underline;
  }

  .center {
    display: flex;
    align-items: center;
  
            justify-content: center;
  }
  
  /* Responsive Design */
  @media (max-width: 768px) {
    table {
      font-size: 14px;
    }

    th, td {
      padding: 10px;
    }
  }
  
</style>

<script>
function validateForm() {
    var title = document.getElementById('txt_Title').value.trim();
    var content = document.getElementById('txt_content2').value.trim();
    
    if (title === "") {
        alert("Title is required.");
        return false;
    }
    
    if (content === "") {
        alert("Content is required.");
        return false;
    }
    
    return true;
}
</script>

</head>

<body>

<h1>Submit Your Complaint</h1>

<form id="form1" name="form1" method="post" action="" onsubmit="return validateForm();">
    <!-- Complaint Submission Form -->
    <div style="display: flex; justify-content: center;">
        <table class="center">
            <tr>
                <td>Title</td>
                <td><input type="text" name="txt_Title" id="txt_Title" /></td>
            </tr>
            <tr>
                <td>Content</td>
                <td><textarea name="txt_content" id="txt_content2" cols="45" rows="5"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" class="center">
                    <input type="submit" name="txt_btn" id="txt_btn" value="Submit" />
                </td>
            </tr>
        </table>
    </div>
</form>

<!-- Complaint List Table -->
<table>
    <tr>
        <th>SI no</th>
        <th>Title</th>
        <th>Content</th>
        <th>Date</th>
        <th>Reply</th>
        <th>Action</th>
    </tr>
    <?php
        $i = 0;
        // Query to fetch complaints from the database
        $sel = "SELECT * FROM tbl_complaint where user_id='".$_SESSION['userid']."'";
        $row = $conn->query($sel);

        // Loop through each complaint and display it in the table
        while ($data = $row->fetch_assoc()) {
            $i++;
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo htmlspecialchars($data['complaint_title']); ?></td>
        <td><?php echo htmlspecialchars($data['complaint_content']); ?></td>
        <td><?php echo htmlspecialchars($data['complaint_date']); ?></td>
        <td>
            <?php
            if ($data['complaint_status'] == 1) {
                echo htmlspecialchars($data['complaint_reply']);
            } else {
                echo "Not replied";
            }
            ?>
        </td>
        <td><a href="Complaint.php?id=<?php echo htmlspecialchars($data['complaint_id']); ?>">Delete</a></td>
    </tr>
    <?php } ?>
</table>

</body>
</html>

<?php
include('Foot.php');
?>
