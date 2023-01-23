<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechReport extends Model
{
    use HasFactory;

    protected $dates = ['date_reported', 'date_signed'];
    protected $fillable = ['created_at', 'updated_at'];

    protected $casts = [
        'isCharge' => 'boolean',
      ];
    public function department(){
        return $this->hasOne(Department::class, 'id', 'department_id');
    }

    public function technicalReference(){
        return $this->hasOne(TechReference::class,'id', 'reference_id');
    }
    public function techOnDuty(){
        return $this->hasOne(User::class, 'id', 'tod');
    }
    public function user(){
        return $this->hasOne(User::class, 'id', 'encoded_by');
    }
}
