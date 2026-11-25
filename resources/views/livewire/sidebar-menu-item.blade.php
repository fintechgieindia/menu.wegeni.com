<li>
    <a href="{{ $link }}" wire:navigate
        @class(['flex items-center p-2 text-base text-gray-900 rounded-xl hover:bg-gray-200 group dark:text-gray-200 dark:hover:bg-gray-700', 'sidebar-active-menu-item bg-skin-base text-white font-bold shadow-sm' => $active])>
        {!! $customIcon ?? $icon !!}
        <span class="ltr:ml-3 rtl:mr-3" sidebar-toggle-item>{{ $name }}</span>
    </a>
</li>
