@php use App\Support\Help; @endphp
<x-layout.admin>
    <x-splade-modal>
        <x-splade-form
            :action="route('panel.ad.store')"
            :default="[
            'category' => 'کامیون و کامیونت',
             'usage' => 'باری',
             'agreement' => 'خیر',
             'car_condition' => 'سالم',
            ]">

            <x-layout.panel.form.card title="Create Advertise">

                <x-splade-select disabled label="Category" name="category" class="col-span-full">
                    <option value="کامیون و کامیونت">کامیون و کامیونت</option>
                </x-splade-select>

                <x-splade-input label="Title" name="title" class="col-span-full"/>
                <x-splade-textarea label="Description" name="description" class="col-span-full"/>

                <x-splade-select disabled label="Usage" name="usage" class="col-span-full">
                    <option disabled selected value="باری">باری</option>
                </x-splade-select>

                <x-splade-select label="Brand" name="brand" class="col-span-full">
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                    @endforeach
                </x-splade-select>
                <x-splade-file name="primary_image" label="Primary Image" filepond preview
                />
                <x-splade-file name="slider_image[]" label="Slider Image" filepond preview multiple
                />
                <x-splade-input label="Model" name="model" class="col-span-full"/>

                <x-splade-select label="Agreement" name="agreement" class="col-span-full">
                    <option value="بله">بله</option>
                    <option value="خیر">خیر</option>
                </x-splade-select>

                <x-splade-input label="Price" name="price" type="number" step="0.01" class="col-span-full"/>
                <x-splade-input label="Communication Mobile" name="communication_mobile" class="col-span-full"/>

                <x-splade-select label="Car Condition" name="car_condition" class="col-span-full">
                    <option value="سالم">سالم</option>
                    <option value="رنگ شدگی">رنگ شدگی</option>
                    <option value="تصادفی">تصادفی</option>
                </x-splade-select>

                <x-splade-input ltr label="Mileage" name="mileage" type="number" step="0.01" class="col-span-full"/>
                <x-splade-input ltr label="Year" name="year" type="number" class="col-span-full"/>
                <x-splade-select name="province" label="Province" choices remote-url="/api/provinces"
                                 option-label="name" option-value="id" :placeholder="__('Select an item')"/>
                <x-splade-select name="city" label="City" choices
                                 remote-url="`/api/provinces/${form.province}/cities`" option-label="name"
                                 option-value="id" :placeholder="__('Select an item')"/>

                <div class="flex gap-4">
                    <x-splade-select label="Color selection" name="color" :options="Help::colors()"
                                     placeholder="Select an item" class="flex-1"/>
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

                <x-splade-input label="Fuel Type" name="fuel_type" class="col-span-full">

                </x-splade-input>
                <x-splade-input label="Engine Condition" name="engine_condition" class="col-span-full"/>
                <x-splade-input label="Chassis Condition" name="chassis_condition" class="col-span-full"/>
                <x-splade-input label="Body Condition" name="body_condition" class="col-span-full"/>
                <x-splade-input help="بر حسب ماه" ltr label="Third-Party Insurance Date"
                                name="third_party_insurance_date" type="number" class="col-span-full"/>
                <x-splade-input label="Gearbox Type" name="gearbox_type" class="col-span-full"/>

                <x-splade-submit label="Create"/>

            </x-layout.panel.form.card>

        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
