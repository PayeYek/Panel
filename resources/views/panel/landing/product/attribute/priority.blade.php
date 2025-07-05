<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :default="$priorities" method="put"
                       :action="route('panel.landing.product.attribute.priority.update', $priorities)">
            <x-layout.panel.form.card title="Edit Priority">

                <x-layout.panel.form.alerts/>

                <x-layout.panel.form.division>

                <Priority/>

                </x-layout.panel.form.division>

                <x-layout.panel.form.division>

                    @foreach($priorities['attributes'] as $key => $val)
                        <x-splade-input name="attributes[{{$key}}][priority]" label="{{$val['name']}}"/>
                    @endforeach

                </x-layout.panel.form.division>

                <x-splade-submit label="Update"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
