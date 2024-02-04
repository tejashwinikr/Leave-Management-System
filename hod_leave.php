<?php
require('top.inc.php');

if(isset($_POST['submit'])){
	$leave_id=mysqli_real_escape_string($con,$_POST['leave_id']);
	$leave_from=mysqli_real_escape_string($con,$_POST['leave_from']);
	$leave_to=mysqli_real_escape_string($con,$_POST['leave_to']);
	$employee_id=$_SESSION['USER_ID'];
	$leave_description=mysqli_real_escape_string($con,$_POST['leave_description']);
	$role=$_SESSION['ROLE'];
	$department_id=$_SESSION['DEPARTMENT_ID'];
	$employee_name=$_SESSION['USER_NAME'];
	

	$sql="insert into `faculty_leave`(leave_id,leave_from,leave_to,employee_id,leave_description,leave_status,role,department_id,employee_name) values('$leave_id','$leave_from','$leave_to','$employee_id','$leave_description',1,'2',$department_id,'$employee_name')";
	mysqli_query($con,$sql);
	header('location:add_leave3.php');
	die();
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Leave Type</strong><small> Form</small></div>
                        <div class="card-body card-block">
                           <form method="post">
						   
								<div class="form-group">
									<label class=" form-control-label">Leave Type</label>
									<select name="leave_id" required class="form-control">
										<option value="">Select Leave</option>
										<?php
										$res=mysqli_query($con,"select * from leave_type order by leave_type desc");
										while($row=mysqli_fetch_assoc($res)){
											echo "<option value=".$row['id'].">".$row['leave_type']."</option>";
										}
										?>
									</select>
								</div>
							   <div class="form-group">
									<label class=" form-control-label">From Date</label>
									<input type="date" name="leave_from"  class="form-control" required min=
     <?php
         echo date('Y-m-d');
     ?> 	 max=<?php
	$date=strtotime(date('Y-m-d'));
          echo $date =date('Y-m-d',strtotime(' 15 days',$date));
     ?>>
								</div>
								<div class="form-group">
									<label class=" form-control-label">To Date</label>
									<input type="date" name="leave_to" class="form-control" required min=<?php
         echo date('Y-m-d');
     ?> 	 max=<?php
	$date=strtotime(date('Y-m-d'));
          echo $date =date('Y-m-d',strtotime(' 15 days',$date));
     ?> >
								</div>
								<div class="form-group">
									<label class=" form-control-label">Leave Description</label>
									<input type="text" name="leave_description" class="form-control" >
								</div>
								
								 <button  type="submit" name="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
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