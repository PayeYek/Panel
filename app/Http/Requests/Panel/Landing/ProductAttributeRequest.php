<?php

namespace App\Http\Requests\Panel\Landing;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductAttributeRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'list'   => 'required|array',
//            'attributes.*' => 'nullable',
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
