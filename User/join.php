<?php
	error_reporting(0);
	session_start();

	$conn=mysqli_connect("localhost","root","") or die(mysqli_error($conn));
	$db=mysqli_select_db($conn,"hostel_managment");
	//echo "<script>alert('Yo7')</script>";
	if(!isset($_SESSION['student_id']))
	{
		header('location:signup.php');
	}

	$x="select * from student where email='".$_SESSION['login']."'";
	//echo $x;
	$result=mysqli_query($conn,$x);
	if(mysqli_num_rows($result) > 0)
	{
		//echo "<script>alert('Yo1')</script>";
		 while($row = mysqli_fetch_array($result)) 
			{
				//echo "<script>alert('Yo2')</script>";
				if($row['name']!='')
				{
					//echo "<script>alert('Yo')</script>";
					$_SESSION['add']="1";
					header('location:hostel.php');			
				}
				else

				{
		//echo "<script>alert('You Have already ')</script>";
				}


			}

		
	}
	else
	{
		echo "<script>alert('You ')</script>";
	}
	
	
	

?>
<!DOCTYPE html>


<html lang="zxx">

<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-git.js"></script>
	<script>

/*	function listbox_selectall(listID, isSelect) {
		var listbox = document.getElementById(listID);
		for(var count=0; count < listbox.options.length; count++) {
			listbox.options[count].selected = isSelect;
	}
}
function listbox_moveacross(sourceID, destID) {
	var src = document.getElementById(sourceID);
	var dest = document.getElementById(destID);

	for(var count=0; count < src.options.length; count++) {

		if(src.options[count].selected == true) {
				var option = src.options[count];

				var newOption = document.createElement("option");
				newOption.value = option.value;
				newOption.text = option.text;
				newOption.selected = true;
				try {
						 dest.add(newOption, null); //Standard
						 src.remove(count, null);
				 }catch(error) {
						 dest.add(newOption); // IE only
						 src.remove(count);
				 }
				count--;
		}
	}
}*/
	$(window).on('load', function() {
/*
 * Original example found here: http://www.jquerybyexample.net/2012/05/how-to-move-items-between-listbox-using.html
 * Modified by Esau Silva to support 'Move ALL items to left/right' and add better stylingon on Jan 28, 2016.
 */ 
 


(function () {
    $('#btnRight').click(function (e) {
        var selectedOpts = $('#lstBox1 option:selected');
        if (selectedOpts.length == 0) {
            alert("Nothing to move.");
            e.preventDefault();
        }

        $('#lstBox2').append($(selectedOpts).clone());
        $(selectedOpts).remove();
        e.preventDefault();
    });

    $('#btnAllRight').click(function (e) {
        var selectedOpts = $('#lstBox1 option');
        if (selectedOpts.length == 0) {
            alert("Nothing to move.");
            e.preventDefault();
        }

        $('#lstBox2').append($(selectedOpts).clone());
        $(selectedOpts).remove();
        e.preventDefault();
    });

    $('#btnLeft').click(function (e) {
        var selectedOpts = $('#lstBox2 option:selected');
        if (selectedOpts.length == 0) {
            alert("Nothing to move.");
            e.preventDefault();
        }

        $('#lstBox1').append($(selectedOpts).clone());
        $(selectedOpts).remove();
        e.preventDefault();
    });

    $('#btnAllLeft').click(function (e) {
        var selectedOpts = $('#lstBox2 option');
        if (selectedOpts.length == 0) {
            alert("Nothing to move.");
            e.preventDefault();
        }

        $('#lstBox1').append($(selectedOpts).clone());
        $(selectedOpts).remove();
        e.preventDefault();
    });
}(jQuery));

});//]]> 
</script>
<script type="text/javascript">
function listbox_selectall(listID, isSelect) {
		var listbox = document.getElementById(listID);
		for(var count=0; count < listbox.options.length; count++) {
			listbox.options[count].selected = isSelect;
			alert(listbox);
	}
}
function submit() {

     listbox_selectall('lstBox2', true);
     return true;
}

	</script>
	
	<title>Best Study an Education Category Bootstrap Responsive Website Template | Join Us :: w3layouts</title>
	<!-- meta-tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Soft Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
		
	</script>
	<!-- //meta-tags -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- fonts -->
	<link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>

