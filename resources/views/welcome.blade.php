<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="Star Hotels Helps you Discover The Perfect Balance
   Of Hospitality, Luxury And
   Comfort.">
   <title>AfricTv</title>
   <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="./assets/css/global-header.css">
   <link rel="stylesheet" href="./assets/css/global-footer.css">
   <link rel="stylesheet" href="./assets/css/accesibility.css">
   <link rel="stylesheet" href="./assets/css/index.css">
</head>
<body class="scroll-bar">
   <div id="loader">
      <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
      viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
         <path fill="#d4af37" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
            <animateTransform 
               attributeName="transform" 
               attributeType="XML" 
               type="rotate"
               dur="1s" 
               from="0 50 50"
               to="360 50 50" 
               repeatCount="indefinite" />
      </path>
      </svg>
   </div>
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
   <div class="jumbotron-container">
      <div class="jumbotron-left">
         <h2 class="jumbotron-header">Hurray!!🎉🎉🎉
               AfricTv is launching soon! Join our waitlist now and be the first to access a vast library of Global content, from movies to music, TrendingNews, Education information, and more! </h2>
               <a href="{{ url('promoters') }}" class="btn btn-fill btn-large" style="background: darkgreen;">Continue as Promoter</a>
      </div>
      <div class="jumbotron-right">
        <form action="{{ route('waitlist') }}" method="POST" class="jumbotron-form">
            <!-- Put the form here -->
               <h3>Join AfricTv Wait List</h3><br>
               <p>Invite friends, family, and colleagues to join. Share on social media, WhatsApp, and SMS..</p>
                @csrf
               @if (session('success'))
                  <script type="text/javascript">
                     alert('Nice One! Wait list successfully registered');
                  </script>
                    <div class="rates">{{ session('success') }}</div>
                @endif
                @if (session('email'))
                  <script type="text/javascript">
                     alert('Email is invalid');
                  </script>
                    <div class="rates">{{ session('email') }}</div>
                @endif
               <label class="lable" for="name">Name</label>
               <input type="text" id="name" name="name" placeholder="Name" required><br>
               @error('name')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
               <label class="lable" for="email">Email</label>
               <input type="email" id="email" name="email" placeholder="Email" required><br>
               @error('email')
            
               <span class="text-danger">{{ $message }}</span>      
               @enderror
               <label class="lable" for="referer">Referer Code (Optional)</label>
               <input type="text" id="referer" name="referer" placeholder="Referer Code"><br>
               @error('referer')
                  <span class="text-danger">{{ $message }}</span>
               @enderror
               <button type="submit" class="rates">JOIN THE WAIT LIST</button>
         </form>
      </div>
   </div>
   <script defer async> 
        // Get the URL parameters
      (() => {
         const loader = document.getElementById('loader');
         const scrollBar = document.getElementsByClassName('scroll-bar')[0];
         window.addEventListener('load', () => {
            loader.classList.add('none');
            scrollBar.classList.remove('scroll-bar')
         });
      })();
       const urlParams = new URLSearchParams(window.location.search);
        
        // Check if "referer_code" exists in the URL
        const refererCode = urlParams.get('referer_code');
        
        if (refererCode) {
          // Set the input value to the referer_code if it exists
          document.getElementById('referer').value = refererCode;
        }
   </script>
   <script  defer async src="assets/js/toggleHamburger.js"></script>
</body>
</html>