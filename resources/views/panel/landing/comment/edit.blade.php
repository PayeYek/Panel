<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :default="$comment" method="put" :action="route('panel.landing.comment.update', $comment)">

            <x-layout.panel.form.card title="Edit Comment">
                <x-layout.panel.form.alerts/>

                <x-layout.panel.form.division col="1">
                    {{--PRODUCTS--}}
                    {{--<x-splade-select name="commentable_id" label="Product" :options="$products" choices/>--}}
                    <x-splade-input name="land_id" disabled class="hidden" />
                    <x-splade-input name="product_id" disabled class="hidden" />
                    <x-splade-input name="name" disabled class="hidden" />



                    {{--COMMENT--}}
                    <x-splade-textarea name="comment" label="Comment" required autosize rows="4"/>

                    {{--STATUS--}}
                    <x-splade-group name="approved" label="Status" inline required>
                        <x-splade-radio name="approved" value="0" label="Unconfirmed" :checked="$comment->approved == 0"/>
                        <x-splade-radio name="approved" value="1" label="Published" :checked="$comment->approved == 1"/>
                    </x-splade-group>
                </x-layout.panel.form.division>

                <x-splade-submit label="Update"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>

</x-layout.admin>
