<x-layout.base>
    <x-splade-data store="navigation" default="{ opened: false }"/>
    <nav
        class="sticky top-0 start-0 end-0 bg-white border-b border-gray-200 px-4 py-2.5 dark:bg-gray-800 dark:border-gray-700">
        <div class="max-w-screen-xl mx-auto flex flex-wrap justify-between items-center">
            <div class="flex justify-start items-center">
                <button @click.prevent="navigation.opened = !navigation.opened"
                        class="p-2 ltr:mr-2 rtl:ml-2 rtl:rotate-180 text-gray-600 rounded-lg cursor-pointer md:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <svg
                        aria-hidden="true"
                        :class="{'hidden': navigation.opened}"
                        class="w-6 h-6"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"
                        ></path>
                    </svg>
                    <svg
                        aria-hidden="true"
                        :class="{'hidden': !navigation.opened}"
                        class="w-6 h-6"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                        ></path>
                    </svg>
                    <span class="sr-only">Toggle sidebar</span>
                </button>

                <x-layout.panel.logo-text/>

            </div>
            <div class="flex items-center lg:order-2 gap-1">
                <x-switch-language/>
                <SwitchStyle/>
                <Breakpoint/>

                <button type="button" class="hidden sm:flex py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">قیمت روز خودرو</button>
{{--                <button type="button" class="py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">نمایه کاربر</button>--}}
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-all duration-200">{{__('Register ad')}}</button>
            </div>
        </div>
    </nav>

    <section class="bg-gray-50 dark:bg-gray-900 h-[calc(100%_-_65px)] overflow-auto scrollbar-thin scrollbar-thumb-gray-200 scrollbar-track-white dark:scrollbar-thumb-gray-800 dark:scrollbar-track-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-2 xl:px-0">

            <div class="grid gap-4 lg:grid-cols-2">

                @for($i=0;$i<5;$i++)
                    {{-- V1--}}
                    {{--<article
                        class="overflow-auto flex flex-col md:flex-row bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <img class="object-cover w-full h-96 md:h-auto md:w-48"
                             src="https://postimage01.divarcdn.com/static/photo/afra/post/wcWx_0oMaFMOP2STyQby9A/7ac49812-a444-416b-947e-877d5690320d.jpg"
                             alt="">
                        <div class="w-full p-6 cursor-default flex flex-col justify-around space-y-5">
                            <div class="flex justify-between items-center text-gray-500 gap-1">
                                <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                <span
                                    class="text-nowrap bg-primary-100 text-primary-800 text-[0.7rem] font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200/75 dark:text-primary-800">اسلام شهر</span>
                                </div>

                                <span class="text-[0.7rem] line-clamp-1">۳ ساعت پیش</span>
                            </div>
                            <div class="flex-1">
                                <h2 class="mb-2 line-clamp-2 text-base font-bold font-iran tracking-tight text-gray-900 dark:text-white">
                                    تنبک قدیمی دنبک خوش دست ضرب خوش صدا دمبک</h2>
                                <p class="mb-5 line-clamp-3 text-sm font-light text-gray-500 dark:text-gray-400">تنبک
                                    قدیمی
                                    دنبک خوش دست ضرب خوش صدا دمبک
                                    25 سانت پهنه
                                    سالم

                                    قدمت دار خیلی قدیمی

                                    متعلق به استاد بنایی

                                    توجه:
                                    قیمت کالا مقطوع است و تخفیف ندارد.</p>
                                <div
                                    class="line-clamp-2 items-center *:ms-1 first:*:ms-0 text-sm font-light text-gray-500 dark:text-gray-400">
                                    <span class="bg-red-100 text-red-800 text-[0.7rem] font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-red-200/75 dark:text-red-800">نردبان</span>
                                    <span class="bg-red-100 text-red-800 text-[0.7rem] font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-red-200/75 dark:text-red-800">فوری</span>
                                    <span>۳۴۰,۰۰۰ کیلومتر</span>
                                    <span>۳۴۰,۰۰۰ کیلومتر</span>
                                    <span>۳۴۰,۰۰۰ کیلومتر</span>
                                    <span>۳۴۰,۰۰۰ کیلومتر</span>
                                    <span>۳۴۰,۰۰۰ کیلومتر</span>
                                    <span>۳۴۰,۰۰۰ کیلومتر</span>
                                    <span>۳۴۰,۰۰۰ کیلومتر</span>
                                    <span>۳۴۰,۰۰۰ کیلومتر</span>
                                    <span>۳۴۰,۰۰۰ کیلومتر</span>
                                    <span>۳۴۰,۰۰۰ کیلومتر</span>
                                    <span>۳۴۰,۰۰۰ کیلومتر</span>
                                    <span>۳۴۰,۰۰۰ کیلومتر</span>
                                    <span>۳۴۰,۰۰۰ کیلومتر</span>
                                    <span>۳۴۰,۰۰۰ کیلومتر</span>
                                    <span>۳۴۰,۰۰۰ کیلومتر</span>
                                    <span>۳۴۰,۰۰۰ کیلومتر</span>
                                    <span>۳۴۰,۰۰۰ کیلومتر</span>
                                </div>
                            </div>
                            <div class="flex flex-row-reverse justify-between items-center ">

                            <span
                                class="text-sm inline-flex items-center font-medium text-primary-600 dark:text-primary-500">۴,۸۰۰,۰۰۰ تومان</span>
                            </div>
                        </div>
                    </article>--}}

                    {{--V2--}}
                    {{--<article
                        class="overflow-auto flex flex-col md:flex-row bg-white rounded-lg border border-gray-200 hover:shadow-md dark:bg-gray-800 dark:border-gray-700 transition-all duration-500">
                        <img class="shrink-0 object-cover w-full h-96 md:size-56 lg:size-60"
                             src="https://postimage01.divarcdn.com/static/photo/afra/post/wcWx_0oMaFMOP2STyQby9A/7ac49812-a444-416b-947e-877d5690320d.jpg"
                             alt="">
                        <div class="w-full p-6 cursor-default flex flex-col justify-around space-y-5">
                            <div class="flex justify-between items-center text-gray-500 gap-1">
                                <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                <span
                                    class="text-nowrap bg-primary-100 text-primary-800 text-[0.7rem] font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200/75 dark:text-primary-800">اسلام شهر</span>
                                </div>

                                <span class="text-[0.7rem] line-clamp-1">۳ ساعت پیش</span>
                            </div>
                            <div class="flex-1">
                                <h2 class="mb-2 line-clamp-2 text-base font-bold font-iran tracking-tight text-gray-900 dark:text-white">
                                    تنبک قدیمی دنبک خوش دست ضرب خوش صدا دمبک
                                </h2>
--}}{{--                                <p class="mb-5 line-clamp-3 text-sm font-light text-gray-500 dark:text-gray-400">تنبک
                                    قدیمی
                                    دنبک خوش دست ضرب خوش صدا دمبک
                                    25 سانت پهنه
                                    سالم

                                    قدمت دار خیلی قدیمی

                                    متعلق به استاد بنایی

                                    توجه:
                                    قیمت کالا مقطوع است و تخفیف ندارد.</p>--}}{{--
                                <div
                                    class="line-clamp-2 items-center *:ms-1 first:*:ms-0 text-sm font-light text-gray-500 dark:text-gray-400">
                                    <span class="bg-red-100 text-red-800 text-[0.7rem] font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-red-200/75 dark:text-red-800">نردبان</span>
                                    <span class="bg-red-100 text-red-800 text-[0.7rem] font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-red-200/75 dark:text-red-800">فوری</span>
                                    <span>۳۴۰,۰۰۰ کیلومتر</span>
                                </div>
                            </div>
                            <div class="flex flex-row-reverse justify-between items-center ">

                            <span
                                class="text-sm inline-flex items-center font-medium text-primary-600 dark:text-primary-500">۴,۸۰۰,۰۰۰ تومان</span>
                            </div>
                        </div>
                    </article>--}}

                    {{--V3--}}
                    {{--<article
                        class="overflow-auto flex md:flex-row bg-white rounded-lg border border-gray-200 hover:shadow-md dark:bg-gray-800 dark:border-gray-700 transition-all duration-500">
                        <img class="shrink-0 object-cover size-56 md:size-56 lg:size-60"
                             src="https://postimage01.divarcdn.com/static/photo/afra/post/wcWx_0oMaFMOP2STyQby9A/7ac49812-a444-416b-947e-877d5690320d.jpg"
                             alt="">
                        <div class="w-full p-6 cursor-default flex flex-col justify-around space-y-5">
                            <div class="flex justify-between items-center text-gray-500 gap-1">
                                <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                <span
                                    class="text-nowrap bg-primary-100 text-primary-800 text-[0.7rem] font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200/75 dark:text-primary-800">اسلام شهر</span>
                                </div>

                                <span class="text-[0.7rem] line-clamp-1">۳ ساعت پیش</span>
                            </div>
                            <div class="flex-1">
                                <h2 class="mb-2 line-clamp-2 text-sm md:text-base font-bold font-iran tracking-tight text-gray-900 dark:text-white">
                                    تنبک قدیمی دنبک خوش دست ضرب خوش صدا دمبک
                                    {{ rand(0, 1) ? 'تنبک قدیمی دنبک خوش دست ضرب خوش صدا دمبک' : '' }}
                                </h2>
                                <div
                                    class="line-clamp-2 items-center text-xs md:text-sm font-light text-gray-500 dark:text-gray-400">
                                    <span
                                        class="empty:after:!mx-0 *:me-2">
                                        @if(rand(0,1))
                                            <span
                                                class="bg-red-100 text-red-800 text-[0.7rem] font-medium inline-flex items-center px-2.5 rounded dark:bg-red-200/75 dark:text-red-800">نردبان</span>
                                        @endif

                                        @if(rand(0,1))
                                            <span
                                                class="bg-red-100 text-red-800 text-[0.7rem] font-medium inline-flex items-center px-2.5 rounded dark:bg-red-200/75 dark:text-red-800">فوری</span>
                                        @endif
                                    </span>

                                    <span
                                        class="last:*:after:hidden *:after:bg-gray-600 *:after:dark:bg-gray-600 *:after:size-1 *:after:rounded-full *:after:mt-2 *:after:mx-1.5 *:after:flex *:after:items-center *:inline-flex *:ms-1 first:*:ms-0 ">
                                        @if(rand(0,1))
                                            <span>0 کیلومتر</span>
                                        @else
                                            <span>{{ App\Support\Help::price(rand(1000, 10000)) }} کیلومتر</span>
                                        @endif
                                        @if(rand(0,1))
                                            <span>در حد نو</span>
                                        @else
                                            <span>نو</span>
                                        @endif
                                        @if(rand(0,1))
                                            <span>قیمت مقطوع</span>
                                        @endif
                                        @if(rand(0,1))
                                            <span>اقساطی</span>
                                        @endif
                                        @if(rand(0,1))
                                                <span>{{ App\Support\Help::price(rand(1000, 10000)) }} تومان ودیعه</span>
                                        @endif
                                    </span>

                                </div>
                            </div>
                            <div class="flex flex-row-reverse justify-between items-center ">
                                <span
                                    class="text-xs md:text-sm inline-flex items-center font-medium text-primary-600 dark:text-primary-500">۴,۸۰۰,۰۰۰ تومان</span>
                            </div>
                        </div>
                    </article>--}}

                    {{--V4--}}
                    <Link href="{{ route('home.ad') }}"
                        class="overflow-auto flex md:flex-row bg-white rounded-lg border border-gray-200 hover:shadow-md dark:bg-gray-800 dark:border-gray-700 transition-all duration-500">
                        <img class="shrink-0 object-cover size-56 md:size-56 lg:size-60"
                             src="https://postimage01.divarcdn.com/static/photo/afra/post/v9ef_bRHlO1kD-WC08FS3Q/f5a96689-1d90-4668-8f61-f9ce389a2f89.jpg"
                             alt="">
                        <div class="w-full p-6 flex flex-col justify-around space-y-5">
                            <div class="flex justify-between items-center text-gray-500 gap-1">
                                <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                <span
                                    class="text-nowrap bg-primary-100 text-primary-800 text-[0.7rem] font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200/75 dark:text-primary-800">اسلام شهر</span>
                                </div>

                                <span class="text-[0.7rem] line-clamp-1">۳ ساعت پیش</span>
                            </div>
                            <div class="flex-1">
                                <h2 class="mb-2 line-clamp-2 text-sm md:text-base font-bold font-iran tracking-tight text-gray-900 dark:text-white">
                                    بنز، S500 <span class="text-gray-300 dark:text-gray-700 px-1">|</span> تمیز و کم کار
                                </h2>
                                <div
                                    class="line-clamp-2 items-center text-xs md:text-sm font-light text-gray-500 dark:text-gray-400">
                                    <span
                                        class="empty:after:!mx-0 *:me-2">
                                        @if(rand(0,1))
                                            <span
                                                class="bg-red-100 text-red-800 text-[0.7rem] font-medium inline-flex items-center px-2.5 rounded dark:bg-red-200/75 dark:text-red-800">نردبان</span>
                                        @endif

                                        @if(rand(0,1))
                                            <span
                                                class="bg-red-100 text-red-800 text-[0.7rem] font-medium inline-flex items-center px-2.5 rounded dark:bg-red-200/75 dark:text-red-800">فوری</span>
                                        @endif
                                    </span>

                                    <span
                                        class="last:*:after:hidden *:after:bg-gray-600 *:after:dark:bg-gray-600 *:after:size-1 *:after:rounded-full *:after:mt-2 *:after:mx-1.5 *:after:flex *:after:items-center *:inline-flex *:ms-1 first:*:ms-0 ">
                                        @if(rand(0,1))
                                            <span>0 کیلومتر</span>
                                        @else
                                            <span>{{ App\Support\Help::price(rand(1000, 10000)) }} کیلومتر</span>
                                        @endif
                                        @if(rand(0,1))
                                            <span>در حد نو</span>
                                        @else
                                            <span>نو</span>
                                        @endif
                                        @if(rand(0,1))
                                            <span>قیمت مقطوع</span>
                                        @endif
                                        @if(rand(0,1))
                                            <span>اقساطی</span>
                                        @endif
                                        @if(rand(0,1))
                                                <span>{{ App\Support\Help::price(rand(1000, 10000)) }} تومان ودیعه</span>
                                        @endif
                                    </span>

                                </div>
                            </div>
                            <div class="flex flex-row-reverse justify-between items-center ">
                                <span
                                    class="text-xs md:text-sm inline-flex items-center font-medium text-primary-600 dark:text-primary-500">۴,۸۰۰,۰۰۰ تومان</span>
                            </div>
                        </div>
                    </Link>

                @endfor
            </div>
        </div>
    </section>

</x-layout.base>
