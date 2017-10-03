var app_sales_report = new Vue({
    el: '#app-best-selling',
    data:{
        products:[],
        product_sales:[],
    },
    mounted(){
        var vm = this;
        $.ajax({
            url: '/admin/reports/get-best-sellers.php',
            dataType: 'json',
            success:function(result){
                console.log(result);
                result.forEach(element => {
                    vm.products.push(element.name);
                    vm.product_sales.push(element.sales);
                });
                vm.renderBarGraph();
            }

        });
    },
    methods:{
        renderPieChart(){
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['prod1', 'prod2', 'prod3'],
                    datasets: [{
                        data: [5,10,10],
                        backgroundColor: [
                            'rgba(255,99,132,0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
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
                    responsive:false
                }
            });
        },
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
                        text: 'Top 10 Best Sellers',
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
