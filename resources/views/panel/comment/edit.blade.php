<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :default="$comment" method="put" :action="route('panel.interaction.comment.update', $comment)">

            <x-layout.panel.form.card title="Edit Comment">
                <x-layout.panel.form.alerts/>

                <x-layout.panel.form.division col="1">
                    {{--PRODUCTS--}}
                    {{--<x-splade-select name="commentable_id" label="Product" :options="$products" choices/>--}}
                    <x-splade-input name="commentable_id" disabled class="hidden" />
                    <x-splade-input name="commentable_type" disabled class="hidden" />
                    {{--STARS--}}
                    {{--<x-splade-select name="star" label="Score" required  choices="{ searchEnabled: false }">
                        <option value="5">{{ 5 . ' ' . __('Star')}}</option>
                        <option value="4">{{ 4 . ' ' . __('Star')}}</option>
                        <option value="3">{{ 3 . ' ' . __('Star')}}</option>
                        <option value="2">{{ 2 . ' ' . __('Star')}}</option>
                        <option value="1">{{ 1 . ' ' . __('Star')}}</option>
                    </x-splade-select>--}}
                    <x-splade-input name="star" disabled class="hidden" />


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
