<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Admin</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('Dashboard/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{ asset('Dashboard/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{ asset('Dashboard/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast/dist/css/iziToast.min.css">
  <script src="https://cdn.jsdelivr.net/npm/izitoast/dist/js/iziToast.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="  crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('Dashboard/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{ asset('Dashboard/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('Dashboard/js/select.dataTables.min.css')}}">
  <!-- End plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('Dashboard/css/vertical-layout-light/style.css')}}">

</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href=""><img src="{{ asset('Dashboard/images/logo.svg')}}" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href=""><img src="{{ asset('Dashboard/images/logo-mini.svg')}}" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="vehicleSearchInput" placeholder="Search now" aria-label="search" aria-describedby="search">
              <div id="searchResultsContainer" class="search-results"></div>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">

          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="{{ asset('Dashboard/images/faces/face28.jpg')}}" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <form action="{{ route('logout') }}" method="POST" style="display: none;" id="logout-form">
                    @csrf
                </form>
              <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>

        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="{{route('AdminDash')}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('ClientDash')}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Clients</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('VoitureDash')}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Voitures</span>
            </a>
          </li>

        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                    <h4 class="card-title"> Gestion Des Voitures</h4>
                    <button type="button" class="btn btn-primary" data-modal-target="static-modal" data-modal-toggle="static-modal" >
                        Create New Vehicle
                      </button>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Make</th>
                                <th>Model</th>
                                <th>Fuel Type</th>
                                <th>Registration</th>
                                <th>Client</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach($vehicles as $vehicle)
                            <tr>
                                <td>
                                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                        @if(!empty($vehicle->photos))
                                            @php
                                            $photos = json_decode($vehicle->photos, true);
                                            @endphp

                                            @foreach($photos as $photo)
                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up">
                                                <!-- Update here: Wrap the image in an anchor tag -->
                                                <a href="#imageModal" data-bs-toggle="modal" data-img-src="{{ asset($photo) }}">
                                                    <img src="{{ asset($photo) }}" alt="Vehicle photo" class="rounded-circle">
                                                </a>
                                            </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </td>
                                <td>{{ $vehicle->make }}</td>
                                <td>{{ $vehicle->model }}</td>
                                <td>{{ $vehicle->fuelType }}</td>
                                <td>{{ $vehicle->registration }}</td>
                                <td>{{ $vehicle->client->username }}</td> <!-- Assuming you have a relationship to a client model -->
                                <td>

                                        <a class="dropdown-item editVehicleBtn" href="javascript:void(0);"
                                        data-vehicle-id="{{ $vehicle->id }}"
                                        >
                                        <i class="fa-solid fa-pen-to-square"></i>
                                     </a>

                                     <a class="dropdown-item deleteVehicleBtn" href="javascript:void(0);" data-vehicle-id="{{ $vehicle->id }}">
                                        <i class="fa-solid fa-trash"></i>
                                      </a>

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
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>


<!-- Create Vehicle Modal -->
<div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">

                    <form id="createVehicleForm" enctype="multipart/form-data">
                      <div class="modal-body">
                        <div class="row">
                            <div class="mb-1 col-md-6">
                            <label for="vehicleMake" class="form-label">Make</label>
                            <input type="text" class="form-control" id="vehicleMake" name="make" required>
                            </div>
                            <div class="mb-1 col-md-6">
                            <label for="vehicleModel" class="form-label">Model</label>
                            <input type="text" class="form-control" id="vehicleModel" name="model" required>
                            </div>
                        </div>
                        <div class="mb-1">
                            <label for="registration" class="form-label">Registration</label>
                            <input type="text" class="form-control" id="registration" name="registration" required>
                        </div>
                        <div class="row">
                        <div class="mb-1 col-md-6">
                          <label for="fuelType" class="form-label">Fuel Type</label>
                          <select class="form-control form-control-sm" id="fuelType" name="fuelType" required>
                            <option value="" style="display: none">Select Fuel Type</option>
                            <option value="Petrol">Petrol</option>
                            <option value="Diesel">Diesel</option>
                            <option value="Electric">Electric</option>
                            <option value="Hybrid">Hybrid</option>
                          </select>
                        </div>
                        <!-- Photos input will require custom handling, especially if you plan to upload files -->
                        <div class="mb-1 col-md-6">
                          <label for="clientID" class="form-label">Client</label>
                          <select class="form-control form-control-sm" id="clientID" name="clientID" required>
                            <option value="" class="hidden">Choose One</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->username }}</option>
                            @endforeach
                          </select>
                        </div>
                    </div>

                        <div class="mb-1">
                            <label for="vehiclePhotos" class="form-label">Vehicle Photos</label>
                            <input type="file" class="form-control" id="vehiclePhotos" name="photos[]" multiple required>
                            <small class="form-text text-muted">You can select multiple photos.</small>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-modal-hide="static-modal" >Close</button>
                        <button type="submit" class="btn btn-primary">Create Vehicle</button>
                      </div>
                    </form>
            </div>
        </div>
    </div>
