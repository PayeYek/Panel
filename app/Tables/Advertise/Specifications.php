<?php

namespace App\Tables\Advertise;

use App\Models\Specification;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class Specifications extends AbstractTable
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

        return QueryBuilder::for(Specification::class)
            ->defaultSort('-id')
            ->allowedSorts(['id', 'title'])
            ->allowedFilters(['title', $globalSearch]);
    }

    public function configure(SpladeTable $table): void
    {

        $table
            ->column('id', label: __('Id'), hidden: true, sortable: true)
            ->column('title', label: __('Title'), sortable: true, searchable: true)
            ->column('type', label: __('Type'), sortable: true)
            ->column('action', label: __('Actions'), exportAs: false)
            ->paginate();


    }
}
