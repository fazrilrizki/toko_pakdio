<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Halaman Mahasiswa</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->
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
                <img src="images/UI-18.png" width="125px"  alt="logo">
            </div>
            <nav>
                <ul id="menuitems">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="program.php">Produtcs</a></li>
                    <li><a href="account.php">Account</a></li>
                    <li><a href="pembayaran.php">Pembayaran</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
            <a><img src="images/menu.png" class="menu-icon" onclick="menutoggle();"></a>
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
                        <img src="images/play-store.png">
                        <img src="images/app-store.png">
                    </div>
                </div>
                <div class="footer-col-2">
                    <img src="images/UI-18.png">
                    <p>Tujuan dari Produk TSTL - Coolture.ID adalah untuk melestarikan kebudayaan dan menanamkan rasa nasionalisme melalui sebuah produk Apparel atau Pakaian.</p>
                </div>
                <div class="footer-col-3">
                    <h3>Follow US</h3>
                    <ul>
                        <a href="https://www.instagram.com/yudi_kops/">
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
                        <li>Coolture.ID</li>
                        <li>dinamika.ac.id</li>
                        <li>Google</li>
                        <li>Blogspot</li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class="copyright">Copyright 2020 - Muhammad Wahyudi - 18410100148</p>
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