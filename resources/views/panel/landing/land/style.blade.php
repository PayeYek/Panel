<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :default="$land" method="put"
                       :action="route('panel.landing.land.style.update', $land)">
            <x-layout.panel.form.card title="Edit Style">

                <x-layout.panel.form.alerts/>

                <x-layout.panel.form.division>


                    <x-splade-select name="radius" label="Radius">
                        <option value="0">0</option>
                        <option value="2">2</option>
                        <option value="4">4</option>
                        <option value="12">12</option>
                    </x-splade-select>

                    <x-splade-select name="color" label="Color">
                        <option value="0">Red</option>
                        <option value="1">Blue</option>
                        <option value="2">Green</option>
                        <option value="3">Yellow</option>
                    </x-splade-select>

                    <x-splade-select name="product_card" label="Product Card">
                        <option value="0">Card Type 0</option>
                        <option value="1">Card Type 1</option>
                        <option value="2">Card Type 2</option>
                        <option value="3">Card Type 3</option>
                        <option value="4">Card Type 4</option>
                        <option value="5">Card Type 5</option>
                        <option value="6">Card Type 6</option>
                        <option value="7">Card Type 7</option>
                        <option value="8">Card Type 8</option>
                    </x-splade-select>

                    <x-splade-select name="product_arrangement" label="Product Arrangement">
                        <option value="0">List</option>
                        <option value="1">Tile</option>
                    </x-splade-select>


                    {{--                    @foreach ($data['list'] as $parentKey => $parent)--}}
                    {{--                        <div>{{ $parent['title']}}</div>--}}
                    {{--                        @foreach ($parent['items'] as $key => $attr)--}}
                    {{--                            <x-splade-textarea--}}
                    {{--                                name="list[{{$parentKey}}][items][{{$key}}][value]"--}}
                    {{--                                :label="$attr['name']"/>--}}
                    {{--                        @endforeach--}}
                    {{--                    @endforeach--}}
                </x-layout.panel.form.division>

                <x-splade-submit label="Update"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
