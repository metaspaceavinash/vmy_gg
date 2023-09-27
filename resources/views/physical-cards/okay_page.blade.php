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
 
<style>
        .successbox {
    margin: auto;
    text-align: center;
}
.boxsuccess {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 80vh;
}

i.fa.fa-check {
    background: green;
    color: #fff;
    padding: 10px;
    font-size: 62px;
    width: 70px;
    height: 70px;
    border-radius: 50%;
    line-height: 52px;
}

.successbox p {
    font-size: 20px;
    color: #575151;
    font-size: 18px;
    line-height: 26px;
}
</style>

<div class="boxsuccess">
<div class="successbox">
    <i class="fa fa-check" aria-hidden="true"></i>
    <h2>Order Success</h2>
    <p></p>
<p>Your order has been place successfully, We will dispatch your order within <br/> 2-3 business working days.</p>

<a href=" {{ route('physical.view_request_order') }} " class="btn btn-lg btn-primary btn-create"> View Order </a> 

</div>

</div>

@endsection