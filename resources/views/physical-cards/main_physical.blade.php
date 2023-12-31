@extends('layouts.admin')
@php
    $dir = asset(Storage::url('uploads/plan'));
    $qr_path = \App\Models\Utility::get_file('qrcode');
    $SER=env('APP_URL');   //$_SERVER['HTTP_ORIGIN'];
    $total_phy_card=env('TOTAL_PHYSICAL_CARD_TEMPLATE');
    $card_id=1;
@endphp
@section('page-title')
    Physical Card
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
@push('custom-scripts')
        <script src="{{ asset('custom/js/purpose.js') }}"></script>
        @if (isset($plan->enable_qr_code) && $plan->enable_qr_code == 'on')
            <script src="{{ asset('custom/js/jquery.qrcode.min.js') }}"></script>
        @else
            <script src="{{ asset('custom/js/jquery.qrcode.js') }}"></script>
            <script type="text/javascript" src="https://jeromeetienne.github.io/jquery-qrcode/src/qrcode.js"></script>
        @endif
@endpush
@section('content')

@include('physical-cards.css_ph3',[$SER,$card_id])
@include('physical-cards.main_phy',[$SER,$card_id])

      <div class="row mt-5">
      @php $jj="";   
        
       @endphp
                
                @foreach (range(1, $total_phy_card) as $key=>$value)
                    @if($value==1)
                        @php $jj="checked"; @endphp
                    @else
                @php $jj=""; @endphp
            @endif

            <div class="col-12 col-lg-3 mt-2 mb-3 line-content">
            <input type="radio" {{ $jj }} class="custom-control-input d-none  card_design_id_{{ $value }}" value="{{ $value }}"
            id="ck2{{ $value }}" name="card_design_id">
            <label class="Dcng_phy_card L136" id="vvn_{{$key}}" data-card_design_id="{{ $value }}" for="ck2{{ $value }}">
                <div class="img-tab">
                    <img src="{{ asset('assets/card-images/Card-' . $value . '/Show.png') }}" class="mx-auto d-block img-fluid">
                </div>
            </div>
            </label>
        @endforeach
          
        
       
        </div> 

        <div class="row mt-5">
            <nav aria-label="Page navigation example">
                <ul id="pagin pagination justify-content-center"></ul>

                <ul id="pagin" class=" pagination justify-content-center">
                  

                  
                </ul>


        

              </nav>
        </div>

       
 
        <!-- <ul id="pagin"></ul> -->


<script> 

//Pagination
pageSize = 4;
incremSlide = 5;
startPage = 0;
numberPage = 0;

var pageCount =  $(".line-content").length / pageSize;
var totalSlidepPage = Math.floor(pageCount / incremSlide);
    
for(var i = 0 ; i<pageCount;i++){
    $("#pagin").append('<li class="page-item"><a href="#">'+(i+1)+'</a></li> ');
    if(i>pageSize){
       $("#pagin li").eq(i).hide();
    }
}

var prev = $("<li/>").addClass("prev").html("<<").click(function(){
   startPage-=5;
   incremSlide-=5;
   numberPage--;
   slide();
});

prev.hide();

var next = $("<li/>").addClass("next").html(">>").click(function(){
   startPage+=5;
   incremSlide+=5;
   numberPage++;
   slide();
});

$("#pagin").prepend(prev).append(next);

$("#pagin li").first().find("a").addClass("current");

slide = function(sens){
   $("#pagin li").hide();
   
   for(t=startPage;t<incremSlide;t++){
     $("#pagin li").eq(t+1).show();
   }
   if(startPage == 0){
     next.show();
     prev.hide();
   }else if(numberPage == totalSlidepPage ){
     next.hide();
     prev.show();
   }else{
     next.show();
     prev.show();
   }
   
    
}

showPage = function(page) {
	  $(".line-content").hide();
	  $(".line-content").each(function(n) {
	      if (n >= pageSize * (page - 1) && n < pageSize * page)
	          $(this).show();
	  });        
}
    
showPage(1);
$("#pagin li a").eq(0).addClass("current");

$("#pagin li a").click(function() {
	 $("#pagin li a").removeClass("current");
	 $(this).addClass("current");
	 showPage(parseInt($(this).text()));
});


</script>
 
@php 

    $bid = isset($qr_detail->business_id) ? $qr_detail->business_id : null;
    $uid = isset($user->current_business) ? $user->current_business : null;
    $cid=null;
    $users = \Auth::user();
    $profile = \App\Models\Utility::get_file('uploads/avatar');
    $logo = \App\Models\Utility::get_file('uploads/logo/');
    $company_logo = Utility::getValByName('company_logo');
    $company_small_logo = Utility::getValByName('company_small_logo');
    $currantLang = $users->currentLanguage();
    $fullLang = \App\Models\Languages::where('code', $currantLang)->first();
    $languages = Utility::languages();
    $businesses = App\Models\Business::allBusiness();
    $currantBusiness = $users->currentBusiness();
    //$bussiness_id = !empty($users->current_business)?$users->current_business:'';
    $bussiness_id = $users->current_business;
