<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :default="$data" method="put"
                       :action="route('panel.landing.product.product.attribute.update', $product)">
            <x-layout.panel.form.card title="Edit Attribute">

                <x-layout.panel.form.alerts/>

                <x-layout.panel.form.division>
                    @foreach ($data['list'] as $parentKey => $parent)
                        <div>{{ $parent['title']}}</div>
                        @foreach ($parent['items'] as $key => $attr)
                            <x-splade-textarea
                                name="list[{{$parentKey}}][items][{{$key}}][value]"
                                :label="$attr['name']"/>
                        @endforeach
                    @endforeach
                </x-layout.panel.form.division>

                <x-splade-submit label="Update"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
