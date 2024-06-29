@extends('admin.base')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Portfolio Section</h1>
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="col-lg-5 card-body p-4">
            <form method="post" action="{{ route('portfolio.store') }}" id="add-form" enctype="multipart/form-data">
                @csrf <!-- CSRF token -->
                <div class="mb-3">
                    <label for="title">Portfolio Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" required>
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
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ports as $port)
                    <tr class="align-middle">
                        <td>{{ $port->id }}</td>
                        <td>{{ $port->title }}</td>
                        <td><img src="{{ asset($port->image) }}" alt="" width="50" class="img-thumbnail"></td>
                        <td>
                            <a href="{{ route('portfolio.edit', $port->id) }}" class="text-success"><i class="fas fa-edit fa-lg mx-1"></i></a>
                            <a href="{{ route('portfolio.delete', $port->id) }}" 
   class="text-danger" 
   onclick="event.preventDefault(); 
            if(confirm('Are you sure you want to delete this portfolio section?')) {
                document.getElementById('delete-port-{{ $port->id }}').submit();
            }">
    <i class="fas fa-trash fa-lg mx-1"></i>
</a>

<form id="delete-port-{{ $port->id }}" 
      action="{{ route('portfolio.delete', $port->id) }}" 
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
