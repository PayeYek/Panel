<?php

namespace App\Http\Requests\Panel\Landing;

use Illuminate\Foundation\Http\FormRequest;

class LandStyleRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'land_id'      => 'required|numeric',
            'color'        => 'required|numeric',
            'radius'       => 'required|numeric',
            'product_type' => 'required|numeric',
//            'product_view' => 'required|numeric',
            'article_type' => 'required|numeric',
//            'article_view' => 'required|numeric',
            'video_type'   => 'required|numeric',
//            'video_view'   => 'required|numeric',
            'slide_type'   => 'required|numeric',
            'slide_anim'   => 'required|numeric',
        ];

//        if ($this->method() == 'POST') {
//            return [
//                'attributes'   => 'required|array',
//                'attributes.*' => 'required|numeric',
//            ];
//        }
//
//        if (in_array($this->method(), ['PUT', 'PATCH'])) {
//
//            //todo
//            return [
//                'land_id'     => 'required|numeric',
//                'brand_id'    => 'required|numeric',
//                'category_id' => 'required|numeric',
//                'colors'      => 'required',
//                'colors.*'    => 'required|distinct:1',
//                'name'        => 'required|string',
//                'model'       => 'nullable|string',
//                'year'        => 'nullable|string',
//                'tonnage'     => 'nullable|string',
//                'axle'        => 'nullable|string',
//                'usage'       => 'nullable|string',
//                'cabin'       => 'nullable|string',
//                'description' => 'nullable',
//                'body'        => 'nullable',
//                'catalog'     => 'nullable|file|mimes:pdf|max:10240',
//                'manual'      => 'nullable|file|mimes:pdf|max:10240',
//                'image'       => $this->getValidationRuleImage(),
//                'pictures'       => 'nullable|array',
//                'pictures.*'       => $this->getValidationRulePictures(),
//                'slug'        => [
//                    'required',
//                    'string',
//                    Rule::unique("land_products")->ignore($this->product->id)
//                ],
//
//            ];
//        }
//        return null;
    }

}
