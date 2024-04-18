<aside id="sidebar-multi-level-sidebar" class="top-0 left-0 w-80 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-customBlue border-r-2 border-customPurple" aria-label="Sidebar">
    <div class="px-3 py-4 overflow-y-auto dark:bg-gray-800">
        <ul class="space-y-4 font-medium">
            @if(Auth()->user()->current_team_id == 1)
            <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="h-16 w-full flex justify-center items-center bg-customPurple text-white rounded-br-2xl text-xl">
                {{ __('General') }}
            </x-nav-link>
            <x-nav-link href="{{ route('admin.users') }}" :active="request()->routeIs('admin.users')" class="h-16 w-full flex justify-center items-center bg-customPurple text-white rounded-br-2xl text-xl">
                {{ __('Gestión usuarios') }}
            </x-nav-link>
            <x-nav-link href="{{ route('admin.settings') }}" :active="request()->routeIs('admin.settings')" class="h-16 w-full flex justify-center items-center bg-customPurple text-white rounded-br-2xl text-xl">
                {{ __('Ajustes') }}
            </x-nav-link>
            @endif
            @if(Auth()->user()->current_team_id == 2)
            <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="h-16 w-full flex justify-center items-center bg-customPurple text-white rounded-br-2xl text-xl">
                {{ __('General') }}
            </x-nav-link>
            <x-nav-link href="{{ route('teacher.users') }}" :active="request()->routeIs('teacher.users')" class="h-16 w-full flex justify-center items-center bg-customPurple text-white rounded-br-2xl text-xl">
                {{ __('Gestión usuarios') }}
            </x-nav-link>
            <x-nav-link href="{{ route('teacher.games') }}" :active="request()->routeIs('teacher.games')" class="h-16 w-full flex justify-center items-center bg-customPurple text-white rounded-br-2xl text-xl">
                {{ __('Juegos') }}
            </x-nav-link>
            <x-nav-link href="{{ route('teacher.results') }}" :active="request()->routeIs('teacher.results')" class="h-16 w-full flex justify-center items-center bg-customPurple text-white rounded-br-2xl text-xl">
                {{ __('Resultados') }}
            </x-nav-link>
            <x-nav-link href="{{ route('teacher.settings') }}" :active="request()->routeIs('teacher.settings')" class="h-16 w-full flex justify-center items-center bg-customPurple text-white rounded-br-2xl text-xl">
                {{ __('Ajustes') }}
            </x-nav-link>
            @endif
            @if(Auth()->user()->current_team_id == 3)
            <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="h-16 w-full flex justify-center items-center bg-customPurple text-white rounded-br-2xl text-xl">
                {{ __('General') }}
            </x-nav-link>
            <x-nav-link href="{{ route('student.games') }}" :active="request()->routeIs('student.games')" class="h-16 w-full flex justify-center items-center bg-customPurple text-white rounded-br-2xl text-xl">
                {{ __('Juegos') }}
            </x-nav-link>
            <x-nav-link href="{{ route('student.results') }}" :active="request()->routeIs('student.results')" class="h-16 w-full flex justify-center items-center bg-customPurple text-white rounded-br-2xl text-xl">
                {{ __('Resultados') }}
            </x-nav-link>
            <x-nav-link href="{{ route('student.settings') }}" :active="request()->routeIs('student.settings')" class="h-16 w-full flex justify-center items-center bg-customPurple text-white rounded-br-2xl text-xl">
                {{ __('Ajustes') }}
            </x-nav-link>
            @endif
        </ul>
    </div>
</aside>