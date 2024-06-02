<?php

namespace App\Tables\Landing;

use App\Models\SalesExpert;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class SalesExperts extends AbstractTable
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
                        ->orWhere('first_name', 'LIKE', "%{$value}%")
                        ->orWhere('last_name', 'LIKE', "%{$value}%")
                        ->orWhere('expert_id', 'LIKE', "%{$value}%")
                        ->orWhere('phone', 'LIKE', "%{$value}%");
                });
            });
        });

        return QueryBuilder::for(SalesExpert::class)
            ->defaultSort('-id')
            ->allowedSorts(['id', 'first_name', 'last_name', 'created_at', 'updated_at'])
            ->allowedFilters([$globalSearch]);
    }

    public function configure(SpladeTable $table): void
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
            key: 'first_name',
            label: __('First Name'),
//            hidden: true,
            sortable: true,
            searchable: true,
        //highlight: true,
        //exportAs: false,
        );

        $table->column(
            key: 'last_name',
            label: __('Last Name'),
//            hidden: true,
            sortable: true,
            searchable: true,
        //highlight: true,
        //exportAs: false,
        );
        $table->column(
            key: 'expert_id',
            label: __('Expert ID'),
//            hidden: true,
            sortable: true,
            searchable: true,
        //highlight: true,
        //exportAs: false,
        );

        $table->column(
            key: 'phone',
            label: __('Phone'),
//            hidden: true,
            //sortable: true,
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
