<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events'; 
    protected $primaryKey = 'id';
    protected $fillable = ['id','title','label','start','end','location','note','created_at','updated_at'];
}
