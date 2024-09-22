<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :default="$category" method="put" :action="route('panel.landing.product.category.update', $category)">
{{--            @dd($category->toArray())--}}
            <x-layout.panel.form.card title="Edit Category">

                <x-layout.panel.form.alerts/>
                <x-layout.panel.form.division>
                    <x-splade-select name="attributes[]" label="Attributes" multiple choices relation>
                        @foreach($attributes as $parent)
                            <optgroup label="{{$parent->name}}">
                                @foreach($parent->child as $child)
                                    <option value="{{$child->id}}">{{$child->name}}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </x-splade-select>
{{--                    <label>--}}
{{--                        <select name="attribute-test[]" multiple >--}}
{{--                            @foreach($attributes as $parent)--}}
{{--                                <optgroup label="{{$parent->name}}">--}}
{{--                                    @foreach($parent->child as $child)--}}
{{--                                        <option value="{{$child->id}}" {{in_array($child->id,$category->attributes()->pluck('id')->toArray()) ? 'selected' : ''}}>{{$child->name}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </optgroup>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </label>--}}
                    <x-splade-input name="title" label="Title" required/>
                    <x-splade-input name="slug" label="Slug"/>
                    <x-splade-textarea name="description" label="Description"/>
                </x-layout.panel.form.division>

                <x-splade-submit label="Update"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
