<?php
use Livewire\Volt\Component;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\TwitterCard;

new class extends Component {
    public function mount(): void {
        $siteUrl = 'https://websters.at';
        $pageUrl = route('projects');

        /*
        |--------------------------------------------------------------------------
        | SEO META (OPTIMIERT)
        |--------------------------------------------------------------------------
        */

        SEOMeta::setTitle('Projekte – Webdesign, Web-Apps, Games & Software aus Engerwitzdorf');
        SEOMeta::setDescription(
            'Unsere Projekte: PriceMatters Preisvergleich, BeBetter Habit-Tracking, lebe-gesund.at, MIRACLE Band-Website, SpaceRunner Browser-Game u.v.m. – designed & entwickelt von Websters.'
        );
        SEOMeta::setCanonical($pageUrl);

        SEOMeta::addKeyword([
            'Websters Projekte',
            'Webdesign Referenzen Oberösterreich',
            'PriceMatters',
            'BeBetter App',
            'SpaceRunner Game',
            'Softwareentwicklung Engerwitzdorf',
            'Webentwicklung Portfolio'
        ]);

        /*
        |--------------------------------------------------------------------------
        | OPEN GRAPH
        |--------------------------------------------------------------------------
        */

        OpenGraph::setTitle('Projekte – Web-Apps, Websites & Games | Websters');
        OpenGraph::setDescription('Echte Projekte aus Engerwitzdorf: Preisvergleich, Habit-Tracking, Band-Website, Browser-Game & mehr.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Websters');
        OpenGraph::setType('website');
        OpenGraph::addImage($siteUrl . '/assets/projects/pricematters.webp', [
            'width'  => 1440,
            'height' => 900,
            'alt'    => 'PriceMatters – ehrlicher Preisvergleich'
        ]);

        /*
        |--------------------------------------------------------------------------
        | TWITTER CARD
        |--------------------------------------------------------------------------
        */

        TwitterCard::setTitle('Unsere Projekte | Websters');
        TwitterCard::setDescription('Echte Projekte: Web-Apps, Websites, Games & MVPs aus Engerwitzdorf.');
        TwitterCard::setSite('@WebstersAgency');

        /*
        |--------------------------------------------------------------------------
        | JSON-LD: PROJECTS AS ITEMLIST
        |--------------------------------------------------------------------------
        */

        JsonLd::setType('ItemList');
        JsonLd::setTitle('Projekte der Websters');
        JsonLd::setDescription('Web-Apps, Websites, Browser-Game und MVPs – designed & entwickelt in Engerwitzdorf.');
        JsonLd::setUrl($pageUrl);

        JsonLd::addValue('itemListElement', [
            [
                '@type' => 'ListItem',
                'position' => 1,
                'item' => [
                    '@type' => 'WebApplication',
                    'name' => 'PriceMatters – Ehrlicher Preisvergleich',
                    'description' => 'Echte Grundpreise (€/kg, €/L, €/Stück) für Amazon-Produkte, ohne Werbung und Fake-Rabatte.',
                    'url' => 'https://pricematters.websters.at/'
                ],
            ],
            [
                '@type' => 'ListItem',
                'position' => 2,
                'item' => [
                    '@type' => 'MobileApplication',
                    'name' => 'BeBetter – Habit-Tracking PWA',
                    'description' => 'Gewohnheiten tracken, Tasks verwalten und Streak-Battles gegen Freunde gewinnen.',
                    'url' => 'https://bebetter.websters.at/'
                ],
            ],
            [
                '@type' => 'ListItem',
                'position' => 3,
                'item' => [
                    '@type' => 'WebSite',
                    'name' => 'lebe-gesund.at – Ernährung & Balance',
                    'description' => 'Website für Ernährungstrainerin Ulrike Ruep aus Engerwitzdorf.',
                    'url' => 'https://lebe-gesund.at/'
                ],
            ],
            [
                '@type' => 'ListItem',
                'position' => 4,
                'item' => [
                    '@type' => 'WebSite',
                    'name' => 'MIRACLE – Band-Website',
                    'description' => 'Offizielle Website des oberösterreichischen Duos Hannah & Sophie.',
                    'url' => 'https://miracle.websters.at/'
                ],
            ],
            [
                '@type' => 'ListItem',
                'position' => 5,
                'item' => [
                    '@type' => 'VideoGame',
                    'name' => 'SpaceRunner – Browser-Platformer',
                    'description' => 'Kostenloser Canvas-Platformer: Solo, Koop & Multiplayer mit globalem Leaderboard.',
                    'url' => 'https://spacerunner.websters.at/'
                ],
            ],
        ]);
    }
};

