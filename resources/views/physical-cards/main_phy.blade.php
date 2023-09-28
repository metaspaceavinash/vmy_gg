<?php  
$SER=env('APP_URL');
?>
<article class="card-display  kkom{{ $card_id }}">
<link rel="stylesheet" href="{{ asset('assets/card-images/Card-' . $card_id . '/style.css') }}">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-5">
            <div class="cardviewiiner">
                  <div class="flip-card">
                    <div class="flip-card-inner">
                      <div class="flip-card-front ">
                      <div class="pos-r">
                       <img src="{{ $SER }}/assets/card-images/Card-{{ $card_id }}/Background/Front.png" class="mx-auto d-block img-fluid">
                        <div class="caption-front">
                        @php
                        $logo_white=$SER."/assets/card-images/logo-light.png"; 
                        @endphp

                        @if($logo_white!='')
                            <img src="{{ $logo_white }}" class="img-fluid logoimg pos-ab  fffsss">
                        @endif

                          <h1 class="u-name pos-ab">{{ $title }}</h1>
                          <p class="u-deg pos-ab">{{ $designation }}</p>
                        </div>
                      </div>
                      </div>
                      <div class="flip-card-back ">
                        <div class="pos-r">
                          <img src="{{ $SER }}/assets/card-images/Card-{{ $card_id }}/Background/Back.png" class="img-fluid  ">
                          <div class="caption-back">
                            <!-- <img src="images/QR.png" class="img-fluid scan pos-ab"> -->
                            <h1 class="u-name-back pos-ab">{{ $title }}</h1>
                          <p class="u-deg-back pos-ab">{{ $designation }}</p>
                          <p class="u-weblink-back pos-ab">www.domin.com</p>
                               <div class="shareqrcode scan pos-ab">-Q11R</div> 
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            </div>
        </div>
      </article>