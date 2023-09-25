@extends('layouts.admin')
@php
    $dir = asset(Storage::url('uploads/plan'));
@endphp
@section('page-title')
    {{ __('Plans') }}
@endsection

@section('title')
    Physical Card
@endsection
@section('action-btn')
    @can('create plan')
        <div class="col-xl-12 col-lg-12 col-md-12 d-flex align-items-center justify-content-between justify-content-md-end"
            data-bs-placement="top">
            @if (App\Models\Utility::getPaymentIsOn() && \Auth::user()->type == 'super admin')
                <a href="#" data-size="lg" data-url="{{ route('plans.create') }}" data-ajax-popup="true"
                    data-bs-toggle="tooltip" title="{{ __('Create') }}" data-title="{{ __('Create New Plan') }}"
                    class="btn btn-sm btn-primary">
                    <i class="ti ti-plus"></i>
                </a>
            @endif
        </div>
    @endcan
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Physical Card</li>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<?php //print_r($_SERVER); die("Asfads");
      $SER='http://localhost/vmy_anu1/vmycard-new/';   //$_SERVER['HTTP_ORIGIN'];
      $first_name='Karan';
      $last_name='Sharma';
      $occupation='Developer';
      $email='kranmjo2@gmail.com';
      $phone='7812394122';
      $location='Lucknow';
      $made_by_url='https://www.sss.com'; ?>
      
<style>
     .postion-r {
    position: relative;
    background-size: cover;
    width: 500px;
    height: 295px;
}
   .postion-r-back {
    background-image: url("{{ $SER }}/assets/card-images/1BackBlank.png");
}
.postion-r-front {
    background-image: url("{{ $SER }}/assets/card-images/1FrontBlank.png");
}

.info {
    padding: 0px;
    list-style: none;
}

.pos-a {
    position: absolute;
    display: inline-block;
    font-weight: 600;
    font-size: 14px;
    color: #fff;
}
.img-logo {
    left: 0px;
    right: 0px;
    text-align: 0px;
    top: 0px;
    bottom: 0px;
    width: 188px;
    position: absolute;
    transform: translate(-4px, 123px);
}


.email {
    bottom: 78px;
    left: 100px;
}

.call {
    bottom: 32px;
    left: 100px;
}

.address {
    bottom: 32px;
    left: 331px;
}
.url {
    bottom: 78px;
    left: 331px;
}

.caption-front img {
    width: 197px;
    height: auto;
}
 
li.degnition {
    font-weight: bold;
    color: #ccc;
    position: absolute;
    top: 136px;
    left: 60px;
}

li.name-crdowner {
    font-weight: bold;
    font-size: 23px;
    position: absolute;
    top: 96px;
    left: 58px;
    color: #fff;
}

li.qrcode {
    position: absolute;
    right: 68px;
    top: 32px;
}
li.qrcode img {
    width: 100px !IMPORTANT;
    height: 100px;
}
</style>
@section('content')


<style>
.flip-card {
  background-color: transparent;
  width: 1100px;
  height: 645px;
  /* perspective: 1000px; */
}
.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.flip-card-front {
  background-color: #bbb;
  color: black;
  background-image: url("{{ $SER }}/assets/card-images/1FrontBlank.png");
}

.flip-card-back {
  background-color: #2980b9;
  color: white;
  transform: rotateY(180deg);
  background-image: url("{{ $SER }}/assets/card-images/1BackBlank.png");
}
</style>
 
        <div class="discard">
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img src="{{ $SER }}/assets/card-images/logo2.png" >
                    </div>
                    <div class="flip-card-back ww1">
                        <ul class="info">
                            <li class="qrcode"><img src="{{ $SER }}/assets/card-images/qr.png" class=""></li>
                            <li class="name-crdowner">{{ $first_name }} {{ $last_name }}</li>
                            <li class="degnition">{{ $occupation }}</li>
                            <li class="email pos-a">
                            {{ $email }}
                            </li>
                            <li class="call pos-a">
                            {{ $phone }}
                            </li>
                            <li class="address pos-a">
                            {{ $location }}
                            </li>
                            <li class="url pos-a">
                            {{ $made_by_url }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


         <style>
.cj {

    justify-content: space-between;
}

.cjb {
    border: 2px solid #333;
}

.scroll-container {
    height: 340px;
    /* Set the height of the container */
    overflow-y: scroll;
    /* Enable vertical scrolling */
    border: 1px solid #ccc;
    /* Add a border for visual clarity */
}

/* Add some content inside the scrollable container */
.scroll-content {
    padding: 10px;
}
.list-group-item:first-child {
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
}

.list-group-item:last-child {
    border-bottom-left-radius: 0px;
    border-bottom-right-radius: 0px;
}

label.rbtnf {
    display: flex;
}
label.rbtnf h4 {
    margin: 0px;
    margin-left: 8px;
}

p.sectitlth {
    margin: 0px;
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    padding: 14px 0px;
    background: #0a0a0a;
    color: #fff;
}

.ot {
    overflow: hidden !IMPORTANT;
    overflow-x: scroll !IMPORTANT;
}
.w-maxhere {
    display: flex;
    padding: 10px 0px;
}
.ot::-webkit-scrollbar {
    height: 15px;
}
.ot::-webkit-scrollbar-thumb {
    background: pink;
    border-radius: calc(15px / 2);
}

.flip-box-m, .flip-box-m img {
    height: 150px;
    width: 200px !important;
    margin: 20px !important;
}

.ot .custom-control-input{ display: none}
input[type="radio"]:checked + label img {
    border-radius: 14px;
    box-shadow: 5px 4px 15px rgba(22, 44, 78, 0.25);
    border-color: #162C4E;
    padding: 5px;
}
</style>
<hr/>

         <div class="row">

         <div class="row justify-content-around  d-flex flex-row flex-nowrap overflow-auto ot ">
         <div class="w-maxhere">
            @php $jj=""; @endphp
                @foreach (range(1, 9) as $key=>$value)
                    @if($value==1)
                        @php $jj="checked"; @endphp
                    @else
                @php $jj=""; @endphp
            @endif
    <div class="flip-box-m col-md-3 m-4">
        <input type="radio" {{ $jj }} class="custom-control-input  card_design_id_{{ $value }}" value="{{ $value }}"
            id="ck2{{ $value }}" name="card_design_id">
        <label class="Dcng_phy_card L136" id="vvn_{{$key}}" data-card_design_id="{{ $value }}" for="ck2{{ $value }}">
            <img src="{{ asset('assets/card-images/' . $value . 'FrontBlank.png') }}" alt=""
                data-card_design_id="{{ $value }}" class="ecard-image m-4">
        </label>
    </div>
    @endforeach
    </div>
</div>
         </div>

         <script>
            // $('.Dcng_phy_card').click{

            // }

            $(".Dcng_phy_card").click(function(){


                // alert("The paragraph was clicked.");
            });

            // $(".ecard-image").click(function(){
            //     alert("The paragraph was clicked.");
            // });

         </script>
         @endsection
