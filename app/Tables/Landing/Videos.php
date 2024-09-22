<?php

namespace App\Tables\Landing;

use App\Models\LandSlide;
use App\Models\LandVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class Videos extends AbstractTable
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
                        ->orWhere('alt', 'LIKE', "%{$value}%");
                });
            });
        });

        return QueryBuilder::for(LandVideo::class)
            ->defaultSort('-id')
            ->allowedSorts(['id', 'alt', 'published_at', 'expired_at'])
            ->allowedFilters(['alt', $globalSearch]);
    }

    public function configure(SpladeTable $table)
    {
        //$table->withGlobalSearch(columns: ['id', 'alt']);

        /** Columns */
        $table->column(
            key: 'id',
            label: __('Id'),
            hidden: true,
            sortable: true,
        //searchable: true,
        //highlight: true,
        //exportAs: false,
        );

        $table->column(
            key: 'video',
            label: __('Video'),
        //hidden: true,
        //sortable: true,
        //searchable: true,
        //highlight: true,
        //exportAs: false,
        );

        $table->column(
            key: 'alt',
            label: __('Alternative text'),
            hidden: true,
        //sortable: true,
        //searchable: true,
        //highlight: true,
        //exportAs: false,
        );

        $table->column(
            key: 'land.title',
            label: __('Landing'),
            hidden: true,
            sortable: true,
            searchable: true,
        //highlight: true
        //exportAs: false,
        );

        $table->column(
            key: 'published_at',
            label: __('Publish date'),
            hidden: true,
            sortable: true,
        //searchable: true,
        //highlight: true,
        //exportAs: false,
        );

        $table->column(
            key: 'expired_at',
            label: __('Expire date'),
            hidden: true,
            sortable: true,
        //searchable: true,
        //highlight: true,
        //exportAs: false,
        );

        $table->column(
            key: 'view',
            label: __('View'),
            hidden: true,
            sortable: true,
        //searchable: true,
        //highlight: true,
        //exportAs: false,
        );

        $table->column(
            key: 'status',
            label: __('Status'),
            //hidden: true,
            sortable: true,
            searchable: true,
        //highlight: true,
        //exportAs: false,
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
            exportAs: false,
        );

        /** Columns */
        $table->paginate();


    }
}
