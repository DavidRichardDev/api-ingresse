<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use DatabaseTransactions;

class ClientTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    // public function testExample()
    // {
    //     $this->assertTrue(true);
    // }

    public function testCreateClient(){

        \App\Client::create([
            'name' => 'Davi de Souza',
            'mail' => 'teste@gmail.com',
            'celphone' => '(11) 94859-9865',
            'age' => 25
        ]);

        $this->assertDatabaseHas('clients', [
            'name'  => 'Davi de Souza', 
            'mail' => 'teste@gmail.com', 
            'celphone' => '(11) 94859-9865', 
            'age' => 25
        ]);
    }

    public function testPostClientApi()
    {
        $response = $this->json('POST', '/api/clients', ['name' => 'Felipe', 'mail' => 'felipe@gmail.com', 'celphone' => '(11) 96587-6894', 'age' => 22]);

        $response
            ->assertStatus(201)
            ->assertJson(['data' => ['message'=> 'Usuário criado com sucesso!']]);
    }

    public function testGetClientApi()
    {
        $response = $this->json('GET', '/api/clients');

        $client = new \App\Client;
        $result = response()->json($client->paginate(10));
        
        $response->assertStatus(200);
        $this->assertEmpty(!$result);
    }

    public function testGetSingleClientApi()
    {
        $response = $this->json('GET', '/api/clients', ['id' => 1]);

        $response->assertStatus(200);
    }

    // public function testPutClientApi(){
    //     $client = \App\Client::create([
    //         'name' => 'Daniel Araujp',
    //         'mail' => 'teste@gmail.com',
    //         'celphone' => '(11) 94859-9865',
    //         'age' => 30
    //     ]);
        
    // }

    // public function testDeleteClientApi(){
    //     $client = \App\Client::create([
    //         'name' => 'Daniel Araujp',
    //         'mail' => 'teste@gmail.com',
    //         'celphone' => '(11) 94859-9865',
    //         'age' => 30
    //     ]);
        
    // }

    // $this->assertSoftDeleted($table, array $data);
    // $this->assertDatabaseMissing($table, array $data);
}
