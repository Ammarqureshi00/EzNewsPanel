<div class="bg-dark text-white p-4" style="width: 260px; min-height: 100vh;">
      <h4 class="text-center mb-4 fw-semibold">Newsletter Panel</h4>

      {{-- Dashboard --}}
      <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center px-3 py-2 mb-2 rounded text-white text-decoration-none
       {{ request()->routeIs('admin.dashboard') ? 'bg-secondary' : '' }}">
            🏠 <span class="ms-2">Dashboard</span>
      </a>

      {{-- All Newsletters --}}
      <a href="{{ route('admin.newsletters.index') }}" class="d-flex align-items-center px-3 py-2 mb-2 rounded text-white text-decoration-none
       {{ request()->routeIs('admin.newsletters.index') ? 'bg-secondary' : '' }}">
            📰 <span class="ms-2">All Newsletters</span>
      </a>

      {{-- Create Newsletter --}}
      <a href="{{ route('admin.newsletters.create') }}" class="d-flex align-items-center px-3 py-2 mb-2 rounded text-white text-decoration-none
       {{ request()->routeIs('admin.newsletters.create') ? 'bg-secondary' : '' }}">
            ➕ <span class="ms-2">Create Newsletter</span>
      </a>

      <hr class="border-secondary my-3">

      {{-- Settings --}}
      <a href="#" class="d-flex align-items-center px-3 py-2 rounded text-white text-decoration-none">
            ⚙️ <span class="ms-2">Settings</span>
      </a>

      {{-- Logout --}}
      <a href="#" class="d-flex align-items-center px-3 py-2 mt-2 rounded text-white text-decoration-none">
            🚪 <span class="ms-2">Logout</span>
      </a>
</div>