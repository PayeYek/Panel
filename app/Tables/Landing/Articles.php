<?php

namespace App\Tables\Landing;

use App\Models\LandArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class Articles extends AbstractTable
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
                        ->orWhere('title', 'LIKE', "%{$value}%")
                        ->orWhere('slug', 'LIKE', "%{$value}%")
                        ->orWhere('body', 'LIKE', "%{$value}%");
                });
            });
        });

        return QueryBuilder::for(LandArticle::class)
            ->with('land')
            ->defaultSort('-id')
            ->allowedSorts(['id', 'title', 'published_at', 'publish', 'pinned'])
            ->allowedFilters(['slug', 'title', 'body', $globalSearch]);
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
            key: 'article',
            label: __('Article'),
        //hidden: true,
        //sortable: true,
        //searchable: true,
        //highlight: true,
        //exportAs: false,
        );
        $table->column(
            key: 'published_at',
            label: __('Published date'),
            //hidden: true,
            sortable: true,
            searchable: true,
        //highlight: true,
        //exportAs: false,
        );
        $table->column(
            key: 'publish',
            label: __('Is published'),
            //hidden: true,
            sortable: true,
        //searchable: true,
        //highlight: true,
        //exportAs: false,
        );
        $table->column(
            key: 'pinned',
            label: __('Is pinned'),
//            hidden: true,
            sortable: true,
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
            key: 'slug',
            label: __('Slug'),
            hidden: true,
            sortable: true,
            searchable: true,
        //highlight: true,
        //exportAs: false,
        );
        $table->column(
            key: 'type',
            label: __('Type'),
        //hidden: true,
        //sortable: true,
        //searchable: true,
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
