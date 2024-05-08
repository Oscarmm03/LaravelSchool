<x-app-layout>
    <div class="w-full h-full flex flex-col">
        <div class="w-full flex items-center justify-end pr-5 pt-4">
            <a href="{{ route('admin.users') }}" class="bg-customPurple rounded-full hover:bg-customYellow hover:text-customPurple hover:cursor-pointer flex items-center justify-center w-12 h-12">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-10 h-10 text-customYellow hover:text-customPurple">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
        </div>

        <div class="w-full p-8">
            <h1 class="text-3xl font-bold text-gray-700 border-b-2">Añadir usuario</h1>
            <div>
                <form method="POST" action="{{ route('admin.users.store') }}">
                    @csrf
                    <div class="mt-4">
                        <label for="name" class="block font-medium text-sm text-gray-700 dark:text-gray-300'">Nombre</label>
                        <input type="text" name="name" id="name" class="w-1/3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" :value="old('name')" required autofocus autocomplete="name">
                    </div>
                    <div class="mt-4">
                        <label for="email" class="block font-medium text-sm text-gray-700 dark:text-gray-300'">Email</label>
                        <input type="email" name="email" id="email" class="w-1/3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" :value="old('email')" required autofocus autocomplete="email">
                    </div>
                    <div class="mt-4">
                        <label for="password" class="block font-medium text-sm text-gray-700 dark:text-gray-300'">Password</label>
                        <input type="password" name="password" id="password" class="w-1/3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required autofocus>
                    </div>
                    <div class="mt-4">
                        <label for="password_confirmation" class="block font-medium text-sm text-gray-700 dark:text-gray-300'">Repita la password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="w-1/3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required autofocus>
                    </div>
                    <div class="mt-4">
                        <label for="role" class="block font-medium text-sm text-gray-700 dark:text-gray-300'">Rol</label>
                        <select id="role" class="w-1/3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" name="role" required>
                            <option value="">Seleccione un rol</option>
                            <option value="1">Admin</option>
                            <option value="2">Teacher</option>
                            <option value="3">Student</option>
                        </select>
                    </div>

                    <div class="flex items-center justify-start mt-4">
                        <input type="submit" value="Guardar" class="inline-flex items-center px-4 py-2 bg-customPurple dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-customYellow dark:text-gray-800 uppercase tracking-widest hover:bg-customYellow hover:text-customPurple hover:cursor-pointer dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 active:text-white dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    </div>
                </form>
            </div>
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
        </div>
    </div>

</x-app-layout>