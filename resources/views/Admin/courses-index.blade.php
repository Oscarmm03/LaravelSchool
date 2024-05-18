<x-app-layout>
    <div class="w-full h-full flex flex-col">
        <div class="flex flex-row justify-end">
            <div class="flex items-center justify-end pr-5 pt-4">
                <x-nav-link href="{{ route('admin.courses.create')}}" class="bg-customPurple rounded-full hover:bg-customYellow hover:text-customPurple hover:cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-10 h-10 text-customYellow hover:text-customPurple">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                </x-nav-link>
            </div>
        </div>

        <div class="w-full p-4 sm:p-8">
            <h1 class="text-3xl font-bold text-gray-700 border-b-2 pb-2">Cursos</h1>
            
            @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mt-4" role="alert">
                <p class="font-bold">¡Felicidades!</p>
                <p>{{ session('success') }}</p>
            </div>
            @endif
            @if (session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mt-4" role="alert">
                <p class="font-bold">¡Ooops!</p>
                <p>{{ session('error') }}</p>
            </div>
            @endif

            <div class="mt-4 overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-yellow-400">
                        <tr>
                            <th scope="col" class="px-4 py-2 sm:px-6 sm:py-3 text-left text-xs sm:text-sm font-bold text-gray-900 uppercase tracking-wider">
                                Nombre
                            </th>
                            <th scope="col" class="px-4 py-2 sm:px-6 sm:py-3 text-left text-xs sm:text-sm font-bold text-gray-900 uppercase tracking-wider">
                                Descripción
                            </th>
                            <th scope="col" class="px-4 py-2 sm:px-6 sm:py-3 text-left text-xs sm:text-sm font-bold text-gray-900 uppercase tracking-wider">
                                Profesor
                            </th>
                            <th scope="col" class="px-4 py-2 sm:px-6 sm:py-3 text-left text-xs sm:text-sm font-bold text-gray-900 uppercase tracking-wider">
                                Rama
                            </th>
                            <th scope="col" class="px-4 py-2 sm:px-6 sm:py-3 text-left text-xs sm:text-sm font-bold text-gray-900 uppercase tracking-wider">
                                Alumnos
                            </th>
                            <th scope="col" class="px-4 py-2 sm:px-6 sm:py-3 text-left text-xs sm:text-sm font-bold text-gray-900 uppercase tracking-wider">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($courses as $course)
                        <tr>
                            <td class="px-4 py-2 sm:px-6 sm:py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <div class="text-xs sm:text-sm font-medium text-gray-600">
                                            {{ $course->title }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-2 sm:px-6 sm:py-4 whitespace-nowrap">
                                <div class="text-xs sm:text-sm text-gray-900">{{ $course->description }}</div>
                            </td>
                            <td class="px-4 py-2 sm:px-6 sm:py-4 whitespace-nowrap">
                                <div class="text-xs sm:text-sm text-gray-900">{{ $course->teacher->name }}</div>
                            </td>
                            <td class="px-4 py-2 sm:px-6 sm:py-4 whitespace-nowrap">
                                <div class="text-xs sm:text-sm text-gray-900">{{ $course->department->name }}</div>
                            </td>
                            <td class="px-4 py-2 sm:px-6 sm:py-4 whitespace-nowrap">
                                <div class="text-xs sm:text-sm text-gray-900">{{ $course->enrollments->where('status', 'true')->count() }}</div>
                            </td>
                            <td class="px-4 py-2 sm:px-6 sm:py-4 whitespace-nowrap text-xs sm:text-sm font-medium">
                                <a href="{{ route('admin.courses.edit', ['id' => $course->id]) }}" class="text-blue-300 hover:text-blue-400">
                                    <!-- Icono de lápiz para editar -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M17.414 2.586a2 2 0 010 2.828L7.414 15.414a2 2 0 01-1.414.586H4a1 1 0 01-1-1v-2.586a2 2 0 01.586-1.414l10-10a2 2 0 012.828 0zM15 3l2 2L7 15H5v-2l10-10z" />
                                    </svg>
                                </a>
                                <form action="{{ route('admin.courses.destroy', ['id' => $course->id]) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-300 hover:text-red-400">
                                        <!-- Icono de papelera para eliminar -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H2.5A1.5 1.5 0 001 5.5V6h1v9a2 2 0 002 2h10a2 2 0 002-2V6h1v-.5A1.5 1.5 0 0017.5 4H15V3a1 1 0 00-1-1H6zm9 3v9a1 1 0 01-1 1H6a1 1 0 01-1-1V5h10zM4.5 6v9h11V6h-11zm4-2h3V3h-3v1z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    @if($courses->hasPages())
                    {{ $courses->links() }}
                    @else
                    <div class="w-full flex justify-center mt-4">
                        <p class="font-light text-sm text-gray-500">No hay más cursos</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
