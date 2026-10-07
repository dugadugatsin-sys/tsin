<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Exception;

class WeatherService
{
    /**
     * Retrieve current weather data with timeout and error handling.
     *
     * @return array
     */
    public function getCurrentWeather(): array
    {
        // Fallback directly to env() if config() is not mapped in services.php
        $apiKey = config('services.weather.key') ?? env('WEATHER_API_KEY');
        $city = config('services.weather.city') ?? env('WEATHER_API_CITY', 'Arakan,PH');
        $units = config('services.weather.units') ?? env('WEATHER_API_UNITS', 'metric');
        $timeout = config('services.weather.timeout', 5);

        // Fallback default response structure when API is unavailable
        $fallback = [
            'is_available' => false,
            'message' => 'Weather information is currently unavailable. Queue and booking services remain unaffected.',
            'city' => $city,
            'temp' => null,
            'condition' => null,
            'humidity' => null,
            'wind_speed' => null,
        ];

        if (empty($apiKey)) {
            Log::warning('Weather API key is missing in configuration.');
            return $fallback;
        }

        try {
            // Using withoutVerifying() to bypass local SSL certificate issues in Laragon
            $response = Http::withoutVerifying()->timeout($timeout)->get('https://api.openweathermap.org/data/2.5/weather', [
                'q' => $city,
                'appid' => $apiKey,
                'units' => $units,
            ]);

            if ($response->successful()) {
                $data = $response->json();

                // JSON Data Mapping
                return [
                    'is_available' => true,
                    'city' => $data['name'] ?? $city,
                    'temp' => round($data['main']['temp'] ?? 0, 1),
                    'condition' => ucfirst($data['weather'][0]['description'] ?? 'N/A'),
                    'humidity' => $data['main']['humidity'] ?? 'N/A',
                    'wind_speed' => $data['wind']['speed'] ?? 'N/A',
                ];
            }

            Log::error('Weather API Error Response: ' . $response->body());
            return $fallback;

        } catch (Exception $e) {
            // Catch timeouts, connection failure, or invalid requests
            Log::error('Weather API Exception: ' . $e->getMessage());
            return $fallback;
        }
    }
}