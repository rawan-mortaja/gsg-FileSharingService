<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class FileDownload extends Model
{
    use HasFactory;

    protected $guarded = [];
    // protected $fillable = [
    //     'file_id', 'time', 'ip_address', 'user_agent', 'country',
    // ];

    public function file()
    {
        return $this->belongsTo(File::class);
    }

    private function getCountryByIpAddress($ipAddress)
    {
        $response = Http::get('https://ipgeolocation.io/ipgeo?apiKey=YOUR_API_KEY&ip=' . $ipAddress);
        $data = $response->json();
        $country = $data['country_name'];

        return $country;
    }

    public function getUpdatedAtColumn()
    {
    }
}
