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

    <x-number-form :name="reps" :label="レップ数">
        <x-slot name="label">レップ数</x-slot>
        <x-slot name="name">reps</x-slot>
    </x-number-form>

    <x-number-form>
        <x-slot name="label">重量</x-slot>
        <x-slot name="name">weight</x-slot>
    </x-number-form>

    <x-number-form>
        <x-slot name="label">インターバル時間</x-slot>
        <x-slot name="name">interval_seconds</x-slot>
    </x-number-form>

    <button type="submit">トレーニング開始</button>
</form>