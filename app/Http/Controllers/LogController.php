<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;

class LogController extends Controller
{
    public function index()
    {
        return Log::with('logType')->get();
    }

    public function show(Log $log)
    {
        return $log;
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['body'] = json_encode($data['body']);

        return Log::create($data);
    }

    public function update(Request $request, Log $log)
    {
        $data = $request->all();
        $data['body'] = json_encode($data['body']);
        return $log->update($data);
    }

    public function destroy(Log $log)
    {
        return $log->delete();
    }
}
