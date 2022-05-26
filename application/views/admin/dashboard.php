
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
  theme: "light2",
  animationEnabled: true,
  title: {
    text: "Total No of task per User"
  },
  data: [{
    type: "doughnut",
    indexLabel: "{symbol} - {y}",
    yValueFormatString: "#,##0\"\"",
    showInLegend: true,
    legendText: "{label} : {y}",
    dataPoints: <?php echo json_encode($res, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();
 
}
</script>
</head>
<body>
  <div class="col-md-6">
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
</div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>   