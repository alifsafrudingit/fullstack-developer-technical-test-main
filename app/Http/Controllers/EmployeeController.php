<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Employee::with(['position']);
            
            return DataTables::of($query)
            ->addColumn('action', function ($employee) {
                return '
                                    <a class="btn btn-info rounded mr-2" 
                                        href="' . route('employee.show', $employee->id) . '">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                    <a class="btn btn-warning rounded" 
                                        href="' . route('employee.edit', $employee->id) . '">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <form class="d-inline-block" action="' . route('employee.destroy', $employee->id) . '" method="POST">
                                        <button class="btn btn-danger rounded ml-2" onclick="return confirm(`Anda yakin ingin menghapus ?`)">
                                        <i class="fas fa-trash"></i>
                                        </button>
                                        ' . method_field('delete') . csrf_field() . '
                                    </form>';
            })
            ->rawColumns(['action'])
            ->make();
        }
        
        return view('employee.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = Position::all();
        
        return view('employee.create', [
            'positions' => $positions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $data = $request->all();
        
        $photo = $request->file('photo');
        
        if ($request->hasFile('photo')) {
            $photoPath = $photo->store('assets/id_card_employe');
            
            $data['id_card_employee'] = $photoPath;
        }
        
        
        Employee::create($data);
        
        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $positions = Position::all();
        
        return view('employee.detail', [
            'employee' => $employee,
            'positions' => $positions,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $employee->load('position');
        
        $positions = Position::all();
        
        return view('employee.edit', [
            'employee' => $employee,
            'positions' => $positions
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $data = $request->all();
        
        $photo = $request->file('photo');
        
        if ($request->hasFile('photo')) {
            $photoPath = $photo->store('assets/id_card_employe');
            
            $data['id_card_employee'] = $photoPath;
        } else {
            $data['id_card_employee'] = $employee->id_card_employee;
        }
        
        return redirect()->route('employee.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        
        return redirect()->route('employee.index');
    }
}
