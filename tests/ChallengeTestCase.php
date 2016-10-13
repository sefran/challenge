<?php

class ChallengeTestCase extends TestCase
{
	/**
     * Overrides parent setUp for custom setup: migrates and seeds the test database
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }

    /**
     * Overrides parent tearDown: resets the migrations
     *
     * @return void
     */
    public function tearDown()
    {
        Artisan::call('migrate:reset');
        parent::tearDown();
    }
}
