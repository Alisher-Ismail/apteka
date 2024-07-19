@extends('russian.base')
@section('content')
<br/>
<div class="container-fluid px-4">
<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-user me-1"></i>
                                Добавление пользователя
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

            <form method="post" action="{{ route('user.storeru') }}" id="add-form" enctype="multipart/form-data">
                @csrf <!-- CSRF token -->
                <div class="mb-3">
                    <label for="Ism">Имя</label>
                    <input type="text" class="form-control" id="ism" name="ism" placeholder="Введите имя" required>
                </div>
                <div class="mb-3">
                    <label for="Email">Электронная почта</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Введите электронную почту" required>
                </div>
                
                <div class="mb-3">
                    <label for="Password">Тип пользователя</label>
                    <select class="form-control" id="type" name="type">
                        <option value="admin">Aдмин</option>
                        <option value="sotuvchi">Продавец</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="Password">Пароль</label>
                    <input type="text" class="form-control" id="parol" name="parol" placeholder="Введите пароль" required>
                </div>

                
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
</div>
</div>
        <hr/>
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
                    <th>Обновить | Удалить</th>

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
