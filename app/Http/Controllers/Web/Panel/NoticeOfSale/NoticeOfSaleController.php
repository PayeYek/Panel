<?php

namespace App\Http\Controllers\Web\Panel\NoticeOfSale;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Blog\ArticleRequest;
use App\Models\Blog\Article;
use App\Models\sale_notice;
use App\Tables\SalesNotice;
use Illuminate\Http\Request;
use App\Http\Requests\Panel\NotiseOfSale\salesNoticeRequest;
use App\Models\Blog\Company;
use Illuminate\Support\Facades\Storage;
use ProtoneMedia\Splade\Facades\Splade;

class NoticeOfSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('panel.salesNotice.index', [
            'items' => SalesNotice::class,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::latest()->pluck('title', 'id');

        return view('panel.salesNotice.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(salesNoticeRequest $request)
    {
        $data = $request->validated();
        $data = $this->getFile($data, $request);
        $data = $this->getVoice($data, $request);

        sale_notice::create($data);

        Splade::toast(__('Created'))->autoDismiss(5)->success();

        return redirect()->route('panel.noticeOfSale.list.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $companies = Company::latest()->pluck('title', 'id');
        $saleNotice = sale_notice::where('id','=',$id)->firstOrFail();

        return view('panel.salesNotice.edit', compact('saleNotice', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(salesNoticeRequest $request, sale_notice $saleNotice)
    {
        $data = $request->validated();

        /* Update new image */
        if ($request->validated()['file'] !== $saleNotice->file) {
            Storage::delete('public/'.$saleNotice->getFile());
            $data = $this->getFile($data, $request);
        } else {
            $data['file'] = $saleNotice->getFile();
        }

        /* Update new image */
        if ($request->validated()['voice'] !== $saleNotice->voice) {
            Storage::delete('public/'.$saleNotice->getVoice());
            $data = $this->getVoice($data, $request);
        } else {
            $data['voice'] = $saleNotice->getVoice();
        }

        $saleNotice->update($data);

        Splade::toast(__('Updated'))->autoDismiss(5)->info();

        return redirect()->route('panel.noticeOfSale.list.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sale_notice $saleNotice)
    {
        /* Delete logo */
        Storage::delete('public/'.$saleNotice->getFile());
        Storage::delete('public/'.$saleNotice->getVoice());

        $saleNotice->delete();

        Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }

    public function getFile(mixed $data, salesNoticeRequest $request): mixed
    {
        $data['file'] = null;
        if (!empty($request->file('file'))) {
            $data['file'] =
                $request->file('file')->store('media/notice', 'public');
        }
        return $data;
    }
    public function getVoice(mixed $data, salesNoticeRequest $request): mixed
    {
        $data['voice'] = null;
        if (!empty($request->file('voice'))) {
            $data['voice'] =
                $request->file('voice')->store('media/notice', 'public');
        }
        return $data;
    }
}