<body>
	<!-- header -->
	<?php include_once("header2.php");?>
	<div class="register-form-main">
		<div class="container">
			<div class="title-div">
				<h3 class="tittle">
					<span>A</span>dmission
					<span>F</span>orm
				</h3>
				<div class="tittle-style">

				</div>
			</div>
			<div class="register-form">
				<form method="post" enctype="multipart/form-data">

					<input type="submit" name="male" value="Male" style="margin-left: 19%;width: 30%" formnovalidate="">
				<input type="submit" name="female" value="Female" style="width: 30%" formnovalidate="">
					<div class="fields-grid">
						<div class="styled-input">
							<input type="text" placeholder="Your Name" name="first" required="">
						</div>
						<!--<div class="styled-input">
							<input id="datepicker" data-date-format="YYYY MM DD" placeholder="Birth Date" name="dob" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'yyyy/mm/dd';}"
							    required="">-->
							    <input type="date" required="" name="dob" style="    font-size: 16px;
    color: #5a5656;
    padding: 12px;
    border: 0;
    width: 100%;
    border-bottom: 1px solid rgba(0, 0, 0, 0.45);
    background: none;
    outline: none;
    margin-bottom: 18px;"> 
						</div>
						<!--<div class="styled-input agile-styled-input-top">
							<select class="category2" required="">
							
								<option value="">Male</option>
								<option value="">Female</option>
							
							</select>
						</div>-->
						
						<div class="styled-input agile-styled-input-top">
							<select class="category2" required="" name="category">
								<?php 
									$conn = mysqli_connect("localhost","root","");
									$db = mysqli_select_db($conn,"hostel_managment");
									$result=mysqli_query($conn,"select * from category");
									while ($a=mysqli_fetch_array($result)) {
										echo "<option value=".$a['category_id'].">".$a['category']."</option>";
									}
								?>
							
							</select>
						</div>
						<!--<div class="styled-input">
							<input type="email" placeholder="Your E-mail" name="email" required="">
						</div>-->
						<div class="styled-input">
							<input type="tel" placeholder="Phone Number" name="phone" required="" style="font-size: 16px;
    color: #5a5656;
    padding: 12px;
    border: 0;
    width: 100%;
    border-bottom: 1px solid rgba(0, 0, 0, 0.45);
    background: none;
    outline: none;
    margin-bottom: 18px;">
						</div>

						<div>	
							<select class="category2" name="stream">	
									<option value="B.E.">B.E.</option>
									<option value="Dipoma">Dipoma</option>
									<option value="M.C.A">M.C.A</option>
									<option value="B.C.A">B.C.A</option>
									<option value="B.B.A">B.B.A</option>
									<option value="M.B.A">M.B.A</option>
									<option value="M.S.C.I.T">M.S.C.I.T</option>
							</select>
						</div>
						
						<div class="styled-input">
							<input type="number" min="0" placeholder="Enter Your perecentage" name="merit" required="" style="	font-size: 16px;
    color: #5a5656;
    padding: 12px;
    border: 0;
    width: 100%;
    border-bottom: 1px solid rgba(0, 0, 0, 0.45);
    background: none;
    outline: none;
    margin-bottom: 18px;">

    <div>	

    		<input type="file" name="image" /> 
    </div>
						</div>
						<div class="styled-input">
							<label class="header">Select Hostel</label>
							</div>
						<div class="styled-input agile-styled-input-top">
						<!--here choise started0-->
						<div class="subject-info-box-1">
						
  <select multiple="multiple" id='lstBox1' class="form-control">
   <?php 
  //s$gen="";
					if(isset($_POST['male']))
					{
							$_SESSION['gen']="male";
						$conn=mysqli_connect("localhost","root","") or die(mysqli_error($conn));
		
						$db=mysqli_select_db($conn,"hostel_managment")or die(mysqli_error($conn));
							$GLOBALS['$gen']="male";
							//secho "<script type='text/javascript'>alert($GLOBALS['$gen'])</script>";
			$result1=mysqli_query($conn,"select * from hostel where boys=1");
		
			while($a=mysqli_fetch_array($result1))
			{
				
					echo "<option value=".$a['name'].">".$a['name']."</option>";
			}	
			
					}



					if(isset($_POST['female'])){

						$_SESSION['gen']="female";

						$conn=mysqli_connect("localhost","root","") or die(mysqli_error($conn));
		
						$db=mysqli_select_db($conn,"hostel_managment")or die(mysqli_error($conn));
							$GLOBALS['$gen']="female";
							//echo "<script type='text/javascript'>alert('$gen')</script>";
			$result1=mysqli_query($conn,"select * from hostel where boys=0");
		
			while($a=mysqli_fetch_array($result1))
			{
				
					echo "<option value=".$a['name'].">".$a['name']."</option>";
			}	
			//echo "<script type='text/javascript'>alert($gen)</script>";
					}

					
				?>
  </select>
