<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\MainRequest;
use App\Repositories\CompanyRepository;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function index()
    {
        return view('admin.companies.index', [
            'data' => Company::latest()->paginate(25),
            'i' => (request()->input('page', 1) - 1) * 25
        ]);
    }

    public function create()
    {
        return view('admin.companies.create');
    }

    public function store(MainRequest $request, CompanyRepository $repository)
    {
        $repository->create($request);

        return redirect()->route('companies.index')->with('success','Item created successfully.');
    }

    public function show(Company $data)
    {

    }

    public function edit($id)
    {
        return view('admin.companies.edit', [
            'data' => Company::find($id)
        ]);
    }

    public function update(MainRequest $request, CompanyRepository $repository, $id)
    {
        $repository->update($request, $id);

        return redirect()->route('companies.index')->with('success','Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Company::find($id);

        $item->delete();

        return redirect()->route('companies.index')->with('success','Item deleted successfully');
    }
}
