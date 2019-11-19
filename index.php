<?php require 'header.php';?>
<title>sports</title>
<script>
var TxtType = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 2000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtType.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

        var that = this;
        var delta = 200 - Math.random() * 100;

        if (this.isDeleting) { delta /= 2; }

        if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
        }

        setTimeout(function() {
        that.tick();
        }, delta);
    };

    window.onload = function() {
        var elements = document.getElementsByClassName('typewrite');
        for (var i=0; i<elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
              new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
        document.body.appendChild(css);
    };
</script>
</head>

<body data-spy="scroll" data-target="#navbarMenu">
    <?php require_once 'navbar.php';?>
   <div class="for-hero-image">
   <h1 class="hero-text">Welcome!!!<span style="position:relative;color:black;font-weight:700;left:10px;" class="typewrite" data-period="2000" data-type='[ "All Sports Lover.", "All Cricket Lover.", "All Football Lover." ]'></span>
   </h1>  <img src="./images/heroImage.png" alt="">
   </div>

<!--    <div style="display:block;">
      <p>
         evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae
         voluptatibus.

         Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque
         et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus
         repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.

         Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque
         et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus
     ,    repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.

         Some text to enable scrollng.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque
         et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus
         repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.

         Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque
         et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus
         repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.

         Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque
         et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus
         repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.

         Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque
         et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus
         repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.
      </p>
   </div>-->
 
   <div style="padding:0px;margin:0px;color:black;">
      <hr>
   </div>
   <div class="row" style="padding:20px;background-color:#e4decd;font-weight:900;">
      <div class="col-md-4 col-lg-3 mx-auto my-md-4 my-0 mt-4 mb-1">

         <!-- Contact details -->
         <h4 class="font-weight-bold text-uppercase mb-4">Address</h4>

         <ul class="list-unstyled">
            <li>
               <p>
               <i class="fa fa-home" style="font-size:24px"></i><span style="padding-left:5px;"> Balaju-5, Kathmandu, Nepal</span></p>
            </li>
            <li>
               <p>
               <i class="fa fa-envelope" style="font-size:24px"></i><span style="padding-left:5px;"> sportsnepal@gmail.com</span></p>
            </li>
            <li>
               <p>
               <i class="fa fa-phone" style="font-size:24px"></i><span style="padding-left:5px;"> + 01 233 252 502</span></p>
            </li>
            
         </ul>

      </div>
      <div class="col-md-4 col-lg-3 mx-auto my-md-4 my-0 mt-4 mb-1">

         <!-- Contact details -->
         <h4 class="font-weight-bold text-uppercase mb-4">follow us</h4>

         <ul class="list-unstyled">
            <li>
               <p>
            <a href="#" class="fa fa-facebook" style="font-size:24px;"><span style="padding-left:5px;">facebook</span></a></p>

            </li>
            <li>
               <p>
            <a href="#" class="fa fa-twitter" style="font-size:24px;"><span style="padding-left:5px;">twitter</span></a></p>
            </li>
            <li>
               <p>
            <a href="#" class="fa fa-google"style="font-size:24px;"><span style="padding-left:5px;">instagram</span></a></p>
            </li>
            
         </ul>

      </div>
   </div>
   <div class="for-footer">
      <h2>sportsnepal.com,copyright&copy2019</h2>
      <a href="login.php"><button type="button">Admin Login</button></a>
   </div> 
   <?php require 'footer.php';?>