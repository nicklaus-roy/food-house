<?php
require $root.'/shared/escpos-php/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

$connector = new WindowsPrintConnector("Receipt Printer");

$date = date("m/d/Y");

$printer = new Printer($connector);

/* Print shop name */
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
$printer -> text("Foodjectives\nFood House\n");
$printer -> selectPrintMode();
$printer -> text("Purok 11 Quinio Compound\n");
$printer ->text("Bakakeng Norte Sur, Baguip City\n");
$printer ->text("Vanduane V. Badua - Prop.\n");
$printer ->text("NonVat Reg TIN:479-132-178-000.\n");
$printer -> feed(2);



$printer -> setEmphasis(true);
$printer -> setJustification(Printer::JUSTIFY_LEFT);
$printer -> text("OR No.".str_pad($receipt_number, "10", " ").str_pad($date, "16"," ", STR_PAD_LEFT)."\n");

/*Print Header*/
$printer -> setUnderline(Printer::UNDERLINE_DOUBLE);
$printer -> text(str_pad(" ", 32, " "));
$printer -> feed();
$printer -> setUnderline(Printer::UNDERLINE_NONE);
$printer -> text(str_pad("Qty", 4, " ").str_pad("UPrice", 9," ").str_pad("Item", 11, " ").str_pad("Amount", 8, " "));
$printer -> setUnderline(Printer::UNDERLINE_DOUBLE);
$printer -> text(str_pad(" ", 32, " "));
$printer -> feed();


/* Print Items */
$printer -> setUnderline(Printer::UNDERLINE_NONE);
$printer -> setEmphasis(false);
$printer -> setJustification(Printer::JUSTIFY_LEFT);
foreach ($items as $item) {
    $printer -> text($item);
}

/*Amount Details*/
$printer -> setUnderline(Printer::UNDERLINE_DOUBLE);
$printer -> text(str_pad(" ", 32, " "));
$printer -> feed();

$printer -> setUnderline(Printer::UNDERLINE_NONE);
$printer-> text(str_pad("Subtotal:", 10, " ") . str_pad($sub_total, 22, " ", STR_PAD_LEFT));
$printer->feed();

$printer-> text(str_pad("Less:SC/PWD Discount", 20, " ") . str_pad($discount_amount, 12, " ", STR_PAD_LEFT));
$printer->feed();

$printer-> text(str_pad("Total:", 10, " ") . str_pad(number_format($total_sales, 2), 22, " ", STR_PAD_LEFT));
$printer->feed();

$printer-> text(str_pad("Cash:", 10, " ") . str_pad(number_format($amount_given, 2), 22, " ", STR_PAD_LEFT));
$printer->feed();

$printer-> text(str_pad("Change:", 10, " ") . str_pad($change, 22, " ", STR_PAD_LEFT));
$printer->feed(2);

/* Footer */
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> text("THIS RECEIPT SHALL BE VALID FOR FIVE(5) YEARS FROM THE DATE OF THE PERMIT TO USE\n");
/* Cut the receipt and open the cash drawer */
$printer -> feed(5);
$printer -> cut();
$printer -> close();

/* A wrapper to do organise item names & prices into columns */