<?php
require('top.inc.php');
if($_SESSION['ROLE']!=3){
	header('location:add_employee2.php?id='.$_SESSION['USER_ID']);
	die();
}
if(isset($_GET['type']) && $_GET['type']=='delete' && isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	mysqli_query($con,"delete from employee where id='$id'");
}
	
//if($_SESSION['DEPARTMENT_ID']==5)
//{
//$res=mysqli_query($con,"select * from employee where department_id=5 and role=2 order by id desc");
//}
//else{
//$res=mysqli_query($con,"select * from employee where department_id=4 and role=2 order by id desc");
//}
Switch($_SESSION['DEPARTMENT_ID'])
{
case '4':$res=mysqli_query($con,"select * from employee where department_id=4 and role=2 order by id desc");
break;
case '5':$res=mysqli_query($con,"select * from employee where department_id=5 and role=2 order by id desc");
break;
case '6':$res=mysqli_query($con,"select * from employee where department_id=6 and role=2 order by id desc");
break;
case '7':$res=mysqli_query($con,"select * from employee where department_id=7 and role=2 order by id desc");
break;
case '8':$res=mysqli_query($con,"select * from employee where department_id=8 and role=2 order by id desc");
break;
case '9':$res=mysqli_query($con,"select * from employee where department_id=9 and role=2 order by id desc");
break;
case '10':$res=mysqli_query($con,"select * from employee where department_id=10 and role=2 order by id desc");
break;
default:$res=mysqli_query($con,"select * from employee where department_id=11 and role=2 order by id desc");
break;
} 	

?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Employee Master </h4>
						   <h4 class="box_title_link"><a href="add_employee2.php">Add Employee</a> </h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th width="5%">S.No</th>
                                       <th width="5%">ID</th>
                                       <th width="20%">Name</th>
									   <th width="15%">Email</th>
									   <th width="15%">Mobile</th>
									   <th width="15%">image</th>
									   
									   
                                       <th width="20%"></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
									$i=1;
									while($row=mysqli_fetch_assoc($res)){?>
									<tr>
                                       <td><?php echo $i?></td>
									   <td><?php echo $row['id']?></td>
                                       <td><?php echo $row['name']?></td>
									   <td><?php echo $row['email']?></td>
									   <td><?php echo $row['mobile']?></td>
								          <td><?php echo "<img src='image/".$row['image']."'style='width:100px;height:60px;' >"?></td>
									   
									   <td><a href="add_employee2.php?id=<?php echo $row['id']?>">Edit</a> <a href="employee.php?id=<?php echo $row['id']?>&type=delete">Delete</a></td>
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
         
<?php
require('footer.inc.php');
?>