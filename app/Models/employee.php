<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    public $table = "employees";
    protected $primaryKey = "id";
    protected $fillable = [
        'nip',
        'nama',
        'nik',
    ];
}
