@extends('frontend.layout.main-layout')

@section('title', 'Account')

@section('content')
<div class="testimonial2">
    <div class="small-container">
        <h2 class="title">Haloo, {{ Auth::user()->name }} </h2>
        <div class="row">
            <div class="col-3">
                <img src="img/admin.jpg" alt="belum upload foto">
                <p>Saldo : Rp. </p>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
@endsection