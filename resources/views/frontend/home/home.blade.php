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

    </div>
    <div class="container">
        <div class="row">
            <div class="col-2">
                <h1>Mari Berbelanja dengan <br> TokoPakDio</h1>
                <p style="font-family: sans-serif">Cintailah produk asli Indonesia <br>Original dan Sudah Berlabel Halal dari Majelis Ulama Indonesia(MUI).</p>
                <a href="" class="btn" onclick="read();">Baca Lebih</a>
            </div>
            <div class="col-2">
                <img src="images/image1.png">
            </div>
        </div>
    </div>
    <div class="testimonial">
        <div class="small-container">
            <h2 class="title">Our Ready Stock</h2>
            <div class="row">
                    <div class="col-3">
                        <img src="../images/produk/">
                        <h4> </h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                        </div>
                        <p>Nama Mainan : </p>
                        <p>Stok : </p>
                        <p><b> Harga : Rp. </b></p>
                        <p>Deskripsi Mainan : </p>
                    </div>
            </div>
        </div>
    </div>
    
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