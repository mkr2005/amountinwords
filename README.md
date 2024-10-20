# Bizmitra Amount in Words

A simple Laravel package to convert numeric amounts into their equivalent words.

## Installation

You can install the package via Composer. Run the following command in your Laravel project's root directory:

```bash
composer require bizmitra/amountinwords

Usage
Step 1: Service Provider Registration
Laravel should automatically detect the service provider. However, if you want to manually register it, add the following line to the providers array in your config/app.php file:

'providers' => [
    // Other Service Providers

    Bizmitra\Amountinwords\AmountinwordsServiceProvider::class,
],


Step 2: Using the Package
You can use the PrintAmountInWords class in your controllers or anywhere in your Laravel application. Here’s an example:

Example Controller
Create a new controller using the following command:

php artisan make:controller AmountController


Then, use the following code in your AmountController.php:

<?php

namespace App\Http\Controllers;

use Bizmitra\Amountinwords\PrintAmountInWords;

class AmountController extends Controller
{
    protected $amountInWords;

    public function __construct(PrintAmountInWords $amountInWords)
    {
        $this->amountInWords = $amountInWords;
    }

    public function index()
    {
        $amount = 12345; // Example amount
        $words = $this->amountInWords->displayWords($amount);

        return response()->json([
            'amount' => $amount,
            'in_words' => $words,
        ]);
    }
}
Step 3: Create a Route
You can create a route to access the controller in your routes/web.php (or routes/api.php) file:

use App\Http\Controllers\AmountController;

Route::get('/amount-in-words', [AmountController::class, 'index']);

{
    "amount": 12345,
    "in_words": "TWELVE THOUSAND THREE HUNDRED FORTY FIVE"
}


Step 4: Accessing the Functionality
Now, when you access the /amount-in-words route in your browser or through an API client like Postman, you should get a JSON response with the amount in words:

Step 5: Testing the Functionality
Make sure to test your functionality by accessing the route you created and verifying that it returns the correct output.

License
This package is licensed under the MIT License.

Author
Bizmitra ERP
Mahendrasinh Rana & Vishal
Email: mkr@bizmitra.io


