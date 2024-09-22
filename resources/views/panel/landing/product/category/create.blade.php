<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :action="route('panel.landing.product.category.store')">
            <div class="flex flex-col gap-10">
                <x-layout.panel.form.card title="New Category">

                    <x-layout.panel.form.alerts/>

                    <x-layout.panel.form.division>
                        <x-splade-select name="attribute[]" label="Attributes" multiple choices>
                            @foreach($attributes as $parent)
                                <optgroup label="{{$parent->name}}">
                                    @foreach($parent->child as $child)
                                        <option value="{{$child->id}}">{{$child->name}}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </x-splade-select>

                        <x-splade-input name="title" label="Title" required/>

                        <x-splade-input name="slug" label="Slug"/>
                        <x-splade-textarea name="description" label="Description"/>

                    </x-layout.panel.form.division>

                    <x-splade-submit label="Create"/>
                </x-layout.panel.form.card>
            </div>

        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
