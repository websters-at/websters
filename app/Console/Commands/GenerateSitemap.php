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
        SitemapGenerator::create('127.0.0.1:8080')
            ->getSitemap()
            ->add(Url::create('/'))
            ->add(Url::create('/about'))
            ->writeToFile(public_path('sitemap.xml'));
    }
}
