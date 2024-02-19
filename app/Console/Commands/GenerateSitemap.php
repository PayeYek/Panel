<?php

namespace App\Console\Commands;

use App\Models\Land;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';

    protected $description = 'Generate the sitemap.';

    public function handle()
    {
        $sitemap = Sitemap::create()
            ->add(route('index'))
            ->add(route('landing.page.list'));

        \App\Models\Land::with([
            'products',
            'articles'
        ])->latest()->get()->each(function (\App\Models\Land $land) use (&$sitemap) {
            /* add page */
            $sitemap->add(route('landing.page.show', ['page' => $land->slug]));

            /* add page about */
            $sitemap->add(route('landing.page.about', ['page' => $land->slug]));

            /* add page products */
            $sitemap->add(route('landing.product.list', ['page' => $land->slug]));

            /* add page product single */
            $cats = array();
            foreach ($land->products as $product) {
                $sitemap->add(route('landing.product.show', ['page' => $land->slug, 'product' => $product->slug]));
                $cats[] = $product->category_id;
            }

            /* add page categories */
            $cats = array_unique($cats);
            foreach ($cats as $cat) {
                $sitemap->add(route('landing.product.category', [
                    'page' => $land->slug,
                    'category' => \App\Models\LandCategory::find($cat)->slug
                ]));
            }

            /* add page articles */
            $sitemap->add(route('landing.article.list', ['page' => $land->slug]));

            /* add page article single */
            foreach ($land->articles as $article) {
                $sitemap->add(route('landing.article.show', ['page' => $land->slug, 'article' => $article->slug]));
            }

            /* add page videos */

        });

        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}
