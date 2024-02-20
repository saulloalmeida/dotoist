<?php

use Illuminate\Support\Facades\Auth;

use function Livewire\Volt\{state, rules};

state([
    'task' => '',
]);

rules([
    'task' => 'required|max:255',
]);

$store = function () {
    $validated = $this->validate();
    Auth::user()->tasks()->create($validated);
    $this->task = '';
};

?>

<div class="flex flex-col gap-2">
    <form wire:submit="store">
        <x-ts-input label="Tarefa" wire:model="task"/>
        <x-ts-button square>TallStackUi</x-ts-button>
    </form>

</div>
