<?php
require 'start_html.php';
$dispo_offline = TRUE;
?>

<!--
Styles CSS
-->

<style type="text/css">
@font-face { font-family: Gothic; src: url('http://goujon.globalis-dev.com/jean/formage_vieille/html5_css3/font/Gothic.TTF'); }

.logo {
width: 400px; height: 400px;
border-radius: 50%;
background: #003764;
background-image: -webkit-linear-gradient(#003764, #3c87c8 50%, #003764);
background-image: -moz-linear-gradient(#003764, #3c87c8 50%, #003764);
-webkit-transform: rotate(0deg) scale(0.5) skew(0deg) translate(0);
-webkit-transition: all 0.5s linear 0;
}

.logo:hover {
-webkit-transform: rotate(0deg) scale(0.97) skew(0deg) translate(0);
-webkit-animation-name: anim_logo_pulsation;
-webkit-animation-duration: 1.5s;
-webkit-animation-iteration-count: infinite;
-webkit-animation-direction: normal;
-webkit-animation-timing-function: ease-in-out;
-webkit-animation-fill-mode: forwards;
-webkit-animation-delay: 0.5s;
}

@-webkit-keyframes anim_logo_pulsation {
    0% {
        -webkit-transform: rotate(0deg) scale(0.97) skew(0deg) translate(0);
        box-shadow: 0 0 30px rgba(200,0,0,0);
    }

    1% {
        -webkit-transform: rotate(0deg) scale(1) skew(0deg) translate(0);
        box-shadow: 0 0 30px rgba(200,0,0,1);
    }

    20% {
        -webkit-transform: rotate(0deg) scale(0.97) skew(0deg) translate(0);
        box-shadow: 0 0 30px rgba(200,0,0,0);
    }

    30% {
        -webkit-transform: rotate(0deg) scale(1) skew(0deg) translate(0);
        box-shadow: 0 0 30px rgba(200,0,0,1);
    }

    100% {
        -webkit-transform: rotate(0deg) scale(0.97) skew(0deg) translate(0);
        box-shadow: 0 0 30px rgba(200,0,0,0);
    }
}

.logo_reflet {
width: 98%; height: 98%;
position: relative;
top: 1%;
left: 1%;
border-radius: 50%;
background-color: #003764;
background-image: -webkit-radial-gradient(center 12%, circle, rgba(255, 255, 255, 0.1) 206px, transparent 210px),
                  -webkit-radial-gradient(center bottom, circle, rgba(255, 255, 255, 0.05) 206px, transparent 250px),
                  -webkit-linear-gradient(#003764, #3c87c8 50%, #003764);

background-image: -moz-radial-gradient(center 12%, circle, rgba(255, 255, 255, 0.1) 206px, transparent 210px),
                  -moz-radial-gradient(center bottom, circle, rgba(255, 255, 255, 0.05) 206px, transparent 250px),
                  -moz-linear-gradient(#003764, #3c87c8 50%, #003764);
box-shadow: 0 0 100px rgba(255, 255, 255, 0.5) inset; /* Petit truc en plus qui rend classe */
}

.logo_g {
font-family: "Gothic", sans-serif; /* Police custom :p */
color: #fff;
font-size: 29em;
line-height: 370px; /* Centrage de la lettre en hauteur */
margin-left: 25px; /* Centrage de la lettre en largeur */
text-shadow: 0 0 2px #fff; /* petit anti-aliasing pour chrome (safari??) */
}

.g_div {
position: absolute;
}

.g_div1 {
width: 60%; height: 60%;
border-radius: 50%;
background: transparent;
border-width: 28px;
border-style: solid;
border-color: #fff transparent #fff #fff;
top: 13%;
left: 12%;
-webkit-transform: rotate(-45deg);
-moz-transform: rotate(-45deg);
}

.g_div4 {
width: 60%; height: 60%;
border-radius: 50%;
background: transparent;
border-width: 28px;
border-style: solid;
border-color: #fff transparent #fff #fff;
top: 13%;
left: 12%;
-webkit-transform: rotate(-20deg);
-moz-transform: rotate(-20deg);
}

.g_div2 {
width: 60%; height: 60%;
border-radius: 50%;
background: transparent;
border-width: 28px;
border-style: solid;
border-color: #fff transparent transparent transparent;
top: 13%;
left: 12%;
}

.g_div3 {
width: 95px; height: 28px;
background: rgba(255, 255, 255, 1);
top: 50%;
left: 56%;
}
</style>

<!--
Code HTML
-->

<header class="local">
    <h2>CSS3</h2>
</header>

<section id="content" class="clearfix">
    Un beau logo Globalis tout en CSS3 ^^ (ne fonctionne que sur Chrome et Firefox pr le moment)
    <br/><br/>
    Sans police :
    <div class="logo">
        <div class="logo_reflet">
            <div class="g_div g_div1"></div>
            <div class="g_div g_div2"></div>
            <div class="g_div g_div4"></div>
            <div class="g_div g_div3"></div>
            <!--<span class="logo_g">G</span>-->
        </div>
    </div>
    <br/><br/>
    Avec police :
    <div class="logo">
        <div class="logo_reflet">
            <span class="logo_g">G</span>
        </div>
    </div>
</section>

<section id="complement">
    Code html des logos :
    <pre class="brush: php;">
Sans police :
&lt;div class="logo"&gt;
    &lt;div class="logo_reflet"&gt;
        &lt;div class="g_div g_div1"&gt;&lt;/div&gt;
        &lt;div class="g_div g_div2"&gt;&lt;/div&gt;
        &lt;div class="g_div g_div4"&gt;&lt;/div&gt;
        &lt;div class="g_div g_div3"&gt;&lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;

&lt;br/&gt;&lt;br/&gt;

Avec police :
&lt;div class="logo"&gt;
    &lt;div class="logo_reflet"&gt;
        &lt;span class="logo_g"&gt;G&lt;/span&gt;
    &lt;/div&gt;
&lt;/div&gt;
    </pre>

    <br/>

    Code CSS des logos :
    <pre class="brush: css;">
@font-face { font-family: Gothic; src: url('http://goujon.globalis-dev.com/jean/formage_vieille/html5_css3/font/Gothic.TTF'); }

.logo {
width: 400px; height: 400px;
border-radius: 50%;
background: #003764;
background-image: -webkit-linear-gradient(#003764, #3c87c8 50%, #003764);
background-image: -moz-linear-gradient(#003764, #3c87c8 50%, #003764);
-webkit-transform: rotate(0deg) scale(0.5) skew(0deg) translate(0);
-webkit-transition: all 0.5s linear 0;
}

.logo:hover {
-webkit-transform: rotate(0deg) scale(0.97) skew(0deg) translate(0);
-webkit-animation-name: anim_logo_pulsation;
-webkit-animation-duration: 1.5s;
-webkit-animation-iteration-count: infinite;
-webkit-animation-direction: normal;
-webkit-animation-timing-function: ease-in-out;
-webkit-animation-fill-mode: forwards;
-webkit-animation-delay: 0.5s;
}

@-webkit-keyframes anim_logo_pulsation {
    0% {
        -webkit-transform: rotate(0deg) scale(0.97) skew(0deg) translate(0);
        box-shadow: 0 0 30px rgba(200,0,0,0);
    }

    1% {
        -webkit-transform: rotate(0deg) scale(1) skew(0deg) translate(0);
        box-shadow: 0 0 30px rgba(200,0,0,1);
    }

    20% {
        -webkit-transform: rotate(0deg) scale(0.97) skew(0deg) translate(0);
        box-shadow: 0 0 30px rgba(200,0,0,0);
    }

    30% {
        -webkit-transform: rotate(0deg) scale(1) skew(0deg) translate(0);
        box-shadow: 0 0 30px rgba(200,0,0,1);
    }

    100% {
        -webkit-transform: rotate(0deg) scale(0.97) skew(0deg) translate(0);
        box-shadow: 0 0 30px rgba(200,0,0,0);
    }
}

.logo_reflet {
width: 98%; height: 98%;
position: relative;
top: 1%;
left: 1%;
border-radius: 50%;
background-color: #003764;
background-image: -webkit-radial-gradient(center 12%, circle, rgba(255, 255, 255, 0.1) 206px, transparent 210px),
                  -webkit-radial-gradient(center bottom, circle, rgba(255, 255, 255, 0.05) 206px, transparent 250px),
                  -webkit-linear-gradient(#003764, #3c87c8 50%, #003764);

background-image: -moz-radial-gradient(center 12%, circle, rgba(255, 255, 255, 0.1) 206px, transparent 210px),
                  -moz-radial-gradient(center bottom, circle, rgba(255, 255, 255, 0.05) 206px, transparent 250px),
                  -moz-linear-gradient(#003764, #3c87c8 50%, #003764);
box-shadow: 0 0 100px rgba(255, 255, 255, 0.5) inset; /* Petit truc en plus qui rend classe */
}

.logo_g {
font-family: "Gothic", sans-serif; /* Police custom :p */
color: #fff;
font-size: 29em;
line-height: 370px; /* Centrage de la lettre en hauteur */
margin-left: 25px; /* Centrage de la lettre en largeur */
text-shadow: 0 0 2px #fff; /* petit anti-aliasing pour chrome (safari??) */
}

.g_div {
position: absolute;
}

.g_div1 {
width: 60%; height: 60%;
border-radius: 50%;
background: transparent;
border-width: 28px;
border-style: solid;
border-color: #fff transparent #fff #fff;
top: 13%;
left: 12%;
-webkit-transform: rotate(-45deg);
-moz-transform: rotate(-45deg);
}

.g_div4 {
width: 60%; height: 60%;
border-radius: 50%;
background: transparent;
border-width: 28px;
border-style: solid;
border-color: #fff transparent #fff #fff;
top: 13%;
left: 12%;
-webkit-transform: rotate(-20deg);
-moz-transform: rotate(-20deg);
}

.g_div2 {
width: 60%; height: 60%;
border-radius: 50%;
background: transparent;
border-width: 28px;
border-style: solid;
border-color: #fff transparent transparent transparent;
top: 13%;
left: 12%;
}

.g_div3 {
width: 95px; height: 28px;
background: rgba(255, 255, 255, 1);
top: 50%;
left: 56%;
}
    </pre>
</section>

<!--
Code JS
-->

<script>
(function($) {
    $(function() {
    });
})(jQuery);
</script>

<?php
require 'stop_html.php';
?>