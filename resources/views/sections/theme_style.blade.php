<style>
    :root {
        --color-base: {{ $baseColor }};
        --color-base-hex: {{ $baseColorHex }};
        --livewire-progress-bar-color: {{ $baseColorHex }};
    }

    .sidebar-active-menu-item {
        background-color: var(--color-base-hex) !important;
        color: #ffffff !important;
    }

    .sidebar-active-menu-item svg {
        color: #ffffff !important;
        fill: currentColor !important;
    }

    .sidebar-active-menu-item:hover {
        background-color: var(--color-base-hex) !important;
        color: #ffffff !important;
        opacity: 0.95;
    }

    .sidebar-active-sub-item {
        color: var(--color-base-hex) !important;
        font-weight: 700 !important;
    }
</style>
