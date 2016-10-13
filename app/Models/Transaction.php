<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Transaction extends Model
{
    /**
     * @var float $convertedAmount
     */
    protected $convertedAmount;

	/**
     * Mutator for date field
     *
     * @param date $date
     * @return string
     */
    public function getDateAttribute($date)
    {
        return Carbon::createFromFormat("Y-m-d", $date)->formatLocalized("%d %h %y");
    }

    /**
     * Get the converted transaction amount
     *
     * @return float
     */
    public function getConvertedAmount()
    {
         return $this->convertedAmount;
    }

    /**
     * Get the date and format it
     *
     * @param float $convertedAmount
     */
    public function setConvertedAmount($convertedAmount)
    {
         $this->convertedAmount = $convertedAmount;
    }

	/**
     * Gets the customer who did the transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getCustomer()
    {
        return $this->belongsTo('App\Models\Customer','customer_id');
    }
}
