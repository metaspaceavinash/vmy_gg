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
</style>