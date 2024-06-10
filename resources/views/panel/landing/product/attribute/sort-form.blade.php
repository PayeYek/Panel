<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :action="route('panel.landing.product.attribute.sort')">
            <x-layout.panel.form.card title="Sort attributes">

                <x-layout.panel.form.alerts/>

                <x-layout.panel.form.divider/>
                <x-layout.panel.form.division :col="1">
{{--                    @foreach($attributes as $attribute)--}}
{{--                        <x-splade-input--}}
{{--                            name="priority[{{$attribute['id']}}]"--}}
{{--                            label="{{ $attribute['name'] }}"--}}
{{--                            type="number"--}}
{{--                            :v-model="$attribute['priority']"--}}
{{--                            min="0"/>--}}
{{--                    @endforeach--}}

                </x-layout.panel.form.division>

                <x-splade-submit label="Create"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
