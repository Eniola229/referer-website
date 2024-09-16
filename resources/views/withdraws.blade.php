<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Withdraws - AfricTv Wait list
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="pro/css/nucleo-icons.css" rel="stylesheet" />
  <link href="pro/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="pro/css/nucleo-svg.css" rel="stylesheet" />
  <link href="pro/css/card.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="pro/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>
<body class="g-sidenav-show  bg-gray-100">
   @include('components.header')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
     @include('components.nav')
    <!-- End Navbar -->
       <div class="row">
        <div class="col-lg-8">
          <div class="row">
            <div class="col-xl-6 mb-xl-0 mb-4">
              @if ($withdraw)
              <!-- Success Message -->
              @if (session('success'))
                  <div class="alert alert-success" style="color: white">
                      {{ session('success') }}
                  </div>
              @endif

              <!-- Error Message -->
              @if (session('error'))
                  <div class="alert alert-danger" style="color: white">
                      {{ session('error') }}
                  </div>
              @endif

              <!-- Validation Errors -->
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul style="color: white">
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif

              <div class="card bg-transparent shadow-xl">
                <p class="mb-0 m-2">Payment powered and secured by <span style="color: red; font-weight: bold;"> AfricPay (APAY)</span></p>
                <div class="overflow-hidden position-relative border-radius-xl" style="background-image: url('https://img.freepik.com/free-vector/flat-receiving-cashback-bonus-from-paying-online_88138-766.jpg?t=st=1726357448~exp=1726361048~hmac=6b44bdc3f8c1cbb5b21b662b730e0de4b71a5a61f891078749d32f872f1d9655&w=740');">
                  <span class="mask bg-gradient-dark"></span>
                  <div class="card-body position-relative z-index-1 p-3">
                    <i class="fas fa-wifi text-white p-2"></i>
                    <h5 class="text-white mt-4 mb-5 pb-2">{{ $withdraw->account_number }}</h5>
                    <div class="d-flex">
                      <div class="d-flex">
                        <div class="me-4">
                          <p class="text-white text-sm opacity-8 mb-0">Account Holder</p>
                          <h6 class="text-white mb-0">{{ $withdraw->account_name }}</h6>
                        </div>
                        <div>
                          <p class="text-white text-sm opacity-8 mb-0">Date Added</p>
                          <h6 class="text-white mb-0">{{ $withdraw->created_at->format('Y-m-d') }}</h6>
                        </div>
                      </div>
                      <div class="ms-auto w-20 d-flex align-items-end justify-content-end">
                        <img class="w-60 mt-2" src="https://img.freepik.com/free-vector/flat-receiving-cashback-bonus-from-paying-online_88138-766.jpg?t=st=1726357448~exp=1726361048~hmac=6b44bdc3f8c1cbb5b21b662b730e0de4b71a5a61f891078749d32f872f1d9655&w=740" alt="logo">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6">
              <div class="row">
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                        <i class="fas fa-landmark opacity-10"></i>
                      </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                      <h6 class="text-center mb-0">Balace</h6>
                      <span class="text-xs">Your <span style="color: red; font-weight: bold;"> APAY </span> account balance</span>
                      <hr class="horizontal dark my-3">
                      <h5 class="mb-0">N{{ $balance }}</h5>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mt-md-0 mt-4">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                     <!--  <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                        <i class="fab fa-paypal opacity-10"></i>
                      </div> -->
                    </div>
                 <!--    <div class="card-body pt-0 p-3 text-center">
                      <h6 class="text-center mb-0">Paypal</h6>
                      <span class="text-xs">Freelance Payment</span>
                      <hr class="horizontal dark my-3">
                      <h5 class="mb-0">$455.00</h5>
                    </div> -->
                  </div>
                </div>
                @else
                <div class="m-2">
                  <!-- Success Message -->
                @if (session('success'))
                    <div class="alert alert-success"  style="color: white;">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Error Message -->
                @if (session('error'))
                    <div class="alert alert-danger" style="color: white;">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Validation Errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li  style="color: white;">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <p class="mb-0 m-2"> No Payment method found! Kindly add a new payment method.</p>
                  <h3 class="mb-0 m-2"> Add your payment details.</h3>
                  <hr>
                    <form action="{{ route('withdraws-store') }}" method="POST">
                      @csrf
                      <div class="mb-3">
                        <label for="name" class="form-label">Account Name</label>
                        <input type="text" class="form-control" id="name" name="account_name" placeholder="Account Name" required>
                        <div id="name" class="form-text">We'll never share your payment with anyone else.</div>
                      </div>
                      <div class="mb-3">
                        <label for="name" class="form-label">Bank Name</label>
                        <input type="text" class="form-control" id="name" name="bank_name" placeholder="Bank Name" required>
                        <div id="name" class="form-text">.</div>
                      </div>
                      <div class="mb-3">
                        <label for="account" class="form-label">Account Number</label>
                        <input type="number" class="form-control" name="account_number" placeholder="Account Number" id="account">
                      </div>
                      <button type="submit" class="btn btn-primary">Add Payment Details</button>
                    </form>
                  </div>
                  <p class="mb-0 m-2">Payment powered and secured by <span style="color: red; font-weight: bold;">AfricPay (APAY)</span></p>
                @endif
              </div>
            </div>
            <div class="col-md-12 mb-lg-0 mb-4">
              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Payment Details</h6>
                    </div>
                    <div class="col-6 text-end">
                      <!-- <a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Card</a> -->
                    </div>
                  </div>
                </div>
                <div class="card-body p-3">
                    @if ($withdraw)
                  <div class="row">
                    <div class="col-md-6 mb-md-0 mb-4">
                      <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                        <img class="w-10 me-3 mb-0" src="https://img.freepik.com/free-photo/cropped-shot-african-american-male-paying-bill-restaurant-with-online-payment-technology_273609-9077.jpg?t=st=1726357401~exp=1726361001~hmac=faff622687e87c1f10f07034bb2d672b7118965ff18a604f2a3efc8d2f2208be&w=740" alt="logo">
                        <h6 class="mb-0">{{ $withdraw->account_number }}</h6>
                        <span class="text-xs">{{ $withdraw->bank_name }}</span>
                         <button onclick="showPopup()">
                        <i class="fas fa-pencil-alt ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Card"></i>
                        </button>
                      </div>
                    </div>
                    
                      <div class="popup" id="popup" style="width: 300px;">
                          <div class="popup-header" style="display: flex;">
                              <h4>Edit Account Details</h2>
                              <button onclick="closePopup()" style="background: none; border: none; cursor: pointer; font-size: 18px;">&times;</button>
                          </div>
                          <form id="account-form" action="{{ route('withdraws-store') }}" method="POST">
                            @csrf
                              <label for="account_name">Account Name</label>
                              <input type="text" class="form-control" id="account_name" name="account_name" placeholder="Enter account name" value="{{ $withdraw->account_name }}" required>

                              <label for="account_number">Account Number</label>
                              <input type="text" id="account_number" class="form-control" name="account_number" placeholder="Enter account number" value="{{ $withdraw->account_number }}" required>

                              <label for="bank_name">Bank Name</label>
                              <input type="text" id="bank_name" name="bank_name" class="form-control" placeholder="Enter bank name" value="{{ $withdraw->bank_name }}" required>

                              <button class="btn btn-primary" type="submit">Edit Details</button>
                          </form>
                      </div>
                    @else
                     <h6 class="mb-0 m-2">No Payment method found! Kindly add a new payment method.</p>
                @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-6 d-flex align-items-center">
                  <h6 class="mb-0">Withdrawers</h6>
                </div>
                <div class="col-6 text-end">
                  <button class="btn btn-outline-primary btn-sm mb-0">APAY</button>
                </div>
              </div>
            </div>
            <div class="card-body p-3 pb-0">
           <ul class="list-group">
                    @if($payments->isNotEmpty())
                        @foreach($payments as $payment)
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark font-weight-bold text-sm">{{ $payment->created_at->format('Y-m-d') }}</h6>
                                <span class="text-xs">#{{ $payment->reference_code }}</span>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                N{{ $payment->amount }}
                                <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4">
                                    <i class="fas fa-file-pdf text-lg me-1"></i> <a href="{{ $payment->receipt }}"> Reciept</a>
                                </button>
                            </div>
                        </li>
                        @endforeach
                    @else
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark font-weight-bold text-sm">You have not received any payments yet</h6>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
            
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-6 d-flex align-items-center">
                  <h6 class="mb-0">Request Withdrawer</h6>
                </div>
                <div class="col-6 text-end">
                  <button class="btn btn-outline-primary btn-sm mb-0">APAY</button>
                </div>
              </div>
            </div>
            <div class="card-body p-3 pb-0">
           <ul class="list-group">
            @if ($withdraw)
                @if($balance > 1000)
                     <h3 class="mb-0 m-2">Request Payment</h3>
                <p class="mb-0 m-2">The money will be sent to you within one hour of processing.</p>
                  <hr>
                <form action="{{ route('request-payment') }}" method="POST">
                  @csrf
                  @method('PUT')
                  <input type="hidden" class="form-control" name="userId" placeholder="Enter account name" value="{{ Auth::user()->id }}">
                  <div class="mb-3">
                        <label for="account" class="form-label">Amount</label>
                        <input type="number" class="form-control" name="amount" placeholder="Amount" id="account" required>
                      </div>
                  <button type="submit" class="btn btn-primary">Request Payment</button>
              </form>

                  </div>
                  <p class="mb-0 m-2">Payment powered and secured by <span style="color: red; font-weight: bold;">AfricPay (APAY)</span></p>
                       
                    @else
                    @if($request)
                       <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark font-weight-bold text-sm">We are currently processing your payment, and you will receive it shortly. (1hour Max)</h6>
                            </div>
                        </li>
                    @else
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark font-weight-bold text-sm">You need a minimum balance of N1000 before you can make a withdrawal.</h6>
                            </div>
                        </li>
                    @endif
                    @endif
                    @else 
                          <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark font-weight-bold text-sm">Kindly Update your Account Details.</h6>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
          </div>
        </div>
      </div>
  
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made  by
                Afric Tech
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="{{ route('policy') }}" class="nav-link pe-0 text-muted" target="_blank">Privacy Policy</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="pro/js/core/popper.min.js"></script>
  <script src="pro/js/core/bootstrap.min.js"></script>
  <script src="pro/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="pro/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="pro/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "#fff",
          data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 15,
              font: {
                size: 14,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false
            },
            ticks: {
              display: false
            },
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Mobile apps",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#cb0c9f",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            fill: true,
            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
            maxBarThickness: 6

          },
          {
            label: "Websites",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#3A416F",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
            maxBarThickness: 6
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#b2b9bf',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#b2b9bf',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
   <script>
        // Function to show the popup
        function showPopup() {
            document.getElementById("popup").style.display = "block";
            document.getElementById("overlay").style.display = "block";
        }

        // Function to close the popup
        function closePopup() {
            document.getElementById("popup").style.display = "none";
            document.getElementById("overlay").style.display = "none";
        }

        // Form submission event
        // document.getElementById('account-form').addEventListener('submit', function(event) {
        //     event.preventDefault(); // Prevent actual form submission

        //     const accountName = document.getElementById('account_name').value;
        //     const accountNumber = document.getElementById('account_number').value;
        //     const bankName = document.getElementById('bank_name').value;

        //     console.log("Account Name:", accountName);
        //     console.log("Account Number:", accountNumber);
        //     console.log("Bank Name:", bankName);

        //      Close the popup after submission
        //     closePopup();
        // });
  </script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
   <script src="{{ asset('pro/js/soft-ui-dashboard.min.js?v=1.0.7') }}"></script>
</body>

</html>