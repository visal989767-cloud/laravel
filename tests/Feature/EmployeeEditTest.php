<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class EmployeeEditTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        Session::put('employees', [
            ['empid' => 101, 'empname' => 'visal', 'position' => 'Manager'],
            ['empid' => 102, 'empname' => 'Pisey', 'position' => 'Programmer'],
            ['empid' => 103, 'empname' => 'King', 'position' => 'Designer'],
            ['empid' => 104, 'empname' => 'Nita', 'position' => 'Accountant'],
        ]);
    }

    public function test_employee_update_route_updates_name_and_position(): void
    {
        $response = $this->from('/employee/edit/101/John/Manager')
            ->post('/employee/update/101', [
                'empname' => 'Visal',
                'position' => 'Director',
            ]);

        $response->assertRedirect('/employee/home');

        $this->get('/employee/home')
            ->assertSee('Visal')
            ->assertSee('Director');
    }

    public function test_employee_delete_route_removes_employee_from_list(): void
    {
        $response = $this->get('/employee/delete/101');

        $response->assertRedirect('/employee/home');

        $this->get('/employee/home')
            ->assertDontSee('John')
            ->assertSee('Pisey');
    }
}
