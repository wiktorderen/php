
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 750px;
            margin: 0 auto;
        }
    </style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>
<body>
    <div class="wrapper" id = "testdiv">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
					<br><br>
					<a href="index.php" class="btn btn-primary">Powrót na strone główną</a>
					<br>
                    <div class="page-header">
                        <h1>Wykres cen kostek</h1>
						<div id="chartContainer" style="height: 370px; width: 100%;"></div>
						                    </div>
					<div style="height:20px; width: 730px; background-color: WHITE; position: absolute; margin-top: -42px;"></div>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>

<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Raport w postaci wykresu słupkowego"
	},
	axisY: {
		title: "Cena"
	},
	data: [{
		type: "column",
		yValueFormatString: "###,## zł",
		dataPoints: [{"y":56,"label":"7 DaYan GuHong"},{"y":49,"label":"5 YJ GuanFu"},{"y":100,"label":"8 DaYan Panshi"},{"y":null,"label":null},{"y":null,"label":null}]	}]
});
chart.render();
 
}
</script>

