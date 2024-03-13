<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :default="$style" method="put"
                       :action="route('panel.landing.land.style.update', $land)">
            <x-layout.panel.form.card title="Edit Style">

                <x-layout.panel.form.alerts/>

                <x-layout.panel.form.division :col="2">

                    <x-splade-select name="radius" label="Radius">
                        <option value="0">0 PX</option>
                        <option value="2">2 PX</option>
                        <option value="4">4 PX</option>
                        <option value="6">6 PX</option>
                        <option value="8">8 PX</option>
                        <option value="12">12 PX</option>
                    </x-splade-select>

                    <x-splade-select name="color" label="Color">
                        <option value="1">Red</option>
                        <option value="2">Blue</option>
                        <option value="3">Green</option>
                        <option value="4">Yellow</option>
                    </x-splade-select>

                    <x-splade-select name="product_type" label="Product card type">
                        <option value="1">{{ __('View type') }} 1</option>
                        <option value="2">{{ __('View type') }} 2</option>
                        <option value="3">{{ __('View type') }} 3</option>
                        <option value="4">{{ __('View type') }} 4</option>
                        <option value="5">{{ __('View type') }} 5</option>
                        <option value="6">{{ __('View type') }} 6</option>
                        <option value="7">{{ __('View type') }} 7</option>
                       <option value="8">{{ __('View type') }} 8</option>
                       <option value="9">{{ __('View type') }} 9</option>
                       <option value="10">{{ __('View type') }} 10</option>
                       <option value="11">{{ __('View type') }} 11</option>
                       <option value="12">{{ __('View type') }} 12</option>
                    </x-splade-select>


                    <x-splade-select name="article_type" label="Article card type">
                        <option value="1">{{ __('View type') }} 1</option>
                        <option value="2">{{ __('View type') }} 2</option>
                        <option value="3">{{ __('View type') }} 3</option>
                        <option value="4">{{ __('View type') }} 4</option>
                        <option value="5">{{ __('View type') }} 5</option>
                        <option value="6">{{ __('View type') }} 6</option>
                        <option value="7">{{ __('View type') }} 7</option>
                        <option value="8">{{ __('View type') }} 8</option>
                    </x-splade-select>

                    <x-splade-select name="video_type" label="Video card type">
                        <option value="1">{{ __('View type') }} 1</option>
                        <option value="2">{{ __('View type') }} 2</option>
                        <option value="3">{{ __('View type') }} 3</option>
                        <option value="4">{{ __('View type') }} 4</option>
                        <option value="5">{{ __('View type') }} 5</option>
                        <option value="6">{{ __('View type') }} 6</option>
                        <option value="7">{{ __('View type') }} 7</option>
                        <option value="8">{{ __('View type') }} 8</option>
                    </x-splade-select>

                    <x-splade-select name="slide_type" label="Slide type">
                        <option value="1">{{  __('View type') }} 1</option>
                        <option value="2">{{  __('View type') }} 2</option>
                        <option value="3">{{  __('View type') }} 3</option>
                        <option value="4">{{  __('View type') }} 4</option>
                        <option value="5">{{  __('View type') }} 5</option>
                        <option value="6">{{  __('View type') }} 6</option>
                        <option value="7">{{  __('View type') }} 7</option>
                        <option value="8">{{  __('View type') }} 8</option>
                    </x-splade-select>

                    <x-splade-select name="slide_anim" label="Slide anim">
                        <option value="1">{{ __('Animation') }} 1</option>
                        <option value="2">{{ __('Animation') }} 2</option>
                        <option value="3">{{ __('Animation') }} 3</option>
                    </x-splade-select>

                </x-layout.panel.form.division>

                <x-splade-submit label="Update"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