</div>
<div class="subject-info-arrows text-center">
  <!--<input type="button" id="btnAllRight" value=">>" class="btn btn-default" /><br />-->
  <input type="button" id="btnRight" value=">" class="btn btn-default" /><br />
  <br>
  <input type="button" id="btnLeft" value="<" class="btn btn-default" /><br />
  
</div>

				
						<div class="subject-info-box-2">
						
  <select multiple="multiple" name="sls[]" id='lstBox2' class="form-control">
  </select>
  <div class="clearfix"></div>
</div>

							<span></span>
						</div><br><br>
						<div class="styled-input">
							
							<div class="">
								<input type="text" name="address" placeholder="Address" title="Please enter your Address" required="" >
							</div>
							
							<div class="">
								<input type="text" name="city" placeholder="City" title="Please enter your City" required="">
							</div>

							<div>	
									<input type="number" name="distance" required="" min=0 name="distance" oninput="validity.valid||(value='')" placeholder="Distance" style="font-size: 16px;
    color: #5a5656;
    padding: 12px;
    border: 0;
    width: 100%;
    border-bottom: 1px solid rgba(0, 0, 0, 0.45);
    background: none;
    outline: none;
    margin-bottom: 18px;">
							</div>

							<select class="category2" name="state">	
									<option value="Gujarat">Gujarat</option>
									<option value="Other">Other</option>
							</select>
							
						</div>
						<div class="clearfix"> </div>
						<input type="submit" value="Submit" id="lso" name="submit" formnovalidate="">
					</div>
					
				</form>
			<!-- </div> -->
