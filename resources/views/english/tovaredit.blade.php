@extends('english.base')
@section('content')
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
<br/>
<div class="col-xl-8">
    <div class="card mb-4">
        <div class="card-header">
            <i class="fa-solid fa-weight-scale"></i>
            Entering the items
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
        <form method="post" action="{{ route('tovar.updateeng', $tovar->id) }}" id="add-form" enctype="multipart/form-data">
            @csrf <!-- CSRF token -->
                <div class="form-group Barcode1">
                    <label class="col-sm-8 control-label">Barcode:</label>
                    <div class="col-sm-8">
                        <input type="text" name="barcode" id="Barcode"  value="{{$tovar->barcode}}" class="form-control Barcode" autofocus />
                    </div>
                </div>

                <div class="form-group display" >
                    <label class="col-sm-8 control-label">Product Name:</label>
                    <div class="col-sm-8">
                        <input type="text" name="materialnomi" id="materialnomi" value="{{$tovar->nomi}}" class="form-control materialnomi" />
                    </div>
                </div>

                <div class="form-group display" >
                    <label class="col-sm-8 control-label">Unit of Measurement:</label>
                    <div class="col-sm-8">
                        <select name="olchamid" id="olchamid" class="form-control select2" required>
                        @foreach ($olchams as $olcham)
                            @if($tovar->olchovid == $olcham->id)
                                <option value="{{ $olcham->id }}" selected>{{ $olcham->olcham_nomi }} (Current)</option>
                            @else
                                <option value="{{ $olcham->id }}">{{ $olcham->olcham_nomi }}</option>
                            @endif
                        @endforeach
                        </select>
                    </div>
                </div>
                

                <div class="form-group display" >
                    <label class="col-sm-8 control-label">Purchase price:</label>
                    <div class="col-sm-8">
                        <input type="number" name="OlinganNarxi" value="{{$tovar->olingannarx}}" class="form-control" />
                    </div>
                </div>

                <div class="form-group display" >
                    <label class="col-sm-8 control-label">Selling price:</label>
                    <div class="col-sm-8">
                        <input type="number" name="SotilishNarx" value="{{$tovar->sotilgannarx}}" class="form-control" />
                    </div>
                </div>

                <div class="form-group display" >
                    <label class="col-sm-8 control-label">How many are in a pack:</label>
                    <div class="col-sm-8">
                        <input type="number" name="Pachkadanechta" value="{{$tovar->donasoni}}" class="form-control" />
                    </div>
                </div>

                <div class="form-group display" >
                    <label class="col-sm-8 control-label">Unit purchase price:</label>
                    <div class="col-sm-8">
                        <input type="number" name="DonaOlinganNarxi" value="{{$tovar->dolingannarx}}" class="form-control" />
                    </div>
                </div>

                <div class="form-group display" >
                    <label class="col-sm-8 control-label">Unit selling price:</label>
                    <div class="col-sm-8">
                        <input type="number" name="DonaSotilishNarx" value="{{$tovar->dsotilgannarx}}" class="form-control" />
                    </div>
                </div>

                <br>
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
            Tovarlar Ro`yxati
        </div>
        <div class="card-body">
            <div class="table-responsive" style="margin: 2%">
                <table id="datatablesSimple" class="table">
                    <thead>
                        <tr class="table-dark">
                        <th>Barcode</th>
                        <th>Product Name</th>
                        <th>Purchase Price</th>
                        <th>Selling Price</th>
                        <th>Unit of Measurement</th>
                        <th>Quantity per Pack</th>
                        <th>Unit Purchase Price</th>
                        <th>Unit Selling Price</th>
                        <th>Update | Delete</th>

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
                                    <a href="{{ route('tovar.editeng', $tovar->id) }}" class="text-success"><i class="fas fa-edit fa-lg mx-1"></i></a>
                                    <a href="{{ route('tovar.deleteeng', $tovar->id) }}" 
                                       class="text-danger" 
                                       onclick="event.preventDefault(); 
                                                if(confirm('Do you want to delete?')) {
                                                    document.getElementById('delete-about-{{ $tovar->id }}').submit();
                                                }">
                                        <i class="fas fa-trash fa-lg mx-1"></i>
                                    </a>

                                    <form id="delete-about-{{ $tovar->id }}" 
                                          action="{{ route('tovar.deleteeng', $tovar->id) }}" 
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
