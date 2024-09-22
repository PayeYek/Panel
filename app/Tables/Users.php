<?php

namespace App\Tables;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

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
                        ->orWhere('first_name', 'LIKE', "%{$value}%")
                        ->orWhere('last_name', 'LIKE', "%{$value}%")
                        ->orWhere('mobile', 'LIKE', "%{$value}%");
                });
            });
        });

        return QueryBuilder::for(User::class)
            ->with('roles')
            ->defaultSort('-id')
            ->allowedSorts(['id', 'roles.name', 'first_name', 'last_name', 'mobile', 'created_at', 'updated_at'])
            ->allowedFilters(['roles.name', 'first_name', 'last_name', 'mobile', 'gender', $globalSearch]);
    }

    public function configure(SpladeTable $table)
    {

        $table
            ->withGlobalSearch(columns: ['id', 'first_name', 'last_name', 'mobile'])
            ->column('id', label: __('Id'), sortable: true, hidden: true)
            ->column('user', label: __('Full name'))
            ->column('first_name', label: __('First Name'), hidden: true, sortable: true, searchable: true)
            ->column('last_name', label: __('Last Name'), hidden: true, sortable: true, searchable: true)
            ->column('gender', label: __('Gender'), hidden: true, sortable: true)
            ->column('mobile', label: __('Mobile'), hidden: true, sortable: true, searchable: true)
            ->column('roles.name', label: __('Role'), sortable: true, searchable: true)
            ->column('birthdate', label: __('Birthdate'), hidden: true, sortable: true)
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
