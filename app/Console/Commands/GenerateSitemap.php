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
        // NOTE: routes are the German Volt routes from routes/web.php.
        // /leistungen/cloud + /leistungen/design are intentionally excluded:
        // they render empty placeholders (no content, no SEO meta) as of 2026-09.
        SitemapGenerator::create('https://websters.at')
            ->getSitemap()
            ->add(Url::create('/'))
            ->add(Url::create('/projekte'))
            ->add(Url::create('/kontakt'))
            ->add(Url::create('/ueber-uns'))
            ->add(Url::create('/leistungen'))
            ->add(Url::create('/leistungen/webdesign'))
            ->add(Url::create('/leistungen/consulting'))
            ->add(Url::create('/leistungen/software'))
            ->add(Url::create('/impressum'))
            ->add(Url::create('/datenschutz'))
            ->add(Url::create('/agbs'))
            ->writeToFile(public_path('sitemap.xml'));
    }
}
