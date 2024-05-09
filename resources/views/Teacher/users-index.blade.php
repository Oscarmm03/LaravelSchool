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
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nombre
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Curso
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Profesor
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
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
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <a href="{{ route('teacher.users.edit', ['id' => $user->id]) }}" class="text-indigo-600 hover:text-indigo-900">Asignar curso</a>
                                    @foreach ($enrollments as $enrollment)
                                    @if ($enrollment->user_id == $user->id)
                                    <form action="{{ route('teacher.users.unassignCourse', ['id' => $enrollment->id]) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Eliminar curso</button>
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