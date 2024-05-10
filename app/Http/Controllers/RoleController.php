<?php

namespace App\Http\Controllers;

use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Observers\RoleObserver;
use App\Services\Utils;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {

        return Inertia::render('Role/Index', [
            'roles' => Role::query()->withCount('permissions')->with([
                'permissions' => function ($query) {
                    $query->limit(5);
                }
            ])->get(),
        ]);
    }

    public function store(StoreRoleRequest $request): RedirectResponse
    {
        Role::create($request->only('name', 'guard_name'));

        return redirect()->route('roles.index');
    }

    public function create(): Response
    {
        $models = Utils::getModels();

        return Inertia::render('Role/Create', [
            'models' => $models,
            'permission_prefixes' => config('permission.permission_prefixes'),
        ]);
    }

    public function edit(Role $role, Request $request): Response
    {
        $models = Utils::getModels();

        return Inertia::render('Role/Edit', [
            'models' => $models,
            'role' => $role,
            'permissions' => $role->permissions->pluck('name')->toArray(),
            'permission_prefixes' => config('permission.permission_prefixes'),
        ]);
    }

    public function update(Role $role, UpdateRoleRequest $request): RedirectResponse
    {
        $role->update($request->only('name', 'guard_name'));

        //observer doesn't get triggered if only the permission are updated
        RoleObserver::syncPermissions($role);

        return redirect()->route('roles.index');

    }

    public function destroy(Role $role): RedirectResponse
    {
        $role->delete();
        return back();
    }
}
