<?php

namespace App\Tables\Landing;

use App\Models\LandFacility;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class Facility extends AbstractTable
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
                        ->orWhere('full_name', 'LIKE', "%{$value}%")
                        ->orWhere('phone', 'LIKE', "%{$value}%");
                });
            });
        });

        return QueryBuilder::for(LandFacility::class)
            ->with('land')
            ->defaultSort('-id')
            ->allowedSorts(['id', 'state'])
            ->allowedFilters(['state', 'full_name', 'phone', $globalSearch]);
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
//            searchable: true,
            //highlight: true,
            exportAs: false,
        );

        $table->column(
            key: 'full_name',
            label: __('Full name'),
            searchable: true,
//            hidden: true,
//            sortable: true,
            //highlight: true,
            exportAs: false,
        );

        $table->column(
            key: 'phone',
            label: __('Phone'),
            searchable: true,
            //hidden: true,
            //sortable: true,
            //highlight: true,
            exportAs: false,
        );
        $table->column(
            key: 'land.title',
            label: __('Land title'),
            hidden: true,
//            sortable: true,
//            searchable: true,
//            highlight: true,
            exportAs: false,
        );
        $table->column(
            key: 'product.name',
            label: __('Product name'),
            hidden: true,
//            sortable: true,
//            searchable: true,
            //highlight: true,
            exportAs: false,
        );
        $table->column(
            key: 'amount',
            label: __('Amount'),
//            hidden: true,
//            sortable: true,
//            searchable: true,
            //highlight: true,
            exportAs: false,
        );
        $table->column(
            key: 'state',
            label: __('State'),
//            hidden: true,
            sortable: true,
//            searchable: true,
            //highlight: true,
            exportAs: false,
        );
        $table->column(
            key: 'comment',
            label: __('Comment'),
            hidden: true,
//            sortable: true,
//            searchable: true,
            //highlight: true,
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
