<div class="bg-dark text-white  p-4" style="width: 260px;">
      <h4 class="text-center mb-4 fw-semibold">Admin Panel</h4>

      {{-- Dashboard --}}
      <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center gap-2 p-2 mb-2 rounded text-white text-decoration-none 
       {{ request()->routeIs('admin.dashboard') ? 'bg-secondary' : 'bg-transparent' }} hover-shadow">
            🏠 <span>Dashboard</span>
      </a>

      {{-- Newsletters --}}
      <a href="{{ route('admin.newsletters.index') }}" class="d-flex align-items-center gap-2 p-2 mb-2 rounded text-white text-decoration-none
       {{ request()->routeIs('admin.newsletters.index') ? 'bg-secondary' : 'bg-transparent' }}">
            📰 <span>All Newsletters</span>
      </a>

      <a href="{{ route('admin.newsletters.create') }}" class="d-flex align-items-center gap-2 p-2 mb-2 rounded text-white text-decoration-none
       {{ request()->routeIs('admin.newsletters.create') ? 'bg-secondary' : 'bg-transparent' }}">
            ➕ <span>Create Newsletter</span>
      </a>

      <hr class="border-secondary my-3">

      {{-- Categories --}}
      <a href="{{ route('admin.categories.index') }}" class="d-flex align-items-center gap-2 p-2 mb-2 rounded text-white text-decoration-none
       {{ request()->routeIs('admin.categories.index') ? 'bg-secondary' : 'bg-transparent' }}">
            📂 <span>All Categories</span>
      </a>

      <a href="{{ route('admin.categories.create') }}" class="d-flex align-items-center gap-2 p-2 mb-2 rounded text-white text-decoration-none
       {{ request()->routeIs('admin.categories.create') ? 'bg-secondary' : 'bg-transparent' }}">
            ➕ <span>Create Category</span>
      </a>

      {{-- Tags --}}
      <a href="{{ route('admin.tags.index') }}" class="d-flex align-items-center gap-2 p-2 mb-2 rounded text-white text-decoration-none
       {{ request()->routeIs('admin.tags.index') ? 'bg-secondary' : 'bg-transparent' }}">
            🏷️ <span>All Tags</span>
      </a>

      <a href="{{ route('admin.tags.create') }}" class="d-flex align-items-center gap-2 p-2 mb-2 rounded text-white text-decoration-none
       {{ request()->routeIs('admin.tags.create') ? 'bg-secondary' : 'bg-transparent' }}">
            ➕ <span>Create Tag</span>
      </a>

      <hr class="border-secondary my-3">

      <a href="#" class="d-flex align-items-center gap-2 p-2 rounded text-white text-decoration-none">
            ⚙️ <span>Settings</span>
      </a>

      <a href="#" class="d-flex align-items-center gap-2 p-2 mt-2 rounded text-white text-decoration-none">
            🚪 <span>Logout</span>
      </a>
</div>