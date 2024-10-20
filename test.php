<?php

require 'vendor/autoload.php'; // Make sure the autoloader is included

use Bizmitra\Amountinwords\PrintAmountInWords;

// Instantiate the PrintAmountInWords class
$amountInWords = new PrintAmountInWords();

// Test the amountToWords method
$amount = 45612.45;
$currency = 'USD';
$decimalCurrency = 'cents';

// Get the amount in words
$words = $amountInWords->amountToWords($amount, $currency, $decimalCurrency);

// Print the result
echo $words; // Output: "Five Thousand USD AND Forty Five cents ONLY"
