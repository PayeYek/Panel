<?php

namespace App\Http\Controllers\Web\Panel\Blog;


use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Blog\CompanyRequest;
use App\Models\Blog\Company;
use App\Tables\Blog\Companies;
use Illuminate\Support\Facades\Storage;
use Splade;

class
CompanyController extends Controller
{

    public function index()
    {
        return view('panel.blog.company.index', [
            'items' => Companies::class
        ]);
    }


    public function create()
    {
        return view('panel.blog.company.create');
    }


    public function store(CompanyRequest $request)
    {
        $data = $request->validated();

        /* Get logo */
        $data = $this->getLogo($data, $request);

        Company::create($data);

        Splade::toast(__('Created'))->autoDismiss(5)->success();

        return redirect()->route('panel.blog.company.index');
    }


    public function edit(Company $company)
    {
        return view('panel.blog.company.edit', compact('company'));
    }

    public function update(CompanyRequest $request, Company $company)
    {
        $data = $request->validated();

        /* Update new logo */
        if ($request->validated()['logo'] !== $company->logo) {
            Storage::delete('public/' . $company->getLogo());
            $data = $this->getLogo($data, $request);
        } else
            $data['logo'] = $company->getLogo();


        $company->update($data);

        Splade::toast(__('Updated'))->autoDismiss(5)->info();

        return redirect()->route('panel.blog.company.index');
    }


    public function destroy(Company $company)
    {
        /* Delete logo */
        Storage::delete('public/' . $company->getLogo());

        $company->delete();

        Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }

    public function getLogo(mixed $data, CompanyRequest $request): mixed
    {
        $data['logo'] = null;
        if (!empty($request->file('logo'))) {
            $data['logo'] =
                $request->file('logo')->store('media/company/logos', 'public');
        }
        return $data;
    }

}
