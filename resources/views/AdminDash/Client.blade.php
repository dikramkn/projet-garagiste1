<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Admin</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

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
                    <h4 class="card-title"> Gestion Des Clients</h4>

                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>UserName</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($users as $user)
                            <tr>
                              <td><strong>{{ $user->username }}</strong></td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $user->address }}</td>
                              <td>{{ $user->phoneNumber }}</td>
                              <td>
                                      <a class="dropdown-item" href="javascript:void(0);"  data-modal-target="default-modal" data-modal-toggle="default-modal"
                                      data-user-id="{{ $user->id }}"
                                      data-username="{{ $user->username }}"
                                      data-email="{{ $user->email }}"
                                      data-address="{{ $user->address }}"
                                      data-phone="{{ $user->phoneNumber }}">
                                      <i class="fa-solid fa-pen-to-square"></i>
                                   </a>
                                   <a class="dropdown-item delete-link" data-user-id="{{ $user->id }}">
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
<!-- Main modal -->
<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-black">
                    Edit User
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <form id="editUserForm">
                    <div class="modal-body">
                      <input type="hidden" id="editUserId" name="userId">
                      <div class="mb-3">
                        <label for="editUsername" class="form-label">Username</label>
                        <input type="text" class="form-control" id="editUsername" name="username">
                      </div>
                      <div class="mb-3">
                        <label for="editEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="editEmail" name="email">
                      </div>
                      <div class="mb-3">
                        <label for="editAddress" class="form-label">Address</label>
                        <input type="text" class="form-control" id="editAddress" name="address">
                      </div>
                      <div class="mb-3">
                        <label for="editPhone" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="editPhone" name="phoneNumber">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary"  data-modal-hide="default-modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>
            </div>

        </div>
    </div>
</div>


  <script>

      document.addEventListener('DOMContentLoaded', function() {
          var editUserModal = document.getElementById('default-modal');
      var closeButton = document.querySelector('[data-modal-hide="default-modal"]');

      // Trigger for opening and populating the modal
      document.querySelectorAll('[data-modal-target="default-modal"]').forEach(button => {
        button.addEventListener('click', function() {
          var userId = this.getAttribute('data-user-id');
          var username = this.getAttribute('data-username');
          var email = this.getAttribute('data-email');
          var address = this.getAttribute('data-address');
          var phone = this.getAttribute('data-phone');

          // Populate the form fields
          document.getElementById('editUserId').value = userId;
          document.getElementById('editUsername').value = username;
          document.getElementById('editEmail').value = email;
          document.getElementById('editAddress').value = address;
          document.getElementById('editPhone').value = phone;

          // Show the modal
          editUserModal.classList.remove('hidden');
          editUserModal.classList.add('flex');
        });
      });

      // Close button for the modal
      closeButton.addEventListener('click', function() {
        editUserModal.classList.add('hidden');
        editUserModal.classList.remove('flex');
      });

      // Form submission
      var editUserForm = document.getElementById('editUserForm');
      editUserForm.addEventListener('submit', function(e) {
        e.preventDefault();

        var formData = new FormData(editUserForm);

        fetch('{{ route("user.update") }}', {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => handleResponse(data))
        .catch(error => handleError(error));
      });

      function handleResponse(data) {
            if (data.error) {
                iziToast.error({
                    title: 'Error',
                    message: data.error,
                    position: 'topRight', // Position it in the top right
                    timeout: 5000 // Adjust the time the toast is displayed (5000 ms = 5 seconds)
                });
            } else {
                iziToast.success({
                    title: 'Success',
                    message: data.success,
                    position: 'topRight', // Position it in the top right
                    timeout: 5000 // Adjust the time the toast is displayed (5000 ms = 5 seconds)
                });
                setTimeout(() => window.location.reload(), 2000); // Reload page after 2 seconds
            }
        }

        function handleError(error) {
            console.error('Error:', error);
            iziToast.error({
                title: 'Error',
                message: 'An unexpected error occurred.',
                position: 'topRight', // Position it in the top right
                timeout: 5000 // Adjust the time the toast is displayed (5000 ms = 5 seconds)
            });
        }

         // Event listener for delete buttons
    document.querySelectorAll('.delete-link').forEach(button => {
        button.addEventListener('click', function() {
            var userId = this.getAttribute('data-user-id');
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
                    deleteUser(userId);
                }
            });
        });
    });

    // Function to delete user
    function deleteUser(userId) {
        fetch(`users/${userId}`, {
            method: 'DELETE',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            },
        })
        .then(response => {
            if (!response.ok) throw new Error('Network response was not ok.');
            return response.json();
        })
        .then(data => {
            iziToast.success({
                title: 'Success',
                message: 'User deleted successfully.',
                position: 'topRight',
                timeout: 1500 ,
                onClosed: function() {
                        window.location.reload(); // Reload page when toast is closed
                    }
            });
            // Optionally, reload or remove the user from the DOM
            // window.location.reload();
        })
        .catch(error => {
            console.error('Error:', error);
            iziToast.error({
                title: 'Error',
                message: 'Failed to delete user.',
                position: 'topRight',
                timeout: 5000
            });
        });
    }
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


