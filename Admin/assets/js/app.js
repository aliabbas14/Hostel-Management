$(document).ready(function(){
	$.ajax({
		url: "http://localhost/Hackathon/Admin/data.php",
		method: "GET",
		beginAtZero: true,
	
		success: function(data) {
			console.log(data);
			var RequestType = [];
			var Total = [];
			var Total2 = [];

			for(var i in data) {
				RequestType.push(data[i].Hostel);
				Total.push(data[i].Total);
				Total2.push(data[i].Vacant);
			}

			var chartdata = {
				labels: RequestType,
				datasets : [
					{
						label: 'Total',
						backgroundColor: '#26B99A',
						borderColor: '#26B99A',
						hoverBackgroundColor: '#26B99A',
						hoverBorderColor: '#26B99A',
						data: Total
					},
					{
						label: 'Vacant',
						//backgroundColor: 'rgba(25, 235, 255, 0.31)',
						backgroundColor: '#03586A',
						borderColor: '#03586A',
						hoverBackgroundColor: '#03586A',
						hoverBorderColor: '#03586A',
						data: Total2	
					}
				]
			};
			
			var options = {
    responsive: true,
    scales: {
        yAxes: [{
            display: true,
            ticks: {
                beginAtZero: true,
                max: 500,
                min: 0
            }
        }]
    },
};


			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata,
				options: options
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});