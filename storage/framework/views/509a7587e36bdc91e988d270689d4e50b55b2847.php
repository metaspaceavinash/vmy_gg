<?php
    $dir = asset(Storage::url('uploads/plan'));
    $qr_path = \App\Models\Utility::get_file('qrcode');
    $SER=env('APP_URL');   //$_SERVER['HTTP_ORIGIN'];
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="<?php echo e(asset('custom/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('custom/js/custom.js')); ?>" ></script> 
<script src="<?php echo e(asset('custom/js/purpose.js')); ?>"></script>
<script src="<?php echo e(asset('custom/js/jquery.qrcode.min.js')); ?>"></script>
<script src="<?php echo e(asset('custom/js/jquery.qrcode.js')); ?>"></script>
<script type="text/javascript" src="https://jeromeetienne.github.io/jquery-qrcode/src/qrcode.js"></script>

     

<div class=" row m-4">
    <div class="col-12 col-lg-5">
        <img src="<?php echo e($SER); ?>/assets/card-images/loader3.gif" class="spingif d-none " />
        <div class="card-display">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <img src="<?php echo e($logo_white); ?>" width="150px" class="j_sww" >
                            </div>
                            <div class="flip-card-back ww">
                                <ul class="info">
                                    <li class="qrcode">  <div class="shareqrcode">QR</div> </li>
                                    <li class="name-crdowner" style="color:#fff"><?php echo e($title); ?></li>
                                    <li class="degnition"><?php echo e($designation); ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
                <style>
 

 .shareqrcode img {
            width: 65%;
            height: 65%;
            padding: 10px 10px;
        }
        .shareqrcode canvas {
            width: 65%;
            height: 65%;
            padding: 10px 10px;
        }


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
  background-image: url("<?php echo e($SER); ?>/assets/card-images/<?php echo e($card_id); ?>FrontBlank.png");
  display: flex;
    justify-content: center;
    align-items: center;
}

.flip-card-back {
  color: white;
  transform: rotateY(180deg);
  background-image: url("<?php echo e($SER); ?>/assets/card-images/<?php echo e($card_id); ?>BackBlank.png");
}

.card-display{
    width: 626px;
    height: 325px;
}
img.spingif {
    position: absolute;
    z-index: 1;
    top: 114px;
    margin: auto;
    left: 0px;
    right: 0px;
}
    
        .ot {
            overflow-y: hidden !IMPORTANT;
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


        input[type="radio"]:checked + label img {
            border-radius: 14px;
            box-shadow: 5px 4px 15px rgba(22, 44, 78, 0.25);
            border-color: #162C4E;
            padding: 5px;
            border: 2px solid #008ecc;
        }


        li.name-crdowner {
    font-weight: bold;
    font-size: 23px;
    position: absolute;
    top: 96px;
    left: 58px;
    color: #fff;
}

li.degnition {
    font-weight: bold;
    color: #ccc;
    position: absolute;
    top: 136px;
    left: 60px;
}
        </style>

    





<script>
    $(document).ready(function() {
            var slug = "vmycard.com";
            var url_link = `<?php echo e(url('/')); ?>/${slug}`;
            $(`.qr-link`).text(url_link);
                var foreground_color =
                    `<?php echo e(isset($qr_detail->foreground_color) ? $qr_detail->foreground_color : '#000000'); ?>`;
                var background_color =
                    `<?php echo e(isset($qr_detail->background_color) ? $qr_detail->background_color : '#ffffff'); ?>`;
                var radius = `<?php echo e(isset($qr_detail->radius) ? $qr_detail->radius : 26); ?>`;
                var qr_type = `<?php echo e(isset($qr_detail->qr_type) ? $qr_detail->qr_type : 0); ?>`;
                var qr_font = `<?php echo e(isset($qr_detail->qr_text) ? $qr_detail->qr_text : 'vCard'); ?>`;
                var qr_font_color =
                    `<?php echo e(isset($qr_detail->qr_text_color) ? $qr_detail->qr_text_color : '#f50a0a'); ?>`;
                var size = `<?php echo e(isset($qr_detail->size) ? $qr_detail->size : 9); ?>`;

                $('.shareqrcode').empty().qrcode({
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
    });
</script>
</div><?php /**PATH C:\laragon\www\vmy_gg\vmycard\resources\views/physical-cards/action_view_card.blade.php ENDPATH**/ ?>