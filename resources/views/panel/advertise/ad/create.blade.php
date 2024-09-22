<x-layout.admin>
    <x-splade-modal>

        <x-splade-form
            :action="route('panel.advertise.ad.store')"
            :default="[
             'agreement' => 0,
             'exchange' => 0,
             'installment' => 0,
             'number' => 0,
             'tags' => [],
             'state' => \App\Enum\AdvertiseStateEnum::APPROVED->value,
            ]"
            class="space-y-5">

            <x-layout.panel.form.card title="Create Advertise">

                <x-layout.panel.form.alerts/>

                <x-splade-input name="title" label="Title" required/>

                {{-- <x-splade-select name="category_id" label="Category" :options="$categories" placeholder="Select an item"--}}
                {{--                  choices/>--}}

                <x-splade-select name="category_id" label="Category" choices required>
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

                <x-splade-select name="tags[]" label="Tags" multiple choices class="col-span-full">
                    @foreach(\App\Models\Tag::all() as $tag)
                        <option value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </x-splade-select>

                <x-splade-select name="province_id" label="Province" required choices remote-url="/api/provinces"
                                 option-label="name" option-value="id" :placeholder="__('Select an item')"/>

                <x-splade-select name="city_id" label="City" required choices
                                 remote-url="`/api/provinces/${form.province_id}/cities`" option-label="name"
                                 option-value="id" :placeholder="__('Select an item')"/>

                <x-layout.panel.form.division :col="3">
                    <x-splade-select name="agreement" label="Agreement">
                        <option value="0">{{__("No")}}</option>
                        <option value="1">{{__("Yes")}}</option>
                    </x-splade-select>

                    <x-splade-select name="installment" label="Leasing">
                        <option value="0">{{__("No")}}</option>
                        <option value="1">{{__("Yes")}}</option>
                    </x-splade-select>

                    <x-splade-select name="exchange" label="Changeable">
                        <option value="0">{{__("No")}}</option>
                        <option value="1">{{__("Yes")}}</option>
                    </x-splade-select>
                </x-layout.panel.form.division>
                <x-splade-input name="price" label="Price" type="number" min="0" prepend="{{__('Toman')}}"
                                placeholder="0" required ltr/>

                <x-splade-input name="mobile" label="Communication Mobile" required ltr
                                maxlength="10" prepend="+98" placeholder="9-- --- ----"/>
            </x-layout.panel.form.card>

            <template v-if="form.installment == 1">
                <x-layout.panel.form.card title="Installments">

                    <x-splade-input name="amount" label="Amount of each installment" type="number" min="0"
                                    prepend="{{__('Toman')}}"
                                    placeholder="0" ltr/>

                    <x-splade-input name="prepayment" label="Prepayment" type="number" min="0" prepend="{{__('Toman')}}"
                                    placeholder="0" ltr/>

                    <x-splade-select name="number" label="Number of installment">
                        <option value="0" disabled> {{  __('Select an item') }} </option>
                        @for($i=1; $i<=12; $i++)
                            <option value="{{$i}}"> {{$i}} </option>
                        @endfor
                    </x-splade-select>

                    <x-splade-select name="delivery" label="Delivery time">
                        <option value="0" disabled> {{  __('Select an item') }} </option>
                        <option value="1">1 {{__('Day')}}</option>
                        <option value="7">7 {{__('Day')}}</option>
                        <option value="12">12 {{__('Day')}}</option>
                        <option value="15">15 {{__('Day')}}</option>
                        <option value="20">20 {{__('Day')}}</option>
                        <option value="30">30 {{__('Day')}}</option>
                        <option value="45">45 {{__('Day')}}</option>
                        <option value="60">60 {{__('Day')}}</option>
                        <option value="90">90 {{__('Day')}}</option>
                        <option value="120">120 {{__('Day')}}</option>
                    </x-splade-select>

                    <x-splade-select name="period" label="Payment period">
                        <option value="0" disabled> {{  __('Select an item') }} </option>
                        <option value="1">{{__('Monthly')}}</option>
                        <option value="2">{{__('Every')}} 2 {{__('Month')}}</option>
                        <option value="3">{{__('Every')}} 3 {{__('Month')}}</option>
                        <option value="4">{{__('Every')}} 4 {{__('Month')}}</option>
                        <option value="5">{{__('Every')}} 5 {{__('Month')}}</option>
                        <option value="6">{{__('Every')}} 6 {{__('Month')}}</option>
                    </x-splade-select>
                </x-layout.panel.form.card>
            </template>

            <x-layout.panel.form.card title="Images">
                <x-splade-file name="image" label="Primary Image" class="col-span-full" required filepond
                               preview/>
                <x-splade-file name="pictures[]" label="More Image" class="col-span-full" filepond preview
                               multiple/>

                <x-splade-submit label="Create"/>
            </x-layout.panel.form.card>


        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
