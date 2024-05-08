<x-app-layout>
    <div class="w-full h-full flex flex-col">
        <div class="w-full flex items-center justify-end pr-5 pt-4">
            <a href="{{ route('admin.games') }}" class="bg-customPurple rounded-full hover:bg-customYellow hover:text-customPurple hover:cursor-pointer flex items-center justify-center w-12 h-12">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-10 h-10 text-customYellow hover:text-customPurple">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
        </div>

        <div class="w-full p-8">
            <h1 class="text-3xl font-bold text-gray-700 border-b-2">Añadir juego</h1>
            <div>
                @if (session('success'))
                <div class="text-green-500 mt-4">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="text-red-500 mt-4">
                    {{ session('error') }}
                </div>
                @endif
                <form action="{{ route('admin.games.store') }}" method="post">
                    @csrf
                    <div class="mt-4">
                        <label for="title" class="block font-medium text-sm text-gray-700 dark:text-gray-300'">Nombre del juego</label>
                        <input type="text" name="title" id="title" class="w-1/3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" :value="old('title')" required autofocus autocomplete="title">
                    </div>
                    <div class="mt-4">
                        <label for="description" class="block font-medium text-sm text-gray-700 dark:text-gray-300'">Descripción</label>
                        <textarea name="description" id="description" class="w-1/3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" :value="old('description')" required autofocus autocomplete="description"></textarea>
                    </div>
                    <div class="mt-4">
                        <label for="url" class="block font-medium text-sm text-gray-700 dark:text-gray-300'">URL</label>
                        <input type="text" name="url" id="url" class="w-1/3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" :value="old('url')" required autofocus autocomplete="url"></input>
                    </div>
                    <div class="mt-4">
                        <label for="subject_area" class="block font-medium text-sm text-gray-700 dark:text-gray-300'">Assignatura</label>
                        <input type="text" name="subject_area" id="subject_area" class="w-1/3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" :value="old('subject_area')" required autofocus autocomplete="subject_area"></input>
                    </div>

                    <div class="flex items-center justify-start mt-4">
                        <input type="submit" value="Guardar" class="inline-flex items-center px-4 py-2 bg-customPurple dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-customYellow dark:text-gray-800 uppercase tracking-widest hover:bg-customYellow hover:text-customPurple hover:cursor-pointer dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 active:text-white dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