</div>


<!-- Edit Vehicle Modal -->
<div class="modal fade " id="editVehicleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" style="margin-top: 50px !important;max-width:50% !important">
      <div class="lds-roller editmodaleloader" id="loader"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
      <div class="modal-content">
        <div class="modal-body" style="padding-bottom: 0px !important">
          <form id="editVehicleForm">
            <input type="hidden" id="editVehicleId" name="id">
            <div class="row">
                <div class="mb-3 col-md-4">
                <label for="editMake" class="form-label">Make</label>
                <input type="text" class="form-control" id="editMake" name="make">
                </div>
                <div class="mb-3 col-md-4">
                <label for="editModel" class="form-label">Model</label>
                <input type="text" class="form-control" id="editModel" name="model">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="editRegistration" class="form-label">Registration</label>
                    <input type="text" class="form-control" id="editRegistration" name="registration">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="editFuelType" class="form-label">Fuel Type</label>
                    <select  class="form-control form-control-sm"  id="editFuelType" name="fuelType" required>
                    <option value="">Select Fuel Type</option>
                    <option value="Petrol">Petrol</option>
                    <option value="Diesel">Diesel</option>
                    <option value="Electric">Electric</option>
                    <option value="Hybrid">Hybrid</option>
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="editClientID" class="form-label">Client</label>
                    <select  class="form-control form-control-sm"  id="editClientID" name="clientID" required>
                    <option value="" class="hidden">Choose One</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->username }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3">
              <label for="editPhotos" class="form-label">Vehicle Photos</label>
              <input type="file" class="form-control" id="editPhotos" name="photos[]" multiple>
              <div id="editPhotosPreview" class="mt-2"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


 <!-- Creat Vehicle Script -->
 <script>
    document.getElementById('createVehicleForm').addEventListener('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        fetch('{{ route("vehicles.store") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json', // Ensure Laravel knows to respond with JSON
            },
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(errorData => {
                    // Log or display the validation errors
                    console.error('Validation errors:', errorData.errors);
                    throw new Error('Validation failed');
                });
            }
            return response.json();
        })
        .then(data => {
            iziToast.success({
                title: 'Success',
                message: data.success,
                position: 'topRight',
                timeout: 1500,
                onClosed: function() {
                    window.location.reload();
                }
            });
        })
        .catch(error => {
            console.error('Error:', error);
            iziToast.error({
                title: 'Error',
                message: 'There was an issue with your request.'+error,
                position: 'topRight',
                timeout: 1500,
            });
        });
    });
    </script>


