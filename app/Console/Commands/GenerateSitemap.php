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
            ->add('https://paye1.com')
            ->add('https://paye1.com/ad')
            ->add('https://paye1.com/price')
            ->add('https://paye1.com/legal/terms')
            ->add('https://paye1.com/info')
            ->add('https://paye1.com/login')
            ->add('https://paye1.com/add')
        ;

        \App\Models\Ad::approved()->latest()->get()->each(function (\App\Models\Ad $ad) use (&$sitemap) {
            /* add page */
            $sitemap->add('https://paye1.com/ad/'. $ad->id);
        });

        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}
