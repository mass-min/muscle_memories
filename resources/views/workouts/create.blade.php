<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <h1>新規ワークアウト作成</h1>
        @include('workouts._form')
    </div>
    <livewire:test />
</x-app-layout>