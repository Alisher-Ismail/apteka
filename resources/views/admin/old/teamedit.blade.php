@extends('admin.base')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit First Section</h1>
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="col-lg-5 card-body p-4">
            <form method="post" action="{{ route('team.update', $teams->id) }}" id="edit-form" enctype="multipart/form-data">
                @csrf <!-- CSRF token -->
                <div class="mb-3">
                    <label for="content">Ism</label>
                    <input type="text" class="form-control" id="ism" name="ism" value="{{ $teams->ism }}" required>
                </div>
                <div class="mb-3">
                    <label for="content">Lavozim</label>
                    <input type="text" class="form-control" id="lavozim" name="lavozim" value="{{ $teams->lavozim }}" required>
                </div>
                <div class="mb-3">
                    <label for="content">Linkedin</label>
                    <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ $teams->linkedin }}" required>
                </div>
                <div class="mb-3">
                    <label for="content">Facebook</label>
                    <input type="text" class="form-control" id="facebook" name="facebook" value="{{ $teams->facebook }}" required>
                </div>
                <div class="mb-3">
                    <label for="content">Instagram</label>
                    <input type="text" class="form-control" id="instagram" name="instagram" value="{{ $teams->instagram }}" required>
                </div>
                <div class="mb-3">
                    <label for="content">Twitter</label>
                    <input type="text" class="form-control" id="twitter" name="twitter" value="{{ $teams->twitter }}" required>
                </div>
                <div class="mb-3">
                    <label for="image">Select Image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                    <img src="{{ asset($teams->image) }}" width="100" class="img-thumbnail mt-1">
                    <input type="hidden" name="old_image" value="{{ $teams->image }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>

        <hr/>
        <div class="table-responsive" style="margin: 2%">
        <table id="datatablesSimple" class="table">
                <thead>
                    <tr class="table-dark">
                        <th>Ism</th>
                        <th>Lavozim</th>
                        <th>Linkedin</th>
                        <th>Facebook</th>
                        <th>Instagram</th>
                        <th>Twitter</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tm as $f)
                    <tr class="align-middle">
                        <td>{{ $f->ism }}</td>
                        <td>{{ $f->lavozim }}</td>
                        <td>{{ $f->linkedin }}</td>
                        <td>{{ $f->facebook }}</td>
                        <td>{{ $f->instagram }}</td>
                        <td>{{ $f->twitter }}</td>
                        <td><img src="{{ asset($f->image) }}" alt="" width="50" class="img-thumbnail"></td>
                        <td>
                            <a href="{{ route('team.edit', $f->id) }}" class="text-success"><i class="fas fa-edit fa-lg mx-1"></i></a>
                            <a href="{{ route('team.delete', $f->id) }}" 
                            class="text-danger" 
                            onclick="event.preventDefault(); 
                                        if(confirm('Are you sure you want to delete this team section?')) {
                                            document.getElementById('delete-team-{{ $f->id }}').submit();
                                        }">
                                <i class="fas fa-trash fa-lg mx-1"></i>
                            </a>

                            <form id="delete-team-{{ $f->id }}" 
                                action="{{ route('team.delete', $f->id) }}" 
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
