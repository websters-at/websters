<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'websters:generate-sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generator for the sitemap.xml file';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        SitemapGenerator::create('https://websters.at')
            ->getSitemap()
            ->add(Url::create('/'))
            ->add(Url::create('/projects'))
            ->add(Url::create('/contact'))
            ->add(Url::create('/about'))
            ->add(Url::create('/services'))
            ->add(Url::create('/services/webdesign'))
            ->add(Url::create('/services/consulting'))
            ->add(Url::create('/services/software'))
            ->add(Url::create('/imprint'))
            ->add(Url::create('/data-privacy'))
            ->add(Url::create('/terms'))
            ->writeToFile(public_path('sitemap.xml'));
    }
}
