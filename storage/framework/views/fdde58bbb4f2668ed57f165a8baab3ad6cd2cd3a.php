<style> 

.flip-card {
    background-color: transparent;
    width: 100%;
    height: 100%;
    perspective: 1000px;
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
  
  
  
  .flip-card-back {
    transform: rotateY(180deg);
  }

  .cardviewiiner {
      width: 528px;
      height: 341px;
      padding: 12px;
      border: 2px dashed #ccc;
      box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
      border-radius: 7px;
  }



  .pos-r {
      position: relative;
  }
  .pos-ab{ position: absolute;}


  ul#pagin {
    display: flex;
    justify-content: center;
    list-style: none;
    border: 1px solid #ccc;
    width: 315px;
    margin: auto;
}
ul#pagin li{ border-left: 1px solid #ccc; padding: 10px; cursor: pointer; }


.scan {
    top: 88px;
    left: 0%;
}
.shareqrcode img {
    width: 26%;
    height: 26%;
}
</style><?php /**PATH C:\laragon\www\vmy_gg\vmycard\resources\views/physical-cards/css_ph3.blade.php ENDPATH**/ ?>