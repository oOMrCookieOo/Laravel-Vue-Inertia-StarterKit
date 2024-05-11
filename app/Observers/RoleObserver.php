<?php

namespace App\Observers;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleObserver
{
    public static function syncPermissions(Role $role): void
    {
        $permissions = collect(request('permissions'))
            ->unique();

        $permissionModels = collect();
        $permissions->each(function ($permission) use ($permissionModels, $role) {
            $permissionModels->push(Permission::query()->firstOrCreate([
                'name' => $permission,
                'guard_name' => $role->guard_name,
            ]));
        });

        $role->syncPermissions($permissionModels);
    }

    /**
     * Handle the Role "created" event.
     */
    public function created(Role $role): void
    {
        self::syncPermissions($role);
    }

    /**
     * Handle the Role "updated" event.
     */
    public function updated(Role $role): void
    {

    }

    /**
     * Handle the Role "deleted" event.
     */
    public function deleted(Role $role): void
    {
        //
    }

    /**
     * Handle the Role "restored" event.
     */
    public function restored(Role $role): void
    {
        //
    }

    /**
     * Handle the Role "force deleted" event.
     */
    public function forceDeleted(Role $role): void
    {
        //
    }
}
