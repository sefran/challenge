<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Customer;
use App\Models\Transaction;

class CustomerTest extends ChallengeTestCase
{
    /**
     * Tests customer existance
     *
     * @return void
     */
    public function testFindCustomer()
    {
    	$selected = 1;
    	$customer = Customer::find($selected);
        $this->assertEquals("Francis Fuchsia", $customer->fullname);
    }

    /**
     * Tests the number of transactions for a customer
     *
     * @return void
     */
    public function testFindTransitions()
    {
    	$selected = 1;
    	$transactions = Customer::find($selected)->gettransactions;
        $this->assertCount(4, $transactions);
    }

    /**
     * Tests the one-to-many relationship
     *
     * @return void
     */
    public function testRelation()
    {
        $selected = 1;
    	$transaction = Transaction::find($selected);

        $this->assertEquals($transaction->customer_id, $transaction->getcustomer->id);
    }
}
