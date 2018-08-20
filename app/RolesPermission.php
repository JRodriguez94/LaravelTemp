<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\RolesPermission
 *
 * @property int $permission_id
 * @property int $role_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RolesPermission wherePermissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RolesPermission whereRoleId($value)
 * @mixin \Eloquent
 */
class RolesPermission extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'permission_role';
}
