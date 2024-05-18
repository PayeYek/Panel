<Link href="{{route('panel.dashboard')}}" class="flex items-center justify-between ltr:mr-4 rtl:ml-4">
    @if(App::getLocale() != 'en')
        <img
            src="{{ asset('assets/images/logo-text/fa-logo-text-dark.svg') }}"
            class="ltr:mr-3 rtl:ml-3 h-7 hidden dark:flex"
            alt="Logo"
        />
        <img
            src="{{ asset('assets/images/logo-text/fa-logo-text-light.svg') }}"
            class="ltr:mr-3 rtl:ml-3 h-7 dark:hidden"
            alt="Logo"
        />
    @else
        <img
            src="{{ asset('assets/images/logo-text/en-logo-text-dark.svg') }}"
            class="ltr:mr-3 rtl:ml-3 h-7 hidden dark:flex"
            alt="Logo"
        />
        <img
            src="{{ asset('assets/images/logo-text/en-logo-text-light.svg') }}"
            class="ltr:mr-3 rtl:ml-3 h-7 dark:hidden"
            alt="Logo"
        />
    @endif
</Link>
