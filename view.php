<?php
require('top.inc.php');
$name='';
$email='';
$mobile='';
$department_id='';
$address='';
$birthday='';
$id='';
$image='';
$reason='';


if(isset($_POST['submit']) && isset($_GET['id'])){
	$reason=mysqli_real_escape_string($con,$_POST['reason']);
	$id=mysqli_real_escape_string($con,$_GET['id']);
mysqli_query($con,"update faculty_leave set reason='$reason' where id='$id' ");
header('location:leave.php');
die();
}

if(isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	if($_SESSION['ROLE']==1 && $_SESSION['USER_ID']!=$id){
		die('Access denied');
	}
	$res=mysqli_query($con,"select * from faculty_leave where id='$id'");
	$row=mysqli_fetch_assoc($res);
	$employee_name=$row['employee_name'];
	$leave_from=$row['leave_from'];
	$leave_to=$row['leave_to'];
	$leave_description=$row['leave_description'];
	$leave_status=$row['leave_status'];
	
}
$res=mysqli_query($con,"select * from faculty_leave where id=$id");
?>
<style>
.button {
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 10px;
  width: 100%;
  transition: all 0.5s;
  cursor: pointer;
  margin: 0px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}





body {font-family: Arial, Helvetica, sans-serif;}

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
width: 20%; 
 display: block;
 margin-left: 50%;
  margin-top:5%;
  
  
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 60px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>

<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong> profile</strong></div>
                        <div class="card-body card-block">
                           <form method="post">
							  
									

														
							   <div class="form-group">
									<label class=" form-control-label">Name</label>
									<input type="text" value="<?php echo $employee_name?>" name="name" placeholder="Enter employee name" class="form-control" required disabled>
								</div>
								<div class="form-group">
									<label class=" form-control-label">leave_from</label>
									<input type="email" value="<?php echo $leave_from?>" name="email" placeholder="Enter employee email" class="form-control" required disabled>
								</div>
								<div class="form-group">
									<label class=" form-control-label">leave_to</label>
									<input type="text" value="<?php echo $leave_to?>" name="mobile" placeholder="Enter employee mobile" class="form-control" required disabled>
								</div>
								
								<div class="form-group">
									<label class=" form-control-label">leave_description</label>
									<input type="text" value="<?php echo $leave_description?>" name="address" placeholder="Enter employee address" class="form-control" required disabled>
								</div>
								<div class="form-group">
									<label class=" form-control-label">status</label>
									<input type="text" value="<?php
											if($row['leave_status']==1){
												echo "Applied";
											}if($row['leave_status']==2){
												echo "Approved";
											}if($row['leave_status']==3){
												echo "Rejected";
											}
										   ?>" name="birthday" placeholder="Enter employee birthday" class="form-control" required disabled>
								</div>
<div class="form-group">
									<label class=" form-control-label">reason</label>
									<input type="text"  name="reason" placeholder="Enter reasons...." class="form-control"></div>

							<div class="form-group">
			<button class="button" ><span style="font-size:20px;"><a href="stat.php?id=<?php echo $row['id']?>">click here to know the leave status of faculty </span></button></a></div>
							   <button  type="submit" name="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							   <?php  ?>
		<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>


							  </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
                  
<?php
require('footer.inc.php');
?>