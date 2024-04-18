<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <button id="loadUsersBtn">Usuarios</button>
                    {{-- <a href="{{ route('users') }}" class="button {{ request()->is('users') ? 'active' : '' }}">Usuarios</a> --}}
                    <button id="loadPedidosBtn">Pedidos</button>

                    <div id="usersSection" style="display: none;">
                    </div>

                    <div id="pedidosSection" style="display: none;">
                        @include('chirps.chirps',[$chirps,'chirp'])
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Manejador de clic en el botón de usuarios
        document.getElementById('loadUsersBtn').addEventListener('click', function () {
            document.getElementById('usersSection').style.display = 'block';
            document.getElementById('loadUsersBtn').style.background = 'blue';
            document.getElementById('loadPedidosBtn').style.background = 'transparent';
            // Ocultar la sección de pedidos
            document.getElementById('pedidosSection').style.display = 'none';
        });

        // Manejador de clic en el botón de pedidos
        document.getElementById('loadPedidosBtn').addEventListener('click', function () {
            document.getElementById('usersSection').style.display = 'none';
            document.getElementById('loadUsersBtn').style.background = 'transparent';
            document.getElementById('loadPedidosBtn').style.background = 'blue';
            // Ocultar la sección de pedidos
            document.getElementById('pedidosSection').style.display = 'block';
    });
    </script>
</x-app-layout>
