<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="theme-color" content="#0f1439">
  <meta name="msapplication-navbutton-color" content="#0f1439">
  <meta name="apple-mobile-web-app-status-bar-style" content="#0f1439">
  <meta charset="utf-8">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta content="width=device-width,initial-scale=1" name="viewport">

  <link rel="stylesheet" href="{{asset('libs/fullpage/jquery.fullpage.min.css')}}">
  <link rel="stylesheet" href="{{asset('libs/owl/assets/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('libs/owl/assets/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('libs/flickity/flickity.css')}}">
  <link rel="stylesheet" href="{{asset('libs/fancyapps/jquery.fancybox.min.css')}}">
  <link rel="stylesheet" href="{{asset('libs/rateyo/jquery.rateyo.min.css')}}">
  <link rel="stylesheet" href="{{asset('libs/grid100.css')}}">
  <link rel="stylesheet" href="{{asset('libs/scroll/jquery.mCustomScrollbar.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/main.css')}}">


  <link rel="icon" type="image/png" href="{{ asset('img/phobia_fav.png')}}')}}"/>
  <title>Home</title>
  <style>
    @font-face {
      font-family: 'Agency';
      src: url('{{ asset('css/fonts/Agency.ttf')}}') format('truetype');
      font-weight: normal;
      font-style: normal;
    }
  </style>
</head>
<body class="home">
<div style="display: none !important;" class='preloader'>
  <div><img src='{{ asset('img/500.gif')}}'/></div>
</div>
<script>
  function loadImages(images, callback) {
    var total = images.length,
      count = 0,
      i;
    console.log(total)

    function check(n) {
      console.log(n, total - 1)
      if (n == total - 1) {
        callback();
      }
    }

    for (i = 0; i < total; ++i) {
      var src = images[i];
      var img = document.createElement("img");
      img.src = src;
      img.addEventListener("load", function () {
        if (this.complete) {
          count++;
          check(count);
        }
      });
    }
  }

  window.addEventListener("load", function () {
    setTimeout(function () {
      $("body").find('.preloader').fadeOut(300, function () {
        $('.preloader').remove();
      })
    }, 3000);
    // var imgs = $('img').not($("#map img")).map(function () {return $(this).attr('src')});
    // loadImages( imgs, function() {
    // });
  });
</script>
<div class="nav" id="nav" data-gumshoe-header><span class="logo-mob"><div
        class="toggler"><span></span><span></span><span></span></div><a href="/" class="logo-link"><img
          src="{{ asset('/img/logo.png')}}')}}" alt=""></a></span>
  <div class="cont"><span class="logo"><div class="toggler"><span></span><span></span><span></span></div><a href="/"
                                                                                                            class="logo-link"><img
            src="{{ asset('/img/logo.png')}}" alt=""></a></span>
    <ul id="menu" data-gumshoe>
      <li><a href="#home">Home</a></li>
      <li><a href="#basic-page">Players</a></li>
      <li><a href="#offers">OFFERS</a></li>
      <li><a href="#games">Games</a></li>
      <li><a href="#prices">Prices</a></li>
      <li><a href="#about">ABOUT US</a></li>
      <li><a href="#blog">Blog</a></li>
      <li><a href="#contact">CONTACTS</a></li>
      <li class="lang"><a href="javascript:void(0)">en</a>
        <ul>
          <li class=""><a href="/">az</a></li>
          <li class="active"><a href="javascript:void(0)">en</a></li>
          <li class=""><a href="/ru/">ru</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>
<style>
  @media (max-width: 991px) {
    .flickity-viewport {
      margin-top: 84px !important;
      height: 380px !important;
    }

    .fs-carousel {
      height: 380px !important;
    }

    .blog-inner-slider .carousel-cell {
      height: 200px;
    }

    #home {
      height: 380px !important;
      min-height: 0px !important;
    }

    #prices, #prices .flickity-viewport {
      height: 900px !important;
    }
  }
</style>
<div class="section" id="home">
  <div class="fs-carousel">
    <div class="carousel-cell item" style="background: url({{asset('storage/media/1102/qlavniy_1.jpg')}})">
      <div class="caption"><h1>PHOBIA</h1>
        <h1>VIRTUAL REALITY </h1>
        <p>Phobia VR ilə Virtual Reallığı kəşf edin! Burda siz istənilən oyun və simulyatorların içinə tamamilə qərq ola
          və bütün süjetləri canlı olaraq yaşaya bilərsiniz!</p></div>
    </div>
    <div class="carousel-cell item" style="background: url({{asset('storage/media/1103/qlavniy-edited.jpg')}})">
      <div class="caption"><h1>PHOBIA</h1>
        <h1>VIRTUAL REALITY </h1>
        <p><br/><br/></p></div>
    </div>
  </div>
