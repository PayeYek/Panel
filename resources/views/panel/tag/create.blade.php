<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :action="route('panel.advertise.tag.store')">
            <div class="flex flex-col gap-10">
                <x-layout.panel.form.card title="New Tag">

                    <x-layout.panel.form.alerts/>

                    <x-layout.panel.form.division>

                        <x-splade-input name="title" label="Title" required/>

                        <x-splade-input name="slug" label="Slug" ltr help="simple-slug-text"/>

                    </x-layout.panel.form.division>

                    <x-splade-submit label="Create"/>
                </x-layout.panel.form.card>
            </div>

            <x-splade-script>
                document.addEventListener('DOMContentLoaded', function () {
                    const titleInput = document.querySelector('input[name="title"]');
                    const spanElement = document.querySelector('span.input-help');

                    titleInput.addEventListener('input', function () {
                        if (this.value.trim() !== '') {
                            const titleValue = encodeURIComponent(this.value);
                            const url = `/api/slug/${titleValue}`;

                            fetch(url)
                                .then(response => response.text())
                                .then(slug => {
                                    spanElement.textContent = slug;

                                })
                                .catch(error => console.error('Error fetching the slug:', error));
                        } else {
                            spanElement.textContent = '';
                        }
                    });
                });
            </x-splade-script>

        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
