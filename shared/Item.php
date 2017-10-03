<?php 
class Item
{
    private $name;
    private $price;
    private $dollarSign;
    public function __construct($qty = '', $unit_price = "", $desc, $amount)
    {
        $this->qty = $qty;
        $this->desc = $desc;
        $this->unit_price = $unit_price;
        $this->amount = $amount;
    }
    
    public function __toString()
    {
        $first_part = str_pad($this->qty, 4, " ").str_pad($this->unit_price, 9, " ");

        if(strlen($this->desc) > 10){
            $second_part = substr($this->desc, 0, 10) ." ". str_pad($this->amount, 8, " ", STR_PAD_LEFT) . str_pad(" ", 13, " ").substr($this->desc, 10);
        }
        else{
            $second_part = str_pad($this->desc, 10, " ").str_pad($this->amount, 8, " ", STR_PAD_LEFT);
        }
        
        return $first_part.$second_part."\n";
    }
}
?>

