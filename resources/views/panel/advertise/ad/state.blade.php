@php use App\Support\Help; @endphp
<x-layout.admin>
    <x-splade-modal>

        <x-splade-form
            :default="$ad" method="put" :action="route('panel.advertise.ad.update', $ad)"
            class="!space-y-5">

            <x-layout.panel.form.card title="State">

                <x-layout.panel.form.alerts/>

                <x-splade-group label="State" name="state" inline class="col-span-full">
                    <x-splade-radio name="state" value="0"  label="Pending"/>
                    <x-splade-radio name="state" value="1"  label="Approved"/>
                    <x-splade-radio name="state" value="2"  label="Rejected"/>
                    <x-splade-radio name="state" value="10" label="Expired"/>
                </x-splade-group>

                <x-splade-select name="tags[]" label="Tags" multiple choices class="col-span-full">
                    @foreach(\App\Models\Tag::all() as $tag)
                        <option value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </x-splade-select>

                <x-splade-submit label="Accept"/>
            </x-layout.panel.form.card>

            <x-layout.panel.form.card title="Preview">


                <x-splade-input name="title" label="Title" required disabled/>

                <x-splade-select name="category_id" label="Category" choices disabled>
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

                <x-splade-textarea name="description" label="Description" rows="4" class="col-span-full" required
                                   disabled/>

                <x-splade-select name="province_id" label="Province" required choices remote-url="/api/provinces"
                                 option-label="name" option-value="id" :placeholder="__('Select an item')"/>

                <x-splade-select name="city_id" label="City" required choices disabled
                                 remote-url="`/api/provinces/${form.province_id}/cities`" option-label="name"
                                 option-value="id" :placeholder="__('Select an item')"/>

                <x-splade-select name="agreement" label="Agreement" disabled>
                    <option value="0">{{__("No")}}</option>
                    <option value="1">{{__("Yes")}}</option>
                </x-splade-select>

                <x-splade-select name="exchange" label="Changeable" disabled>
                    <option value="0">{{__("No")}}</option>
                    <option value="1">{{__("Yes")}}</option>
                </x-splade-select>

                <x-splade-input name="price" label="Price" type="number" min="0" prepend="{{__('Toman')}}"
                                placeholder="0" required ltr disabled/>

                <x-splade-input name="mobile" label="Communication Mobile" required ltr
                                maxlength="10" prepend="+98" placeholder="9-- --- ----" disabled/>

            </x-layout.panel.form.card>

            <x-layout.panel.form.card title="Images">
                <x-splade-file name="image" label="Primary Image" class="col-span-full" required filepond
                               preview disabled/>
                <x-splade-file name="pictures[]" label="More Image" class="col-span-full" filepond preview
                               multiple disabled/>

                <x-splade-submit label="Update"/>
            </x-layout.panel.form.card>

        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
