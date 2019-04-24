<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testCreateClient(){

        \App\Client::create([
            'name' => 'Davi de Souza',
            'mail' => 'teste@gmail.com',
            'celphone' => '(11) 94859-9865',
            'age' => 25
        ]);

        // $this->seeInDatabase('clients', ['name'  => 'Davi de Souza', 'mail' => 'teste@gmail.com', 'celphone' => '(11) 94859-9865', 'age' => 25]);
        $this->assertDatabaseHas('clients', [
            'name'  => 'Davi de Souza', 
            'mail' => 'teste@gmail.com', 
            'celphone' => '(11) 94859-9865', 
            'age' => 25
        ]);
        
    }
}
