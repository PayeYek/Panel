<?php

namespace App\Tables;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use function Symfony\Component\Translation\t;

class Users extends AbstractTable
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
                        ->orWhere('family', 'LIKE', "%{$value}%")
                        ->orWhere('username', 'LIKE', "%{$value}%")
                        ->orWhere('phone', 'LIKE', "%{$value}%")
                        ->orWhere('email', 'LIKE', "%{$value}%");
                });
            });
        });

        return QueryBuilder::for(User::class)
//            ->withCount('orders')
            ->defaultSort('-id')
            ->allowedSorts(['id', 'name', 'family', 'username', 'phone', 'email', 'created_at', 'updated_at'])
            ->allowedFilters(['name', 'family', 'phone', 'gender', $globalSearch]);
    }

    public function configure(SpladeTable $table)
    {

        $table
            ->withGlobalSearch(columns: ['id', 'name', 'family', 'username', 'mobile', 'email'])
            ->column('id', label: __('Id'), sortable: true)
            ->column('user', label: __('Full name'))
            ->column('name', label: __('Name'), sortable: true, hidden: true, searchable: true)
            ->column('family', label: __('Family'), sortable: true, hidden: true, searchable: true)
            ->column('username', label: __('Username'), hidden: true, searchable: true)
            ->column('gender', label: __('Gender'), sortable: true, hidden: true)
            ->column('phone', label: __('Mobile'), sortable: true, searchable: true)
            ->column('level', label: __('Role'), sortable: true)
            ->column('created_at', label: __('Create date'), hidden: true, sortable: true)
            ->column('updated_at', label: __('Update date'), hidden: true, sortable: true)
            ->column('action', label: __('Actions'), exportAs: false)
//            ->export()
//            ->bulkAction(
//                label: 'Delete Selected User',
//                each: fn(User $user) => $user->delete(),
//                after: fn() => Toast::danger(__('The selected options are deleted.'))->autoDismiss(5),
//                confirm: 'Touch projects',
//                confirmText: 'Are you sure you want to touch the projects?',
//                confirmButton: 'Yes, touch all selected rows!',
//                cancelButton: 'No, do not touch!',
//            )
            ->paginate();


    }
}
