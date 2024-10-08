<div>

    <form class="mb-4" wire:submit='save'>
        <x-input wire:model='pais' placeholder="Ingrese un pais" />
        <x-button>
            Agregar
        </x-button>
    </form>

    <ul class="list-disc list-inside space-y-2">
        @foreach($paises as $pais)
        <li> {{ $pais }} <x-danger-button>X</x-danger-button> </li>

        @endforeach
    </ul>
</div>
