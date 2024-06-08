{{--SIDEBAR--}}
<aside
    :class="navigation.opened ? 'translate-x-0' : 'ltr:translate-x-[-100%] rtl:translate-x-[100%]'"
    class="fixed top-0 ltr:left-0 rtl:right-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 ltr:md:translate-x-0 rtl:md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
>
    <div
        class="scrollbar-thin scrollbar-thumb-gray-200 scrollbar-track-white dark:scrollbar-thumb-gray-700 dark:scrollbar-track-gray-800 overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">

        <ul class="space-y-2">
            <x-layout.panel.menu title="Dashboard" icon="iconsax-bol-home-hashtag"
                                 route="panel.dashboard"/>

            {{--            <x-layout.panel.menu title="Orders" icon="iconsax-bol-receipt-2-1"/>--}}
        </ul>
        <ul class="pt-5 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700">


            {{--AD SERVICES--}}
            <x-layout.panel.menu title="Ad Service" route="panel.ad.*" icon="iconsax-bol-note-2">
                {{--                <x-layout.panel.menu title="Advertise" route="panel.ad.advertise.index" icon="iconsax-lin-book"/>--}}
                <x-layout.panel.menu title="Advertise" route="panel.ad.advertise.index" icon="iconsax-lin-book"/>
                <x-layout.panel.menu title="Usages" route="panel.ad.usage.index" icon="iconsax-lin-book"/>
                <x-layout.panel.menu title="Categories" route="panel.ad.category.index" icon="iconsax-lin-book"/>
                <x-layout.panel.menu title="Colors" route="panel.ad.color.index" icon="iconsax-lin-book"/>
                <x-layout.panel.menu title="Specifications" route="panel.ad.specification.index"
                                     icon="iconsax-lin-book"/>
                <x-layout.panel.menu title="Price List" route="panel.ad.priceList.index" icon="iconsax-lin-book"/>
                {{--                <x-layout.panel.menu title="Brands-Models" route="panel.ad.brand-model.index" icon="iconsax-lin-book"/>--}}
            </x-layout.panel.menu>

            {{--LANDING--}}
            <x-layout.panel.menu title="Landing page" route="panel.landing.*" icon="iconsax-bol-note-2">
                <x-layout.panel.menu title="Pages" route="panel.landing.land.index" icon="iconsax-lin-note-2"/>
                <x-layout.panel.menu title="Slides" route="panel.landing.slide.index"
                                     icon="iconsax-lin-slider-horizontal"/>
                <x-layout.panel.menu title="Comments" route="panel.landing.comment.index" icon="iconsax-lin-shop"/>
                <x-layout.panel.menu title="Agencies" route="panel.landing.agency.index" icon="iconsax-lin-shop"/>
                <x-layout.panel.menu title="Articles" route="panel.landing.article.index" icon="iconsax-lin-book"/>
                <x-layout.panel.menu title="Facilities" route="panel.landing.facility.index" icon="iconsax-lin-book"/>
                <x-layout.panel.menu title="Videos" route="panel.landing.video.index" icon="iconsax-lin-video-square"/>
                <x-layout.panel.menu title="Files" route="panel.landing.file.index" icon="iconsax-lin-document-upload"/>
                <x-layout.panel.menu title="Customer feedback" route="panel.landing.customer-feedback.index"
                                     icon="iconsax-lin-document-upload"/>
                <x-layout.panel.menu title="Sales expert" route="panel.landing.sales-expert.index"
                                     icon="iconsax-lin-document-upload"/>
                <x-layout.panel.menu title="Announcement" route="panel.landing.announcement.index"
                                     icon="iconsax-lin-document-upload"/>
                <x-layout.panel.menu title="Products" route="panel.landing.product.*" icon="iconsax-bol-box">
                    <x-layout.panel.menu title="Attributes" route="panel.landing.product.attribute.index"
                                         icon="iconsax-lin-mask"/>
                    <x-layout.panel.menu title="Colors" route="panel.landing.product.color.index"
                                         icon="iconsax-lin-paintbucket"/>
                    <x-layout.panel.menu title="Brands" route="panel.landing.product.brand.index"
                                         icon="iconsax-lin-medal-star"/>
                    <x-layout.panel.menu title="Categories" route="panel.landing.product.category.index"
                                         icon="iconsax-lin-folder-2"/>
                    <x-layout.panel.menu title="Products" route="panel.landing.product.product.index"
                                         icon="iconsax-lin-box"/>
                </x-layout.panel.menu>

            </x-layout.panel.menu>
            {{--LANDING -- END --}}


            {{--PRODUCT--}}
            {{--<x-layout.panel.menu title="Product" icon="iconsax-bol-box" route="panel.product.*">
                <x-layout.panel.menu title="Products" route="panel.product.product.index" icon="iconsax-lin-box"/>
                <x-layout.panel.menu title="Categories" icon="iconsax-lin-folder-2"
                                     route="panel.product.category.index"/>

                <x-layout.panel.menu title="Varieties" icon="iconsax-bol-mask" route="panel.product.variety.*">
                    <x-layout.panel.menu title="Colors" icon="iconsax-lin-paintbucket"
                                         route="panel.product.variety.color.index"/>
                    <x-layout.panel.menu title="Sizes" icon="iconsax-lin-ruler"
                                         route="panel.product.variety.size.index"/>
                </x-layout.panel.menu>
            </x-layout.panel.menu>--}}
            {{--PRODUCT -- END --}}


            {{--INTERACTIONS--}}
            {{--@php
                $countComment = \App\Models\Comment::where('approved', 0)->count();
                $countContactUs = \App\Models\ContactUs::where('status', \App\Enums\ContactUsStatus::Waiting->value)->count();
                $countCooperation = \App\Models\Cooperation::where('status', \App\Enums\ContactUsStatus::Waiting->value)->count();
                $totalInteractions = $countComment + $countContactUs + $countCooperation;
            @endphp

            <x-layout.panel.menu title="Interactions" icon="iconsax-bol-messages-3" route="panel.interaction.*"
                                 :badge="$totalInteractions">
                <x-layout.panel.menu title="Comments" icon="iconsax-lin-message" route="panel.interaction.comment.index"
                                     :badge="$countComment"/>
                <x-layout.panel.menu title="Call request" icon="iconsax-lin-call-calling"
                                     route="panel.interaction.contact.index" :badge="$countContactUs"/>
                <x-layout.panel.menu title="Cooperation Request" icon="iconsax-lin-shop"
                                     route="panel.interaction.cooperation.index" :badge="$countCooperation"/>
            </x-layout.panel.menu>--}}
            {{--INTERACTIONS -- END --}}

            {{--MARKETING--}}
            {{--<x-layout.panel.menu title="Marketing" icon="iconsax-bol-flash-1" route="panel.marketing.*">
                <x-layout.panel.menu title="Campaigns" icon="iconsax-lin-ticket-discount"
                                     route="panel.marketing.campaign.index"/>
                <x-layout.panel.menu title="Banner slider" icon="iconsax-lin-scroll" route="panel.marketing.slider.index"/>
                <x-layout.panel.menu title="Cards" icon="iconsax-lin-voice-square" route="panel.marketing.card.index"/>
                <x-layout.panel.menu title="Middle banners" icon="iconsax-lin-mouse-square"
                                     route="panel.marketing.banner.index"/>
            </x-layout.panel.menu>--}}
            {{--MARKETING -- END --}}

            {{--CONTENT--}}
            {{--<x-layout.panel.menu title="Content" icon="iconsax-bol-note-text" route="panel.content.*">
                <x-layout.panel.menu title="Menus" icon="iconsax-lin-data-2" route="panel.content.menu.index"/>
                <x-layout.panel.menu title="Texts" icon="iconsax-lin-subtitle"/>

                <x-layout.panel.menu title="Pages" icon="iconsax-bol-document-text" route="panel.content.page.*">
                    <x-layout.panel.menu title="FAQ" icon="iconsax-lin-message-question"/>
                    <x-layout.panel.menu title="Rules" icon="iconsax-lin-judge"/>
                    <x-layout.panel.menu title="About us" icon="iconsax-lin-user-octagon"/>
                    <x-layout.panel.menu title="Cooperation" icon="iconsax-lin-shop"/>
                </x-layout.panel.menu>
            </x-layout.panel.menu>--}}
            {{--CONTENT -- END --}}

            {{--SETTINGS--}}
            {{--<x-layout.panel.menu title="Settings" icon="iconsax-bol-setting-2" route="panel.setting.*">
                <x-layout.panel.menu title="Price changes" icon="iconsax-lin-activity"/>
                <x-layout.panel.menu title="Costs" icon="iconsax-lin-buy-crypto"/>
                <x-layout.panel.menu title="Contact information" icon="iconsax-lin-call-incoming"/>
                <x-layout.panel.menu title="Social media" icon="iconsax-lin-share"/>
                <x-layout.panel.menu title="Licenses" icon="iconsax-lin-medal"/>
                <x-layout.panel.menu title="Logo" icon="iconsax-lin-crown-1"/>
                <x-layout.panel.menu title="Notices" icon="iconsax-lin-notification" icon="iconsax-lin-notification"/>
            </x-layout.panel.menu>--}}
            {{--SETTINGS -- END --}}

        </ul>
        <ul class="pt-5 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700">
            <x-layout.panel.menu title="Comments" route="panel.comment.index" icon="iconsax-bol-message"/>
        </ul>

        <ul class="pt-5 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700">
            <x-layout.panel.menu title="Users" icon="iconsax-bol-user" route="panel.user.index"/>
        </ul>

        <x-layout.panel.menu title="Roles & Permissions management" route="panel.role.*" icon="iconsax-bol-note-2">
            <x-layout.panel.menu title="Roles" route="panel.role.index" icon="iconsax-lin-book"/>
            <x-layout.panel.menu title="Permissions" route="panel.permission.index" icon="iconsax-lin-book"/>
        </x-layout.panel.menu>
    </div>
</aside>
{{--Sidebar - Mobile Shadow--}}
<div v-if="navigation.opened" @click.prevent="navigation.opened = !navigation.opened"
     class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-30"></div>
