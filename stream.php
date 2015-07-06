<?php include 'include/head.php';

 
$channelId = 'milleniumtvlol';

 
$jsontwitch = file_get_contents("https://api.twitch.tv/kraken/streams/$channelId");
$parsed_jsontwitch = json_decode($jsontwitch);

if($parsed_jsontwitch->{'stream'} !=null){

$game = $parsed_jsontwitch->{'stream'}->{'game'};
$title = $parsed_jsontwitch->{'stream'}->{'channel'}->{'status'};
$viewers = $parsed_jsontwitch-> {'stream'}->{'viewers'};
    
}else{
$game = 'Stream offline';
$title = 'Stream offline';
$viewers = 0;
}


?>
  
  
<section class="twitch-stream">
   <h2><?php echo $title ?></h2>
   <button>Suivre</button>
   <div class="player">
       <?php echo '<iframe src="http://www.twitch.tv/' .$channelId . '/embed" frameborder="0" scrolling="no" height="213" width="320"></iframe>' ?>
   </div>
    <div class="stream-buttons">
        <a href="https://www.twitchalerts.com/donate/bxakid" class="donate"><img src="images/icon/button-donate.png" alt="faire un don"></a>
        <div class="right-buttons">
            <a href="#" class="stream-button"><img src="images/icon/button-faq.png" alt="faq"></a>
            <a href="#" class="stream-button"><img src="images/icon/button-refresh.png" alt="refresh"></a>
            <a href="#" class="stream-button"><img src="images/icon/button-twitch.png" alt="twitch"></a>
            <a href="#" class="stream-button"><img src="images/icon/button-night.png" alt="night"></a>
        </div>
        <div class="cf"></div>
    </div>
    <div class="viewers-stream">
        <p><?php echo $viewers ?> <span class="spectateur">Spéctateurs</span></p>
    </div>
</section>  
 
 
 

  
  
<section class="twitch-content">
    <article class="twitch-qui">
        <img src="./images/icon/qui.png" alt="qui suis-je">
        <p>Bonjour à toutes et à tous ! Vidéo Maker sur Youtube de 17 ans. Membre de Feed The Patricks et fan des mods magiques de Minecraft. Je réalise aussi des vidéos sur différents jeux mobiles et osu !</p>
    </article>
    <article>
        <img src="./images/icon/contenu.png" alt="le contenu">
        <p>Ici c'est le bazar ! Vous pourrez découvrir mes séances de jeu sur pleins de trucs, du minecraft, des jeux mobiles comme Clash of Clans ou encore Brave Frontier ainsi que mes séances d’entraînements sur osu! ainsi que les compétitions que j'y organise.</p>
    </article>
    <article>
        <img src="./images/icon/me-retrouver.png" alt="me retrouver">
        <p>Vous pouvez me rejoindre sur mes différents réseaux sociaux. Vous verrez c'est marrant.</p>
    </article>
    <article>
        <img src="./images/icon/aider-la-chaine.png" alt="aider la chaine">
        <p>Pour m'aider à financer les récompenses des compétitions et améliorer la chaîne vous pouvez réaliser un don en cliquant sur le bouton sous le lecteur de stream (le rouge, celui avec écrit faire un don et un gros paquet cadeau).

Merci à tous et surtout, Hope you like it !</p>
    </article>
</section> 
 
<?php include 'include/footer.php'; ?>