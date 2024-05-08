@php $flatpickrOptions = $flatpickrOptions() @endphp
@props(['ltr' => false])
<SpladeInput
    {{ $attributes->only(['v-if', 'v-show', 'v-for', 'class'])->class(['hidden' => $isHidden()]) }}
    :flatpickr="@js($flatpickrOptions)"
    :js-flatpickr-options="{!! $jsFlatpickrOptions !!}"
    v-model="{{ $vueModel() }}"
    #default="inputScope"
>
    <label class="block group/input">
        @includeWhen($label, 'splade::form.label', ['label' => $label])

        <div @if($ltr) dir="ltr" @endif
            class="flex rounded-lg border border-gray-300 dark:border-gray-600 shadow-sm group-focus-within/input:ring-1 group-focus-within/input:ring-primary-500 group-focus-within/input:border-primary-500 transition duration-200"
            :class="{ 'border-red-500 dark:border-red-500' : form.hasError(@js($name)) }">
            @if($prepend)
                <span :class="{ 'opacity-50': inputScope.disabled && @json(!$alwaysEnablePrepend) }"
                      class="inline-flex items-center px-3 rounded-s-[7px] border-e border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-600 font-medium text-gray-900 dark:text-white">
                    {!! $prepend !!}
                </span>
            @endif

            <div class="relative flex flex-1">
                <input
                    {{ $attributes->except(['v-if', 'v-show', 'v-for', 'class'])->class([
                'min-h-[2.5rem] px-3 block bg-gray-50 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white w-full border-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:placeholder-gray-400 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed',
                'rounded-[7px]' => !$append && !$prepend,
                'min-w-0 flex-1 rounded-none' => $append || $prepend,
                'rounded-s-[7px]' => $append && !$prepend,
                'rounded-e-[7px]' => !$append && $prepend,
                'is-password' => $type === 'password',
            ])->merge([
                'name' => $name,
                'type' => $type,
                'data-validation-key' => $validationKey(),
            ])->when(!$flatpickrOptions, fn($attributes) => $attributes->merge([
                'v-model' => $vueModel(),
            ])) }}
                />
                @if($type === 'password')
                    <ShowPassword :input="@js($name)" :ltr="@js($ltr)"/>
                @endif
            </div>


            @if($append)
                <span :class="{ 'opacity-50': inputScope.disabled && @json(!$alwaysEnableAppend) }"
                      class="inline-flex items-center px-3 rounded-e-[7px] border-s border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-600 font-medium text-gray-900 dark:text-white">
                    @if($slot->isNotEmpty())
                        {{$slot}}
                    @else
                        {!! $append !!}
                    @endif
                </span>
            @endif

        </div>
        @if($flatpickrOptions)
            <div class="flex mt-1" v-show="{{$vueModel()}}">
                <svg class="w-4 h-4 text-primary-500 me-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M12 2C6.49 2 2 6.49 2 12s4.49 10 10 10 10-4.49 10-10S17.51 2 12 2zm4.35 13.57a.746.746 0 01-1.03.26l-3.1-1.85c-.77-.46-1.34-1.47-1.34-2.36v-4.1c0-.41.34-.75.75-.75s.75.34.75.75v4.1c0 .36.3.89.61 1.07l3.1 1.85c.36.21.48.67.26 1.03z"></path>
                </svg>
                <PersianDate :date="{{$vueModel()}}" dir="rtl"
                             class="text-xs font-medium text-primary-500"/>
            </div>
        @endif

    </label>

    @include('splade::form.help', ['help' => $help])
    @includeWhen($showErrors, 'splade::form.error', ['name' => $validationKey()])
</SpladeInput>
