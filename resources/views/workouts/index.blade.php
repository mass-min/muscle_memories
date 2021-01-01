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
                    <li>
                        <p>{{ $training->trainingMenu->name }}</p>
                        <ul>
                            @foreach($training->trainingSets as $trainingSet)
                                <li>
                                    <p>{{ $trainingSet->reps }}回</p>
                                    <p>{{ $trainingSet->weight }}kg</p>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
