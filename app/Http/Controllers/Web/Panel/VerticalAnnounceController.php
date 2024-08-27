<?php

namespace App\Http\Controllers\Web\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\VerticalAnnounceRequest;
use App\Models\VerticalAnnounce;
use App\Tables\VerticalAnnounceTable;
use Illuminate\Support\Facades\Storage;
use ProtoneMedia\Splade\Facades\Splade;

class VerticalAnnounceController extends Controller
{

    public function index()
    {
        return view('panel.vertical_announce.index', [
            'items' => VerticalAnnounceTable::class
        ]);
    }


    public function create()
    {
        return view('panel.vertical_announce.create');
    }


    public function store(VerticalAnnounceRequest $request)
    {
        $data = $request->validated();

        $data = $this->getImage($data, $request, 'desktop');

        $data = $this->getImage($data, $request, 'tablet');

        $data = $this->getImage($data, $request, 'mobile');

        VerticalAnnounce::create($data);

        Splade::toast(__('Created'))->autoDismiss(5)->success();

        return redirect()->route('panel.vertical_announce.index');
    }

    public function edit(VerticalAnnounce $vertical_announce)
    {
        return view('panel.vertical_announce.edit', compact('vertical_announce'));
    }


    public function update(VerticalAnnounceRequest $request, VerticalAnnounce $vertical_announce)
    {
        $data = $request->validated();

        /* Update new Desktop image */
        if ($request->validated()['desktop'] !== $vertical_announce->desktop) {
            Storage::delete('public/' . $vertical_announce->getDesktop());
            $data = $this->getImage($data, $request, 'desktop');
        } else
            $data['desktop'] = $vertical_announce->getDesktop();

        /* Update new Tablet image */
        if ($request->validated()['tablet'] !== $vertical_announce->tablet) {
            Storage::delete('public/' . $vertical_announce->getTablet());
            $data = $this->getImage($data, $request, 'tablet');
        } else
            $data['tablet'] = $vertical_announce->getTablet();

        /* Update new Mobile image */
        if ($request->validated()['mobile'] !== $vertical_announce->mobile) {
            Storage::delete('public/' . $vertical_announce->getMobile());
            $data = $this->getImage($data, $request, 'mobile');
        } else
            $data['mobile'] = $vertical_announce->getMobile();


        // Update the announcement with the new data
        $vertical_announce->update($data);

        Splade::toast(__('Updated'))->autoDismiss(5)->info();

        return redirect()->route('panel.vertical_announce.index');
    }


    public function destroy(VerticalAnnounce $vertical_announce)
    {
        /* Delete files */
        Storage::delete('public/' . $vertical_announce->getDesktop());
        Storage::delete('public/' . $vertical_announce->getTablet());
        Storage::delete('public/' . $vertical_announce->getMobile());

        $vertical_announce->delete();

        Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }


    /******************
     *  Image handler
     ******************/
    public function getImage(mixed $data, VerticalAnnounceRequest $request, $key): mixed
    {
        if (is_null($key)) return $data;

        $data[$key] = null;
        if (!empty($request->file($key))) {
            $data[$key] =
                $request->file($key)->store('media/announce', 'public');
        }
        return $data;
    }
}
