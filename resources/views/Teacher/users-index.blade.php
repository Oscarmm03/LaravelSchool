<x-app-layout>
    <div class="w-full h-full flex flex-col">
        <div>
            <div class="w-full p-8">
                <h1 class="text-3xl font-bold text-gray-700 border-b-2">Estudiantes</h1>

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
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-bold text-gray-900 uppercase tracking-wider">
                                    Curso
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-bold text-gray-900 uppercase tracking-wider">
                                    Profesor
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-bold text-gray-900 uppercase tracking-wider">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($users as $user)
                            @if ($user->current_team_id == 3)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @foreach ($enrollments as $enrollment)
                                    @if ($enrollment->user_id == $user->id)
                                    {{ $enrollment->course->title }}
                                    @endif
                                    @endforeach
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @foreach ($enrollments as $enrollment)
                                    @if ($enrollment->user_id == $user->id)
                                    {{ $enrollment->course->teacher->name }}
                                    @endif
                                    @endforeach
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                    <a href="{{ route('teacher.users.edit', ['id' => $user->id]) }}" class="text-blue-300 hover:text-blue-400">
                                        <!-- Icono de lápiz para editar curso -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M17.414 2.586a2 2 0 010 2.828L7.414 15.414a2 2 0 01-1.414.586H4a1 1 0 01-1-1v-2.586a2 2 0 01.586-1.414l10-10a2 2 0 012.828 0zM15 3l2 2L7 15H5v-2l10-10z" />
                                        </svg>
                                    </a>
                                    @foreach ($enrollments as $enrollment)
                                        @if ($enrollment->user_id == $user->id)
                                        <form action="{{ route('teacher.users.unassignCourse', ['id' => $enrollment->id]) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-300 hover:text-red-400">
                                                <!-- Icono de papelera para eliminar curso -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H2.5A1.5 1.5 0 001 5.5V6h1v9a2 2 0 002 2h10a2 2 0 002-2V6h1v-.5A1.5 1.5 0 0017.5 4H15V3a1 1 0 00-1-1H6zm9 3v9a1 1 0 01-1 1H6a1 1 0 01-1-1V5h10zM4.5 6v9h11V6h-11zm4-2h3V3h-3v1z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </form>
                                        @endif
                                    @endforeach
                                </td>
                                
                            </tr>
                            @endif
                            @endforeach
                        </tbody>

                    </table>
                    <div>
                        @if($users->hasPages())
                        {{ $users->links() }}
                        @else
                        <div class="w-full flex justify-center mt-4">
                            <p class="font-light text-sm text-gray-500">No hay más estudiantes</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>