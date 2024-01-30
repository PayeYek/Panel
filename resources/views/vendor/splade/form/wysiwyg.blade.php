<SpladeJoditEditor
    {{ $attributes->only(['v-if', 'v-show', 'class']) }}
    :options="@js($joditOptions())"
    :js-options="{!! $jsJoditOptions() !!}"
    v-model="{{ $vueModel() }}"
    :dusk="@js($attributes->get('dusk'))"
>
    <label class="block group">
        @includeWhen($label, 'splade::form.label', ['label' => $label])

        <div class="rounded-lg border border-gray-300 dark:border-gray-600 shadow-sm group-focus-within:ring-1 group-focus-within:ring-primary-500 group-focus-within:border-primary-500 overflow-hidden transition duration-200">
            <textarea {{ $attributes->except(['v-if', 'v-show', 'class'])->class(
            'block w-full rounded-lg bg-gray-50 dark:bg-gray-700 w-full border-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:placeholder-gray-400 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed'
        )->merge([
            'name' => $name,
            'v-model' => $vueModel(),
            'data-validation-key' => $validationKey(),
        ]) }}></textarea>
        </div>

    </label>

    @includeWhen($help, 'splade::form.help', ['help' => $help])
    @includeWhen($showErrors, 'splade::form.error', ['name' => $validationKey()])
</SpladeJoditEditor>
