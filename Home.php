<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Genral Laboratory | Test</title>
  <link rel="stylesheet" href="./styles/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./styles/bootstrap.min.css">
  <style>
    /* Adjusting the padding and height of input fields */
    label{
      color: #fff !important;
    }
    .form-main input,
    .form-main select,
    .form-main button {
      padding: 0.75rem; /* Reduced padding */
      height: 2.25rem; /* Reduced height */
    }
    .form-main .mb-3 {
      margin-bottom: 1rem; /* Reduced margin between form fields */
    }
    .form-main .w-full {
      width: 200% !important; /* Increased width of form fields */
    }
    @media only screen and (max-width: 768px) {
      .flex-container {
        flex-direction: column !important;
      }

      .img,
      .form {
        width: 150% !important; /* Full width on mobile */
        padding-left: 0 !important;
      }

      .form-main {
        padding: 2rem !important;
        max-width: 100% !important;
        margin: 0 auto !important;
      }

      .content {
        text-align: center !important;
      }

      .para p {
        font-size: 0.9rem !important;
      }
      .gif_top{
        width: 150vw ! important;
      }
      .header{
        width: 150vw !important;
      }
      .number{
        display: none;
      }
      #nav{
        width: 150vw !important;
        
      }
    }
  </style>
</head>
<body>
    
<!-- main content -->

<header class="header d-flex mb-3 ">
    <p class="opening_time p-2 align-items-cente w-50 ">Opening Hours Samvedna Laboratory HO: Today : 07:30 am - 06:00 pm</p>
    <div class="col-md-6 d-flex second w-50">
        <div class="text-center email me-3 pe-3 border-end py-2 align-items-cente">report@accuratelaboratory.co.in</div>
        <div class="w-50 number  text-center text-white">+91 7046555581</div>
    </div>
</header>
<header class="text-gray-600 body-font">
  <div class="container mx-auto flex flex-wrap pb-3 flex-col md:flex-row items-center">
      <nav id="nav" class="flex lg:w-2/5 flex-wrap items-center text-base md:ml-auto">
           <a href="./index.html" class="hover:text-gray-900 mr-5">Home </a>
          <a href="./Services.php" class="mr-5 hover:text-gray-900">Services</a>
          <a href="./Contect.html" class="mr-5 hover:text-gray-900">Contact us  </a>
          <a href="./About.html" class="mr-5 hover:text-gray-900">About us</a>
          <a href="./Home.php" class="mr-5 hover:text-gray-900">Book A Visit</a>
        </nav>
    <a class="flex order-first lg:order-none lg:w-1/5 title-font font-medium items-center text-gray-900 lg:items-center lg:justify-center mb-3 md:mb-0">
      <span class="ml-3 text-xl"><img src="./img/logo.png" style="height: 50px !important;" alt="logo"></span>
    </a>
    <div class="lg:w-2/5 inline-flex lg:justify-end ml-5 lg:ml-0">
    </div>
  </div>
</header>
<hr>
<div class="back_gif gif_top">
</div>
<main class="main">
    <div class="flex flex-col w-full md:flex-row">
        <div class="img w-full md:w-1/2">
            <img src="./img/delivery1.png" class="w-full  h-auto" alt="delivery">
            <div class="content">
                <h2></h2>
                <div class="para">
                    <p>
                        In our laboratory, tests are conducted on clinical specimens to obtain information about the health
                        of a patient, aiding in the diagnosis, treatment, and prevention of disease. Medical laboratories
                        vary in size and complexity, offering a variety of testing services. More comprehensive services can
                        be found in acute-care hospitals and medical centers, where 70% of clinical decisions are based on
                        laboratory testing
                    </p>
                    <p style="color: red;">
                        *We do not deliver hard copies to your address. You have to collect the same from any of the centres
                        in the working hours
                    </p>
                    <p style="color: red;">
                        *Prices may change at any given point of time because it is at the discretion of the laboratory
                        administration. You cannot claim that a moment before charges were different. But once booked we will
                        complete the tests.
                    </p>
                </div>
            </div>
        </div>
        <!-- form starts here -->
        <div class="form w-full md:w-1/2 mt-4 md:mt-0">
            <form class="form_main bg-white p-5 rounded-lg shadow-lg max-w-2xl mx-auto" action="./insert.php" method="post" enctype="multipart/form-data">
                <h1 class="text-center text-xl font-bold text-dark mb-6 text-white">Home Collection / Book a Visit</h1>
                
                <div class="mb-3">
                    <label for="h_pack" class="block text-gray-700 font-semibold">Health Pack*</label>
                    <select class="form-select  w-full border-gray-300 rounded-md " name="h_pack" id="h_pack" required>
                        <option disabled selected>Select a Health Package</option>
                        <option value="1">Package-1 &#8377;899</option>
                        <option value="2">Package-2 &#8377;1299</option>
                        <option value="3">Package-3 &#8377;1899</option>
                        <option value="4">Package-4 &#8377;2499</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="test" class="block text-gray-700 font-semibold">Tests*</label>
                    <select class="form-select  w-full border-gray-300 rounded-md " name="test" id="test" required>
                        <option disabled selected>Select a Test</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="name" class="block text-gray-700 font-semibold">Full Name*</label>
                    <input type="text" id="name" name="name" class="w-full  p-2 border border-gray-300 rounded-md" placeholder="Full Name" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="block text-gray-700 font-semibold">Email*</label>
                    <input type="email" id="email" name="email" class="w-full  p-2 border border-gray-300 rounded-md" placeholder="Email" required>
                </div>

                <div class="mb-3 flex space-x-4">
                    <div class="w-1/2">
                        <label for="gender" class="block text-gray-700 font-semibold">Gender*</label>
                        <select class="form-select w-full  p-2 border-gray-300 rounded-md" name="gender" id="gender" required>
                            <option disabled selected>Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    
                    <div class="w-1/2">
                        <label for="dob" class="block text-gray-700 font-semibold">Date of Birth*</label>
                        <input type="date" id="dob" name="dob" class="w-full  p-2 border border-gray-300 rounded-md" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address" class="block text-gray-700 font-semibold">Address</label>
                    <input type="text" id="address" name="address" class="w-full  p-2 border border-gray-300 rounded-md" placeholder="Address" autocomplete="off">
                </div>

                <div class="mb-3">
                    <label for="contact" class="block text-gray-700 font-semibold">Phone Number*</label>
                    <input type="text" id="contact" name="contact" class="w-full  p-2 border border-gray-300 rounded-md" placeholder="Phone Number" required>
                </div>

                <div class="mb-3">
                    <label for="vdate" class="block text-gray-700 font-semibold">Visitation Date*</label>
                    <input type="date" id="vdate" name="vdate" class="w-full  p-2 border border-gray-300 rounded-md" required>
                </div>

                <div class="mb-3">
                    <label for="report" class="block text-gray-700 font-semibold">Upload Report</label>
                    <input type="file" id="report" name="report" class="w-full  p-2 border border-gray-300 rounded-md">
                </div>

                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary py-2 px-6 bg-green-500 text-white rounded-md">Book a Visit</button>
                </div>
            </form>
        </div>
    </div>
</main>
</body>
</html>
