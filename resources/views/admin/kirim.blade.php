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
@php
        date_default_timezone_set('Asia/Tashkent');
        @endphp
        <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function material_db() {
            if (ValidateCar()){
            $("#submit").prop("disabled", true);
            $.ajax({
                type: "post",
                url: "{{ route('kirim.store') }}",
                cache: false,
                data: $('#material').serialize(),
                success: function(response) {
                    try {
                        //alert(response);
                        $('#suss_message2').html("<center><h5 style='color:white'>" + response + " </h5></center>");
                        $('#suss_message2').fadeIn().delay(1200).fadeOut();
                        window.setTimeout(function() {
                            window.location.href = "{{ route('adminkirim') }}";
                        }, 4000);
                    } catch (e) {
                        alert('Exception while request1: ' + e);
                    }
                },
                error: function(xhr, status, error) {
    console.log('Error:', xhr.responseText); // Log the full response text
    console.log('Status:', status); // Log the status
    console.log('Error:', error); // Log any additional error message
    alert('Error while request2: ' + error); // Display an alert with the error message
}

            });
        }
        }

        function ValidateCar() {
    var Nechta = document.material.Nechta;
    var Nechtadona = document.material.Nechtadona;
    var muddat = document.material.muddat;

	if (Material_nomi(Nechta))
    {
		if (Olcham_id(Nechtadona))
    {
		if (Olingan_Narxi(muddat))
    {
							
					return true;
	}
	}
	}
    return false;

			function Olcham_id(olchamid){
            var add = olchamid.value.length;
            if (add == 0)
            {
                $('#suss_message').html("<center><h5 style='color:#ffffff;'>Kiriting!</h5></center>");
                $('#suss_message').fadeIn().delay(1200).fadeOut();
                //alert('First name must have alphabet characters only');
                olchamid.focus();
                return false;
            }
            else
            {
                return true;
            }
        }
		
		function Material_nomi(materialnomi){
            var add = materialnomi.value.length;
            if (add == 0)
            {
                $('#suss_message').html("<center><h5 style='color:#ffffff;'>Kiriting!</h5></center>");
                $('#suss_message').fadeIn().delay(1200).fadeOut();
                //alert('First name must have alphabet characters only');
                materialnomi.focus();
                return false;
            }
            else
            {
                return true;
            }
        }
		
		function Olingan_Narxi(OlinganNarxi){
            var add = OlinganNarxi.value.length;
            if (add == 0)
            {
                $('#suss_message').html("<center><h5 style='color:#ffffff;'>Kiriting!</h5></center>");
                $('#suss_message').fadeIn().delay(1200).fadeOut();
                //alert('First name must have alphabet characters only');
                OlinganNarxi.focus();
                return false;
            }
            else
            {
                return true;
            }
        }
		
    }