</div>
<div class="section " id="offers" style="background: url({{asset('storage/media/1029/teklifler_1.jpg')}})">
  <div class="content offers-r">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-100"><h1 class="heading">OFFERS</h1></div>
        <div class="col-xs-100">
          <div class="p"><p>You can experience all latest equipment needed for Virtual Reality in our Phobia VR
              center.</p></div>
        </div>
      </div>
    </div>
    <div class="offers carousel">
      <div class="carousel-cell item" style="background: url({{asset('storage/media/1136/2-2.png')}})">
        <div class="device" style="background: url({{asset('storage/media/1136/2-2_1.png')}});"></div>
        <div class="content"><h1>PlayStation VR</h1>
          <p>Explore stunning new worlds! Feel yourself in the center of the virtual universe and try the whole new way
            of gaming with the PlayStation VR. Everything is possible in our virtual reality center!</p></div>
      </div>
      <div class="carousel-cell item" style="background: url({{asset('storage/media/1135/1-1.png')}})">
        <div class="device" style="background: url({{asset('storage/media/1135/1-1_1.png')}});"></div>
        <div class="content"><h1>HTC Vive</h1>
          <p>With HTC Vive, upgrades the feelings of real world. Evaluate the new reality, play your favorite games on a
            completely different level and experience incredible emotions. Do not miss this opportunity!</p></div>
      </div>
      <div class="carousel-cell item" style="background: url({{asset('storage/media/1063/1-1.jpg')}})">
        <div class="device" style="background: url({{asset('storage/media/1063/untitled-1.png')}});"></div>
        <div class="content"><h1>Oculus Rift</h1>
          <p>Oculus presents a radically new vision of the digital world. Give freedom to your imagination. Dive into
            the world of games, watch movies with the effect of presence, travel in time and terrain!</p></div>
      </div>
      <div class="carousel-cell item" style="background: url({{asset('storage/media/1137/3-3-1.png')}})">
        <div class="device" style="background: url({{asset('storage/media/1137/untitled-3_1.png')}});"></div>
        <div class="content"><h1>Omni Virtuix</h1>
          <p>Omni Virtuix is presented in our center for the first time in Baku! Virtuix Omni VR treadmill, gives you an
            opportunity toplay games such as Counter Strike, Far Cry, GTA with the real in game presence effect.
            Running, driving, shooting and etc are available in this Virtual Reality. You are the hero of the game.</p>
        </div>
      </div>
      <div class="carousel-cell item" style="background: url({{asset('storage/media/1306/3dof-3.png')}})">
        <div class="device" style="background: url({{asset('storage/media/1306/3dof-logo-1.png')}});"></div>
        <div class="content"><h1>3DOF</h1>
          <p>3DOF racing simulator is a French designed and constructed compact motion rig. Let’s see how much immersion
            this motion rig adds to my VR racing!</p></div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="p text-center"><p>It's time to experience a new reality and play games on a completely different
          level!</p></div>
    </div>
  </div>
