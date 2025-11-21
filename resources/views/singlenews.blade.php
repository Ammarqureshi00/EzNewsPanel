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
                              <form id="subscribeForm" action="{{ route('subscribe', $newsletter->slug) }}"
                                    method="POST">
                                    @csrf
                                    <div class="input-group mb-3">
                                          <input type="text" name="name" class="form-control" placeholder="Your Name"
                                                required>
                                          <input type="email" name="email" class="form-control" placeholder="Your Email"
                                                required>
                                          <button type="submit" class="btn btn-success">Subscribe</button>
                                    </div>
                                    <div id="subscribeMessage" class="text-success"></div>
                              </form>

                              <a href="{{ route('home') }}" class="btn btn-secondary">← Back to Newsletters</a>
                        </div>
                  </div>
            </div>
      </div>
</x-app-layout>
<script>
      document.getElementById('subscribeForm').addEventListener('submit', function(e) {
    e.preventDefault();

    let formData = new FormData(this);
    formData.append('_token', '{{ csrf_token() }}');  // IMPORTANT FIX

    fetch(this.action, {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {

        if (data.errors) {
            alert(Object.values(data.errors).join("\n"));
            return;
        }

        if (data.register_popup) {
            if (confirm("You are not registered. Do you want to register?")) {
                window.location.href = "{{ route('register') }}";
            } else {
                document.getElementById('subscribeMessage').innerText = "Subscribed as guest!";
            }
            return;
        }

        if (data.success) {
            document.getElementById('subscribeMessage').innerText = "Subscribed successfully!";
            return;
        }
    })
    .catch(err => {
        console.error("Fetch error:", err);
        alert("Something went wrong. Please try again.");
    });
});
</script>