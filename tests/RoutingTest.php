<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoutingTest extends ChallengeTestCase
{


    /**
     * Tests the get of routing root
     *
     * @return void
     */
    public function testRoutingRoot()
    {
        $pageTitle = "DEV CHALLENGE";

        $this->visit('/')
             ->see($pageTitle);
    }
}
