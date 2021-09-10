<?php

namespace LIGAssetManagement\Employee;

use App\Models\Employee as EmployeeModel;

class Identification 
{
    const INITIAL_ID = 1000;
    private $employee = null;
    public function __construct(EmployeeModel $employee) {
        $this->employee = $employee;
    }

    public function generateIdentification() {
        $this->employee->employee_id = $this->makeId();
        $this->employee->save();
    }

    private function makeId() {
        $latestEmployee = EmployeeModel::select(['id'])->orderBy('id','desc')->first();
        return static::INITIAL_ID + $latestEmployee->id++;
    }
}