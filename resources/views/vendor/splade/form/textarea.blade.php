<SpladeTextarea
    {{ $attributes->only(['v-if', 'v-show', 'class']) }}
    :autosize="@js($attributes->has('autosize') ? (bool) $attributes->get('autosize') : $defaultAutosizeValue)"
    v-model="{{ $vueModel() }}"
>
    <label class="block group/textarea">
        @includeWhen($label, 'splade::form.label', ['label' => $label])
        <div
            class="flex rounded-lg border border-gray-300 dark:border-gray-600 shadow-sm group-focus-within/textarea:ring-1 group-focus-within/textarea:ring-primary-500 group-focus-within/textarea:border-primary-500 transition duration-200">
            <textarea {{ $attributes->except(['v-if', 'v-show', 'class', 'autosize'])->class(
            'rounded-[7px] px-3 block bg-gray-50 dark:bg-gray-700 w-full border-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:placeholder-gray-400 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed'
                )->merge([
            'name' => $name,
            'v-model' => $vueModel(),
            'data-validation-key' => $validationKey(),
        ]) }}></textarea>
        </div>

    </label>

    @includeWhen($help, 'splade::form.help', ['help' => $help])
    @includeWhen($showErrors, 'splade::form.error', ['name' => $validationKey()])
</SpladeTextarea>
