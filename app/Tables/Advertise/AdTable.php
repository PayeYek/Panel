<?php

namespace App\Tables\Advertise;

use App\Enum\AdvertiseStateEnum;
use App\Models\Ad;
use App\Models\Province;
use App\Support\Help;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class AdTable extends AbstractTable
{
    public function authorize(Request $request): true
    {
        return true;
    }

    public function for()
    {
        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query
                        ->orWhere('title', 'LIKE', "%{$value}%")
                        ->orWhere('description', 'LIKE', "%{$value}%")
                        ->orWhere('tracking_code', 'LIKE', "%{$value}%")
                        ->orWhere('mobile', 'LIKE', "%{$value}%");
                });
            });
        });

        $stateFilter = AllowedFilter::callback('state', function ($query, $value) {
            $query->where('state', $value);
        });

        $agreementFilter = AllowedFilter::callback('agreement', function ($query, $value) {
            $query->where('agreement', $value);
        });

        $exchangeFilter = AllowedFilter::callback('exchange', function ($query, $value) {
            $query->where('exchange', $value);
        });

        $provinceFilter = AllowedFilter::callback('province_id', function ($query, $value) {
            $query->where('province_id', $value);
        });

        $cityFilter = AllowedFilter::callback('city_id', function ($query, $value) {
            $query->where('city_id', $value);
        });


        return QueryBuilder::for(Ad::class)
            ->with(['category', 'user', 'province.cities'])
            ->defaultSort('-id')
            ->allowedSorts([
                'id',
                'title',
                'price',
                'province_id',
                'city_id',
                'created_at',
                'updated_at',
                'published_at',
                'state'
            ])
            ->allowedFilters([
                'title',
                $stateFilter,
                $agreementFilter,
                $exchangeFilter,
                $provinceFilter,
                $cityFilter,
                $globalSearch
            ]);
    }

    public function configure(SpladeTable $table): void
    {
        $table->withGlobalSearch(columns: ['id', 'title', 'mobile', 'tracking_code']);

        $table->selectFilter('state', options: collect(AdvertiseStateEnum::cases())->pluck('name', 'value')->map(function ($value) {
            return __(Str::lower($value));
        })->toArray(), label: __('State')
        );

        $table->selectFilter('province_id', options: Province::get()->pluck('name', 'id')->toArray(), label: __('Province')
        );

        $table->selectFilter('agreement', options: [0 => __('No'), 1 => __('Yes')], label: __('Agreement'));

        $table->selectFilter('exchange', options: [0 => __('No'), 1 => __('Yes')], label: __('Exchange'));

        //$table->selectFilter('city_id', label: __('City'),options:
        //    ProvinceCity::get()->pluck('name', 'id')->toArray()
        //);

        /** Columns */
        $table->column(
            key: 'id',
            label: __('Id'),
            hidden: true,
            sortable: true,
        //  searchable: true,
        //  highlight: true,
        //  exportAs: false,
        );

        $table->column(
            key: 'advertise',
            label: __('Advertise'),
        //  hidden: true,
        //  sortable: true,
        //  searchable: true,
        //  highlight: true,
        //  exportAs: false,
        );

        $table->column(
            key: 'title',
            label: __('Title'),
            hidden: true,
        //  sortable: true,
        //  searchable: true,
        //  highlight: true,
        //  exportAs: false,
        );

        $table->column(
            key: 'description',
            label: __('Description'),
            hidden: true,
        //  sortable: true,
        //  searchable: true,
        //  highlight: true,
        //  exportAs: false,
        );


        $table->column(
            key: 'state',
            label: __('State'),
            //  hidden: true,
            sortable: true,
        //  searchable: true,
        //  highlight: true,
        //  exportAs: false,
        );

        $table->column(
            key: 'category.title',
            label: __('Category'),
        //  hidden: true,
        //  sortable: true,
        //  searchable: true,
        //  highlight: true,
        //  exportAs: false,
        );

        $table->column(
            key: 'province.name',
            label: __('Province'),
            hidden: true,
        //  sortable: true,
        //  searchable: true,
        //  highlight: true,
        //  exportAs: false,
        );

        $table->column(
            key: 'city.name',
            label: __('City'),
            hidden: true,
        //  sortable: true,
        //  searchable: true,
        //  highlight: true,
        //  exportAs: false,
        );

        $table->column(
            key: 'price',
            label: __('Price'),
            hidden: true,
            sortable: true,
            alignment: Help::isRTL() ? 'right' : 'left',
        //  searchable: true,
        //  highlight: true,
        //  exportAs: false,
        );

        $table->column(
            key: 'tracking_code',
            label: __('Tracking code'),
            hidden: true,
            sortable: true,
            alignment: Help::isRTL() ? 'right' : 'left',
        //  searchable: true,
        //  highlight: true,
        //  exportAs: false,
        );


        $table->column(
            key: 'published_at',
            label: __('Publish date'),
            hidden: true,
            sortable: true,
        //  searchable: true,
        //  highlight: true,
        //  exportAs: false,
        );

        $table->column(
            key: 'created_at',
            label: __('Create date'),
            hidden: true,
            sortable: true,
        //  searchable: true,
        //  highlight: true,
        //  exportAs: false,
        );
        $table->column(
            key: 'updated_at',
            label: __('Update date'),
            hidden: true,
            sortable: true,
        //  searchable: true,
        //  highlight: true,
        //  exportAs: false,
        );

        /** Actions */
        $table->column(
            key: 'action',
            label: __('Actions'),
        //canBeHidden: true,
        //hidden: true,
        //sortable: true,
        //searchable: true,
        //highlight: true,
        //classes: false,
        //alignment: 'right'
        //exportAs: false,
        );

        /** Columns */
        $table->paginate(50);

    }
}
