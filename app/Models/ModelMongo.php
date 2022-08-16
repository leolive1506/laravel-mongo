<?php
namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model;

abstract class ModelMongo extends Model
{
    protected $connection = 'mongodb';
}
