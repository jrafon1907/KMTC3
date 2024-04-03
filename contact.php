<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- 
    - primary meta tag
  -->
  <title>About Us</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Bangers&family=Carter+One&family=Nunito+Sans:wght@400;700&display=swap"
    rel="stylesheet">

  <!-- 
    - preload images
  -->
  <link rel="preload" as="image" href="./assets/images/hero-banner.jpg">

</head>

<body id="top">

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      <button class="nav-toggle-btn" aria-label="toggle manu" data-nav-toggler>
        <ion-icon name="menu-outline" aria-hidden="true" class="menu-icon"></ion-icon>
        <ion-icon name="close-outline" aria-label="true" class="close-icon"></ion-icon>
      </button>

     <img src="./upload/logo.png" style="width: 100px;"><a href="web.php" class="logo">KMTC Pet Supplies</a>

      <nav class="navbar" data-navbar>
        <ul class="navbar-list">

          <li class="navbar-item">
            <a href="web.php" class="navbar-link" data-nav-link>Home</a>
          </li>

          <li class="navbar-item">
            <a href="web.php" class="navbar-link" data-nav-link>Product</a>
          </li>

          <li class="navbar-item">
            <a href="about.php" class="navbar-link" data-nav-link>About</a>
          </li>

          <li class="navbar-item">
            <a href="contact.php" class="navbar-link" data-nav-link>Contact</a>
          </li>

        </ul>
      </nav>

      <div class="header-actions">

        <button class="action-btn" aria-label="Search">
          <ion-icon name="search-outline" aria-hidden="true"></ion-icon>
        </button>

        <a href="index.php" class="action-btn" aria-label="user">
          <ion-icon name="person-outline" aria-hidden="true"></ion-icon>
        </button>

        <button class="action-btn" aria-label="cart">
          <a href="index.php">
          <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon>

          <span class="btn-badge">0</span>
        </button>

      </div>

    </div>
  </header>

   <style>
        * {
            box-sizing: border-box
        }

        body {
            font-family: Verdana, sans-serif;
            margin: 0;
            background-color: #e8847c;
        }

        .navbar {
            float: right;
        }

        logo {
            color: red;
        }


        .mySlides {
            display: none;
        }


        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: 0.6s ease;
        }



        .active,
        .dot:hover {
            background-color: #717171;
            font-weight: bold;
        }

        .fade {
            animation-name: fade;
            animation-duration: 1.0s;
        }

        @keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        @media only screen and (max-width: 300px) {
            .prev,
            .next,
            .text {
                font-size: 11px
            }
        }
    </style>
</head>

<body>

<br><br><br><br>
    <section id="contact-info">
    <center>
        <span style="font-size: 35px; font-weight: bold; font-family: verdana; color: white;">CONTACT US</span>
    </center>

    <div class="left wow fadeInDown">
        <div style="float: left; width: 50%;">
            <img src="upload/icon/contact.png" style="max-width: 100%; float: right;" />
        </div>
        <div style="float: left; width: 50%;">
            <p style="font-size: 20px; font-weight: bold; font-family: verdana;">
                Merril Ann Anclote
            </p>
            <p>
                <b>Address:</b> 250 Sumulong Hwy, Antipolo, 1870 Rizal Occidental<br>
                <b>Tel/Phone:</b> +639326225275 / 09948019153<br>
                <b>Email Address:</b> jrafon0710@gmail.com
            </p>
            
            <span style="font-size: 20px; font-weight: bold; font-family: verdana; color: #144CA7;">We are open</span>
            <p><b>MONDAY TO FRIDAY -- 8:00AM - 5:00PM</b></p>
            
            <table style="width: 80px;">
                <tr>
                    <td>
                        <a href="https://www.facebook.com/profile.php?id=100073981989612">
                            <img data-toggle="tooltip" src="upload/icon/Facebook.png" style="max-width: 100%;" />
                        </a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</section>

<center>

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d241.2798052708381!2d121.12344030933068!3d14.62885001580765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b91293ab7509%3A0xd5adbbaf89d292dd!2sKMTC%20PET%20SUPPLIES!5e0!3m2!1sen!2sph!4v1696797399528!5m2!1sen!2sph" width="80%" height="500px" style="border:100;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </center>



      

<footer class="footer" style="background-image: url('./assets/images/footer-bg.jpg')">

    <div class="footer-top section">
      <div class="container">

        <div class="footer-brand">

          <a href="#" class="logo">KMTC PET SUPPLIES</a>

          <p class="footer-text">
            If you have any question, please contact us at <a href="mailto:jrafon0710@gmail.com"
              class="link">jrafon0710@gmail.com</a>
          </p>

          <ul class="contact-list">

            <li class="contact-item">
              <ion-icon name="location-outline" aria-hidden="true"></ion-icon>

              <address class="address">
                250 Sumulong Hwy, Antipolo, 1870 Rizal Occidental
              </address>
            </li>

            <li class="contact-item">
              <ion-icon name="call-outline" aria-hidden="true"></ion-icon>

              <a href="tel:+16234567891011" class="contact-link">(+639)-326225275</a>
            </li>

          </ul>

          <ul class="social-list">

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-google"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-tiktok"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-instagram"></ion-icon>
              </a>
            </li>

          </ul>

        </div>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Corporate</p>
          </li>

          <li>
            <a href="#" class="footer-link">Careers</a>
          </li>

          <li>
            <a href="about.php" class="footer-link">About Us</a>
          </li>

          <li>
            <a href="#" class="footer-link">Contact Us</a>
          </li>

          <li>
            <a href="#" class="footer-link">FAQs</a>
          </li>

          <li>
            <a href="#" class="footer-link">Vendors</a>
          </li>

          <li>
            <a href="#" class="footer-link">Affiliate Program</a>
          </li>

        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Information</p>
          </li>

          <li>
            <a href="#" class="footer-link">Online Store</a>
          </li>

          <li>
            <a href="#" class="footer-link">Privacy Policy</a>
          </li>

          <li>
            <a href="#" class="footer-link">No Refund Policy</a>
          </li>

          <li>
            <a href="#" class="footer-link">Shipping Policy</a>
          </li>

          <li>
            <a href="#" class="footer-link">Terms of Service</a>
          </li>

          <li>
            <a href="#" class="footer-link">Track Order</a>
          </li>

        </ul>
      </div>
    </div>



  </footer>
<script>
        // Add your Google Maps API key here
        const API_KEY = 'YOUR_GOOGLE_MAPS_API_KEY';

        function initMap() {
            // Coordinates for the location to be displayed on the map
            const location = { lat: 40.7128, lng: -74.0060 };

            // Create a map object and specify the DOM element for display.
            const map = new google.maps.Map(document.getElementById("map"), {
                center: location,
                zoom: 15, // You can adjust the zoom level as needed
            });

            // Create a marker and set its position.
            const marker = new google.maps.Marker({
                map: map,
                position: location,
                title: "Our Location", // Tooltip text
            });
        }
    </script>


   <script src="./assets/js/script.js" defer></script>
  
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>



</body>

</html>