<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FormTest extends ChallengeTestCase
{
    /**
     * Tests the response on form post for possibile id values
     *
     * @return void
     */
    public function testPostForm()
    {
    	for ($i=0; $i < 3; $i++) {
    		$response = $this->call('POST', '/', ['customer' => $i]);
        	$this->assertResponseOk();
    	}

    }
}
