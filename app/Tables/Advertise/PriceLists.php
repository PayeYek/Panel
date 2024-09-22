<?php

namespace App\Tables\Advertise;

use App\Models\PriceList;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class PriceLists extends AbstractTable
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
                        ->orWhere('product_name', 'LIKE', "%{$value}%")
//                        ->orWhere('category', 'LIKE', "%{$value}%")
                        ->orWhere('production_year', 'LIKE', "%{$value}%");
                });
            });
        });

        return QueryBuilder::for(PriceList::class)
            ->with('category')
            ->defaultSort('-id')
            ->allowedSorts(['id', 'product_name', 'price', 'created_at', 'updated_at'])
            ->allowedFilters(['product_name', 'production_year', 'category.title', $globalSearch]);
    }

    public function configure(SpladeTable $table): void
    {
        $table->withGlobalSearch(columns: ['id', 'product_name', 'production_year', 'category.title']);

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
            key: 'product_name',
            label: __('Product name'),
            //hidden: true,
            sortable: true,
            searchable: true,
        //highlight: true,
        //exportAs: false,
        );

        $table->column(
            key: 'production_year',
            label: __('Production Year'),
//            hidden: true,
            //sortable: true,
            searchable: true,
        //highlight: true,
        //exportAs: false,
        );

        $table->column(
            key: 'price',
            label: __('Price'),
            //hidden: true,
            sortable: true,
//            searchable: true,
        //highlight: true,
        //exportAs: false,
        );

        $table->column(
            key: 'category.title',
            label: __('Category'),
            hidden: true,
        //sortable: true,
            searchable: true,
        //highlight: true,
        //exportAs: false,
        );

        $table->column(
            key: 'created_at',
            label: __('Create date'),
            hidden: true,
            sortable: true,
//            searchable: true,
        //highlight: true,
        //exportAs: false,
        );

        $table->column(
            key: 'updated_at',
            label: __('Update date'),
            hidden: true,
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
