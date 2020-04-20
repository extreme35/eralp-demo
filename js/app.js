 class Chart {
    constructor (arr,elem) {
        this._arr = arr;
        this._elem = elem;
    }
    LineDraw () {
        var data = new google.visualization.arrayToDataTable(this._arr);
        var options = {
            hAxis: {
            title: 'Date'
            },
            vAxis: {
            title: 'Profit'
            },
            'width' : '100%',
            'height': 400,
            'legend': 'none',
            'chartArea': {'width':'88%','height':'80%','left':90,'top':10},
            colors: ['#e0440e']
        };
        var chart = new google.visualization.LineChart(this._elem);
        chart.draw(data, options);
    }
    BarDraw () {
        var data = new google.visualization.arrayToDataTable(this._arr);
        var options = {
            hAxis: {
            title: 'Date'
            },
            vAxis: {
            title: 'Profit'
            },
            'width' : '100%',
            'height': 400,
            'legend': 'none',
            'chartArea': {'width':'88%','height':'80%','left':90,'top':10},
            colors: ['#e0440e','#4572a7']
        };
        var chart = new google.visualization.ColumnChart(this._elem);
        chart.draw(data, options);
    }
    PieDraw () {
        var data = new google.visualization.arrayToDataTable(this._arr);
        var options = {
            is3D: true,
            'width' : '100%',
            'height': 400,
      
            'chartArea': {'width':'100%','height':'80%','left':90,'top':10},
        };
        var chart = new google.visualization.PieChart(this._elem);
        chart.draw(data, options);
    }
 }