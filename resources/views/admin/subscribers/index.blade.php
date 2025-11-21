<x-app-layout>
      <div class="d-flex">
            <!-- Sidebar -->
            <x-admin-sidebar />

            <div class="container py-5">

                  <h2 class="mb-4">All Subscribers</h2>

                  <div class="card shadow-sm">
                        <div class="card-body">
                              <a href="{{ route('admin.dashboard') }}" class="btn btn-primary mb-4">
                                    GO Back to Dashboard
                              </a>

                              <div class="table-responsive">
                                    <table class="table table-bordered table-hover align-middle">
                                          <thead class="table-dark">
                                                <tr>
                                                      <th>#</th>
                                                      <th>Name</th>
                                                      <th>Email</th>
                                                      <th>Subscribed Newsletters</th>
                                                      <th>Subscribed At</th>
                                                      <th>Actions</th>
                                                </tr>
                                          </thead>

                                          <tbody>
                                                @foreach($subscribers as $sub)
                                                <tr>
                                                      <td>{{ $loop->iteration }}</td>
                                                      <td>{{ $sub->name }}</td>
                                                      <td>{{ $sub->email }}</td>
                                                      <td>
                                                            @foreach($sub->newsletter as $news)
                                                            <span class="badge bg-primary">{{ $news->title }}</span>
                                                            @endforeach
                                                      </td>
                                                      <td>{{ $sub->created_at->format('d M Y') }}</td>
                                                      <td>
                                                            <form action="{{ route('admin.subscribers.destroy', $sub->id) }}"
                                                                  method="POST"
                                                                  onsubmit="return confirm('Are you sure you want to delete this subscriber?');">
                                                                  @csrf
                                                                  @method('DELETE')
                                                                  <button type="submit" class="btn btn-sm btn-danger">
                                                                        <i class="bi bi-trash"></i> Delete
                                                                  </button>
                                                            </form>
                                                      </td>
                                                </tr>
                                                @endforeach
                                          </tbody>
                                    </table>
                              </div> <!-- /.table-responsive -->

                        </div> <!-- /.card-body -->
                  </div> <!-- /.card -->

            </div> <!-- /.container -->
      </div> <!-- /.d-flex -->
</x-app-layout>