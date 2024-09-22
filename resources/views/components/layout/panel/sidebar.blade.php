{{--SIDEBAR--}}
<aside
    :class="navigation.opened ? 'translate-x-0' : 'ltr:translate-x-[-100%] rtl:translate-x-[100%]'"
    class="fixed top-0 ltr:left-0 rtl:right-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 ltr:md:translate-x-0 rtl:md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
>
    <div
        class="scrollbar-thin scrollbar-thumb-gray-200 scrollbar-track-white dark:scrollbar-thumb-gray-700 dark:scrollbar-track-gray-800 overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800  *:pt-5 *:mt-5 *:space-y-2 *:border-t *:border-gray-200 *:dark:border-gray-700 first:*:pt-0 first:*:mt-2 first:*:border-none">

{{--        <ul class="space-y-2">--}}
{{--            <x-layout.panel.menu title="Dashboard"--}}
{{--                                 route="panel.dashboard"/>--}}
{{--        </ul>--}}
        <ul>


            {{--AD SERVICES--}}
            @php
                $countPendingAds = \App\Models\Ad::whereState(\App\Enum\AdvertiseStateEnum::PENDING)->get()->count();
            @endphp
            <x-layout.panel.menu title="Ad Service" route="panel.advertise.*"
                                 :badge="$countPendingAds">
                <x-layout.panel.menu title="Advertise" route="panel.advertise.ad.index"
                                     :badge="$countPendingAds"/>
                <x-layout.panel.menu title="Categories" route="panel.advertise.category.index"/>
                <x-layout.panel.menu title="Tags" route="panel.advertise.tag.index"/>
            </x-layout.panel.menu>
        </ul>

        <ul>
            <x-layout.panel.menu title="Daily price" route="panel.priceList.index"/>
        </ul>

        <ul>
            <x-layout.panel.menu title="Announces" route="panel.announce.index"/>
        </ul>

        <ul>
            <x-layout.panel.menu title="Verticel Announces" route="panel.vertical_announce.index"/>
        </ul>

{{--        <ul>--}}
{{--            <x-layout.panel.menu title="Blog" route="panel.blog.*">--}}
{{--            <x-layout.panel.menu title="Articles" route="panel.blog.article.index"/>--}}
{{--            <x-layout.panel.menu title="Companies" route="panel.blog.company.index"/>--}}
{{--            <x-layout.panel.menu title="Files" route="panel.blog.file.index"/>--}}
{{--            </x-layout.panel.menu>--}}
{{--        </ul>--}}

        <ul>
            <x-layout.panel.menu title="Notice Of Sale" route="panel.noticeOfSale.*">
            <x-layout.panel.menu title="Notice List" route="panel.noticeOfSale.list.index"/>
            <x-layout.panel.menu title="Companies" route="panel.noticeOfSale.company.index"/>
            </x-layout.panel.menu>
        </ul>


        <ul>
            @php
                $countUserAuthRequests = \App\Models\User::whereNotNull('ssn')
                ->whereNotNull('birthdate')->where('certified', false)->get()->count();
            @endphp
            <x-layout.panel.menu title="Users" route="panel.user.index" :badge="$countUserAuthRequests"/>
            {{--
            <x-layout.panel.menu title="Roles & Permissions management" route="panel.role.*">
                <x-layout.panel.menu title="Roles" route="panel.role.index"/>
                <x-layout.panel.menu title="Permissions" route="panel.permission.index"/>
            </x-layout.panel.menu>
            --}}
        </ul>
    </div>
</aside>
{{--Sidebar - Mobile Shadow--}}
<div v-if="navigation.opened" @click.prevent="navigation.opened = !navigation.opened"
     class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-30"></div>
