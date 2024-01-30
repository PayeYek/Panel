<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :default="$cooperation" method="put"
                       :action="route('panel.interaction.cooperation.update', $cooperation)">

            <x-layout.panel.form.card title="Handle cooperation request">
                <x-layout.panel.form.alerts/>

                <x-splade-input name="name" label="Name and family" readonly/>
                <x-splade-input name="tel" label="Telephone" readonly/>
                <x-splade-input name="email" label="Email" readonly/>
                <x-splade-input name="website" label="Website" readonly/>

                <x-layout.panel.form.division col="1">
                    <x-splade-textarea name="text" label="Request text" readonly autosize rows="3"/>
                    <x-splade-textarea name="note" label="Note" autosize rows="4"/>

                    {{--STATUS--}}
                    <x-splade-group name="status" label="Status" inline required>
                        <x-splade-radio name="status" value="{{\App\Enums\CooperationStatus::Waiting->value}}"
                                        label="Waiting"
                                        :checked="$cooperation->status == \App\Enums\CooperationStatus::Waiting->value"/>
                        <x-splade-radio name="status" value="{{\App\Enums\CooperationStatus::Done->value}}"
                                        label="Done"
                                        :checked="$cooperation->status == \App\Enums\CooperationStatus::Done->value"/>
                    </x-splade-group>
                </x-layout.panel.form.division>

                <x-splade-submit label="Update"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>

</x-layout.admin>
