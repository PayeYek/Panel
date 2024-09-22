<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LandStyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $styles = [
            [
                'land_id' => 1,
                'color' => 1,
                'radius' => 8,
                'border_type' => 0,
                'product_card_type' => 11,
                'product_list_type' => 1,
                'product_striped' => 1,
                'article_card_type' => 5,
                'article_striped' => 1,
                'video_card_type' => 6,
                'category_card_type' => 10,
                'category_striped' => 1,
                'a_card_type' => 5,
                'a_view_type' => 1,
                'a_table_type' => 1,
                'a_striped' => 1,
                'slider_type' => 1,
                'slider_anim' => 1,
                'category_filter_type' => 1,
                'quick_access_panel_type' => 1,
                'section_header_type' => 1,
                'contact_type' => 1,
            ],
            [
                'land_id' => 2,
                'color' => 2,
                'radius' => 4,
                'border_type' => 1,
                'product_card_type' => 10,
                'product_list_type' => 2,
                'product_striped' => 1,
                'article_card_type' => 6,
                'article_striped' => 1,
                'video_card_type' => 1,
                'category_card_type' => 11,
                'category_striped' => 1,
                'a_card_type' => 6,
                'a_view_type' => 6,
                'a_table_type' => 1,
                'a_striped' => 1,
                'slider_type' => 2,
                'slider_anim' => 1,
                'category_filter_type' => 1,
                'quick_access_panel_type' => 2,
                'section_header_type' => 2,
                'contact_type' => 1,
            ],
            [
                'land_id' => 3,
                'color' => 3,
                'radius' => 4,
                'border_type' => 0,
                'product_card_type' => 1,
                'product_list_type' => 2,
                'product_striped' => 0,
                'article_card_type' => 7,
                'article_striped' => 0,
                'video_card_type' => 2,
                'category_card_type' => 10,
                'category_striped' => 0,
                'a_card_type' => 6,
                'a_view_type' => 1,
                'a_table_type' => 1,
                'a_striped' => 0,
                'slider_type' => 5,
                'slider_anim' => 1,
                'category_filter_type' => 1,
                'quick_access_panel_type' => 8,
                'section_header_type' => 6,
                'contact_type' => 6,
            ],
            [
                'land_id' => 4,
                'color' => 4,
                'radius' => 4,
                'border_type' => 2,
                'product_card_type' => 14,
                'product_list_type' => 3,
                'product_striped' => 0,
                'article_card_type' => 9,
                'article_striped' => 0,
                'video_card_type' => 5,
                'category_card_type' => 14,
                'category_striped' => 0,
                'a_card_type' => 1,
                'a_view_type' => 2,
                'a_table_type' => 1,
                'a_striped' => 0,
                'slider_type' => 3,
                'slider_anim' => 1,
                'category_filter_type' => 1,
                'quick_access_panel_type' => 3,
                'section_header_type' => 3,
                'contact_type' => 2,
            ],
            [
                'land_id' => 5,
                'color' => 5,
                'radius' => 4,
                'border_type' => 0,
                'product_card_type' => 1,
                'product_list_type' => 4,
                'product_striped' => 0,
                'article_card_type' => 10,
                'article_striped' => 0,
                'video_card_type' => 6,
                'category_card_type' => 1,
                'category_striped' => 0,
                'a_card_type' => 6,
                'a_view_type' => 3,
                'a_table_type' => 1,
                'a_striped' => 0,
                'slider_type' => 3,
                'slider_anim' => 1,
                'category_filter_type' => 1,
                'quick_access_panel_type' => 4,
                'section_header_type' => 4,
                'contact_type' => 3,
            ],
            [
                'land_id' => 6,
                'color' => 6,
                'radius' => 8,
                'border_type' => 1,
                'product_card_type' => 13,
                'product_list_type' => 4,
                'product_striped' => 0,
                'article_card_type' => 8,
                'article_striped' => 0,
                'video_card_type' => 4,
                'category_card_type' => 13,
                'category_striped' => 0,
                'a_card_type' => 3,
                'a_view_type' => 1,
                'a_table_type' => 1,
                'a_striped' => 0,
                'slider_type' => 3,
                'slider_anim' => 1,
                'category_filter_type' => 1,
                'quick_access_panel_type' => 5,
                'section_header_type' => 5,
                'contact_type' => 4,
            ],
            [
                'land_id' => 7,
                'color' => 7,
                'radius' => 4,
                'border_type' => 1,
                'product_card_type' => 12,
                'product_list_type' => 5,
                'product_striped' => 0,
                'article_card_type' => 7,
                'article_striped' => 0,
                'video_card_type' => 3,
                'category_card_type' => 12,
                'category_striped' => 0,
                'a_card_type' => 1,
                'a_view_type' => 6,
                'a_table_type' => 1,
                'a_striped' => 0,
                'slider_type' => 4,
                'slider_anim' => 1,
                'category_filter_type' => 1,
                'quick_access_panel_type' => 6,
                'section_header_type' => 6,
                'contact_type' => 5,
            ],
            [
                'land_id' => 8,
                'color' => 8,
                'radius' => 4,
                'border_type' => 0,
                'product_card_type' => 10,
                'product_list_type' => 3,
                'product_striped' => 0,
                'article_card_type' => 7,
                'article_striped' => 0,
                'video_card_type' => 2,
                'category_card_type' => 11,
                'category_striped' => 0,
                'a_card_type' => 7,
                'a_view_type' => 6,
                'a_table_type' => 1,
                'a_striped' => 0,
                'slider_type' => 1,
                'slider_anim' => 1,
                'category_filter_type' => 1,
                'quick_access_panel_type' => 4,
                'section_header_type' => 4,
                'contact_type' => 1,
            ],
            [
                'land_id' => 9,
                'color' => 9,
                'radius' => 4,
                'border_type' => 0,
                'product_card_type' => 5,
                'product_list_type' => 5,
                'product_striped' => 0,
                'article_card_type' => 8,
                'article_striped' => 0,
                'video_card_type' => 2,
                'category_card_type' => 3,
                'category_striped' => 0,
                'a_card_type' => 3,
                'a_view_type' => 6,
                'a_table_type' => 1,
                'a_striped' => 0,
                'slider_type' => 1,
                'slider_anim' => 1,
                'category_filter_type' => 1,
                'quick_access_panel_type' => 3,
                'section_header_type' => 0,
                'contact_type' => 2,
            ],
            [
                'land_id' => 10,
                'color' => 10,
                'radius' => 2,
                'border_type' => 1,
                'product_card_type' => 15,
                'product_list_type' => 2,
                'product_striped' => 0,
                'article_card_type' => 6,
                'article_striped' => 0,
                'video_card_type' => 1,
                'category_card_type' => 15,
                'category_striped' => 0,
                'a_card_type' => 7,
                'a_view_type' => 6,
                'a_table_type' => 1,
                'a_striped' => 0,
                'slider_type' => 1,
                'slider_anim' => 1,
                'category_filter_type' => 1,
                'quick_access_panel_type' => 0,
                'section_header_type' => 2,
                'contact_type' => 1,
            ],
            [
                'land_id' => 11,
                'color' => 11,
                'radius' => 4,
                'border_type' => 0,
                'product_card_type' => 12,
                'product_list_type' => 5,
                'product_striped' => 0,
                'article_card_type' => 7,
                'article_striped' => 0,
                'video_card_type' => 5,
                'category_card_type' => 5,
                'category_striped' => 0,
                'a_card_type' => 6,
                'a_view_type' => 2,
                'a_table_type' => 1,
                'a_striped' => 0,
                'slider_type' => 3,
                'slider_anim' => 1,
                'category_filter_type' => 1,
                'quick_access_panel_type' => 1,
                'section_header_type' => 4,
                'contact_type' => 2,
            ],
            [
                'land_id' => 12,
                'color' => 12,
                'radius' => 2,
                'border_type' => 1,
                'product_card_type' => 11,
                'product_list_type' => 3,
                'product_striped' => 0,
                'article_card_type' => 5,
                'article_striped' => 0,
                'video_card_type' => 6,
                'category_card_type' => 14,
                'category_striped' => 0,
                'a_card_type' => 6,
                'a_view_type' => 5,
                'a_table_type' => 1,
                'a_striped' => 0,
                'slider_type' => 1,
                'slider_anim' => 1,
                'category_filter_type' => 1,
                'quick_access_panel_type' => 3,
                'section_header_type' => 2,
                'contact_type' => 4,
            ],
            [
                'land_id' => 13,
                'color' => 1,
                'radius' => 0,
                'border_type' => 0,
                'product_card_type' => 1,
                'product_list_type' => 1,
                'product_striped' => 0,
                'article_card_type' => 1,
                'article_striped' => 0,
                'video_card_type' => 1,
                'category_card_type' => 1,
                'category_striped' => 0,
                'a_card_type' => 1,
                'a_view_type' => 1,
                'a_table_type' => 1,
                'a_striped' => 0,
                'slider_type' => 1,
                'slider_anim' => 1,
                'category_filter_type' => 1,
                'quick_access_panel_type' => 1,
                'section_header_type' => 1,
                'contact_type' => 1,
            ],
            [
                'land_id' => 14,
                'color' => 14,
                'radius' => 4,
                'border_type' => 0,
                'product_card_type' => 5,
                'product_list_type' => 1,
                'product_striped' => 0,
                'article_card_type' => 8,
                'article_striped' => 0,
                'video_card_type' => 4,
                'category_card_type' => 9,
                'category_striped' => 0,
                'a_card_type' => 3,
                'a_view_type' => 2,
                'a_table_type' => 1,
                'a_striped' => 0,
                'slider_type' => 1,
                'slider_anim' => 1,
                'category_filter_type' => 1,
                'quick_access_panel_type' => 0,
                'section_header_type' => 4,
                'contact_type' => 6,
            ],
            [
                'land_id' => 15,
                'color' => 15,
                'radius' => 8,
                'border_type' => 0,
                'product_card_type' => 4,
                'product_list_type' => 2,
                'product_striped' => 0,
                'article_card_type' => 5,
                'article_striped' => 0,
                'video_card_type' => 2,
                'category_card_type' => 3,
                'category_striped' => 0,
                'a_card_type' => 1,
                'a_view_type' => 1,
                'a_table_type' => 1,
                'a_striped' => 0,
                'slider_type' => 1,
                'slider_anim' => 1,
                'category_filter_type' => 1,
                'quick_access_panel_type' => 0,
                'section_header_type' => 6,
                'contact_type' => 4,
            ],
            [
                'land_id' => 16,
                'color' => 16,
                'radius' => 6,
                'border_type' => 0,
                'product_card_type' => 6,
                'product_list_type' => 4,
                'product_striped' => 0,
                'article_card_type' => 5,
                'article_striped' => 0,
                'video_card_type' => 6,
                'category_card_type' => 6,
                'category_striped' => 0,
                'a_card_type' => 2,
                'a_view_type' => 5,
                'a_table_type' => 1,
                'a_striped' => 0,
                'slider_type' => 5,
                'slider_anim' => 1,
                'category_filter_type' => 1,
                'quick_access_panel_type' => 0,
                'section_header_type' => 3,
                'contact_type' => 7,
            ],
            [
                'land_id' => 17,
                'color' => 17,
                'radius' => 2,
                'border_type' => 0,
                'product_card_type' => 3,
                'product_list_type' => 3,
                'product_striped' => 0,
                'article_card_type' => 7,
                'article_striped' => 0,
                'video_card_type' => 1,
                'category_card_type' => 3,
                'category_striped' => 0,
                'a_card_type' => 5,
                'a_view_type' => 5,
                'a_table_type' => 1,
                'a_striped' => 0,
                'slider_type' => 5,
                'slider_anim' => 1,
                'category_filter_type' => 1,
                'quick_access_panel_type' => 3,
                'section_header_type' => 2,
                'contact_type' => 6,
            ],
            [
                'land_id' => 18,
                'color' => 18,
                'radius' => 4,
                'border_type' => 0,
                'product_card_type' => 5,
                'product_list_type' => 3,
                'product_striped' => 0,
                'article_card_type' => 5,
                'article_striped' => 0,
                'video_card_type' => 3,
                'category_card_type' => 5,
                'category_striped' => 0,
                'a_card_type' => 4,
                'a_view_type' => 2,
                'a_table_type' => 1,
                'a_striped' => 0,
                'slider_type' => 5,
                'slider_anim' => 1,
                'category_filter_type' => 1,
                'quick_access_panel_type' => 0,
                'section_header_type' => 4,
                'contact_type' => 7,
            ],
            [
                'land_id' => 19,
                'color' => 19,
                'radius' => 1,
                'border_type' => 0,
                'product_card_type' => 0,
                'product_list_type' => 1,
                'product_striped' => 1,
                'article_card_type' => 0,
                'article_striped' => 1,
                'video_card_type' => 0,
                'category_card_type' => 1,
                'category_striped' => 1,
                'a_card_type' => 0,
                'a_view_type' => 1,
                'a_table_type' => 1,
                'a_striped' => 1,
                'slider_type' => 0,
                'slider_anim' => 1,
                'category_filter_type' => 1,
                'quick_access_panel_type' => 1,
                'section_header_type' => 1,
                'contact_type' => 1,
            ],
            [
                'land_id' => 20,
                'color' => 20,
                'radius' => 20,
                'border_type' => 4,
                'product_card_type' => 1,
                'product_list_type' => 16,
                'product_striped' => 3,
                'article_card_type' => 0,
                'article_striped' => 11,
                'video_card_type' => 0,
                'category_card_type' => 7,
                'category_striped' => 8,
                'a_card_type' => 0,
                'a_view_type' => 7,
                'a_table_type' => 1,
                'a_striped' => 1,
                'slider_type' => 0,
                'slider_anim' => 5,
                'category_filter_type' => 1,
                'quick_access_panel_type' => 7,
                'section_header_type' => 2,
                'contact_type' => 7,
            ],
            [
                'land_id' => 21,
                'color' => 21,
                'radius' => 3,
                'border_type' => 12,
                'product_card_type' => 1,
                'product_list_type' => 3,
                'product_striped' => 4,
                'article_card_type' => 0,
                'article_striped' => 4,
                'video_card_type' => 0,
                'category_card_type' => 1,
                'category_striped' => 11,
                'a_card_type' => 1,
                'a_view_type' => 1,
                'a_table_type' => 1,
                'a_striped' => 1,
                'slider_type' => 0,
                'slider_anim' => 1,
                'category_filter_type' => 1,
                'quick_access_panel_type' => 1,
                'section_header_type' => 1,
                'contact_type' => 1,
            ],
            [
                'land_id' => 22,
                'color' => 3,
                'radius' => 12,
                'border_type' => 1,
                'product_card_type' => 3,
                'product_list_type' => 4,
                'product_striped' => 0,
                'article_card_type' => 4,
                'article_striped' => 0,
                'video_card_type' => 1,
                'category_card_type' => 11,
                'category_striped' => 1,
                'a_card_type' => 1,
                'a_view_type' => 1,
                'a_table_type' => 1,
                'a_striped' => 0,
                'slider_type' => 1,
                'slider_anim' => 1,
                'category_filter_type' => 1,
                'quick_access_panel_type' => 1,
                'section_header_type' => 1,
                'contact_type' => 1,
            ],
            [
                'land_id' => 23,
                'color' => 1,
                'radius' => 8,
                'border_type' => 0,
                'product_card_type' => 11,
                'product_list_type' => 1,
                'product_striped' => 1,
                'article_card_type' => 5,
                'article_striped' => 1,
                'video_card_type' => 6,
                'category_card_type' => 10,
                'category_striped' => 1,
                'a_card_type' => 5,
                'a_view_type' => 1,
                'a_table_type' => 1,
                'a_striped' => 1,
                'slider_type' => 1,
                'slider_anim' => 1,
                'category_filter_type' => 1,
                'quick_access_panel_type' => 1,
                'section_header_type' => 1,
                'contact_type' => 1,
            ],
            [
                'land_id' => 24,
                'color' => 1,
                'radius' => 8,
                'border_type' => 0,
                'product_card_type' => 11,
                'product_list_type' => 1,
                'product_striped' => 1,
                'article_card_type' => 5,
                'article_striped' => 1,
                'video_card_type' => 6,
                'category_card_type' => 10,
                'category_striped' => 1,
                'a_card_type' => 5,
                'a_view_type' => 1,
                'a_table_type' => 1,
                'a_striped' => 1,
                'slider_type' => 1,
                'slider_anim' => 1,
                'category_filter_type' => 1,
                'quick_access_panel_type' => 1,
                'section_header_type' => 1,
                'contact_type' => 1,
            ]
        ];
        DB::table('land_styles')->insert($styles);

    }
}