   <!-- header -->
   <div class="container-fluid  position-sticky top-0">
       <div class="container bg-primary bg-gradient rounded-4 mt-3 shadow">
           <nav class="navbar navbar-expand-lg ">
               <div class="container-fluid">
                   <a style="width:70px; height:70px;"
                       class="navbar-brand shadow border border-primary bg-gradient d-flex justify-content-center rounded-circle" href="form.php">
                       <img src="img/logo.png" class="img-fluid" alt="">
                   </a>
                   <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                       data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                       aria-expanded="false" aria-label="Toggle navigation">
                       <span class="navbar-toggler-icon"></span>
                   </button>
                   <div class="collapse navbar-collapse" id="navbarSupportedContent">
                       <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                           <li class="nav-item">
                               <a class="nav-link text-uppercase text-white fw-semibold active" aria-current="page" href="form.php">Home</a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link text-uppercase text-white fw-semibold active" aria-current="page" href="allrecords.php">All Records</a>
                           </li>
                       </ul>
                       <a class="text-white text-decoration-none fw-semibold pe-4" href="dollarRecieved.php">DOLLAR RECIEVED</a>
                       <!-- Button trigger modal -->
                       <?php
                            if(!isset($_SESSION['login'])){
                                echo '
                                 <a href="index.php" class="btn text-primary rounded-pill text-uppercase fw-semibold bg-white">
                                    LogIn
                                </a>
                                ';
                            }else{
                                echo '
                                <a href="logout.php" class="btn text-primary rounded-pill text-uppercase fw-semibold bg-white">
                                  logout
                                </a>
                                ';
                            }
                       ?>
                   </div>
               </div>
           </nav>
       </div>
   </div>
   <!-- /header -->