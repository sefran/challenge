<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Customer;
use App\Models\Transaction;

class DatabaseSeedTest extends ChallengeTestCase
{
    /**
     * Tests the right seeding of test database
     *
     * @return void
     */
    public function testDatabaseSeed()
    {
        $this->assertCount(2, Customer::all());
        $this->assertCount(8, Transaction::all());
    }
}
