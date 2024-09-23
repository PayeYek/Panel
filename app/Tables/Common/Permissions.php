<?php

namespace App\Tables\Common;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\Permission\Models\Permission;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class Permissions extends AbstractTable
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
                        ->orWhere('name', 'LIKE', "%{$value}%");
                });
            });
        });

        return QueryBuilder::for(Permission::class)
            ->defaultSort('-id')
            ->allowedSorts(['id', 'name', 'created_at', 'state'])
            ->allowedFilters(['name', $globalSearch]);
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
            key: 'name',
            label: __('Name'),
            //hidden: true,
            sortable: true,
            searchable: true,
        //highlight: true,
        //exportAs: false,
        );
        $table->column(
            key: 'created_at',
            label: __('Create date'),
//            hidden: true,
            sortable: true,
//            searchable: true,
        //highlight: true,
        //exportAs: false,
        );
        $table->column(
            key: 'updated_at',
            label: __('Update date'),
//            hidden: true,
            sortable: true,
//            searchable: true,
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
