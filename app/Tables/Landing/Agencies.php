<?php

namespace App\Tables\Landing;

use App\Models\Land;
use App\Models\LandAgency;
use App\Models\Province;
use App\Models\ProvinceCity;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class Agencies extends AbstractTable
{
    public function __construct()
    {
        //
    }

    public function authorize(Request $request)
    {
        return true;
    }

    public function for()
    {
        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query
                        ->orWhere('name', 'LIKE', "%{$value}%")
                        ->orWhere('code', 'LIKE', "%{$value}%")
                        ->orWhere('address', 'LIKE', "%{$value}%")
                        ->orWhere('description', 'LIKE', "%{$value}%")
                        ->orWhere('manager', 'LIKE', "%{$value}%");
                });
            });
        });

        return QueryBuilder::for(LandAgency::class)
            ->with(['land', 'province' , 'city'])
//            ->join('provinces', 'land_agencies.province_id', '=', 'provinces.id')
            ->defaultSort('-id')
            ->allowedSorts(['land.title', 'name', 'manager', 'code'])
            ->allowedFilters(['land_id', 'province_id', 'city_id', 'code', $globalSearch]);
    }

    public function configure(SpladeTable $table)
    {
//        $table->withGlobalSearch(columns: ['id', 'title', 'slug', 'body']);

        /** Columns */
        $table->column(
            key: 'id',
            label: __('Id'),
            hidden: true,
            sortable: true,
        );

        $table->column(
            key: 'land.title',
            label: __('Landing'),
            sortable: true,
        );

        $table->column(
            key: 'province.name',
            label: __('Province'),
            sortable: true,
        );

        $table->column(
            key: 'city.name',
            label: __('City'),
            sortable: true,
        );

        $table->column(
            key: 'code',
            label: __('Agency Code'),
            sortable: true,
        );

        $table->column(
            key: 'name',
            label: __('Name'),
            sortable: true,
        );

        $table->column(
            key: 'manager',
            label: __('Manager'),
            sortable: true,
        );

        // $table->column(
        //     key: 'address',
        //     label: __('Address'),
        // );

        /** Actions */
        $table->column(
            key: 'action',
            label: __('Actions'),
            exportAs: false,
        );

        /** Columns */
        $table->paginate();

        /** Filters */
        $table->selectFilter('land_id', Land::all()->mapWithKeys(function ($item) {
            return [$item->id => __($item->title)];
        })->toArray(), label: __('Landing'));

        $table->selectFilter('province_id', Province::all()->mapWithKeys(function ($item) {
            return [$item->id => __($item->name)];
        })->toArray(), label: __('Province'));

        $table->selectFilter('city_id', ProvinceCity::all()->mapWithKeys(function ($item) {
            return [$item->id => __($item->name)];
        })->toArray(), label: __('City'));
    }
}
