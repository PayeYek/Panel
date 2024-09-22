<?php

namespace App\Tables;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\AbstractTable;
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
                        ->orWhere('comments.comment', 'LIKE', "%{$value}%")
                        ->orWhereHas('commentable', function ($query) use ($value) {
                            $query->where('title', 'LIKE', "%{$value}%");
                        })
                        ->orWhereHas('user', function ($query) use ($value) {
                            $query->where('name', 'LIKE', "%{$value}%")
                                ->orWhere('family', 'LIKE', "%{$value}%");
                        });

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

        $userFilter = AllowedFilter::callback('user_id', function ($query, $value) {
            $query->whereHas('user', function ($query) use ($value) {
                $query->where('id', $value);
            });
        });

        return QueryBuilder::for(Comment::class)
            ->with(['user', 'commentable'])
            ->defaultSort('approved', '-id')
            ->allowedSorts(['id', 'approved', 'star', 'comment'])
            ->allowedFilters([
                'approved',
                'star',
                'comment',
                $globalSearch,
                //$commentableFilter,
                $userFilter
            ]);
    }

    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch(columns: ['id', 'comment', 'star', 'user.name', 'user.family'])
            ->column('id', label: __('Id'), hidden: true, sortable: true)
            ->column('view', label: __('Comment'))
            ->column('comment', label: __('Text'), hidden: true, sortable: true, searchable: true)
            ->column('star', label: __('Star'), hidden: true, sortable: true)
            ->column('approved', label: __('Status'), sortable: true)
            ->column('created_at', label: __('Create date'), hidden: true, sortable: true)
            ->column('updated_at', label: __('Update date'), hidden: true, sortable: true)
            ->column('action', label: __('Actions'), exportAs: false)
            ->paginate();

        $table->selectFilter('star', [
            '1' => 1 . ' ' . __('Star'),
            '2' => 2 . ' ' . __('Star'),
            '3' => 3 . ' ' . __('Star'),
            '4' => 4 . ' ' . __('Star'),
            '5' => 5 . ' ' . __('Star'),
        ], label: __('Star'));

        $table->selectFilter('approved', [
            '0' => __('Unconfirmed'),
            '1' => __('Published'),
        ], label: __('Status'));

    }
}
