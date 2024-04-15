<x-layout.base>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <x-layout.panel.logo class="mb-10"/>
            <x-splade-modal>
                <div
                    class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                    <x-splade-form :action="route('auth.code')">

                        <x-layout.panel.form.card title="Change account password" class="mt-5"
                                                  desc="To change the password, enter your mobile number and click the Confirm button. We will send you a text message containing your authentication code.">

                            <div class="absolute top-3 end-3 flex items-center">
                                <SwitchStyle/>
                                <x-switch-language/>
                            </div>

                            <x-layout.panel.form.division>

                                <x-splade-input name="phone" label="Mobile" required ltr
                                                placeholder="09xx xxx xxxx"/>

                                <x-splade-submit label="Confirm" class="w-full "/>

                                <span class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ __("if you don't need to change the password;") }}
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
