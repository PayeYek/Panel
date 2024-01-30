<div {{ $attributes->only(['v-if', 'v-show', 'class']) }}>
    <label class="flex items-center text-gray-900 dark:text-white">
        <input {{ $attributes->except(['v-if', 'v-show', 'class'])->class(
            'bg-gray-100 dark:bg-gray-700 rounded-full border-gray-300 dark:border-gray-600 text-primary-600 shadow-sm focus:border-primary-300 focus:ring focus:ring-offset-white dark:focus:ring-offset-gray-800 focus:ring-primary-200 focus:ring-opacity-50 disabled:opacity-50'
        )->merge([
            'name' => $name,
            'value' => $value,
            'type' => 'radio',
            'v-model' => $vueModel(),
            'data-validation-key' => $validationKey(),
        ]) }}
        />

        @if(trim($slot))
            <span class="ms-2">{{ $slot }}</span>
        @else
            <span class="ms-2">{{ __($label) }}</span>
        @endif
    </label>

    @includeWhen($help, 'splade::form.help', ['help' => $help])
    @includeWhen($showErrors, 'splade::form.error', ['name' => $validationKey()])
  </div>


