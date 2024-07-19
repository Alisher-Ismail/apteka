@extends('english.base')

@section('content')
        @php
        date_default_timezone_set('Asia/Tashkent');
        $today = date('Y-m-d');
        $Ftoday = date('Y-m-01');
        @endphp
<br/>
<div class="container-fluid px-4">
    <div class="card mb-4">
        <div class="card-header">
            <i class="fa-solid fa-weight-scale"></i>
            Search for a sale
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
        <form method="post" action="{{ route('chiqim.sanasoneng') }}" id="add-form" enctype="multipart/form-data">
            @csrf <!-- CSRF token -->
               
                <div class="form-group display" >
                    <label class="col-sm-2 control-label">Duration:</label>
                    <div class="col-sm-6">
                    <input type="date" name="sanadan" id="sanadan" class="form-control" value="{{ $Ftoday }}" />
                                </div>
                </div>

                <div class="form-group display" >
                    <label class="col-sm-2 control-label">Duration:</label>
                    <div class="col-sm-6">
                        <input type="date" name="sanagacha" id="sanagacha" class="form-control" value="{{ $today }}" />
                    </div>
                </div>

                
                <br>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('sanadan').addEventListener('focus', function() {
        this.showPicker();
    });
    document.getElementById('sanagacha').addEventListener('focus', function() {
        this.showPicker();
    });
</script>
@endsection
