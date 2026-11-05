<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class EmployeeCrudTest extends TestCase
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

    public function test_employee_create_route_adds_new_employee(): void
    {
        $response = $this->post('/employee/store', [
            'empname' => 'Visal',
            'position' => 'Director',
        ]);

        $response->assertRedirect('/employee/home');

        $this->get('/employee/home')
            ->assertSee('Visal')
            ->assertSee('Director');
    }
}
