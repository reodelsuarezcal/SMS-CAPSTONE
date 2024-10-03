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
                    <h4 class="card-title">Parents Table</h4>
                    <p class="card-description"> List of Parents <code> San Miguel PPC</code>
                    </p>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Birthday</th>
                            <th>Civi Status</th>
                            <th>Contact No.</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($parentsData as $parent)
                          <tr>
                            <td>{{$parent->lastname}}</td>
                            <td>{{$parent->firstname}}</td>
                            <td>{{$parent->middlename}}</td>
                            <td >{{ \Carbon\Carbon::parse($parent->birthday)->format('F j, Y') }}</td>
                            <td>{{$parent->civil_stat}}</td>
                            <td>{{$parent->contact_no}}</td>
                            <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#editModal{{$parent->id}}"  class="btn btn-success btn-sm text-white"><i class="mdi mdi-table-edit text-white"></i></a>
                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal{{$parent->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModalLabel">Edit Parent</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <form method="post" action="{{  route('parent.update', ['id' => $parent->id]) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="row mb-2">
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="lastname" value="{{$parent->lastname}}" placeholder="Last Name" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="firstname" value="{{$parent->firstname}}"  placeholder="First Name" required>
                                                </div>
                                                </div>
                                                <div class="row mb-2 ">
                                                <div class="col-md-6">
                                                <input type="text" class="form-control" name="middlename" value="{{$parent->middlename}}"  placeholder="Middle Name" required>
                                                </div>
                                                <div class="col-md-6">
                                                <input type="date" class="form-control" name="birthday" placeholder="Birthday" value="{{$parent->birthday}}" required>
                                                </div>
                                                </div>
                                                <div class="row ">
                                                <div class="col-md-6">
                                                <select class="form-select text-dark" name="civil_stat" value="{{$parent->civil_stat}}" aria-label="Select Gender">
                                                        <option  class="text-dark" selected>{{$parent->civil_stat}}</option>
                                                        <option class="text-dark" value="Single">Single</option>
                                                        <option class="text-dark" value="Married">Married</option>
                                                        <option class="text-dark" value="Widowed">Widowed</option>
                                                        <option class="text-dark" value="Legally seperated">Legally separated</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                <input type="text" class="form-control" value="{{$parent->contact_no}}" name="contact_no" placeholder="Mobile/Tel No." required>
                                                </div>
                                                </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                              <a href="" data-bs-toggle="modal" data-bs-target="#deleteModal{{$parent->id}}" class="btn btn-danger btn-sm text-white"><i class="mdi mdi-delete text-white"></i></a>
                              <div class="modal fade" id="deleteModal{{$parent->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog ">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">Delete Patient</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                      <form action="{{route('parent.delete', ['id' => $parent->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                      <p>Delete <span class="text-danger fw-bold">{{$parent->lastname}}, {{$parent->firstname}} {{$parent->middlename}}</span> as patient?</p>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
  </body>
</html>