<?php

namespace App\Tables;

use App\Models\Blog\Article;
use App\Models\sale_notice;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class SalesNotice extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
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

        return QueryBuilder::for(sale_notice::class)
            ->with('company')
            ->defaultSort('-id')
            ->allowedSorts(['id', 'title', 'published_at', 'publish', 'pinned'])
            ->allowedFilters(['slug', 'title', 'body', $globalSearch]);
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        //        $table->withGlobalSearch(columns: ['id', 'title', 'slug', 'body']);

        /** Columns */
        $table->column(
            key: 'id',
            label: __('Id'),
            sortable: true,
        );
        $table->column(
            key: 'title',
            label: __('Title'),
            sortable: true,
            searchable: true,
            highlight: true,
        );
        $table->column(
            key: 'circularNo',
            label: __('circularNo'),
            sortable: true,
        );
        $table->column(
            key: 'slug',
            label: __('Slug'),
            sortable: true,
            searchable: true,
        );
        $table->column(
            key: 'expired_at',
            label: __('expired at'),
            sortable: true,
        );
        /** Actions */
        $table->column(
            key: 'action',
            label: __('Actions'),
            exportAs: false,
        );

        /** Columns */
        $table->paginate();
    }
}
