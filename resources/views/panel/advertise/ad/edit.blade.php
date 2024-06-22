@php use App\Support\Help; @endphp
<x-layout.admin>
    <x-splade-modal>

        <x-splade-form
            :default="$ad" method="put" :action="route('panel.advertise.ad.update', $ad)"
            class="space-y-5">

            <x-layout.panel.form.card title="Create Advertise">

                <x-layout.panel.form.alerts/>

                <x-splade-input name="title" label="Title" required/>

                {{-- <x-splade-select name="category_id" label="Category" :options="$categories" placeholder="Select an item"--}}
                {{--                  choices/>--}}

                <x-splade-select name="category_id" label="Category" choices>
                    <option value="">{{ __('Other') }}</option>
                    @foreach(\App\Models\Category::whereNull('parent_id')->get() as $ground)
                        @foreach($ground->children as $parent)
                            <optgroup label="{{$parent->title}}">
                                @foreach($parent->children as $child)
                                    <option value="{{ $child->id }}">{{ $child->title }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    @endforeach
                </x-splade-select>

                <x-splade-textarea name="description" label="Description" rows="4" class="col-span-full" required/>

                <x-splade-select name="province_id" label="Province" required choices remote-url="/api/provinces"
                                 option-label="name" option-value="id" :placeholder="__('Select an item')"/>

                <x-splade-select name="city_id" label="City" required choices
                                 remote-url="`/api/provinces/${form.province_id}/cities`" option-label="name"
                                 option-value="id" :placeholder="__('Select an item')"/>

                <x-splade-select name="agreement" label="Agreement">
                    <option value="0">{{__("No")}}</option>
                    <option value="1">{{__("Yes")}}</option>
                </x-splade-select>

                <x-splade-select name="exchange" label="Changeable">
                    <option value="0">{{__("No")}}</option>
                    <option value="1">{{__("Yes")}}</option>
                </x-splade-select>

                <x-splade-input name="price" label="Price" type="number" min="0" prepend="{{__('Toman')}}"
                                placeholder="0" required ltr/>

                <x-splade-input name="mobile" label="Communication Mobile" required ltr
                                maxlength="10" prepend="+98" placeholder="9-- --- ----"/>

            </x-layout.panel.form.card>

            <x-layout.panel.form.card title="Images">
                <x-splade-file name="image" label="Primary Image" class="col-span-full" required filepond
                               preview/>
                <x-splade-file name="pictures[]" label="More Image" class="col-span-full" filepond preview
                               multiple/>

                <x-splade-submit label="Update"/>
            </x-layout.panel.form.card>

        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