</div>
<div class="section" id="games" style="background: url({{asset('storage/media/1031/cena-1.jpg')}})">
  <div class="content games-r">
    <div class="container-fluid">
      <div class="header-filter"><h1 class="heading">Games</h1>
        <ul>
          <li data-id="" class="active"><a href="javascript:void(0)">All games</a></li>
          <li data-id="1034" class=""><a href="javascript:void(0)">HTC Vive</a></li>
          <li data-id="1035" class=""><a href="javascript:void(0)">Oculus Rift</a></li>
          <li data-id="1033" class=""><a href="javascript:void(0)">PlayStation VR</a></li>
          <li data-id="1036" class=""><a href="javascript:void(0)">Omni Virtuix</a></li>
          <li data-id="1037" class=""><a href="javascript:void(0)">3DOF</a></li>
        </ul>
      </div>
      <div class="games-list">
        <ul class="orig">
          <li data-category="1034,1035"><a href="/en/games/theblu/" class="link">
              <div class="bgr" style="background:url({{asset('storage/media/1106/theblu-1-1.png')}})"></div>
              <div class="cont"><h1>theBlu</h1>
                <p>Experience the wonder and majesty of the ocean through a series of habitats and come face to face
                  with some of the most awe inspiring species on the planet.</p></div>
              <span class="more"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                      xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"

                                      viewBox="0 0 65 65" style="enable-background:new 0 0 65 65;" xml:space="preserve"><g><g><path
                          d="M32.5,0C14.58,0,0,14.579,0,32.5S14.58,65,32.5,65S65,50.421,65,32.5S50.42,0,32.5,0z M32.5,61C16.785,61,4,48.215,4,32.5
			S16.785,4,32.5,4S61,16.785,61,32.5S48.215,61,32.5,61z"/><circle cx="33.018" cy="19.541" r="3.345"/><path d="M32.137,28.342c-1.104,0-2,0.896-2,2v17c0,1.104,0.896,2,2,2s2-0.896,2-2v-17C34.137,29.237,33.241,28.342,32.137,28.342z
			"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>



                            Details</span></a></li>
          <li data-category="1034,1035"><a href="/en/games/superhot/" class="link">
              <div class="bgr" style="background:url({{asset('storage/media/1108/superhot-1.png')}})"></div>
              <div class="cont"><h1>Superhot</h1>
                <p>Lose track of what’s real. Commit yourself, body and mind. Confront the evocative, elegantly brutal
                  world of SUPERHOT VR.</p></div>
              <span class="more"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                      xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"

                                      viewBox="0 0 65 65" style="enable-background:new 0 0 65 65;" xml:space="preserve"><g><g><path
                          d="M32.5,0C14.58,0,0,14.579,0,32.5S14.58,65,32.5,65S65,50.421,65,32.5S50.42,0,32.5,0z M32.5,61C16.785,61,4,48.215,4,32.5
			S16.785,4,32.5,4S61,16.785,61,32.5S48.215,61,32.5,61z"/><circle cx="33.018" cy="19.541" r="3.345"/><path d="M32.137,28.342c-1.104,0-2,0.896-2,2v17c0,1.104,0.896,2,2,2s2-0.896,2-2v-17C34.137,29.237,33.241,28.342,32.137,28.342z
			"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>



                            Details</span></a></li>
          <li data-category="1034,1035"><a href="/en/games/serious-sam-fusion-2017/" class="link">
              <div class="bgr" style="background:url({{asset('storage/media/1109/siruis-sam.png')}})"></div>
              <div class="cont"><h1>Serious Sam</h1>
                <p>Serious Sam is back! And this time it's REAL!</p></div>
              <span class="more"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                      xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"

                                      viewBox="0 0 65 65" style="enable-background:new 0 0 65 65;" xml:space="preserve"><g><g><path
                          d="M32.5,0C14.58,0,0,14.579,0,32.5S14.58,65,32.5,65S65,50.421,65,32.5S50.42,0,32.5,0z M32.5,61C16.785,61,4,48.215,4,32.5
			S16.785,4,32.5,4S61,16.785,61,32.5S48.215,61,32.5,61z"/><circle cx="33.018" cy="19.541" r="3.345"/><path d="M32.137,28.342c-1.104,0-2,0.896-2,2v17c0,1.104,0.896,2,2,2s2-0.896,2-2v-17C34.137,29.237,33.241,28.342,32.137,28.342z
			"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>



                            Details</span></a></li>
          <li data-category="1034,1035"><a href="/en/games/google-earth-vr/" class="link">
              <div class="bgr" style="background:url({{asset('storage/media/1110/google-earth.png')}})"></div>
              <div class="cont"><h1>Google Earth VR</h1>
                <p>Google Earth VR lets you explore the world from totally new perspectives in virtual reality.</p>
              </div>
              <span class="more"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                      xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"

                                      viewBox="0 0 65 65" style="enable-background:new 0 0 65 65;" xml:space="preserve"><g><g><path
                          d="M32.5,0C14.58,0,0,14.579,0,32.5S14.58,65,32.5,65S65,50.421,65,32.5S50.42,0,32.5,0z M32.5,61C16.785,61,4,48.215,4,32.5
			S16.785,4,32.5,4S61,16.785,61,32.5S48.215,61,32.5,61z"/><circle cx="33.018" cy="19.541" r="3.345"/><path d="M32.137,28.342c-1.104,0-2,0.896-2,2v17c0,1.104,0.896,2,2,2s2-0.896,2-2v-17C34.137,29.237,33.241,28.342,32.137,28.342z
			"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>



                            Details</span></a></li>
          <li data-category="1034,1035"><a href="/en/games/batman-arkham/" class="link">
              <div class="bgr" style="background:url({{asset('storage/media/1104/batman-1.png')}})"></div>
              <div class="cont"><h1>Batman Arkham</h1>
                <p>Experience Gotham City through the eyes of the World's Greatest Detective in an all new Arkham
                  mystery.</p></div>
              <span class="more"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                      xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"

                                      viewBox="0 0 65 65" style="enable-background:new 0 0 65 65;" xml:space="preserve"><g><g><path
                          d="M32.5,0C14.58,0,0,14.579,0,32.5S14.58,65,32.5,65S65,50.421,65,32.5S50.42,0,32.5,0z M32.5,61C16.785,61,4,48.215,4,32.5
			S16.785,4,32.5,4S61,16.785,61,32.5S48.215,61,32.5,61z"/><circle cx="33.018" cy="19.541" r="3.345"/><path d="M32.137,28.342c-1.104,0-2,0.896-2,2v17c0,1.104,0.896,2,2,2s2-0.896,2-2v-17C34.137,29.237,33.241,28.342,32.137,28.342z
			"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>



                            Details</span></a></li>
          <li data-category="1034,1035"><a href="/en/games/arizona-sunshine/" class="link">
              <div class="bgr" style="background:url({{asset('storage/media/1105/youtube-video-cover-1.png')}})"></div>
              <div class="cont"><h1>Arizona Sunshine</h1>
                <p>Built exclusively for VR, Arizona Sunshine puts you in the midst of a zombie apocalypse.</p></div>
              <span class="more"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                      xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"

                                      viewBox="0 0 65 65" style="enable-background:new 0 0 65 65;" xml:space="preserve"><g><g><path
                          d="M32.5,0C14.58,0,0,14.579,0,32.5S14.58,65,32.5,65S65,50.421,65,32.5S50.42,0,32.5,0z M32.5,61C16.785,61,4,48.215,4,32.5
			S16.785,4,32.5,4S61,16.785,61,32.5S48.215,61,32.5,61z"/><circle cx="33.018" cy="19.541" r="3.345"/><path d="M32.137,28.342c-1.104,0-2,0.896-2,2v17c0,1.104,0.896,2,2,2s2-0.896,2-2v-17C34.137,29.237,33.241,28.342,32.137,28.342z
			"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>



                            Details</span></a></li>
          <li data-category="1034"><a href="/en/games/gnomes-goblins/" class="link">
              <div class="bgr" style="background:url({{asset('storage/media/1111/gnomes-and-goblins.png')}})"></div>
              <div class="cont"><h1>Gnomes &amp; Goblins</h1>
                <p>Explore the interactive fantasy world of Gnomes &amp; Goblins from Jon Favreau, produced by Wevr in
                  collaboration with Reality One.</p></div>
              <span class="more"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                      xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"

                                      viewBox="0 0 65 65" style="enable-background:new 0 0 65 65;" xml:space="preserve"><g><g><path
                          d="M32.5,0C14.58,0,0,14.579,0,32.5S14.58,65,32.5,65S65,50.421,65,32.5S50.42,0,32.5,0z M32.5,61C16.785,61,4,48.215,4,32.5
			S16.785,4,32.5,4S61,16.785,61,32.5S48.215,61,32.5,61z"/><circle cx="33.018" cy="19.541" r="3.345"/><path d="M32.137,28.342c-1.104,0-2,0.896-2,2v17c0,1.104,0.896,2,2,2s2-0.896,2-2v-17C34.137,29.237,33.241,28.342,32.137,28.342z
			"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>



                            Details</span></a></li>
          <li data-category="1034,1035"><a href="/en/games/tilt-brush/" class="link">
              <div class="bgr" style="background:url({{asset('storage/media/1113/tilt-brush.png')}})"></div>
              <div class="cont"><h1>Tilt Brush</h1>
                <p>Tilt Brush lets you paint in 3D space with virtual reality.</p></div>
              <span class="more"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                      xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"

                                      viewBox="0 0 65 65" style="enable-background:new 0 0 65 65;" xml:space="preserve"><g><g><path
                          d="M32.5,0C14.58,0,0,14.579,0,32.5S14.58,65,32.5,65S65,50.421,65,32.5S50.42,0,32.5,0z M32.5,61C16.785,61,4,48.215,4,32.5
			S16.785,4,32.5,4S61,16.785,61,32.5S48.215,61,32.5,61z"/><circle cx="33.018" cy="19.541" r="3.345"/><path d="M32.137,28.342c-1.104,0-2,0.896-2,2v17c0,1.104,0.896,2,2,2s2-0.896,2-2v-17C34.137,29.237,33.241,28.342,32.137,28.342z
			"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>



                            Details</span></a></li>
          <li data-category="1034,1035"><a href="/en/games/fruit-ninja-vr/" class="link">
              <div class="bgr" style="background:url({{asset('storage/media/1116/fruit-ninja.png')}})"></div>
              <div class="cont"><h1>Fruit Ninja VR</h1>
                <p>Step inside the Fruit Ninja universe and experience a slice of virtual reality like never before.
                  Play Fruit Ninja VR now!</p></div>
              <span class="more"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                      xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"

                                      viewBox="0 0 65 65" style="enable-background:new 0 0 65 65;" xml:space="preserve"><g><g><path
                          d="M32.5,0C14.58,0,0,14.579,0,32.5S14.58,65,32.5,65S65,50.421,65,32.5S50.42,0,32.5,0z M32.5,61C16.785,61,4,48.215,4,32.5
			S16.785,4,32.5,4S61,16.785,61,32.5S48.215,61,32.5,61z"/><circle cx="33.018" cy="19.541" r="3.345"/><path d="M32.137,28.342c-1.104,0-2,0.896-2,2v17c0,1.104,0.896,2,2,2s2-0.896,2-2v-17C34.137,29.237,33.241,28.342,32.137,28.342z
			"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>



                            Details</span></a></li>
          <li data-category="1034,1035"><a href="/en/games/locked-in-vr/" class="link">
              <div class="bgr" style="background:url({{asset('storage/media/1123/locked-in-vr.png')}})"></div>
              <div class="cont"><h1>Locked In VR</h1>
                <p>Locked In VR is an escape room type experience.</p></div>
              <span class="more"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                      xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"

                                      viewBox="0 0 65 65" style="enable-background:new 0 0 65 65;" xml:space="preserve"><g><g><path
                          d="M32.5,0C14.58,0,0,14.579,0,32.5S14.58,65,32.5,65S65,50.421,65,32.5S50.42,0,32.5,0z M32.5,61C16.785,61,4,48.215,4,32.5
			S16.785,4,32.5,4S61,16.785,61,32.5S48.215,61,32.5,61z"/><circle cx="33.018" cy="19.541" r="3.345"/><path d="M32.137,28.342c-1.104,0-2,0.896-2,2v17c0,1.104,0.896,2,2,2s2-0.896,2-2v-17C34.137,29.237,33.241,28.342,32.137,28.342z
			"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>



                            Details</span></a></li>
          <li data-category="1034,1035"><a href="/en/games/raw-data/" class="link">
              <div class="bgr" style="background:url({{asset('storage/media/1119/raw-data.png')}})"></div>
              <div class="cont"><h1>Raw Data</h1>
                <p>Built from the ground up for VR, Raw Data’s action gameplay, intuitive controls, challenging enemies,
                  and sci-fi atmosphere will completely immerse you within the surreal world of Eden Corp.</p></div>
              <span class="more"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                      xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"

                                      viewBox="0 0 65 65" style="enable-background:new 0 0 65 65;" xml:space="preserve"><g><g><path
                          d="M32.5,0C14.58,0,0,14.579,0,32.5S14.58,65,32.5,65S65,50.421,65,32.5S50.42,0,32.5,0z M32.5,61C16.785,61,4,48.215,4,32.5
			S16.785,4,32.5,4S61,16.785,61,32.5S48.215,61,32.5,61z"/><circle cx="33.018" cy="19.541" r="3.345"/><path d="M32.137,28.342c-1.104,0-2,0.896-2,2v17c0,1.104,0.896,2,2,2s2-0.896,2-2v-17C34.137,29.237,33.241,28.342,32.137,28.342z
			"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>



                            Details</span></a></li>
          <li data-category="1035,1034"><a href="/en/games/the-lab/" class="link">
              <div class="bgr" style="background:url({{asset('storage/media/1120/the-lab.png')}})"></div>
              <div class="cont"><h1>The Lab</h1>
                <p>Welcome to The Lab, a compilation of Valve’s room-scale VR experiments set in a pocket universe
                  within Aperture Science.</p></div>
              <span class="more"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                      xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"

                                      viewBox="0 0 65 65" style="enable-background:new 0 0 65 65;" xml:space="preserve"><g><g><path
                          d="M32.5,0C14.58,0,0,14.579,0,32.5S14.58,65,32.5,65S65,50.421,65,32.5S50.42,0,32.5,0z M32.5,61C16.785,61,4,48.215,4,32.5
			S16.785,4,32.5,4S61,16.785,61,32.5S48.215,61,32.5,61z"/><circle cx="33.018" cy="19.541" r="3.345"/><path d="M32.137,28.342c-1.104,0-2,0.896-2,2v17c0,1.104,0.896,2,2,2s2-0.896,2-2v-17C34.137,29.237,33.241,28.342,32.137,28.342z
			"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>



                            Details</span></a></li>
        </ul>
        <ul class="sorted"></ul>
      </div>
      <div class="other-games"><a href="/en/games/">Other games</a></div>
    </div>
  </div>
