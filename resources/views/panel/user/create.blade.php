<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :action="route('panel.user.store')">
            <x-layout.panel.form.card title="New User" desc="لطفا اطلاعات مرتبط با حساب کاربری را وارد کنید.">

                <x-layout.panel.form.alerts/>

                <x-layout.panel.form.division :col="2">
                    <x-splade-input required name="first_name" label="Name"/>
                    <x-splade-input required name="last_name" label="Last Name"/>
                    <x-splade-select required name="gender" label="Gender">
                        <option value="" disabled>{{__('Select an item')}}</option>
                        @if($genderTypes)
                            @foreach($genderTypes as $gender)
                                <option value="{{ $gender['id'] }}">{{ $gender['label'] }}</option>
                            @endforeach
                        @endif
                    </x-splade-select>
                    <x-splade-input name="birthdate" label="Birthdate" date/>
                    <x-splade-input name="email" label="Email"/>
                    <x-splade-input required help="شماره موبایل بدون 0 وارد شود. مثال: 912xxxxxxx" name="mobile"
                                    label="Mobile"/>
                    <x-splade-input name="ssn" label="SSN"/>
                </x-layout.panel.form.division>

                <x-layout.panel.form.divider text="User type information"/>
                <x-layout.panel.form.division :col="1">
                    <x-splade-select required label="Roles" name="roles[]" option-value="id" :options="$roles"
                                     choices multiple/>
                </x-layout.panel.form.division>

                <x-splade-submit label="Create" class="mb-52"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
