<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parents extends Model
{
    protected $table = 'parents'; 
    protected $primaryKey = 'id';
    protected $fillable = ['id','lastname','firstname','middlename','birthday','civil_stat','contact_no','created_at','updated_at'];

    public function patients()
    {
        return $this->hasMany(patients::class, 'parent_id');
    }
}
