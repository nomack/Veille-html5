<?php
require 'start_html.php';
$dispo_offline = TRUE;
?>

<!--
Styles CSS
-->

<style type="text/css">
    #test_image{
    position: relative;
    width: 800px;
    height: 442px;
    }

    #test_image ul{
    list-style-type: none;
    }

    #test_image ul li{
    position: absolute;
    }

    #test_image ul li img{
    -webkit-transition: all 10s ease;
    }

    #img_2{
    opacity: 0;
    }

    #img_2:hover{
    opacity: 1;
    }
</style>

<!--
Code HTML
-->

<header class="local">
    <h2>Diverses choses en CSS3</h2>
</header>

<section id="content" class="clearfix">
    <section id="left">
        <div id="test_image">
            <ul>
                <li><img id="img_1" src="image/2011-04-25_14.49.21.png" width="800" height="442" /></li>
                <li><img id="img_2" src="image/2011-04-25_14.49.36.png" width="800" height="442" /></li>
            </ul>
        </div>
    </section>
</section>

<section id="complement">
Code HTML :
<pre class="brush: xml;">
</pre>

<br/>

Code JavaScript :
<pre class="brush: js;">
(function($) {
    $(function() {
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
    });
})(jQuery);
</script>

<?php
require 'stop_html.php';
?>