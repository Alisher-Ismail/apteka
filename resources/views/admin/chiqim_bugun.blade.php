@extends('admin.base')

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
                url: "{{ route('kirim.storescan') }}",
                cache: false,
                data: $('#material').serialize(),
                success: function(response) {
                    try {
                        //alert(response);
                        $('#suss_message2').html("<center><h5 style='color:white'>" + response + " </h5></center>");
                        $('#suss_message2').fadeIn().delay(1200).fadeOut();
                        window.setTimeout(function() {
                            window.location.href = "{{ route('adminkirimscan') }}";
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

    
    //select all
// Listen for click on toggle checkbox
$(document).ready(function(){ 
    $("#selecctall").change(function(){
      $(".checkbox1").prop('checked', $(this).prop("checked"));
      });
});
    </script>
<script>
  function deleteSelectedItems() {
    var selectedIds = [];
    // Loop through all checkboxes and add the checked ones to the selectedIds array
    $('.checkbox1:checked').each(function() {
        selectedIds.push($(this).val());
    });

    if (selectedIds.length === 0) {
        // Show message if no items are selected
        $('#suss_message').html("<center><h5 style='color:white'>Tanlang!</h5></center>");
        $('#suss_message').fadeIn().delay(1200).fadeOut();
    } else {
    //alert(selectedIds);
    // Send AJAX request to delete selected items
    $.ajax({
        type: 'POST',
        url: "{{ route('delete.kirim') }}", // Adjust the route to match your controller method
        data: {selectedIds: selectedIds},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            // Handle success response
                        $('#suss_message').html("<center><h5 style='color:white'>" + response + " </h5></center>");
                        $('#suss_message').fadeIn().delay(1200).fadeOut();
                        window.setTimeout(function() {
                            window.location.href = "{{ route('adminkirimscan') }}";
                        }, 4000);
            //alert("Selected IDs sent to controller: " + response);
            // You can further process the response if needed
        },
        error: function(xhr, status, error) {
            // Handle error
            console.error(error);
            alert('Error sending selected IDs to controller: ' + error);
        }
    });
}
}


</script>
    <br/>



<!---->
    <div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fa-solid fa-weight-scale"></i>
                Bugungi Savdo Ro`yxati
                <div id="suss_message" class="ajax_warning" style="display: none"></div>
            <div id="suss_message2" class="ajax_Message" style="display: none"></div>
            @if (session('success'))
                <div id="success-message" class="ajax_Message">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div id="ajax_warning" class="ajax_warning">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <button style="float:right" class="btn btn-success" onclick="exportToCSV()">Excel Yuklab Olish</button>
                <!--
                <button style="float: right; margin-right: 1%" type="button" id="submit" class="btn btn-danger" onclick="deleteSelectedItems()">O`chirish</button>
-->
            </div>
            <div class="card-body">

            
                <div class="table-responsive" style="margin: 0%">

                <div class="search-container">
    <div>
        <label for="perPage">Bir sahifada nechta ko'rsatilsin:</label>
        <select id="perPage" onchange="changePerPage()">
            <option value="5">5</option>
            <option value="10" selected>10</option>
            <option value="15">15</option>
            <option value="20">20</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
    </div>
    <div>
        <input type="text" id="searchInput"  onkeyup="searchTable()" placeholder="Qidiruv...">
    </div>
</div>
<form action="" name="shartnoma" id="shartnoma" method="post">
@csrf <!-- CSRF token -->

<table id="dataTable">
    <thead>
        <tr>
            <th>Sotuvchi</th>
            <th>Barcode</th>
            <th>Tovar Nomi</th>
            <th>Miqdori</th>
            <th>Miqdori (Dona)</th>
            <th>Kiritilgan Sana</th>
            <th>Qaytarish</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($tovars as $tovar)
    @foreach($chiqim as $chiq)
        @if($tovar->id == $chiq->tovar_id)         
            <tr class="align-middle">
            @php $username = '' @endphp {{-- Initialize the variable --}}
                    @foreach ($users as $user)
                        @if ($user->id == $chiq->userid)    
                            @php $username = $user->name @endphp {{-- Assign the value --}}
                        @endif
                    @endforeach
                <td>{{ $username }}</td>
                <td>{{ $tovar->barcode }}</td>
                <td>{{ $tovar->nomi }}</td>
                
                    @php $olcham_nomi = '' @endphp {{-- Initialize the variable --}}
                    @foreach ($olchams as $olcham)
                        @if ($tovar->olchovid == $olcham->id)    
                            @php $olcham_nomi = $olcham->olcham_nomi @endphp {{-- Assign the value --}}
                        @endif
                    @endforeach
                   
                
                <td> {{ $chiq->miqdori }} {{ $olcham_nomi }} </td>
                <td> {{ $chiq->miqdoridona }} {{ $olcham_nomi }} </td>
                </td>
                <td>{{ $chiq->created_at->format('d/m/Y') }}</td>
                <td>
                <a href="{{ route('qaytar.edit', $chiq->id) }}" class="text-danger"><i class="fas fa-trash fa-lg mx-1"></i></a>
                </td>
            </tr>
        @endif
    @endforeach
@endforeach

    </tbody>
</table>

                                            </form>
<div class="item-count" id="itemCount"></div>

<div class="pagination" id="pagination"></div>




                </div>
            </div>
        </div>
    </div>

    <script>
   $(document).ready(function() {
    // Barcode change event
    $('#Barcode').on('change', function() {
        var barcodeId = $(this).val();
        if (barcodeId) {
            $.ajax({
                url: '{{ url("api/tovar-detailscan") }}',
                type: 'GET',
                data: { id: barcodeId },
                success: function(data) {
                    if (data.nomi !== null) {
                        $('#tovarid').val(data.tovarid);
                        $('#tnomi').val(data.nomi);
                        $('#dnarxi').val(data.dnarxi);
                        $('#snarxi').val(data.snarxi);
                        $('#Ombordagi').val(data.ombor);
                    } else {
                        alert('Bu barcode oid tovar mavjud emas');
                        $('#snarxi').val(0);
                        $('#Ombordagi').val(0);
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

    // Show/hide display fields based on Barcode input length
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
