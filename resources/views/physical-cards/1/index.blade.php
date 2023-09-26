<?php  
$SER=env('APP_URL');
?>
<style>
     .postion-r {
    position: relative;
    background-size: cover;
    width: 500px;
    height: 295px;
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
    color:#fff;
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
    left: 37px;
}

.call {
    bottom: 32px;
    left: 37px;
}

.address {
    bottom: 32px;
    left: 300px;
}
.url {
    bottom: 78px;
    left: 300px;
}

.caption-front img {
    width: 197px;
    height: auto;
}
 
li.qrcode {
    position: absolute;
    right: 77px;
    top: 82px;
}
li.qrcode img {
    width: 100px !IMPORTANT;
    height: 100px;
}


</style>



<style>
.flip-card {
    background-color: transparent;
    width: 626px;
    height: 325px;
    /* perspective: 1000px; */
    /* margin: 0px; */
    margin: auto;
    /* background: #ccc; */
    padding: 10px;
    border: 2px dashed #ccc;
    border-radius: 15px;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
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
  background-image: url("{{ $SER }}/assets/card-images/1FrontBlank.png") !important;
  display: flex;
    justify-content: center;
    align-items: center;
}


.flip-card-back {
  color: white;
  transform: rotateY(180deg);
  background-image: url("{{ $SER }}/assets/card-images/1BackBlank.png") !important;
}


.shareqrcode img {
            width: 25% !important;
            height: auto !important;
            padding: 10px 10px;
            margin-left: 280px;
            margin-top: 60px;
        }
        .shareqrcode canvas {
            width: 25% !important;
            height: auto !important;
            padding: 10px 10px;
            margin-left: 280px;
            margin-top: 60px;
        }
</style>

        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="{{ $logo_white }}" width="150px"  >
                </div>
                <div class="flip-card-back ww2">
                    <ul class="info">
                        <li><div class="shareqrcode"></div></li>
                        <li class="name-crdowner">{{ $title }}</li>
                        <li class="degnition">{{ $designation }}</li>
                        
                    </ul>
                </div>
            </div>
        </div>

        @include('physical-cards.common_qr')
