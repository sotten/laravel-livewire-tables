<div>
    <x-livewire-tables::tools.filter-label :$filter :$filterLayout :$tableName :$isTailwind :$isBootstrap4 :$isBootstrap5 :$isBootstrap />


    @if ($isTailwind)
        <div class="rounded-md shadow-sm">
            <div>
                <input
                    type="checkbox"
                    id="{{ $tableName }}-filter-{{ $filter->getKey() }}-select-all-@if($filter->hasCustomPosition()){{ $filter->getCustomPosition() }}@endif"
                    wire:input="selectAllFilterOptions('{{ $filter->getKey() }}')"
                    class="text-indigo-600 transition duration-150 ease-in-out border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-900 dark:checked:bg-indigo-500 dark:border-gray-600 disabled:opacity-50 disabled:cursor-wait"
                >
                <label for="{{ $tableName }}-filter-{{ $filter->getKey() }}-select-all-@if($filter->hasCustomPosition()){{ $filter->getCustomPosition() }}@endif" class="dark:text-white">
                @if ($filter->getFirstOption() != "")
                    {{ $filter->getFirstOption() }}
                @else
                    {{ __('livewire-tables::core.All') }}
                @endif
                </label>
            </div>

            @foreach($filter->getOptions() as $key => $value)
                <div wire:key="{{ $tableName }}-filter-{{ $filter->getKey() }}-multiselect-{{ $key }}-@if($filter->hasCustomPosition()){{ $filter->getCustomPosition() }}@endif">
                    <input
                        type="checkbox"
                        id="{{ $tableName }}-filter-{{ $filter->getKey() }}-{{ $loop->index }}-@if($filter->hasCustomPosition()){{ $filter->getCustomPosition() }}@endif"
                        value="{{ $key }}"
                        wire:key="{{ $tableName }}-filter-{{ $filter->getKey() }}-{{ $loop->index }}-@if($filter->hasCustomPosition()){{ $filter->getCustomPosition() }}@endif"
                        {{ $filter->getWireMethod("filterComponents.".$filter->getKey()) }}
                        class="text-indigo-600 transition duration-150 ease-in-out border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-900 dark:checked:bg-indigo-500 dark:border-gray-600 disabled:opacity-50 disabled:cursor-wait"
                    >
                    <label for="{{ $tableName }}-filter-{{ $filter->getKey() }}-{{ $loop->index }}-@if($filter->hasCustomPosition()){{ $filter->getCustomPosition() }}@endif" class="dark:text-white">{{ $value }}</label>
                </div>
            @endforeach
        </div>
    @elseif ($isBootstrap)
        <div class="form-check">
            <input
                type="checkbox"
                id="{{ $tableName }}-filter-{{ $filter->getKey() }}-select-all-@if($filter->hasCustomPosition()){{ $filter->getCustomPosition() }}@endif"
                wire:input="selectAllFilterOptions('{{ $filter->getKey() }}')"
                class="form-check-input"
            >
            <label class="form-check-label" for="{{ $tableName }}-filter-{{ $filter->getKey() }}-@if($filter->hasCustomPosition()){{ $filter->getCustomPosition() }}@endif-select-all">{{ __('livewire-tables::core.All') }}</label>
        </div>

        @foreach($filter->getOptions() as $key => $value)
            <div class="form-check" wire:key="{{ $tableName }}-filter-{{ $filter->getKey() }}-multiselect-{{ $key }}-@if($filter->hasCustomPosition()){{ $filter->getCustomPosition() }}@endif">
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="{{ $tableName }}-filter-{{ $filter->getKey() }}-{{ $loop->index }}-@if($filter->hasCustomPosition()){{ $filter->getCustomPosition() }}@endif"
                    value="{{ $key }}"
                    wire:key="{{ $tableName }}-filter-{{ $filter->getKey() }}-{{ $loop->index }}-@if($filter->hasCustomPosition()){{ $filter->getCustomPosition() }}@endif"
                    {{ $filter->getWireMethod("filterComponents.".$filter->getKey()) }}

                >
                <label class="form-check-label" for="{{ $tableName }}-filter-{{ $filter->getKey() }}-{{ $loop->index }}-@if($filter->hasCustomPosition()){{ $filter->getCustomPosition() }}@endif">{{ $value }}</label>
            </div>
        @endforeach
    @endif
</div>
