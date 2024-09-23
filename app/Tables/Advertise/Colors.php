<?php

namespace App\Tables\Advertise;

use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class Colors extends AbstractTable
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
                        ->orWhere('name', 'LIKE', "%{$value}%")
                        ->orWhere('title', 'LIKE', "%{$value}%");
                });
            });
        });

        return QueryBuilder::for(Color::class)
            ->defaultSort('-id')
            ->allowedSorts(['id', 'name', 'title'])
            ->allowedFilters(['name', 'title', $globalSearch]);
    }

    public function configure(SpladeTable $table)
    {

        $table
            //->withGlobalSearch(columns: ['id', 'name', 'title'])
            ->column('id', label: __('Id'), sortable: true, hidden: true)
            ->column('color', label: __('Color'))
            ->column('title', label: __('Title'), sortable: true, hidden: true, searchable: true)
            ->column('name', label: __('Name'), sortable: true, hidden: true, searchable: true)
            ->column('action', label: __('Actions'), exportAs: false)
            ->paginate();


    }
}
