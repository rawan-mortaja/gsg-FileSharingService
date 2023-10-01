<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function links()
    {
        return $this->hasMany(FileLink::class);
    }

    public function fileDownload()
    {
        $this->belongsTo(FileDownload::class);
    }
}
