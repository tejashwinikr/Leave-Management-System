	 <?php
require('db.inc.php');
$image='';
if(!isset($_SESSION['ROLE'])){
	header('location:login.php');
	die();
}
if(isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	if($_SESSION['ROLE']==1 && $_SESSION['USER_ID']!=$id){
		die('Access denied');
	}
$image=$row['image'];
	
}
$res=mysqli_query($con,"select * from employee where id='$id'");

	
?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Dashboard Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/normalize.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   </head>
   <body>
      <aside id="left-panel" class="left-panel">
         <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
               <ul class="nav navbar-nav">
                  <li class="menu-title">Menu</li>
                  <?php if($_SESSION['ROLE']==1){ ?>
				 <li class="menu-item-has-children dropdown">
                     <a href="hod_profile.php?id=<?php echo $_SESSION['USER_ID']?>" > Profile</a>
                  </li>
				  <li class="menu-item-has-children dropdown">
                     <a href="index.php" > Departments</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="leave_type.php" > Leave Types</a>
                  </li>
				  <li class="menu-item-has-children dropdown">
                     <a href="employee2.php" > hod</a>
                  </li>
		<li class="menu-item-has-children dropdown">
                     <a href="leave2.php" > Leave approval</a>
                  </li>
				  <?php }elseif($_SESSION['ROLE']==2) { ?>
				  <li class="menu-item-has-children dropdown">
                     <a href="hod_profile.php?id=<?php echo $_SESSION['USER_ID']?>" > Profile</a>
                  </li>
		<li class="menu-item-has-children dropdown">
                     <a href="add_leave3.php" > Leave</a>
                  </li>	
	   
			<li class="menu-item-has-children dropdown">
                     <a href="stat.php" > Statastics of leave</a>
                  </li>					  
			<?php }else{ ?>
				  <li class="menu-item-has-children dropdown">
                     <a href="hod_profile.php?id=<?php echo $_SESSION['USER_ID']?>" > Profile</a>
                  </li>
			<li class="menu-item-has-children dropdown">
                     <a href="employee.php" > Employee Master</a>
                  </li>
		<li class="menu-item-has-children dropdown">
                     <a href="add_leave2.php" > Leave</a>
                  </li>
		<li class="menu-item-has-children dropdown">
                     <a href="stat2.php" > Statastics of leave</a>
                  </li>	
			<?php } ?>	
			
               </ul>
            </div>
         </nav>
      </aside>
      <div id="right-panel" class="right-panel">
         <header id="header" class="header">
            <div class="top-left">
               <div class="navbar-header">
                  <a class="navbar-brand" href="index.php"><img src="images/pesce1.jpeg" alt="Logo"style="width:150px;height:40px;"></a>
                  <a class="navbar-brand hidden" href="index.php"><img src="images/logo2.png" alt="Logo" ></a>
                  <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
               </div>
            </div>
		

            <div class="top-right">
               <div class="header-menu">
                  <div class="user-area dropdown float-right">

                     <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome <?php $i=1;
									echo strtoupper($_SESSION['USER_NAME']);
 									                               	
						 
									$i=1;
									//while($row=mysqli_fetch_assoc($res))
{?>
					
									<?php echo "<img src='image/".$_SESSION['IMAGE']."'style='width:30px;height:30px;border-radius:50%;' >"?>
									<?php 
									$i++;
									} ?>
				
	</a>
                     <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
                     </div>
                  </div>
               </div>
            </div>
         </header>