<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
   Signup - AfricTv Wait list
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="pro/css/nucleo-icons.css" rel="stylesheet" />
  <link href="pro/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="pro/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="pro/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
</head>

<body class="">
 
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight" style="color: darkgreen;">Create an account</h3>
                  <p class="mb-0">Enter your name, email, phonen number and password to create an account</p>
                </div>
                <div class="card-body">
                  <form role="form" action="{{ route('register') }}" method="POST">
                    @csrf
                    @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li style="color: white;">{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif
                    <label>Name</label>
                    <div class="mb-3">
                      <input type="text" class="form-control" placeholder="Name" aria-label="name" name="name" aria-describedby="name-addon" required>
                       <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <label>Phone Number  (WhatsApp)</label>
                    <div class="mb-3">
                      <input type="number" class="form-control" placeholder="Phone Number" aria-label="Phone Number" name="mobile" aria-describedby="phone-addon" required>
                       <x-input-error :messages="$errors->get('mobile')" class="mt-2" />
                    </div>
                         <label>Email</label>
                    <div class="mb-3">
                      <input type="email" class="form-control" placeholder="Email" aria-label="Email" name="email" aria-describedby="email-addon" required>
                       <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <label>Password</label>
                    <div class="mb-3">
                      <input type="password" class="form-control" placeholder="Password" name="password"  aria-label="Password" aria-describedby="password-addon" required>
                       <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <label>Comfirm Password</label>
                    <div class="mb-3">
                      <input type="password" class="form-control" placeholder="Password confirmation" name="password_confirmation"  aria-label="password_confirmation" aria-describedby="password_confirmation-addon" required>
                      <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                     
                    <div class="text-center">
                      <button type="submit" style="background-color: darkgreen; color: white;" class="btn  w-100 mt-4 mb-0">Create Account</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Already have an account?
                    <a href="{{ route('login') }}" style="color: darkgreen;" class=" font-weight-bold">Login</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('https://img.freepik.com/free-photo/close-up-portrait-attractive-young-woman-isolated_273609-36297.jpg?t=st=1726273331~exp=1726276931~hmac=6b9c48ff435652562f4559a88aa2bff6e46c21b5dee86d747fff3eb8fd9f4904&w=740')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mb-4 mx-auto text-center">
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Privacy Policy
          </a>
        </div>
        <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
          <a href="https://x.com/TvAfric47294" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-twitter"></span>
          </a>
          </a>
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            Copyright © <script>
              document.write(new Date().getFullYear())
            </script> Afric Tech.
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>

  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>