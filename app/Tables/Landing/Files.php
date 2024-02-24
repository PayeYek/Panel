<?php

namespace App\Tables\Landing;

use App\Models\LandFile;
use App\Models\LandVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class Files extends AbstractTable
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
                        ->Where('name', 'LIKE', "%{$value}%")
                        ->orWhere('size', 'LIKE', "%{$value}%")
                        ->orWhere('type', 'LIKE', "%{$value}%")
                        ->orWhere('path', 'LIKE', "%{$value}%");
                });
            });
        });

        return QueryBuilder::for(LandFile::class)
            ->defaultSort('-id')
            ->allowedSorts([
                'id',
                'name',
                'size',
                'type',
                'path',
                'published_at',
                'expired_at'
            ])
            ->allowedFilters([
                'name',
                'size',
                'type',
                'path',
                $globalSearch
            ]);
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
            key: 'file',
            label: __('File'),
        //hidden: true,
        //sortable: true,
        //searchable: true,
        //highlight: true,
        //exportAs: false,
        );

        $table->column(
            key: 'copy',
            label: __('Copy'),
        //hidden: true,
        //sortable: true,
        //searchable: true,
        //highlight: true,
        //exportAs: false,
        );

        $table->column(
            key: 'name',
            label: __('Name'),
            hidden: true,
        //sortable: true,
        //searchable: true,
        //highlight: true,
        //exportAs: false,
        );

        $table->column(
            key: 'type',
            label: __('Type'),
            hidden: true,
        //sortable: true,
        //searchable: true,
        //highlight: true
        //exportAs: false,
        );

        $table->column(
            key: 'size',
            label: __('Size'),
            hidden: true,
        //sortable: true,
        //searchable: true,
        //highlight: true
        //exportAs: false,
        );

        $table->column(
            key: 'path',
            label: __('Path'),
            hidden: true,
        //sortable: true,
        //searchable: true,
        //highlight: true
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
