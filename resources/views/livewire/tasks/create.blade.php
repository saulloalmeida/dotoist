<?php

use Illuminate\Support\Facades\Auth;

use function Livewire\Volt\{state, rules};

state([
    'title' => '',
]);

rules([
    'title' => 'required|max:255',
]);

$store = function () {
    $validated = $this->validate();
    auth()->user()->tasks()->create($validated);
    $this->title = '';
};

?>

<div class="flex flex-col gap-2">
    <form wire:submit="store">
        <x-ts-input label="Tarefa" wire:model="title"/>
        <x-ts-button square>TallStackUi</x-ts-button>
    </form>

</div>