</div>
<div class="section" id="prices" style="background:url({{asset('storage/media/1041/qiymet.png')}})">
  <div class="content prices-r">
    <div class="container-fluid"><h1 class="heading">Prices</h1>
      <div class="prices prices-slider carousel">
        <div class="carousel-cell single-photo">
          <div class="gray-bgr">
            <div class="bgr-img" style="background: url({{asset('storage/media/1087/aparatlar.png')}})"></div>
          </div>
          <div class="purple-bgr main-container">
            <div class="pics">
              <div class="single-img"><img src="{{asset('storage/media/1087/htc-1.png')}}" alt=""></div>
            </div>
            <div class="cont"><h1>Weekdays</h1>
              <div class="p"><h2></h2>
                <h2>12pm - 6pm / 6pm - 12am</h2>
                <p>Calculating Cost Based On 15 Minute</p></div>
              <div class="price-items">
                <ul>
                  <li><span class="price">10/15 <sup>azn</sup></span><span class="descr"><p>HTC Vive</p></span></li>
                  <li><span class="price">15/15 <sup>azn</sup></span><span class="descr"><p>3 DOF </p></span></li>
                  <li><span class="price">8/10 <sup>azn</sup></span><span class="descr"><p>PlayStation VR</p></span>
                  </li>
                  <li><span class="price">10/15 <sup>azn</sup></span><span class="descr"><p>Oculus Rift</p></span></li>
                </ul>
              </div>
              <div class="text-right"><a href="javascript:void(0)" class="price-reserve open-form"
                                         data-toggle="reservation-popup">Reservation</a></div>
            </div>
          </div>
        </div>
        <div class="carousel-cell single-photo">
          <div class="gray-bgr">
            <div class="bgr-img" style="background: url({{asset('storage/media/1295/omni_background.png')}})"></div>
          </div>
          <div class="purple-bgr main-container">
            <div class="pics">
              <div class="single-img"><img src="{{asset('storage/media/1295/virtuix-1.png')}}" alt=""></div>
            </div>
            <div class="cont"><h1>Omni Virtuix</h1>
              <div class="p"><p>Weekdays 12pm-6pm/6pm-12am</p></div>
              <div class="price-items">
                <ul>
                  <li><span class="price">8/10 <sup>azn</sup></span><span class="descr"><p>5 min</p></span></li>
                  <li><span class="price">15/18 <sup>azn</sup></span><span class="descr"><p>10 min</p></span></li>
                  <li><span class="price">25/30 <sup>azn</sup></span><span class="descr"><p>20 min</p></span></li>
                </ul>
              </div>
              <div class="text-right"><a href="javascript:void(0)" class="price-reserve open-form"
                                         data-toggle="reservation-popup">Reservation</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="section about-section-overflow" id="about"
     style="background:url({{asset('storage/media/1049/cosmos_ready.jpg')}})">
  <div class="vr-info-bgr" style="background: url({{asset('storage/media/1051/vr-nedir.jpg')}})"></div>
  <div class="content about-r">
    <div class="container-fluid ">
      <div class="row vr-switch"><h3>WHAT IS VR?</h3><label class="switch float-right section-change"><input
              type="checkbox"><span class="slider round"></span></label>
        <h3>ABOUT US</h3></div>
      <div class="row about-container"><h1 class="heading">ABOUT US</h1>
        <div class="row">
          <div class="col-md-50 about-column">
            <div class="p"><p><br/>
                Virtual Reality is not just the beginning of a new stage in the development of the entertainment
                industry.<br/><br/>
                Today VR is a serious and large business. Virtual Reality radically changes the process of the game,
                dipping into a three-dimensional space, immerses the inside of the game, at the center of all events.
                For this, of course, special equipment is used. Despite the fact that relatively simple device models
                are already on the market, such irreplaceable models for full immersion as Omnia Virtuix, Roto and VR
                Cinema are presented only in Phobia VR.<br/><br/>
                Also, you can immerse yourself in Virtual Reality through PlayStation VR, HTC Vive, Oculus Rift and
                other our devices.</p></div>
          </div>
          <div class="col-md-50">
            <div class="about-carousel youtube-player-carousel white-dots">
              <div class="carousel-cell">
                <div class="thumb" data-player="player0"
                     style="background: url({{asset('storage/media/1077/betatest-bitdi-1.png')}})"></div>
                <div class="player-block" id="player0" data-id="gubKqCfLOBg"></div>
              </div>
              <div class="carousel-cell">
                <div class="thumb" data-player="player1"></div>
                <div class="player-block" id="player1" data-id="D_h7RHl9yB8"></div>
              </div>
            </div>
          </div>
          <div class="col-xs-100">
            <div class="about-gallery">
              <div class="screens-slider owl-carousel owl-theme"></div>
            </div>
          </div>
          <div class="col-xs-100">
            <div class="partners">
              <div class="partners-slider owl-carousel owl-theme">
                <div class="item"><img src="{{asset('storage/media/1049/a.png')}}" alt=""></div>
                <div class="item"><img src="{{asset('storage/media/1049/htc.png')}}" alt=""></div>
                <div class="item"><img src="{{asset('storage/media/1049/omni.png')}}" alt=""></div>
                <div class="item"><img src="{{asset('storage/media/1049/playstation.png')}}" alt=""></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row vr-info">
        <div class="content">
          <div class="container-fluid">
            <div class="col-md-50">
              <div class="vr-carousel white-dots youtube-player-carousel">
                <div class="carousel-cell">
                  <div class="thumb" data-player="vr0"></div>
                  <div class="player-block" id="vr0" data-id="nFLSjv2GkDU"></div>
                </div>
                <div class="carousel-cell">
                  <div class="thumb" data-player="vr1"></div>
                  <div class="player-block" id="vr1" data-id="6Bw08c0h7vE"></div>
                </div>
              </div>
              <div class="owl-theme">
                <div id="custom-dots2" class="owl-dots "></div>
              </div>
            </div>
            <div class="col-md-50 vr-info-col"><h1 class="heading">WHAT IS VR?</h1>
              <div class="p vr-column"><p><br/>
                  Virtual reality is a computer-generated simulation of a three-dimensional image or environment that
                  can be interacted with in a seemingly real or physical way by a person using special electronic
                  equipment, such as a helmet with a screen inside or gloves fitted with sensors.</p></div>
            </div>
            <div class="col-xs-100">
              <div class="vr-gallery ">
                <div class="screens-slider owl-carousel owl-theme">
                  <div class="item"><a data-fancybox="gallery" href="{{asset('storage/media/1051/oculus-1.png')}}"><img
                          src="{{asset('storage/media/1051/oculus-1.png')}}"></a></div>
                  <div class="item"><a data-fancybox="gallery" href="{{asset('storage/media/1051/htc-1.png')}}"><img
                          src="{{asset('storage/media/1051/htc-1.png')}}"></a></div>
                  <div class="item"><a data-fancybox="gallery"
                                       href="{{asset('storage/media/1051/playstation.png')}}"><img
                          src="{{asset('storage/media/1051/playstation.png')}}"></a></div>
                  <div class="item"><a data-fancybox="gallery" href="{{asset('storage/media/1051/virtuix.png')}}"><img
                          src="{{asset('storage/media/1051/virtuix.png')}}"></a></div>
                  <div class="item"><a data-fancybox="gallery" href="{{asset('storage/media/1051/3dof.png')}}"><img
                          src="{{asset('storage/media/1051/3dof.png')}}"></a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="section" id="blog" style="background:url({{asset('storage/media/1039/backgroundblack-1.png')}})">
  <div class="blog-r">
    <div class="content ">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-100"><h1 class="heading">Blog</h1>
            <div class="p"><p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue
                leo eget malesuada. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec sollicitudin
                molestie malesuada. Sed porttitor lectus nibh. Curabitur aliquet quam id dui posuere blandit. Vivamus
                magna justo, lacinia eget consectetur sed, convallis at tellus. Donec sollicitudin molestie malesuada.
                Nulla porttitor accumsan tincidunt. Vivamus magna justo, lacinia eget consectetur sed, convallis at
                tellus.</p></div>
          </div>
        </div>
        <div class="blog-mobile">
          <div class="blog-mobile-item">
            <div class="bm_item-brg" style="background: url('');"></div>
            <div class="left-cont" style="background: url('');">
              <div class="cont"><h1>Pages</h1>
                <h3></h3><a href="/ronin/page/" class="more">Learn More</a></div>
            </div>
          </div>
          <div class="blog-mobile-item">
            <div class="bm_item-brg" style="background: url({{asset('storage/media/1040/img_0500.png')}});"></div>
            <div class="left-cont" style="background: url({{asset('storage/media/1040/img_0064.png')}});">
              <div class="cont"><h1>BETA TEST</h1>
                <h3></h3>
                <p>Phobia VR mərkəzində ilk Beta Test tədbiri.</p><a href="/en/blog/blog-item-1/" class="more">Learn
                  More</a></div>
            </div>
          </div>
          <div class="blog-mobile-item">
            <div class="bm_item-brg"
                 style="background: url({{asset('storage/media/1079/26170573_1945831929077539_2101572738774551135_o-2.jpg')}});"></div>
            <div class="left-cont" style="background: url({{asset('storage/media/1079/phobia.png')}});">
              <div class="cont"><h1>GIFT CARD</h1>
                <h3></h3>
                <p style="margin-left:0cm;margin-right:0cm;">PHOBIA VR-dan HƏDİYYƏ KARTI!<br/>
                  Fərqli hədiyyə axtarışında olanlar üçün yenilik!</p><a href="/en/blog/giftcard/" class="more">Learn
                  More</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="blog-slider carousel">
      <div class="carousel-cell">
        <div class="abs-bgr" style="background: url({{asset('storage/media/1040/img_0500.png')}});"></div>
        <div class="bgr-right" style="background: url({{asset('storage/media/1040/img_0064.png')}});">
          <div class="cont"><h1>BETA TEST</h1>
            <h3></h3>
            <p>Phobia VR mərkəzində ilk Beta Test tədbiri.</p>
            <div><a href="/en/blog/blog-item-1/" class="more">Learn More</a></div>
          </div>
        </div>
      </div>
      <div class="carousel-cell">
        <div class="abs-bgr"
             style="background: url({{asset('storage/media/1079/26170573_1945831929077539_2101572738774551135_o-2.jpg')}});"></div>
        <div class="bgr-right" style="background: url({{asset('storage/media/1079/phobia.png')}});">
          <div class="cont"><h1>GIFT CARD</h1>
            <h3></h3>
            <p style="margin-left:0cm;margin-right:0cm;">PHOBIA VR-dan HƏDİYYƏ KARTI!<br/>
              Fərqli hədiyyə axtarışında olanlar üçün yenilik!</p>
            <div><a href="/en/blog/giftcard/" class="more">Learn More</a></div>
          </div>
        </div>
      </div>
      <div class="carousel-cell">
        <div class="abs-bgr"
             style="background: url({{asset('storage/media/1082/28516258_1982322248761840_2802701162458151512_o.jpg')}});"></div>
        <div class="bgr-right"
             style="background: url({{asset('storage/media/1082/28516258_1982322248761840_2802701162458151512_o-1.jpg')}});">
          <div class="cont"><h1>AD GÜNÜ PHOBIA VR&#039;da</h1>
            <h3></h3>
            <p>Virtual reallıqda ən unudulmaz Ad Gününüzü keçirin!<br/>
              Fərqliliyi seçin və Phobia VR ilə inanılmaz anlar yaşayın!</p>
            <div><a href="/en/blog/birthday/" class="more">Learn More</a></div>
          </div>
        </div>
      </div>
      <div class="carousel-cell">
        <div class="abs-bgr"
             style="background: url({{asset('storage/media/1080/28701223_1990169044643827_2707816845758248642_o.jpg')}});"></div>
        <div class="bgr-right"
             style="background: url({{asset('storage/media/1080/28701223_1990169044643827_2707816845758248642_o-1.jpg')}});">
          <div class="cont"><h1>GencOl</h1>
            <h3></h3>
            <p>Oyun həvəskarları üçün Phobia VR'dan 1+1 aksiyası!</p>
            <div><a href="/en/blog/blog-item-1-1-1/" class="more">Learn More</a></div>
          </div>
        </div>
      </div>
      <div class="carousel-cell">
        <div class="abs-bgr"
             style="background: url({{asset('storage/media/1081/22519819_1959353607725371_2299137423317960711_o.jpg')}});"></div>
        <div class="bgr-right"
             style="background: url({{asset('storage/media/1081/22519819_1959353607725371_2299137423317960711_o-1.jpg')}});">
          <div class="cont"><h1>Crazy Minutes</h1>
            <h3></h3>
            <p>Həftə içi!<br/>
              Phobia VR'dan əlavə oyun dəqiqələri!</p>
            <div><a href="/en/blog/blog-item-1-1-1-1/" class="more">Learn More</a></div>
          </div>
        </div>
      </div>
    </div>
    <div class="all-news-footer"><a href="/en/blog/" class="all-news">All news</a></div>
  </div>
