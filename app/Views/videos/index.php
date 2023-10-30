 <style>
     /* Style for the video container */
     .video-container {
         position: relative;
         padding-bottom: 56.25%;
         /* 16:9 aspect ratio */
         height: 0;
     }

     .video {
         position: absolute;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
     }

     /* Style for sidebar */
     .sidebar {
         background-color: #333;
         color: #fff;
         padding: 20px;
     }
 </style>
 <section class="container mt-5">

     <!-- Navbar -->
     <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
         <div class="container">
             <a class="navbar-brand" href="#">YouTube</a>
             <!-- Search bar -->
             <form class="form-inline my-2 my-lg-0">
                 <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                 <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
             </form>
         </div>
     </nav>

     <div class="container mt-3">
         <div class="row">
             <!-- Video Player -->
             <div class="col-md-8">
                 <div class="video-container">
                     <video controls poster="thumbnail.jpg">
                         <source src="https://youtu.be/UV6eYZ-lCvk?si=AG2hBkMrDMPeMD4" type="video/*">
                         <!-- Add more source elements for different video formats (WebM, Ogg, etc.) as needed -->
                     </video>
                 </div>
                 <h2 class="mt-3">Video Title</h2>
                 <p>Video description goes here.</p>
             </div>
             <!-- Sidebar -->
             <div class="col-md-4">
                 <div class="sidebar">
                     <h4>Recommended Videos</h4>
                     <ul>
                         <li><a href="#">Recommended Video 1</a></li>
                         <li><a href="#">Recommended Video 2</a></li>
                         <li><a href="#">Recommended Video 3</a></li>
                     </ul>
                 </div>
             </div>
         </div>
     </div>
 </section>