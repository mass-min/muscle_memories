<form action="{{ route('workouts.store', null, false) }}" method="POST">
    @csrf

    <div class="grid grid-cols-5 gap-4">
        <div>
            <x-form.label for="training[0][menu]" value="トレーニングメニュー" />
            <select name="training[0][menu]" class="mt-1 block form-select w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                @foreach(\App\Domain\MuscleMemories\Domain\Entity\TrainingMenuEntity::getTrainingMenuSelectOptions() as $bodyPart => $options)
                    <optgroup label="{{ $bodyPart }}">
                        @foreach($options as $option)
                            <option value="{{ $option['id'] }}">{{ $option['name'] }}</option>
                        @endforeach
                    </optgroup>
                @endforeach
            </select>
        </div>

        <div class="col-span-3">
            <div class="grid grid-cols-3">
                <div>
                    <x-form.label for="training[0][sets][0][weight]" value="重量(kg)" />
                    <x-number-form id="weight" type="number" name="training[0][sets][0][weight]" required />
                </div>

                <div>
                    <x-form.label for="training[0][sets][0][reps]" value="レップ数(回)" />
                    <x-number-form id="reps" type="number" name="training[0][sets][0][reps]" required />
                </div>

                <div>
                    <x-form.label for="training[0][sets][0][interval_seconds]" value="インターバル時間(秒)" />
                    <x-number-form id="interval_seconds" type="number" name="training[0][sets][0][interval_seconds]" required />
                </div>
            </div>

            <div class="grid grid-cols-3">
                <div>
                    <x-form.label for="training[0][sets][1][weight]" value="重量(kg)" />
                    <x-number-form id="weight" type="number" name="training[0][sets][1][weight]" required />
                </div>

                <div>
                    <x-form.label for="training[0][sets][1][reps]" value="レップ数(回)" />
                    <x-number-form id="reps" type="number" name="training[0][sets][1][reps]" required />
                </div>

                <div>
                    <x-form.label for="training[0][sets][1][interval_seconds]" value="インターバル時間(秒)" />
                    <x-number-form id="interval_seconds" type="number" name="training[0][sets][1][interval_seconds]" required />
                </div>
            </div>
        </div>
    </div>

    <button type="submit">トレーニング開始</button>
</form>