<?php

namespace App\Tables;

use App\Models\Announce;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class AnnounceTable extends AbstractTable
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

        $stateFilter = AllowedFilter::callback('status', function ($query, $value) {
            $query->where('status', $value);
        });


        return QueryBuilder::for(Announce::class)
            ->defaultSort('-id')
            ->allowedSorts([
                'id',
                'title',
                'status'
            ])
            ->allowedFilters([
                'title',
                $stateFilter,
                $globalSearch
            ]);
    }

    public function configure(SpladeTable $table): void
    {
        $table->withGlobalSearch(columns: ['id', 'title']);

//        $table->selectFilter('state', options: [
//            ['name' => __('Active'), 'value' => 1],
//            ['name' => __('Inactive'), 'value' => 0],
//        ], label: __('State')
//        );

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
            key: 'title',
            label: __('Title'),
        //  sortable: true,
        //  searchable: true,
        //  highlight: true,
        //  exportAs: false,
        );


        $table->column(
            key: 'status',
            label: __('State'),
            //  hidden: true,
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
