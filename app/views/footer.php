    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="js/app.js"></script>
    <script>
        var chartType = document.getElementById('chartType').value;
        var chartTab = document.getElementById('chartTab').value;
        $(document).ready(function() {
            $('#history').DataTable( {
                "ajax": 'data/history.txt'
            } );
            
            load();
            
        } );

        function load(){
            if(chartTab == "performance"){
                getPerformance();
                btnShow();
            }else if(chartTab == "trading"){
                getTrading();
                btnHide();
            }else{
                getProfit();
                btnShow();
            }
        }

        function getProfit(){
            google.charts.load('current', {packages: ['corechart', 'line', 'timeline'], 'language': 'tr'});
            if(chartType == 'usd'){
                google.charts.setOnLoadCallback(profitUsdChartDraw);
            }else{
                google.charts.setOnLoadCallback(profitChartDraw);
            }
        }		

        function profitChartDraw() {
            var jsonData = $.ajax({
                url: "data/profit.json",
                dataType: "json",
                async: false,
                success: function (data) {
                    var arrSales = [['date', 'Profit (Pips)']];
                    $.each(data, function (index, value) {
                        var d = new Date(value.Date);
                        arrSales.push([d, value.Value]);
                    });

                    chartDraw = new Chart(arrSales,document.getElementById('profit_chart'));
                    chartDraw.LineDraw();
                }
            });
        }	

        function profitUsdChartDraw() {
            var jsonData = $.ajax({
                url: "data/profit.json",
                dataType: "json",
                async: false,
                success: function (data) {
                    var arrSales = [['date', 'Profit (USD)']];
                    $.each(data, function (index, value) {
                        var d = new Date(value.Date);
                        arrSales.push([d, value.Value * 100]);
                    });

                    chartDraw = new Chart(arrSales,document.getElementById('profit_chart'));
                    chartDraw.LineDraw();
                }
            });
        }

        function getPerformance(){
            google.charts.load('current', {packages: ['corechart', 'bar', 'timeline'], 'language': 'tr'});
            if(chartType == 'usd'){
                google.charts.setOnLoadCallback(performanceUsdChartDraw);
            }else{
                google.charts.setOnLoadCallback(performanceChartDraw);
            }
        }

        function performanceChartDraw() {
            var jsonData = $.ajax({
                url: "data/performance.json",
                dataType: "json",
                async: false,
                success: function (data) {
                    var arrSales = [['', '', '']];
                    $.each(data, function (index, value) {
                        arrSales.push([value.Date,value.Value, value.Start]);
                    });
                    chartDraw = new Chart(arrSales,document.getElementById('performance_chart'));
                    chartDraw.BarDraw();
                }
            });
        }

        function performanceUsdChartDraw() {
            var jsonData = $.ajax({
                url: "data/performance.json",
                dataType: "json",
                async: false,
                success: function (data) {
                    var arrSales = [['', '', '']];
                    $.each(data, function (index, value) {
                        var d = parseInt(value.Value) * 100;
                        arrSales.push([value.Date, d, value.Start]);
                    });
                    chartDraw = new Chart(arrSales,document.getElementById('performance_chart'));
                    chartDraw.BarDraw();
                }
            });
        }

        function getTrading(){
            google.charts.load('current', {packages: ['corechart', 'bar', 'timeline'], 'language': 'tr'});
            google.charts.setOnLoadCallback(tradingChartDraw);
        }

        function tradingChartDraw() {
            var jsonData = $.ajax({
                url: "data/trading.json",
                dataType: "json",
                async: false,
                success: function (data) {
                    var arrSales = [['Task', 'Hours per Day']];
                    $.each(data, function (index, value) {
                        arrSales.push([value.Currency,value.Value]);
                    });
                    chartDraw = new Chart(arrSales,document.getElementById('trading_chart'));
                    chartDraw.PieDraw();
                }
            });
        }

        function setChartType(value){
            chartType = value;
            setChartTypeBg(value);
            load();
        }

        function setChartTypeBg(value){
            var btnPips = document.getElementById("btnPips");
            var btnUsd = document.getElementById("btnUsd");
            if(value == "usd"){
                btnPips.style.backgroundColor = "grey";
                btnUsd.style.backgroundColor = "green";
            }else{
                btnUsd.style.backgroundColor = "grey";
                btnPips.style.backgroundColor = "green";
            }
        }

        function setChartTab(value){
            chartTab = value;
            load();
        }

        function btnHide(){
            var btnPips = document.getElementById("btnPips");
            var btnUsd = document.getElementById("btnUsd");
            btnPips.style.display = "none";
            btnUsd.style.display = "none";
        }

        function btnShow(){
            var btnPips = document.getElementById("btnPips");
            var btnUsd = document.getElementById("btnUsd");
            btnPips.style.display = "block";
            btnUsd.style.display = "block";
        }
    </script>
</body>
</html>