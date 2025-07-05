<?php

namespace App\Tables\Landing;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class Announcements extends AbstractTable
{
    public function __construct()
    {
        //
    }

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
                        ->orWhere('description', 'LIKE', "%{$value}%");
                });
            });
        });
        return QueryBuilder::for(Announcement::class)
            ->with('land')
            ->defaultSort('-id')
            ->allowedSorts(['id'])
            ->allowedFilters(['type', 'land.title', 'description', 'page', 'type', $globalSearch]);

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
            key: 'title',
            label: __('Title'),
            //hidden: true,
            //sortable: true,
            searchable: true,
        //highlight: true,
        //exportAs: false,
        );
        $table->column(
            key: 'description',
            label: __('Description'),
            hidden: true,
            //sortable: true,
            searchable: true,
        //highlight: true,
        //exportAs: false,
        );
        $table->column(
            key: 'land.title',
            label: __('Land title'),
//            hidden: true,
//        sortable: true,
            searchable: true,
        //highlight: true,
        //exportAs: false,
        );
        $table->column(
            key: 'page',
            label: __('Page'),
//            hidden: true,
            sortable: true,
            searchable: true,
//            highlight: true,
        //exportAs: false,
        );
        $table->column(
            key: 'type',
            label: __('Type'),
            hidden: true,
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
