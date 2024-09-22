<?php

namespace App\Tables\Landing;

use App\Models\LandAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class Attributes extends AbstractTable
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
                        ->orWhere('name', 'LIKE', "%{$value}%");
                });
            });
        });

        return QueryBuilder::for(LandAttribute::class)
            ->with('parent')
            ->defaultSort('-id')
            ->allowedSorts(['id', 'name'])
            ->allowedFilters(['name', $globalSearch]);
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
        //searchable: true,
        //highlight: true,
        //exportAs: false,
        );

        $table->column(
            key: 'attribute',
            label: __('Attribute'),
        hidden: false,
        //sortable: true,
        //searchable: true,
        //highlight: true,
        //exportAs: false,
        );
        $table->column(
            key: 'name',
            label: __('Name'),
            hidden:true,
            sortable: true,
            searchable: true,
            highlight: true,
        //exportAs: false,
        );
        $table->column(
            key: 'parent_id',
            label: __('Parent'),
            hidden: true,
            sortable: true,
            searchable: true,
            highlight: true,
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
