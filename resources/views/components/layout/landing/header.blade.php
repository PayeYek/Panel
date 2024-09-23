@props(['land' => null])

<x-splade-data store="navigation" default="{ opened: false }" />
    @if ($land)
        <header class="sticky top-0 z-[4] drop-shadow-[0_4px_4px_rgba(0,0,0,0.15)] bg-white">
            <section class="flex items-center justify-between gap-5 default_container h-16 sm:h-20">
                <div class="flex items-center gap-2">
                    {{-- hamburger menu --}}
                    <button @click.prevent="navigation.opened = !navigation.opened"
                        class="p-1 text-gray-600 rounded-lg cursor-pointer lg:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100 dark:text-gray-400">
                        <svg class="size-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_903_3398)">
                            <path d="M20 17.5C20.3852 17.5002 20.7556 17.6486 21.0344 17.9144C21.3132 18.1802 21.479 18.5431 21.4975 18.9279C21.516 19.3127 21.3858 19.6898 21.1338 19.9812C20.8818 20.2726 20.5274 20.4558 20.144 20.493L20 20.5H4C3.61478 20.4998 3.24441 20.3514 2.96561 20.0856C2.68682 19.8198 2.52099 19.4569 2.50248 19.0721C2.48396 18.6873 2.61419 18.3102 2.86618 18.0188C3.11816 17.7274 3.47258 17.5442 3.856 17.507L4 17.5H20ZM20 10.5C20.3978 10.5 20.7794 10.658 21.0607 10.9393C21.342 11.2206 21.5 11.6022 21.5 12C21.5 12.3978 21.342 12.7794 21.0607 13.0607C20.7794 13.342 20.3978 13.5 20 13.5H4C3.60218 13.5 3.22064 13.342 2.93934 13.0607C2.65804 12.7794 2.5 12.3978 2.5 12C2.5 11.6022 2.65804 11.2206 2.93934 10.9393C3.22064 10.658 3.60218 10.5 4 10.5H20ZM20 3.5C20.3978 3.5 20.7794 3.65804 21.0607 3.93934C21.342 4.22064 21.5 4.60218 21.5 5C21.5 5.39782 21.342 5.77936 21.0607 6.06066C20.7794 6.34196 20.3978 6.5 20 6.5H4C3.60218 6.5 3.22064 6.34196 2.93934 6.06066C2.65804 5.77936 2.5 5.39782 2.5 5C2.5 4.60218 2.65804 4.22064 2.93934 3.93934C3.22064 3.65804 3.60218 3.5 4 3.5H20Z" fill="black"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_903_3398">
                            <rect width="24" height="24" fill="white"/>
                            </clipPath>
                            </defs>
                        </svg>
                        <span class="sr-only">Toggle sidebar</span>
                    </button>
                    <x-layout.landing.logo :land="$land" />
                </div>

                {{-- <SwitchStyle class="hidden sm:block" /> --}}
                {{-- <Breakpoint class="shrink-0 {{ app()->environment('production') ? 'hidden' : '' }}" /> --}}
                {{-- term of sale --}}
                <Link class="w-28 sm:w-32 h-10 px-0.5 text-sm sm:text-base font-normal text-white bg-normal hover:bg-focus focus:bg-focus focus:shadow-focus focus:shadow-shadowNormal rounded-custom flex_center"
                    href="{{ route('landing.article.list', ['page' => $land->slug]) }}"> {{ __('Terms of sale') }} </Link>
            </section>

            {{-- visible on desktop --}}
            <section class="hidden lg:block h-16 bg-[#f5f5f5]">
                <section class="flex_between default_container h-full">
                    <x-layout.landing.navbar :land="$land" class-names="flex" />
                    <x-layout.landing.social />
                </section>
            </section>
        </header>
    @endif
