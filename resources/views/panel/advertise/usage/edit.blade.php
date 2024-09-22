<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :default="$usage" method="put" :action="route('panel.ad.usage.update', $usage)">
            <x-layout.panel.form.card title="Edit Usage">

                <x-layout.panel.form.alerts/>

                <x-layout.panel.form.division>

                    <x-splade-input name="title" label="Title"/>

                </x-layout.panel.form.division>

                <x-splade-submit label="Update"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
