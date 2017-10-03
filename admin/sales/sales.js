var app_sales_vue = new Vue({
    el: '#app-sales',
    data: {
        date_from: $('#date-from').val(),
        date_to: $('#date-to').val(),
        sales: null
    },
    methods:{
        getSales(){
            var vm = this;
            $.ajax({
                url: '/admin/sales/get-sales.php',
                type: 'GET',
                data: {
                    date_from: this.date_from,
                    date_to: this.date_to
                },
                dataType:"json",
                success:function(result){
                    vm.sales = result;
                }
            });
        }
    },
    mounted(){
        this.getSales();
    }
});