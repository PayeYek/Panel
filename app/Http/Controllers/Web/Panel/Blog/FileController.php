<?php

namespace App\Http\Controllers\Web\Panel\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Blog\FileRequest;
use App\Models\Blog\File;
use App\Tables\Blog\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Splade;

class FileController extends Controller
{
    public function index()
    {
        return view('panel.blog.file.index', [
            'items' => Files::class
        ]);
    }

    public function create()
    {
        return view('panel.blog.file.create');
    }

    public function store(FileRequest $request)
    {
        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $file) {
                $path = $file->store('media/blog/files', 'public');
                $nameWithoutExtension = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $size = $file->getSize();
                $format = $file->getClientOriginalExtension();

                File::create([
                    'path' => $path,
                    'name' => $nameWithoutExtension,
                    'size' => $size,
                    'type' => $format,
                ]);
            }
        }

        Splade::toast(__('Created'))->autoDismiss(5)->success();

        return redirect()->route('panel.blog.file.index');
    }


    public function edit(File $file)
    {
        return view('panel.blog.file.edit', compact('file'));
    }

    public function update(FileRequest $request, File $file)
    {
        $data = $request->validated();

        if ($request->file('path')) {
            Storage::delete('public/' . $file->getPath());

            $data = $this->getPath($data, $request, $file->getPath());

            $newFile = $request->file('path');
            $data['name'] = pathinfo($newFile->getClientOriginalName(), PATHINFO_FILENAME);
            $data['type'] = $newFile->getClientOriginalExtension();
            $data['size'] = $newFile->getSize();

        } else {
            $data['path'] = $file->getPath();
        }

        $file->update($data);
        Splade::toast(__('Updated'))->autoDismiss(5)->info();
        return redirect()->route('panel.blog.file.index');
    }

    public function getPath(mixed $data, Request $request, string $existingFilePath): mixed
    {
        if (!empty($request->file('path'))) {
            $existingFileName = basename($existingFilePath);
            $storagePath = 'media/blog/files/' . $existingFileName;
            $request->file('path')->storeAs('media/blog/files', $existingFileName, 'public');
            $data['path'] = $storagePath;
        }
        return $data;
    }

    public function destroy(File $file)
    {
        /* Delete file */
        Storage::delete('public/' . $file->getPath());

        $file->delete();

        Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }
}
