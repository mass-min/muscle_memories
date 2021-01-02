<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <h1>ワークアウト一覧</h1>
            <ul>
                @foreach($workouts as $workout)
                    <li class="border list-none rounded-sm px-3 py-3">
                        <p>実行日: {{ $workout->created_at }}</p>
                        @foreach($workout->trainings as $training)
                            <div class="p-3">
                                <h2>{{ $training->trainingMenu->name }}</h2>
                                <ul class="p-3">
                                    @foreach($training->trainingSets as $trainingSet)
                                        <li class="border-t list-none rounded-sm px-3 py-3 flex">
                                            <p>{{ $trainingSet->weight }}kg</p>
                                            <p class="ml-2">{{ $trainingSet->reps }}reps</p>
                                            <p class="ml-2 flex-grow">インターバル: {{ $trainingSet->interval_seconds }}s</p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
