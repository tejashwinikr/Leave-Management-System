<?php
require('top.inc.php');
if($_SESSION['ROLE']!=3){
	header('location:add_leave.php?id='.$_SESSION['USER_ID']);
	die();
}
if(isset($_GET['type']) && $_GET['type']=='delete1' && isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	mysqli_query($con,"select from `faculty_leave` where id='$id'");
}
if(isset($_GET['type']) && $_GET['type']=='delete' && isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	mysqli_query($con,"delete from `faculty_leave` where id='$id'");
}
if(isset($_GET['type']) && $_GET['type']=='update' && isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	$status=mysqli_real_escape_string($con,$_GET['status']);
	mysqli_query($con,"update `faculty_leave` set leave_status='$status' where id='$id'");
}
	
//$name=mysqli_real_escape_string($con,$_POST['name']);
	
//if($_SESSION['DEPARTMENT_ID']==5)
//{
//$res=mysqli_query($con,"select * from faculty_leave where department_id=5 and role=2 order by id desc");
//}
//else{
//$res=mysqli_query($con,"select * from faculty_leave where department_id=4 and role=2 order by id desc");
//}
Switch($_SESSION['DEPARTMENT_ID'])
{
case '4':$res=mysqli_query($con,"select * from faculty_leave where department_id=4 and role=2 order by id desc");
break;
case '5':$res=mysqli_query($con,"select * from faculty_leave where department_id=5 and role=2 order by id desc");
break;
case '8':$res=mysqli_query($con,"select * from faculty_leave where department_id=8 and role=2 order by id desc");
break;
case '7':$res=mysqli_query($con,"select * from faculty_leave where department_id=7 and role=2 order by id desc");
break;
default:$res=mysqli_query($con,"select * from faculty_leave where department_id=9 and role=2 order by id desc");
break;
}   
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Leave </h4>
						    <?php if($_SESSION['ROLE']==2){ ?>
						   <h4 class="box_title_link"><a href="hod_leave.php">Add Leave</a> </h4>
							
							<?php }elseif($_SESSION['ROLE']==3){ ?>
							 <h4 class="box_title_link"><a href="add_leave.php">Add Leave</a> </h4>
							 
							  <?php } ?>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th width="5%">S.No</th>
                                       <th width="5%">ID</th>
									   <th width="15%">Employee Name</th>
                                       <th width="14%">From</th>
									   <th width="14%">To</th>
									   <th width="15%">Description</th>
									    <th width="10%">role</th>
										<th width="18%">Leave Status</th>
									    
									   <th width="10%"></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
									$i=1;
									while($row=mysqli_fetch_assoc($res)){?>
									<tr>
                                       <td><?php echo $i?></td>
									   <td><?php echo $row['id']?></td>
									   <td><?php echo $row['employee_name'].' ('.$row['id'].')'?></td>
                                       <td><?php echo $row['leave_from']?></td>
									   <td><?php echo $row['leave_to']?></td>
									   <td><?php echo $row['leave_description']?></td>
									   <td><?php echo $row['role']?></td>		
									
							
	
									   
										<td>
										   <?php
											if($row['leave_status']==1){
												echo "Applied";
											}if($row['leave_status']==2){
												echo "Approved";
											}if($row['leave_status']==3){
												echo "Rejected";
											}
										   ?>
										   <?php if($_SESSION['ROLE']==3) { ?>
										   <select class="form-control" onchange="update_leave_status('<?php echo $row['id']?>',this.options[this.selectedIndex].value)">
											<option value="">Update Status</option>
											<option value="2">Approved</option>
											<option value="3">Rejected</option>
										   </select>
											
										   <?php } ?>
									   </td>
									   <td>
									   <?php
									   if($row['leave_status']==1){ ?>
									   <a href="add_leave2.php?id=<?php echo $row['id']?>&type=delete">Delete</a>
									<a href="view.php?id=<?php echo $row['id']?>">more</a>
									   <?php } elseif ($row['leave_status']==1){ ?>
									<a href="view.php?id=<?php echo $row['id']?>">more</a><?php }else{?>
									<a href="view.php?id=<?php echo $row['id']?>">more</a><?php }?>
									   </td>
								           
                                    </tr>
									<?php 
									$i++;
									} ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
         <script>
		 function update_leave_status(id,select_value){
			window.location.href='leave.php?id='+id+'&type=update&status='+select_value;
		 }
		 </script>
<?php
require('footer.inc.php');
?>