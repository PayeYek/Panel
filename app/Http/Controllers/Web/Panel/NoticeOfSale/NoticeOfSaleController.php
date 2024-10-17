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
        $data = $this->getFileExtension($data, $request);

        $new = sale_notice::create($data);
        sale_notice::where('id','=',$new->id)->update(['slug'=>$new->id]);

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
        if($saleNotice->file){
            $saleNotice->file = config('app.url')  . '/storage/' . $saleNotice->file;
        }
        if($saleNotice->voice){
            $saleNotice->voice = config('app.url')  . '/storage/' . $saleNotice->voice;
        }

        return view('panel.salesNotice.edit', compact('saleNotice', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(salesNoticeRequest $request, sale_notice $saleNotice,$id)
    {
        $data = $request->validated();

        /* Update new file */
        if($request->files){
            /* Update new extension */
            if ($request->files !== $saleNotice->file) {
                $data['file_type'] = $this->getFileExtension($data, $request)['file_type'];
            } else {
                $data['file_type'] = $saleNotice->file_type;
            }

            if ($request->files !== $saleNotice->file) {
                Storage::delete('public/'.$saleNotice->file);
                $data['file'] = $this->getFile($data, $request)['file'];
            } else {
                $data['file'] = $saleNotice->file;
            }
        }

        /* Update new voice */
        if($request->voice){
            if ($request->validated()['voice'] !== $saleNotice->voice) {
                Storage::delete('public/'.$saleNotice->voice);
                $data['voice'] = $this->getVoice($data, $request)['voice'];
            } else {
                $data['voice'] = $saleNotice->voice;
            }
        }

//        dd($data);
        sale_notice::where('id','=',$id)->limit(1)->update($data);
//        $saleNotice->update($data);

        Splade::toast(__('Updated'))->autoDismiss(5)->info();

        return redirect()->route('panel.noticeOfSale.list.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $get = sale_notice::where('id','=',$id)->first();

        /* Delete logo */
        Storage::delete('public/'.$get->file);

        if($get->voice != null){
            Storage::delete('public/'.$get->voice);
        }

        sale_notice::where('id','=',$id)->delete();

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

    public function getFileExtension(mixed $data, salesNoticeRequest $request): mixed
    {
        $data['file_type'] = null;
        if (!empty($request->file('file'))) {
            $extension = $request->file('file')->getClientOriginalExtension();
            if($extension === 'jpg' || $extension === 'png' || $extension === 'jpeg' || $extension === 'webp') {
                $data['file_type'] = 'image';
            }else{
                $data['file_type'] = 'file';
            }
        }
        return $data;
    }
}
