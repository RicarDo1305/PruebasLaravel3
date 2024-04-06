<div class="bg-gray-800 overflow-hidden shadow-sm p-0 m-2 rounded-lg sm:rounded-lg sm:m-0">
                <div class="p-10 text-gray-100">
                    <form action="{{ route($route, $pregunta ?? null) }}" method="POST">
                        @csrf
                        @method($method)
                      
                        {{$slot}}

                        <x-primary-button class="mt-4 bg-green-900 text-white hover:bg-green-700">
                            {{ __($nameButton) }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
