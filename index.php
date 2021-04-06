<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>X Dashboard</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--CSS and ICONS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />

    <!-- CDN Bootstrap and fonts-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>
<body>

    <!-- Top Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Company Directory</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="search-form d-flex ml-auto mt-1 mb-0">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </form>
                <ul class="navbar-nav ml-auto d-flex">

                    <li class="nav-item dropdown me-2">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Hello Admin
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <li><a class="dropdown-item" href="#">Create a new user</a></li>
                            <li><a class="dropdown-item" href="#">Create a new Location</a></li>
                            <li><a class="dropdown-item" href="#">Create a new Company</a></li>

                        </ul>
                    </li>

                </ul>

            </div>
        </div>
    </nav>
    <!-- End TOP Navbar-->
    <!-- Employee Table-->
    <div class="content">
        <div class="container">
           
            <!-- end row -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="text-center card-box">
                        <div class="member-card pt-2 pb-2">
                            <div class="thumb-lg member-thumb mx-auto"><img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="rounded-circle img-thumbnail" alt="profile-image"></div>
                            <div class="">
                                <h4>Freddie J. Plourde</h4>
                                <p class="text-muted">@Founder <span>| </span><span><a href="#" class="text-pink">websitename.com</a></span></p>
                            </div>
                            <ul class="social-links list-inline">
                                <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fa fa-skype"></i></a></li>
                            </ul>
                            <button type="button" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">Message Now</button>
                            <div class="mt-4">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mt-3">
                                            <h4>2563</h4>
                                            <p class="mb-0 text-muted">Wallets Balance</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mt-3">
                                            <h4>6952</h4>
                                            <p class="mb-0 text-muted">Income amounts</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mt-3">
                                            <h4>1125</h4>
                                            <p class="mb-0 text-muted">Total Transactions</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-4">
                    <div class="text-center card-box">
                        <div class="member-card pt-2 pb-2">
                            <div class="thumb-lg member-thumb mx-auto"><img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle img-thumbnail" alt="profile-image"></div>
                            <div class="">
                                <h4>Julie L. Arsenault</h4>
                                <p class="text-muted">@Programmer <span>| </span><span><a href="#" class="text-pink">websitename.com</a></span></p>
                            </div>
                            <ul class="social-links list-inline">
                                <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fa fa-skype"></i></a></li>
                            </ul>
                            <button type="button" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">Message Now</button>
                            <div class="mt-4">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mt-3">
                                            <h4>8471</h4>
                                            <p class="mb-0 text-muted">Wallets Balance</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mt-3">
                                            <h4>8512</h4>
                                            <p class="mb-0 text-muted">Income amounts</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mt-3">
                                            <h4>4751</h4>
                                            <p class="mb-0 text-muted">Total Transactions</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-4">
                    <div class="text-center card-box">
                        <div class="member-card pt-2 pb-2">
                            <div class="thumb-lg member-thumb mx-auto"><img src="https://bootdey.com/img/Content/avatar/avatar4.png" class="rounded-circle img-thumbnail" alt="profile-image"></div>
                            <div class="">
                                <h4>Christopher Gallardo</h4>
                                <p class="text-muted">@Webdesigner <span>| </span><span><a href="#" class="text-pink">websitename.com</a></span></p>
                            </div>
                            <ul class="social-links list-inline">
                                <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fa fa-skype"></i></a></li>
                            </ul>
                            <button type="button" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">Message Now</button>
                            <div class="mt-4">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mt-3">
                                            <h4>1021</h4>
                                            <p class="mb-0 text-muted">Wallets Balance</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mt-3">
                                            <h4>4562</h4>
                                            <p class="mb-0 text-muted">Income amounts</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mt-3">
                                            <h4>3621</h4>
                                            <p class="mb-0 text-muted">Total Transactions</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="text-center card-box">
                        <div class="member-card pt-2 pb-2">
                            <div class="thumb-lg member-thumb mx-auto"><img src="https://bootdey.com/img/Content/avatar/avatar5.png" class="rounded-circle img-thumbnail" alt="profile-image"></div>
                            <div class="">
                                <h4>Joseph M. Rohr</h4>
                                <p class="text-muted">@Webdesigner <span>| </span><span><a href="#" class="text-pink">websitename.com</a></span></p>
                            </div>
                            <ul class="social-links list-inline">
                                <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fa fa-skype"></i></a></li>
                            </ul>
                            <button type="button" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">Message Now</button>
                            <div class="mt-4">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mt-3">
                                            <h4>7845</h4>
                                            <p class="mb-0 text-muted">Wallets Balance</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mt-3">
                                            <h4>1254</h4>
                                            <p class="mb-0 text-muted">Income amounts</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mt-3">
                                            <h4>5846</h4>
                                            <p class="mb-0 text-muted">Total Transactions</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-4">
                    <div class="text-center card-box">
                        <div class="member-card pt-2 pb-2">
                            <div class="thumb-lg member-thumb mx-auto"><img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="rounded-circle img-thumbnail" alt="profile-image"></div>
                            <div class="">
                                <h4>Mark K. Horne</h4>
                                <p class="text-muted">@Director <span>| </span><span><a href="#" class="text-pink">websitename.com</a></span></p>
                            </div>
                            <ul class="social-links list-inline">
                                <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fa fa-skype"></i></a></li>
                            </ul>
                            <button type="button" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">Message Now</button>
                            <div class="mt-4">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mt-3">
                                            <h4>4851</h4>
                                            <p class="mb-0 text-muted">Wallets Balance</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mt-3">
                                            <h4>10250</h4>
                                            <p class="mb-0 text-muted">Income amounts</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mt-3">
                                            <h4>895</h4>
                                            <p class="mb-0 text-muted">Total Transactions</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-4">
                    <div class="text-center card-box">
                        <div class="member-card pt-2 pb-2">
                            <div class="thumb-lg member-thumb mx-auto"><img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="rounded-circle img-thumbnail" alt="profile-image"></div>
                            <div class="">
                                <h4>James M. Fonville</h4>
                                <p class="text-muted">@Manager <span>| </span><span><a href="#" class="text-pink">websitename.com</a></span></p>
                            </div>
                            <ul class="social-links list-inline">
                                <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fa fa-skype"></i></a></li>
                            </ul>
                            <button type="button" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">Message Now</button>
                            <div class="mt-4">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mt-3">
                                            <h4>4560</h4>
                                            <p class="mb-0 text-muted">Wallets Balance</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mt-3">
                                            <h4>12350</h4>
                                            <p class="mb-0 text-muted">Income amounts</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mt-3">
                                            <h4>742</h4>
                                            <p class="mb-0 text-muted">Total Transactions</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="text-center card-box">
                        <div class="member-card pt-2 pb-2">
                            <div class="thumb-lg member-thumb mx-auto"><img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="rounded-circle img-thumbnail" alt="profile-image"></div>
                            <div class="">
                                <h4>Jade M. Walker</h4>
                                <p class="text-muted">@Webdeveloper <span>| </span><span><a href="#" class="text-pink">websitename.com</a></span></p>
                            </div>
                            <ul class="social-links list-inline">
                                <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fa fa-skype"></i></a></li>
                            </ul>
                            <button type="button" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">Message Now</button>
                            <div class="mt-4">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mt-3">
                                            <h4>3520</h4>
                                            <p class="mb-0 text-muted">Wallets Balance</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mt-3">
                                            <h4>4587</h4>
                                            <p class="mb-0 text-muted">Income amounts</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mt-3">
                                            <h4>423</h4>
                                            <p class="mb-0 text-muted">Total Transactions</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-4">
                    <div class="text-center card-box">
                        <div class="member-card pt-2 pb-2">
                            <div class="thumb-lg member-thumb mx-auto"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle img-thumbnail" alt="profile-image"></div>
                            <div class="">
                                <h4>Mathias L. Lassen</h4>
                                <p class="text-muted">@Webdesigner <span>| </span><span><a href="#" class="text-pink">websitename.com</a></span></p>
                            </div>
                            <ul class="social-links list-inline">
                                <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fa fa-skype"></i></a></li>
                            </ul>
                            <button type="button" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">Message Now</button>
                            <div class="mt-4">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mt-3">
                                            <h4>7851</h4>
                                            <p class="mb-0 text-muted">Wallets Balance</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mt-3">
                                            <h4>10020</h4>
                                            <p class="mb-0 text-muted">Income amounts</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mt-3">
                                            <h4>1036</h4>
                                            <p class="mb-0 text-muted">Total Transactions</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-4">
                    <div class="text-center card-box">
                        <div class="member-card pt-2 pb-2">
                            <div class="thumb-lg member-thumb mx-auto"><img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle img-thumbnail" alt="profile-image"></div>
                            <div class="">
                                <h4>Alfred M. Bach</h4>
                                <p class="text-muted">@Manager <span>| </span><span><a href="#" class="text-pink">websitename.com</a></span></p>
                            </div>
                            <ul class="social-links list-inline">
                                <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fa fa-skype"></i></a></li>
                            </ul>
                            <button type="button" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">Message Now</button>
                            <div class="mt-4">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mt-3">
                                            <h4>7421</h4>
                                            <p class="mb-0 text-muted">Wallets Balance</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mt-3">
                                            <h4>14754</h4>
                                            <p class="mb-0 text-muted">Income amounts</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mt-3">
                                            <h4>11525</h4>
                                            <p class="mb-0 text-muted">Total Transactions</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- container -->
    </div>
    <!--End Empployee Table-->
    <!-- Popper and Bootstrap -->
    <!--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> <!--Bootstrap bundle with popper-->
</body>
</html>

