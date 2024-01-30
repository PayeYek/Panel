<x-layout.admin>

    <x-splade-modal>
        <x-splade-form :default="$campaign" method="put" :action="route('panel.marketing.campaign.update', $campaign)">

            <x-layout.panel.form.card title="Edit Campaign">

                <x-splade-input label="Title" name="title"/>
                <x-splade-input label="Coupon code" name="code" help="English letters and numbers, without spaces." ltr/>
                <x-splade-input label="Discount percent" name="percent" type="number" ltr/>
                <x-splade-input label="Expire date" name="expired_at" date time ltr/>
                <x-splade-wysiwyg name="description" label="Description"
                                  jodit="{
                                           'showCharsCounter': false,
                                           'showWordsCounter': false,
                                           'showXPathInStatusbar': false,
                                           'buttons': 'bold,italic,underline,strikethrough,ul,ol,font,fullsize',
                                           'buttonsMD': 'bold,italic,underline,strikethrough,ul,ol,font,fullsize',
                                           'buttonsXS': 'bold,italic,underline,strikethrough,ul,ol,font,fullsize',
                                           'buttonsSM': 'bold,italic,underline,strikethrough,ul,ol,font,fullsize'
                                         }"
                                  class="col-span-full"
                />

                <x-splade-submit label="Update"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>

</x-layout.admin>
