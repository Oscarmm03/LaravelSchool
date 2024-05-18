<x-app-layout>
    <div class="w-full h-full flex flex-col">
        <div>
            <div class="w-full p-8">
                <h1 class="text-3xl font-bold text-gray-700 border-b-2">Juegos</h1>
                
                @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mt-4" role="alert">
                    <p class="font-bold">Congratulations!</p>
                    <p>{{ session('success') }}</p>
                </div>
                @endif
                @if (session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mt-4" role="alert">
                    <p class="font-bold">Ooops!</p>
                    <p>{{ session('error') }}</p>
                </div>
                @endif

                <div class="mt-4">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-yellow-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-bold text-gray-900 uppercase tracking-wider">
                                    Nombre
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-bold text-gray-900 uppercase tracking-wider">
                                    Descripción
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-bold text-gray-900 uppercase tracking-wider">
                                    URL
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-bold text-gray-900 uppercase tracking-wider">
                                    Asignatura
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-bold text-gray-900 uppercase tracking-wider">
                                    Assignar a
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($games as $game)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-600">
                                                {{ $game->title }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $game->description }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $game->url }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $game->subject_area }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <a href="{{ route('teacher.games.assignUser', ['id' => $game->id]) }}" class="text-blue-300 hover:text-blue-400">
                                        <!-- Icono de usuario para Estudiante -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M10 12a5 5 0 100-10 5 5 0 000 10zm-7 7a7 7 0 0114 0H3z" />
                                        </svg>
                                    </a>
                                    <a href="{{ route('teacher.games.assignCourse', ['id' => $game->id]) }}" class="text-green-300 hover:text-green-400">
                                        <!-- Icono de varios usuarios para Clase -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5 10a5 5 0 100-10 5 5 0 000 10zm0 2a7 7 0 00-7 7v1h14v-1a7 7 0 00-7-7zM15 10a5 5 0 100-10 5 5 0 000 10zm-1 2a7 7 0 017 7v1h-8v-1a7 7 0 011-7z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        @if($games->hasPages())
                        {{ $games->links() }}
                        @else
                        <div class="w-full flex justify-center mt-4">
                            <p class="font-light text-sm text-gray-500">No hay más juegos</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>