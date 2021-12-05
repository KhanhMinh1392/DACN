
$(function () {
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d');
    var array1 = document.getElementById('total1').value;
    var array2 = document.getElementById('total2').value;
    var array3 = document.getElementById('total3').value;
    var array4 = document.getElementById('total4').value;
    var array5 = document.getElementById('total5').value;
    var array6 = document.getElementById('total6').value;
    var array7 = document.getElementById('total7').value;
    var array8 = document.getElementById('total8').value;
    var array9 = document.getElementById('total9').value;
    var array10 = document.getElementById('total10').value;
    var array11 = document.getElementById('total11').value;
    var array12 = document.getElementById('total12').value;
    var areaChartData = {
    labels: ['Tháng 1', 'Tháng 2', 'thàng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
    datasets: [
    {
    label: 'This year',
    backgroundColor: 'rgba(60,141,188,0.9)',
    borderColor: 'rgba(60,141,188,0.8)',
    pointRadius: false,
    pointColor: '#3b8bba',
    pointStrokeColor: 'rgba(60,141,188,1)',
    pointHighlightFill: '#fff',
    pointHighlightStroke: 'rgba(60,141,188,1)',
    data: [array1, array2, array3, array4, array5, array6, array7, array8, array9, array10, array11, array12]
    },
    {
    label: 'Last year',
    backgroundColor: 'rgba(210, 214, 222, 1)',
    borderColor: 'rgba(210, 214, 222, 1)',
    pointRadius: false,
    pointColor: 'rgba(210, 214, 222, 1)',
    pointStrokeColor: '#c1c7d1',
    pointHighlightFill: '#fff',
    pointHighlightStroke: 'rgba(220,220,220,1)',
    data: [6500000.000, 5900000.000, 8000000.000, 8100000.000, 5600000.000, 5500000.000, 4000000.000, 6000000.000, 7000000.000, 9000000.000, 5000000.000, 3000000.000]
    },
        ]
    }

    var areaChartOptions = {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
        display: false
    },
    scales: {
    xAxes: [{
    gridLines: {
    display: false,
    }
    }],
    yAxes: [{
    gridLines: {
    display: false,
    }
    }]
    }
    }

    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
    type: 'line',
    data: areaChartData,
    options: areaChartOptions
    })
    })

