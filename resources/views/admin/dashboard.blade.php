<x-app-layout>

      <div class="flex">
            <!-- Sidebar -->
            <div class="w-64 bg-gray-800 text-white min-h-screen p-6">
                  <h4 class="text-center mb-4 text-lg font-semibold">Admin Panel</h4>

                  <a href="{{ route('admin.dashboard') }}"
                        class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">Dashboard</a>

                  <a href="{{ route('admin.newsletters.index') }}"
                        class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">All Newsletter</a>
                  <a href="{{ route('admin.newsletters.create') }}"
                        class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">Create
                        Newsletter</a>
                  <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">Settings</a>
                  <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">Logout</a>
            </div>
            <div class="flex-1 p-6 bg-gray-100">

                  <!-- Welcome Message -->
                  <div class="text-center mb-5">
                        @if(auth()->check())
                        <h1 class="display-5 fw-bold">Welcome, {{ auth()->user()->name }}</h1>
                        @else
                        <h1 class="display-5 fw-bold">Welcome, Admin</h1>
                        @endif
                        <p class="text-muted">Manage your newsletters and subscribers efficiently from this dashboard.
                        </p>
                  </div>

                  <!-- Top Stats Cards -->
                  <div class="row mb-4">
                        <div class="col-sm-6 col-lg-3 mb-3">
                              <div class="card shadow-sm">
                                    <div class="card-body text-center">
                                          <h6 class="text-muted">Total Newsletters</h6>
                                          <h3 class="fw-bold">{{ $newsletters->count() }}</h3>
                                    </div>
                              </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 mb-3">
                              <div class="card shadow-sm">
                                    <div class="card-body text-center">
                                          <h6 class="text-muted">Total Subscribers</h6>
                                          <h3 class="fw-bold">{{ $subscribers->count() }}</h3>
                                    </div>
                              </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 mb-3">
                              <div class="card shadow-sm">
                                    <div class="card-body text-center">
                                          <h6 class="text-muted">Sent This Month</h6>
                                          <h3 class="fw-bold">{{ $sentThisMonth }}</h3>
                                    </div>
                              </div>
                        </div>
                        {{-- <div class="col-sm-6 col-lg-3 mb-3">
                              <div class="card shadow-sm">
                                    <div class="card-body text-center">
                                          <h6 class="text-muted">Drafts</h6>
                                          <h3 class="fw-bold">{{ $drafts }}</h3>
                                    </div>
                              </div>
                        </div> --}}
                  </div>

                  <!-- Charts & Recent Activity -->
                  <div class="row mb-4">
                        <!-- Subscribers Growth Chart -->
                        <div class="col-lg-8 mb-3">
                              <div class="card shadow-sm">
                                    <div class="card-body">
                                          <h5 class="card-title">Subscribers Growth</h5>
                                          <canvas id="subscribersChart" height="150"></canvas>
                                    </div>
                              </div>
                        </div>

                        <!-- Recent Newsletters -->
                        <div class="col-lg-4 mb-3">
                              <div class="card shadow-sm">
                                    <div class="card-body">
                                          <h5 class="card-title">Recent Newsletters</h5>
                                          <ul class="list-group list-group-flush">
                                                @forelse($recentNewsletters as $newsletter)
                                                <li
                                                      class="list-group-item d-flex justify-content-between align-items-center">
                                                      {{ $newsletter->title }}
                                                      <span class="text-muted small">{{
                                                            $newsletter->created_at->format('d M')
                                                            }}</span>
                                                </li>
                                                @empty
                                                <li class="list-group-item text-center text-muted">No newsletters found.
                                                </li>
                                                @endforelse
                                          </ul>
                                    </div>
                              </div>
                        </div>
                  </div>

                  <!-- Shortcut Action Buttons -->
                  <div class="row">
                        <div class="col-sm-6 col-lg-3 mb-3">
                              <a href="{{ route('admin.newsletters.create') }}"
                                    class="btn btn-primary w-100 py-3">Create
                                    Newsletter</a>
                        </div>
                        <div class="col-sm-6 col-lg-3 mb-3">
                              <a href="#" class="btn btn-success w-100 py-3">View Subscribers</a>
                        </div>
                        <div class="col-sm-6 col-lg-3 mb-3">
                              <a href="#" class="btn btn-warning w-100 py-3 text-white">Send Newsletter</a>
                        </div>
                        <div class="col-sm-6 col-lg-3 mb-3">
                              <a href="#" class="btn btn-danger w-100 py-3">Settings</a>
                        </div>
                  </div>

            </div>
      </div>

      <!-- Chart.js -->
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script>
            const ctx = document.getElementById('subscribersChart').getContext('2d');
        const subscribersChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($months) !!},
                datasets: [{
                    label: 'New Subscribers',
                    data: {!! json_encode($newSubscribers) !!},
                    borderColor: 'rgb(13,110,253)',
                    backgroundColor: 'rgba(13,110,253,0.2)',
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }
                }
            }
        });
      </script>

</x-app-layout>