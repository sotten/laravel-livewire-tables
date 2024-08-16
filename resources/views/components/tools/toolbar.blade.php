@aware(['component', 'tableName','isTailwind','isBootstrap'])
@props([])

@if ($this->hasConfigurableAreaFor('before-toolbar'))
    @include($this->getConfigurableAreaFor('before-toolbar'), $this->getParametersForConfigurableArea('before-toolbar'))
@endif

<div @class([
        'd-md-flex justify-content-between mb-3' => $this->isBootstrap,
        'md:flex md:justify-between mb-4 px-4 md:p-0' => $this->isTailwind,
    ])
>
    <div @class([
            'd-md-flex' => $this->isBootstrap,
            'w-full mb-4 md:mb-0 md:w-2/4 md:flex space-y-4 md:space-y-0 md:space-x-2' => $this->isTailwind,
        ])
    >
        @if ($this->hasConfigurableAreaFor('toolbar-left-start'))
            <div x-cloak x-show="!currentlyReorderingStatus" @class([
                'mb-3 mb-md-0 input-group' => $this->isBootstrap,
                'flex rounded-md shadow-sm' => $this->isTailwind,
            ])>
                @include($this->getConfigurableAreaFor('toolbar-left-start'), $this->getParametersForConfigurableArea('toolbar-left-start'))
            </div>
        @endif

        @if ($this->reorderIsEnabled())
            <x-livewire-tables::tools.toolbar.items.reorder-buttons />
        @endif

        @if ($this->searchIsEnabled() && $this->searchVisibilityIsEnabled())
            <x-livewire-tables::tools.toolbar.items.search-field />
        @endif

        @if ($this->filtersAreEnabled() && $this->filtersVisibilityIsEnabled() && $this->hasVisibleFilters())
            <x-livewire-tables::tools.toolbar.items.filter-button />
        @endif

        @if ($this->hasConfigurableAreaFor('toolbar-left-end'))
            <div x-cloak x-show="!currentlyReorderingStatus" @class([
                'mb-3 mb-md-0 input-group' => $this->isBootstrap,
                'flex rounded-md shadow-sm' => $this->isTailwind,
            ])>
                @include($this->getConfigurableAreaFor('toolbar-left-end'), $this->getParametersForConfigurableArea('toolbar-left-end'))
            </div>
        @endif
    </div>

    <div x-cloak x-show="!currentlyReorderingStatus"
        @class([
            'd-md-flex' => $this->isBootstrap,
            'md:flex md:items-center space-y-4 md:space-y-0 md:space-x-2' => $this->isTailwind,
        ])
    >
        @if ($this->hasConfigurableAreaFor('toolbar-right-start'))
            @include($this->getConfigurableAreaFor('toolbar-right-start'), $this->getParametersForConfigurableArea('toolbar-right-start'))
        @endif

        @if ($this->showBulkActionsDropdownAlpine() && $this->shouldAlwaysHideBulkActionsDropdownOption != true)
            <x-livewire-tables::tools.toolbar.items.bulk-actions />
        @endif

        @if ($this->columnSelectIsEnabled())
            <x-livewire-tables::tools.toolbar.items.column-select />
        @endif

        @if ($this->paginationIsEnabled() && $this->perPageVisibilityIsEnabled())
            <x-livewire-tables::tools.toolbar.items.pagination-dropdown />
        @endif

        @if ($this->hasConfigurableAreaFor('toolbar-right-end'))
            @include($this->getConfigurableAreaFor('toolbar-right-end'), $this->getParametersForConfigurableArea('toolbar-right-end'))
        @endif
    </div>
</div>
@if (
    $this->filtersAreEnabled() &&
    $this->filtersVisibilityIsEnabled() &&
    $this->hasVisibleFilters() &&
    $this->isFilterLayoutSlideDown()
)
    <x-livewire-tables::tools.toolbar.items.filter-slidedown  />
@endif


@if ($this->hasConfigurableAreaFor('after-toolbar'))
    <div x-cloak x-show="!currentlyReorderingStatus" >
        @include($this->getConfigurableAreaFor('after-toolbar'), $this->getParametersForConfigurableArea('after-toolbar'))
    </div>
@endif
