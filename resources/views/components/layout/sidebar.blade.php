<aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidenav">
  <div class="overflow-y-auto py-5 px-3 h-full bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
      <div class="hidden sm:flex items-center mb-6 space-x-2">
        <a href="https://flowbite.com" class="flex items-center space-x-2">
          <img src="https://flowbite.s3.amazonaws.com/logo.svg" class="h-8" alt="FlowBite Logo" />
          <span class="text-xl font-semibold dark:text-white">Flowbite</span>
        </a>
      </div>

    <ul class="pt-5 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700">
        <!-- Dashboard -->
        <x-sidebar-menu 
            title="Dashboard"
            :route="route('dashboard')"
            :icon="<<<'HTML'
                <svg class='w-6 h-6 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white' fill='currentColor' viewBox='0 0 20 20'>
                    <path d='M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z'></path>
                    <path d='M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z'></path>
                </svg>
            HTML"
        >
        </x-sidebar-menu>
    </ul>

    <ul class="pt-5 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700">
        <!-- Data Induk -->
        <x-sidebar-menu 
            title="Data Induk"
            :route="route('employee.index')"
            :icon="<<<'HTML'
                <svg class='w-6 h-6 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white' fill='currentColor' viewBox='0 0 20 20'>
                    <path d='M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z'></path>
                    <path d='M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z'></path>
                </svg>
            HTML"
        >
        </x-sidebar-menu>
    </ul>
      
    <ul class="pt-5 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700">
        @role('admin')
        <x-sidebar-menu 
            title="User Management"
            dropdownId="dropdown-user"
            :routes="['settings/users*', 'settings/roles*']"
            :icon="<<<'HTML'
                <svg class='w-6 h-6 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white' fill='currentColor' viewBox='0 0 20 20'><path d='M9 2a3 3 0 11-6 0 3 3 0 016 0zM6 12a6 6 0 10-6 6 6 6 0 006-6zm12 0a6 6 0 10-6 6 6 6 0 006-6z'></path></svg>
            HTML"
        >
            <li>
                <a href="{{ route('users.index') }}"
                    class="flex items-center p-2 pl-11 w-full text-base font-normal rounded-lg transition duration-75 group
                    {{ request()->is('settings/users*') ? 'bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                    User
                </a>
            </li>
            <li>
                <a href="{{ route('roles.index') }}"
                    class="flex items-center p-2 pl-11 w-full text-base font-normal rounded-lg transition duration-75 group
                    {{ request()->is('settings/roles*') ? 'bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                    Role
                </a>
            </li>
        </x-sidebar-menu>
        @endrole
    </ul>
  </div>
</aside>