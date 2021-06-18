@if ($columnSelect)
    <div
        x-cloak
        x-data="{ open: false }"
        @keydown.escape.stop="open = false"
        @mousedown.away="open = false"
        class="dropdown mb-3 mb-md-0 pl-0 pl-md-3 d-block d-md-inline"
    >
        <button
            @click="open = !open"
            class="btn dropdown-toggle d-block w-100 d-md-inline"
            type="button"
            id="columnSelect"
            aria-haspopup="true"
            aria-expanded="false"
        >
            @lang('Columns')
        </button>

        <div
            class="dropdown-menu dropdown-menu-right w-100"
            :class="{'show' : open}"
            aria-labelledby="columnSelect"
        >
            @foreach($columns as $column)
                @if ($column->isVisible() && $column->isSelectable())
                    <div wire:key="columnSelect-{{ $loop->index }}">
                        <label class="px-2 {{ $loop->last ? 'mb-0' : 'mb-1' }}">
                            <input
                                wire:model="columnSelectEnabled"
                                wire:target="columnSelectEnabled"
                                wire:loading.attr="disabled"
                                type="checkbox"
                                value="{{ $column->column() }}"
                            />
                            <span class="ml-2">{{ $column->text() }}</span>
                        </label>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endif
