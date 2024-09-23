<SpladeConfirm
    default-title="{{ __('Are you sure you want to continue?') }}"
    default-text=""
    default-password-text="{{ __('Please confirm your password before continuing') }}"
    default-confirm-button="{{ __('Confirm') }}"
    default-cancel-button="{{ __('Cancel') }}"
    confirm-password-route="{{ $confirmPasswordRoute ?? "" }}"
    confirmed-password-status-route="{{ $confirmedPasswordStatusRoute ?? "" }}"
>
    <template #default="confirm">
        <x-splade-component is="transition" show="confirm.isOpen">
            <x-splade-component is="dialog" class="relative z-50" close="confirm.setIsOpen(false)">
                <x-splade-component
                    is="transition"
                    child
                    animation="opacity"
                    class="fixed z-30 inset-0 bg-black/75"
                />

                <div class="fixed z-40 inset-0 overflow-y-auto font-inter rtl:font-iran">
                    <div class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0">
                        <x-splade-component is="transition" child animation="fade" after-leave="confirm.emitClose">
                            <x-splade-component is="dialog" panel class="relative bg-white dark:bg-gray-800 rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full sm:p-6">
                                <div class="sm:flex sm:items-start group">
                                    <div class="text-center sm:mt-0 sm:text-left rtl:sm:text-right">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white" v-text="confirm.title" />
                                        <div class="mt-2" v-if="confirm.text">
                                            <p class="text-sm text-gray-500 dark:text-gray-400" v-text="confirm.text" />
                                        </div>

                                        <div class="overflow-hidden mt-2 flex rounded-lg border border-gray-300 dark:border-gray-600 group-focus-within:ring-1 group-focus-within:ring-primary-500 group-focus-within:border-primary-500 transition duration-200 shadow-sm" v-if="confirm.confirmPassword">
                                            <input
                                                type="password"
                                                name="password"
                                                placeholder="Password"
                                                v-on:change="confirm.setPassword($event.target.value)"
                                                class="min-h-[2.5rem] px-3 block text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-700 w-full border-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:placeholder-gray-400 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed"
                                                @keyup.enter="confirm.confirm"
                                                :disabled="confirm.submitting"
                                            />
                                        </div>

                                        <p v-if="confirm.passwordError" v-text="confirm.passwordError" class="text-red-600 text-sm mt-2" />
                                    </div>
                                </div>

                                <div class="mt-5 sm:mt-4 sm:flex sm:space-x-2 rtl:sm:space-x-reverse">
                                    <button
                                        dusk="splade-confirm-confirm"
                                        type="button"
                                        class="inline-flex justify-center w-full rounded-lg border border-transparent shadow-sm px-4 py-2 text-base font-medium text-white focus:outline-none focus:ring-4 sm:w-auto sm:text-sm transition duration-200"
{{--                                        class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"--}}
                                        :class="{
                                            'text-white bg-primary-700 hover:bg-primary-800 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800': !confirm.confirmDanger,
                                            'text-white bg-red-700 hover:bg-red-800 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800': confirm.confirmDanger
                                        }"
                                        @click.prevent="confirm.confirm"
                                        :disabled="confirm.submitting"
                                        v-text="confirm.confirmButton"
                                    />
                                    <button
                                        dusk="splade-confirm-cancel"
                                        type="button"
                                        class="mt-3 w-full inline-flex justify-center rounded-lg px-4 py-2 text-base font-medium shadow-sm focus:outline-none focus:ring-4 sm:mt-0 sm:w-auto sm:text-sm text-gray-900 dark:text-gray-400 hover:text-primary-700 dark:hover:text-white bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 border border-gray-200 dark:border-gray-600 focus:ring-gray-200 dark:focus:ring-gray-700 transition duration-200"
                                        @click.prevent="confirm.cancel"
                                        :disabled="confirm.submitting"
                                        v-text="confirm.cancelButton"
                                    />
                                </div>
                            </x-splade-component>
                        </x-splade-component>
                    </div>
                </div>
            </x-splade-component>
        </x-splade-component>
    </template>
</SpladeConfirm>
