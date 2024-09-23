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
            'land_id'                 => 'required|numeric',
            'color'                   => 'required|numeric',
            'radius'                  => 'required|numeric',
            'border_type'             => 'required|numeric',
            'product_card_type'       => 'required|numeric',
            'product_list_type'       => 'required|numeric',
            'product_striped'         => 'required|numeric',
            'article_card_type'       => 'required|numeric',
            'article_striped'         => 'required|numeric',
            'video_card_type'         => 'required|numeric',
            'category_card_type'      => 'required|numeric',
            'category_striped'        => 'required|numeric',
            'category_filter_type'    => 'required|numeric',
            'section_header_type'     => 'required|numeric',
            'contact_type'            => 'required|numeric',
            'quick_access_panel_type' => 'required|numeric',
            'a_card_type'             => 'required|numeric',
            'a_view_type'             => 'required|numeric',
            'a_table_type'            => 'required|numeric',
            'a_striped'               => 'required|numeric',
            'slider_type'             => 'required|numeric',
            'slider_anim'             => 'required|numeric',
        ];
    }

}
