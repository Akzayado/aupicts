<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public function technicalReport(){
        return $this->belongsTo(TechReport::class);
    }

    public static function getDepartment(){
        return Department::select('id', 'account_code', 'department_name')->get();
    }
}
