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
<script>
    var app_sales_report = new Vue({
    el: '#app-best-selling',
    data:{
        products:[],
        product_sales:[],
    },
    mounted(){
        var vm = this;
        $.ajax({
            url: '/admin/reports/get-frequently-used.php',
            dataType: 'json',
            success:function(result){
                result.forEach(element => {
                    vm.products.push(element.name);
                    vm.product_sales.push(element.issued_quantity);
                });
                vm.renderBarGraph();
            }

        });
    },
    methods:{
        renderBarGraph(){
            var vm = this;
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: vm.products,
                    datasets: [{
                        data: vm.product_sales,
                        backgroundColor: [
                            'rgba(255,99,132,0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive:false,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    },
                    title: {
                        display: true,
                        text: 'Top 10 Most Issued Raw Materials',
                        padding:20
                    },
                    legend:{
                        display: false
                    }
                }
            });
        }
    }

});

</script>