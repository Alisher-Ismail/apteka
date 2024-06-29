@extends('admin.base')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Service Section</h1>
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="col-lg-5 card-body p-4">
            <form method="post" action="{{ route('service.update', $services->id) }}" id="edit-form" enctype="multipart/form-data">
                @csrf <!-- CSRF token -->
                <div class="mb-3">
                    <label for="content">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="{{ $services->title }}" required />
                </div>
                <div class="mb-3">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" name="content" placeholder="Enter content" required>{{ $services->content }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>

        <hr/>
        <div class="table-responsive" style="margin: 2%">
        <table id="datatablesSimple" class="table">
                <thead>
                    <tr class="table-dark">
                        <th>Title</th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sr as $s)
                    <tr class="align-middle">
                        <td>{{ $s->title }}</td>
                        <td>{{ $s->content }}</td>
                        <td>
                            <a href="{{ route('service.edit', $s->id) }}" class="text-success"><i class="fas fa-edit fa-lg mx-1"></i></a>
                            <a href="{{ route('service.delete', $s->id) }}" 
                            class="text-danger" 
                            onclick="event.preventDefault(); 
                                        if(confirm('Are you sure you want to delete this service section?')) {
                                            document.getElementById('delete-service-{{ $s->id }}').submit();
                                        }">
                                <i class="fas fa-trash fa-lg mx-1"></i>
                            </a>

                            <form id="delete-service-{{ $s->id }}" 
                                action="{{ route('service.delete', $s->id) }}" 
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
