@extends('english.base')
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
        $today = date('d/m/Y H:i:s');
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
                url: "{{ route('chiqim.storeeng') }}",
                cache: false,
                data: $('#material').serialize(),
                success: function(response) {
                if (response) {
                    // Handle the response
                    //alert(response);
                    try {
                        $('#suss_message2').html("<center><h5 style='color:white'>" + response + " </h5></center>");
                        $('#suss_message2').fadeIn().delay(1200).fadeOut();
                        window.setTimeout(function() {
                            window.location.href = "{{ route('adminchiqimeng') }}";
                        }, 10);
                    } catch (e) {
                        alert('Exception while handling response2: ' + e);
                    }
                } else {
                    alert('Response is null or undefined');
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
    var Nechta = document.material.Summat;
    
	if (Material_nomi(Nechta))
    {
		return true;
	}
    return false;
		
		function Material_nomi(materialnomi){
            var add = materialnomi.value;
            if (add == 0)
            {
                $('#suss_message').html("<center><h5 style='color:#ffffff;'>Enter!</h5></center>");
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
        $('#suss_message').html("<center><h5 style='color:white'>Select!</h5></center>");
        $('#suss_message').fadeIn().delay(1200).fadeOut();
    } else {
    //alert(selectedIds);
    // Send AJAX request to delete selected items
    $.ajax({
        type: 'POST',
        url: "{{ route('delete.kirimeng') }}", // Adjust the route to match your controller method
        data: {selectedIds: selectedIds},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            // Handle success response
                        $('#suss_message').html("<center><h5 style='color:white'>" + response + " </h5></center>");
                        $('#suss_message').fadeIn().delay(1200).fadeOut();
                        window.setTimeout(function() {
                            window.location.href = "{{ route('adminkirimscaneng') }}";
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
    <div class="row" style="margin: 0.01%;">
                            <div class="col-xl-6" >
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Select Products
                                    </div>
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

            <div class="card-body">
                <form class="form-horizontal" action="{{ route('chiqim.storeeng') }}" name="material" id="material" method="post">
                    @csrf <!-- CSRF token -->


                    <div class="form-group Barcode1">
    <label class="control-label">Product Name:</label>
    <div class="col-sm-9">
        <select class="form-control select2 tovar" id="tovar" style="width: 100%">
            <option>Select</option> 
            @php
                $addedTovarIds = [];
            @endphp
            @foreach($kirims as $kir)
                @foreach($tovars as $tovar)
                    @if($kir->tovar_id == $tovar->id && !in_array($tovar->id, $addedTovarIds))
                        <option value="{{ $tovar->id }}">{{ $tovar->nomi }}</option>
                        @php
                            $addedTovarIds[] = $tovar->id;
                        @endphp
                        @break
                    @endif
                @endforeach
            @endforeach 
        </select>
    </div>
</div>

                    <div class="form-group Barcode1">
                        <label class="control-label">Barcode:</label>
                        <div class="col-sm-9">  
                        <input type="text" name="barcode" id="Barcode" class="form-control Barcode" autofocus required/>
                    </div>
                    </div>

                    <div class="form-group display" style="display: none">
                        <label class="control-label">Product Name:</label>
                        <div class="col-sm-9">
                               <input type="text" name="tnomi" id="tnomi" disabled class="form-control" />
                    </div>
                    </div>

                    <div class="form-group display" style="display: none;">
                        <label class="control-label">Selling Price:</label>
                        <div class="col-sm-9">
                              <input type="text" name="snarxi" id="snarxi" disabled class="form-control" />
                    </div>
                    </div>

                    <div class="form-group display2" style="display: none">
                        <label class="control-label">Selling Price (Per Piece):</label>
                        <div class="col-sm-9">
                               <input type="text" name="dnarxi" id="dnarxi" disabled class="form-control" />
                    </div>
                    </div>
                    
                    <div class="form-group display" style="display: none">
                        <label class="control-label">Quantity in Stock:</label>
                        <div class="col-sm-9">
                            <input type="text" name="Ombordagi" disabled id="Ombordagi" class="form-control" />
                    </div>
                    </div>

                    <div class="form-group display" style="display: none">
                        <label class="control-label">Quantity:</label>
                        <div class="col-sm-9">
                                <input type="number" name="Miqdori" min="0" id="Miqdori" class="form-control" required />
                    </div>
                    </div>

                    <div class="form-group display2" style="display: none; ">
                        <label class="control-label" >Quantity (pieces):</label>
                        <div class="col-sm-9">
                            <input type="number" name="dona" id="dona" min="0" class="form-control" required />
                    </div></div>

                    <div class="form-group display" style="display: none; ">
                        <label class="control-label" >Total:</label>
                        <div class="col-sm-9">
                            <input type="number" name="Summa" id="Summa" min="0" class="form-control" required  readonly />
                    </div></div>

                    <div class="form-group display2" style="display: none; ">
                        <label class="control-label" >Total (per piece):</label>
                        <div class="col-sm-9">
                            <input type="number" name="Summadona" id="Summadona" min="0" class="form-control" required readonly/>
                    </div></div>

                    <div class="form-group display" style="display: none; ">
                        <label class="control-label" >Total Amount:</label>
                        <div class="col-sm-9">
                            <input type="number" name="Summat" id="Summat" min="0" class="form-control" required readonly/>
                    </div></div>
                
                    <input type="hidden" name="tovarid"  id="tovarid" />

                    <input type="hidden" name="userid"  id="userid"  value="{{ Auth::id() }}"/>

                    <br>
                    <button type="button" id="submit" class="btn btn-primary" onclick="material_db()">Saqlash</button>

                   </form>
            </div>
        </div>
    </div>

                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-2"></i>
                                        Sell Products
                                    

            </div>
            <div class="card-body">

            
                <div class="table-responsive" style="margin: 0%">

                <div class="search-container">
   
</div>

<table id="dataTable">
    <thead>
        <tr>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Quantity (Pieces)</th>
        <th>Amount</th>
        <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @php
            $umumiy = 0;
        @endphp
        @foreach ($chiqim as $chiq)
            @php
                $umumiy += $chiq->toliqsumma;
            @endphp
            <tr class="align-middle">
                @foreach($tovars as $tovar)
                    @if($chiq->tovar_id == $tovar->id)
                        <td>{{ $tovar->nomi }}</td>
                    @endif
                @endforeach
                <td>{{ $chiq->miqdori }}</td>
                <td>{{ $chiq->miqdoridona }}</td>
                <td>{{ $chiq->toliqsumma }}</td>
                <td>
                    <a href="{{ route('chiqim.deleteeng', $chiq->id) }}" 
                       class="text-danger" 
                       onclick="event.preventDefault(); 
                                if(confirm('Are you sure you want to delete?')) {
                                    document.getElementById('delete-about-{{ $chiq->id }}').submit();
                                }">
                        <i class="fas fa-trash fa-lg mx-1"></i>
                    </a>

                    <form id="delete-about-{{ $chiq->id }}" 
                          action="{{ route('chiqim.deleteeng', $chiq->id) }}" 
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

<h5>
    @if($umumiy > 0)
        Total: 
        {{ $umumiy }} so`m
    
</h5>

<form action="{{ route('chiqim.sotildieng') }}" method="POST" id="sotildiForm">
    @csrf
    <button type="submit" style="margin-right: 1%; width: 100%; color: white" class="btn btn-success" onclick="printReceipt()">Sold</button>
</form>

@endif

            </div>
        </div>
    </div>
<div>
<script>
                            $('.select2').select2();
                            $('#tovar').on('change', function() {
    var barcodeId = $(this).val();
    //alert(barcodeId);
    if (barcodeId) {
        $.ajax({
            url: '{{ url("api/tovarid-detailscan") }}',
            type: 'GET',
            data: { id: barcodeId },
            success: function(data) {
                if (data.tovarid > 0) {
                    if (data.ombor > 0 || data.ombordona > 0) {
                        //alert(data.olcham2);
                        $('.display').show();
                        $('#tovarid').val(data.tovarid);
                        $('#tnomi').val(data.nomi);
                        if (data.dnarxi > 0) { $('.display2').show(); $('#dnarxi').val(data.dnarxi); } else { $('.display2').hide(); $('#dnarxi').val(''); }
                        $('#snarxi').val(data.snarxi);
                        $('#Ombordagi').val(data.ombor+" "+data.olcham2+" "+data.ombordona+" dona");
                        $('#dona').val(0);
                        $('#Summadona').val(0);
                        $('#Summa').val(0);
                        $('#Miqdori').val(0);
                        $('#Summat').val(0);
                    } else {
                        alert("Product out of stock!");
                        $('.display').hide();
                        $('.display2').hide();
                        $('#tovarid').val('');
                        $('#tnomi').val('');
                        $('#dnarxi').val('');
                        $('#snarxi').val('');
                        $('#Ombordagi').val('');
                        $('#dona').val(0);
                        $('#Summadona').val(0);
                        $('#Summa').val(0);
                        $('#Miqdori').val(0);
                        $('#Summat').val(0);
                    }
                } else {
                    alert('No product exists for this barcode');
                    $('.display').hide();
                    $('.display2').hide();
                    $('#tovarid').val('');
                    $('#tnomi').val('');
                    $('#dnarxi').val('');
                    $('#snarxi').val('');
                    $('#Ombordagi').val('');
                    $('#dona').val(0);
                    $('#Summadona').val(0);
                    $('#Summa').val(0);
                    $('#Miqdori').val(0);
                    $('#Summat').val(0);
                }
            },
            error: function(xhr) {
                console.log('Error:', xhr);
                alert(xhr);
            }
        });
    } else {
        $('#snarxi').val(0);
        $('#Ombordagi').val(0);
    }
});      

                        </script>
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
                if (data.tovarid > 0) {
                    if (data.ombor > 0 || data.ombordona > 0) {
                        //alert(data.olcham2);
                        $('.display').show();
                        $('#tovarid').val(data.tovarid);
                        $('#tnomi').val(data.nomi);
                        if (data.dnarxi > 0) { $('.display2').show(); $('#dnarxi').val(data.dnarxi); } else { $('.display2').hide(); $('#dnarxi').val(''); }
                        $('#snarxi').val(data.snarxi);
                        $('#Ombordagi').val(data.ombor+" "+data.olcham2+" "+data.ombordona+" dona");
                        $('#dona').val(0);
                        $('#Summadona').val(0);
                        $('#Summa').val(0);
                        $('#Miqdori').val(0);
                        $('#Summat').val(0);
                    } else {
                        alert("Product out of stock!");
                        $('.display').hide();
                        $('.display2').hide();
                        $('#tovarid').val('');
                        $('#tnomi').val('');
                        $('#dnarxi').val('');
                        $('#snarxi').val('');
                        $('#Ombordagi').val('');
                        $('#dona').val(0);
                        $('#Summadona').val(0);
                        $('#Summa').val(0);
                        $('#Miqdori').val(0);
                        $('#Summat').val(0);
                    }
                } else {
                    alert('No product exists for this barcode');
                    $('.display').hide();
                    $('.display2').hide();
                    $('#tovarid').val('');
                    $('#tnomi').val('');
                    $('#dnarxi').val('');
                    $('#snarxi').val('');
                    $('#Ombordagi').val('');
                    $('#dona').val(0);
                    $('#Summadona').val(0);
                    $('#Summa').val(0);
                    $('#Miqdori').val(0);
                    $('#Summat').val(0);
                }
            },
            error: function(xhr) {
                console.log('Error:', xhr);
                alert(xhr);
            }
        });
    } else {
        $('#snarxi').val(0);
        $('#Ombordagi').val(0);
    }
});

///////////////////////////////////
    // Barcode change event
    $('#Miqdori').on('change', function() {
    var Miqd = $(this).val();
    var tovarId = $('#tovarid').val();
   
    //alert(Miqd);
    if (Miqd) {
        $.ajax({
            url: '{{ url("api/tovar-miqdori") }}',
            type: 'GET',
            data: { id: tovarId, miqdori: Miqd },
            success: function(data) {
                if (Miqd <= data.ombor && Miqd >= 0) {
                        $('#Summa').val(Miqd * data.narxi);
                        var Summa = $('#Summa').val();
                        var Summad = $('#Summadona').val();
                        var tsumma = +Summa + +Summad;
                        $('#Summat').val(tsumma);
                }else{
                    alert("You cannot enter a quantity higher than the available stock!");
                    $('#Summa').val(0);
                    $('#Summadona').val(0);
                    $('#Miqdori').val(0);
                    $('#Summat').val(0);
                    $('#dona').val(0);
                }
            },
            error: function(xhr) {
                console.log('Error:', xhr);
                alert(xhr);
            }
        });
    } else {
        $('#Summa').val(0);
        $('#Miqdori').val(0);
    }
});
/////////////////////////////////
$('#dona').on('change', function() {
    var Miqdona = $(this).val();
    var tovarId = $('#tovarid').val();
    
    //alert();
    if (Miqdona) {
        $.ajax({
            url: '{{ url("api/tovar-miqdoridona") }}',
            type: 'GET',
            data: { id: tovarId, miqdoridona: Miqdona },
            success: function(data) {
                if (Miqdona <= data.ombordona && Miqdona >= 0) {
                        $('#Summadona').val(Miqdona * data.narxi);
                        var Summa = $('#Summa').val();
                        var Summad = $('#Summadona').val();
                        var tsumma = +Summa + +Summad;
                        $('#Summat').val(tsumma);
                }else{
                    alert("You cannot enter a quantity higher than the available stock!");
                    $('#dona').val(0);
                    $('#Summadona').val(0);
                    $('#Summa').val(0);
                    $('#Summat').val(0);
                    $('#Miqdori').val(0);
                }
            },
            error: function(xhr) {
                console.log('Error:', xhr);
                alert(xhr);
            }
        });
    } else {
        $('#dona').val(0);
        $('#Summadona').val(0);
    }
});
//////////////////////////////////
    // Show/hide display fields based on Barcode input length
    $('#Barcode').on('input', function() {
        if ($(this).val().length > 0) {
            //$('.display').show();
            //$('#Barcode').hide();
        } else {
            $('.display').hide();
        }
    });
});
    </script>
<script>
    function handlePrint(event) {
        // Prevent the form from submitting immediately
        event.preventDefault();

        // Use AJAX to submit the form data
        var form = document.getElementById('sotildiForm');
        var formData = new FormData(form);

        fetch(form.action, {
            method: form.method,
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Print the receipt
                printReceipt();

                // Optionally, redirect or show a success message
                window.location.href = "{{ route('adminchiqimeng') }}";
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    function printReceipt() {
        var printContent = "<html><head><title>Receipt</title></head><body>";
        printContent += "<center><h4>CHEK</h4></center>"; // Customize this part as per your receipt format
        printContent += "<table border='0'>";
        printContent += "<thead  style='font-size: 10px'><tr><th>Product Name</th><th>Quantity</th><th>Amount</th></tr></thead>";
        printContent += "<tbody>";

        @foreach ($chiqim as $chiq)
            @foreach($tovars as $tovar)
                @if($chiq->tovar_id == $tovar->id)
                    var miqdori = {{ $chiq->miqdori }};
                    var miqdoridona = {{ $chiq->miqdoridona }};

                    printContent += "<tr style='font-size: 10px'>";
                    printContent += "<td>{{ $tovar->nomi }}</td>";
                    if(miqdori > 0 & miqdoridona > 0){
                        printContent += "<td>{{ $chiq->miqdori }},  {{ $chiq->miqdoridona }} dona</td>";
                    }else if(miqdori > 0 & miqdoridona == 0){
                        printContent += "<td>{{ $chiq->miqdori }}</td>";
                    }else{
                        printContent += "<td>{{ $chiq->miqdoridona }} dona</td>";
                    }
                    //printContent += "<td>{{ $chiq->miqdori }},  {{ $chiq->miqdoridona }} dona</td>";
                    printContent += "<td>{{ $chiq->toliqsumma }}</td>";
                    
                    printContent += "</tr>";
                @endif
            @endforeach
        @endforeach

        printContent += "</tbody></table>";
        printContent += "___________________________";
        printContent += "<p>Total: {{ $umumiy }} </p>";
        printContent += "___________________________";
        printContent += "<p>Thank you for your purchase!</p>";
        printContent += "<p>{{ $today }}</p>";
        printContent += "</body></html>";

        
        var printWindow = window.open('', '', 'height=400,width=800');
        printWindow.document.write(printContent);
        printWindow.document.close();
        printWindow.print();
        printWindow.close();
        //var originalContent = document.body.innerHTML; // Save the original page content
        //    document.body.innerHTML = printContent; // Replace the content with the receipt

        //    window.print(); // Trigger the print dialog

        //    document.body.innerHTML = originalContent;            
    }
</script>
@endsection
