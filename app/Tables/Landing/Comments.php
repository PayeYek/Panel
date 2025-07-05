<?php

namespace App\Tables\Landing;

use App\Models\LandComment;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class Comments extends AbstractTable
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
                        ->orWhere('name', 'LIKE', "%{$value}%")
                        ->orWhere('comment', 'LIKE', "%{$value}%")
                        ->orWhere('phone', 'LIKE', "%{$value}%")
                        ->orWhere('email', 'LIKE', "%{$value}%")
                    ;

                });
            });
        });

//        $commentableFilter = AllowedFilter::callback('commentable', function ($query, $value) {
//            $query->where(function($query) use ($value) {
//                $query->where(function($query) use ($value) {
//                    $query->where('commentable_type', LandProduct::class)
//                        ->where('commentable_id', $value);
//                });
//            });
//        });

        return QueryBuilder::for(LandComment::class)
            ->defaultSort('approved', '-id')
            ->allowedSorts(['id', 'approved', 'name', 'phone', 'email', 'comment'])
            ->allowedFilters([
                'approved',
                'name',
                'comment',
                'phone', 'email',
                $globalSearch,
                //$commentableFilter,
            ]);
    }

    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch(columns: ['id', 'comment', 'star'])
            ->column('id', label: __('Id'), hidden: true, sortable: true)
            ->column('name', label: __('Full name'), sortable: true, searchable: true)
            ->column('phone', label: __('Phone'), sortable: true, searchable: true)
            ->column('email', label: __('Email'), sortable: true, searchable: true)
            ->column('comment', label: __('Text'), hidden: true, sortable: true, searchable: true)
            ->column('approved', label: __('Status'), sortable: true)
            ->column('created_at', label: __('Create date'), hidden: true, sortable: true)
            ->column('updated_at', label: __('Update date'), hidden: true, sortable: true)
//            ->column('action', label: __('Actions'), exportAs: false)
                        ->export()
            ->bulkAction(
                label: 'Delete Selected User',
                each: fn(LandComment $landComment) => $landComment->delete(),
                after: fn() => Toast::danger(__('The selected options are deleted.'))->autoDismiss(5),
                confirm: 'Touch projects',
                confirmText: 'Are you sure you want to touch the projects?',
                confirmButton: 'Yes, touch all selected rows!',
                cancelButton: 'No, do not touch!',
            )
            ->paginate();




        $table->selectFilter('approved', [
            '0' => __('Unconfirmed'),
            '1' => __('Published'),
        ], label: __('Status'));

    }
}
