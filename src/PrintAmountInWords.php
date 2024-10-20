<?php

namespace Bizmitra\Amountinwords;

class PrintAmountInWords
{
    public function displayWords($num)
    {
        $ones = [
            0 => 'ZERO',
            1 => 'ONE',
            2 => 'TWO',
            3 => 'THREE',
            4 => 'FOUR',
            5 => 'FIVE',
            6 => 'SIX',
            7 => 'SEVEN',
            8 => 'EIGHT',
            9 => 'NINE',
            10 => 'TEN',
            11 => 'ELEVEN',
            12 => 'TWELVE',
            13 => 'THIRTEEN',
            14 => 'FOURTEEN',
            15 => 'FIFTEEN',
            16 => 'SIXTEEN',
            17 => 'SEVENTEEN',
            18 => 'EIGHTEEN',
            19 => 'NINETEEN',
            20 => 'TWENTY',
            30 => 'THIRTY',
            40 => 'FORTY',
            50 => 'FIFTY',
            60 => 'SIXTY',
            70 => 'SEVENTY',
            80 => 'EIGHTY',
            90 => 'NINETY',
        ];

        // Handle negative numbers
        if ($num < 0) {
            return 'MINUS ' . $this->displayWords(abs($num));
        }

        // Handle numbers from 0 to 20
        if ($num < 21) {
            return $ones[$num];
        }

        // Handle numbers from 21 to 99
        if ($num < 100) {
            $tens = floor($num / 10) * 10;
            $units = $num % 10;
            $words = $ones[$tens];
            if ($units > 0) {
                $words .= ' ' . $ones[$units];
            }
            return $words;
        }

        // Handle numbers from 100 to 999
        if ($num < 1000) {
            return $ones[floor($num / 100)] . ' HUNDRED ' . $this->displayWords($num % 100);
        }

        // Handle numbers from 1000 to 999999
        if ($num < 1000000) {
            $thousands = floor($num / 1000);
            $remainder = $num % 1000;
            $words = $this->displayWords($thousands) . ' THOUSAND';
            if ($remainder > 0) {
                $words .= ' ' . $this->displayWords($remainder);
            }
            return $words;
        }

        // Handle numbers from 1000000 to 999999999
        if ($num < 1000000000) {
            $millions = floor($num / 1000000);
            $remainder = $num % 1000000;
            $words = $this->displayWords($millions) . ' MILLION';
            if ($remainder > 0) {
                $words .= ' ' . $this->displayWords($remainder);
            }
            return $words;
        }

        // Handle numbers from 1000000000 and above
        $billions = floor($num / 1000000000);
        $remainder = $num % 1000000000;
        $words = $this->displayWords($billions) . ' BILLION';
        if ($remainder > 0) {
            $words .= ' ' . $this->displayWords($remainder);
        }

        return $words;
    }

    public function formatAmount($amount, $decimalPrecision)
    {
        return number_format($amount, $decimalPrecision, '.', '');
    }

    // public function amountToWords($amount)
    public function amountToWords($amount, $currencyName = 'CURRENCY', $decimalCurrencyName = 'CENTS')
    {
        $decimalPrecision = 2;
        $formattedAmount = $this->formatAmount($amount, $decimalPrecision);
        $amountArr = explode('.', $formattedAmount);
        $wholeNum = (int)$amountArr[0];
        $fractionalNum = isset($amountArr[1]) ? (int)$amountArr[1] : 0;

        // Define currency names
        // $currencyName = 'Rs'; 
        // $decimalCurrencyName = 'Paisa'; 

        
        
        
        $amountWords = $this->displayWords($wholeNum) . ' ' . ucfirst(strtolower($currencyName));
    
        if ($fractionalNum > 0) {
            $fractionalWords = $this->displayWords($fractionalNum);
            // $amountWords .= ' AND ' . $fractionalWords . ' ' . $decimalCurrencyName . ' Only';
            $amountWords .= ' AND ' . $fractionalWords . ' ' . strtolower($decimalCurrencyName);
        }
        $amountWords .= ' ONLY';
        return ucfirst($amountWords);

        // Example usage
        // $printAmountInWords = new PrintAmountInWords();
        // echo $printAmountInWords->amountToWords(1000.25, 'Rs', 'Paisa');
    }
}

// Example usage
// $printAmountInWords = new PrintAmountInWords();

// echo $this->amountInWords->amountToWords(5000.45, 'usd', 'cents');
