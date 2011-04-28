<?php
require 'start_html.php';
$dispo_offline = TRUE;
?>

<!--
Styles CSS
-->

<style type="text/css">
.box {
border: 1px solid #808080;
width: 300px;
height: 100px;
margin: 5px;
padding: 3px;
border-radius: 3px;
}

.dravover {
background: #abc;
}
</style>

<!--
Code HTML
-->

<header class="local">
    <h2>Drag n'drop</h2>
</header>

<section id="content" class="clearfix">
    <section id="left">
        <div id="box1" class="box drop">
            <img id="img1" class="drag" src="image/chrome1.png" />
            <img id="img2" class="drag" src="image/safari1.png" />
            <img id="img3" class="drag" src="image/firefox1.png" />
        </div>

        <div id="box2" class="box drop">
        </div>

        <div id="box3" class="box drop">
        </div>
    </section>

    <section id="right">
        <h4>Evénements</h4>
        <ul>
            <li>ondrag : <span id="event_ondrag">false</span></li>
            <li>ondragend : <span id="event_ondragend">false</span></li>
            <li>ondragenter : <span id="event_ondragenter">false</span></li>
            <li>ondragleave : <span id="event_ondragleave">false</span></li>
            <li>ondragover : <span id="event_ondragover">false</span></li>
            <li>ondragstart : <span id="event_ondragstart">false</span></li>
            <li>ondrop : <span id="event_ondrop">false</span></li>
            <li>autre : <span id="autre"></span></li>
        </ul>
    </section>
</section>

<section id="complement">
    Code CSS :
    <pre class="brush: css;">
.box {
border: 1px solid #808080;
width: 300px;
height: 100px;
margin: 5px;
padding: 3px;
border-radius: 3px;
}

.dravover {
background: #abc;
}
    </pre>

    <br/><br/>

    Code HTML :
    <pre class="brush: xml;">
&lt;section id="left"&gt;
    &lt;div id="box1" class="box drop"&gt;
        &lt;img id="img1" class="drag" src="image/chrome1.png" /&gt;
        &lt;img id="img2" class="drag" src="image/safari1.png" /&gt;
        &lt;img id="img3" class="drag" src="image/firefox1.png" /&gt;
    &lt;/div&gt;

    &lt;div id="box2" class="box drop"&gt;
    &lt;/div&gt;

    &lt;div id="box3" class="box drop"&gt;
    &lt;/div&gt;
&lt;/section&gt;

&lt;section id="right"&gt;
    &lt;h4&gt;Evénements&lt;/h4&gt;
    &lt;ul&gt;
        &lt;li&gt;ondrag : &lt;span id="event_ondrag"&gt;false&lt;/span&gt;&lt;/li&gt;
        &lt;li&gt;ondragend : &lt;span id="event_ondragend"&gt;false&lt;/span&gt;&lt;/li&gt;
        &lt;li&gt;ondragenter : &lt;span id="event_ondragenter"&gt;false&lt;/span&gt;&lt;/li&gt;
        &lt;li&gt;ondragleave : &lt;span id="event_ondragleave"&gt;false&lt;/span&gt;&lt;/li&gt;
        &lt;li&gt;ondragover : &lt;span id="event_ondragover"&gt;false&lt;/span&gt;&lt;/li&gt;
        &lt;li&gt;ondragstart : &lt;span id="event_ondragstart"&gt;false&lt;/span&gt;&lt;/li&gt;
        &lt;li&gt;ondrop : &lt;span id="event_ondrop"&gt;false&lt;/span&gt;&lt;/li&gt;
        &lt;li&gt;autre : &lt;span id="autre"&gt;&lt;/span&gt;&lt;/li&gt;
    &lt;/ul&gt;
&lt;/section&gt;
    </pre>

    <br/><br/>

    Code JavaScript :
    <pre class="brush: js;">
