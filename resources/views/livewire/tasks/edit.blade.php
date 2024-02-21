<?php

use function Livewire\Volt\{state, rules, mount};

state(['task', 'title']);

rules(['title' => 'required|string|max:255']);

mount(fn () => $this->title = $this->task->title);

$update = function () {
    $this->authorize('update', $this->task);

    $validated = $this->validate();

    $this->task->update($validated);

    $this->dispatch('task-updated');
};

$cancel = fn () => $this->dispatch('task-edit-canceled');

?>

<div>
<form wire:submit="update">
        <textarea
            wire:model="title"
            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        ></textarea>

        <x-input-error :messages="$errors->get('title')" class="mt-2" />
        <x-primary-button class="mt-4">{{ __('Save') }}</x-primary-button>
        <button class="mt-4" wire:click.prevent="cancel">Cancel</button>
    </form>
</div>
