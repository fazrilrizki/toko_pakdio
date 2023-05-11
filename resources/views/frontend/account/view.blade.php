@extends('frontend.layout.main-layout')

@section('title', 'Account')

@section('content')
<div class="testimonial2">
    <div class="small-container">
        <h2 class="title">Haloo, {{ Auth::user()->name }} </h2>
        <div class="row">
            <div class="col-3">
                <img src="img/admin.jpg" alt="belum upload foto">
                <h3>
                </h3>
                <p>
                    <a href="#" class="btn" onclick="toggle();">Edit Profile</a>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="tambah">
    <center><h2>Edit Profile</h2></center>
    <!-- <p>Edit Profile Dosen</p> -->
    <!-- <div class="input"> -->

    <form method="post" action="edit-profile.php" enctype="multipart/form-data">

            <div class=" form-group">
            <div class="col-6">
                
            </div>
            <div class="col-6">
                <input type="hidden" id="text-input" name="id_pelanggan" value="" class="form-control"> </input>
            </div>
        </div>

        <div class=" form-group">
            <div class="col-6">
                <label >Nama Depan</label>
            </div>
            <div class="col-6">
                <input type="text" id="text-input" name="namad" value="" class="form-control"> </input>
            </div>
        </div>

        <div class=" form-group">
            <div class="col-6">
                <label >Nama Belakang</label>
            </div>
            <div class="col-6">
                <input type="text" id="text-input2" name="namab" value="" class="form-control">
            </div>
        </div>

        <div class=" form-group">
            <div class="col-6">
                <label >Alamat</label>
            </div>
            <div class="col-6">
                <input type="text" id="text-input2" name="alamat" value="" class="form-control">
            </div>
        </div>

        <div class=" form-group">
            <div class="col-6">
                <label >Email</label>
            </div>
            <div class="col-6">
                <input type="text" id="text-input2" name="email" value="" class="form-control">
            </div>
        </div>

        <div class=" form-group">
            <div class="col-6">
                <label >Gambar</label>
            </div>
            <div class="col-6">
                <input type="file" id="gambar" name="file" /> <small class="form-text text-muted">*png,jpg,jpeg only</small>
            </div>
        </div>
        <input type="hidden" name="old" value=""></input>
        <div class="input2">
            <input style="background: grey;" type="submit" value="Simpan" name="simpan">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
    </form>
</div>
<script type="text/javascript">
    function toggle() {
        var tambah = document.querySelector('.tambah');
        tambah.classList.toggle('active');
    }

    function jenis() {
        var jenis = document.querySelector('.jenis');
        jenis.classList.toggle('active');
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
@endsection