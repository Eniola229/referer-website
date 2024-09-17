<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Promoters - AfricTv</title>
   <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="./assets/css/global-header.css">
   <link rel="stylesheet" href="./assets/css/global-footer.css">
   <link rel="stylesheet" href="./assets/css/facilities.css">
</head>

<body>

     <header>
      <div class="header-container">
         <nav class="header-nav-bar">
            <div class="header-nav-logo">
               <a href="{{ url('/') }}">
                  <img style="height: 70px;" src="https://pbs.twimg.com/profile_images/1763219067400249344/p7yVhJ4j_400x400.jpg"
                     alt="AfricTv logo">
               </a>
            </div>
            <ul class="header-nav-lists">
                  <li class="header-nav-list">
                     <a class="header-nav-link header-active" style="color: green;" href="{{ url('/') }}">Home</a>
                  </li>
                  <li class="header-nav-list"><a style="background: darkgreen" class="header-btn header-btn-custom" href="{{ url('promoters') }}">Continue as Promoter</a></li>
               </ul>
            
            <div class="header-hamburger-icon">
               <div class="header-hamburger-line-1" style="background-color: green;"></div>
               <div class="header-hamburger-line-2" style="background-color: green;"></div>
               <div class="header-hamburger-line-3" style="background-color: green;"></div>
            </div>
         </nav>
      </div>

      </div>
   </header>

   <main>
      <div class="container">

         <!-- Top Text -->
         <div class="page-header-container">
            <h2 class="page-header">Refer and Earn </h2>
            <hr />
            <p class="page-sub-header">
              AfricTv Exciting Opportunity Alert! 
            </p>
         </div>


         <!-- Upper Section -->
         <section class="upper-section">
            <div class="row center-lg">
               <div class="col image-col right-marg">
                  <div class="large-image-container">
                     
                    <div class="container d-flex justify-content-center align-items-center full-height">
                       <div class="text-center">
                        <a href="{{ route('login') }}">
                           <button type="button" style="background-color: darkgreen; color: white;" class="btn btn-primary mr-3">Login</button>
                        </a>
                        <a href="{{ route('register') }}">
                           <button type="button" style="background-color: white; color: green; border: 1px solid darkgreen;" class="btn btn-success">Register</button>
                        </a>
                       </div>
                   </div>
                  </div>

               </div>
               <!-- Top Right Text -->
               
               <div class="col">
                  <h3 class="right-title">What do we have here?? </h3>
                  <p>
                    AfricTv is  offering a unique chance to earn money <br> by referring friends and family. Join our wait-list.
                  </p>
                  <br>
                  <h3>How it Works:</h3>
                  <ul class="facilities-list">
                <li>
                    <div>
                        <img src="assets/img/check-square.svg" alt="tick" class="list-icon">
                        <p class="list-text">1. Click on this link <a href="https://africicl.web.app" target="_blank">https://africicl.web.app</a></p>
                    </div>
                </li>
                <li>
                    <div>
                        <img src="assets/img/check-square.svg" alt="tick" class="list-icon">
                        <p class="list-text">2. Click on continue as promoter</p>
                    </div>
                </li>
                <li>
                    <div>
                        <img src="assets/img/check-square.svg" alt="tick" class="list-icon">
                        <p class="list-text">3. Click on signup and fill your details</p>
                    </div>
                </li>
                <li>
                    <div>
                        <img src="assets/img/check-square.svg" alt="tick" class="list-icon">
                        <p class="list-text">4. Your will be redirected to your dashboard were you will receive a referer link</p>
                    </div>
                </li>
                <li>
                    <div>
                        <img src="assets/img/check-square.svg" alt="tick" class="list-icon">
                        <p class="list-text">5.Copy and Share your
        Referer link to
       Family and friends  </p>
                    </div>
                </li>
                <li>
                    <div>
                        <img src="assets/img/check-square.svg" alt="tick" class="list-icon">
                        <p class="list-text">6. Earn N50 per person</p>
                    </div>
                </li>
                <li>
                    <div>
                        <img src="assets/img/check-square.svg" alt="tick" class="list-icon">
                        <p class="list-text">7. Get rewarded instantly!</p>
                    </div>
                </li>
                <li>
                    <div>
                        <img src="assets/img/check-square.svg" alt="tick" class="list-icon">
                        <p class="list-text">8. The minimum withdrawal amount on the dashboard is one thousand naira.</p>
                    </div>
                </li>
                <li>
                    <div>
                        <!-- <img src="assets/img/check-square.svg" alt="tick" class="list-icon"> -->
                        <p class="list-text"><strong>Requirements:</strong></p>
                    </div>
                </li>
                <li>
                    <div>
                        <img src="assets/img/check-square.svg" alt="tick" class="list-icon">
                        <p class="list-text">- Share our messages with     
        Many new contact as 
        Possible 
        Contact as possible </p>
                    </div>
                </li>
                <li>
                    <div>
                        <img src="assets/img/check-square.svg" alt="tick" class="list-icon">
                        <p class="list-text">- Ensure they register/sign up using your unique referral link</p>
                    </div>
                </li>
                <li>
                    <div>
                        <img src="assets/img/check-square.svg" alt="tick" class="list-icon">
                        <p class="list-text">- Receive N50 for each</p>
                    </div>
                </li>

                  
                  </ul>
                  <a style="background: darkgreen;" href="{{ route('register') }}" class="btn btn-fill btn-large">Signup</a>
               </div>
            </div>
         </section>
   <script src="assets/js/toggleHamburger.js"></script>
</body>

</html>