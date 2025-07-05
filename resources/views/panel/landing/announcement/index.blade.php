@php use App\Enum\AnnouncementPageEnum; @endphp
@php use App\Enum\AnnouncementTypeEnum; @endphp

<x-layout.admin>

    <x-splade-table :for="$items"
                    :primaryLink="route('panel.landing.announcement.create')"
                    :title="__('Announcement list')"
                    pagination-scroll="preserve"
    >
        <x-layout.panel.timestamps/>

        @cell('type', $item)
        @switch($item->type)
            @case(AnnouncementTypeEnum::CALL)
                <span>{{ AnnouncementTypeEnum::CALL->label() }}</span>
                @break
            @case(AnnouncementTypeEnum::LINK)
                <span>{{ AnnouncementTypeEnum::LINK->label() }}</span>
                @break
            @default
                <span>{{ __('unknown') }}</span>
        @endswitch
        @endcell

        @cell('page', $item)
        @switch($item->page)
            @case(AnnouncementPageEnum::HOME_DESKTOP)
                <span>{{ AnnouncementPageEnum::HOME_DESKTOP->label() }}</span>
                @break
            @case(AnnouncementPageEnum::HOME_MOBILE)
                <span>{{ AnnouncementPageEnum::HOME_MOBILE->label() }}</span>
                @break
            @case(AnnouncementPageEnum::PRODUCT_LIST_DESKTOP)
                <span>{{ AnnouncementPageEnum::PRODUCT_LIST_DESKTOP->label() }}</span>
                @break
            @case(AnnouncementPageEnum::PRODUCT_LIST_MOBILE)
                <span>{{ AnnouncementPageEnum::PRODUCT_LIST_MOBILE->label() }}</span>
                @break
            @case(AnnouncementPageEnum::PRODUCT_SINGLE)
                <span>{{ AnnouncementPageEnum::PRODUCT_SINGLE->label() }}</span>
                @break
            @case(AnnouncementPageEnum::ARTICLE_LIST_DESKTOP)
                <span>{{ AnnouncementPageEnum::ARTICLE_LIST_DESKTOP->label() }}</span>
                @break
            @case(AnnouncementPageEnum::ARTICLE_LIST_MOBILE)
                <span>{{ AnnouncementPageEnum::ARTICLE_LIST_MOBILE->label() }}</span>
                @break
            @case(AnnouncementPageEnum::ARTICLE_SINGLE_DESKTOP)
                <span>{{ AnnouncementPageEnum::ARTICLE_SINGLE_DESKTOP->label() }}</span>
                @break
            @case(AnnouncementPageEnum::ARTICLE_SINGLE_MOBILE)
                <span>{{ AnnouncementPageEnum::ARTICLE_SINGLE_MOBILE->label() }}</span>
                @break
            @case(AnnouncementPageEnum::ARTICLE_SINGLE_TOC)
                <span>{{ AnnouncementPageEnum::ARTICLE_SINGLE_TOC->label() }}</span>
                @break
            @case(AnnouncementPageEnum::ABOUT_US_DESKTOP)
                <span>{{ AnnouncementPageEnum::ABOUT_US_DESKTOP->label() }}</span>
                @break
            @case(AnnouncementPageEnum::ABOUT_US_MOBILE)
                <span>{{ AnnouncementPageEnum::ABOUT_US_MOBILE->label() }}</span>
                @break
            @case(AnnouncementPageEnum::AGENCY)
                <span>{{ AnnouncementPageEnum::AGENCY->label() }}</span>
                @break
            @case(AnnouncementPageEnum::TERMS_OF_SALE_DESKTOP)
                <span>{{ AnnouncementPageEnum::TERMS_OF_SALE_DESKTOP->label() }}</span>
                @break
            @case(AnnouncementPageEnum::TERMS_OF_SALE_MOBILE)
                <span>{{ AnnouncementPageEnum::TERMS_OF_SALE_MOBILE->label() }}</span>
                @break
            @case(AnnouncementPageEnum::TERMS_OF_SALE_TOC)
                <span>{{ AnnouncementPageEnum::TERMS_OF_SALE_TOC->label() }}</span>
                @break
            @default
                <span>{{ __('unknown') }}</span>
        @endswitch
        @endcell

        @cell('action', $item)
        <x-layout.panel.more-buttons>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.edit table="landing.announcement" :item="$item"/>
            </div>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.destroy table="landing.announcement" :item="$item"/>
            </div>
        </x-layout.panel.more-buttons>
        @endcell

    </x-splade-table>

</x-layout.admin>
