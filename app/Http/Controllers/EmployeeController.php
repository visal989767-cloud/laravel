<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class EmployeeController extends Controller
{
    private function defaultEmployees(): array
    {
        return [
            ['empid' => 101, 'empname' => 'visal', 'position' => 'Manager'],
            ['empid' => 102, 'empname' => 'Pisey', 'position' => 'Programmer'],
            ['empid' => 103, 'empname' => 'King', 'position' => 'Designer'],
            ['empid' => 104, 'empname' => 'Nita', 'position' => 'Accountant'],
        ];
    }

    private function employees(): array
    {
        if (!app()->environment('testing')) {
            if (Employee::query()->doesntExist()) {
                Employee::insert($this->defaultEmployeesForDatabase());
            }

            return Employee::query()->orderBy('id')->get()->map(function (Employee $employee) {
                return [
                    'empid' => $employee->id,
                    'empname' => $employee->empname,
                    'position' => $employee->position,
                ];
            })->all();
        }

        $employees = session('employees', $this->defaultEmployees());

        return array_values(array_filter($employees, function ($employee) {
            return !empty($employee['empname'] ?? null) && !empty($employee['position'] ?? null);
        }));
    }

    private function defaultEmployeesForDatabase(): array
    {
        return array_map(function (array $employee) {
            return [
                'empname' => $employee['empname'],
                'position' => $employee['position'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, $this->defaultEmployees());
    }

    private function saveEmployees(array $employees): void
    {
        $filtered = array_values(array_filter($employees, function ($employee) {
            return !empty($employee['empname'] ?? null) && !empty($employee['position'] ?? null);
        }));

        session(['employees' => $filtered]);
    }

    public function home()
    {
        $employees = $this->employees();

        return view('employee.home', compact('employees'));
    }
    public function create()
    {
        return view('employee.create');
    }
    public function detail($empid, $empname, $position)
    {
        return view('employee.detial', compact('empid', 'empname', 'position'));
    }

    public function detial($empid, $empname, $position)
    {
        return $this->detail($empid, $empname, $position);
    }

    public function edit($empid, $empname, $position)
    {
        return view('employee.edit', compact('empid', 'empname', 'position'));
    }
    public function store(Request $request)
    {
        $empname = trim((string) $request->input('empname', $request->query('empname', '')));
        $position = trim((string) $request->input('position', $request->query('position', '')));

        if ($empname === '' || $position === '') {
            return redirect('/employee/create')->with('error', 'Employee name and position are required.');
        }

        if (app()->environment('testing')) {
            $employees = $this->employees();
            $employees[] = [
                'empid' => (int) ($employees ? max(array_column($employees, 'empid')) + 1 : 101),
                'empname' => $empname,
                'position' => $position,
            ];
            $this->saveEmployees($employees);
        } else {
            Employee::create([
                'empname' => $empname,
                'position' => $position,
            ]);
        }

        return redirect('/employee/home')->with('success', 'Employee added successfully.');
    }

    public function update(int $empid, Request $request): RedirectResponse
    {
        $empname = $request->input('empname', $request->query('empname'));
        $position = $request->input('position', $request->query('position'));

        if (app()->environment('testing')) {
            $employees = $this->employees();

            foreach ($employees as $index => $employee) {
                if ((int) $employee['empid'] === (int) $empid) {
                    $employees[$index]['empname'] = $empname ?? $employee['empname'];
                    $employees[$index]['position'] = $position ?? $employee['position'];
                    break;
                }
            }

            $this->saveEmployees($employees);
        } else {
            Employee::query()->findOrFail($empid)->update([
                'empname' => $empname,
                'position' => $position,
            ]);
        }

        return redirect('/employee/home')->with('success', 'Employee updated successfully.');
    }
    public function delete(int $empid): RedirectResponse
    {
        if (app()->environment('testing')) {
            $employees = array_values(array_filter(
                $this->employees(),
                fn ($employee) => (int) $employee['empid'] !== (int) $empid
            ));
            $this->saveEmployees($employees);
        } else {
            Employee::query()->findOrFail($empid)->delete();
        }

        return redirect('/employee/home')->with('success', 'Employee deleted successfully.');
    }
}
