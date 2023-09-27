@extends('layouts.admin')
@section('content')
@section('page-title')
    Physical Card Request
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">Physical Card Request</li>
@endsection

@section('title')
    Physical Card Request
@endsection

@section('content')
<?php  //echo "<pre>"; print_r($card_request_deatails); die("Asdf"); 
$data['rs']=$rs;

// $data['METAL_COUNT']=$METAL_COUNT;
// $data['PVC_COUNT']=$PVC_COUNT;

$data['METAL_COUNT']=$METAL_COUNT;
$data['PVC_COUNT']=$PVC_COUNT;
$data['card_request_deatails']=$card_request_deatails;
?>
@include('physical-cards.shipping_address_form',$data)
@endsection
