<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
			
				<li class="ts-label">Main</li>
				<?php if(isset($_SESSION['admin']))
				{ ?>
					<li><a href="dashboard.php"><i class="fa fa-desktop"></i>Dashboard</a></li>
					<li><a href="add_admin.php"><i class="fa fa-user"></i> Add admin</a></li>
<li><a href="add_hostel.php"><i class="fa fa-files-o"></i>Add Hostel</a></li>
<li><a href="display_hostel.php"><i class="fa fa-file-o"></i>Display Hostel</a></li>
<li><a href="display_student.php"><i class="fa fa-file-o"></i>Display Student</a></li>
<li><a href="adminout.php"><i class="fa fa-file-o"></i>log out</a></li>
<?php } ?>
				
				<?php 
				if(!isset($_SESSION['admin']))
				{?>
				<li><a href="index.php"><i class="fa fa-users"></i> Hostel Login</a></li>
				<li><a href="admin_login.php"><i class="fa fa-user"></i> Admin Login</a></li>
				
				
				
				<?php 
				}?>

			</ul>
		</nav>