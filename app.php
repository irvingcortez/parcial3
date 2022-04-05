<!DOCTYPE html>
<html>
<head>
    <title>App</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
</head>
<body>
 
    <?php
        require 'vendor/autoload.php';
        
        $api = new SpotifyWebAPI\SpotifyWebAPI();
        
        if(!isset($_COOKIE['spotify'])) {
            echo "cookie invalid";
            exit;
        }

        $accessToken = $_COOKIE['spotify'];
        // Fetch the saved access token from somewhere. A session for example.
        $api->setAccessToken($accessToken);
        $album = $api->getTrack('024Q1MI4uaYHF6j2Q2ZYgF');

    ?>

<div class="jumbotron text-center">
<img src="<?php echo  $api->me()->images[0]->url; ?>" class="rounded-circle" height=200 alt="Cinque Terre">
<br>
    <span><?php echo $api->me()->display_name; ?></span>
    <br>
    <a href="<?php echo $api->me()->external_urls->spotify; ?>"><span>fallow me in spotify</span></a>
</div>

</div>
  
<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <img src="<?php echo $album->album->images[1]->url;  ?>" class="rounded" alt="cinque terre">
      <p><?php echo $album->artists[0]->name; ?></p>
      <audio controls>
       <source src="<?php echo $album->preview_url; ?>" type="audio/mpeg">
       your browser does not support the audio element   
      </audio>
      <a href="<?php echo $album->external_urls->spotify; ?>"><button type="button" class="btn btn-warning">open in spotify</button></a>
    </div>
  </div>
</div>

</body>
</html>

