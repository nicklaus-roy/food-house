var admin_order_vue = new Vue({
    el: '#app-orders',
    data:{
        products_list: '',
        products_qty: 1,
        orders: [],
        discount: 0.00,
        amount_given: 0.00,
    },
    methods:{
        addOrder(){
            var vm = this;
            var hasOrder = this.orders.find(element => element.id == vm.products_list);
            if(hasOrder){
                hasOrder.qty += this.products_qty;
                hasOrder.amount = hasOrder.price*hasOrder.qty;
            }
            else{
                this.addNewOrder();                
            }
            this.resetOrderPicker();
        },
        addNewOrder(){
            var order = {
                id: this.products_list,
                qty: parseInt($('#products-qty').val()),
                name: $('#products-list').find('option[value='+this.products_list+']').text(),
                price: parseFloat($('#products-list').find('option[value='+this.products_list+']').attr('data-price')),
                amount: 0.00,
                unit: $('#products-list').find('option[value='+this.products_list+']').attr('data-unit')
            };
            order.amount = order.price*order.qty;
            this.orders.push(order);
        },

        resetOrderPicker(){
            $('.selectpicker').selectpicker('val', '#');
            $("button[title='Choose a product.']").focus();
            $("input[aria-label='Search']").val('');
            this.products_qty = 1;
            this.products_list = "";
        },

        formatCurrency(amount){
            return amount.toLocaleString('en-US', {minimumFractionDigits: 2});
        },

        removeOrder(order){
            this.orders.splice(this.orders.indexOf(order),1);
        }
    },

    computed:{
        allowAddOrder(){
            return this.products_list !== '' && this.products_qty !== '' && this.products_qty > 0;
        },

        totalSales(){
            var total_sales = 0.00;
            this.orders.forEach(element => {
                total_sales+=element.amount;
            });
            return total_sales;
        },

        amountDue(){
            return this.totalSales-this.discountAmount;
        },

        discountAmount(){
            if(this.discount > 0 && this.totalSales > 0){
                return this.totalSales*this.discount/100;
            }
            return 0.00;
        },

        change(){
            if(this.amount_given > 0 && this.totalSales > 0){
                if(this.amount_given - (this.totalSales-this.discountAmount) > 0){
                    return this.amount_given - (this.totalSales-this.discountAmount);
                }
            }
            return 0.00;
        },

        allowPrintReceipt(){
            return this.totalSales > 0.00 && this.amount_given > 0.00 && this.amount_given >= this.totalSales-this.discountAmount; 
        }


    }
});