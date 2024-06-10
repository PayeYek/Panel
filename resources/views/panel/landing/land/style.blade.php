<x-layout.admin>
    <x-splade-modal>
        <x-splade-form
            :default="$style"
            method="put"
            :action="route('panel.landing.land.style.update', $land)"
            class="flex flex-col gap-8">

            <x-layout.panel.form.alerts/>

            <x-layout.panel.form.card2 title="الگوی کلی" desc="">
                <x-layout.panel.form.division :col="2">
                    <x-splade-select name="radius" label="Radius">
                        <option value="0">0 PX</option>
                        <option value="2">2 PX</option>
                        <option value="4">4 PX</option>
                        <option value="6">6 PX</option>
                        <option value="8">8 PX</option>
                        <option value="12">12 PX</option>
                    </x-splade-select>

                    <x-splade-select name="color" label="Color">
                        <option value="1"> آرین دیزل </option>
                        <option value="2"> سایپا دیزل </option>
                        <option value="3"> سروش دیزل </option>
                        <option value="4"> پیلسان </option>
                        <option value="5"> بهمن دیزل </option>
                        <option value="6"> کاریزان </option>
                        <option value="7"> آریا دیزل </option>
                        <option value="8"> ایرانخودرو دیزل </option>
                        <option value="9"> ویرا دیزل </option>
                        <option value="10"> مایان خودرو </option>
                        <option value="11"> آذهایتکس خودرو </option>
                        <option value="12"> تیتان خودرو </option>
                        <option value="13"> داتیس فرا دیزل آریا </option>
                        <option value="14"> رخش خودرو </option>
                        <option value="15"> کاسپین خودرو فرهنگ </option>
                        <option value="16"> ارس خودرو دیزل </option>
                        <option value="17"> شایان دیزل </option>
                        <option value="18"> فردا دیزل </option>
                        <option value="19"> کامل دیزل </option>
                        <option value="20"> ماموت خودرو </option>
                        <option value="21"> مکس موتور </option>
                        <option value="22"> شیران دیزل </option>
                        <option value="23"> تیراژه دیزل </option>
                        <option value="24"> کاوه دیزل </option>
                        <option value="26"> آراسب دیزل </option>
                    </x-splade-select>

                    <x-splade-select name="border_type" label="نمای اشیاء">
                        <option value="0">ساده</option>
                        <option value="1">حاشیه دار</option>
                        <option value="2">سایه دار</option>
                    </x-splade-select>

                    <x-splade-select name="category_filter_type" label="نوع فیلتر">
                        <option value="0">تب</option>
                        <option value="1"> انتخابی </option>
                    </x-splade-select>
                </x-layout.panel.form.division>
            </x-layout.panel.form.card2>

            <x-layout.panel.form.card2 title="خانه" desc="الگوی صفحه اصلی">
                <x-layout.panel.form.division :col="2">
                    <x-splade-select name="quick_access_panel_type" label="Quick access panel type">
                        <option value="0"> غیر فعال </option>
                        <option value="1">{{ __('View type') }} 1</option>
                        <option value="2">{{ __('View type') }} 2</option>
                        <option value="3">{{ __('View type') }} 3</option>
                        <option value="4">{{ __('View type') }} 4</option>
                        <option value="5">{{ __('View type') }} 5</option>
                        <option value="6">{{ __('View type') }} 6</option>
                        <option value="7">{{ __('View type') }} 7</option>
                        <option value="8">{{ __('View type') }} 8</option>
                        <option value="9">{{ __('View type') }} 9</option>
                    </x-splade-select>

                    <x-splade-select name="section_header_type" label="Section header type">
                        <option value="0"> غیرفعال </option>
                        <option value="1">{{ __('View type') }} 1</option>
                        <option value="2">{{ __('View type') }} 2</option>
                        <option value="3">{{ __('View type') }} 3</option>
                        <option value="4">{{ __('View type') }} 4</option>
                        <option value="5">{{ __('View type') }} 5</option>
                        <option value="6">{{ __('View type') }} 6</option>
                    </x-splade-select>

                    <x-splade-select name="product_card_type" label="Product card type">
                        <option value="1">{{ __('View type') }} 1</option>
                        <option value="2">{{ __('View type') }} 2</option>
                        <option value="3">{{ __('View type') }} 3</option>
                        <option value="4">{{ __('View type') }} 4</option>
                        <option value="5">{{ __('View type') }} 5</option>
                        <option value="6">{{ __('View type') }} 6</option>
                        <option value="7">{{ __('View type') }} 7</option>
                        <option value="8">{{ __('View type') }} 8</option>
                        <option value="9">{{ __('View type') }} 9</option>
                        <option value="10">{{ __('View type') }} 10</option>
                        <option value="11">{{ __('View type') }} 11</option>
                        <option value="12">{{ __('View type') }} 12</option>
                        <option value="13">{{ __('View type') }} 13</option>
                        <option value="14">{{ __('View type') }} 14</option>
                        <option value="15">{{ __('View type') }} 15</option>
                        <option value="16">{{ __('View type') }} 16</option>
                    </x-splade-select>

                    <x-splade-select name="product_striped" label="نمای راه راه محصولات">
                        <option value="0">غیرفعال</option>
                        <option value="1">فعال</option>
                    </x-splade-select>

                    <x-splade-select name="article_card_type" label="Article card type">
                        <option value="1">{{ __('View type') }} 1</option>
                        <option value="2">{{ __('View type') }} 2</option>
                        <option value="3">{{ __('View type') }} 3</option>
                        <option value="4">{{ __('View type') }} 4</option>
                        <option value="5">{{ __('View type') }} 5</option>
                        <option value="6">{{ __('View type') }} 6</option>
                        <option value="7">{{ __('View type') }} 7</option>
                        <option value="8">{{ __('View type') }} 8</option>
                        <option value="9">{{ __('View type') }} 9</option>
                        <option value="10">{{ __('View type') }} 10</option>
                        <option value="11">{{ __('View type') }} 11</option>
                    </x-splade-select>

                    <x-splade-select name="article_striped" label="نمای راه راه مقالات">
                        <option value="0">غیرفعال</option>
                        <option value="1">فعال</option>
                    </x-splade-select>

                    <x-splade-select name="video_card_type" label="Video card type">
                        <option value="1">{{ __('View type') }} 1</option>
                        <option value="2">{{ __('View type') }} 2</option>
                        <option value="3">{{ __('View type') }} 3</option>
                        <option value="4">{{ __('View type') }} 4</option>
                        <option value="5">{{ __('View type') }} 5</option>
                        <option value="6">{{ __('View type') }} 6</option>
                        <option value="7">{{ __('View type') }} 7</option>
                    </x-splade-select>

                    <x-splade-select name="slider_anim" label="انیمیشن اسلایدر">
                        <option value="1">{{ __('Animation') }} 1</option>
                    </x-splade-select>

                    <x-splade-select name="slider_type" label="قالب اسلایدر">
                        <option value="1">{{ __('View type') }} 1</option>
                        <option value="2">{{ __('View type') }} 2</option>
                        <option value="3">{{ __('View type') }} 3</option>
                        <option value="4">{{ __('View type') }} 4</option>
                        <option value="5">{{ __('View type') }} 5</option>
                    </x-splade-select>

                    <x-splade-select name="contact_type" label="contact type">
                        <option value="1">{{ __('View type') }} 1</option>
                        <option value="2">{{ __('View type') }} 2</option>
                        <option value="3">{{ __('View type') }} 3</option>
                        <option value="4">{{ __('View type') }} 4</option>
                        <option value="5">{{ __('View type') }} 5</option>
                        <option value="6">{{ __('View type') }} 6</option>
                        <option value="7">{{ __('View type') }} 7</option>
                    </x-splade-select>
                </x-layout.panel.form.division>
            </x-layout.panel.form.card2>

            <x-layout.panel.form.card2 title="صفحه محصول" desc="الگوی صفحه محصول">
                <x-layout.panel.form.division :col="2">
                    <x-splade-select name="product_list_type" label="مدل چینش صفحه محصول">
                        <option value="1">{{ __('View type') }} 1</option>
                        <option value="2">{{ __('View type') }} 2</option>
                        <option value="3">{{ __('View type') }} 3</option>
                        <option value="4">{{ __('View type') }} 4</option>
                        <option value="5">{{ __('View type') }} 5</option>
                    </x-splade-select>
                </x-layout.panel.form.division>
            </x-layout.panel.form.card2>

            <x-layout.panel.form.card2 title="صفحه محصولات" desc="الگوی صفحه محصولات">
                <x-layout.panel.form.division :col="2">
                    <x-splade-select name="category_card_type" label="قالب نمایشی موارد در صفحه محصولات">
                        <option value="1">{{  __('View type') }} 1</option>
                        <option value="2">{{  __('View type') }} 2</option>
                        <option value="3">{{  __('View type') }} 3</option>
                        <option value="4">{{  __('View type') }} 4</option>
                        <option value="5">{{  __('View type') }} 5</option>
                        <option value="6">{{  __('View type') }} 6</option>
                        <option value="7">{{  __('View type') }} 7</option>
                        <option value="8">{{  __('View type') }} 8</option>
                        <option value="9">{{  __('View type') }} 9</option>
                        <option value="10">{{  __('View type') }} 10</option>
                        <option value="11">{{  __('View type') }} 11</option>
                        <option value="12">{{  __('View type') }} 12</option>
                        <option value="13">{{  __('View type') }} 13</option>
                        <option value="14">{{  __('View type') }} 14</option>
                        <option value="15">{{  __('View type') }} 15</option>
                        <option value="16">{{  __('View type') }} 16</option>
                    </x-splade-select>

                    <x-splade-select name="category_striped" label="نمای راه راه دسته بندی">
                        <option value="0">غیرفعال</option>
                        <option value="1">فعال</option>
                    </x-splade-select>
                </x-layout.panel.form.division>
            </x-layout.panel.form.card2>

            <x-layout.panel.form.card2 title="صفحه مقالات" desc="الگوی صفحه مقالات">
                <x-layout.panel.form.division :col="2">
                    <x-splade-select name="a_card_type" label="قالب نمایشی مقالات">
                        <option value="1">{{  __('View type') }} 1</option>
                        <option value="2">{{  __('View type') }} 2</option>
                        <option value="3">{{  __('View type') }} 3</option>
                        <option value="4">{{  __('View type') }} 4</option>
                        <option value="5">{{  __('View type') }} 5</option>
                        <option value="6">{{  __('View type') }} 6</option>
                        <option value="7">{{  __('View type') }} 7</option>
                    </x-splade-select>

                    <x-splade-select name="a_striped" label="نمای راه راه مقالات">
                        <option value="0">غیرفعال</option>
                        <option value="1">فعال</option>
                    </x-splade-select>
                </x-layout.panel.form.division>
            </x-layout.panel.form.card2>

            <x-layout.panel.form.card2 title="صفحه مقاله" desc="الگوی صفحه مقاله">
                <x-layout.panel.form.division :col="2">
                    <x-splade-select name="a_view_type" label="قالب نمایشی مقاله">
                        <option value="1">{{  __('View type') }} 1</option>
                        <option value="2">{{  __('View type') }} 2</option>
                        <option value="3">{{  __('View type') }} 3</option>
                        <option value="4">{{  __('View type') }} 4</option>
                        <option value="5">{{  __('View type') }} 5</option>
                        <option value="6">{{  __('View type') }} 6</option>
                        <option value="7">{{  __('View type') }} 7</option>
                    </x-splade-select>

                    <x-splade-select name="a_table_type" label="قالب جداول">
                        <option value="0"> حاشیه دار </option>
                        <option value="1"> راه راه </option>
                    </x-splade-select>
                </x-layout.panel.form.division>
            </x-layout.panel.form.card2>

            <x-splade-submit label="Update"/>

            {{-- </x-layout.panel.form.card2> --}}
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
