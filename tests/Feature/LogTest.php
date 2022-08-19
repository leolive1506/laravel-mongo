<?php

namespace Tests\Feature;

use App\Models\Log;
use App\Models\LogType;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogTest extends TestCase
{
    use DatabaseMigrations;

    public function testCreatedLogs()
    {
        $qtdLogs = 200000;
        $this->createLogFactory($qtdLogs);

        $logs = Log::where('log_type_id', LogType::INFO)->get();
        $this->assertEquals($qtdLogs, $logs->count());
    }

    public function testIndexMethod()
    {
        $this->createLogFactory();

        $response = $this->get('/api/logs');
        $response->assertOk();
        $response = json_decode($response->getContent());

        $this->assertCount(1, $response);
    }

    public function testShowMethod()
    {
        $log = $this->createLogFactory()->first();

        $response = $this->get('/api/logs/' . $log->id);
        $response->assertOk();
        $response = json_decode($response->getContent());

        $this->assertEquals($log->id, $response->_id);
    }

    public function testStoreMethod()
    {
        $log = [
            'body' => ['rota' => 'localhost:8000/api/test/rota'],
            'log_type_id' => LogType::INFO,
            'breadcrumb' => 'user #' . random_int(1, 10000000000) . ' created transaction',
        ];

        $response = $this->post('/api/logs/', $log);
        $response->assertOk();
        $response = json_decode($response->getContent());

        $logDatabase = Log::get()->first();

        $this->assertEquals($logDatabase->id, $response->_id);
    }

    public function testUpdateMethod()
    {
        $log = $this->createLogFactory()->first();

        $body = ['rota' => 'localhost:8000/api/test/rota/nova-rota'];
        $log_type_id = LogType::WARNING;
        $breadcrumb = 'user #' . random_int(1, 10000000000) . ' updated';

        $newDataLog = [
            'body' => $body,
            'log_type_id' => $log_type_id,
            'breadcrumb' => $breadcrumb,
        ];

        $response = $this->put('/api/logs/' . $log->id, $newDataLog);
        $response->assertOk();

        $log->refresh();

        $this->assertEquals($body['rota'], json_decode($log->body)->rota);
        $this->assertEquals($log->log_type_id, $log_type_id);
        $this->assertEquals($log->breadcrumb, $breadcrumb);
    }

    public function testDestroyMethod()
    {
        $log = $this->createLogFactory()->first();

        $response = $this->delete('/api/logs/' . $log->id);
        $response->assertOk();

        $countLogs = Log::all()->count();

        $this->assertEquals(0, $countLogs);
    }

    public function testStoreManyLogsViaEndpoint()
    {
        $qtdLogs = 10000;

        for ($i = 1; $i <= $qtdLogs; $i++) {
            $log = [
                'body' => ['rota' => 'localhost:8000/api/test/rota' . $i],
                'log_type_id' => LogType::INFO,
                'breadcrumb' => 'user #' . random_int(1, 10000000000) . ' created transaction',
            ];

            $response = $this->post('/api/logs/', $log);
            $response->assertOk();
            $response = json_decode($response->getContent());

            $logDatabase = Log::orderBy('_id', 'desc')->first();
            $this->assertEquals($logDatabase->id, $response->_id);
        }

        $logsCount = Log::all()->count();
        $this->assertEquals($qtdLogs, $logsCount);
    }

    public function createLogFactory($qtd = 1)
    {
        return Log::factory($qtd)->create([
            'body' => json_encode(['rota' => 'localhost:8000/api/test/rota']),
            'log_type_id' => LogType::INFO
        ]);
    }
}
