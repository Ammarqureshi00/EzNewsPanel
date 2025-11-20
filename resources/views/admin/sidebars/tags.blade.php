<div class="bg-dark text-white min-vh-100 p-3" style="width: 260px;">
      <h4 class="mb-4">Tags Panel</h4>

      {{-- Dashboard --}}
      <a href="{{ route('admin.dashboard') }}" class="d-block py-2 px-3 mb-1 text-white rounded
       {{ request()->routeIs('admin.dashboard') ? 'bg-secondary' : '' }}">
            <i class="bi bi-speedometer2 me-2"></i> Dashboard
      </a>

      {{-- All Tags --}}
      <a href="{{ route('admin.tags.index') }}" class="d-block py-2 px-3 mb-1 text-white rounded
       {{ request()->routeIs('admin.tags.index') ? 'bg-secondary' : '' }}">
            <i class="bi bi-tags me-2"></i> All Tags
      </a>

      {{-- Add Tag --}}
      <a href="{{ route('admin.tags.create') }}" class="d-block py-2 px-3 mb-1 text-white rounded
       {{ request()->routeIs('admin.tags.create') ? 'bg-secondary' : '' }}">
            <i class="bi bi-plus-circle me-2"></i> Add Tag
      </a>

      <hr class="border-secondary my-3">

      {{-- Settings --}}
      <a href="#" class="d-block py-2 px-3 mb-1 text-white rounded text-decoration-none">
            <i class="bi bi-gear me-2"></i> Settings
      </a>

      {{-- Logout --}}
      <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                  class="d-flex align-items-center  px-3 py-2 mt-2 rounded text-white btn btn-link text-start w-100">
                  🚪 <span class="ms-2">Logout</span>
            </button>
      </form>
</div>