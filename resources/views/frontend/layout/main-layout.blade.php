<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Halaman Home - @yield('title')</title>
    <link rel="stylesheet" href="/css-frontend/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/js/argon.js" type="text/css">
    <link rel="stylesheet" href="/js/argon.min.js" type="text/css">
    <link rel="stylesheet" href="/js/bootstrap.min.js" type="text/css">
    <link rel="stylesheet" href="/js/jquery-3.3.1.min.js" type="text/css">
    <link rel="stylesheet" href="/js/main.js" type="text/css">
    <link rel="stylesheet" href="/js/aos.js" type="text/css">
    <link rel="stylesheet" href="/js/jquery-ui.js" type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        function read() {
            location.href = "#small-container";
        }
    </script>
</head>

<body>
    <div class="header">
        <div class="navbar">
            <div class="logo">
                <a>TokoPakDio</a>
            </div>
            <nav>
                <ul id="menuitems">
                    @if (Auth::check())
                    <li><a href="index">Home</a></li>
                    @elseif (Auth::guest())
                    <li><a href="home">Home</a></li>
                    @endif
                    <li><a href="about">About</a></li>
                    <li><a href="product">Produtcs</a></li>
                    @if (Auth::check())
                    <li><a href="account.php">Account</a></li>
                    <li><a href="pembayaran">Pembayaran</a></li>
                    @endif
                    @if (Auth::guest())
                    <li><a href="registerCustomer">Login</a></li>
                    @else

                    <li>
                        <a href="logout" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                    <form id="logout-form" action="logout" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @endif

                </ul>
            </nav>
            <a><img src="img/icons/child.png" class="menu-icon" onclick="menutoggle();"></a>
        </div>
    </div>

    @yield('content')

    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Download Our App</h3>
                    <p>Download App For Android and IOS Mobile Phone.</p>
                    <div class="app-logo">
                        <img src="img/play-store.png">
                        <img src="img/app-store.png">
                    </div>
                </div>
                <div class="footer-col-2">
                    <img src="img/icons/logo.png">
                    <p>Produk dari TokoPakDio terdiri dari mainan yang disukai oleh anak-anak. Mainan tersebut sudah bersetifikat halal x.</p>
                </div>
                <div class="footer-col-3">
                    <h3>Follow US</h3>
                    <ul>
                        <a href="instagram.com">
                            <li>Instagram</li>
                        </a>
                        <a href="facebook.com">
                            <li>Facebook</li>
                        </a>
                        <li>Link.in</li>
                        <li>Line</li>
                    </ul>
                </div>
                <div class="footer-col-4">
                    <h3>Useful Links</h3>
                    <ul>
                        <li>TokoPakDio</li>
                        <li>dinamika.ac.id</li>
                        <li>Google</li>
                        <li>Blogspot</li>
                    </ul>
                </div>
            </div>
            <hr>
        </div>
    </div>
    <!--js for menu-->
    <script type="text/javascript">
        var menuitems = document.getElementById("menuitems");
        menuitems.style.maxHeight = "0px";

        function menutoggle() {
            if (menuitems.style.maxHeight == "0px") {
                menuitems.style.maxHeight = "200px";
            } else {
                menuitems.style.maxHeight = "0px";
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>

</html>