<script>
	$(document).ready(function(){
		  $('#lso').click(function() {
				$('#lstBox2 option').prop('selected', true);
			});
	});
	</script>
	
		<!--<input type="submit" id="sel" value="submitselk">-->
			<?php
			
				if(isset($_POST['submit']))
				{
						//print_r($_POST['sls']);
						//  echo "<script type='text/javascript'>alert('hiww')</script>";
					/*	if($_FILES["image"]["name"])
    {
    	echo "<script type='text/javascript'>alert('hiww1')</script>";
      
}
    else{

    	//echo "<script>alert('You have uploaded 3434  " .$imageFileType ."  file. Sorry, only JPG, JPEG, PNG & GIF files are allowed!!')</script>";
    	echo "<script type='text/javascript'>alert('hiww2')</script>";
        // echo " You have uploaded <b> " .$imageFileType ."  </b>file.</br> Sorry, only JPG, JPEG, PNG & GIF files are allowed!!";
    }*/
    if($_FILES['image']['name'])
    {
    //	echo "<script type='text/javascript'>alert('hiww1')</script>";

    //	echo "<script type='text/javascript'>alert('hiww1')</script>";

    $check = getimagesize($_FILES["image"]["tmp_name"]);
 //echo "<script type='text/javascript'>alert('hiww2')</script>";
    // $fileExtension = $_FILES['image']['name'];
      $imageFileType = strtoupper(pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION));
   //   echo "<script type='text/javascript'>alert('hiww3')</script>";
    if($check !== false){
      //echo "<script type='text/javascript'>alert('hiww4')</script>";
        $image = $_FILES['image']['tmp_name'];          

       
        $imgContent = addslashes(file_get_contents($image)); 



if($imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG"&& $imageFileType != "GIF" ) 
{
    
 echo "<script>alert(' You have uploaded  " .$imageFileType ."  file. Sorry, only JPG, JPEG, PNG & GIF files are allowed!!')</script>";
   // echo " You have uploaded <b> " .$imageFileType ."  </b>file.</br> Sorry, only JPG, JPEG, PNG & GIF files are allowed!!";
}

    
    else
    {
//echo "<script type='text/javascript'>alert('hiww5')</script>";
						
    					//$_SESSION['profile']=
						$stu=$_SESSION['student_id'];
						//echo $stu;
						 //"<script type='text/javascript'>alert('$stu;')</script>";
					$p_string = implode($_POST['sls'],",");
				//echo $p_string;	
				$name=$_POST['first'];
				$_SESSION['profile']=$name;
				$dob=$_POST['dob'];
				$cat=$_POST['category'];
				$email=$_POST['email'];
				$phone=$_POST['phone'];
				$merit=$_POST['merit'];
				$address=$_POST['address'];
				$city=$_POST['city'];
				$stream=$_POST['stream'];
				$mark=$_FILES["image"]["name"];
				$distance=$_POST['distance'];
				$state=$_POST['state'];
				$a=$_SESSION['gen'];
//echo "<script type='text/javascript'>alert('$dob;')</script>";
				
					$dataTime = date("Y-m-d H:i:s");

					$g="update `student` SET `name`='".$name."',`gender`='".$a."',`dob`='".$dob."',`phone`='".$phone."',`address`='".$address."',`city`='".$city."',`merit_rank`='".$merit."',`choice`='".$p_string."',`category_id`='".$cat."',`stream`='".$stream."',`document`='".$imgContent."',`distance`='".$distance."',`state`='".$state."',`datetime`='".$dataTime."' WHERE stu_id=".$stu;
					//echo $g;



			
				$conn=mysqli_connect("localhost","root","") or die(mysqli_error($conn));
		
						$db=mysqli_select_db($conn,"hostel_managment")or die(mysqli_error($conn));
						$y="insert into student(name,gender,dob,phone,address,city,merit_rank,choice,email,category_id)values('".$name."','".$a."','".$dob."','".$phone."','".$address."','".$city."','".$merit."','".$p_string."','".$email."','".$cat."')";


						$result=mysqli_query($conn,$g);
							
								$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
//echo $target_file;
	if($result && move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
           //echo "<div style=\" color:green;font-size:120%\">The file ". basename( $_FILES["image"]["name"]). " has been uploaded. </div>";
										echo "<script>alert('registration process completed.')</script>";
        }else{
        	echo "<script>alert('Please contact your administrator!!')</script>";
            //echo "File upload failed, please try again.";
        }        
   

									
							
							
    }
    }
}
else
{
	echo "<script>alert('You have uploaded " .$imageFileType ."  file. Sorry, only JPG, JPEG, PNG & GIF files are allowed!!')</script>";
}





							


				}

				
			?>
		</div>
	</div>

	<!-- footer -->
	<?php include_once("footer.php");?>	<!--/footer -->

	<!-- js files -->
	<!-- js -->
	<script src="js/jquery-2.1.4.min.js"></script>
	<!-- bootstrap -->
	<script src="js/bootstrap.js"></script>
	<!-- Calendar -->
	<link rel="stylesheet" href="css/jquery-ui.css" />
	<script src="js/jquery-ui.js"></script>
	<script>
		$(function () {
			$("#datepicker,#datepicker1,#datepicker2,#datepicker3").datepicker();
		});
	</script>
	<!-- //Calendar -->
	<!-- smooth scrolling -->
	<script src="js/SmoothScroll.min.js"></script>
	<script src="js/move-top.js"></script>
	<script src="js/easing.js"></script>
	<!-- here stars scrolling icon -->
	<script>
		$(document).ready(function () {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //here ends scrolling icon -->
	<!-- smooth scrolling -->
	<!-- //js-files -->

</body>
</html>