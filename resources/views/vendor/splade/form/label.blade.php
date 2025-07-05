<span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
    {!! __($label) !!}
    @if($attributes->has('required') || $attributes->has('data-required'))
        <span aria-hidden="true" class="text-red-600" title="{{ __('This field is required') }}">*</span>
    @endif
</span>
