<?php

namespace App\Http\Controllers\Web\Panel\Land;


use App\Enum\ContactUsStateEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Landing\ContactUsRequest;
use App\Models\ContactUs;
use App\Tables\Landing\ContactUsTable;
use Splade;

class ContactUsController extends Controller
{

    public function index()
    {
        return view('panel.landing.contact-us.index', [
            'items' => ContactUsTable::class
        ]);
    }

    public function edit(ContactUs $contact)
    {
        $landTitle = $contact->land->title;
        $states = ContactUsStateEnum::cases();
        return view('panel.landing.contact-us.edit', compact('contact', 'landTitle', 'states'));
    }

    public function update(ContactUsRequest $contactUsRequest, ContactUs $contact)
    {
        $data = $contactUsRequest->validated();
        $contact->update($data);

        Splade::toast(__('Updated'))->autoDismiss(5)->info();

        return redirect()->route('panel.landing.contact.index');
    }

    public function destroy(ContactUs $contact)
    {
        $contact->delete();

        Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }

}
