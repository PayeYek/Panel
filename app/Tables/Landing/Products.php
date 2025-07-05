<?php

namespace App\Tables\Landing;

use App\Models\LandProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class Products extends AbstractTable
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
                        ->orWhere('description', 'LIKE', "%{$value}%")
                        ->orWhere('slug', 'LIKE', "%{$value}%");
                });
            });
        });

        return QueryBuilder::for(LandProduct::class)
            ->with('land')
            ->defaultSort('-id')
            ->allowedSorts(['id', 'name'])
            ->allowedFilters(['name', $globalSearch]);
    }

    public function configure(SpladeTable $table)
    {

        //$table->withGlobalSearch(columns: ['id', 'name', 'description', 'slug']);

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
            key: 'product',
            label: __('Product'),
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
            sortable: true,
            searchable: true,
            highlight: true
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
            key: 'model',
            label: __('Model'),
            hidden: true,
            sortable: true,
            searchable: true,
        //highlight: true,
        //exportAs: false,
        );

        $table->column(
            key: 'year',
            label: __('Year'),
            hidden: true,
            sortable: true,
            searchable: true,
        //highlight: true,
        //exportAs: false,
        );

        $table->column(
            key: 'slug',
            label: __('Slug'),
            hidden: true,
            sortable: true,
            searchable: true,
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

        /** Actions */
        $table->column(
            key: 'attribute',
            label: __('Attributes'),
            //canBeHidden: true,
            //hidden: true,
            //sortable: true,
            //searchable: true,
            //highlight: true,
            //classes: false,
            //alignment: 'right'
            exportAs: false,
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
