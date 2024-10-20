<?php

use Bizmitra\Amountinwords\PrintAmountInWords;
use PHPUnit\Framework\TestCase;

class PrintAmountInWordsTest extends TestCase
{
    public function testAmountToWords()
{
    $amountInWords = new PrintAmountInWords();
    // $this->assertEquals('ONE THOUSAND Rs ONLY', $amountInWords->amountToWords(1000.00, 'Rs'));
    // $this->assertEquals('ONE THOUSAND Rs  AND TWENTY FIVE Paisa ONLY', $amountInWords->amountToWords(1000.25, 'Rs', 'Paisa'));
    $this->assertEquals('Three Thousand USD and twenty two Cents ONLY', $amountInWords->amountToWords(3000.22, 'USD', 'CENTS'));
}
    

}
?>