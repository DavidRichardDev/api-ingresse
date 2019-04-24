<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientTest extends TestCase
{
    /**
     * Realize the test of creation client without endpoint
     *
     * @return boolean true
     */
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
    /**
     * Realize the test of creation client with endpoint API
     *
     * @return boolean
     */
    public function testPostClientApi()
    {
        $response = $this->json('POST', '/api/clients', ['name' => 'Felipe', 'mail' => 'felipe@gmail.com', 'celphone' => '(11) 96587-6894', 'age' => 22]);

        $response
            ->assertStatus(201)
            ->assertJson(['data' => ['message'=> 'Usuário criado com sucesso!']]);
    }
    /**
     * Realize the test of get clients with endpoint API
     *
     * @return boolean
     */
    public function testGetClientApi()
    {
        $response = $this->json('GET', '/api/clients');

        $client = new \App\Client;
        $result = response()->json($client->paginate(10));
        
        $response->assertStatus(200);
        $this->assertEmpty(!$result);
    }
    /**
     * Realize the test of get a single client with endpoint API
     *
     * @return boolean
     */
    public function testGetSingleClientApi()
    {
        $response = $this->json('GET', '/api/clients/1');
        $response->assertStatus(200);
    }
    /**
     * Realize the test of update a single client without endpoint
     *
     * @return boolean
     */
    public function testAlterClientApi(){
        $client = \App\Client::create([
            'name' => 'Daniel Araujo',
            'mail' => 'daniel@gmail.com',
            'celphone' => '(11) 94859-9865',
            'age' => 30
        ]);  

        $affected = \App\Client::where('id', $client->id)->update(['name'=>'Daniel Araujo Santos']);

        $this->assertDatabaseHas('clients', [
            'name' => 'Daniel Araujo Santos',
            'mail' => 'daniel@gmail.com',
            'celphone' => '(11) 94859-9865',
            'age' => 30
        ]);
    }
    /**
     * Realize the test of update client with endpoint API
     *
     * @return boolean
     */
    public function testPutClientApi(){
        $response = $this->json('PUT', '/api/clients/2', ['mail' => 'nomealterado@gmail.com', 'celphone' => '(11) 91111-1111', 'age' => 27]);

        $this->assertDatabaseHas('clients', [
            'mail' => 'nomealterado@gmail.com',
            'celphone' => '(11) 91111-1111',
            'age' => 27
        ]);
    }
    /**
     * Realize the test of delete client without endpoint
     *
     * @return boolean
     */
    public function testDeleteClientDbApi(){
        $data = [
            'name' => 'Diogo Nunes G',
            'mail' => 'teste@gmail.com',
            'celphone' => '(11) 97777-7777',
            'age' => 30
        ];

        $client = \App\Client::create($data);

        $this->assertDatabaseHas('clients', $data);
        $client->delete();
        $this->assertDatabaseMissing('clients', $data);
    }
    /**
     * Realize the test of delete client with endpoint API
     *
     * @return boolean
     */
    public function testDeleteClientApi(){
        $data = [
            'name' => 'Fabiana Teixeira Vazques',
            'mail' => 'teste@gmail.com',
            'celphone' => '(11) 97777-5555',
            'age' => 28
        ];

        $client = \App\Client::create($data);

        $this->assertDatabaseHas('clients', $data);

        $response = $this->json('DELETE', '/api/clients/'.$client->id);
        
        $this->assertDatabaseMissing('clients', $data);
    }
}
