<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends ModelMongo
{
    use HasFactory;

    protected $collection = 'logs';
    protected $guarded = ['id'];
    protected $fillable = ['log_type_id', 'body', 'breadcrumb'];

    public function logType()
    {
        return $this->belongsTo(LogType::class, 'log_type_id', '_id');
    }
}
