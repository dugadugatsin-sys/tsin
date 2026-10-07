<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\WeatherService;

class DashboardController extends Controller
{
    protected $weatherService;

    /**
     * Inject WeatherService via Constructor Dependency Injection
     */
    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    /**
     * Display the Admin Dashboard view with system metrics and live weather data.
     */
    public function index()
    {
        // Example system statistics for the Booking and Queue Management System
        $totalBookingsToday = 12;
        $currentlyServing   = 'A-005';
        $pendingQueueCount  = 4;

        // Retrieve mapped weather data from API Service
        $weather = $this->weatherService->getCurrentWeather();

        return view('admin.dashboard', compact(
            'totalBookingsToday',
            'currentlyServing',
            'pendingQueueCount',
            'weather'
        ));
    }
}
