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
    <h2>Formulaire</h2>
</header>

<section id="content" class="clearfix">
<?php
$type = array('text', 'tel', 'search', 'url', 'email', 'datetime', 'date', 'month', 'week', 'time', 'datetime-local', 'number', 'range', 'color');

foreach($type as $k=>$v) {
    echo'Champ de type '.$v.'<br/><input type="'.$v.'" placeholder="placeholder" min="1" max="20" list="dataList" value="" /><br/><br/>';
}
?>

    <datalist id="dataList">
        <li>Pouet</li>
        <li>Machin</li>
        <li>Truc</li>
        <li>Bidule</li>
        <li>Gnourf</li>
        <li>Shtroumpf</li>
    </datalist>
</section>

<section id="complement">
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