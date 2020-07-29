
<?php 
include_once('header2.php');
?>
	<div class="contact-lsleft" style="margin-top:0%;">
		<div class="container">
			<div class="address-grid">
				<h4>Feedback</h4>
				
			</div>
			<div class="contact-grid agileits">
				
				<form action="#" method="post">
					<div class="">
						<input type="text" name="name" placeholder="Name" required="">
					</div>
					<div class="">
						<input type="email" name="email" placeholder="Email" required="">
					</div>
					
					<div class="">
						<textarea name="message" placeholder="Message..." required=""></textarea>
					</div>
					<input type="submit" value="Submit" name="submit">
				</form>
			</div>
		</div>
	</div>
	<!-- //contact -->
	
	<?php include_once("footer.php");?>
	
	<!--/footer -->


<?php

		
	
if(isset($_POST['submit']))
{
	$conn=mysqli_connect("localhost","root","") or die(mysqli_error());
		$db=mysqli_select_db($conn,"hostel_managment");
	$name=$_POST['name'];
	$email=$_POST['email'];
	$message=$_POST['message'];
	$y="insert into feedback(name,email,message) values ('".$name."','".$email."','".$message."')";
	$result=mysqli_query($conn,$y);
	if($result)
		{
			echo"<script>alert('your message successfully send');</script>";
		}
		
		else
		{
			echo "something went wrong!!";
		}

}

?>