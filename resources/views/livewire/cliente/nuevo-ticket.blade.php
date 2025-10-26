<div>
    <div class="relative flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
        <div class="relative flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div class="p-6">
                <div class="flex mb-3">
                    <h1 class="text-3xl font-bold mb-3 ml-1">CREAR NUEVO TICKET</h1>
                </div>

                <form wire:submit.prevent="save" enctype="multipart/form-data" class="space-y-4">
                    <!-- Titulo -->
                    <div>
                        <label for="titulo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Titulo</label>
                        <input type="text" id="titulo" wire:model="titulo"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-gray-100">
                        @error('titulo')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Descripción -->
                    <div>
                        <label for="descripcion"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descripción</label>
                        <input type="text" id="descripcion" wire:model="descripcion"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-gray-100">
                        @error('descripcion')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Categoría (select) -->
                    <div>
                        <label for="categoria"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Categoria</label>
                        <select id="categoria" wire:model="id_subcategoria"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-gray-100">
                            <option value="">Selecciona una categoría</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                        @error('categoria_id')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Prioridad (select) -->
                    <div>
                        <label for="prioridad"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Prioridad</label>
                        <select id="prioridad" wire:model="id_prioridad"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-gray-100">
                            <option value="">Selecciona la prioridad</option>
                            @foreach ($prioridades as $prioridad)
                                <option value="{{ $prioridad->id }}">{{ $prioridad->nivel }}</option>
                            @endforeach
                        </select>
                        @error('prioridad_id')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Archivo adjunto -->
                    <div>
                        <label for="archivo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Archivo
                            adjunto</label>
                        <input type="file" id="archivo" wire:model="archivo"
                            class="mt-1 block w-full text-gray-700 dark:text-gray-100 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800">

                        @error('archivo')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror

                        <!-- Vista previa si es una imagen -->
                        @if ($archivo)
                            <div class="mt-2">
                                <span class="text-sm text-gray-500 dark:text-gray-400">Vista previa:</span>
                                <img src="{{ $archivo->temporaryUrl() }}"
                                    class="mt-1 w-32 h-32 object-cover rounded-lg border border-gray-300 dark:border-gray-700">
                            </div>
                        @endif
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

            </div>
        </div>
    </div>
</div>
