<x-app-layout>
      <div class="py-12">
            <div class="container">

                  {{-- Page Header --}}
                  <div class="text-center mb-5">
                        <h1 class="display-5 fw-bold">Latest Newsletters</h1>
                        <p class="text-muted">Stay updated! Click any newsletter to read and subscribe.</p>
                  </div>

                  {{-- Newsletter Grid --}}
                  <div class="row g-4">

                        @forelse($newsletters as $newsletter)
                        <div class="col-md-4">
                              <div class="card h-100 shadow-sm">
                                    @if($newsletter->image)
                                    <img src="{{ asset('uploads/newsletters/' . $newsletter->image) }}"
                                          class="card-img-top" alt="{{ $newsletter->title }}">
                                    @endif

                                    <div class="card-body d-flex flex-column">
                                          <h5 class="card-title">{{ $newsletter->title }}</h5>
                                          <p class="card-text">{{ Str::limit($newsletter->content, 100) }}</p>

                                          <a href="{{ route('news.show', $newsletter->slug) }}"
                                                class="btn btn-primary mt-auto">Read More</a>
                                    </div>

                                    <div class="card-footer text-muted text-end">
                                          {{ $newsletter->created_at->format('d M Y') }}
                                    </div>
                              </div>
                        </div>
                        @empty
                        <p class="text-center text-muted">No newsletters available yet.</p>
                        @endforelse
                  </div>
            </div>
      </div>
</x-app-layout>