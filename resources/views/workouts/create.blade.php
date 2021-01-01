<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <h1>新規ワークアウト作成</h1>

            <form action="{{ route('workouts.store', null, false) }}" method="POST">
                @csrf
                <div class="col-span-6 sm:col-span-3">
                    <label for="training_menu" class="block text-sm font-medium leading-5 text-gray-700">トレーニングメニュー</label>
                    <select name="training_menu" class="mt-1 block form-select w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        @foreach(\App\Domain\MuscleMemories\Domain\Entity\TrainingMenuEntity::getTrainingMenuSelectOptions() as $bodyPart => $options)
                            <optgroup label="{{ $bodyPart }}">
                                @foreach($options as $option)
                                    <option value="{{ $option['id'] }}">{{ $option['name'] }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="reps">レップ数</label>
                    <input type="number" class="form-control" name="reps">
                </div>

                <div class="form-group">
                    <label for="weight">重量</label>
                    <input type="number" class="form-control" name="weight">
                </div>

                <div class="form-group">
                    <label for="interval_seconds">インターバル時間</label>
                    <input type="number" class="form-control" name="interval_seconds">
                </div>

                <button type="submit">トレーニング開始</button>
            </form>
        </div>
    </div>
</x-app-layout>
