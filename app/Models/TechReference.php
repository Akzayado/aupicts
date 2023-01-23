<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechReference extends Model
{
    use HasFactory;


    protected $table = 'tech_references';

    public function techinicalReports(){
        return $this->belongsTo(TechReport::class);
    }
}
