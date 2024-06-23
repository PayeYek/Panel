<?php

namespace App\Tables\Advertise;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
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
                        ->orWhere('mobile', 'LIKE', "%{$value}%");
                });
            });
        });

        return QueryBuilder::for(Ad::class)
            ->with(['category', 'user'])
            ->defaultSort('-id')
            ->allowedSorts(['id', 'title', 'created_at', 'updated_at', 'published_at', 'state'])
            ->allowedFilters(['title', $globalSearch]);
    }

    public function configure(SpladeTable $table): void
    {
        $table->withGlobalSearch(columns: ['id', 'title', 'mobile']);

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
