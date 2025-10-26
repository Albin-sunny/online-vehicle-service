<?php
//ob_start();
//include("../Assets/Templates/Head.php");
include('Head.php');     
include("../Assets/Connection/Connection.php");

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search Workshop</title>
<!-- <link rel="stylesheet" href="../Assets/Templates/Search/bootstrap.min.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />  

</head>

<body onload="productCheck()">
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <h5>Filter Workshop</h5>
                    <hr>
                    <h6 class="text-info"> Name</h6>
                    <ul class="list-group">
                       
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="text" onkeyup="productCheck()" class="product_check" id="txt_name">
                                </label>
                            </div>
                        </li>
                    </ul>
                    <br />
                    <h6 class="text-info"> Select District</h6>
                    <ul class="list-group">
                        <?php                           
						 $selCat = "SELECT * from tbl_district";
                            $result = $conn->query($selCat);
                            while ($row=$result->fetch_assoc()) {
                        ?>
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" onclick="changeSub(),productCheck()" class="form-check-input product_check" value="<?php echo $row["district_id"]; ?>" id="category"><?php echo $row["district_name"]; ?>
                                </label>
                            </div>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                    <br />
                    <h6 class="text-info"> Select Place</h6>
                    <ul class="list-group" id="place" onclick="changeLocation()" >
                       
                    </ul>
                    
                    <br />
                    <h6 class="text-info"> Select Location</h6>
                    <ul class="list-group" id="location"  >
                       
                    </ul>
                    
                </div>
                <div class="col-lg-9">
                    <h5 class="text-center" id="textChange">All Workshop</h5>
                    <hr>
                    <div class="row" id="result">
                    </div>

                </div>

            </div>
                        </div>
<script src="../Assets/Templates/Search/jquery.min.js"></script>
        <script src="../Assets/Templates/Search/bootstrap.min.js"></script>
<script src="../Assets/Templates/Search/popper.min.js"></script>
        <script>


function changeSub()
            {
                var cat = get_filter_text('category');
                if (cat.length !== 0)
                {
                    $.ajax({
                        url: "../Assets/AjaxPages/AjaxSearchPlace.php?did=" + cat,
                        success: function(response) {
                            $("#place").html(response);
                        }
                    });

                }
				else
                {
                    $("#place").html("");
                }
			}
				function changeLocation()
            {
                var cat = get_filter_text('place');
                if (cat.length !== 0)
                {
                    $.ajax({
                        url: "../Assets/AjaxPages/AjaxSearchLocation.php?pid=" + cat,
                        success: function(response) {
                            $("#location").html(response);
                        }
                    });

                }
                else
                {
                    $("#location").html("");
                }


                function get_filter_text(text_id)
                {
                    var filterData = [];

                    $('#' + text_id + ':checked').each(function() {
                        filterData.push("\'" + $(this).val() + "\'");
                    });
                    return filterData;
                }
            }

           /* function addCart(id)
            {
                $.ajax({
                    url: "../Assets/AjaxPages/AjaxAddCart.php?id=" + id,
                    success: function(response) {
                        if (response.trim() === "Added to Cart")
                        {
                            $("div.success").fadeIn(300).delay(1500).fadeOut(400);
                        }
                        else if (response.trim() === "Already Added to Cart")
                        {
                            $("div.warning").fadeIn(300).delay(1500).fadeOut(400);
                        }
                        else
                        {
                            $("div.failure").fadeIn(300).delay(1500).fadeOut(400);
                        }
                    }
                });
            }*/


            function productCheck(){
                    $("#loder").show();

                    var action = 'data';
                    var district= get_filter_text('district');
                    var place = get_filter_text('place');
					var location = get_filter_text('location');
					var name = document.getElementById('txt_name').value;
					


                    $.ajax({
                        url: "../Assets/AjaxPages/AjaxSearchworkshop.php?action=" + action +"&district=" + district+"&place=" + place+"&location=" + location+"&name=" + name ,
                        success: function(response) {
                            $("#result").html(response);
                            //$("#loder").hide();
                            $("#textChange").text("Filtered Workshops");
                        }
                    });


                }



                function get_filter_text(text_id)
                {
                    var filterData = [];

                    $('#' + text_id + ':checked').each(function() {
                        filterData.push($(this).val());
                    });
                    return filterData;
                }
            
        </script>
    </body>

</html><?php
include('Foot.php');
?>