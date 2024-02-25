<?php

namespace App\Http\Controllers\Panel\Land;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Landing\FileRequest;
use App\Models\LandFile;
use App\Tables\Landing\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
        return view('panel.landing.file.index', [
            'items' => Files::class
        ]);
    }

    public function create()
    {
        return view('panel.landing.file.create');
    }

    public function store(FileRequest $request)
    {
        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $file) {
                $path = $file->store('media/land/files', 'public');
                $nameWithoutExtension = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $size = $file->getSize();
                $format = $file->getClientOriginalExtension();

                LandFile::create([
                    'path' => $path,
                    'name' => $nameWithoutExtension,
                    'size' => $size,
                    'type' => $format,
                ]);
            }
        }

        \Splade::toast(__('Created'))->autoDismiss(5)->success();

        return redirect()->route('panel.landing.file.index');
    }


    public function edit(LandFile $file)
    {
        return view('panel.landing.file.edit', compact('file'));
    }


    public function update(FileRequest $request, LandFile $file)
    {
        $data = $request->validated();

        /* Update new file */
        if ($request->validated()['path'] !== $file->path) {
            Storage::delete('public/' . $file->getPath());
            $data = $this->getPath($data, $request);
        } else
            $data['path'] = $file->getPath();

        $file->update($data);

        \Splade::toast(__('Updated'))->autoDismiss(5)->info();

        return redirect()->route('panel.landing.file.index');
    }


    public function destroy(LandFile $file)
    {
        /* Delete file */
        Storage::delete('public/' . $file->getPath());

        $file->delete();

        \Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }

    public function getPath(mixed $data, Request $request): mixed
    {
        $data['path'] = null;
        if (!empty($request->file('path'))) {
            $data['path'] =
                $request->file('path')->store('media/land/files', 'public');
        }
        return $data;
    }
}
