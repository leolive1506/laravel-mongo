<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;

class LogController extends Controller
{
    public function index()
    {
        return response()->json(Log::with('logType')->get());
    }

    public function show(Log $log)
    {
        return response()->json($log);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['body'] = json_encode($data['body']);

        return response()->json(Log::create($data));
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
