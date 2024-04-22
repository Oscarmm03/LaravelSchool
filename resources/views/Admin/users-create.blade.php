<x-app-layout>
    <div class="w-full h-full flex flex-col">
        <div class="w-full flex items-center justify-end pr-20 pt-4">
            <button onclick="window.history.back()" class="bg-customPurple rounded-full hover:bg-customYellow hover:text-customPurple hover:cursor-pointer flex items-center justify-center w-12 h-12">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-10 h-10 text-customYellow hover:text-customPurple">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </button>
        </div>

        <div class="w-full border-2 border-green-800 p-8">
            <h1 class="text-3xl font-bold text-gray-700">Añadir usuario</h1>
            <div>
                <form action="{{ route('admin.users.create') }}" method="post">
                    @csrf
                    <div class="flex w-full gap-10">
                        <div class="w-2/6">
                            <x-label for="name" value="{{ __('Name') }}" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        </div>
                        <div class="w-2/6">
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

</x-app-layout>