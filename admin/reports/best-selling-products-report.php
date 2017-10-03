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

    <section class="content container-fluid" id = 'app-best-selling'>
        <div class="row">
            <div class="col-sm-11">
                <canvas id="myChart" width="1000px" height="400"></canvas>
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
<script src = "best-selling.js"></script>