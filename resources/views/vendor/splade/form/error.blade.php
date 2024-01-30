@if($name)
    <p class="text-red-600 dark:text-red-500 text-sm mt-0.5 flex items-center" v-if="form.hasError(@js($name))">
        <x-iconsax-bul-danger class="w-4 h-4 me-1"/>
        <span v-bind="form.$errorAttributes(@js($name))"></span>
    </p>
@endif
