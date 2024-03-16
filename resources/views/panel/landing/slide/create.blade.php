<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :action="route('panel.landing.slide.store')"
                       :default="['status' => 1]">
            <x-layout.panel.form.card title="New Slide">

                <x-layout.panel.form.alerts/>
                {{--
                    'published_at',
                    'expired_at',
                    --}}
                <x-layout.panel.form.division>
                    <x-splade-select name="land_id" label="Landing" :options="$lands" placeholder="Select an item"
                                     choices/>
                    <x-splade-file name="image" label="Image" filepond preview
                                   max-size="2MB"
                                   required
                    />
                    <x-splade-input name="alt" label="Alternative text" required/>
                    <x-splade-input name="link" label="Link" required ltr/>

                    <x-splade-input name="infos[0]" label="Information"/>
                    <x-splade-input name="infos[1]" label="Information"/>
                    <x-splade-input name="infos[2]" label="Information"/>
                    <x-splade-input name="infos[3]" label="Information"/>

                    {{--STATUS--}}
                    <x-splade-group name="status" label="Status" inline required>
                        <x-splade-radio name="status" value="0" label="Invisible"/>
                        <x-splade-radio name="status" value="1" label="Visible"/>
                    </x-splade-group>

                </x-layout.panel.form.division>

                <x-splade-submit label="Create"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
