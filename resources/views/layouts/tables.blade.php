@include('includes.base')

<style>
    .input-group .input-group-text {
      background-color: #f8f9fa;
      border: 1px solid #ced4da;
      padding: 0.25rem 0.5rem;
    }
    .form-control {
      border-left: 1px solid #ced4da; 
    }
    .icon-search {
      font-size: 1.2rem; 
      color: #6c757d; 
    }
    #navbar-search-input {
    padding: 0.50rem 0.50rem;
    height: 35px; 
    font-size: 0.875rem; 
  }

  .input-group-text {
    padding: 0.25rem 0.5rem;
    height: 35px; 
    display: flex;
    align-items: center;
  }

  .icon-search {
    font-size: 0.875rem; 
  }
  
  </style>
<script>
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ session('success') }}'
                });
            @endif
        });
    </script>
       <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Failed',
                    text: '{{ session('error') }}'
                });
            @endif
        });
    </script>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      @include('includes.navbar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        @include('includes.sidebar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-lg-16 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Patients Table <a href="javascript:void(0);" class="btn btn-info btn-sm text-white" style="float:right;margin-left:3px;" onclick="printTable()"><i class="mdi mdi-printer menu-icon"></i> Print</a>
                    <a href="javascript:void(0);" class="btn btn-success btn-sm text-white" style="float:right;margin-right:2px;" onclick="exportTableToExcel('patientTable', 'PatientData')"><i class="mdi mdi-table menu-icon"></i> Excel</a></h4>
                    <p class="card-description"> List of Patients <code> San Miguel PPC</code>
                    </p>
                    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                    <ul class="navbar-nav col-lg-3">
                      <li class="nav-item nav-search dblock">
                      <form action="{{ route('patient.search') }}" method="GET">
                        <div class="input-group">
                        <input type="text" class="form-control " id="navbar-search-input" name="searchPatient" placeholder="Search now" aria-label="search" aria-describedby="search">
                          <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                            <button type="submit" name="submit" class="input-group-text" id="search">
                              <i class="icon-search"></i>
                            </button>
                          </div>
                          </form>
                        </div>
                      </li>
                    </ul>
                  </div>
                    <div class="table-responsive">
                    <!-- <form method="GET" action="{{ route('table') }}">
                      <label for="perPage">Items per page:</label>
                      <select name="perPage" id="perPage" onchange="this.form.submit()">
                          <option value="5" {{ $perPage == 5 ? 'selected' : '' }}>5</option>
                          <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                          <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20</option>
                          <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                          <option value="all" {{ $perPage == 'all' ? 'selected' : '' }}>Show All</option>
                      </select>
                  </form> -->
                   <form method="GET" action="{{ route('table') }}">
                  <label for="perPage">Items per page:</label>
                  <select name="perPage" id="perPage" onchange="this.form.submit()">
                      <option value="5" {{ $perPage == 5 ? 'selected' : '' }}>5</option>
                      <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                      <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20</option>
                      <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                      <option value="all" {{ $perPage == 'all' ? 'selected' : '' }}>Show All</option>
                  </select>

                    <label for="ageGroup">Age Group:</label>
                    <select name="ageGroup" id="ageGroup" onchange="this.form.submit()">
                        <option value="">All Ages</option>
                        <option value="0-5" {{ $ageGroup == '0-5' ? 'selected' : '' }}>0-5 months</option>
                        <option value="6-11" {{ $ageGroup == '6-11' ? 'selected' : '' }}>6-11 months</option>
                        <option value="12-23" {{ $ageGroup == '12-23' ? 'selected' : '' }}>12-23 months</option>
                        <option value="24-35" {{ $ageGroup == '24-35' ? 'selected' : '' }}>24-35 months</option>
                        <option value="36-47" {{ $ageGroup == '36-47' ? 'selected' : '' }}>36-47 months</option>
                        <option value="48-59" {{ $ageGroup == '48-59' ? 'selected' : '' }}>48-59 months</option>
                    </select>
                </form>

                    <table id="patientTable" style="display:none;">
                      <thead>
                          <tr>
                              <th>Last Name</th>
                              <th>First Name</th>
                              <th>Middle Name</th>
                              <th>Birthday</th>
                              <th>Gender</th>
                              <th style="display:none;">Height (m)</th>
                              <th style="display:none;">Weight (kg)</th>
                              <th>Age in Month</th>
                              <th>Weight for Age</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($patientsData as $patient)
                          <tr>
                              <td>{{ $patient->lastname }}</td>
                              <td>{{ $patient->firstname }}</td>
                              <td>{{ $patient->middlename }}</td>
                              <td>{{ \Carbon\Carbon::parse($patient->birthday)->format('F j, Y') }}</td>
                              <td>{{ $patient->gender }}</td>
                              <td style="display:none;">{{ $patient->height }}</td>
                              <td style="display:none;">{{ $patient->weight }}</td>
                              <td class="{{ $patient->age > 5 ? 'text-danger fw-bold' : '' }}">{{ $patient->age }}</td>
                              <td>{{ $patient->wfa }}</td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
                      <table  class="table">
                        <thead>
                          <tr>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Birthday</th>
                            <th>Gender</th>
                            <th>Age in Month</th>
                            <th>Weight for Age</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($patientsData as $patient)
                          <tr>
                            <td>{{$patient->lastname}}</td>
                            <td>{{$patient->firstname}}</td>
                            <td>{{$patient->middlename}}</td>
                            <td >{{ \Carbon\Carbon::parse($patient->birthday)->format('F j, Y') }}</td>
                            <td>{{$patient->gender}}</td>
                            <td class="{{ $patient->age > 5 ? 'text-danger fw-bold' : '' }}">{{$patient->age}}</td>
                            <td>{{ $patient->wfa }}</td>
                            <td>
                            <a href="{{ route('view.profile', ['id'=> $patient->id]) }}" class="btn btn-success btn-sm text-white"><i class="mdi mdi-eye text-white"></i></a>
                             @if($patient->age > 5)
                              <a href="" data-bs-toggle="modal" data-bs-target="#deleteModal{{$patient->id}}" class="btn btn-danger btn-sm text-white"><i class="mdi mdi-delete text-white"></i></a>
                              <div class="modal fade" id="deleteModal{{$patient->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog ">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">Delete Patient</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                      <form action="{{ route('patient.delete', ['id' => $patient->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                      <p>Delete <span class="text-danger fw-bold">{{$patient->lastname}}, {{$patient->firstname}} {{$patient->middlename}}</span> as patient?</p>
                                  </div>
                                  <div class="modal-footer">
                                        <button type="submit" name="submit" class="btn btn-danger btn-sm text-white fw-bold">Delete</button>
                                        <button type="button" data-bs-dismiss="modal" class="btn btn-secondary btn-sm fw-bold"> Close</button>
                                    </div>
                                  </form>
                                  </div>
                                </div>
                              </div>
                            </td>
                            @endif
                          </tr>
                          @endforeach
                        </tbody>
                      </table>                  
                    </div>
                  </div>
                  @if($perPage != 'all')
                  {{ $patientsData->appends(['perPage' => $perPage])->links('vendor.pagination.bootstrap-5') }}
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023. Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ms-1"></i></span>
            </div>
          </footer>
        </div>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.2/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

    <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/todolist.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.min.js"></script>
      <script>
       function exportTableToExcel(tableID, filename = 'PatientData') {
        var table = document.getElementById(tableID);
        var wb = XLSX.utils.table_to_book(table, { sheet: "Sheet 1" });
        XLSX.writeFile(wb, filename + ".xlsx");
    }
      </script>
        <script>
       function printTable() {
    // Reference to the table
    var table = document.getElementById('patientTable');
    table.style.display = 'table';
    var printWindow = window.open('', '', 'height=600,width=800');
    var tableHTML = table.outerHTML;
    printWindow.document.write(`
        <html>
            <head>
                <title>Print Patient Table</title>
                <style>
                    table, th, td {
                    border: 1px solid black;
                    border-collapse: collapse;
                    padding: 5px;
                }
                th {
                    background-color: #f2f2f2;
                }
                /* Set a fixed width for the first column */
                th:first-child, td:first-child {
                    width: 100px; /* Set to your desired width */
                }
                /* Optional: Adjust other columns as needed */
                th:nth-child(2), td:nth-child(2) {
                    width: 150px; /* Example width for the second column */
                }
                th:nth-child(3), td:nth-child(3) {
                    width: 150px; /* Example width for the third column */
                }
                </style>
            </head>
            <body>
                <h2>Patient Information</h2>
                ${tableHTML}
            </body>
        </html>
    `);

    // Close the document and print
    printWindow.document.close();
    printWindow.focus(); // Focus on the new window
    printWindow.print(); // Open print dialog

    // Close the window after printing
    printWindow.close();

    // Revert the table back to not being displayed
    table.style.display = 'none'; // Hide the table again
}



</script>
  </body>
</html>