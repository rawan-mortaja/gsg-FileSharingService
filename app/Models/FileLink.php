<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileLink extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function file()
    {
        return $this->belongsTo(File::class);
    }
}
