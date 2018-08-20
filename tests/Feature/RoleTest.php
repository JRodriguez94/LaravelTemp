<?php

namespace Tests\Feature;

use App\User;
use App\Role;
use App\Permission;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoleTest extends TestCase
{
    use DatabaseMigrations;

    public function testRolesIndex()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->get('/roles');

        $response->assertStatus(200);
    }

    public function testRolesCreate()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
           ->get("roles/create");

        $response->assertStatus(200);
    }

    public function testRolesStore()
    {
        $user = factory(User::class)->create();

        $role = $this->newRole();

        $response = $this->actingAs($user)
            ->json('POST', 'roles', $role);

        $this->assertDatabaseHas('roles', [
            'name' => $role['name'],
            'display_name' => $role['display_name'],
        ]);

        $response->assertRedirect('roles');
    }

    public function testRolesEdit()
    {
        $user = factory(User::class)->create();

        $newRol = $this->createRole($this->newRole());


        $response = $this->actingAs($user)
            ->get("roles/{$newRol->id}/edit");

        $response->assertStatus(200);

        $response->assertViewHas('role');
    }

    public function testRolesUpdate()
    {
        $user = factory(User::class)->create();

        $rol = $this->createRole();

        $newRol = $this->newRole();

        $response = $this->actingAs($user)
            ->json('PUT', "roles/{$rol->id}", $newRol);

        $this->assertDatabaseHas('roles', [
            'name' => $newRol['name'],
            'display_name' => $newRol['display_name'],
        ]);

        $response->assertRedirect('roles');
    }

    public function testRolesShow()
    {
        $user = factory(User::class)->create();

        $role = $this->createRole($this->newRole());

        $response = $this->actingAs($user)
            ->get("roles/{$role->id}");

        $response->assertStatus(200)
            ->assertJson($role->toArray());
    }

    public function testRolesDelete()
    {

        $user = factory(User::class)->create();

        $role = $this->createRole($this->newRole());


        $response = $this->actingAs($user)
            ->delete("roles/{$role->id}");

        $role = $role->toArray();

        $this->assertDatabaseHas('roles', [
            'id' => $role['id'],
            'status' => 0
        ]);

        $response->assertStatus(200);
    }

    public function testRolesCatalogue()
    {
        $user = factory(User::class)->make();
        factory(Role::class)->make()->save();
        factory(Permission::class)->make()->save();
        $role = Role::all()->first();
        $permission = Permission::all()->first();

        $response = $this->actingAs($user)
            ->get("permissions");
        $response->assertStatus(200);

        $response2 = $this->actingAs($user)
            ->json("GET", "permissions/assign?permission_id=" . $permission->id . "&role_id=" . $role->id);
        $response2->assertStatus(200);
        $this->assertDatabaseHas('permission_role', ['permission_id' => $permission->id, 'role_id' => $role->id]);

        $response3 = $this->actingAs($user)
            ->json("GET","permissions/unassign?permission_id=" . $permission->id . "&role_id=" . $role->id);
        $response3->assertStatus(200);
        $this->assertDatabaseMissing('permission_role', ['permission_id' => $permission->id, 'role_id' => $role->id]);
    }

    protected function createRole($newRole = null)
    {
        if ($newRole) {
            $newRole = (object) $newRole;
        }
        $rol = new Role;
        $rol->name = $newRole ? $newRole->name : 'vendedor';
        $rol->display_name = $newRole ? $newRole->display_name : 'Vendedor';

        $rol->save();
        return $rol;
    }

    protected function newRole()
    {
        return [
            'name' => 'admin',
            'display_name' => 'Administrador',
        ];
    }
}
