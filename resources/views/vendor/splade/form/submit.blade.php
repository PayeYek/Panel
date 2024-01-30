@php $customStyling = $hasCustomStyling($attributes) @endphp

<div @class($wrapperClass)>
    <button {{ $attributes->class([
        'rounded-lg shadow-sm font-medium py-2 px-4 focus:outline-none focus:ring-4 focus:ring-primary-500 transition duration-200',
        'bg-primary-700 hover:bg-primary-800 dark:bg-primary-600 dark:hover:bg-primary-700 text-white focus:ring-primary-200 dark:focus:ring-primary-800' => !$customStyling && $primary,
        'bg-red-700 hover:bg-red-800 text-white focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900' => !$customStyling && $danger,
        'text-gray-900 bg-white border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700' => !$customStyling && $secondary,
    ])->merge([
        'type' => $type
    ])->when($name, fn($attr) => $attr->merge(['name' => $name, 'value' => $value])) }}
    >
        @if(trim($slot))
            {{ $slot }}
        @else
            <div class="flex flex-row items-center justify-center">
                <svg
                    v-if="@js($spinner) && form.processing"
                    class="animate-spin me-3 h-5 w-5 @if($secondary) text-gray-700 @else text-white @endif" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                >
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z" />
                </svg>

                <span :class="{ 'opacity-50': form.processing || form.$uploading }">
                    {{ __($label) }}
                </span>
            </div>
        @endif
    </button>
</div>
