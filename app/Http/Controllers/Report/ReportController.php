<?php

namespace App\Http\Controllers\Report;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Transaction;
use App\Models\CurrencyConverterService;

class ReportController extends Controller
{
    /**
     * The CurrencyConverterService implementation.
     *
     * @var App\Models\CurrencyConverterService
     */
    protected $converter;

    /**
     * Creates a new Report Controller instance.
     *
     * @return void
     */
    public function __construct(CurrencyConverterService $converter)
    {
        $this->converter = $converter;
    }

    /**
     * Retrieves the customers collection and pass it to the index view
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        $selected = 0;
        return view('index', compact('customers', 'selected'));
    }

    /**
     * Gets the transactions for the selected customer and pass them to the index view
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getReport(Request $request)
    {
        $customers = Customer::all();
        $selected = $request->customer;

        if ($selected == 0)
            return view('index', compact('customers','selected'));

        // Gets the transactions for customer with id $selected
        $transactions = Customer::find($selected)->gettransactions;

        foreach ($transactions as $transaction) {
            $currencySymbol = mb_substr($transaction->value, 0, 1);
            $transactionAmount = mb_substr($transaction->value, 1);
            $transaction->setConvertedAmount($this->converter->convert($currencySymbol,$transactionAmount));
        }

        return view('index', compact('customers','selected','transactions'));
    }

}
