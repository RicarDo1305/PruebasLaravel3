<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Registro') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-screen-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-100">

                    <form method="POST" action="{{ route('register2') }}">
                        @csrf
                        
                        <div class="grid grid-cols-2 gap-6">
                            <!-- Name -->
                            <div>
                                <x-input-label for="name" :value="__('Nombre (s)')" />
                                <x-text-input id="name" class="w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Apellido Paterno -->
                            <div>
                                <x-input-label for="apaterno" :value="__('Apellido paterno')" />
                                <x-text-input id="apaterno" class="w-full" type="text" name="apaterno" :value="old('apaterno')" required autofocus autocomplete="apaterno" />
                                <x-input-error :messages="$errors->get('apaterno')" class="mt-2" />
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-6 mt-4">
                            <!-- Apellido Materno -->
                            <div>
                                <x-input-label for="amaterno" :value="__('Apellido materno')" />
                                <x-text-input id="amaterno" class="w-full" type="text" name="amaterno" :value="old('amaterno')" required autofocus autocomplete="amaterno" />
                                <x-input-error :messages="$errors->get('amaterno')" class="mt-2" />
                            </div>

                            <!-- Número de Control -->
                            <div>
                                <x-input-label for="noControl" :value="__('Número de Control')" />
                                <x-text-input id="noControl" class="w-full" type="text" name="noControl" :value="old('noControl')" required autofocus autocomplete="noControl" />
                                <x-input-error :messages="$errors->get('noControl')" class="mt-2" />
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-6 mt-4">
                            <!-- CURP -->
                            <div>
                                <x-input-label for="curp" :value="__('CURP')" />
                                <x-text-input id="curp" class="w-full" type="text" name="curp" :value="old('curp')" required autofocus autocomplete="curp" />
                                <x-input-error :messages="$errors->get('curp')" class="mt-2" />
                            </div>

                            <!-- Número Seguro Social -->
                            <div>
                                <x-input-label for="nss" :value="__('NSS')" />
                                <x-text-input id="nss" class="w-full" type="text" name="nss" :value="old('nss')" required autofocus autocomplete="nss" />
                                <x-input-error :messages="$errors->get('nss')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Rol (hidden) -->
                        <div style="display: none;">
                            <x-input-label for="rol" :value="__('Rol')" />
                            <x-text-input id="rol" type="number" name="rol" :value="3" required readonly />
                            <x-input-error :messages="$errors->get('rol')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="w-full" type="password" name="password" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                            <x-text-input id="password_confirmation" class="w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <x-primary-button class="ms-3 bg-green-900 text-white hover:bg-green-700">
                                {{ __('Registrar') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
