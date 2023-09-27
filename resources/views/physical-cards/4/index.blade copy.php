<?php 
$SER=env('APP_URL');
$card_id=4;
?>
@include('physical-cards.css_ph1',[$SER,$card_id])
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="{{ $logo_white }}" width="150px"  >
                </div>
                <div class="flip-card-back ww5">
                    <ul class="info">
                        <li><div class="shareqrcode"></div></li>
                        <li class="name-crdowner">{{ $title }}</li>
                        <li class="degnition">{{ $designation }}</li>
                        
                    </ul>
                </div>
            </div>
        </div>
@include('physical-cards.common_qr')