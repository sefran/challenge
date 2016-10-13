<?php

namespace App\Models;

use App\Models\CurrencyExchangeRateService;

/**
 * Dummy web service returning fixed exchange rates
 *
 */
class CurrencyDummyWebservice implements CurrencyExchangeRateService
{
    /**
     * @var const EUR_CURRENCY_CODE currency code for Euro €
     */
	const EUR_CURRENCY_CODE = 'EUR';
    /**
     * @var const GBP_CURRENCY_CODE currency code for British Pound £
     */
	const GBP_CURRENCY_CODE = 'GBP';
    /**
     * @var const USD_CURRENCY_CODE currency code for United States Dollar $
     */
	const USD_CURRENCY_CODE = 'USD';

    /**
     * Returns a fixed exchange rate for the GBP, USD and EUR currencies respect to EUR, 0 for the other ones
     * @todo use a real API
     *
     * @param string $currency
     *
     * @return float
     */
    public function getExchangeRate($currency)
    {
    	switch ($currency) {
    		case 'EUR':
    			return 1.0;
    		case 'GBP':
    			return 0.90233;
    		case 'USD':
    			return 1.1079;
    		default:
    			return 0.0;
    	}
    }
}