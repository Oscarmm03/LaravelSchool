<!-- resources/views/settings/index.blade.php -->
<x-app-layout>
    <div class="w-full h-full flex flex-col">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Ajustes') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <!-- Sección de Perfil -->
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-200">
                            {{ __('Perfil') }}
                        </h3>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Administra tu información personal y de contacto.') }}
                        </p>
                        <form class="mt-6 space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Nombre') }}</label>
                                    <input type="text" name="name" id="name" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Tu nombre">
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Correo Electrónico') }}</label>
                                    <input type="email" name="email" id="email" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="tucorreo@ejemplo.com">
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 transition ease-in-out duration-150">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Sección de Seguridad -->
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-200">
                            {{ __('Seguridad') }}
                        </h3>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Configura tu contraseña y opciones de seguridad.') }}
                        </p>
                        <form class="mt-6 space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="current_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Contraseña Actual') }}</label>
                                    <input type="password" name="current_password" id="current_password" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                                <div>
                                    <label for="new_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Nueva Contraseña') }}</label>
                                    <input type="password" name="new_password" id="new_password" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                                <div class="md:col-span-2">
                                    <label for="confirm_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Confirmar Nueva Contraseña') }}</label>
                                    <input type="password" name="confirm_password" id="confirm_password" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 transition ease-in-out duration-150">
                                    {{ __('Actualizar Contraseña') }}
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Sección de Notificaciones -->
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-200">
                            {{ __('Notificaciones') }}
                        </h3>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Configura cómo recibir notificaciones.') }}
                        </p>
                        <form class="mt-6 space-y-6">
                            <div class="flex items-center">
                                <input id="email_notifications" name="email_notifications" type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                                <label for="email_notifications" class="ml-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Notificaciones por correo electrónico') }}
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="sms_notifications" name="sms_notifications" type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                                <label for="sms_notifications" class="ml-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Notificaciones por SMS') }}
                                </label>
                            </div>
                            <div>
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 transition ease-in-out duration-150">
                                    {{ __('Guardar Cambios') }}
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Sección de Preferencias -->
                    <div class="p-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-200">
                            {{ __('Preferencias') }}
                        </h3>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Configura tus preferencias generales.') }}
                        </p>
                        <form class="mt-6 space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="language" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Idioma') }}</label>
                                    <select id="language" name="language" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        <option>{{ __('Español') }}</option>
                                        <option>{{ __('Inglés') }}</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="timezone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Zona Horaria') }}</label>
                                    <select id="timezone" name="timezone" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        <option>{{ __('GMT-3') }}</option>
                                        <option>{{ __('GMT-4') }}</option>
                                        <option>{{ __('GMT-5') }}</option>
                                        <option>{{ __('GMT-6') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 transition ease-in-out duration-150">
                                    {{ __('Guardar Preferencias') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
