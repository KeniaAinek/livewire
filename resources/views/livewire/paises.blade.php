<div>

    <x-button class="mb-2" wire:click="$set('count',0)">
        Mostrar / Ocultar
    </x-button>

    <form class="mb-4" wire:submit='save'>
        <x-input wire:model='pais' placeholder="Ingrese un pais" wire:keydown.space='increment' />
        <x-button>
            Agregar
        </x-button>
    </form>

    <ul class="list-disc list-inside space-y-2">
        @foreach($paises as $index => $pais)
        <li wire:key='pais-{{$index}}'>
            <span wire:mouseenter='changeActive("{{ $pais }}")'>
                ({{ $index }}) {{ $pais }}
            </span>
        <x-danger-button wire:click='delete({{ $index }})'>
            X
        </x-danger-button> </li>

        @endforeach
    </ul>
    {{ $active}}
    {{ $count }}
</div>
