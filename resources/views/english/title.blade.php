@extends('english.base')
@section('content')
<br/>
<div class="container-fluid px-4">
<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-user me-1"></i>
                                Entering the company name
                            </div>
          <!-- Display success message -->
          @if (session('success'))
            <div id="success-message" class="ajax_Message">
                {{ session('success') }}
            </div>
        @endif
                              <!-- Display error messages -->
        @if ($errors->any())
            <div id="ajax_warning" class="ajax_warning">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

                            <div class="card-body">

            <form method="post" action="{{ route('title.storeeng') }}" id="add-form" enctype="multipart/form-data">
                @csrf <!-- CSRF token -->
                <div class="mb-3">
                    <label for="title">Company Name</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Company Name" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
</div>
</div>
        <hr/>
        <div class="container-fluid px-4">
<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-users me-1"></i>
                                Company Name
                            </div>
                            <div class="card-body">
        <div class="table-responsive" style="margin: 2%">
            <table id="datatablesSimple" class="table">
                <thead>
                    <tr class="table-dark">
                    <th>Name</th>
                    <th>Update | Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($titles as $title)
                    <tr class="align-middle">
                        <td>{{ $title->title }}</td>
                        <td>
                            <a href="{{ route('title.editeng', $title->id) }}" class="text-success"><i class="fas fa-edit fa-lg mx-1"></i></a>
                            <a href="{{ route('title.deleteeng', $title->id) }}" 
   class="text-danger" 
   onclick="event.preventDefault(); 
            if(confirm('Do you want to delete?')) {
                document.getElementById('delete-about-{{ $title->id }}').submit();
            }">
    <i class="fas fa-trash fa-lg mx-1"></i>
</a>

<form id="delete-about-{{ $title->id }}" 
      action="{{ route('title.deleteeng', $title->id) }}" 
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
</div>
@endsection