</div>
<div class="section contact-section" id="contact"
     style="background: url({{asset('storage/media/1055/contact-us.jpg')}})">
  <div class="content-sm content contact-r">
    <div class="container-fluid">
      <div class="row ">
        <div class="col-md-50">
          <div class="header right-padding-100"><h1 class="heading">CONTACTS</h1>
            <div class="p"><p>For further information, cooperation or career in Phobia project don't hesitate to contact
                us!</p></div>
            <ul class="contacts">
              <li><a href="#"><img src="{{asset('storage/media/1084/smartphone-call-4.svg')}}" alt=""><span><p><strong>+994 50 777 666 3</strong></p></span></a>
              </li>
              <li><a href="#"><img src="{{asset('storage/media/1303/envelope-1.svg')}}"
                                   alt=""><span><p>sales@phobiavr.az</p></span></a></li>
              <li><a href="#"><img src="{{asset('storage/media/1305/placeholder.svg')}}" alt=""><span><p>Nizami street 42, Nargiz Mall</p></span></a>
              </li>
            </ul>
            <div>
              <ul class="social">
                <li><a href="http://facebook.com/phobiavr" target="_blank"
                       style="background: url({{asset('storage/media/1086/facebook-app-logo.svg')}})"></a></li>
                <li><a href="http://instagram.com/phobiavr" target="_blank"
                       style="background: url({{asset('storage/media/1100/instagram-1.svg')}})"></a></li>
                <li><a href="https://t.me/phobiavr" target="_blank"
                       style="background: url({{asset('storage/media/1302/telegram-logo.svg')}})"></a></li>
                <li><a href="https://www.youtube.com/channel/UChzO21NKoy4ruF8PKKPLQnQ" target="_blank"
                       style="background: url({{asset('storage/media/1304/youtube-symbol.svg')}})"></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-50">
          <div class="header text-right left-padding-100"><h1 class="heading">BOOK NOW</h1>
            <div class="p"><p>For those who are ready to experience virtual reality world Reservation is
                recommended.</p></div>
            <form action="/en/" method="post" class="reservation-form" autocomplete="off">
              <div><input type="text" name="fullname" class="form-field" placeholder="Name, Surname"></div>
              <div><input type="text" name="email" class="form-field" placeholder="E-mail address"></div>
              <div><input type="text" name="phone" class="form-field phone" placeholder="Contact number"></div>
              <div><textarea class="form-field" name="message" id="" cols="30" rows="3"
                             placeholder="Contact me"></textarea></div>
              <input type="hidden" name="type" value="contact"/><input type="hidden" id="_post_token"
                                                                       name="TOKEN1971673451X1594578299"
                                                                       value="XA3ubOrF.PmR6MTEY0bRP/.w6szf9T50"/>
              <div class="form-footer">
                <div style="    font-size: 13px;">

                  * To register, you must fill in all fields
                </div>
                <div class="">
                  <button type="submit" class="btn submit-btn">Send</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="map-shadow"></div>
  </div>
  <div id="map"

       data-address="baku"

       data-lat="40.3717603"

       data-lng="49.8376062"

       data-zoom="12"></div>
  <footer class="footer">
    <div class="footer-content">
      <div class="container-fluid">
        <ul>
          <li><a href="/en/legacy/" target="_blank">Legacy</a></li>
        </ul>
        <span class="cp">&copy; All rights reserved 2020&nbsp</span><span class="cp">Powered by PhobiaVR</span></div>
    </div>
  </footer>
