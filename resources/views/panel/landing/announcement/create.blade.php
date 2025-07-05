<x-layout.admin>
    <x-splade-modal>
        <x-splade-form method="post" :action="route('panel.landing.announcement.store')">

            <x-layout.panel.form.card title="New announcement">

                <x-layout.panel.form.alerts/>

                <x-splade-select name="land_id" label="Landing" :options="$lands" placeholder="Select an item"
                                 choices/>

                <x-splade-select required name="page" label="Page">
                    <option value="" disabled>{{__('Select an item')}}</option>
                    @if($pages)
                        @foreach($pages as $page)
                            <option value="{{ $page['id'] }}">{{ $page['label'] }}</option>
                        @endforeach
                    @endif
                </x-splade-select>

                <x-splade-select help="تماس : زمانی که روی تبلیغ کلیک شود به حالت تماس عمل میکند.
                لینک : زمانی که روی تبلیغ کلیک شود به لینک مورد نظر ارجاع داده می شود." required name="type"
                                 label="Type">
                    <option value="" disabled>{{__('Select an item')}}</option>
                    @if($types)
                        @foreach($types as $type)
                            <option value="{{ $type['id'] }}">{{ $type['label'] }}</option>
                        @endforeach
                    @endif
                </x-splade-select>


                <x-splade-input help="عنوان تبلیغ" name="title" label="Title" required/>
                <x-splade-textarea name="description" label="Description"/>
                <x-splade-input help="می تواند شامل شماره تماس یا لینک باشد" name="target" label="Target path"/>

                <x-layout.panel.form.division>
                    <x-splade-file name="media" label="Media" filepond preview required/>
                    <x-splade-file help="در زمان عدم نمایش ویدئو عکس پوستر می تواند جایگزین شود." name="poster"
                                   label="Poster" filepond preview required/>
                </x-layout.panel.form.division>

                <x-splade-submit label="Create"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
