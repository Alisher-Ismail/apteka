@extends('admin.base')
@section('content')

<br/>
<div class="container-fluid px-4">
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
        <form method="post" action="{{ route('tovar.store') }}" id="add-form" enctype="multipart/form-data">
            @csrf <!-- CSRF token -->
                <div class="form-group Barcode1">
                    <label class="col-sm-2 control-label">Barcode:</label>
                    <div class="col-sm-6">
                        <input type="text" name="barcode" id="Barcode" class="form-control Barcode" autofocus required/>
                    </div>
                </div>

                <div class="form-group display" style="display:none;">
                    <label class="col-sm-2 control-label">Material Nomi:</label>
                    <div class="col-sm-6">
                        <input type="text" name="materialnomi" id="materialnomi" class="form-control materialnomi" />
                    </div>
                </div>

                <div class="form-group display" style="display:none;">
                    <label class="col-sm-2 control-label">O`lchov Birligi:</label>
                    <div class="col-sm-6">
                        <select name="olchamid" id="olchamid" class="form-control select2" required>
                            <option value="">Tanlang</option>
                            @foreach ($olchams as $olcham)
                                <option value="{{ $olcham->id }}">{{ $olcham->olcham_nomi }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                

                <div class="form-group display" style="display:none;">
                    <label class="col-sm-2 control-label">Olingan Narxi:</label>
                    <div class="col-sm-6">
                        <input type="number" name="OlinganNarxi" class="form-control" />
                    </div>
                </div>

                <div class="form-group display" style="display:none;">
                    <label class="col-sm-2 control-label">Sotilish Narx:</label>
                    <div class="col-sm-6">
                        <input type="number" name="SotilishNarx" class="form-control" />
                    </div>
                </div>

                <div class="form-group display" style="display:none;">
                    <label class="col-sm-2 control-label">Pachkada nechta bo`ladi:</label>
                    <div class="col-sm-6">
                        <input type="number" name="Pachkadanechta" class="form-control" />
                    </div>
                </div>

                <div class="form-group display" style="display:none;">
                    <label class="col-sm-2 control-label">Dona Olingan Narxi:</label>
                    <div class="col-sm-6">
                        <input type="number" name="DonaOlinganNarxi" class="form-control" />
                    </div>
                </div>

                <div class="form-group display" style="display:none;">
                    <label class="col-sm-2 control-label">Dona Sotilish Narx:</label>
                    <div class="col-sm-6">
                        <input type="number" name="DonaSotilishNarx" class="form-control" />
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

<script>
$(document).ready(function() {
    $('#Barcode').on('input', function() {
        if ($(this).val().length > 0) {
            $('.display').show();
        } else {
            $('.display').hide();
        }
    });

});
</script>

@endsection
