<div class="bg-dark text-white p-4" style="width: 260px; min-height: 100vh;">
      <h4 class="text-center mb-4 fw-semibold">Category Panel</h4>

      {{-- Dashboard --}}
      <a href="{{ route('admin.dashboard') }}" class="d-block px-3 py-2 mb-2 rounded text-white text-decoration-none 
       {{ request()->routeIs('admin.dashboard') ? 'bg-secondary' : '' }}">
            🏠 Dashboard
      </a>

      {{-- All Categories --}}
      <a href="{{ route('admin.categories.index') }}" class="d-block px-3 py-2 mb-2 rounded text-white text-decoration-none
       {{ request()->routeIs('admin.categories.index') ? 'bg-secondary' : '' }}">
            📂 All Categories
      </a>

      {{-- Add Category --}}
      <a href="{{ route('admin.categories.create') }}" class="d-block px-3 py-2 mb-2 rounded text-white text-decoration-none
       {{ request()->routeIs('admin.categories.create') ? 'bg-secondary' : '' }}">
            ➕ Add Category
      </a>

      <hr class="border-secondary my-3">

      {{-- Settings --}}
      <a href="#" class="d-block px-3 py-2 mb-2 rounded text-white text-decoration-none">
            ⚙️ Settings
      </a>

      {{-- Logout --}}
      <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                  class="d-flex align-items-center px-3 py-2 mt-2 rounded text-white btn btn-link text-start w-100">
                  🚪 <span class="ms-2">Logout</span>
            </button>
      </form>
</div>