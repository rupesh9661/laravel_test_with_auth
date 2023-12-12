<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function Company(){
        return $this->hasOne(Company::class, 'id', 'company_id');
    }
}
