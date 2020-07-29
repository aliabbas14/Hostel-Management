<!DOCTYPE html>
<?php 
error_reporting(0);
session_start();
$a[]="";
//if(isset($_POST['submit']))

$conn=mysqli_connect("localhost","root","") or die(mysqli_error($conn));
		$db=mysqli_select_db($conn,"hostel_managment");

	if(isset($_SESSION['profile']))
	{
			$b=$_SESSION['profile'];
			
			$result=mysqli_query($conn,"select * from student where name='".$b."'");
			$a=mysqli_fetch_array($result,MYSQLI_BOTH);
	}
	//}	
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Edit Profile</title>
         

    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Soft Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script src="js/jquery.min.js"></script>
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<script type="text/javascript">
	jQuery(function(){
		jQuery("#edit_profile").click(function(){
			jQuery("#editp").toggle();
			jQuery("#viewp").fadeToggle();
		});
	});
	</script>
	
	<script>
	$("#profileImage").click(function(e) {
    $("#imageUpload").click();
});

function fasterPreview( uploader ) {
    if ( uploader.files && uploader.files[0] ){
          $('#profileImage').attr('src', 
             window.URL.createObjectURL(uploader.files[0]) );
    }
}

$("#imageUpload").change(function(){
    fasterPreview( this );
});
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
    <!--     Fonts and icons     -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/fonts.googleapi.css" rel='stylesheet' type='text/css'>
    <link href="css/pe-icon-7-stroke.css" rel="stylesheet" >
    <link href="css/font-awesome.css" rel="stylesheet" type="text/css">
	<link href="css/profilepic.css" rel="stylesheet" type="text/css">
	<link href="css/editprofile.css" rel="stylesheet" type="text/css">
         <style>
            .tos{
            margin: 30px;
            padding: 10px;
            background-color:whitesmoke;
            color:black;
            font-size: 20px;
            }
            .title{
                text-align: center;
                color: black;
                font-weight:bolder;
            }
            p{
                margin-left: 3px;
                margin-right: 3px;
            }
            .disclaimer
            {
             font-weight:bold;
             font-size: 15px;
            }
   </style>
          <?php include_once ("header2.php"); ?>
    </head>
    <body>

    <!-- <section style="margin-top: 40px;padding-bottom:10px; id="portfolio" class="portfolio-section-1">-->
             
                        
           
	<div class="register-form-main">
	
			<div class="container" id="viewp" >
				<div class="title-div">
                <h3 class="tittle"><span>P</span>rofile</h3>
				<div class="tittle-style"></div>
				</div>	
				
				<div class="register-form">
								<div class="fields-grid">
											
											 <!--<div id="profile-container">
											<image id="profileImage" src="images/te1.jpg" style="width:150;height:200;" />
											<input id="imageUpload" type="file" name="profile_photo" placeholder="Photo" required="" capture>
											</div>-->
                                   
											<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
											 <div class="styled-input">
                                                <input type="text"  value="<?php echo $a[0] ?>" readonly>
											 </div> 
											 
											 <div class="styled-input">
                                                <input type="text" value="<?php echo $a[1] ?>" readonly>
											 </div> 
											 
											 <div class="styled-input">
                                                <input type="text" value="<?php echo $a[2] ?>" readonly>
											 </div> 
											 
											 <div class="styled-input">
                                                <input type="text" value="<?php echo $a[3] ?>" readonly>
											 </div> 
											 
											 <div class="styled-input">
                                                <input type="text" value="<?php echo $a[4] ?>" readonly>
											 </div> 
											 
											 <div class="styled-input">
                                                <input type="text" value="<?php echo $a[5] ?>" readonly>
											 </div> 
											 
											 
											 <div class="styled-input">
                                                <input type="text" value="<?php echo $a[6] ?>" readonly>
											 </div> 
											 
											 
											 <div class="styled-input">
                                                <input type="text" value="<?php echo $a[7] ?>" readonly>
											 </div> 
											  
											 <div class="styled-input">
                                                <input type="text" value="<?php echo $a[8] ?>" readonly>
											 </div> 
 
                                    <button type="submit" class="btn btn-info btn-fill pull-center" id="edit_profile" name="submit">Done</button>
                                    <div class="clearfix"></div>
								</div>
               </div>
                       
                   
                
            
		</div>
		
		
		<!--<div class="container" id="editp">
			<div class="title-div">
                <h3 class="tittle"><Span>E</span>dit <span>P</span>rofile</h3>
				<div class="tittle-style"></div>
            </div>	
			
				<div class="register-form">
                                <form>
								<div class="fields-grid">
                                   
											<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
											<!--<script src="js/jquery.min.js"></script>-->
										<!--	<div id="profile-container">
											<image id="profileImage" src="images/te1.jpg" style="width:150;height:200;" />
											<input id="imageUpload" type="file" name="profile_photo" placeholder="Photo" required="" capture>
											</div>
											<input id="imageUpload" type="file" name="profile_photo" placeholder="Photo" required="" capture>
                                            <div class="styled-input">
                                                <input type="text" placeholder="Name" required>
                                            </div> 
                                           
                                   

                                            <div class="styled-input">
                                                <input type="text" placeholder="Number" required>
                                            </div>
                                                                            
                                            <div class="styled-input">
                                                <input type="email" placeholder="Email" >
                                            </div>
											
											
											<div class="styled-input">
												<input id="datepicker" placeholder="Birth Date" name="Text" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
											</div>
											
											<div class="styled-input">
												<input type="text" placeholder="Phone Number" name="Phone" required="">
											</div>
                                        
                                      
                                            <div class="styled-input agile-styled-input-top">
												<select class="category2" required="">
													<option value="">Gender</option>
													<option value="">Female</option>
													<option value="">Male</option>
													<option value="">Other</option>
												</select>
											</div>
                                        
																
											<div class="styled-input">
												<label class="header">Your Address</label>
												<div class="">
													<input type="text" name="name" placeholder="Address" title="Please enter your Address" required="">
												</div>
												
												<div class="">
													<input type="text" name="name" placeholder="City" title="Please enter your City" required="">
												</div>
												
											</div>
                                            
                                        

                                    
                                    <button type="submit" class="btn btn-info btn-fill pull-center">Update Profile</button>
                                    <div class="clearfix"></div>
								</div>
                                </form>-->
                </div>
                       
                   
                
            
		</div>
	</div>   

</body>
<?php include_once ("footer.php"); ?>
 <!--   Core JS Files   -->
	<script src="js/jquery-2.1.4.min.js"></script>
	<link rel="stylesheet" href="css/jquery-ui.css" />
	<script src="js/jquery-ui.js"></script>
	<script>
		$(function () {
			$("#datepicker,#datepicker1,#datepicker2,#datepicker3").datepicker();
		});
	</script>
	
	
	<!-- bootstrap -->
	<script src="js/bootstrap.js"></script>
	<!-- smooth scrolling -->
	<script src="js/SmoothScroll.min.js"></script>
	<script src="js/move-top.js"></script>
	<script src="js/easing.js"></script>

</html>