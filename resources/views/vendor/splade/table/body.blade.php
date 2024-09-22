<tbody class="divide-y divide-gray-200 dark:divide-gray-600 bg-white dark:bg-gray-800">
@forelse($table->resource as $itemKey => $item)
    <tr
        :class="{
                'bg-gray-100 dark:bg-gray-700': table.striped && @js($itemKey) % 2,
                'hover:bg-gray-200 dark:hover:bg-gray-600': table.striped,
                'hover:bg-gray-100 dark:hover:bg-gray-700': !table.striped
            }"
    >
        @if($hasBulkActions = $table->hasBulkActions())
            <td width="64" class="text-xs px-6 py-4">
                @php $itemPrimaryKey = $table->findPrimaryKey($item) @endphp

                <input
                    @change="(e) => table.setSelectedItem(@js($itemPrimaryKey), e.target.checked)"
                    :checked="table.itemIsSelected(@js($itemPrimaryKey))"
                    :disabled="table.allItemsFromAllPagesAreSelected"
                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                    name="table-row-bulk-action"
                    type="checkbox"
                    value="{{ $itemPrimaryKey }}"
                />
            </td>
        @endif

        @foreach($table->columns() as $column)
            <td
                @if($table->rowLinks->has($itemKey))
                    @click="(event) => table.visit(@js($table->rowLinks->get($itemKey)), @js($table->rowLinkType), event)"
                @endif
                v-show="table.columnIsVisible(@js($column->key))"
                class="whitespace-nowrap text-sm dark:text-white @if($loop->first && $hasBulkActions) pe-6 @else px-6 @endif py-4 @if($column->highlight) text-gray-900 font-medium @else text-gray-500 @endif @if($table->rowLinks->has($itemKey)) cursor-pointer @endif {{ $column->classes }}"
            >
                <div
                    class="flex flex-row items-center @if($column->alignment == 'right') justify-end @elseif($column->alignment == 'center') justify-center @else justify-start @endif">
                    @isset(${'spladeTableCell' . $column->keyHash()})
                        {{ ${'spladeTableCell' . $column->keyHash()}($item, $itemKey) }}
                    @else
                        {!! nl2br(e($getColumnDataFromItem($item, $column))) !!}
                    @endisset
                </div>
            </td>
        @endforeach
    </tr>
@empty
    <tr>
        <td colspan="{{ $table->columns()->count() }}" class="whitespace-nowrap">
            @if(isset($emptyState) && !!$emptyState)
                {{ $emptyState }}
            @else
                <div class="text-gray-700 dark:text-gray-300 px-6 py-48 font-medium text-sm flex flex-col items-center justify-center gap-3.5">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="h-28 fill-current opacity-35">
                        <path
                            d="M12,20H5a1,1,0,0,1-1-1V5A1,1,0,0,1,5,4h5V7a3,3,0,0,0,3,3h3v1a1,1,0,0,0,2,0V9s0,0,0-.06a1.31,1.31,0,0,0-.06-.27l0-.09a1.07,1.07,0,0,0-.19-.28h0l-6-6h0a1.07,1.07,0,0,0-.28-.19.32.32,0,0,0-.09,0A.88.88,0,0,0,11.05,2H5A3,3,0,0,0,2,5V19a3,3,0,0,0,3,3h7a1,1,0,0,0,0-2ZM12,5.41,14.59,8H13a1,1,0,0,1-1-1ZM7,8a1,1,0,0,0,0,2H8A1,1,0,0,0,8,8ZM21.71,20.29l-1.17-1.16A3.44,3.44,0,0,0,20,15h0A3.49,3.49,0,0,0,14,17.49a3.46,3.46,0,0,0,5.13,3.05l1.16,1.17a1,1,0,0,0,1.42,0A1,1,0,0,0,21.71,20.29Zm-3.17-1.75a1.54,1.54,0,0,1-2.11,0A1.5,1.5,0,0,1,16,17.49a1.46,1.46,0,0,1,.44-1.06,1.48,1.48,0,0,1,1-.43A1.47,1.47,0,0,1,19,17.49,1.5,1.5,0,0,1,18.54,18.54ZM13,12H7a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2Zm-2,6a1,1,0,0,0,0-2H7a1,1,0,0,0,0,2Z"/>
                    </svg>

                    <span>{{ __('There are no items to show.') }}</span>
                </div>
            @endif
        </td>
    </tr>
@endforelse
</tbody>
