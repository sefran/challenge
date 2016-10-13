<?php

namespace App\Models;

interface CurrencyConverterService
{
	/**
     * Converts the given amount in the given currency to an amount in euro
     *
     * @param string $currency Currency symbol (€, £, $,...) from which convert
     * @param string $amount Amount to convert
     *
     * @return float|false
     */
    public function convert($currency, $amount);

}