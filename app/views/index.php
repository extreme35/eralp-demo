<?php require VDIR.'/header.php' ?>
<div class="container" style="margin-top:3em;">

    <div class="row">
        <div class="col-6">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#profit" onclick="setChartTab('profit');" >Profit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#performance" onclick="setChartTab('performance');">Performance</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#trading" onclick="setChartTab('trading');">Trading</a>
                </li>
            </ul>
        </div>
        <div class="col-6">
            <div class="row" style="float:right;">
                <button id="btnPips" type="button" class="btn" style="margin-right:1em;background-color:green;color:#fff;" onclick="setChartType('pips');">Pips</button>
                <button id="btnUsd" type="button" class="btn" style="margin-right:1em;background-color:grey;color:#fff;" onclick="setChartType('usd');">USD</button>
                <input id="chartType" type="hidden" value="pips">
                <input id="chartTab" type="hidden" value="profit">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="tab-content" style="width:100%;">
            <div class="tab-pane fade show active" id="profit" >
                <div id="profit_chart"></div>
            </div>
            <div class="tab-pane fade" id="performance" >
                <div id="performance_chart"></div>
            </div>
            <div class="tab-pane fade" id="trading" >
                <div id="trading_chart"></div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top:3em;">
        <div class="row" style="margin-bottom:3em;">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link">Trading History</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <table id="history" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>CURRENCY</th>
                        <th>TYPE</th>
                        <th>STD LOTS</th>
                        <th>DATE OPEN</th>
                        <th>DATE CLOSED</th>
                        <th>OPEN</th>
                        <th>CLOSE</th>
                        <th>TOTAL</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>CURRENCY</th>
                        <th>TYPE</th>
                        <th>STD LOTS</th>
                        <th>DATE OPEN</th>
                        <th>DATE CLOSED</th>
                        <th>OPEN</th>
                        <th>CLOSE</th>
                        <th>TOTAL</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<?php require VDIR.'/footer.php' ?>