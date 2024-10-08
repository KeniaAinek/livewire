<div>
    {{-- <h1>{{ $name }}</h1> --}}

   <input type="text" wire:model.live='name' />

   <x-button wire:click='save'> Save </x-button>

   {{ $name}}
</div>
