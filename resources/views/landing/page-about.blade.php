<x-layout.default.main :land="$land">

    <main class="relative pt-4 default_container mb-8 sm:mb-24 lg:mb-28">
        <section class="leading-9 custom_article_styles custom_table_striped_container">
            {!! $land->body !!}
        </section>
    </main>
</x-layout.default.main>
