<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :default="$user" method="put" :action="route('panel.user.update', $user)">
            <x-layout.panel.form.card title="Edit User" desc="لطفا اطلاعات مرتبط با حساب کاربری را وارد کنید.">

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
                    <x-splade-input name="phone" label="Mobile" ltr :readonly="$user->phone_verified_at"/>
                    <x-splade-input name="username" label="Username" ltr/>
                    <x-splade-input name="email" label="Email" placeholder="user@example.com" ltr :readonly="$user->email_verified_at"/>
                </x-layout.panel.form.division>

                <x-layout.panel.form.divider text="Change account password"/>
                <x-layout.panel.form.division :col="2">
                    <x-splade-input name="password" label="Password" type="password" ltr/>
                    <x-splade-input name="password_confirmation" label="Repeat password" type="password" ltr/>

                </x-layout.panel.form.division>
                {{--                <x-layout.panel.form.divider text="Location information"/>--}}
                {{--                <x-layout.panel.form.division :col="2">--}}

                {{--                    <x-splade-select name="province" label="Province" choices remote-url="/api/provinces" option-label="name" option-value="id"/>--}}
                {{--                    <x-splade-select name="city" label="City" choices remote-url="`/api/provinces/${form.province}/cities`" option-label="name" option-value="id"/>--}}
                {{--                    --}}
                {{--                    <x-splade-input name="address" label="Address" class="col-span-full"/>--}}
                {{--                    <x-splade-input name="number" label="Number"/>--}}
                {{--                    <x-splade-input name="postal_code" label="Postal Code"/>--}}
                {{--                </x-layout.panel.form.division>--}}

{{--                @if(auth()->check() && auth()->user()->hasRole('admin'))--}}
{{--                    <x-splade-checkbox name="level" label="Administrator access" class="col-span-full"/>--}}
{{--                @endif--}}

                <x-splade-submit label="Update"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
