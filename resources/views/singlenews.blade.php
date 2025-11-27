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
                              <p>{{ $newsletter->content }}</p>
                              @if($newsletter->categories->count() > 0)
                              <p>
                                    <span class="badge bg-primary">
                                          {{ $newsletter->categories->pluck('name')->join(', ') }}
                                    </span>
                              </p>
                              @endif
                              @if($newsletter->tags->count() > 0)
                              <p>
                                    <span class="badge bg-primary">
                                          {{ $newsletter->tags->pluck('name')->join(', ') }}
                                    </span>
                              </p>
                              @endif
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

let subscribeMessage = document.getElementById('subscribeMessage');
subscribeMessage.innerText = "";

let formData = new FormData(this);

fetch(this.action, {
method: 'POST',
body: formData,
headers: {
"Accept": "application/json"
}
})
.then(response => response.json())
.then(data => {

// Guest user popup
if (data.register_popup) {
let confirmRegister = confirm(data.message + "\nDo you want to register?");
if (confirmRegister) {
window.location.href = "{{ route('register') }}";
} else {
subscribeMessage.innerText = data.message;
}
return;
}

// Success message
if (data.success) {
subscribeMessage.innerText = data.message;
return;
}

// Validation errors
if (data.errors) {
alert(Object.values(data.errors).flat().join("\n"));
return;
}

})
.catch(err => {
console.error(err);
alert("Something went wrong!");
});
});
</script>