</script>
<div class="col-xl-6">
    <div class="card mb-4">
        <div class="card-header">
            <i class="fa-solid fa-weight-scale"></i>
            Tovarni Kiritish
        </div>
        <div id="suss_message" class="ajax_warning" style="display: none"></div>
            <div id="suss_message2" class="ajax_Message" style="display: none"></div>
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
        <form class="form-horizontal" action="{{ route('kirim.storescan') }} " name="material" id="material" method="post">
            @csrf <!-- CSRF token -->

            <div class="form-group display" >
                    <label class=" control-label">Tovarni Tanlang:</label>
                    <div class="col-sm-8">
                        <select name="tovarid" id="tovarid" class="form-control select2" required>
                            <option value="">Tanang</option>
                            @foreach ($tovars as $tovar)
                                <option value="{{ $tovar->id }}">{{ $tovar->nomi }}(Narxi: {{$tovar->sotilgannarx}})</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                    <script>
                        //$('#tovarid').select2();
                        </script>
                <div class="form-group display" style="display: none">
                    <label class=" control-label">Sotilish Narxi:</label>
                    <div class="col-sm-8">
                        <input type="number" name="snarxi" id="snarxi" disabled class="form-control" />
                    </div>
                </div>

                <div class="form-group display2" style="display: none">
                    <label class=" control-label">Sotilish (Dona) Narxi:</label>
                    <div class="col-sm-8">
                        <input type="number" name="dnarxi" id="dnarxi" disabled class="form-control" />
                    </div>
                </div>
                
                <div class="form-group display" style="display: none">
                    <label class=" control-label">Nechta (Tovar) Keldi:</label>
                    <div class="col-sm-8">
                        <input type="number" name="Nechta" id="Nechta" class="form-control" value="0"/>
                    </div>
                </div>

                <div class="form-group display2" style="display: none">
                    <label class=" control-label">Nechta (Tovar Dona) Keldi:</label>
                    <div class="col-sm-8">
                    <input type="number" name="Nechtadona" class="form-control" value="0" />
                    </div>
                </div>

                <div class="form-group display" style="display: none">
                    <label class=" control-label">Ombordagi miqdori:</label>
                    <div class="col-sm-8">
                        <input type="number" name="Ombordagi" disabled id="Ombordagi" class="form-control" />
                    </div>
                </div>

                <div class="form-group display" style="display: none">
                    <label class=" control-label">Muddati:</label>
                    <div class="col-sm-8">
                        <input type="date" name="muddat" id="muddat" class="form-control" />
                    </div>
                </div>

                
                <br> 
                <!--<button type="submit" class="btn btn-primary">Saqlash</button>-->
                <button type="button" id="submit" class="btn btn-primary" onclick="material_db()">Saqlash</button>

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
                            <th>O`lchov Birligi</th>
                            <th>Miqdori</th>
                            <th>Muddati</th>
                            <th>Kiritilgan Sana</th>
                            <th>O`chirish</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tovars as $tovar)
                            @foreach($kirims as $kirim)
                            @if($tovar->id == $kirim->tovar_id && strtotime($kirim->muddati) > strtotime(now()))         
                            <tr class="align-middle">
                                <td>{{ $tovar->barcode }}</td>
                                <td>{{ $tovar->nomi }}</td>
                                <td>
                                @foreach ($olchams as $olcham)
                                    @if ($tovar->olchovid == $olcham->id)    
                                    {{ $olcham->olcham_nomi }}
                                    @endif
                                @endforeach
                                </td>
                                <td>{{ $kirim->miqdori }}, {{ $kirim->dona }}</td>
                                <td>{{ date('d/m/Y', strtotime($kirim->muddati)) }}</td>
                                <td>{{ $kirim->created_at->format('d/m/Y')}}</td>
                                <td>
                                    <a href="{{ route('kirim.delete', $kirim->id) }}" 
                                       class="text-danger" 
                                       onclick="event.preventDefault(); 
                                                if(confirm('O`chirmoqchimisiz?')) {
                                                    document.getElementById('delete-about-{{ $kirim->id }}').submit();
                                                }">
                                        <i class="fas fa-trash fa-lg mx-1"></i>
                                    </a>

                                    <form id="delete-about-{{ $kirim->id }}" 
                                          action="{{ route('kirim.delete', $kirim->id) }}" 
                                          method="POST" 
                                          style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>     
 

 $('.select2').select2();
    $('#tovarid').on('change', function() {
        var tovarId = $(this).val();
        if (tovarId) {
            $.ajax({
                url: '{{ url("api/tovar-details") }}',
                type: 'GET',
                data: { id: tovarId },
                success: function(data) {
                    if (data) {
                        $('.display').show();
                        if(data.dnarxi > 0){$('.display2').show();}else{$('.display2').hide();}
                        $('#dnarxi').val(data.dnarxi);
                        $('#snarxi').val(data.snarxi);
                        $('#Ombordagi').val(data.ombor);
                    }
                },
                error: function(xhr) {
                    console.log('Error:', xhr);
                }
            });
        } else {
            $('#snarxi').val(0);
            $('#Ombordagi').val(0);
        }
    });
    $('#Barcode').on('input', function() {
        if ($(this).val().length > 0) {
            $('.display').show();
        } else {
            $('.display').hide();
        }
    });

</script>
@endsection
