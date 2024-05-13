<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :default="$advertise"
                       method="put"
                       :action="route('panel.advertise.edit', $advertise)">
            <x-layout.panel.form.card title="Edit Advertise">
                <x-layout.panel.form.alerts/>

                <x-layout.panel.form.division>

                    <x-splade-input name="title" label="Title"/>
                    <x-splade-input name="description" label="Description"/>
                    <x-splade-input name="primary_image" label="Primary image"/>
                    <x-splade-input name="slider_image" label="Slider image"/>
                    <x-splade-input name="price" label="Price"/>
                    <x-splade-input name="state" label="Price"/>
                    <x-splade-input name="category_id" label="Category"/>
                    <x-splade-input name="city_id" label="City"/>

                </x-layout.panel.form.division>

                <x-layout.panel.form.division :col="3">

                    {{--                    <x-splade-select name="state" label="State">--}}
                    {{--                        <option value="" disabled>{{__('Select an item')}}</option>--}}
                    {{--                        @foreach($states as $state)--}}
                    {{--                            <option value="{{ $state }}">{{ __($state->value) }}</option>--}}
                    {{--                        @endforeach--}}
                    {{--                    </x-splade-select>--}}
                    {{--                    <x-splade-select name="land" label="Land" disabled>--}}
                    {{--                        <option value="" disabled>{{ $landTitle }}</option>--}}
                    {{--                    </x-splade-select>--}}
                    {{--                    <x-splade-select name="category" label="Request" disabled>--}}
                    {{--                        <option value="" disabled>{{ $categoryTitle }}</option>--}}
                    {{--                    </x-splade-select>--}}
                    {{--                    <x-splade-input name="full_name" label="Full name" disabled/>--}}
                    {{--                    <x-splade-input name="phone" label="Phone" disabled/>--}}
                    {{--                    <x-splade-input name="amount" label="Amount" disabled/>--}}

                </x-layout.panel.form.division>

                <x-splade-submit label="Update"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
