@include('includes.base')
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
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Patients Table</h4>
                    <p class="card-description"> List of Patients <code> San Miguel PPC</code>
                    </p>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Birthday</th>
                            <th>Gender</th>
                            <th>Age</th>
                            <th>Parent/Guardian</th>
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
                            <td>{{ $patient->parents ? $patient->parents->lastname . ', ' . $patient->parents->firstname . ' ' . $patient->parents->middlename : ' ' }}</td>
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
    <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/todolist.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>