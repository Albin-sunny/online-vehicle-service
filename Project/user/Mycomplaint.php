<?php
include('Head.php');
include('../Assets/Connection/Connection.php');
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mycomplaint</title>
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
            width: 80%; /* Adjust width as needed */
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
            background-color: #4169E1; /* Royal Blue */
            color: white;
            text-align: center; /* Center align the header */
        }

        td {
            background-color: #f9f9f9;
        }

        tr:hover td {
            background-color: #C0C0C0; /* Silver Grey on hover */
            color: black;
        }

        .delete-button {
            background-color: #ff4d4d; /* Red background */
            color: white; /* White text */
            border: none;
            border-radius: 5px; /* Rounded corners */
            padding: 8px 12px; /* Padding */
            cursor: pointer; /* Pointer cursor on hover */
            transition: background-color 0.3s; /* Transition for smooth effect */
        }

        /* Change color when hovering over the button */
        .delete-button:hover {
            background-color: #e60000; /* Darker red on hover */
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
    <script>
        function confirmDelete(complaintId) {
            // Confirm before deleting
            if (confirm("Are you sure you want to delete this complaint?")) {
                // Redirect to delete script with complaint ID
                window.location.href = 'deleteComplaint.php?id=' + complaintId; // Update the redirect URL accordingly
            }
        }
    </script>
</head>

<body>
<table width="298" border="1">
    <tr>
    <tr>
    <th style="background-color: #4169E1; color: white; text-align: center; width: 22px;">SI no</th>
    <th style="background-color: #4169E1; color: white; text-align: center; width: 38px;">Title</th>
    <th style="background-color: #4169E1; color: white; text-align: center; width: 60px;">Content</th>
    <th style="background-color: #4169E1; color: white; text-align: center; width: 37px;">Date</th>
    <th style="background-color: #4169E1; color: white; text-align: center; width: 47px;">Reply</th>
    <th style="background-color: #4169E1; color: white; text-align: center; width: 54px;">Action</th>
</tr>

     </tr>
     <?php
	 $i=0;
	 $sel=" select * from tbl_complaint where user_id='".$_SESSION['userid']."'";
	 $row=$conn->query($sel);
	 while($data=$row->fetch_assoc())
	 {
		 $i++;
		 
   ?>
         
	   <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['complaint_title']?></td>
      <td><?php echo $data['complaint_content']?></td>
      <td><?php echo $data['complaint_date']?></td>
      <td><?php
	           if($data['complaint_status']==1)
			   {
				   echo $data['complaint_reply'];
			   }
				   else
				   {
					   echo"not replied";
				   }
				    
	      ?></td>
      <td><a href="Complaint.php?id=<?php echo $data['complaint_id']?>">
      delete </a></td>
      <?php
	 }
		 ?>
      
      
    </tr>
  </table>
</body>
</html>
<?php
include('Foot.php');
?>