@endphp

    <!-- <form name="card_request" id="card_request" action="/card_request" method="post"> -->
    <form name="card_request" id="card_request" action="/post_card_request" method="post">

        @csrf
        <input type="hidden" name="cid" id="cid" value="1" />
        <input type="hidden" name="bid" id="bid" value="{{ $bussiness_id }}" />
        <input type="hidden" name="uid" id="uid" value="{{ $users->id }}"/>
        <div class="d-flex align-items-center justify-content-between mt-3 sclFlex d-none">
            <h5 class="mb-0"></h5>
            <button type="submit" class="btn btn-primary cardNewResss">   <i class="me-2" data-feather="folder"></i> Request Now</button>
        </div>
        <div class="d-flex align-items-center justify-content-between mt-3">
            <h5 class="mb-0"></h5>
            <button type="submit" class="btn btn-primary cardNewResss">   <i class="me-2" data-feather="folder"></i> Request Now</button>
        </div>
    </form>
         <script>
            function seAutoTemplate(desid, vcid, vid) {
                $('.spingif').removeClass('d-none');
                $('.flip-card').addClass('d-none');
                var currentURL = window.location.href;
                var url = new URL(currentURL);
                var baseUrl2 = url.protocol + '//' + url.host;
                $.ajax({
                    url: '/get_dyn_phy', // Laravel route URL
                    type: 'POST',
                    data: { card_design_id: desid, rdo_vcard_id: vcid },
                    success: function (response) {
                        $('.spingif').addClass('d-none');
                        $('.flip-card').removeClass('d-none');
                        $('.card-display').html(response.html);
                        QRT();
                    },
                    error: function (error) {
                    console.log('Error:', error);
                    }
                });
            }

            function seRpk(uid,bid,cid) {
                $('.spingif').removeClass('d-none');
                $('.flip-card').addClass('d-none');
                var currentURL = window.location.href;
                var url = new URL(currentURL);
                var baseUrl2 = url.protocol + '//' + url.host;
                $.ajax({
                    url: '/card_request', // Laravel route URL
                    type: 'POST',
                    data: { uid: uid, bid: bid, cid:cid },
                    success: function (response) {
                        $('.spingif').addClass('d-none');
                        $('.flip-card').removeClass('d-none');
                        $('.card-display').html(response.html);
                    },
                    error: function (error) {
                    console.log('Error:', error);
                    }
                });
            }


            $(".Dcng_phy_card").click(function(){
                var rdo_vcard_id = 1; //document.querySelector('input[name="rdo_vcard_id"]:checked');
                var card_design_id_val = $(this).attr('data-card_design_id');
                $('#cid').val(card_design_id_val);
                seAutoTemplate(card_design_id_val, rdo_vcard_id.value, 0);
            });

            $(".sclFlexBtn").click(function(){
                // var rdo_vcard_id = 1; //document.querySelector('input[name="rdo_vcard_id"]:checked');
                // var card_design_id_val = $(this).attr('data-card_design_id');
                // seAutoTemplate(card_design_id_val, rdo_vcard_id.value, 0);
                seRpk(2,2,3);
            });

            $(document).ready(function() {
                QRT();
            });

            function QRT(){
                var slug = '{{ $businessData->slug }}';
                var url_link = `{{ url('/') }}/${slug}`;
                $(`.qr-link`).text(url_link);
                var foreground_color =
                    `{{ isset($qr_detail->foreground_color) ? $qr_detail->foreground_color : '#000000' }}`;
                var background_color =
                    `{{ isset($qr_detail->background_color) ? $qr_detail->background_color : '#ffffff' }}`;
                var radius = `{{ isset($qr_detail->radius) ? $qr_detail->radius : 26 }}`;
                var qr_type = `{{ isset($qr_detail->qr_type) ? $qr_detail->qr_type : 0 }}`;
                var qr_font = `{{ isset($qr_detail->qr_text) ? $qr_detail->qr_text : 'vCard' }}`;
                var qr_font_color =
                    `{{ isset($qr_detail->qr_text_color) ? $qr_detail->qr_text_color : '#f50a0a' }}`;
                var size = `{{ isset($qr_detail->size) ? $qr_detail->size : 9 }}`;
                var Vss=$('.shareqrcode').empty().qrcode({
                    render: 'image',
                    size: 500,
                    ecLevel: 'H',
                    minVersion: 3,
                    quiet: 1,
                    text: url_link,
                    fill: foreground_color,
                    background: background_color,
                    radius: .01 * parseInt(radius, 10),
                    mode: parseInt(qr_type, 10),
                    label: qr_font,
                    fontcolor: qr_font_color,
                    image: $("#image-buffers")[0],
                    mSize: .01 * parseInt(size, 10)
                });
            }
         </script>
         @endsection