<?php

namespace Tests\Feature;

use App\Models\Log;
use App\Models\LogType;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogTest extends TestCase
{
//    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreatedLogs()
    {
        Log::factory(10000)->create([
            'body' => json_encode(['rota' => 'localhost:8000/api/test/rota']),
            'log_type_id' => LogType::INFO
        ]);


        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
