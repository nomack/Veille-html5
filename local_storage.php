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
    <h2>Local Storage</h2>
</header>

<section id="content" class="clearfix">
    <section id="left">
        Ajouter une donnée dans le localStorage et le sessionStorage<br/>
        <input type="text" id="input_value" name="input_value" value="" />
        <button type="button" id="input_button">Ajouter</button>
        <br/><br/>
        <button type="button" id="overload_localStorage">Surcharge localStorage</button>
        <br/>
        <button type="button" id="overload_sessionStorage">Surcharge sessionStorage</button>
    </section>

    <section id="right">
        <button type="button" id="update_info_storage">Actualiser</button>
        <button type="button" id="reset_storage">Effacer</button>
        <br/><br/>
        <h4>localStorage</h4>
        <div id="info_localStorage"></div>
        <br/>
        <h4>sessionStorage</h4>
        <div id="info_sessionStorage"></div>
    </section>
</section>

<section id="complement">
    Pour apprécier cette page à sa juste valeur, il est nécessaire de l'ouvrir dans deux (j'ai bien dit deux !) onglets différents et vous allez voir, c'est halluuuuuucinant !!

    <br/><br/>

    Code HTML :
    <pre class="brush: xml;">
&lt;section id="left"&gt;
    Ajouter une donnée dans le localStorage et le sessionStorage&lt;br/&gt;
    &lt;input type="text" id="input_value" name="input_value" value="" /&gt;
    &lt;button type="button" id="input_button"&gt;Ajouter&lt;/button&gt;
    &lt;br/&gt;&lt;br/&gt;
    &lt;button type="button" id="overload_localStorage"&gt;Surcharge localStorage&lt;/button&gt;
    &lt;br/&gt;
    &lt;button type="button" id="overload_sessionStorage"&gt;Surcharge sessionStorage&lt;/button&gt;
&lt;/section&gt;

&lt;section id="right"&gt;
    &lt;button type="button" id="update_info_storage"&gt;Actualiser&lt;/button&gt;
    &lt;button type="button" id="reset_storage"&gt;Effacer&lt;/button&gt;
    &lt;br/&gt;&lt;br/&gt;
    &lt;h4&gt;localStorage&lt;/h4&gt;
    &lt;div id="info_localStorage"&gt;&lt;/div&gt;
    &lt;br/&gt;
    &lt;h4&gt;sessionStorage&lt;/h4&gt;
    &lt;div id="info_sessionStorage"&gt;&lt;/div&gt;
&lt;/section&gt;
    </pre>

    <br/><br/>

    Code JavaScript :
    <pre class="brush: js;">
(function($) {
    $(function() {
        $("#input_button").click(function() {
            if($("#input_value").val() != "") {
                window.localStorage.setItem('value_'+(window.localStorage.length+1), $("#input_value").val());
                window.sessionStorage.setItem('value_'+(window.sessionStorage.length+1), $("#input_value").val());

                updateStorage();
            }
        });

        $("#update_info_storage").click(function() {
            updateStorage();
        });

        $("#reset_storage").click(function() {
            window.localStorage.clear();
            window.sessionStorage.clear();

            updateStorage();
        });

        function updateStorage() {
            var str_local = "";
            var str_session = "";

            for(var i=0; i&lt;window.localStorage.length; i++) {
                var key = window.localStorage.key(i);
                str_local+= key+" : "+window.localStorage.getItem(key)+"&lt;br/&gt;";
            }

            for(var i=0; i&lt;window.sessionStorage.length; i++) {
                var key = window.sessionStorage.key(i);
                str_session+= key+" : "+window.sessionStorage.getItem(key)+"&lt;br/&gt;";
            }

            $("#info_localStorage").html(str_local);
            $("#info_sessionStorage").html(str_session);
        }

        $("#overload_localStorage").click(function() {
            local_overload(window.localStorage);
        });

        $("#overload_sessionStorage").click(function() {
            local_overload(window.sessionStorage);
        });

        function local_overload(storage) {
            // var nb = 1024*5*2;
            var nb = storage.length+1024;
            var dep = storage.length+1;

            for(var i=dep; i&lt;=nb; i++) {
                i = String(i);
                var l = i.length;

                if(6-l &gt; 0) {
                    for(var j=0; j&lt;6-l; j++) {
                        i = "0"+i;
                    }
                }

                try {
                storage.setItem(i, "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting. but also the leap into but alsos pouet");
                }
                catch(err) {
                    console.log(err);

                    if(err.name == "QUOTA_EXCEEDED_ERR") {
                        alert("Quota du localStorage dépassé certaines données ne seront pas enregistrées.\n"+storage.length+" enregistrements effectués sur "+nb+" demandés");
                    }

                    break;
                }
            }
        }

    });
})(jQuery);
    </pre>

    <a href="http://jsfiddle.net/nomack/nsNNa/">Version jsfiddle de l'exemple</a>
</section>

<!--
Code JS
-->

<script>
(function($) {
    $(function() {
        $("#input_button").click(function() {
            if($("#input_value").val() != "") {
                window.localStorage.setItem('value_'+(window.localStorage.length+1), $("#input_value").val());
                window.sessionStorage.setItem('value_'+(window.sessionStorage.length+1), $("#input_value").val());

                updateStorage();
            }
        });

        $("#update_info_storage").click(function() {
            updateStorage();
        });

        $("#reset_storage").click(function() {
            window.localStorage.clear();
            window.sessionStorage.clear();

            updateStorage();
        });

        function updateStorage() {
            var str_local = "";
            var str_session = "";

            for(var i=0; i<window.localStorage.length; i++) {
                var key = window.localStorage.key(i);
                str_local+= key+" : "+window.localStorage.getItem(key)+"<br/>";
            }

            for(var i=0; i<window.sessionStorage.length; i++) {
                var key = window.sessionStorage.key(i);
                str_session+= key+" : "+window.sessionStorage.getItem(key)+"<br/>";
            }

            $("#info_localStorage").html(str_local);
            $("#info_sessionStorage").html(str_session);
        }

        $("#overload_localStorage").click(function() {
            local_overload(window.localStorage);
        });

        $("#overload_sessionStorage").click(function() {
            local_overload(window.sessionStorage);
        });

        function local_overload(storage) {
            // var nb = 1024*5*2;
            var nb = storage.length+1024;
            var dep = storage.length+1;

            for(var i=dep; i<=nb; i++) {
                i = String(i);
                var l = i.length;

                if(6-l > 0) {
                    for(var j=0; j<6-l; j++) {
                        i = "0"+i;
                    }
                }

                try {
                storage.setItem(i, "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting. but also the leap into but alsos pouet");
                }
                catch(err) {
                    console.log(err);

                    if(err.name == "QUOTA_EXCEEDED_ERR") {
                        alert("Quota du localStorage dépassé certaines données ne seront pas enregistrées.\n"+storage.length+" enregistrements effectués sur "+nb+" demandés");
                    }

                    break;
                }
            }
        }

    });
})(jQuery);
</script>

<?php
require 'stop_html.php';
?>