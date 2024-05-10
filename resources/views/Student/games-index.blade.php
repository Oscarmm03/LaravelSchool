<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <main class="grid min-h-screen w-full place-items-center gap-6 grid-cols-1 md:grid-cols-3">
        @foreach($gamesStudents as $gameStudent)
        <div class="max-w-xs rounded overflow-hidden shadow-lg bg-emerald-400 mb-60 w-2/4 h-1/5">
            <div class="px-6 py-4 h-3/4">
                <div class="font-bold text-xl mb-2">{{ $gameStudent->game->title }}</div>
                <p class="text-gray-700 text-base">{{ $gameStudent->game->description }}</p>
            </div>
            <div class="px-6">
                <a href="{{ $gameStudent->game->url }}" target="_blank" class="bg-customPurple hover:bg-customYellow text-customYellow hover:text-customPurple font-bold py-2 px-4 rounded">
                    Ver
                </a>
            </div>
        </div>
        @endforeach
    </main>
</x-app-layout>



