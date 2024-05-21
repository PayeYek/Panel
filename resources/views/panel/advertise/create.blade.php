@php use App\Support\Help; @endphp
<x-layout.admin>
    <x-splade-modal>
        {{--        <x-splade-form
                    :action="route('panel.ad.advertise.store')"
                    :default="[
                    'category' => 'کامیون و کامیونت',
                     'usage' => 'باری',
                     'agreement' => 'خیر',
                     'car_condition' => 'کارکرده',
                     'fuel_type' => 'دیزلی',
                     'gearbox_type' => 'دستی',
                     'price' => 0,
                     'color' => 'white'
                    ]">

                    <x-layout.panel.form.card title="Create Advertise">

                        <x-splade-input required label="Title" name="title" class="col-span-full"/>
                        <x-splade-textarea help="توضیحات آگهی" rows="4" required label="Description" name="description"
                                           class="col-span-full"/>
                        <x-splade-select required label="Brand" name="brand" class="col-span-full">
                            @foreach($brands as $brand)
                                <option value="{{ $brand->title }}">{{ $brand->title }}</option>
                            @endforeach
                        </x-splade-select>
                        <x-splade-input help="مدل خودرو" required label="Model" name="model" class="col-span-full"/>
                        <x-splade-select label="Agreement" name="agreement" class="col-span-full">
                            <option value=1>بله</option>
                            <option value=0>خیر</option>
                        </x-splade-select>
                        <x-splade-input help="برحسب تومان" required ltr label="Price" name="price" type="number" step="0.01"
                                        class="col-span-full"/>
                        <x-splade-file required name="primary_image" label="Primary Image" filepond preview/>
                        <x-splade-file name="slider_images[]" label="Slider Image" filepond preview multiple/>
                        <x-splade-input help="شماره جهت تماس نمایش داده می شود" required ltr label="Communication Mobile" name="communication_mobile"
                                        class="col-span-full"/>
                        <x-splade-select required name="province_id" label="Province" choices remote-url="/api/provinces"
                                         option-label="name" option-value="id" :placeholder="__('Select an item')"/>
                        <x-splade-select required name="city_id" label="City" choices
                                         remote-url="`/api/provinces/${form.province_id}/cities`" option-label="name"
                                         option-value="id" :placeholder="__('Select an item')"/>
                        <div class="flex gap-4">
                            <x-splade-select required label="Color selection" name="color"
                                             placeholder="Select an item" class="flex-1">
                                @foreach(Help::colors() as $key => $color)
                                    <option value="{{$key}}">{{ $color }}</option>
                                @endforeach
                            </x-splade-select>
                            <span class="h-10 w-10 rounded-md border border-dashed border-body shrink-0 mt-7"
                                  :class="{
                                  'bg-none-color' : form.color === 'none',
                                  'bg-multi-color' : form.color === 'multi',
                                  'bg-black' : form.color === 'black',
                                  'bg-white' : form.color === 'white',
                                  'bg-red-500 dark:bg-red-500' : form.color === 'red',
                                  'bg-orange-500 dark:bg-orange-500' : form.color === 'orange',
                                  'bg-amber-500 dark:bg-amber-500' : form.color === 'amber',
                                  'bg-yellow-500 dark:bg-yellow-500' : form.color === 'yellow',
                                  'bg-lime-500 dark:bg-lime-500' : form.color === 'lime',
                                  'bg-green-500 dark:bg-green-500' : form.color === 'green',
                                  'bg-emerald-500 dark:bg-emerald-500' : form.color === 'emerald',
                                  'bg-teal-500 dark:bg-teal-500' : form.color === 'teal',
                                  'bg-cyan-500 dark:bg-cyan-500' : form.color === 'cyan',
                                  'bg-sky-500 dark:bg-sky-500' : form.color === 'sky',
                                  'bg-blue-500 dark:bg-blue-500' : form.color === 'blue',
                                  'bg-indigo-500 dark:bg-indigo-500' : form.color === 'indigo',
                                  'bg-violet-500 dark:bg-violet-500' : form.color === 'violet',
                                  'bg-purple-500 dark:bg-purple-500' : form.color === 'purple',
                                  'bg-fuchsia-500 dark:bg-fuchsia-500' : form.color === 'fuchsia',
                                  'bg-pink-500 dark:bg-pink-500' : form.color === 'pink',
                                  'bg-rose-500 dark:bg-rose-500' : form.color === 'rose',
                                  'bg-slate-500 dark:bg-slate-500' : form.color === 'slate',
                                  'bg-gray-500 dark:bg-gray-500' : form.color === 'gray',
                                  'bg-zinc-500 dark:bg-zinc-500' : form.color === 'zinc',
                                  'bg-neutral-500 dark:bg-neutral-500' : form.color === 'neutral',
                                  'bg-stone-500 dark:bg-stone-500' : form.color === 'stone'
                                  }"
                            ></span>
                        </div>
                        <x-splade-select required label="Car Condition" name="car_condition" class="col-span-full">
                            <option value="نو">نو</option>
                            <option value="کارکرده">کارکرده</option>
                        </x-splade-select>
                        <x-splade-select disabled label="Category" name="category" class="col-span-full">
                            <option value="کامیون و کامیونت">کامیون و کامیونت</option>
                        </x-splade-select>
                        <x-splade-select disabled label="Usage" name="usage" class="col-span-full">
                            <option disabled selected value="باری">باری</option>
                        </x-splade-select>
                        <x-splade-input help="برحسب کیلومتر" ltr label="Mileage" name="mileage" type="number" step="0.01" class="col-span-full"/>
                        <x-splade-input help="مثال: 1401" ltr label="Year" name="production_year" type="number" class="col-span-full"/>
                        <x-splade-select label="Fuel Type" name="fuel_type" class="col-span-full">
                            <option value="دیزلی">دیزلی</option>
                            <option value="بنزینی">بنزینی</option>
                            <option value="دوگانه سوز">دوگانه سوز</option>
                        </x-splade-select>
                        <x-splade-input help="وضعیت موتور خودرو را شرح دهید" label="Engine Condition" name="engine_condition" class="col-span-full"/>
                        <x-splade-input help="وضعیت شاسی های خودرو را شرح دهید" label="Chassis Condition" name="chassis_condition" class="col-span-full"/>
                        <x-splade-input help="وضعیت بدنه خودرو را شرح دهید" label="Body Condition" name="body_condition" class="col-span-full"/>
                        <x-splade-input help="برحسب ماه" ltr label="Third-Party Insurance Date"
                                        name="third_party_insurance_date" type="number" class="col-span-full"/>
                        <x-splade-select label="Gearbox Type" name="gearbox_type" class="col-span-full">
                            <option value="دستی">دستی</option>
                            <option value="اتوماتیک">اتوماتیک</option>
                        </x-splade-select>
                        <x-splade-submit label="Create"/>
                    </x-layout.panel.form.card>--}}
        <x-splade-form
            :action="route('panel.ad.advertise.store')"
            :default="[
            'category' => 'کامیون و کامیونت',
             'usage' => 'باری',
             'agreement' => '0',
             'car_condition' => 'کارکرده',
             'fuel_type' => 'دیزلی',
             'gearbox_type' => 'دستی',
             'price' => 0,
             'mileage' => 0,
             'color' => 'white',
             'status' => 0,
            ]"
            class="space-y-5">

            <x-layout.panel.form.card title="Create Advertise">

                <x-splade-input required label="Title" name="title" class="col-span-full"/>
                <x-splade-textarea rows="4" required label="Description" name="description"
                                   class="col-span-full"/>

                <x-splade-select required name="province_id" label="Province" choices remote-url="/api/provinces"
                                 option-label="name" option-value="id" :placeholder="__('Select an item')"/>
                <x-splade-select required name="city_id" label="City" choices
                                 remote-url="`/api/provinces/${form.province_id}/cities`" option-label="name"
                                 option-value="id" :placeholder="__('Select an item')"/>

                <x-splade-select required label="Brand" name="brand">
                    @foreach($brands as $brand)
                        <option value="{{ $brand->title }}">{{ $brand->title }}</option>
                    @endforeach
                </x-splade-select>
                <x-splade-input help="مدل خودرو" required label="Model" name="model"/>
                <x-splade-select label="Agreement" name="agreement">
                    <option value=1>بله</option>
                    <option value=0>خیر</option>
                </x-splade-select>
                <x-splade-input help="برحسب تومان" required ltr label="Price" name="price" type="number" step="0.01"/>

                <x-splade-input help="شماره جهت تماس نمایش داده می شود" required ltr label="Communication Mobile"
                                name="communication_mobile"/>
                <div class="flex gap-4">
                    <x-splade-select required label="Color selection" name="color"
                                     placeholder="Select an item" class="flex-1">
                        @foreach(Help::colors() as $key => $color)
                            <option value="{{$key}}">{{ $color }}</option>
                        @endforeach
                    </x-splade-select>

                    <span class="h-10 w-10 rounded-md border border-dashed border-body shrink-0 mt-7"
                          :class="{
                          'bg-none-color' : form.color === 'none',
                          'bg-multi-color' : form.color === 'multi',
                          'bg-black' : form.color === 'black',
                          'bg-white' : form.color === 'white',
                          'bg-red-500 dark:bg-red-500' : form.color === 'red',
                          'bg-orange-500 dark:bg-orange-500' : form.color === 'orange',
                          'bg-amber-500 dark:bg-amber-500' : form.color === 'amber',
                          'bg-yellow-500 dark:bg-yellow-500' : form.color === 'yellow',
                          'bg-lime-500 dark:bg-lime-500' : form.color === 'lime',
                          'bg-green-500 dark:bg-green-500' : form.color === 'green',
                          'bg-emerald-500 dark:bg-emerald-500' : form.color === 'emerald',
                          'bg-teal-500 dark:bg-teal-500' : form.color === 'teal',
                          'bg-cyan-500 dark:bg-cyan-500' : form.color === 'cyan',
                          'bg-sky-500 dark:bg-sky-500' : form.color === 'sky',
                          'bg-blue-500 dark:bg-blue-500' : form.color === 'blue',
                          'bg-indigo-500 dark:bg-indigo-500' : form.color === 'indigo',
                          'bg-violet-500 dark:bg-violet-500' : form.color === 'violet',
                          'bg-purple-500 dark:bg-purple-500' : form.color === 'purple',
                          'bg-fuchsia-500 dark:bg-fuchsia-500' : form.color === 'fuchsia',
                          'bg-pink-500 dark:bg-pink-500' : form.color === 'pink',
                          'bg-rose-500 dark:bg-rose-500' : form.color === 'rose',
                          'bg-slate-500 dark:bg-slate-500' : form.color === 'slate',
                          'bg-gray-500 dark:bg-gray-500' : form.color === 'gray',
                          'bg-zinc-500 dark:bg-zinc-500' : form.color === 'zinc',
                          'bg-neutral-500 dark:bg-neutral-500' : form.color === 'neutral',
                          'bg-stone-500 dark:bg-stone-500' : form.color === 'stone'
                          }"
                    ></span>
                </div>
            </x-layout.panel.form.card>

            <x-layout.panel.form.card title="Images">
                <x-splade-file required name="primary_image" label="Primary Image" class="col-span-full" filepond
                               preview/>
                <x-splade-file name="slider_images[]" label="Slider Image" class="col-span-full" filepond preview
                               multiple/>
            </x-layout.panel.form.card>

            <x-layout.panel.form.card title="Additional information">
                <x-splade-input disabled label="Category" name="category"/>

                <x-splade-input disabled label="Usage" name="usage"/>

                <x-splade-select required label="Car Condition" name="car_condition">
                    <option value="نو">نو</option>
                    <option value="کارکرده">کارکرده</option>
                </x-splade-select>

                <x-splade-input help="برحسب کیلومتر" ltr label="Mileage" name="mileage" type="number" step="0.01"/>

                <x-splade-input help="مثال: 1401" ltr label="Year" name="production_year" type="number"/>

                <x-splade-select label="Fuel Type" name="fuel_type">
                    <option value="دیزلی">دیزلی</option>
                    <option value="بنزینی">بنزینی</option>
                    <option value="دوگانه سوز">دوگانه سوز</option>
                </x-splade-select>

                <x-splade-input help="برحسب ماه" ltr label="Third-Party Insurance Date"
                                name="third_party_insurance_date" type="number"/>

                <x-splade-select label="Gearbox Type" name="gearbox_type">
                    <option value="دستی">دستی</option>
                    <option value="اتوماتیک">اتوماتیک</option>
                    <option value="نیمه اتوماتیک">نیمه اتوماتیک</option>
                </x-splade-select>

                <x-splade-textarea rows="3" help="وضعیت موتور خودرو را شرح دهید" label="Engine Condition"
                                   name="engine_condition"
                                   class="col-span-full"/>

                <x-splade-textarea rows="3" help="وضعیت شاسی های خودرو را شرح دهید" label="Chassis Condition"
                                   name="chassis_condition" class="col-span-full"/>

                <x-splade-textarea rows="3" help="وضعیت بدنه خودرو را شرح دهید" label="Body Condition"
                                   name="body_condition"
                                   class="col-span-full"/>

                <x-splade-submit label="Create"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
