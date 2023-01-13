<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\MainRequest;
use App\Repositories\EmployeeRepository;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function index()
    {    
        return view('employees.index', [
            'data' => Employee::latest()->paginate(5),
            'i' => (request()->input('page', 1) - 1) * 5
        ]);
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(MainRequest $request, EmployeeRepository $repository)
    {

        $repository->create($request);
     
        return redirect()->route('employees.index')->with('success','Item created successfully.');
    }

    public function show(Employee $data)
    {

    }

    public function edit($id)
    {
        return view('employees.edit', [
            'data' => Employee::find($id)
        ]);
    }

    public function update(MainRequest $request, EmployeeRepository $repository, $id)
    {
        $repository->update($request, $id);
    
        return redirect()->route('employees.index')->with('success','Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Employee::find($id);

        $item->delete();

        return redirect()->route('employees.index')->with('success','Item deleted successfully');
    }
}
