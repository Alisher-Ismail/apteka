@extends('english.base')
@section('content')
<br/>
<div class="container-fluid px-4">
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-user me-1"></i>
            User registration
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
            <form method="post" action="{{ route('user.updateeng', $users->id) }}" id="add-form" enctype="multipart/form-data">
                @csrf <!-- CSRF token -->
                <div class="mb-3">
                    <label for="Ism">Name</label>
                    <input type="text" class="form-control" id="ism" name="ism" placeholder="Enter Name" value="{{ old('ism', $users->name ?? '') }}" required>
                </div>
                <div class="mb-3">
                    <label for="Email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{ old('email', $users->email ?? '') }}" required>
                </div>
                <div class="mb-3">
                    <label for="Password">Type of User</label>
                    <select class="form-control" id="type" name="type">
                        <option value="admin">Adminstration</option>
                        <option value="sotuvchi">Seller</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="Password">Password</label>
                    <input type="password" class="form-control" id="parol" name="parol" placeholder="Enter Password" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Sava</button>
            </form>
        </div>
    </div>
</div>
<hr/>
<div class="container-fluid px-4">
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-users me-1"></i>
            List of Users
        </div>
        <div class="card-body">
            <div class="table-responsive" style="margin: 2%">
                <table id="datatablesSimple" class="table">
                    <thead>
                        <tr class="table-dark">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Update | Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $user)
                        <tr class="align-middle">
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('user.editeng', $user->id) }}" class="text-success"><i class="fas fa-edit fa-lg mx-1"></i></a>
                                <a href="{{ route('user.deleteeng', $user->id) }}" 
                                    class="text-danger" 
                                    onclick="event.preventDefault(); 
                                    if(confirm('Do you want to delete the user?')) {
                                        document.getElementById('delete-user-{{ $user->id }}').submit();
                                    }">
                                    <i class="fas fa-trash fa-lg mx-1"></i>
                                </a>
                                <form id="delete-user-{{ $user->id }}" 
                                      action="{{ route('user.deleteeng', $user->id) }}" 
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
