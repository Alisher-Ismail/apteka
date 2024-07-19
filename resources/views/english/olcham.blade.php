@extends('english.base')
@section('content')
<br/>
<div class="container-fluid px-4">
<div class="card mb-4">
                            <div class="card-header">
                            <i class="fa-solid fa-weight-scale"></i>
                            Enter Measurements
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

            <form method="post" action="{{ route('olcham.storeeng') }}" id="add-form" enctype="multipart/form-data">
                @csrf <!-- CSRF token -->
                <div class="mb-3">
                    <label for="Olcham Nomi">Measurement Name</label>
                    <input type="text" class="form-control" id="olcham_nomi" name="olcham_nomi" placeholder="Enter Measurement Name" required>
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
                            <i class="fa-solid fa-weight-scale"></i>
                            List of Measurements
                            </div>
                            <div class="card-body">
        <div class="table-responsive" style="margin: 2%">
            <table id="datatablesSimple" class="table">
                <thead>
                    <tr class="table-dark">
                    <th>Measurement Name</th>
                    <th>Update | Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($olchams as $olcham)
                    <tr class="align-middle">
                        <td>{{ $olcham->olcham_nomi }}</td>
                        <td>
                            <a href="{{ route('olcham.editeng', $olcham->id) }}" class="text-success"><i class="fas fa-edit fa-lg mx-1"></i></a>
                            <a href="{{ route('olcham.deleteeng', $olcham->id) }}" 
   class="text-danger" 
   onclick="event.preventDefault(); 
            if(confirm('Are you sure you want to delete?')) {
                document.getElementById('delete-about-{{ $olcham->id }}').submit();
            }">
    <i class="fas fa-trash fa-lg mx-1"></i>
</a>

<form id="delete-about-{{ $olcham->id }}" 
      action="{{ route('olcham.deleteeng', $olcham->id) }}" 
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