<!-- Edit Vehicle Script-->
<script>

    $(document).ready(function() {
      // Function to load vehicle details into the modal
      function loadVehicleDetails(id) {
        // Fetch vehicle details from the server
        $.get('/vehicle-info/' + id, function(data) {
          $('#editVehicleId').val(data.id);
          $('#editMake').val(data.make);
          $('#editModel').val(data.model);
          $('#editRegistration').val(data.registration);
          $('#editFuelType').val(data.fuelType);
            $('#editClientID').val(data.clientId);

          // Handle the client selection
          $('#editClient').val(data.clientId);

          let imagesHtml = '';
            data.photos.forEach(function(photo, index) {
            // Start a new flex container for every fourth photo (0, 4, 8, ...)
            if (index % 4 === 0) imagesHtml += `<div class="flex flex-wrap -mx-1">`; // Adjusted margin for closer spacing

            imagesHtml += `
                <div  id="photo_${id}_${index}" class="flex flex-col items-center p-1 w-1/4"> <!-- Adjusted width for 4 images per row -->
                <img src="${photo.url}" class="img-thumbnail w-[100px] h-[100px] max-w-[100px]  mx-auto"> <!-- Center image in the allocated space -->
                <button type="button" class="btn btn-danger btn-sm mt-2" onclick="removePhoto(${id}, ${index})">Remove</button>
                </div>`;

            // Close the flex container after every fourth photo or the last photo
            if ((index + 1) % 4 === 0 || index === data.photos.length - 1) imagesHtml += `</div>`;
            });
            $('#editPhotosPreview').html(imagesHtml);


        });
      }
      let photoRemoved = false;
      // Function to remove a photo
      window.removePhoto = function(vehicleId, index) {
        console.log("Removing photo with ID:", index, " for vehicle:", vehicleId);

        $.ajax({
            url: `/delete-photo/${vehicleId}/${index}`,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
            },
            success: function(result) {
                // Remove the div containing the photo
                $('#photo_' + vehicleId + '_' + index).remove();
                photoRemoved = true;
                iziToast.success({
                    title: 'Success',
                    message: 'Photo removed successfully.', // Adjust the message as needed
                    position: 'topRight',
                    timeout: 1500
                });


            },
            error: function(error) {
                console.error("Error removing photo: ", error);
                iziToast.error({
                    title: 'Error',
                    message: 'Could not remove the photo.', // Adjust the message as needed
                    position: 'topRight',
                    timeout: 1500
                });
            }
        });
    };

    $('#editVehicleModal').on('hidden.bs.modal', function() {
        if (photoRemoved) {
            window.location.reload();
            photoRemoved = false; // Reset the flag
        }
    });


      // When the edit button is clicked
      $(document).on('click', '.editVehicleBtn', function() {
        var vehicleId = $(this).data('vehicle-id'); // Correctly reference the data attribute
        loadVehicleDetails(vehicleId);
        $('#editVehicleModal').modal('show');
      });

      $('#editVehicleForm').submit(function(e) {
            e.preventDefault();
            // Assuming you have an input field with the vehicle ID.
            // For example, if your vehicle ID is stored in a hidden input within the form:
            var vehicleId = $('#editVehicleId').val(); // Ensure this ID is correct.
            var formData = new FormData(this);
            // Dynamically set the URL to include the vehicle ID.
            var url = '/update-vehicle/' + vehicleId;

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                contentType: false, // Important for files, don't specify content type.
                processData: false, // Important for files, don't process data into a string.
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Ensure CSRF token is included.
                },
                success: function(data) {
                   iziToast.success({
                    title: 'Success',
                    message: 'Data has been successfully updated',
                    position: 'topRight',
                    timeout: 1500, // Auto close after 2.5 seconds
                    onClosed: function() {
                        window.location.reload(); // Reload page when toast is closed
                    }
                });
                },
                error: function(error) {
                    iziToast.error({
                        title: 'Error',
                        message: 'Unexpected error occurred.',
                        position: 'topRight',
                        timeout: 2500, // Auto close after 2.5 seconds
                    });
                }
            });
        });

    });

;


  </script>




<!-- Delete Vehicle Script-->

<script>
    $(document).ready(function() {
  $('.deleteVehicleBtn').click(function(e) {
    e.preventDefault();

    const vehicleId = $(this).data('vehicle-id');
    const deleteUrl = `/Vehicle/Delete/${vehicleId}`; // Adjust this URL as needed

    // SweetAlert confirmation dialog


    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {

        // User confirmed the deletion
        $.ajax({
          url: deleteUrl,
          type: 'DELETE', // Make sure this matches the method expected by your route
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Ensure CSRF token is sent; adjust if your setup differs
          },
          success: function(result) {
            iziToast.success({
                    title: 'Success',
                    message: 'The vehicle has been deleted.',
                    position: 'topRight',
                    timeout: 1500, // Auto close after 2.5 seconds
                    onClosed: function() {
                        window.location.reload(); // Reload page when toast is closed
                    }
                });
          },
          error: function(xhr, ajaxOptions, thrownError) {

            Swal.fire(
              'Failed!',
              'Failed to delete the vehicle. Please try again.',
              'error'
            );
          }
        });
      }
    });
  });
});

</script>


  <!-- plugins:js -->
  <script src="{{ asset('Dashboard/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('Dashboard/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{ asset('Dashboard/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{ asset('Dashboard/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <script src="{{ asset('Dashboard/js/dataTables.select.min.js')}}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('Dashboard/js/off-canvas.js')}}"></script>
  <script src="{{ asset('Dashboard/js/hoverable-collapse.js')}}"></script>
  <script src="{{ asset('Dashboard/js/template.js')}}"></script>
  <script src="{{ asset('Dashboard/js/settings.js')}}"></script>
  <script src="{{ asset('Dashboard/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('Dashboard/js/dashboard.js')}}"></script>
  <script src="{{ asset('Dashboard/js/Chart.roundedBarCharts.js')}}"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
  <!-- End custom js for this page-->
</body>

</html>


