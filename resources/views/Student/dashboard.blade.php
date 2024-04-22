<x-app-layout>
    <div class="min-h-screen flex items-center justify-center">
        <div class="">
            <!-- el logo -->
            <img src="{{ asset('img/linkon-logo-no-bg.png') }}" alt="Linkón">
        </div>
        <div class="flex flex-col -mt-56 -ml-10">
            <div>
                <img class="-z-10 -mt-96" src="{{ asset('img/globo-no-bg.png') }}" alt="Bocadillo">
            </div>
            <div class="-mt-80">
                <h3 class="pl-11 -mt-16 text-2xl">Hola {{ Auth::user()->name }} &#x1F44B;</h3>
                <p id="welcome-text" class="pl-11 w-96 text-xl text-justify"></p>
            </div>
        </div>
    </div>

    <script>
        const welcomeText = "Bienvenid@ a LinkOn. Utiliza las opciones de la izquierda de la pantalla para acceder a ellas.";
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