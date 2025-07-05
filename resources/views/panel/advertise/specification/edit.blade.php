<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :default="$specification"
                       method="put"
                       :action="route('panel.ad.specification.update', $specification)">
            <x-layout.panel.form.card title="Edit Specification">

                <x-layout.panel.form.alerts/>
                <x-layout.panel.form.division>
                    <x-splade-input name="title" label="Title"/>

                    <x-splade-select name="type" label="Type">
                        <option value="" disabled>{{__('Select an item')}}</option>
                        @foreach($types as $key => $type)
                            <option value="{{ $type }}">{{ $key }}</option>
                        @endforeach
                    </x-splade-select>

                    <x-splade-checkbox name="required" class="text-sm" label="{{ __('Is input required?') }}"/>

                </x-layout.panel.form.division>

                <x-splade-submit label="Update"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
