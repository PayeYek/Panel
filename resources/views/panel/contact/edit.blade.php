<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :default="$contact" method="put" :action="route('panel.interaction.contact.update', $contact)">

            <x-layout.panel.form.card title="Handle call request">
                <x-layout.panel.form.alerts/>

                <x-splade-input name="name" label="Name and family" readonly/>
                <x-splade-input name="tel" label="Telephone" readonly/>

                <x-layout.panel.form.division col="1">
                    <x-splade-textarea name="text" label="Request text" readonly autosize rows="3"/>
                    <x-splade-textarea name="note" label="Note" autosize rows="4"/>

                    {{--STATUS--}}
                    <x-splade-group name="status" label="Status" inline required>
                        <x-splade-radio name="status" value="{{\App\Enums\ContactUsStatus::Waiting->value}}" label="Waiting" :checked="$contact->status == \App\Enums\ContactUsStatus::Waiting->value"/>
                        <x-splade-radio name="status" value="{{\App\Enums\ContactUsStatus::Done->value}}" label="Done" :checked="$contact->status == \App\Enums\ContactUsStatus::Done->value"/>
                    </x-splade-group>
                </x-layout.panel.form.division>

                <x-splade-submit label="Update"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>

</x-layout.admin>
