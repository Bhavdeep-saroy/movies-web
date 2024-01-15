<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insert extends Model
{
    protected $table = "insert"; // Adjust this to match your actual table name

    protected $primearykey = "id";

    protected $fillable = ['name']; // Add other fillable fields as needed
}
