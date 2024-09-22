<x-layout.admin>
    <x-splade-modal>
        <x-splade-form
            :default="$sales_expert" method="put"
            :action="route('panel.landing.sales-expert.update', $sales_expert)"
        >

            <x-layout.panel.form.card title="New Feedback">
                <x-layout.panel.form.alerts/>

                <x-layout.panel.form.division :col="2">
                    <x-splade-input required name="first_name" label="Name"/>
                    <x-splade-input required name="last_name" label="Family"/>
                    <x-splade-input required name="expert_id" label="Expert ID"/>
                    <x-splade-input required name="phone" label="Phone"/>
                    <x-splade-file name="image" label="Image" filepond preview
                                   max-size="2MB"
                                   required
                                   help="ابعاد عکس باید 1 در 1 باشد"
                    />
                </x-layout.panel.form.division>

                <x-splade-submit label="Update"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>

</x-layout.admin>
