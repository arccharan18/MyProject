<!DOCTYPE html>
<html>
  <head>
    <title>Statistics</title>
    <link rel="stylesheet" type="text/css" href="Statistics.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Category', 'Percentage'],
          ['Rural Below Poverty Line', 11.0],
          ['Urban Below Poverty Line', 5.8],
          ['Above Poverty Line', 83.2],
        ]);

        var options = {
          title: 'Population Below Poverty Line in Andhra Pradesh (2021-22)',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <h1>Population Of Farmers vs Total Population in the Country</h1>
    <div style="width: 800px; height: 500px; margin: 0 auto;">
      <canvas id="myChart"></canvas>
    </div>
    <button class="back-to-home" onclick="location.href='demo2.php';">Back to Home</button>
    <script>
      var ctx = document.getElementById('myChart').getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['1951', '1961', '1971', '1981', '1991', '2001', '2011'],
          datasets: [{
            label: 'Total Population',
            data: [361.1, 439.2, 548.2, 683.3, 846.4, 1028.7, 1210.9],
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
          }, {
            label: 'Agricultural Workers',
            data: [97.2, 131.1, 125.7, 148.0, 185.3, 234.1, 263.1],
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });
    </script>

    <h1>State's Farmer Population Below Poverty Line</h1>
    <div id="piechart" style="
  margin: 0 auto;
  display: block;
   width: 1000px; height: 700px;"></div>

   <h1>Gross Value Added by Economic Activity at Constant (2011-2022) Basic Prices in Crs</h1>
   <div style="width: 800px; height: 500px; margin: 0 auto; display: block;">
      <canvas id="myChart2"></canvas>
    </div>

    <script>
      var ctx = document.getElementById('myChart2').getContext('2d');
      var myChart2 = new Chart(ctx, {
        type: 'doughnut',
        data: {
          labels: ['Agriculture, forestry and fishing', 'Crops', 'Livestock', 'Forestry and logging'],
          datasets: [{
					label: 'Gross Value Added',
					data: [2115040, 1127575, 617117, 165624],
					backgroundColor: [
						'rgba(255, 99, 132, 0.6)',
						'rgba(54, 162, 235, 0.6)',
						'rgba(255, 206, 86, 0.6)',
						'rgba(75, 192, 192, 0.6)'
					],
					borderWidth: 1
				}]
			},
			options: {
				cutoutPercentage: 60,
				responsive: false,
				maintainAspectRatio: false
			}
		});
	</script>
    <h1>Growth Rates of Gross State Value Added of Agriculture Sector at Constant (2011-22) Prices of Telugu States</h1>
    <div style="max-width: 900px; margin: 0 auto">
    <canvas id="myChart4"></canvas>
</div>
<script>
    var ctx = document.getElementById('myChart4').getContext('2d');

    // Define the data for the chart
    var data = {
        labels: ['2012-13', '2013-14', '2014-15', '2015-16', '2016-17', '2017-18', '2018-19', '2019-20', '2020-21', '2021-22*'],
        datasets: [
            {
                label: 'Andhra Pradesh',
                data: [4.07, 10.75, 3.55, 8.31, 14.98, 18.23, 3.57, 7.91, 4.16, null],
                borderColor: 'rgb(255, 99, 132)',
                fill: false
            },
            {
                label: 'Telangana',
                data: [8.82, 3.97, -9.68, -7.52, 11.06, 9.59, 6.21, 29.05, 3.60, -1.13],
                borderColor: 'rgb(54, 162, 235)',
                fill: false
            }
        ]
    };

    // Configure the options for the chart
    var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    };

    // Create the chart
    var chart = new Chart(ctx, {
        type: 'line',
        data: data,
        options: options
    });
</script>
<div></div>
<h1>Season-wise Area, Production and Yield of Foodgrains</h1>
<div style="max-width: 900px; margin: 0 auto">
<canvas id="myChart5"></canvas>
</div>
<script>
    var ctx = document.getElementById('myChart5').getContext('2d');

    // Define the data for the chart
    var data = {
        labels: ['2016-17', '2017-18', '2018-19', '2019-20', '2020-21*'],
        datasets: [
            {
                label: 'Kharif Area',
                data: [73.20, 72.00, 72.33, 70.86, 72.06],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            },
            {
                label: 'Rabi Area',
                data: [56.03, 55.53, 52.45, 56.13, 57.29],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            },
            {
                label: 'Kharif Production',
                data: [138.33, 140.47, 141.52, 143.81, 149.56],
                backgroundColor: 'rgba(255, 206, 86, 0.2)',
                borderColor: 'rgba(255, 206, 86, 1)',
                borderWidth: 1
            },
            {
                label: 'Rabi Production',
                data: [136.78, 144.55, 143.69, 153.69, 159.08],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            },
            {
                label: 'Kharif Yield',
                data: [1890, 1951, 1957, 2029, 2076],
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            },
            {
                label: 'Rabi Yield',
                data: [2441, 2603, 2740, 2738, 2777],
                backgroundColor: 'rgba(255, 159, 64, 0.2)',
                borderColor: 'rgba(255, 159, 64, 1)',
                borderWidth: 1
            },
        ]
    };

    // Configure the options for the chart
    var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        },
        elements: {
            line: {
                tension: 0 // disables bezier curves
            }
        }
    };

    // Create the chart
    var chart = new Chart(ctx, {
        type: 'line',
        data: data,
        options: options
    });
</script>
<h1>Stats of All the Pulses</h1>
<div style="width: 1000px; height: 700px; margin: 0 auto;">
  <canvas id="myChart6"></canvas>
</div>

<script>
  // Get the canvas element
  var ctx = document.getElementById('myChart6').getContext('2d');
  var myChart6 = new Chart(ctx,{
    type: 'bar', // changed type to bar
    data: {
    labels: ['Madhya Pradesh', 'Rajasthan', 'Maharashtra', 'Uttar Pradesh', 'Karnataka', 'Gujarat', 'Andhra Pradesh', 'Jharkhand', 'Others'],
    datasets: [{
      label: 'Area (Million Hectares)',
      backgroundColor: 'rgba(255, 99, 132, 0.2)',
      borderColor: 'rgba(255, 99, 132, 1)',
      borderWidth: 1,
      data: [4.89, 6.15, 4.47, 2.38, 3.12, 1.38, 1.24, 0.86, 4.35]
    }, {
      label: 'Production (Million Tonnes)',
      backgroundColor: 'rgba(54, 162, 235, 0.2)',
      borderColor: 'rgba(54, 162, 235, 1)',
      borderWidth: 1,
      data: [16.95, 21.32, 15.49, 8.24, 10.82, 4.80, 4.31, 2.99, 15.07]
    }, {
      label: 'Yield (Kg./Hectare)',
      backgroundColor: 'rgba(255, 206, 86, 0.2)',
      borderColor: 'rgba(255, 206, 86, 1)',
      borderWidth: 1,
      data: [1084, 701, 962, 1079, 680, 1275, 873, 1084, 768]
    }]
  },

  // Define the options for the chart
  options: {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    }
  }
});
</script>
  <h1>Organic Farming</h1>
  <div style="max-width: 1300px; margin: 0 auto">
  <h2>State Wide Production:</h2>
  <img src="OG.png">
  <img src="OG2.png">
  </div>
  <div style="max-width: 900px; margin: 0 auto">
  <h2>Stats of Last 10 Yrs:</h2>
    <img src= "OG3.png">
  </div>
</body>
</html>