<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogType;

class LogTypeController extends Controller
{
    public function index()
    {
        return LogType::all();
    }

    public function show(LogType $logType)
    {
        return $logType;
    }

    public function store(Request $request)
    {
        return LogType::create($request->all());
    }

    public function update(Request $request, LogType $logType)
    {
        return $logType->update($request->all());
    }

    public function destory(LogType $logType)
    {
        return $logType->delete();
    }
}
