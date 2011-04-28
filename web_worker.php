<?php
require 'start_html.php';
$dispo_offline = TRUE;
?>

<!--
Styles CSS
-->

<style type="text/css">

</style>

<!--
Code HTML
-->

<header class="local">
    <h2>Web Workers</h2>
</header>

<section id="content" class="clearfix">
    <section id="left">
        <button type="button" id="launch_worker">Démarrer le worker</button>
        <button type="button" id="stop_worker">Stopper le worker</button>
        <br/><br/>
        <button type="button" id="calcul">Lancer un calcul</button>
        <button type="button" id="without_worker">Lancer un calcul sans worker</button>
        <br/><br/>
        <button type="button" id="message">Message</button>
        <button type="button" id="unknow">Commande inconnue</button>
    </section>

    <section id="right">
        Infos : <span id="infos"></span>
    </section>
</section>

<section id="complement">
Code HTML :
<pre class="brush: xml;">
&lt;section id="left"&gt;
    &lt;button type="button" id="launch_worker"&gt;Démarrer le worker&lt;/button&gt;
    &lt;button type="button" id="stop_worker"&gt;Stopper le worker&lt;/button&gt;
    &lt;br/&gt;&lt;br/&gt;
    &lt;button type="button" id="calcul"&gt;Lancer un calcul&lt;/button&gt;
    &lt;button type="button" id="without_worker"&gt;Lancer un calcul sans worker&lt;/button&gt;
    &lt;br/&gt;&lt;br/&gt;
    &lt;button type="button" id="message"&gt;Message&lt;/button&gt;
    &lt;button type="button" id="unknow"&gt;Commande inconnue&lt;/button&gt;
&lt;/section&gt;

&lt;section id="right"&gt;
    Infos : &lt;span id="infos"&gt;&lt;/span&gt;
&lt;/section&gt;
</pre>

<br/>

Code JavaScript :
<pre class="brush: js;">
(function($) {
    $(function() {
        var worker = false;

        $('#infos').html('En attente');

        $('#launch_worker').click(function() {
            worker = new Worker('js/worker.js');

            worker.addEventListener('message', function(e) {
                $('#infos').html(e.data);
            }, false);

            $('#infos').html('worker démarré');
        });

        $('#stop_worker').click(function() {
            if(!worker) {
                $('#infos').html('le worker n\'est pas démarré !');
            } else {
                worker.terminate();
                worker = false;
                $('#infos').html('worker arrêté');
            }
        });

        $('#calcul').click(function () {
            if(!worker) {
                $('#infos').html('le worker n\'est pas démarré !');
            } else {
                worker.postMessage({'cmd': 'calcul'});
            }
        });

        $('#message').click(function () {
            if(!worker) {
                $('#infos').html('le worker n\'est pas démarré !');
            } else {
                worker.postMessage({'cmd': 'message'});
            }
        });

        $('#unknow').click(function () {
            if(!worker) {
                $('#infos').html('le worker n\'est pas démarré !');
            } else {
                worker.postMessage({'cmd': 'pouet'});
            }
        });

        $('#without_worker').click(function() {
            var start = (new Date).getTime();
            var msg = '';

            $('#infos').html('calcul en cours...');

            for(var i=0; i&lt;=20000000; i++) {
                msg = 'incrementation : '+i;
            }

            var diff = (new Date).getTime() - start;
            $('#infos').html(diff+' ms&lt;br/&gt;&lt;br/&gt;Ca a ramé dur hein ?? :p');

        });
    });
})(jQuery);
</pre>

<br/>

Code Worker :
<pre class="brush: js;">
self.addEventListener('message', function(e) {
var data = e.data;

switch(data.cmd) {
    case 'start':
        self.postMessage('serveur démarré');
        break;
    case 'message':
        self.postMessage('petit message qui va bien :p');
        break;
    case 'calcul':
        self.postMessage('calcul en cours');

        var start = (new Date).getTime();
        var msg = '';

        for(var i=0; i&lt;=20000000; i++) {
            msg = 'incrementation : '+i;
        }

        var diff = (new Date).getTime() - start;

        self.postMessage(diff+' ms');
        break;
    default:
        self.postMessage('oO ???');
}
}, false);
</pre>
</section>

<!--
Code JS
-->

<script>
(function($) {
    $(function() {
        var worker = false;

        $('#infos').html('En attente');

        $('#launch_worker').click(function() {
            worker = new Worker('js/worker.js');

            worker.addEventListener('message', function(e) {
                $('#infos').html(e.data);
            }, false);

            $('#infos').html('worker démarré');
        });

        $('#stop_worker').click(function() {
            if(!worker) {
                $('#infos').html('le worker n\'est pas démarré !');
            } else {
                worker.terminate();
                worker = false;
                $('#infos').html('worker arrêté');
            }
        });

        $('#calcul').click(function () {
            if(!worker) {
                $('#infos').html('le worker n\'est pas démarré !');
            } else {
                worker.postMessage({'cmd': 'calcul'});
            }
        });

        $('#message').click(function () {
            if(!worker) {
                $('#infos').html('le worker n\'est pas démarré !');
            } else {
                worker.postMessage({'cmd': 'message'});
            }
        });

        $('#unknow').click(function () {
            if(!worker) {
                $('#infos').html('le worker n\'est pas démarré !');
            } else {
                worker.postMessage({'cmd': 'pouet'});
            }
        });

        $('#without_worker').click(function() {
            var start = (new Date).getTime();
            var msg = '';

            $('#infos').html('calcul en cours...');

            for(var i=0; i<=20000000; i++) {
                msg = 'incrementation : '+i;
            }

            var diff = (new Date).getTime() - start;
            $('#infos').html(diff+' ms<br/><br/>Ca a ramé dur hein ?? :p');

        });
    });
})(jQuery);
</script>

<?php
require 'stop_html.php';
?>