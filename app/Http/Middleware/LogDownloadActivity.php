<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class LogDownloadActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Get the file ID from the route parameters
        $fileId = $request->route('fileId');

        // Get the user's IP address
        $ipAddress = Request::ip();

        // Get the user agent (browser information)
        $userAgent = $request->header('User-Agent');

        // Use an IP geolocation service to get the user's country
        $country = $this->getCountryByIpAddress($ipAddress);

        // Log the download activity to the database
        DB::table('download_logs')->insert([
            'file_id' => $fileId,
            'time' => now(),
            'ip_address' => $ipAddress,
            'user_agent' => $userAgent,
            'country' => $country,
        ]);

        return $next($request);
    }

    private function getCountryByIpAddress($ipAddress)
    {
        // You can use an HTTP client like Guzzle or Laravel's HTTP facade to make a request to an IP geolocation service.
        // For example, using Laravel's HTTP facade:
        $response = Http::get('https://ipgeolocation.io/ipgeo?apiKey=YOUR_API_KEY&ip=' . $ipAddress);

        // Parse the JSON response and extract the country information
        $data = $response->json();
        $country = $data['country_name'];

        return $country;
    }
}
