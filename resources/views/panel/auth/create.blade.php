<x-layout.base>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <x-layout.panel.logo class="mb-10"/>
            <x-splade-modal>
                <div
                    class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                    <x-splade-form :action="route('auth.store')" :default="['accept'=>true]">

                        <x-layout.panel.form.card title="Create an account" class="mt-5">

                            <div class="absolute top-3 end-3 flex items-center">
                                <SwitchStyle/>
                                <x-switch-language/>
                            </div>

                            <x-layout.panel.form.division>

                                <x-layout.panel.form.division :col="2">
                                    <x-splade-input name="name" label="Name" required/>
                                    <x-splade-input name="family" label="Last Name" required/>
                                </x-layout.panel.form.division>

                                <x-splade-input name="phone" label="Mobile" required ltr
                                                placeholder="09xx xxx xxxx"/>

                                <x-splade-input name="password" label="Password"
                                                type="password" placeholder="x x x x x"
                                                required ltr/>

                                <div class="flex items-center">
                                    <x-splade-checkbox class="text-sm" name="accept" label="I accept the"/>
                                    <x-splade-link
                                        class="ms-1 text-sm font-medium text-primary-600 hover:underline dark:text-primary-500 underline-offset-8 decoration-2">{{ __('Terms and Conditions') }}</x-splade-link>
                                </div>

                                <x-splade-submit label="Sign Up" class="w-full"/>

                                <div class="inline-flex items-center justify-center w-full">
                                    <hr class="w-full h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
                                    <span class="text-sm absolute px-3 text-gray-900 -translate-x-1/2 left-1/2 dark:text-white bg-white dark:bg-gray-800">{{__('Via')}}</span>
                                </div>

                                <x-splade-link class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center justify-center dark:focus:ring-gray-600 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700">
                                    <svg class="w-5 h-5 me-2 -ms-1" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_13183_10121)"><path d="M20.3081 10.2303C20.3081 9.55056 20.253 8.86711 20.1354 8.19836H10.7031V12.0492H16.1046C15.8804 13.2911 15.1602 14.3898 14.1057 15.0879V17.5866H17.3282C19.2205 15.8449 20.3081 13.2728 20.3081 10.2303Z" fill="#3F83F8"></path><path d="M10.7019 20.0006C13.3989 20.0006 15.6734 19.1151 17.3306 17.5865L14.1081 15.0879C13.2115 15.6979 12.0541 16.0433 10.7056 16.0433C8.09669 16.0433 5.88468 14.2832 5.091 11.9169H1.76562V14.4927C3.46322 17.8695 6.92087 20.0006 10.7019 20.0006V20.0006Z" fill="#34A853"></path><path d="M5.08857 11.9169C4.66969 10.6749 4.66969 9.33008 5.08857 8.08811V5.51233H1.76688C0.348541 8.33798 0.348541 11.667 1.76688 14.4927L5.08857 11.9169V11.9169Z" fill="#FBBC04"></path><path d="M10.7019 3.95805C12.1276 3.936 13.5055 4.47247 14.538 5.45722L17.393 2.60218C15.5852 0.904587 13.1858 -0.0287217 10.7019 0.000673888C6.92087 0.000673888 3.46322 2.13185 1.76562 5.51234L5.08732 8.08813C5.87733 5.71811 8.09302 3.95805 10.7019 3.95805V3.95805Z" fill="#EA4335"></path></g><defs><clipPath id="clip0_13183_10121"><rect width="20" height="20" fill="white" transform="translate(0.5)"></rect></clipPath></defs>
                                    </svg>
                                    {{  __('Google account') }}
                                </x-splade-link>

                                <span class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ __('Do you have an account?') }}
                                    <x-splade-link
                                        :href="route('auth.login')"
                                        class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500 underline-offset-8 decoration-2">{{ __('Sign in here.') }}</x-splade-link>
                                </span>
                            </x-layout.panel.form.division>
                        </x-layout.panel.form.card>
                    </x-splade-form>
                </div>
            </x-splade-modal>

        </div>
    </section>

</x-layout.base>
