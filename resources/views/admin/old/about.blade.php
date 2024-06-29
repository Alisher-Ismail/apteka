@extends('admin.base')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">About Section</h1>
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="col-lg-5 card-body p-4">
            <form method="post" action="{{ route('about.store') }}" id="add-form" enctype="multipart/form-data">
                @csrf <!-- CSRF token -->
                <div class="mb-3">
                    <label for="title">About Title</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="title" placeholder="Enter Title" required>
                </div>
                <div class="mb-3">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" name="content" aria-describedby="content" placeholder="Enter content" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="image">Select Image</label>
                    <input type="file" class="form-control-file" id="image" name="image" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <hr/>
        <div class="table-responsive" style="margin: 2%">
            <table id="datatablesSimple" class="table">
                <thead>
                    <tr class="table-dark">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $about)
                    <tr class="align-middle">
                        <td>{{ $about->id }}</td>
                        <td>{{ $about->title }}</td>
                        <td>{{ $about->content }}</td>
                        <td><img src="{{ asset($about->image) }}" alt="" width="50" class="img-thumbnail"></td>
                        <td>
                            <a href="{{ route('about.edit', $about->id) }}" class="text-success"><i class="fas fa-edit fa-lg mx-1"></i></a>
                            <a href="{{ route('about.delete', $about->id) }}" 
   class="text-danger" 
   onclick="event.preventDefault(); 
            if(confirm('Are you sure you want to delete this about section?')) {
                document.getElementById('delete-about-{{ $about->id }}').submit();
            }">
    <i class="fas fa-trash fa-lg mx-1"></i>
</a>

<form id="delete-about-{{ $about->id }}" 
      action="{{ route('about.delete', $about->id) }}" 
      method="POST" 
      style="display: none;">
    @csrf
    @method('DELETE')
</form>


                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
