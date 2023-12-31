@php
    $dir = asset(Storage::url('uploads/plan'));
    $qr_path = \App\Models\Utility::get_file('qrcode');
    $SER=env('APP_URL');   //$_SERVER['HTTP_ORIGIN'];
@endphp
@include('physical-cards.css_ph1',[$SER,$card_id])
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/card-images/cardview.css') }}"> -->
<div class=" row m-4">
    <div class="col-12 col-lg-5">
        <img src="{{ $SER }}/assets/card-images/loader3.gif" class="spingif k11 d-none " />
        <div class="card-display">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <img src="{{ $logo_white }}" width="150px" class="j_sww" >
                            </div>
                            <div class="flip-card-back ww">
                                <ul class="info">
                                    <li class="qrcode"><div class="shareqrcode">QR</div></li>
                                    <li class="name-crdowner" style="color:#fff">{{ $title }}</li>
                                    <li class="degnition">{{ $designation }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
<script src="{{ asset('custom/js/purpose.js') }}"></script>
<script src="{{ asset('custom/js/jquery.qrcode.min.js') }}"></script>
<script>
        $(document).ready(function() {
            var slug = '{{ $businessData->slug }}';
            var url_link = `{{ url('/') }}/${slug}`;
            $(`.qr-link`).text(url_link);
            var foreground_color =`{{ isset($qr_detail->foreground_color) ? $qr_detail->foreground_color : '#000000' }}`;
            var background_color =`{{ isset($qr_detail->background_color) ? $qr_detail->background_color : '#ffffff' }}`;
            var radius = `{{ isset($qr_detail->radius) ? $qr_detail->radius : 26 }}`;
            var qr_type = `{{ isset($qr_detail->qr_type) ? $qr_detail->qr_type : 0 }}`;
            var qr_font = `{{ isset($qr_detail->qr_text) ? $qr_detail->qr_text : 'vCard' }}`;
            var qr_font_color = `{{ isset($qr_detail->qr_text_color) ? $qr_detail->qr_text_color : '#f50a0a' }}`;
            var size = `{{ isset($qr_detail->size) ? $qr_detail->size : 9 }}`;
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