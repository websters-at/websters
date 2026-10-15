<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

/**
 * Pushes all sitemap URLs to Bing/Yandex/DuckDuckGo via IndexNow.
 * Key file: public/{key}.txt (must stay deployed).
 * Usage: php artisan seo:indexnow [--dry]
 */
class SubmitIndexNow extends Command
{
    protected $signature = 'seo:indexnow {--dry : list URLs without submitting}';
    protected $description = 'Submit sitemap URLs to IndexNow (Bing & co)';

    public function handle(): int
    {
        $key = '3c4473d9ce5b95b7706d4fffbf7a7a42';
        $xml = @file_get_contents(url('/sitemap.xml'));
        if ($xml === false) {
            // Fallback: generate list from routes when sitemap is unreachable.
            $urls = [];
            foreach (app('router')->getRoutes()->getRoutes() as $route) {
                if (in_array('GET', $route->methods(), true) && str_starts_with($uri = '/' . ltrim($route->uri(), '/'), '/')
                    && ! str_contains($uri, '{') && $uri !== '/up') {
                    $urls[] = url($uri === '/' ? '/' : $uri);
                }
            }
        } else {
            preg_match_all('/<loc>([^<]+)/', $xml, $m);
            $urls = array_values(array_unique($m[1]));
        }
        // IndexNow wants https host URLs only.
        $urls = array_values(array_filter($urls, fn ($u) => str_starts_with($u, 'https://websters.at')));

        if ($this->option('dry')) {
            $this->info(count($urls) . ' URLs:');
            foreach ($urls as $u) {
                $this->line('  ' . $u);
            }

            return self::SUCCESS;
        }

        $chunks = array_chunk($urls, 100);
        foreach ($chunks as $i => $chunk) {
            $res = Http::timeout(20)->post('https://api.indexnow.org/indexnow', [
                'host' => 'websters.at',
                'key' => $key,
                'keyLocation' => 'https://websters.at/' . $key . '.txt',
                'urlList' => array_values($chunk),
            ]);
            $this->info('batch ' . ($i + 1) . '/' . count($chunks) . ': HTTP ' . $res->status());
            if (! in_array($res->status(), [200, 202], true)) {
                $this->error(substr($res->body(), 0, 200));
            }
        }

        return self::SUCCESS;
    }
}
