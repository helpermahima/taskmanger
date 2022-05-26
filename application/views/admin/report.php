<?php
 
$dataPoints = array( 
	array("y" => "m","label" => "March" ),
	array("y" => 12,"label" => "April" ),
	array("y" => 28,"label" => "May" ),
	array("y" => 18,"label" => "June" ),
	array("y" => 41,"label" => "July" )
);
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "Task per Month"
	},
	axisY: {
		title: "No of tasks",
		includeZero: true,
		prefix: "",
		suffix:  ""
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0",
		indexLabel: "{label}",
		indexLabelPlacement: "inside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "white",
		dataPoints: <?php echo json_encode($result, JSON_NUMERIC_CHECK); ?>
	}]
});

chart.render();
// function compareDataPoint(dataPoint1, dataPoint2) {
// // instead of label you can also use dataPoint.x  or dataPoint.y depends on you requirment
// 	if (dataPoint1.label < dataPoint2.label){return -1}
// 	if ( dataPoint1.label > dataPoint2.label){return 1}
// 	return 0
// }
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>