?>

@php
    $liveProjects = [
        [
            'title' => 'BeBetter',
            'tagline' => 'Habit-Tracking, das kleben bleibt',
            'badge' => 'Live',
            'badge_color' => 'bg-success',
            'kind' => 'PWA · Eigenes Produkt',
            'image' => asset('/assets/projects/bebetter.webp'),
            'alt' => 'BeBetter – Habit-Tracking mit Year-Grid und Streak-Statistiken',
            'desc' => 'Gewohnheiten tracken, Tasks verwalten und Streak-Battles gegen Freunde gewinnen – als installierbare App mit Push-Erinnerungen, Foto-Verifizierung und Year-Grid im GitHub-Stil.',
            'tags' => ['Vue 3', 'Express', 'Prisma', 'PWA'],
            'link' => 'https://bebetter.websters.at/',
        ],
        [
            'title' => 'lebe-gesund.at',
            'tagline' => 'Ernährung · Energie · Balance',
            'badge' => 'Live',
            'badge_color' => 'bg-success',
            'kind' => 'Website · Kundenprojekt',
            'image' => asset('/assets/projects/lebe-gesund.webp'),
            'alt' => 'lebe-gesund.at – Website für Ernährungstrainerin Ulrike Ruep',
            'desc' => 'Website für Ernährungstrainerin Ulrike Ruep aus Engerwitzdorf: Ernährung, RINGANA-Partnerschaft, PranaVita und Biokybernetik – ruhig, klar und modern umgesetzt.',
            'tags' => ['Vue 3', 'Tailwind CSS', 'GSAP'],
            'link' => 'https://lebe-gesund.at/',
        ],
        [
            'title' => 'MIRACLE',
            'tagline' => 'Hannah & Sophie · Oberösterreich',
            'badge' => 'Live',
            'badge_color' => 'bg-success',
            'kind' => 'Band-Website',
            'image' => asset('/assets/projects/miracle.webp'),
            'alt' => 'MIRACLE – Band-Website mit Disco-Kugel, Gigs und Instagram-Reels',
            'desc' => 'Offizielle Website des Duos Hannah (Gitarre) & Sophie (Gesang): Gigs, Reels und Disco-Kugel in 3D – zweisprachig auf Deutsch und Englisch, mit MusicGroup-Schema.',
            'tags' => ['Vue 3', 'GSAP', 'DE + EN'],
            'link' => 'https://miracle.websters.at/',
        ],
        [
            'title' => 'SpaceRunner',
            'tagline' => 'Solo · Koop · Multiplayer',
            'badge' => 'Live · Spielbar',
            'badge_color' => 'bg-success',
            'kind' => 'Browser-Game',
            'image' => asset('/assets/projects/spacerunner.webp'),
            'alt' => 'SpaceRunner – Pixel-Platformer mit Spielmodi und Highscores',
            'desc' => 'Kostenloser Canvas-Platformer direkt im Browser: Solo, Koop und Multiplayer mit Seeded Runs, globalem Leaderboard und Highscores – ganz ohne Installation.',
            'tags' => ['Canvas', 'Socket.IO', 'MariaDB'],
            'link' => 'https://spacerunner.websters.at/',
        ],
    ];
@endphp


<section
    class="lg:pt-16 lg:mb-24"
    id="projects"
    x-data="{ show: false }"
    x-intersect="show = true"
