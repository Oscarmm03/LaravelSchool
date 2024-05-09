<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Asignar juego a estudiante
        </h2>
    </x-slot>
    <div class="w-full flex items-center justify-end pr-5 pt-4">
            <a href="{{ route('teacher.games') }}" class="bg-customPurple rounded-full hover:bg-customYellow hover:text-customPurple hover:cursor-pointer flex items-center justify-center w-12 h-12">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-10 h-10 text-customYellow hover:text-customPurple">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
        </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="mt-8 text-2xl">
                        <h1>Asignar juego {{ $game->title }} a</h1>
                    </div>
                    <div class="mt-6 text-gray-500">
                        <form action="{{ route('teacher.games.storeGameUserAssign', ['id' => $game->id]) }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="user_id" class="sr-only">Estudiante</label>
                                <select name="user_id" id="user_id" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('student_id') border-red-500 @enderror">
                                    <option value="">Selecciona un estudiante</option>
                                    @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endforeach
                                </select>
                                @error('student_id')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>
                                <button type="submit" class="bg-customPurple text-customYellow px-4 py-3 rounded font-medium w-1/4 hover:bg-customYellow hover:text-customPurple">Asignar</button>
                            </div>
                        </form>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>