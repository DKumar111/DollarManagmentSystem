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
                                    LogOut
                                </a>
                                ';
                            }
                       ?>

                       <!-- Modal -->
                       <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                           aria-hidden="true">
                           <div class="modal-dialog">
                               <div class="modal-content p-3">
                                   <form action="login.php" method="POST">
                                       <div class="mb-3">
                                           <label for="exampleInputEmail1" class="form-label">Email address</label>
                                           <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                                               aria-describedby="emailHelp">
                                       </div>
                                       <div class="mb-3">
                                           <label for="exampleInputPassword1" class="form-label">Password</label>
                                           <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                                       </div>
                                       <button type="submit" name="login" class="btn btn-primary">Login</button>
                                   </form>
                               </div>
                           </div>
                       </div> -->
                   </div>
               </div>
           </nav>
       </div>
   </div>
   <!-- /header -->