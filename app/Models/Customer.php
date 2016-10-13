<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	/**
     * Gets the customer transactions
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getTransactions()
    {
    	return $this->hasMany('App\Models\Transaction');
    }
}
