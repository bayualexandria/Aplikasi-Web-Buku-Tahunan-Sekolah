(function ($) {
	'use strict';
	$(function () {

		if ($("#sales-chart").length) {
			var SalesChartCanvas = $("#sales-chart").get(0).getContext("2d");
			var SalesChart = new Chart(SalesChartCanvas, {
				type: 'bar',
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
					datasets: [{
							label: 'Offline Sales',
							data: [480, 230, 470, 210, 330],
							backgroundColor: '#8EB0FF'
						},
						{
							label: 'Online Sales',
							data: [400, 340, 550, 480, 170],
							backgroundColor: '#316FFF'
						}
					]
				},
				options: {
					responsive: true,
					maintainAspectRatio: true,
					layout: {
						padding: {
							left: 0,
							right: 0,
							top: 20,
							bottom: 0
						}
					},
					scales: {
						yAxes: [{
							display: true,
							gridLines: {
								display: false,
								drawBorder: false
							},
							ticks: {
								display: false,
								min: 0,
								max: 500
							}
						}],
						xAxes: [{
							stacked: false,
							ticks: {
								beginAtZero: true,
								fontColor: "#9fa0a2"
							},
							gridLines: {
								color: "rgba(0, 0, 0, 0)",
								display: false
							},
							barPercentage: 1
						}]
					},
					legend: {
						display: false
					},
					elements: {
						point: {
							radius: 0
						}
					}
				},
			});
			document.getElementById('sales-legend').innerHTML = SalesChart.generateLegend();
		}

		if ($("#north-america-chart").length) {
			var areaData = {
				labels: ["Selesai", "Proses", "Tahap Penyelesaian 50 %", "Batal", "Order"],
				datasets: [{
					data: [ 2, 50, 50, 10],
					backgroundColor: [
						"greenyellow", "blue", "orange", "red", "silver"
					],
					borderColor: "rgba(0,0,0,0)"
				}]
			};
			var areaOptions = {
				responsive: true,
				maintainAspectRatio: true,
				segmentShowStroke: false,
				cutoutPercentage: 78,
				elements: {
					arc: {
						borderWidth: 4
					}
				},
				legend: {
					display: false
				},
				tooltips: {
					enabled: true
				},
				legendCallback: function (chart) {
					var text = [];
					text.push('<div class="report-chart">');
					text.push('<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: ' + chart.data.datasets[0].backgroundColor[0] + '"></div><p class="mb-0">Selesai</p></div>');
					text.push('<p class="mb-0">22789</p>');
					text.push('</div>');
					text.push('<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: ' + chart.data.datasets[0].backgroundColor[1] + '"></div><p class="mb-0">Proses</p></div>');
					text.push('<p class="mb-0">94678</p>');
					text.push('</div>');
					text.push('<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: ' + chart.data.datasets[0].backgroundColor[2] + '"></div><p class="mb-0">Penyelesaian 50%</p></div>');
					text.push('<p class="mb-0">12097</p>');
					text.push('</div>');
					text.push('<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: ' + chart.data.datasets[0].backgroundColor[3] + '"></div><p class="mb-0">Batal</p></div>');
					text.push('<p class="mb-0">12097</p>');
					text.push('</div>');
					text.push('<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: ' + chart.data.datasets[0].backgroundColor[4] + '"></div><p class="mb-0">Order</p></div>');
					text.push('<p class="mb-0">12097</p>');
					text.push('</div>');
					text.push('</div>');
					return text.join("");
				},
			}
			var northAmericaChartPlugins = {
				beforeDraw: function (chart) {
					var width = chart.chart.width,
						height = chart.chart.height,
						ctx = chart.chart.ctx;

					ctx.restore();
					var fontSize = 3.125;
					ctx.font = "600 " + fontSize + "em sans-serif";
					ctx.textBaseline = "middle";
					ctx.fillStyle = "#000";

					var text = "63",
						textX = Math.round((width - ctx.measureText(text).width) / 2),
						textY = height / 2;

					ctx.fillText(text, textX, textY);
					ctx.save();
				}
			}
			var northAmericaChartCanvas = $("#north-america-chart").get(0).getContext("2d");
			var northAmericaChart = new Chart(northAmericaChartCanvas, {
				type: 'doughnut',
				data: areaData,
				options: areaOptions,
				plugins: northAmericaChartPlugins
			});
			document.getElementById('north-america-legend').innerHTML = northAmericaChart.generateLegend();
		}

	});
})(jQuery);
