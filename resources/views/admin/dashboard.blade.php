<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Welcome Header Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold text-gray-900">Welcome Admin!</h1>
                <p class="text-gray-600 mt-1">Small Business Service Booking and Queue Management System</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- Main Operations Summary Card (2 Columns wide on medium+ screens) -->
                <div class="md:col-span-2 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 border-b pb-3 mb-4">System Overview</h3>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
                        <div class="bg-blue-50 p-4 rounded-lg border border-blue-100">
                            <span class="text-xs font-semibold text-blue-600 uppercase tracking-wider">Bookings Today</span>
                            <p class="text-2xl font-bold text-blue-900 mt-1">{{ $totalBookingsToday ?? 0 }}</p>
                        </div>
                        <div class="bg-green-50 p-4 rounded-lg border border-green-100">
                            <span class="text-xs font-semibold text-green-600 uppercase tracking-wider">Currently Serving</span>
                            <p class="text-2xl font-bold text-green-900 mt-1">{{ $currentlyServing ?? 'N/A' }}</p>
                        </div>
                        <div class="bg-amber-50 p-4 rounded-lg border border-amber-100">
                            <span class="text-xs font-semibold text-amber-600 uppercase tracking-wider">Pending Queue</span>
                            <p class="text-2xl font-bold text-amber-900 mt-1">{{ $pendingQueueCount ?? 0 }}</p>
                        </div>
                    </div>

                    <p class="text-sm text-gray-600">
                        Use the system navigation to manage customer appointments, view queues, and update service schedules.
                    </p>
                </div>

                <!-- External Weather API Widget Card (Styled like reference) -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="flex items-center justify-between border-b pb-3 mb-4">
                        <h3 class="text-sm font-bold text-gray-700 flex items-center gap-2">
                            <span>🌙</span> Live Local Weather
                        </h3>
                        <span class="text-[10px] text-gray-500 font-semibold uppercase tracking-wider">Live External API</span>
                    </div>

                    @if(!empty($weather['is_available']))
                        <!-- Active Weather Structured List Display -->
                        <div class="space-y-2">
                            <!-- Location / City -->
                            <div class="bg-gray-50/70 border border-gray-100 rounded p-2.5 text-center">
                                <span class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-0.5">Location / City</span>
                                <p class="text-sm font-semibold text-gray-800 flex items-center justify-center gap-1">
                                    📍 {{ $weather['city'] ?? config('services.weather.city') }}
                                </p>
                            </div>

                            <!-- Temperature -->
                            <div class="bg-gray-50/70 border border-gray-100 rounded p-2.5 text-center">
                                <span class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-0.5">Temperature</span>
                                <p class="text-sm font-bold text-gray-800 flex items-center justify-center gap-1">
                                    🌡️ {{ $weather['temp'] }}°C
                                </p>
                            </div>

                            <!-- Condition -->
                            <div class="bg-gray-50/70 border border-gray-100 rounded p-2.5 text-center">
                                <span class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-0.5">Condition</span>
                                <p class="text-sm font-semibold text-gray-800 flex items-center justify-center gap-1">
                                    ☁️ {{ $weather['condition'] }}
                                </p>
                            </div>

                            <!-- Humidity -->
                            <div class="bg-gray-50/70 border border-gray-100 rounded p-2.5 text-center">
                                <span class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-0.5">Humidity</span>
                                <p class="text-sm font-semibold text-gray-800 flex items-center justify-center gap-1">
                                    💧 {{ $weather['humidity'] }}%
                                </p>
                            </div>

                            <!-- Wind Speed -->
                            <div class="bg-gray-50/70 border border-gray-100 rounded p-2.5 text-center">
                                <span class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-0.5">Wind Speed</span>
                                <p class="text-sm font-semibold text-gray-800 flex items-center justify-center gap-1">
                                    💨 {{ $weather['wind_speed'] }} m/s
                                </p>
                            </div>
                        </div>
                    @else
                        <!-- Fallback Display -->
                        <div class="text-center my-2">
                            <div class="bg-gray-50/70 border border-gray-100 rounded p-2.5 text-center mb-3">
                                <span class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-0.5">Location / City</span>
                                <p class="text-sm font-semibold text-gray-800 flex items-center justify-center gap-1">
                                    📍 {{ $weather['city'] ?? config('services.weather.city') }}
                                </p>
                            </div>
                            <div class="bg-amber-50 border-l-4 border-amber-400 p-4 rounded text-center">
                                <div class="text-amber-500 text-2xl mb-1">⚠️</div>
                                <p class="text-xs font-semibold text-amber-800 uppercase tracking-wider">Service Notice</p>
                                <p class="text-xs text-amber-700 mt-1">
                                    {{ $weather['message'] ?? 'Weather details are temporarily unavailable.' }}
                                </p>
                            </div>
                        </div>
                    @endif

                </div>

            </div>
        </div>
    </div>
</x-app-layout>