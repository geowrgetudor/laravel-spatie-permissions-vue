<?php

namespace SpatiePermissionVue\Traits;

trait RolesPermissionsToVue
{
    public function getRolesPermissionsAsJson()
    {
        return json_encode([
            'roles'       => $this->getRoleNames(),
            'permissions' => $this->getAllPermissions()->pluck('name'),
        ]);
    }
}
