<?php

use Livewire\Volt\Component;

new class extends Component {
    //
};

?>

<div class="mt-32">

    <article class="font-poppins">
        <header class="relative py-12 lg:py-16 overflow-hidden">
            <img
                class="pointer-events-none absolute -top-60 left-0 -z-10 h-[calc(100%+15rem)] w-full object-cover object-bottom lg:-top-36 lg:h-[calc(100%+9rem)]"
                src="https://tailkits.com/ui/iframe/assets/img/bg-1.png"
                alt="Background Gradient"
            />
            <div class="max-w-7xl mx-auto px-4 xl:px-0">
                <div class="flex flex-col items-start lg:px-8 xl:px-24">
                    <h1
                        class="bg-gradient-to-b from-[#002a42] to-slate-600 bg-clip-text text-3xl font-semibold leading-snug text-transparent lg:text-4xl lg:leading-tight xl:text-5xl xl:leading-tight"
                    >
                        Mobile-First Design Principles
                    </h1>
                    <p
                        class="mt-4 text-sm font-normal leading-relaxed text-slate-600 sm:w-2/3 md:w-1/2 lg:text-base"
                    >
                        This is a placeholder introduction for the article. Replace this text
                        with your actual content later.
                    </p>
                    <div class="mt-8 flex w-full grow items-end lg:mt-9">
                        <div class="flex w-full flex-wrap items-center justify-between gap-4">
                            <div class="flex flex-wrap items-center gap-2.5">
                                <a
                                    class="text-sm font-medium text-slate-600 transition hover:text-slate-500"
                                    href="#"
                                    title="written by Author"
                                >
                                    by John Doe
                                </a>
                                <div class="flex items-center gap-x-1.5">
                                    <span class="h-1 w-1 rounded-full bg-slate-200"></span>
                                    <div class="text-sm font-medium text-slate-500">
                                        Updated on
                                        <time> September 12, 2025</time>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center gap-x-1.5">
                                <span class="h-1 w-1 rounded-full bg-slate-200"></span>
                                <span class="text-sm font-medium text-slate-500"> 8 mins </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-9 border-b border-b-slate-200 lg:mt-12"></div>
            </div>
        </header>

        <section>
            <div
                class="max-w-7xl mx-auto grid items-start px-4 pb-10 lg:grid-cols-[auto_30%] lg:gap-x-12 lg:gap-y-0 lg:px-8 lg:pb-12 xl:gap-x-16 xl:px-24 xl:px-24"
            >
                <!-- Sidebar / Table of contents -->
                <aside class="sticky order-1 mb-6 lg:order-2 lg:mb-0 top-6">
                    <details
                        class="group flex flex-col rounded-2xl border border-slate-200 bg-white/60 p-4 transition-all hover:border-slate-300 xl:p-6"
                        open
                    >
                        <summary
                            class="cursor-pointer select-none text-base font-semibold text-slate-800 lg:text-lg"
                        >
                            Inhalt
                        </summary>
                        <nav class="mt-3 flex flex-col items-start">
                            <ul
                                class="space-y-2 text-sm font-medium text-slate-600 lg:text-base"
                            >
                                <li>
                                    <a
                                        class="transition-colors hover:text-slate-800"
                                        href="#section-1"
                                    >Section One</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="transition-colors hover:text-slate-800"
                                        href="#section-2"
                                    >Section Two</a
                                    >
                                    <ul
                                        class="ml-4 mt-1.5 space-y-1.5 text-sm font-normal text-slate-500"
                                    >
                                        <li>
                                            <a
                                                class="transition-colors hover:text-slate-700"
                                                href="#subsection"
                                            >Subsection Example</a
                                            >
                                        </li>
                                        <li>
                                            <a
                                                class="transition-colors hover:text-slate-700"
                                                href="#subsection"
                                            >Subsection Example</a
                                            >
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a
                                        class="transition-colors hover:text-slate-800"
                                        href="#section-3"
                                    >Section Three</a
                                    >
                                </li>
                                <li>
                                    <a class="transition-colors hover:text-slate-800" href="#faq"
                                    >FAQ</a
                                    >
                                </li>
                            </ul>
                        </nav>
                    </details>
                </aside>

                <!-- Main content -->
                <section class="order-2 lg:order-1">
                    <div class="flex flex-col space-y-5 text-sm leading-relaxed text-slate-700 lg:text-base">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur
                            tristique turpis non nibh tincidunt, nec eleifend nisl laoreet.
                        </p>

                        <img
                            class="h-52 rounded-2xl object-cover object-left-top lg:h-80"
                            src="https://tailkits.com/ui/iframe/assets/img/bg-linear-3.png"
                            alt="Placeholder image"
                            loading="lazy"
                        />

                        <h2
                            class="mt-6 text-2xl font-semibold text-slate-900 lg:mt-8 lg:text-3xl"
                            id="section-1"
                        >
                            Section One Heading
                        </h2>
                        <p>
                            Dummy text for section one. Replace this block with your actual
                            article content. Vestibulum id velit sit amet quam tincidunt
                            volutpat.
                        </p>

                        <ul class="list-disc space-y-2 pl-5 text-slate-700">
                            <li>Point one of the list with example explanation.</li>
                            <li>Point two of the list that expands the idea.</li>
                            <li>Point three with more dummy filler text.</li>
                        </ul>

                        <h2
                            class="mt-6 text-2xl font-semibold text-slate-900 lg:mt-8 lg:text-3xl"
                            id="section-2"
                        >
                            Section Two Heading
                        </h2>
                        <p>
                            More placeholder text for section two. Ut commodo sem at lacus
                            luctus, et porttitor nulla commodo.
                        </p>

                        <h2
                            class="mt-6 text-2xl font-semibold text-slate-900 lg:mt-8 lg:text-3xl"
                            id="faq"
                        >
                            FAQ
                        </h2>

                        <h3
                            class="mt-5 text-xl font-semibold text-slate-800 lg:text-2xl"
                            id="faq-q1"
                        >
                            How do I replace this dummy text?
                        </h3>
                        <p>
                            Simply edit the paragraph with your real article content.
                        </p>

                        <h3
                            class="mt-5 text-xl font-semibold text-slate-800 lg:text-2xl"
                            id="faq-q2"
                        >
                            Can I use custom styles?
                        </h3>
                        <p>
                            Yes, all headings, lists, and paragraphs are styled directly with
                            Tailwind classes instead of prose.
                        </p>
                    </div>
                </section>
            </div>
        </section>

        <!-- Author / bottom card -->
        <section class="pb-10 lg:pb-14">
            <div class="max-w-7xl mx-auto px-4 xl:px-0 lg:px-8 xl:px-24">
                <div
                    class="group flex flex-col items-center rounded-2xl border border-slate-200 bg-white/60 p-6 transition-all hover:border-slate-300 md:flex-row md:gap-x-6"
                >
                    <figure class="shrink-0">
                        <img
                            class="aspect-square h-24 rounded-full border border-slate-100 object-cover md:h-32"
                            src="https://tailkits.com/ui/iframe/assets/img/testimonial-1.png"
                            alt="Author"
                            loading="lazy"
                        />
                    </figure>
                    <div
                        class="mt-6 flex flex-col items-center text-center md:mt-0 md:items-start md:text-left"
                    >
                        <div class="flex flex-wrap items-center gap-2.5 lg:gap-3">
                            <a
                                class="text-lg font-semibold text-slate-800 lg:text-xl"
                                href="#"
                                title="Author profile"
                            >
                                John Doe
                            </a>
                            <div
                                class="inline-flex items-center justify-center rounded-full bg-slate-50 px-3 py-0.5 text-sm font-medium text-slate-700 whitespace-nowrap border border-slate-200"
                            >
                                Developer
                            </div>
                        </div>

                        <p
                            class="mt-2.5 text-sm font-normal leading-relaxed text-slate-600 lg:text-base"
                        >
                            Placeholder author bio. Replace this area with real info about the
                            writer or contributor.
                        </p>

                        <div class="mt-6 flex flex-wrap items-center gap-4">
                            <a href="#" title="LinkedIn" target="_blank" rel="noreferrer">
                                <svg
                                    class="h-5 text-slate-700 transition hover:text-slate-900"
                                    viewBox="0 0 16 16"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M2.13332 1.06641C1.54422 1.06641 1.06665 1.54397 1.06665 2.13307V13.8664C1.06665 14.4555 1.54422 14.9331 2.13332 14.9331H13.8667C14.4558 14.9331 14.9333 14.4555 14.9333 13.8664V2.13307C14.9333 1.54397 14.4558 1.06641 13.8667 1.06641H2.13332ZM3.25332 6.39974H5.27998V12.7997H3.25332V6.39974ZM5.41332 4.27174C5.41332 4.90503 4.89994 5.41841 4.26665 5.41841C3.63337 5.41841 3.11998 4.90503 3.11998 4.27174C3.11998 3.63845 3.63337 3.12507 4.26665 3.12507C4.89994 3.12507 5.41332 3.63845 5.41332 4.27174ZM12.8 8.91401C12.8 6.98863 11.5556 6.24009 10.3194 6.24009C9.91467 6.22015 9.51167 6.30501 9.15064 6.48621C8.87649 6.62381 8.58948 6.93865 8.36816 7.48617H8.31123V6.40021H6.39998V12.8048H8.43322V9.39835C8.40382 9.04948 8.51547 8.59859 8.74389 8.33027C8.97231 8.06195 9.29907 7.99787 9.54681 7.96533H9.62407C10.2706 7.96533 10.7505 8.36562 10.7505 9.37433V12.8048H12.7837L12.8 8.91401Z"
                                        fill="currentColor"
                                    />
                                </svg>
                            </a>
                            <a href="#" title="X" target="_blank" rel="noreferrer">
                                <svg
                                    class="h-5 text-slate-700 transition hover:text-slate-900"
                                    viewBox="0 0 16 16"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M7.71553 5.00909C7.71553 3.16647 9.20886 1.67285 11.0506 1.67285C12.1318 1.67285 12.9952 2.18429 13.5737 2.92648C14.195 2.79936 14.7794 2.56945 15.308 2.2558C15.0996 2.90742 14.6585 3.45528 14.0835 3.80198C14.084 3.8031 14.0844 3.80423 14.085 3.80535C14.6489 3.73689 15.1854 3.58693 15.6851 3.36553L15.6839 3.36734C15.3244 3.90566 14.8726 4.38089 14.3531 4.76807C14.3811 4.95621 14.3953 5.1456 14.3953 5.33389C14.3953 9.26595 11.3997 13.8393 5.88925 13.8393C4.20162 13.8393 2.62975 13.3448 1.30667 12.4959C1.05876 12.3369 0.986733 12.007 1.1458 11.7591C1.15984 11.7371 1.17524 11.7166 1.19178 11.6974C1.28616 11.5413 1.46596 11.446 1.65904 11.4687C2.63532 11.5838 3.61134 11.4648 4.47162 11.089C3.61836 10.7127 2.95599 9.98344 2.66879 9.08743C2.61711 8.92622 2.65419 8.74969 2.76636 8.62288C2.77025 8.61848 2.77421 8.61417 2.77823 8.60995C2.09479 8.00845 1.66366 7.12726 1.66366 6.14524V6.10914C1.66366 5.93906 1.75367 5.78167 1.90027 5.69543C1.94844 5.66709 2.00035 5.64783 2.05363 5.63766C1.81914 5.18535 1.68652 4.67154 1.68652 4.12726C1.68652 3.62814 1.68938 2.99909 2.04083 2.43257C2.11961 2.30558 2.24804 2.22814 2.38544 2.20979C2.58756 2.14624 2.81688 2.20738 2.95895 2.3816C4.123 3.80905 5.80332 4.79526 7.71586 5.05529L7.71553 5.00909ZM5.88925 12.7726C5.04941 12.7726 4.24295 12.6328 3.4906 12.3755C4.40541 12.2171 5.28323 11.8567 6.03961 11.2639C6.19953 11.1386 6.26323 10.9261 6.19863 10.7335C6.13403 10.5409 5.95515 10.4098 5.752 10.4062C5.00228 10.3929 4.33821 10.0233 3.92308 9.45939C4.12612 9.44297 4.32452 9.40813 4.5167 9.35616C4.73172 9.29801 4.87849 9.09959 4.87114 8.87697C4.86379 8.65434 4.70426 8.46604 4.48587 8.42218C3.65535 8.25547 2.98537 7.64519 2.73242 6.84957C2.94667 6.90131 3.16904 6.93208 3.39709 6.93955C3.61129 6.94656 3.80417 6.81073 3.86976 6.6067C3.93534 6.40266 3.85772 6.17988 3.67956 6.06077C3.0562 5.64403 2.64652 4.93266 2.64652 4.12726C2.64652 3.94865 2.64904 3.78924 2.65974 3.64471C4.10784 5.11878 6.08926 6.06831 8.29422 6.17932C8.46102 6.18772 8.62212 6.1175 8.7295 5.98961C8.83689 5.8617 8.87816 5.69089 8.84103 5.52807C8.80267 5.35989 8.7822 5.18674 8.7822 5.00909C8.7822 3.75528 9.79825 2.73952 11.0506 2.73952C12.3672 2.73952 13.3286 3.95926 13.3286 5.33389C13.3286 8.80727 10.6882 12.7726 5.88925 12.7726Z"
                                        fill="currentColor"
                                    />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </article>
</div>
