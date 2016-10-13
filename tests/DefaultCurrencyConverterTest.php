<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\DefaultCurrencyConverter;

class DefaultCurrencyConverterTest extends ChallengeTestCase
{

    /**
     * Tests the conversion for all the exchangeRates
     *
     * @return void
     */
    public function testConvertMethod()
    {
    	$exchangeRates = ['€'=>1.0, '£'=>0.90, '$'=>1.10, 'other'=>0.0];

    	foreach($exchangeRates as $currencySymbol => $exRate) {
    		// Uses a Mock which returns the exchangeRates
    		$currencyExchangeRateMock = $this->getMockBuilder("App\Models\CurrencyExchangeRateService")->getMock();
    		$currencyExchangeRateMock->expects($this->any())
        		->method("getExchangeRate")
        		->will($this->returnValue($exRate));

    		$currencyConverter = new DefaultCurrencyConverter($currencyExchangeRateMock);

    		$this->assertEquals($exRate, $currencyConverter->convert($currencySymbol,1));
    	}
    }

    /**
     * Tests the conversion with a currency different from $, £, €
     *
     * @return void
     */
    public function testConvertMethodWrongRate()
    {
    	$currencyExchangeRateMock = $this->getMockBuilder("App\Models\CurrencyExchangeRateService")->getMock();
		$currencyExchangeRateMock->expects($this->any())
    		->method("getExchangeRate")
    		->will($this->returnValue(0.0));

		$currencyConverter = new DefaultCurrencyConverter($currencyExchangeRateMock);

		$this->assertFalse($currencyConverter->convert('',5));

    }

    /**
     * Tests the conversion with not numeric amount
     *
     * @return void
     */
    public function testConvertMethodWrongAmount()
    {
    	$currencyExchangeRateMock = $this->getMockBuilder("App\Models\CurrencyExchangeRateService")->getMock();
		$currencyExchangeRateMock->expects($this->any())
    		->method("getExchangeRate")
    		->will($this->returnValue(1.0));

		$currencyConverter = new DefaultCurrencyConverter($currencyExchangeRateMock);

		$this->assertFalse($currencyConverter->convert('€','any'));

    }
}