</div>
<div class="popup" id="reservation-popup"><span class="closer"></span>
  <div class="cont"><h1>Reservation</h1>
    <form method="post" action="/en/" class="reservation-form-popup" autocomplete="off">
      <div><input type="text" name="ffullname" class="form-field" placeholder="Ad, Soyad"></div>
      <div><input type="text" name="femail" class="form-field" placeholder="E-mail ünvan"></div>
      <div><input type="text" name="fphone" class="form-field phone" placeholder="Əlaqə nömrəsi"></div>
      <div><textarea class="form-field" name="fmessage" id="" cols="30" rows="3"
                     placeholder="Mənimlə əlaqə saxlayın"></textarea></div>
      <input type="hidden" name="type" value="reserving"/><input type="hidden" id="_post_token"
                                                                 name="TOKEN1971673451X1594578299"
                                                                 value="XA3ubOrF.PmR6MTEY0bRP/.w6szf9T50"/>
      <div class="form-footer">
        <div style="    font-size: 13px;">
          * Qeydiyyat üçün bütün xanaları doldurmağınız vacibdir.
        </div>
        <div class="">
          <button class="btn submit-btn">Göndər</button>
        </div>
      </div>
    </form>
    <div class="p success"></div>
  </div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7Lj4kKKukuKfqIvHws8heYE4bqsFLbRo"
        type="text/javascript"></script>
<script src="https://www.youtube.com/iframe_api"></script>

<script src="{{asset('libs/jquery.min.js')}}"></script>
<script src="{{asset('libs/fullpage/jquery.fullpage.min.js')}}"></script>
<script src="{{asset('libs/swiper/js/swiper.min.js')}}"></script>
<script src="{{asset('libs/fancyapps/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('libs/owl/owl.carousel.min.js')}}"></script>
<script src="{{asset('libs/flickity/flickity.pkgd.min.js')}}"></script>
<script src="{{asset('libs/rateyo/jquery.rateyo.min.js')}}"></script>
<script src="{{asset('libs/scroll/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('libs/jquery.mask.min.js')}}"></script>
<script src="{{asset('libs/smooth-scroll.min.js')}}"></script>
<script src="{{asset('libs/gumshoe.min.js')}}"></script>
<script src="{{asset('libs/scrollreveal.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>


</body>
</html>