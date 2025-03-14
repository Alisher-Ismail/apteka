@extends('admin.base')
@section('content')
<br/>
<div class="container-fluid px-4">
    <div class="card mb-4">
        <div class="card-header">
        <i class="fa-solid fa-weight-scale"></i>
            O`lchamlarni Kiritish
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
            <form method="post" action="{{ route('olcham.update', $olchams->id) }}" id="add-form" enctype="multipart/form-data">
                @csrf <!-- CSRF token -->
                <div class="mb-3">
                    <label for="Olcham">Olcham Nomi</label>
                    <input type="text" class="form-control" id="olcham_nomi" name="olcham_nomi" placeholder="O`lchamni Kiriting" value="{{ old('olcham_nomi', $olchams->olcham_nomi ?? '') }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Saqlash</button>
            </form>
        </div>
    </div>
</div>
<hr/>
<div class="container-fluid px-4">
    <div class="card mb-4">
        <div class="card-header">
        <i class="fa-solid fa-weight-scale"></i>
            O`lchamlar Ro`yxati
        </div>
        <div class="card-body">
            <div class="table-responsive" style="margin: 2%">
                <table id="datatablesSimple" class="table">
                    <thead>
                        <tr class="table-dark">
                            <th>O`lcham Nomi</th>
                            <th>Yangilash | O`chirish</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($olcham as $olcham)
                        <tr class="align-middle">
                            <td>{{ $olcham->olcham_nomi }}</td>
                            <td>
                                <a href="{{ route('olcham.edit', $olcham->id) }}" class="text-success"><i class="fas fa-edit fa-lg mx-1"></i></a>
                                <a href="{{ route('olcham.delete', $olcham->id) }}" 
                                    class="text-danger" 
                                    onclick="event.preventDefault(); 
                                    if(confirm('O`chirmoqchimisiz?')) {
                                        document.getElementById('delete-user-{{ $olcham->id }}').submit();
                                    }">
                                    <i class="fas fa-trash fa-lg mx-1"></i>
                                </a>
                                <form id="delete-user-{{ $olcham->id }}" 
                                      action="{{ route('olcham.delete', $olcham->id) }}" 
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
