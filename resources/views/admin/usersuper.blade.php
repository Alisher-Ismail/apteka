@extends('admin.base')
@section('content')
<br/>

        <div class="container-fluid px-4">
<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-users me-1"></i>
                                Foydalanuvchilar Ro`yxati
                            </div>
                            <div class="card-body">
        <div class="table-responsive" style="margin: 2%">
            <table id="datatablesSimple" class="table">
                <thead>
                    <tr class="table-dark">
                        <th>Ism</th>
                        <th>Email</th>
                        <th>Parol</th>
                        <th>Foydalanuvchi Turi</th>
                        <th>Yangilash | O`chirish</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="align-middle">
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->password }}</td>
                        <td>{{ $user->type }}</td>
                        <td>
                            <a href="{{ route('user.edit', $user->id) }}" class="text-success"><i class="fas fa-edit fa-lg mx-1"></i></a>
                            <a href="{{ route('user.delete', $user->id) }}" 
   class="text-danger" 
   onclick="event.preventDefault(); 
            if(confirm('Foydalanuvchini o`chirmoqchimisiz?')) {
                document.getElementById('delete-about-{{ $user->id }}').submit();
            }">
    <i class="fas fa-trash fa-lg mx-1"></i>
</a>

<form id="delete-about-{{ $user->id }}" 
      action="{{ route('user.delete', $user->id) }}" 
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
