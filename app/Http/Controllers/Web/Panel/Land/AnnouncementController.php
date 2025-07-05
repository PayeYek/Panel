<?php

namespace App\Http\Controllers\Web\Panel\Land;

use App\Enum\AnnouncementPageEnum;
use App\Enum\AnnouncementTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Landing\AnnouncementRequest;
use App\Models\Announcement;
use App\Models\Land;
use App\Tables\Landing\Announcements;
use Illuminate\Support\Facades\Storage;
use ProtoneMedia\Splade\Facades\Splade;

class AnnouncementController extends Controller
{

    public function index()
    {
        return view('panel.landing.announcement.index', [
            'items' => Announcements::class
        ]);
    }


    public function create()
    {
        $lands = Land::latest()->pluck('title', 'id');
        $types = AnnouncementTypeEnum::options();
        $pages = AnnouncementPageEnum::options();

        return view('panel.landing.announcement.create', compact('lands', 'pages', 'types'));
    }


    public function store(AnnouncementRequest $request)
    {
        $data = $request->validated();
        /* Get image */
        $data = $this->getMedia($data, $request);

        /* Get poster */
        $data = $this->getPoster($data, $request);

        Announcement::create($data);

        Splade::toast(__('Created'))->autoDismiss(5)->success();

        return redirect()->route('panel.landing.announcement.index');
    }


    public function edit(Announcement $announcement)
    {
        $lands = Land::latest()->pluck('title', 'id');
        $types = AnnouncementTypeEnum::options();
        $pages = AnnouncementPageEnum::options();

        return view('panel.landing.announcement.edit', compact('announcement', 'lands', 'types', 'pages'));
    }


    public function update(AnnouncementRequest $request, Announcement $announcement)
    {
        $data = $request->validated();

        /* Update new image */
        if ($request->validated()['media'] !== $announcement->media) {
            Storage::delete('public/' . $announcement->getMedia());
            $data = $this->getMedia($data, $request);
        } else
            $data['media'] = $announcement->getMedia();

        if ($request->validated()['poster'] !== $announcement->poster) {
            Storage::delete('public/' . $announcement->getPoster());
            $data = $this->getPoster($data, $request);
        } else
            $data['poster'] = $announcement->getPoster();

        $announcement->update($data);

        Splade::toast(__('Updated'))->autoDismiss(5)->info();

        return redirect()->route('panel.landing.announcement.index');
    }


    public function destroy(Announcement $announcement)
    {
        /* Delete files */
        Storage::delete('public/' . $announcement->getMedia());
        Storage::delete('public/' . $announcement->getPoster());

        $announcement->delete();

        Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }

    public function getMedia(mixed $data, AnnouncementRequest $request): mixed
    {
        $data['media'] = null;
        if (!empty($request->file('media'))) {
            $data['media'] = $request->file('media')->store('media/land/announcements/media', 'public');
        }
        return $data;
    }


    public function getPoster(mixed $data, AnnouncementRequest $request): mixed
    {
        $data['poster'] = null;
        if (!empty($request->file('poster'))) {
            $data['poster'] =
                $request->file('poster')->store('media/land/announcements/poster', 'public');
        }
        return $data;
    }

}
