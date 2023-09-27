<?php  
$SER=env('APP_URL');
?>
<article>

        
<style>
 
    .shareqrcode img {
    width: 35%;
    height: 35%;
    }
    .shareqrcode canvas {
    width: 35%;
    height: 35%;
    }



    .scan {
              top: 109px;
              left: 41%;
          }


          .pos-r {
              position: relative;
          }
          .pos-ab{ position: absolute;}
          
          .u-name {
    /* bottom: 63px; */
    /* left: 20px; */
    color: #fff;
    font-size: 25px;
    width: 100%;
    text-align: center;
}
          .u-deg {
              bottom: 26px;
              left: 20px;
              color: #fff;
          }
          
          
          
          .logoimg {
    left: 39%;
    top: 70px;
    border-radius: 50%;
    height: 120px;
    width: 120px;
}
          
  </style>
  
  
        <div class="row justify-content-center">
            <div class="col-12 col-lg-5">
            <div class="cardviewiiner">
                  <div class="flip-card">
                    <div class="flip-card-inner">
                      <div class="flip-card-front ">
                      <div class="pos-r">
                       <img src="{{ $SER }}/assets/card-images/2FrontBlank.png" class="mx-auto d-block img-fluid">
                        <div class="caption-front">
                          <img src="{{ $logo_white }}" class="img-fluid logoimg pos-ab">
                          <h1 class="u-name pos-ab">{{ $title }}</h1>
                          <p class="u-deg pos-ab">{{ $designation }}</p>
                        </div>
                      </div>
                      </div>
                      <div class="flip-card-back ">

                        <div class="pos-r">
                          <img src="{{ $SER }}/assets/card-images/2BackBlank.png" class="img-fluid  ">

                          <div class="caption-back">
                            <!-- <img src="images/QR.png" class="img-fluid scan pos-ab"> -->
                               <div class="shareqrcode scan pos-ab">-QR</div> 

                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            </div>
        </div>
      </article>
      @include('physical-cards.common_qr')
