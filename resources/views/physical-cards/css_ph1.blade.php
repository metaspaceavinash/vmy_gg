<style>
.shareqrcode img {
width: 35%;
height: 35%;
padding: 10px 10px;
}
.shareqrcode canvas {
width: 35%;
height: 35%;
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
background-image: url("{{ $SER }}/assets/card-images/{{ $card_id }}FrontBlank.png");
display: flex;
justify-content: center;
align-items: center;
}

.flip-card-back {
color: white;
transform: rotateY(180deg);
background-image: url("{{ $SER }}/assets/card-images/{{ $card_id }}BackBlank.png");
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