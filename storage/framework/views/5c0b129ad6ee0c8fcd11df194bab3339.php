<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Application')); ?></title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

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

        <!-- Scripts -->
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    </head>
    <body class="font-sans text-gray-100 antialiased bg-black min-h-screen flex flex-col justify-center items-center p-6 selection:bg-blue-600 selection:text-white">
        
        <!-- App Name Header -->
        <div class="mb-6 flex flex-col items-center">
            <a href="/" class="flex items-center">
                <span class="text-2xl font-bold tracking-tight text-white"><?php echo e(config('app.name', 'Application')); ?></span>
            </a>
        </div>

        <!-- Form Container -->
        <div class="w-full sm:max-w-md px-6 py-8 bg-gray-950 border border-gray-900 shadow-2xl rounded-2xl">
            <?php echo e($slot); ?>

        </div>

    </body>
</html><?php /**PATH D:\laragon\www\Tsin\resources\views/layouts/guest.blade.php ENDPATH**/ ?>