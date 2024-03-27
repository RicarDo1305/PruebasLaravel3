      <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-10 text-gray-100">
                    <form action="{{ route($route, $chirp ?? null) }}" method="POST">
                        @csrf
                        @method($method)
                        <div class="space-y-3">
                        <x-text-area name="message" placeholder="¿Que estas pensando?" textAreaDev=""/>
                        </div>

                        <x-primary-button class="mt-4">
                            {{ __($nameButton) }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
 