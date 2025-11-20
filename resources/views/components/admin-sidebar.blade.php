@if (request()->routeIs('admin.newsletters.*'))
@include('admin.sidebars.newsletter')

@elseif (request()->routeIs('admin.categories.*'))
@include('admin.sidebars.categories')

@elseif (request()->routeIs('admin.tags.*'))
@include('admin.sidebars.tags')

@else
{{-- Default sidebar for dashboard --}}
@include('admin.sidebars.dashboard')
@endif