<Link href="{{route('panel.dashboard')}}" class="flex items-center justify-between ltr:mr-4 rtl:ml-4">
    @if(App::getLocale() != 'en')
        <img height="32"
            src="{{ asset('assets/images/logo/fa-logo-text-dark.svg') }}"
            class="ltr:mr-3 rtl:ml-3 h-8 hidden dark:flex"
            alt="Logo"
        />
        <img height="32"
            src="{{ asset('assets/images/logo/fa-logo-text-light.svg') }}"
            class="ltr:mr-3 rtl:ml-3 h-8 dark:hidden"
            alt="Logo"
        />
    @else
        <img height="32"
            src="{{ asset('assets/images/logo/en-logo-text-dark.svg') }}"
            class="ltr:mr-3 rtl:ml-3 h-8 hidden dark:flex"
            alt="Logo"
        />
        <img height="32"
            src="{{ asset('assets/images/logo/en-logo-text-light.svg') }}"
            class="ltr:mr-3 rtl:ml-3 h-8 dark:hidden"
            alt="Logo"
        />
    @endif
</Link>
