<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :action="route('panel.user.store')">
            <x-layout.panel.form.card title="New User" desc="لطفا اطلاعات مرتبط با حساب کاربری را وارد کنید.">

                <x-layout.panel.form.alerts/>

                <x-layout.panel.form.division :col="2">
                    <x-splade-input name="name" label="Name"/>
                    <x-splade-input name="family" label="Last Name"/>
                    <x-splade-select name="gender" label="Gender" choices="{ searchEnabled: false }">
                        <option value="" disabled>{{__('Select an item')}}</option>
                        <option value="0">{{__('Female')}}</option>
                        <option value="1">{{__('Male')}}</option>
                    </x-splade-select>
                    <x-splade-input name="birthdate" label="Birthdate" date/>
                </x-layout.panel.form.division>

                <x-layout.panel.form.divider text="User login information"/>

                <x-layout.panel.form.division :col="3">
                    <x-splade-input name="phone" label="Mobile" ltr/>
                    <x-splade-input name="username" label="Username" ltr/>
                    <x-splade-input name="email" label="Email" placeholder="user@example.com" ltr/>
                </x-layout.panel.form.division>

                <x-layout.panel.form.divider text="Change account password"/>
                <x-layout.panel.form.division :col="2">
                    <x-splade-input name="password" label="Password" type="password" ltr/>
                    <x-splade-input name="password_confirmation" label="Repeat password" type="password" ltr/>

                </x-layout.panel.form.division>

{{--                @if(auth()->check() && auth()->user()->hasRole('admin'))--}}
{{--                    <x-splade-checkbox name="level" label="Administrator access" class="col-span-full"/>--}}
{{--                @endif--}}

                <x-splade-submit label="Update"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
