<?php

namespace App\Tables\Landing;

use App\Models\CustomerFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CustomerFeedbacks extends AbstractTable
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
                        ->orWhere('purchased_product', 'LIKE', "%{$value}%")
                        ->orWhere('city', 'LIKE', "%{$value}%");
                });
            });
        });

        return QueryBuilder::for(CustomerFeedback::class)
            ->with('land')
            ->defaultSort('-id')
            ->allowedSorts(['id', 'priority', 'city', 'purchased_product', 'created_at', 'updated_at'])
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
//        searchable: true,
        //highlight: true,
        //exportAs: false,
        );

        $table->column(
            key: 'last_name',
            label: __('Last Name'),
//            hidden: true,
            sortable: true,
//        searchable: true,
        //highlight: true,
        //exportAs: false,
        );
        $table->column(
            key: 'title',
            label: __('Title'),
            hidden: true,
        //sortable: true,
        //searchable: true,
        //highlight: true,
        //exportAs: false,
        );

        $table->column(
            key: 'description',
            label: __('Description'),
            hidden: true,
        //sortable: true,
        //searchable: true,
        //highlight: true,
        //exportAs: false,
        );

        $table->column(
            key: 'city',
            label: __('City'),
            hidden: true,
            sortable: true,
            searchable: true,
        //highlight: true
        //exportAs: false,
        );

        $table->column(
            key: 'purchased_product',
            label: __('Purchased Product'),
            hidden: true,
            sortable: true,
            searchable: true,
        //highlight: true,
        //exportAs: false,
        );


        $table->column(
            key: 'land.title',
            label: __('Land title'),
            //hidden: true,
            sortable: true,
            searchable: true,
        //highlight: true,
        //exportAs: false,
        );

        $table->column(
            key: 'priority',
            label: __('Order of display'),
//            hidden: true,
            sortable: true,
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