>

    <div class="max-w-7xl mx-auto px-4 xl:px-0 flex flex-col items-start lg:items-center">

        <!-- Section Badge -->
        <div
            class="inline-flex items-center justify-center rounded-full font-poppins font-medium text-white badge badge-secondary badge-lg sm:badge-xl px-2 py-1 text-xs sm:px-3 sm:py-1.5 sm:text-sm fade-up"
            :class="{ 'show': show }"
            style="transition-delay:.05s"
        >
            Unsere Projekte
        </div>

        <!-- Section Heading -->
        <h1
            class="bg-gradient-to-b from-[#002a42] to-slate-500 bg-clip-text font-poppins text-2xl font-bold text-transparent lg:text-5xl mt-6 text-left lg:text-center w-full lg:w-1/2 lg:leading-tight xl:mt-9 fade-up"
            :class="{ 'show': show }"
            style="transition-delay:.15s"
        >
            Gebaut, gelauncht &amp; live
        </h1>

        <!-- Subtext -->
        <p
            class="text-sm font-medium text-slate-600 leading-normal lg:text-base mt-4 text-left lg:text-center w-full lg:w-2/3 xl:w-2/5 fade-up"
            :class="{ 'show': show }"
            style="transition-delay:.25s"
        >
            Echte Produkte, echte Websites, echte Games – allesamt designed &amp; entwickelt in Engerwitzdorf. Schau dich um, alles ist live und klickbar.
        </p>

        <!-- Featured: PriceMatters -->
        <article
            class="mt-12 w-full flex flex-col overflow-hidden rounded-2xl border border-neutral-200 shadow-[0_2px_10px_rgba(0,0,0,0.05)] lg:mt-16 lg:grid lg:grid-cols-2 lg:rounded-[2rem] fade-up"
            :class="{ 'show': show }"
            style="transition-delay:.35s"
        >
            <div class="relative">
                <img
                    class="h-60 w-full object-cover object-top sm:h-72 lg:h-full lg:min-h-[26rem]"
                    src="{{ asset('/assets/projects/pricematters.webp') }}"
                    alt="PriceMatters – ehrlicher Preisvergleich mit Grundpreisen"
                    loading="lazy"
                    width="1440"
                    height="900"
                    decoding="async"
                />
                <div class="absolute left-4 top-4 rounded-full text-sm font-semibold text-white px-3 py-1 bg-primary">
                    Featured
                </div>
            </div>

            <div class="flex flex-col justify-center p-6 lg:p-10">
                <div class="flex flex-wrap items-center gap-x-2 gap-y-1.5">
                    <div class="font-bold text-brand-dark text-xl lg:text-2xl">PriceMatters</div>
                    <div class="rounded-full text-sm font-semibold text-white px-2 py-0.5 bg-success">
                        Live
                    </div>
                </div>
                <p class="mt-1 text-sm font-semibold text-slate-500">Ehrlicher Preisvergleich · Eigenes Produkt</p>

                <p class="mt-4 text-sm font-medium text-neutral-500 lg:text-base">
                    Echte Grundpreise in €/kg, €/L und €/Stück für Amazon-Produkte –
                    ganz ohne Werbung und Fake-Rabatte. DACH-first, auf Deutsch und
                    Englisch, mit Preisalarmen und mehreren Marken-Domains.
                </p>

                <div class="mt-4 flex flex-wrap gap-2">
                    <span class="rounded-full bg-slate-100 px-2.5 py-0.5 text-xs font-semibold text-slate-600">Nuxt 3</span>
                    <span class="rounded-full bg-slate-100 px-2.5 py-0.5 text-xs font-semibold text-slate-600">FastAPI</span>
                    <span class="rounded-full bg-slate-100 px-2.5 py-0.5 text-xs font-semibold text-slate-600">PostgreSQL</span>
                    <span class="rounded-full bg-slate-100 px-2.5 py-0.5 text-xs font-semibold text-slate-600">Redis</span>
                </div>

                <div class="mt-6">
                    <a
                        href="https://pricematters.websters.at/"
                        target="_blank"
                        rel="noopener"
                        class="btn-fancy btn btn-sm text-white lg:btn-md btn-primary inline-flex items-center gap-2"
                    >
                        Live ansehen
                        <x-icon name="fas.arrow-up-right-from-square" class="h-3.5 w-3.5" />
                    </a>
                </div>
            </div>
        </article>

        <!-- Grid: live projects -->
        <div class="mt-6 grid gap-y-4 w-full md:gap-y-6 md:px-4 lg:mt-8 lg:grid-cols-2 lg:gap-x-6 lg:gap-y-6 lg:px-8">

            @foreach ($liveProjects as $i => $card)
                <article
                    class="flex flex-col rounded-2xl border border-neutral-200 p-4 shadow-[0_2px_10px_rgba(0,0,0,0.05)] lg:justify-between lg:rounded-[2rem] lg:p-6 fade-up"
                    :class="{ 'show': show }"
                    style="transition-delay:.{{ 45 + $i * 10 }}s"
                >
                    <div>
                        <img
                            class="mb-4 h-52 w-full rounded-lg object-cover object-top sm:h-64 lg:mb-6 lg:h-72 lg:rounded-2xl"
                            src="{{ $card['image'] }}"
                            alt="{{ $card['alt'] }}"
                            loading="lazy"
                            width="1440"
                            height="900"
                            decoding="async"
                        />

                        <div class="mt-4 flex flex-wrap items-center gap-x-2 gap-y-1.5 lg:mt-6">
                            <div class="font-bold text-brand-dark text-lg">{{ $card['title'] }}</div>

                            <div class="rounded-full text-sm font-semibold text-white px-2 py-0.5 {{ $card['badge_color'] }}">
                                {{ $card['badge'] }}
                            </div>
                        </div>

                        <p class="mt-1 text-sm font-semibold text-slate-500">{{ $card['tagline'] }} · {{ $card['kind'] }}</p>

                        <p class="mt-2 text-sm font-medium text-neutral-500">
                            {{ $card['desc'] }}
                        </p>

                        <div class="mt-3 flex flex-wrap gap-2">
                            @foreach ($card['tags'] as $tag)
                                <span class="rounded-full bg-slate-100 px-2.5 py-0.5 text-xs font-semibold text-slate-600">{{ $tag }}</span>
                            @endforeach
                        </div>
                    </div>

                    <a
                        href="{{ $card['link'] }}"
                        target="_blank"
                        rel="noopener"
                        class="btn-fancy btn btn-sm text-white lg:btn-md mt-4 btn-primary inline-flex items-center justify-center gap-2"
                    >
                        Live ansehen
                        <x-icon name="fas.arrow-up-right-from-square" class="h-3.5 w-3.5" />
                    </a>
                </article>
            @endforeach

        </div>

        <!-- Archive: NightCrown -->
        <article
            class="mt-6 w-full flex flex-col overflow-hidden rounded-2xl border border-neutral-200 shadow-[0_2px_10px_rgba(0,0,0,0.05)] lg:mt-8 lg:grid lg:grid-cols-[1fr_1.4fr] lg:rounded-[2rem] fade-up"
            :class="{ 'show': show }"
            style="transition-delay:.85s"
        >
            <div class="flex flex-col justify-center p-6 lg:p-10 order-2 lg:order-1">
                <div class="flex flex-wrap items-center gap-x-2 gap-y-1.5">
                    <div class="font-bold text-brand-dark text-xl">NightCrown</div>
                    <div class="rounded-full text-sm font-semibold text-white px-2 py-0.5 bg-neutral">
                        Archiv
                    </div>
                </div>
                <p class="mt-1 text-sm font-semibold text-slate-500">Nightlife-App · MVP-Prototyp · pausiert</p>

                <p class="mt-4 text-sm font-medium text-neutral-500">
                    „Own the Night“ als App-Prototyp: Swipe-Feed, Leaderboard und
                    Rewards-System mit Wallet – ehrlicherweise unfertig und aktuell
                    pausiert. Trotzdem drin, weil auch Experimente zu uns gehören.
                </p>

                <div class="mt-4 flex flex-wrap gap-2">
                    <span class="rounded-full bg-slate-100 px-2.5 py-0.5 text-xs font-semibold text-slate-600">React</span>
                    <span class="rounded-full bg-slate-100 px-2.5 py-0.5 text-xs font-semibold text-slate-600">Supabase</span>
                    <span class="rounded-full bg-slate-100 px-2.5 py-0.5 text-xs font-semibold text-slate-600">Vite</span>
                </div>

                <div class="mt-6">
                    <a
                        href="https://nightcrown.websters.at/"
                        target="_blank"
                        rel="noopener"
                        class="btn btn-sm lg:btn-md btn-outline inline-flex items-center gap-2"
                    >
                        Prototyp ansehen
                        <x-icon name="fas.arrow-up-right-from-square" class="h-3.5 w-3.5" />
                    </a>
                </div>
            </div>

            <div class="relative order-1 lg:order-2">
                <img
                    class="h-60 w-full object-cover object-top grayscale sm:h-72 lg:h-full lg:min-h-[22rem]"
                    src="{{ asset('/assets/projects/nightcrown.webp') }}"
                    alt="NightCrown – Nightlife-App-Prototyp mit Login-Screen"
                    loading="lazy"
                    width="1440"
                    height="900"
                    decoding="async"
                />
            </div>
        </article>

        <!-- CTA -->
        <div
            class="mt-12 w-full lg:mt-16 flex flex-col items-center text-center fade-up"
            :class="{ 'show': show }"
            style="transition-delay:.95s"
        >
            <h2
                class="bg-gradient-to-b from-[#002a42] to-slate-500 bg-clip-text font-poppins text-xl font-bold text-transparent lg:text-3xl"
            >
                Dein Projekt als Nächstes?
            </h2>
            <p class="text-sm font-medium text-slate-600 leading-normal lg:text-base mt-3 w-full lg:w-2/5">
                Website, Web-App oder doch ein Game? Erzähl uns von deiner Idee –
                wir melden uns innerhalb von 24 Stunden.
            </p>
            <a
                href="{{ route('contact') }}"
                wire:navigate
                class="btn-fancy btn btn-md text-white lg:btn-lg mt-6 btn-primary inline-flex items-center gap-2"
            >
                Projekt anfragen
                <x-icon name="fas.arrow-right" class="h-4 w-4" />
            </a>
        </div>

    </div>
</section>
