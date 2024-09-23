<x-layout.base>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <x-splade-modal>
                <div
                    class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                    <x-splade-form :action="route('auth.enter')" :default="['remember' => false]">

                        <x-layout.panel.form.card title="Login" class="mt-5">

                            <div class="absolute top-3 end-3 flex items-center">
                                <SwitchStyle/>
                                <x-switch-language/>
                            </div>

                            <x-layout.panel.form.division>

                                <x-splade-input name="mobile" label="Mobile" required ltr prepend="+98"
                                                placeholder="9xxxxxxxxxx"/>

                                <x-splade-submit label="Enter" class="w-full"/>

                            </x-layout.panel.form.division>
                        </x-layout.panel.form.card>
                    </x-splade-form>
                </div>
            </x-splade-modal>

        </div>
    </section>
</x-layout.base>
