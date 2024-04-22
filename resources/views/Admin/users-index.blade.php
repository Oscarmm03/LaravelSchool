<x-app-layout>
    <div class="w-full h-full flex flex-col">
        <div class="w-full flex items-center justify-end pr-20 pt-4">
            <x-nav-link href="{{ route('admin.users.create')}}" class="bg-customPurple rounded-full hover:bg-customYellow hover:text-customPurple hover:cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-10 h-10 text-customYellow hover:text-customPurple">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
            </x-nav-link>
        </div>

    </div>
</x-app-layout>