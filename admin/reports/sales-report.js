var app_sales_report = new Vue({
    el: '#app-sales-report',
    data:{
        selectedChart: 'monthlyChart',
        monthlySales:[0,0,0,0,0,0,0,0,0,0,0,0],
        months: ["January", "February", "March", "April", "May", 
        "June", "July", "August", "September", "October", "November", "December"],
        years: [],
        yearSales:[],
    },
    mounted(){
        var vm = this;
        $.ajax({
            url: '/admin/reports/get-sales-for-report.php',
            data:{
                'selectedChart': 'monthlyChart',
            },
            dataType: 'json',
            success:function(result){
                if(result!==""){
                    result.forEach(element => {
                        if(vm.months.indexOf(element.sales_month) != -1){
                            vm.monthlySales[vm.months.indexOf(element.sales_month)] = element.sales;
                        }
                    });
                }
                vm.renderMonthlyChart();
            }
        });

        $.ajax({
            url: '/admin/reports/get-sales-for-report.php',
            data:{
                'selectedChart': 'yearlyChart',
            },
            dataType: 'json',
            success:function(result){
                console.log(result);
                if(result!==""){
                    result.forEach(element => {
                        vm.years.push(element.sales_year);
                        vm.yearSales.push(element.sales);
                    });
                }
            }
        });
    },
    methods:{
        renderMonthlyChart(){
            var vm = this;
            var ctx = document.getElementById("monthlyChart");
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: vm.months,
                    datasets: [{
                        label: 'Sales in ₱',
                        data: vm.monthlySales,
                        backgroundColor: [
                            'rgba(255,99,132,0.2)',
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
                    }
                }
            });
        },
        renderYearlyChart(){
            var vm = this;
            var ctx = document.getElementById("monthlyChart");
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: vm.years,
                    datasets: [{
                        label: 'Sales in ₱',
                        data: vm.yearSales,
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)',
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            
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
                    }
                }
            });
        }
    }

});
