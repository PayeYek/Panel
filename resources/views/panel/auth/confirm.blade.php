<x-layout.base>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <x-layout.panel.logo class="mb-10"/>
            <x-splade-modal>
                <div
                    class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                    <x-splade-form :action="route('auth.recovery')" :default="['remember' => false]">

                        <x-layout.panel.form.card title="Authentication" class="mt-5">

                            <div class="absolute top-3 end-3 flex items-center">
                                <SwitchStyle/>
                                <x-switch-language/>
                            </div>

                            <x-layout.panel.form.division>

                                <x-splade-input name="code" label="Received Code" type="password" placeholder="x x x x x"
                                                required ltr/>

                                <div class="flex items-center gap-2">
                                    <x-splade-link :href="route('auth.forget')"
                                        class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500 underline-offset-8 decoration-2">{{ __('Edit mobile number') }}</x-splade-link>
                                </div>

                                <x-splade-submit label="Confirm" class="w-full"/>

                                <span class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ __('Did you not receive an SMS?') }}
                                    <x-splade-link
                                        class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500 underline-offset-8 decoration-2">{{ __('Resend') }}</x-splade-link>
                                </span>
                            </x-layout.panel.form.division>
                        </x-layout.panel.form.card>
                    </x-splade-form>
                </div>
            </x-splade-modal>

        </div>
    </section>

</x-layout.base>
