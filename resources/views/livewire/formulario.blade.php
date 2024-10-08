<div>
    <div class="bg-white shadow rounded-lg p-6">
        <form wire:submit='save'>
            <div class="mb-4">
                <label>
                    Nombre
                </label>
                <x-input class="w-full" wire:model='title' required />
            </div>

            <div class="mb-4">
                <label>
                    Contenido
                </label>
                <x-text-area class="w-full" wire:model='content' required></x-text-area>
            </div>
            <div class="mb-4">
                <x-label>
                    Categoria
                </x-label>
                <x-select class="w-full" wire:model='category_id'>
                    @foreach ($categories as $category )
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </x-select>
            </div>

            <div>
                <x-label>
                    Etiquetas
                </x-label>
                <ul>
                    @foreach ($tags as $tag)
                        <li>
                            <label>
                                <x-checkbox wire:model='selected_tags' value="{{ $tag->id }}" />
                                {{ $tag->name }}
                            </label>
                        </li>
                    @endforeach

                </ul>
            </div>

            <div class="flex justify-end">
                <x-button>
                    Crear
                </x-button>
            </div>

        </form>
    </div>
</div>
