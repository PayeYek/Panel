<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :action="route('panel.user.store')">
            <x-layout.panel.form.card title="New User" desc="لطفا اطلاعات مرتبط با حساب کاربری را وارد کنید.">

                <x-layout.panel.form.alerts/>

                <x-layout.panel.form.division :col="2">
                    <x-splade-input name="first_name" label="Name"/>
                    <x-splade-input name="last_name" label="Last Name"/>
                    <x-splade-select name="gender" label="Gender" choices="{ searchEnabled: false }">
                        <option value="" disabled>{{__('Select an item')}}</option>
                        <option value="0">{{__('Female')}}</option>
                        <option value="1">{{__('Male')}}</option>
                    </x-splade-select>
                    <x-splade-input name="birthdate" label="Birthdate" date/>
                </x-layout.panel.form.division>

                <x-layout.panel.form.divider text="User login information"/>

                <x-splade-input name="username" label="Username" ltr/>


                <x-splade-submit label="Update"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
