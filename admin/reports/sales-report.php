<?php
    include ('../layouts/master.php');
    
?>

<div class="content-wrapper">

    <section class="content-header">
        <h1>
        Reports
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active">Reports</li>
        </ol>
    </section>

    <section class="content container-fluid" id = 'app-sales-report'>
        <div class="row">
            <div class="col-sm-11">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#home" aria-controls="home" role="tab" data-toggle="tab" @click = "renderMonthlyChart()">Monthly</a>
                    </li>
                    <li role="presentation">
                        <a href="#home" aria-controls="profile" role="tab" data-toggle="tab" @click = "renderYearlyChart()">Yearly</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <canvas id="monthlyChart" width="1000px" height="400"></canvas>
                        <canvas v-if = "selectedChart == 'yearlyChart'" id="yearlyChart" width="1000px" height="400"></canvas>
                    </div>
                </div>
                        

            </div>
        </div>
               
    </section>

</div>


<?php
    include('../layouts/footer.php');
?>

</div>

<?php
    include('../layouts/scripts.php');
?>

<script src = "/plugins/chart js/chart.min.js"></script>
<script src = "sales-report.js"></script>