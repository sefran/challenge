<?php

namespace App\Models;

interface CurrencyExchangeRateService
{
	/**
     * Returns an exchange rate for the GBP, USD and EUR currencies respect to EUR, 0 for the other ones
     *
     * @param string $currency
     *
     * @return float
     */
    public function getExchangeRate($currency);

}