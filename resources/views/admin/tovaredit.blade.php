@extends('admin.base')
<style>

.form-group {
    display: none; /* Initially hidden */
    display: flex;
    align-items: center;
}

.form-group label {
    flex: 1;
    font-size: 13px; /* Adjust the font size here */
}

.form-group input {
    flex: 2;
}
    </style>
@section('content')

<div class="col-xl-8">
    <div class="card mb-4">
        <div class="card-header">
            <i class="fa-solid fa-weight-scale"></i>
            Tovarni Kiritish
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
        <form method="post" action="{{ route('tovar.update', $tovar->id) }}" id="add-form" enctype="multipart/form-data">
            @csrf <!-- CSRF token -->
                <div class="form-group Barcode1">
                    <label class="col-sm-6 control-label">Barcode:</label>
                    <div class="col-sm-8">
                        <input type="text" name="barcode" id="Barcode"  value="{{$tovar->barcode}}" class="form-control Barcode" autofocus />
                    </div>
                </div>

                <div class="form-group display" >
                    <label class="col-sm-6 control-label">Material Nomi:</label>
                    <div class="col-sm-8">
                        <input type="text" name="materialnomi" id="materialnomi" value="{{$tovar->nomi}}" class="form-control materialnomi" />
                    </div>
                </div>

                <div class="form-group display" >
                    <label class="col-sm-6 control-label">O`lchov Birligi:</label>
                    <div class="col-sm-8">
                        <select name="olchamid" id="olchamid" class="form-control select2" required>
                        @foreach ($olchams as $olcham)
                            @if($tovar->olchovid == $olcham->id)
                                <option value="{{ $olcham->id }}" selected>{{ $olcham->olcham_nomi }} (Hozirgi)</option>
                            @else
                                <option value="{{ $olcham->id }}">{{ $olcham->olcham_nomi }}</option>
                            @endif
                        @endforeach
                        </select>
                    </div>
                </div>
                

                <div class="form-group display" >
                    <label class="col-sm-6 control-label">Olingan Narxi:</label>
                    <div class="col-sm-8">
                        <input type="number" name="OlinganNarxi" value="{{$tovar->olingannarx}}" class="form-control" />
                    </div>
                </div>

                <div class="form-group display" >
                    <label class="col-sm-6 control-label">Sotilish Narx:</label>
                    <div class="col-sm-8">
                        <input type="number" name="SotilishNarx" value="{{$tovar->sotilgannarx}}" class="form-control" />
                    </div>
                </div>

                <div class="form-group display" >
                    <label class="col-sm-6 control-label">Pachkada nechta bo`ladi:</label>
                    <div class="col-sm-8">
                        <input type="number" name="Pachkadanechta" value="{{$tovar->donasoni}}" class="form-control" />
                    </div>
                </div>

                <div class="form-group display" >
                    <label class="col-sm-6 control-label">Dona Olingan Narxi:</label>
                    <div class="col-sm-8">
                        <input type="number" name="DonaOlinganNarxi" value="{{$tovar->dolingannarx}}" class="form-control" />
                    </div>
                </div>

                <div class="form-group display" >
                    <label class="col-sm-6 control-label">Dona Sotilish Narx:</label>
                    <div class="col-sm-8">
                        <input type="number" name="DonaSotilishNarx" value="{{$tovar->dsotilgannarx}}" class="form-control" />
                    </div>
                </div>

                <br>
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
            Tovarlar Ro`yxati
        </div>
        <div class="card-body">
            <div class="table-responsive" style="margin: 2%">
                <table id="datatablesSimple" class="table">
                    <thead>
                        <tr class="table-dark">
                            <th>Barcode</th>
                            <th>Tovar Nomi</th>
                            <th>Olingan Narxi</th>
                            <th>Sotilish Narxi</th>
                            <th>O`lchov Birligi</th>
                            <th>Pachkada Nechta Bo`ladi</th>
                            <th>Dona Narxi Olingan</th>
                            <th>Dona Narxi Sotilish</th>
                            <th>Yangilash | O`chirish</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tovars as $tovar)
                            <tr class="align-middle">
                                <td>{{ $tovar->barcode }}</td>
                                <td>{{ $tovar->nomi }}</td>
                                <td>{{ $tovar->olingannarx }}</td>
                                <td>{{ $tovar->sotilgannarx }}</td>
                                <td>
                                @foreach ($olchams as $olcham)
                                    @if ($tovar->olchovid == $olcham->id)    
                                    {{ $olcham->olcham_nomi }}
                                    @endif
                                @endforeach
                                </td>
                                <td>{{ $tovar->donasoni }}</td>
                                <td>{{ $tovar->dolingannarx }}</td>
                                <td>{{ $tovar->dsotilgannarx }}</td>
                                <td>
                                    <a href="{{ route('tovar.edit', $tovar->id) }}" class="text-success"><i class="fas fa-edit fa-lg mx-1"></i></a>
                                    <a href="{{ route('tovar.delete', $tovar->id) }}" 
                                       class="text-danger" 
                                       onclick="event.preventDefault(); 
                                                if(confirm('O`chirmoqchimisiz?')) {
                                                    document.getElementById('delete-about-{{ $tovar->id }}').submit();
                                                }">
                                        <i class="fas fa-trash fa-lg mx-1"></i>
                                    </a>

                                    <form id="delete-about-{{ $tovar->id }}" 
                                          action="{{ route('tovar.delete', $tovar->id) }}" 
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
