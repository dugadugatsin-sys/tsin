<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo e(config('app.name', 'Application')); ?></title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Tailwind CSS CDN -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                darkMode: 'class',
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Inter', 'sans-serif'],
                        }
                    }
                }
            }
        </script>
    </head>
    <body class="bg-black text-gray-100 font-sans antialiased selection:bg-blue-600 selection:text-white flex flex-col min-h-screen justify-between">
        
        <!-- Navigation Header -->
        <header class="w-full max-w-7xl mx-auto px-6 py-6 flex items-center justify-between border-b border-gray-900">
            <div class="flex items-center">
                <a href="/" class="text-xl font-bold tracking-tight text-white">
                    <?php echo e(config('app.name', 'Application')); ?>

                </a>
            </div>

            <?php if(Route::has('login')): ?>
                <nav class="flex items-center gap-3">
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(url('/dashboard')); ?>" class="px-5 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-semibold text-sm transition-all shadow-lg shadow-blue-600/25">
                            Dashboard
                        </a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>" class="px-5 py-2.5 rounded-xl border border-gray-800 hover:border-gray-700 bg-gray-950 text-gray-300 hover:text-white font-medium text-sm transition-all">
                            Log in
                        </a>

                        <?php if(Route::has('register')): ?>
                            <a href="<?php echo e(route('register')); ?>" class="px-5 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-semibold text-sm transition-all shadow-lg shadow-blue-600/25">
                                Register
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                </nav>
            <?php endif; ?>
        </header>

        <!-- Main Hero Section -->
        <main class="w-full max-w-7xl mx-auto px-6 py-16 my-auto">
            <div class="text-center max-w-3xl mx-auto space-y-6">
                
                <!-- Badge -->
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-blue-500/10 border border-blue-500/20 text-blue-400 text-xs font-semibold uppercase tracking-wider">
                    <span>Welcome to <?php echo e(config('app.name', 'Our Platform')); ?></span>
                </div>

                <!-- Main Heading -->
                <h1 class="text-4xl sm:text-6xl font-extrabold text-white tracking-tight leading-tight">
                    Empower Your Business With <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-indigo-400">Smart Solutions</span>
                </h1>

                <!-- Subtitle -->
                <p class="text-gray-400 text-base sm:text-lg leading-relaxed">
                    Streamline operations, boost productivity, and deliver exceptional experiences with our fast, secure, and reliable system tailored for your needs.
                </p>

                <!-- Action Buttons -->
                <div class="flex flex-wrap items-center justify-center gap-4 pt-4">
                    <?php if(Route::has('register')): ?>
                        <a href="<?php echo e(route('register')); ?>" class="px-7 py-3.5 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-semibold text-sm transition-all shadow-xl shadow-blue-600/20 flex items-center gap-2">
                            <span>Register Now</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    <?php endif; ?>
                    <a href="#features" class="px-7 py-3.5 rounded-xl border border-gray-800 bg-gray-950 hover:bg-gray-900 text-gray-300 hover:text-white font-semibold text-sm transition-all">
                        Learn More
                    </a>
                </div>
            </div>

            <!-- Business Features Grid -->
            <div id="features" class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-20">
                
                <!-- Card 1 -->
                <div class="p-6 rounded-2xl bg-gray-950 border border-gray-900 hover:border-blue-500/40 transition-all hover:-translate-y-1">
                    <h3 class="text-lg font-bold text-white mb-2">High Performance</h3>
                    <p class="text-sm text-gray-400 leading-relaxed">Experience ultra-fast loading times and smooth management workflow for your day-to-day operations.</p>
                </div>

                <!-- Card 2 -->
                <div class="p-6 rounded-2xl bg-gray-950 border border-gray-900 hover:border-blue-500/40 transition-all hover:-translate-y-1">
                    <h3 class="text-lg font-bold text-white mb-2">Secure & Reliable</h3>
                    <p class="text-sm text-gray-400 leading-relaxed">Your data is fully protected with modern encryption and top-tier security standards.</p>
                </div>

                <!-- Card 3 -->
                <div class="p-6 rounded-2xl bg-gray-950 border border-gray-900 hover:border-blue-500/40 transition-all hover:-translate-y-1">
                    <h3 class="text-lg font-bold text-white mb-2">Dedicated Support</h3>
                    <p class="text-sm text-gray-400 leading-relaxed">Our team is always ready to assist and keep your system running without interruptions.</p>
                </div>

            </div>
        </main>

        <!-- Footer Section -->
        <footer class="w-full max-w-7xl mx-auto px-6 py-6 border-t border-gray-900 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-gray-500">
            <p>&copy; <?php echo e(date('Y')); ?> <?php echo e(config('app.name', 'Application')); ?>. All rights reserved.</p>
            <div class="flex items-center gap-6">
                <a href="#" class="hover:text-gray-300 transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-gray-300 transition-colors">Terms of Service</a>
                <a href="#" class="hover:text-gray-300 transition-colors">Contact Us</a>
            </div>
        </footer>

    </body>
</html><?php /**PATH D:\laragon\www\Tsin\resources\views/welcome.blade.php ENDPATH**/ ?>