<?php
require('top.inc.php');

if(isset($_GET['type']) && $_GET['type']=='delete' && isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	mysqli_query($con,"delete from `faculty_leave` where id='$id'");
}
if(isset($_GET['type']) && $_GET['type']=='update' && isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	$status=mysqli_real_escape_string($con,$_GET['status']);
	mysqli_query($con,"update `faculty_leave` set leave_status='$status' where id='$id'");
}
if(($_SESSION['ROLE']==1) && ($_SESSION['DEPARTMENT_ID'])){ 
	$sql="select `faculty_leave`.*, employee.name,employee.role=2  as eid  from `faculty_leave`,employee where `faculty_leave`.employee_id=employee.id order by `faculty_leave`.id desc";
}else{
	$eid=$_SESSION['USER_ID'];
	$sql="select `faculty_leave`.*, employee.name ,employee.id as eid from `faculty_leave`,employee where `faculty_leave`.employee_id='$eid' and `faculty_leave`.employee_id=employee.id order by `faculty_leave`.id desc";
}
$res=mysqli_query($con,$sql);


if($res) 	
{

 $row = mysqli_num_rows($res);
mysqli_free_result($res);
$row1=$row-15;
    
}

 
$dataPoints = array(
	array("label"=> "leave taken", "y"=> $row),
	array("label"=> "leaves remaining", "y"=> $row1),
	
);
	
?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	title:{
		text: "DSATM"
	},
	subtitles: [{
		text: "LEAVE STATUS"
	}],
	data: [{
		type: "pie",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - #percent%",
		yValueFormatString: "?#,##0",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>                   