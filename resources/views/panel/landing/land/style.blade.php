<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :default="$style" method="put"
                       :action="route('panel.landing.land.style.update', $land)">
            <x-layout.panel.form.card title="Edit Style">

                <x-layout.panel.form.alerts/>

                <x-layout.panel.form.division :col="2">


                    <x-splade-select name="radius" label="Radius">
                        <option value="0">None</option>
                        <option value="2">Small</option>
                        <option value="4">Normal</option>
                        <option value="6">Medium</option>
                        <option value="8">Large</option>
                        <option value="12">Extra large</option>
                    </x-splade-select>

                    <x-splade-select name="color" label="Color">
                        <option value="0">Red</option>
                        <option value="1">Blue</option>
                        <option value="2">Green</option>
                        <option value="3">Yellow</option>
                    </x-splade-select>

                    <x-splade-select name="product_type" label="Product type">
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

                    <x-splade-select name="product_view" label="Product Arrangement">
                        <option value="0">List</option>
                        <option value="1">Tile</option>
                    </x-splade-select>

                    <x-splade-select name="article_type" label="Article type">
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

                    <x-splade-select name="article_view" label="Article Arrangement">
                        <option value="0">List</option>
                        <option value="1">Tile</option>
                    </x-splade-select>

                    <x-splade-select name="video_type" label="Video type">
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

                    <x-splade-select name="video_view" label="Video Arrangement">
                        <option value="0">List</option>
                        <option value="1">Tile</option>
                    </x-splade-select>

                    <x-splade-select name="slide_type" label="Slide Type">
                        <option value="0">Type 0</option>
                        <option value="1">Type 1</option>
                        <option value="2">Type 2</option>
                        <option value="3">Type 3</option>
                        <option value="4">Type 4</option>
                        <option value="5">Type 5</option>
                        <option value="6">Type 6</option>
                        <option value="7">Type 7</option>
                        <option value="8">Type 8</option>
                    </x-splade-select>

                    <x-splade-select name="slide_anim" label="Slider Animate">
                        <option value="0">List</option>
                        <option value="1">Tile</option>
                    </x-splade-select>

                </x-layout.panel.form.division>

                <x-splade-submit label="Update"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
