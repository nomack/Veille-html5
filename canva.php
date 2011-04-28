<?php
require 'start_html.php';
$dispo_offline = TRUE;
?>

<!--
Styles CSS
-->

<style type="text/css">
#canvas {
border: 1px solid #000;
background: #001744;
background-image: -webkit-linear-gradient(#000000, #003764);
background-image: -moz-linear-gradient(#000000, #003764);
box-shadow: 0 0 5px #000, 0 0 15px #000;
}
</style>

<!--
Code HTML
-->

<header class="local">
    <h2>Canva</h2>
</header>

<section id="content" class="clearfix">
<span id="pos_info">x: 0 / y: 0</span>
<br/><br/>
<canvas id="canvas" width="400" height="400">contenu alternatif</canvas>
</section>

<section id="complement">
    Code CSS :
    <pre class="brush: css;">
#canvas {
border: 1px solid #000;
background: #001744;
background-image: -webkit-linear-gradient(#000000, #003764);
background-image: -moz-linear-gradient(#000000, #003764);
box-shadow: 0 0 5px #000, 0 0 15px #000;
}
    </pre>

    Code html :
    <pre class="brush: xml;">
        &lt;canvas id="canvas" width="400" height="400"&gt;contenu alternatif&lt;/canvas&gt;
    </pre>

    <br/>

    Code javascript :
    <pre class="brush: js;">
if(Modernizr.canvas) {
    // récupération du canvas
    var canvas = document.getElementById('canvas');
    // récupération du contexte de dessin
    var ctx = canvas.getContext('2d');

    var lineargradient = false;
    var radialgradient = false;

    // Etoiles
    var nb_etoile = 200;
    for(var i=0; i&lt;nb_etoile; i++) {
        var minPosX = 0;
        var minPosY = 0;
        var maxPosX = 400;
        var maxPosY = 400;

        var posX = Math.round((maxPosX-minPosX)*Math.random())+minPosX;
        var posY = Math.round((maxPosY-minPosY)*Math.random())+minPosY;

        var alpha = ((0.8*maxPosY)-posY)/100;
        if(alpha&gt;0) {
            ctx.beginPath();
            ctx.arc(posX, posY, 1, 0, Math.PI+2, false);
            ctx.fillStyle="rgba(255,255,255,"+alpha+")";
            ctx.fill();
        }
    }

    // Dessus soucoupe
    lineargradient = ctx.createLinearGradient(195,210,210,280);
    lineargradient.addColorStop(0, '#ddd');
    lineargradient.addColorStop(0.4, '#808080');
    lineargradient.addColorStop(1, '#202020');
    ctx.beginPath();
    ctx.arc(200,330,100,(Math.PI/180)*225,(Math.PI/180)*315,false);
    ctx.fillStyle=lineargradient;
    ctx.fill();

    // Milieu soucoupe
    lineargradient = ctx.createLinearGradient(130,265,270,265);
    lineargradient.addColorStop(0, '#707070');
    lineargradient.addColorStop(0.4, '#505050');
    lineargradient.addColorStop(1, '#303030');
    ctx.beginPath();
    ctx.fillStyle=lineargradient;
    ctx.fillRect(130,259,140,12);

    // Lumière soucoupe
    lineargradient = ctx.createLinearGradient(163,286,75,380);
    lineargradient.addColorStop(0, '#fff');
    lineargradient.addColorStop(0.2, '#ff5');
    lineargradient.addColorStop(0.9, 'rgba(255,255,85,0)');
    ctx.beginPath();
    ctx.moveTo(157,288);
    ctx.lineTo(55,355);
    ctx.lineTo(100,395);
    ctx.lineTo(160,290);
    ctx.fillStyle=lineargradient;
    ctx.fill();

    // Dessous soucoupe
    lineargradient = ctx.createLinearGradient(200,270,215,310);
    lineargradient.addColorStop(0, '#505050');
    lineargradient.addColorStop(1, '#101010');
    ctx.beginPath();
    ctx.arc(200,200,100,(Math.PI/180)*45,(Math.PI/180)*135,false);
    ctx.fillStyle=lineargradient;
    ctx.fill();

    // Hublots soucoupe

    radialGradient = ctx.createRadialGradient(126,262,1,126,262,6);
    radialGradient.addColorStop(0, '#bfb');
    radialGradient.addColorStop(1, '#0d0');
    ctx.beginPath();
    ctx.arc(130,265,5,(Math.PI/180)*270,(Math.PI/180)*90,true);
    ctx.fillStyle=radialGradient;
    ctx.fill();

    for(var i=0; i&lt;4; i++) {
        var posx = 130+15+(i*35);
        radialGradient = ctx.createRadialGradient(posx-4,262,1,posx-4,262,6);

        if(i%2==1) {
            radialGradient.addColorStop(0, '#bfb');
            radialGradient.addColorStop(1, '#0d0');
        } else {
            radialGradient.addColorStop(0, '#fbb');
            radialGradient.addColorStop(1, '#d00');
        }
        ctx.beginPath();
        ctx.arc(posx,265,5,0,(Math.PI/180)*360,true);
        ctx.fillStyle=radialGradient;
        ctx.fill();
    }

    radialGradient = ctx.createRadialGradient(266,262,1,266,262,6);
    radialGradient.addColorStop(0, '#fbb');
    radialGradient.addColorStop(1, '#d00');
    ctx.beginPath();
    ctx.arc(270,265,5,(Math.PI/180)*270,(Math.PI/180)*90,false);
    ctx.fillStyle=radialGradient;
    ctx.fill();

} else {
    alert("Canvas non gérés");
}
    </pre>
</section>

<!--
Code JS
-->

<script>
if(Modernizr.canvas) {
    // récupération du canvas
    var canvas = document.getElementById('canvas');
    // récupération du contexte de dessin
    var ctx = canvas.getContext('2d');

    var lineargradient = false;
    var radialgradient = false;

    // Etoiles
    var nb_etoile = 200;
    for(var i=0; i<nb_etoile; i++) {
        var minPosX = 0;
        var minPosY = 0;
        var maxPosX = 400;
        var maxPosY = 400;

        var posX = Math.round((maxPosX-minPosX)*Math.random())+minPosX;
        var posY = Math.round((maxPosY-minPosY)*Math.random())+minPosY;

        var alpha = ((0.8*maxPosY)-posY)/100;
        if(alpha>0) {
            ctx.beginPath();
            ctx.arc(posX, posY, 1, 0, Math.PI+2, false);
            ctx.fillStyle="rgba(255,255,255,"+alpha+")";
            ctx.fill();
        }
    }

    // Dessus soucoupe
    lineargradient = ctx.createLinearGradient(195,210,210,280);
    lineargradient.addColorStop(0, '#ddd');
    lineargradient.addColorStop(0.4, '#808080');
    lineargradient.addColorStop(1, '#202020');
    ctx.beginPath();
    ctx.arc(200,330,100,(Math.PI/180)*225,(Math.PI/180)*315,false);
    ctx.fillStyle=lineargradient;
    ctx.fill();

    // Milieu soucoupe
    lineargradient = ctx.createLinearGradient(130,265,270,265);
    lineargradient.addColorStop(0, '#707070');
    lineargradient.addColorStop(0.4, '#505050');
    lineargradient.addColorStop(1, '#303030');
    ctx.beginPath();
    ctx.fillStyle=lineargradient;
    ctx.fillRect(130,259,140,12);

    // Lumière soucoupe
    lineargradient = ctx.createLinearGradient(163,286,75,380);
    lineargradient.addColorStop(0, '#fff');
    lineargradient.addColorStop(0.2, '#ff5');
    lineargradient.addColorStop(0.9, 'rgba(255,255,85,0)');
    ctx.beginPath();
    ctx.moveTo(157,288);
    ctx.lineTo(55,355);
    ctx.lineTo(100,395);
    ctx.lineTo(160,290);
    ctx.fillStyle=lineargradient;
    ctx.fill();

    // Dessous soucoupe
    lineargradient = ctx.createLinearGradient(200,270,215,310);
    lineargradient.addColorStop(0, '#505050');
    lineargradient.addColorStop(1, '#101010');
    ctx.beginPath();
    ctx.arc(200,200,100,(Math.PI/180)*45,(Math.PI/180)*135,false);
    ctx.fillStyle=lineargradient;
    ctx.fill();

    // Hublots soucoupe

    radialGradient = ctx.createRadialGradient(126,262,1,126,262,6);
    radialGradient.addColorStop(0, '#bfb');
    radialGradient.addColorStop(1, '#0d0');
    ctx.beginPath();
    ctx.arc(130,265,5,(Math.PI/180)*270,(Math.PI/180)*90,true);
    ctx.fillStyle=radialGradient;
    ctx.fill();

    for(var i=0; i<4; i++) {
        var posx = 130+15+(i*35);
        radialGradient = ctx.createRadialGradient(posx-4,262,1,posx-4,262,6);

        if(i%2==1) {
            radialGradient.addColorStop(0, '#bfb');
            radialGradient.addColorStop(1, '#0d0');
        } else {
            radialGradient.addColorStop(0, '#fbb');
            radialGradient.addColorStop(1, '#d00');
        }
        ctx.beginPath();
        ctx.arc(posx,265,5,0,(Math.PI/180)*360,true);
        ctx.fillStyle=radialGradient;
        ctx.fill();
    }

    radialGradient = ctx.createRadialGradient(266,262,1,266,262,6);
    radialGradient.addColorStop(0, '#fbb');
    radialGradient.addColorStop(1, '#d00');
    ctx.beginPath();
    ctx.arc(270,265,5,(Math.PI/180)*270,(Math.PI/180)*90,false);
    ctx.fillStyle=radialGradient;
    ctx.fill();

} else {
    alert("Canvas non gérés");
}

(function($) {
    $(function() {
        $('#canvas').mousemove(function(e) {
            $('#pos_info').html('x: '+e.offsetX+'px / y: '+e.offsetY+'px');
        });
    });
})(jQuery);
</script>

<?php
require 'stop_html.php';
?>