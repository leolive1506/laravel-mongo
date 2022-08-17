<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogType extends ModelMongo
{
    use HasFactory;

    const INFO = "62fbe8e712700f6d60052db2";
    const WARNING = "62fbe90012700f6d60052db3";


    protected $collection = 'log_types';

    protected $guarded = ['id'];
    protected $fillable = ['type'];

    public function logs()
    {
        return $this->hasMany(Log::class, 'log_type_id', '_id');
    }
}
