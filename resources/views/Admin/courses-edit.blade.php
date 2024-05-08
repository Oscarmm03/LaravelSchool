<x-app-layout>
    <div class="w-full h-full flex flex-col">
        <div class="w-full flex items-center justify-end pr-5 pt-4">
            <a href="{{ route('admin.courses') }}" class="bg-customPurple rounded-full hover:bg-customYellow hover:text-customPurple hover:cursor-pointer flex items-center justify-center w-12 h-12">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-10 h-10 text-customYellow hover:text-customPurple">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
        </div>

        <div class="w-full p-8">
            <h1 class="text-3xl font-bold text-gray-700 border-b-2">Editar curso</h1>

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

            <div>
                <form action="{{ route('admin.courses.update', ['id' => $course->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mt-4">
                        <label for="title" class="block font-medium text-sm text-gray-700 dark:text-gray-300'">Nombre curso</label>
                        <input type="text" name="title" id="title" class="w-1/3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" :value="$course->title" placeholder="{{ $course->title }}" required autofocus autocomplete="title">
                    </div>
                    <div class="mt-4">
                        <label for="description" class="block font-medium text-sm text-gray-700 dark:text-gray-300'">Descripción</label>
                        <textarea name="description" id="description" class="w-1/3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" :value="$course->description" placeholder="{{ $course->description }}" required autofocus autocomplete="description"></textarea>
                    </div>
                    <div class="mt-4">
                        <label for="teacher" class="block font-medium text-sm text-gray-700 dark:text-gray-300'">Profesor</label>
                        <select id="teacher" class="w-1/3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" name="teacher" required>
                            <option value="">Seleccione un profesor</option>
                            @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}" @if ($course->teacher_id == $teacher->id) selected @endif>{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-4">
                        <label for="department" class="block font-medium text-sm text-gray-700 dark:text-gray-300'">Rama</label>
                        <select id="department" class="w-1/3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" name="department" required>
                            <option value="">Seleccione una rama</option>
                            @foreach ($departments as $department)
                            <option value="{{ $department->id }}" @if ($course->department_id == $department->id) selected @endif>{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex items-center justify-start mt-4">
                        <input type="submit" value="Guardar" class="inline-flex items-center px-4 py-2 bg-customPurple dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-customYellow dark:text-gray-800 uppercase tracking-widest hover:bg-customYellow hover:text-customPurple hover:cursor-pointer dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 active:text-white dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>