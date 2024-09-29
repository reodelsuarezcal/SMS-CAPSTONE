<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patients extends Model
{
    protected $table = 'patients'; 
    protected $primaryKey = 'id';
    protected $fillable = ['id','patient_id','lastname','firstname','middlename','suffix','gender','profile_pic','birthday','height','weight','parent_id','created_at','updated_at'];

    public function parent()
    {
        return $this->belongsTo(parent::class, 'parent_id', 'id');
    }
}
