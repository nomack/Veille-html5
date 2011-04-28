<?php
require 'start_html.php';
$dispo_offline = FALSE;
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
    <h2>DB Storage</h2>
</header>

<section id="content" class="clearfix">
    <section id="left">
        <button type="button" id="button_init_db">Initialiser la BDD</button>
        <br/><br/>
        Créer une table :<br/>
        <input type="text" id="table_name" /> <button type="button" id="button_add_table">Ajouter la table</button>

        <br/><br/>
    </section>

    <section id="right">
        <h3>Statut de la BDD</h3>
        <span id="db_status"></span>
        <br/><br/>
        <h3>Tables</h3>
        <span id="table_status"></span>
    </section>
</section>

<section id="complement">
Il semblerait que cette fonctionnalité ne voit en fait pas le jour ( <a href="http://www.caniuse.com/#feat=sql-storage">voir ici</a> ) donc on verra cette fonctionnalité plus tard...
</section>

<!--
Code JS
-->

<script>
(function($) {
    $(function() {
        var db = null;

        $('#button_init_db').click(function() {
            init_db();
        }).click();

        $('#button_add_table').click(function() {
            var table_name = $('#table_name').val();
            if(table_name != '') {
                create_table(table_name);
            } else {
                $('#table_status').html('Il faut entrer un nom de table');
            }
        });

        function init_db() {
            if(!db) {
                $('#db_status').html('Initialisation de la BDD');

                if(window.openDatabase) {
                    // initialisation d'une bdd de 5Mo
                    db = window.openDatabase('bdd_test', '1.0', 'test de bdd', 5*1024);

                    if(db) {
                        $('#db_status').html('Connexion BDD ouverte');
                    } else {
                        $('#db_status').html('Echec de la connexion à la BDD');
                    }
                } else {
                    $('#db_status').html('Fonctionnalité non supportée');
                }
            } else {
                $('#db_status').html('BDD déjà initialisée');
            }
        }

        function create_table(name) {
            if(db) {
                $('#table_status').html('Création de la table \''+name+'\' en cours');

                db.transaction(function(tx) {
                    tx.executeSql("CREATE TABLE IF NOT EXISTS "+name+" (id INT UNIQUE, value1 VARCHAR(255), value2 TEXT);", [], function(tx, result) {
                        $('#table_status').html('Table \''+name+'\' créée');
                    }, function() {
                        $('#table_status').html('Echec de la création de table');
                    });
                });
            } else {
                $('#table_status').html('Connexion à la BDD non ouverte, création de la table impossible');
            }
        }
    });
})(jQuery);
</script>

<?php
require 'stop_html.php';
?>