<x-app-layout>
      <div class="py-12">
            <div class="container">
                  <div class="card shadow-sm mb-4">
                        @if($newsletter->image)
                        <img src="{{ asset('uploads/newsletters/' . $newsletter->image) }}" class="card-img-top"
                              alt="{{ $newsletter->title }}">
                        @endif

                        <div class="card-body">
                              <h3 class="card-title fw-bold">{{ $newsletter->title }}</h3>
                              <p class="text-muted mb-3">{{ $newsletter->created_at->format('d M Y') }}</p>
                              <div class="card-text mb-4">{!! nl2br(e($newsletter->content)) !!}</div>

                              {{-- Subscription Form --}}
                              <form action="{{ route('subscribe', $newsletter->slug) }}" method="POST">
                                    @csrf
                                    <div class="input-group mb-3">
                                          <input type="text" class="form-control" value="{{ old('name') }}" name="name"
                                                placeholder="Your Name" required>
                                          <input type="email" name="email" class="form-control" placeholder="Your Email"
                                                required>
                                          <button type="submit" class="btn btn-success">Subscribe</button>
                                    </div>
                                    @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                              </form>
                        </div>
                  </div>

                  <a href="{{ route('home') }}" class="btn btn-secondary">← Back to Newsletters</a>
            </div>
      </div>
</x-app-layout>