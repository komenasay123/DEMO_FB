<?php

      define('_CONSUMER_KEY','xxxxxxxxxxxxxxxx');
      define('_CONSUMER_SECRET','xxxxxxxxxxxxxxxxxxxxxxxxxxx');

      require 'src/facebook.php';

      $facebook = new Facebook(array(

        'appId'  => _CONSUMER_KEY,
        'secret' => _CONSUMER_SECRET,
        'cookie' => false

      ));
?>