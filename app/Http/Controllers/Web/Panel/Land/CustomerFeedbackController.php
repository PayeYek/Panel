<?php

namespace App\Http\Controllers\Web\Panel\Land;

use App\Enum\GenderTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Landing\CustomerFeedbackRequest;
use App\Http\Requests\Panel\Landing\CustomerFeedbackUpdateRequest;
use App\Models\CustomerFeedback;
use App\Models\Land;
use App\Tables\Landing\CustomerFeedbacks;
use Illuminate\Support\Facades\Storage;
use ProtoneMedia\Splade\Facades\Splade;

class CustomerFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('panel.landing.customer-feedback.index', [
            'items' => CustomerFeedbacks::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genderTypes = GenderTypeEnum::options();
        $lands = Land::latest()->pluck('title', 'id');
        return view('panel.landing.customer-feedback.create', compact('lands', 'genderTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerFeedbackRequest $feedbackRequest)
    {
        $data = $feedbackRequest->validated();

        /* Get primary */
        $data['image'] = null;
        if (!empty($feedbackRequest->file('image'))) {
            $data['image'] = $feedbackRequest->file('image')->store('media/land/customer-feedback', 'public');
        }

        CustomerFeedback::create($data);

        Splade::toast(__('Created'))->autoDismiss(5);

        return redirect()->route('panel.landing.customer-feedback.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerFeedback $customer_feedback)
    {
        $genderTypes = GenderTypeEnum::options();
        $lands = Land::latest()->pluck('title', 'id');
        return view('panel.landing.customer-feedback.edit', compact('customer_feedback', 'lands', 'genderTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerFeedbackUpdateRequest $feedbackRequest, CustomerFeedback $customer_feedback)
    {
        $data = $feedbackRequest->validated();

        if ($feedbackRequest->hasFile('image')) {
            if ($customer_feedback->image) {
                Storage::delete('public/' . $customer_feedback->image);
            }

            $data['image'] = $feedbackRequest->file('image')->store('media/land/customer-feedback', 'public');
        } else {
            $data['image'] = $customer_feedback->image;
        }

        $customer_feedback->update($data);

        Splade::toast(__('Updated'))->autoDismiss(5)->info();

        return redirect()->route('panel.landing.customer-feedback.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerFeedback $customer_feedback)
    {
        /* Delete primary */
        Storage::delete('public/' . $customer_feedback->image);

        $customer_feedback->delete();

        Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }
}
