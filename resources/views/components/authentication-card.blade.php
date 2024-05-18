<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 bg-gradient-to-r from-yellow-100 via-lime-100 to-sky-400 sm:pt-0 dark:bg-gray-900">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white border-4 border-yellow-400 dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
