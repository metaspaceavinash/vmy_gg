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
@include('physical-cards.shipping_address_form')
@endsection
