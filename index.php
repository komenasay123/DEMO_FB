<?php session_start() ?>
<!DOCTYPE html>
<html>

  <head>
    <title>Mi app-fb</title>
    <meta charset="utf-8">

    <style type="text/css" href="http://necolas.github.io/normalize.css/2.1.1/normalize.css"></style>
    <style type="text/css" href="styles/style.css"></style>
    <link rel="stylesheet" href="styles/init_style.css" media="screen" />

    <script type="text/javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
  </head>

  <body>

    <?php

      require 'conf.php';

      $user = $facebook->getUser();
      $loginUrl = $facebook->getLoginUrl($params = array('scope' => "publish_stream", "offline_access"));

    ?>
        <section id="login_layout">

            <form class="login">
                <p>
                  <label for="login">Test de publicación - FB:</label> <span id="loading"></span>
                  <textarea id="messageInput" placeholder="publique algún mensaje (=" rows="5" maxlength="400"></textarea>
                </p>
                <section class="st_fb">
                    <?php
                        if ($user) {
                            echo '<a id="btPost" href="#">Publicar</a>';
                        }
                        else {
                            echo '<a href="'.$loginUrl.'">Instalar mi Aplicacion</a>';
                        }
                    ?>
                </section>
            </form>

            <section class="_foot">
                  Código Experimental <br>
                  Demo PHP-FB - github | <a href="https://github.com/0xyuri" target="_blank">0xyuri</a>
            </section>

        </section>

    <script>

        $('#btPost').click(function(){

            if($('#messageInput').val().length < 1){ $("#loading").html("Ingrese algún mensaje"); return; }

            message_fb = $('#messageInput').val();

            $.ajax({
                    type: "POST",
                    url: "postMessage.php",
                    data: "message_fb="+message_fb,
                    success: function(html)
                    {
                        $("#loading").html("Publicado!")
                    },
                    beforeSend:function()
                    {
                        $("#loading").html("enviando...")
                    }
            });
      });

    </script>

  </body>

</html>


