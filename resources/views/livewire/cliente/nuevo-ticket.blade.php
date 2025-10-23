<div>
    <div class="flex flex-col gap-4 w-full h-screen overflow-hidden rounded-xl">
        <div class="relative flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div class="fixed inset-0 bg-black bg-opacity-10 flex items-center justify-center z-50">

                <!-- Contenedor del modal -->
                <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg w-full max-w-xl p-6 relative">

                    <!-- Cerrar -->
                    <button class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        wire:click="cerrarCrear">
                        ✕
                    </button>

                    <!-- Contenido -->
                    <form wire:submit.prevent="save" class="space-y-4">
                        <!-- Nombre -->
                        <div>
                            <label for="name"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</label>
                            <input type="text" id="name" wire:model="name"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-gray-100">
                            @error('name')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                            <input type="email" id="email" wire:model="email"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-gray-100">
                            @error('email')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        

                        
                        <div>
                            <label for="password"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirma la
                                contraseña</label>
                            <input type="password" wire:model="password_confirmation"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-gray-100">
                            @error('password')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Botones -->
                        <div class="flex justify-end gap-3 mt-6">
                            <button type="button"
                                class="px-4 py-2 bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-gray-100 rounded-lg hover:bg-gray-400 dark:hover:bg-gray-600">
                                Cancelar
                            </button>
                            <button type="submit"
                                class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500">
                                Guardar
                            </button>
                        </div>
                    </form>

                    <!-- Botones -->

                </div>
            </div>
        </div>
    </div>
</div>
