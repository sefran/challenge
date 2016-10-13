<?php

namespace App\Models;

use App\Models\CurrencyConverterService;
use App\Models\CurrencyExchangeRateService;

/**
 * Uses an CurrencyExchangeRateService object to convert transaction values
 *
 */
class DefaultCurrencyConverter implements CurrencyConverterService
{
    /**
     * The CurrencyExchangeRateService implementation.
     *
     * @var App\Models\CurrencyExchangeRateService
     */
    protected $currencyExchangeRate;

	/**
     * @var array $symbolToCodeCurrency Maps currency symbol to currency code
     */
	private static $symbolToCodeCurrency = [
		'€' => 'EUR',
		'£' => 'GBP',
		'$' => 'USD'
	];

    /**
     * Create a new DefaultCurrencyConverter.
     *
     * @param App\Models\CurrencyExchangeRateService
     */
    public function __construct(CurrencyExchangeRateService $currencyExchangeRate)
    {
        $this->currencyExchangeRate = $currencyExchangeRate;
    }

	/**
     * Converts the given amount in the given currency to an amount in euros
     *
     * @param string $currency Currency symbol (€, £, $,...) from which convert
     * @param string $amount Amount to convert
     *
     * @return float|false
     */
    public function convert($currency, $amount)
    {
        if (!array_key_exists($currency, self::$symbolToCodeCurrency)) return false;

    	$exchangeRate = $this->currencyExchangeRate->getExchangeRate(self::$symbolToCodeCurrency[$currency]);

        if (!$exchangeRate || !is_numeric($amount)) return false;

        return bcmul($amount, $exchangeRate, 2);
    }
}