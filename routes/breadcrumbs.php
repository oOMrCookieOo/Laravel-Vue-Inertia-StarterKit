<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

Breadcrumbs::for('profile.edit', function (BreadcrumbTrail $trail) {
    $trail->push('Profile', route('profile.edit'));
});

Breadcrumbs::for('roles', function (BreadcrumbTrail $trail) {
    $trail->push('Roles', route('roles.index'));
});

Breadcrumbs::for('roles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('roles');
});

Breadcrumbs::for('roles.create', function (BreadcrumbTrail $trail) {
    $trail->parent('roles');
    $trail->push('Create Role', route('roles.create'));
});

Breadcrumbs::for('roles.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('roles');
});