(function($) {
    $(function() {
        // gestion des événements attribués aux éléments de classe 'drag'
        $('.drag')
            .attr('draggable', 'false')
            .bind('drag', function(event) {
                var target = $(this);
                var target_id = target.attr('id');

                $('#event_ondrag').html('true -&gt; '+target_id);
            })
            .bind('dragstart', function(event) {
                var target = $(this);
                var target_id = target.attr('id');

                $('#event_ondragstart').html('true');
                $('#event_ondragend').html('false');

                $('#autre').html('Deplacement de '+target_id);

                // sauvegarde de l'élément en cours de déplacement
                event.originalEvent.dataTransfer.setData("Text", target_id);

                return true;
            })
            .bind('dragend', function(event) {
                var target = $(this);
                var target_id = target.attr('id');

                $('#event_ondragstart').html('false');
                $('#event_ondrag').html('false');
                $('#event_ondragend').html('true -&gt; '+target_id);
                $('#event_ondragenter').html('false');
                $('#event_ondragleave').html('false');
                $('#event_ondragover').html('false');
            });

        // gestion des événements attribués aux éléments de classe drop
        $('.drop')
            .bind('dragover', function(event) {
                var target = $(this);
                var target_id = target.attr('id');

                $('#event_ondragover').html('true -&gt; '+target_id);

                return false;
            })
            .bind('dragenter', function(event) {
                var target = $(this);
                var target_id = target.attr('id');

                target.addClass('dravover');
                $('#event_ondragenter').html('true -&gt; '+target_id);

                return false;
            })
            .bind('dragleave', function(event) {
                var target = $(this);
                var target_id = target.attr('id');

                target.removeClass('dravover');
                $('#event_ondragleave').html('true -&gt; '+target_id);
                $('#event_ondragover').html('false');

                return false;
            })
            .bind('drop', function(event) {

                // on stop la propagation de l'événement
                event.stopPropagation();
                event.preventDefault();

                var target = $(this);
                var target_id = target.attr('id');

                // récupération de l'id de l'élément à déplacer
                var item_id = event.originalEvent.dataTransfer.getData("Text");

                target.append($('#'+item_id));
                target.removeClass('dravover');
                $('#autre').html(item_id+' deplace dans '+target_id);

                return false;
            });
    });
})(jQuery);
    </pre>
</section>

<!--
Code JS
-->

<script>
(function($) {
    $(function() {
        // gestion des événements attribués aux éléments de classe 'drag'
        $('.drag')
            .attr('draggable', 'false')
            .bind('drag', function(event) {
                var target = $(this);
                var target_id = target.attr('id');

                $('#event_ondrag').html('true -> '+target_id);
            })
            .bind('dragstart', function(event) {
                var target = $(this);
                var target_id = target.attr('id');

                $('#event_ondragstart').html('true');
                $('#event_ondragend').html('false');

                $('#autre').html('Deplacement de '+target_id);

                // sauvegarde de l'élément en cours de déplacement
                event.originalEvent.dataTransfer.setData("Text", target_id);

                return true;
            })
            .bind('dragend', function(event) {
                var target = $(this);
                var target_id = target.attr('id');

                $('#event_ondragstart').html('false');
                $('#event_ondrag').html('false');
                $('#event_ondragend').html('true -> '+target_id);
                $('#event_ondragenter').html('false');
                $('#event_ondragleave').html('false');
                $('#event_ondragover').html('false');
            });

        // gestion des événements attribués aux éléments de classe drop
        $('.drop')
            .bind('dragover', function(event) {
                var target = $(this);
                var target_id = target.attr('id');

                $('#event_ondragover').html('true -> '+target_id);

                return false;
            })
            .bind('dragenter', function(event) {
                var target = $(this);
                var target_id = target.attr('id');

                target.addClass('dravover');
                $('#event_ondragenter').html('true -> '+target_id);

                return false;
            })
            .bind('dragleave', function(event) {
                var target = $(this);
                var target_id = target.attr('id');

                target.removeClass('dravover');
                $('#event_ondragleave').html('true -> '+target_id);
                $('#event_ondragover').html('false');

                return false;
            })
            .bind('drop', function(event) {

                // on stop la propagation de l'événement
                event.stopPropagation();
                event.preventDefault();

                var target = $(this);
                var target_id = target.attr('id');

                // récupération de l'id de l'élément à déplacer
                var item_id = event.originalEvent.dataTransfer.getData("Text");

                target.append($('#'+item_id));
                target.removeClass('dravover');
                $('#autre').html(item_id+' deplace dans '+target_id);

                return false;
            });
    });
})(jQuery);
</script>

<?php
require 'stop_html.php';
?>