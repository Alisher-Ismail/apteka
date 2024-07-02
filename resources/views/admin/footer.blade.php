<footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Urobot {{ now()->format('d/m/Y') }}</div>
                         
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('admin/js/scripts.js')}}"></script>
        <script src="{{asset('admin/js/jquery.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('admin/assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('admin/assets/demo/chart-bar-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('admin/js/datatables-simple-demo.js')}}"></script>
    </body>
    <script>
    $(document).ready(function() {
        // Hide the success message after 5 seconds
        setTimeout(function() {
            $('#success-message').fadeOut('slow');
            $('#ajax_warning').fadeOut('slow');
        }, 5000);
    });
</script>

<script>
    var currentPage = 1;
    var rowsPerPage = 10;

    function displayPagination() {
        var table = document.getElementById("dataTable");
        var rowCount = table.rows.length - 1; // Subtract header row
        var pageCount = Math.ceil(rowCount / rowsPerPage);
        var paginationHTML = "";

        for (var i = 1; i <= pageCount; i++) {
            paginationHTML += "<a href='#' onclick='changePage(" + i + ")'>" + i + "</a>";
        }

        document.getElementById("pagination").innerHTML = paginationHTML;
    }

    function changePage(page) {
        currentPage = page;
        displayData();
        displayPagination();
    }

    function displayData() {
    var table = document.getElementById("dataTable");
    var startIndex = (currentPage - 1) * rowsPerPage + 1;
    var endIndex = Math.min(startIndex + rowsPerPage - 1, table.rows.length - 1);

    for (var i = 1; i < table.rows.length; i++) {
        if (i >= startIndex && i <= endIndex) {
            table.rows[i].style.display = "";
        } else {
            table.rows[i].style.display = "none";
        }
    }

    // Update item count
    var visibleItemCount = endIndex - startIndex + 1;
    var totalItemCount = table.rows.length - 1; // Exclude header row
    document.getElementById("itemCount").innerText = "Jadvalda ko'rsatilayotgan ma'lumotlar soni: " + totalItemCount;
}


    function changePerPage() {
        rowsPerPage = parseInt(document.getElementById("perPage").value);
        currentPage = 1;
        displayData();
        displayPagination();
    }

    function searchTable() {
    var input, filter, table, tr, td, i, j, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("dataTable");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        var displayRow = false;
        for (j = 0; j < tr[i].cells.length; j++) {
            td = tr[i].cells[j];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    displayRow = true;
                    break; // If match found in any cell, no need to check other cells in the same row
                }
            }
        }
        if (displayRow) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }
    currentPage = 1;
    displayPagination();
}


    function exportToCSV() {
        var table = document.getElementById("dataTable");
        var csv = [];
        for (var i = 0; i < table.rows.length; i++) {
            var row = [];
            for (var j = 0; j < table.rows[i].cells.length; j++) {
                row.push(table.rows[i].cells[j].innerText);
            }
            csv.push(row.join(","));
        }
        var csvContent = "data:text/csv;charset=utf-8," + csv.join("\n");
        var encodedUri = encodeURI(csvContent);
        var link = document.createElement("a");
        link.setAttribute("href", encodedUri);
        link.setAttribute("download", "table_data.csv");
        document.body.appendChild(link); // Required for FF
        link.click(); // This will download the CSV file
    }


    displayData();
    displayPagination();

    
</script>

</html>