<?php

namespace App\Tables\Advertise;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class Categories extends AbstractTable
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
                        ->orWhere('title', 'LIKE', "%{$value}%");
                });
            });
        });

        return QueryBuilder::for(Category::class)
            ->with('children')
            ->defaultSort('-id')
            ->allowedSorts(['id', 'title'])
            ->allowedFilters(['title', $globalSearch]);
    }

    public function configure(SpladeTable $table): void
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
            key: 'category',
            label: __('Category'),
            hidden: false,
        //sortable: true,
        //searchable: true,
        //highlight: true,
        //exportAs: false,
        );
        $table->column(
            key: 'title',
            label: __('Title'),
            hidden: true,
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
