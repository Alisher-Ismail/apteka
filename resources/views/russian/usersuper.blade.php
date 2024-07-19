@extends('russian.base')
@section('content')
<br/>

        <div class="container-fluid px-4">
<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-users me-1"></i>
                                Список пользователей
                            </div>
                            <div class="card-body">
        <div class="table-responsive" style="margin: 2%">
            <table id="datatablesSimple" class="table">
                <thead>
                    <tr class="table-dark">
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Пароль</th>
                    <th>Тип пользователя</th>
                    <th>Редактировать | Удалить</th>

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
                            <a href="{{ route('user.editru', $user->id) }}" class="text-success"><i class="fas fa-edit fa-lg mx-1"></i></a>
                            <a href="{{ route('user.deleteru', $user->id) }}" 
   class="text-danger" 
   onclick="event.preventDefault(); 
            if(confirm('Вы уверены, что хотите удалить пользователя?')) {
                document.getElementById('delete-about-{{ $user->id }}').submit();
            }">
    <i class="fas fa-trash fa-lg mx-1"></i>
</a>

<form id="delete-about-{{ $user->id }}" 
      action="{{ route('user.deleteru', $user->id) }}" 
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
