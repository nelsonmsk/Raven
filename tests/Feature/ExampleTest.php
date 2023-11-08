<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Mockery;
  use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

class ExampleTest extends TestCase
{
         use MockeryPHPUnitIntegration;

   /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
		
    }
	
	public function testIndexActionBindsUsersFromRepository()
	{
	
	// Arrange...
	$repository = Mockery::mock('UserController');
	$repository->shouldReceive('all')->once()->andReturn(array('foo'));
	

	// Act...
	$response = $this->action('GET', 'UserController@getIndex');

	// Assert...
	$this->assertResponseOk();
	$this->assertViewHas('users', array('foo'));
	}
}
