@extends('russian.base')
@section('content')
<br/>
<div class="container-fluid px-4">
<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-user me-1"></i>
                                Ввод названия компании
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

            <form method="post" action="{{ route('title.storeru') }}" id="add-form" enctype="multipart/form-data">
                @csrf <!-- CSRF token -->
                <div class="mb-3">
                    <label for="title">Название компании</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Введите название компании" required>
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
                                Название компании
                            </div>
                            <div class="card-body">
        <div class="table-responsive" style="margin: 2%">
            <table id="datatablesSimple" class="table">
                <thead>
                    <tr class="table-dark">
                    <th>Название</th>
                    <th>Обновить | Удалить</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($titles as $title)
                    <tr class="align-middle">
                        <td>{{ $title->title }}</td>
                        <td>
                            <a href="{{ route('title.editru', $title->id) }}" class="text-success"><i class="fas fa-edit fa-lg mx-1"></i></a>
                            <a href="{{ route('title.deleteru', $title->id) }}" 
   class="text-danger" 
   onclick="event.preventDefault(); 
            if(confirm('Вы уверены?')) {
                document.getElementById('delete-about-{{ $title->id }}').submit();
            }">
    <i class="fas fa-trash fa-lg mx-1"></i>
</a>

<form id="delete-about-{{ $title->id }}" 
      action="{{ route('title.deleteru', $title->id) }}" 
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
