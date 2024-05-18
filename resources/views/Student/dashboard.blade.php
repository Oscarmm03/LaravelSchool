<x-app-layout>
    <!-- Contenedor principal con la imagen de fondo -->
    <div class="min-h-screen flex flex-col items-center justify-center text-center bg-cover bg-center" style="background-image: url('{{ asset('img/fondo2.jpg') }}'); background-position: center bottom;">
        <div class="bg-white bg-opacity-75 p-8 rounded-lg shadow-md -mt-16">
            <div class="mb-8">
                <!-- Logotipo centrado -->
                <img src="{{ asset('img/Logo_.png') }}" alt="Linkón" class="mx-auto">
            </div>
            <div class="flex flex-col items-center">
                <h3 class="text-2xl mb-4">Hola {{ Auth::user()->name }} &#x1F44B;</h3>
                <p class="w-72 sm:w-96 text-xl mb-2">Bienvenido a LinkOn.</p>
                <p id="welcome-text" class="w-72 sm:w-96 text-xl"></p>
            </div>
        </div>
    </div>
    <input type="text" class="hidden" id="games" value="{{ $games->count() }}">
    <script>
        let games = document.getElementById('games').value;
        let welcomeText = "";
        if (games == 0) {
            welcomeText = "Utiliza las opciones de la izquierda de la pantalla para acceder a ellas.";
        } else {
            welcomeText = "Tienes juegos pendientes de realizar. Utiliza la pestaña Juegos para acceder a ellos.";
        }
        const element = document.getElementById('welcome-text');
        let index = 0;

        function typeWriter() {
            if (index < welcomeText.length) {
                element.innerHTML += welcomeText.charAt(index);
                index++;
                setTimeout(typeWriter, 50); // Velocidad de escritura (en milisegundos)
            }
        }

        typeWriter();
    </script>
</x-app-layout>
