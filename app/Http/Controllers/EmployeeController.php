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
        return view('admin.employees.index', [
            'data' => Employee::latest()->paginate(25),
            'i' => (request()->input('page', 1) - 1) * 25
        ]);
    }

    public function create()
    {
        return view('admin.employees.create');
    }

    public function store(MainRequest $request, EmployeeRepository $repository)
    {
        //dd($request->name);
        $repository->create($request);

        return redirect()->route('employees.index')->with('success','Item created successfully.');
    }

    public function show(Employee $data)
    {

    }

    public function edit($id)
    {
        return view('admin.employees.edit', [
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
