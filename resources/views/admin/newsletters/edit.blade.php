<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Edit Newsletter</title>

      <!-- Bootstrap -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

      <style>
            body {
                  background: #f5f6fa;
            }

            .container-box {
                  max-width: 800px;
                  margin-top: 40px;
            }

            .card-header {
                  background: #0d6efd !important;
                  color: white !important;
            }
      </style>
</head>

<body>

      <div class="container container-box">

            <div class="card shadow-sm">
                  <div class="card-header">
                        <h4 class="mb-0">✏ Edit Newsletter</h4>
                  </div>

                  <div class="card-body">

                        <form action="{{ route('admin.newsletters.update', $newsletter->id) }}" method="POST"
                              enctype="multipart/form-data">
                              @csrf
                              @method('PUT')

                              <!-- Title -->
                              <div class="mb-3">
                                    <label class="form-label">Newsletter Title</label>
                                    <input type="text" name="title" class="form-control"
                                          value="{{ $newsletter->title }}" required>
                              </div>

                              <!-- Content -->
                              <div class="mb-3">
                                    <label class="form-label">Content</label>
                                    <textarea name="content" class="form-control" rows="6"
                                          required>{{ $newsletter->content }}</textarea>
                              </div>

                              <!-- Current Image -->
                              <div class="mb-3">
                                    <label class="form-label">Current Image</label><br>

                                    @if($newsletter->image)
                                    <img src="{{ asset('uploads/newsletters/' . $newsletter->image) }}" width="150"
                                          class="rounded border mb-2">
                                    @else
                                    <p class="text-muted">No image uploaded.</p>
                                    @endif
                              </div>

                              <!-- Upload New Image -->
                              <div class="mb-3">
                                    <label class="form-label">Upload New Image (optional)</label>
                                    <input type="file" name="image" class="form-control">
                              </div>

                              <!-- Buttons -->
                              <div class="d-flex justify-content-between">
                                    <a href="{{ route('admin.newsletters.index') }}" class="btn btn-secondary">←
                                          Back</a>

                                    <button type="submit" class="btn btn-primary">
                                          Update Newsletter
                                    </button>
                              </div>

                        </form>
                  </div>
            </div>

      </div>

</body>

</html>