<?php 
$page = 'Stream ';
include 'include/head.php';

 
$channelId = 'bxakid';

 
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
  
<div class="container">
   <div class="twitch">
    <section class="twitch-stream">
       <h2><?php echo $title ?></h2>
       <a href="http://www.twitch.tv/bxakid" class="follow"><i class="fa fa-heart">&nbsp;</i>Suivre</a>
       <div class="cf"></div>
       <div class="player">
           <?php echo '<iframe src="http://www.twitch.tv/' .$channelId . '/embed" frameborder="0" scrolling="no"></iframe>' ?>
       </div>
        <div class="stream-buttons">
            <a href="https://www.twitchalerts.com/donate/bxakid" class="donate" target="_blank"><img src="images/icon/button-donate.png" alt="faire un don"></a>
            <div class="right-buttons">
                <a href="javascript:location.reload(true)"><img src="images/icon/button-refresh.png" alt="refresh"></a>
                <a href="http://www.twitch.tv/bxakid" class="stream-button"><img src="images/icon/button-twitch.png" alt="twitch"></a>
                <a href="#" class="stream-button"><img src="images/icon/button-expand.png" alt="night"></a>
            </div>
        </div>      
    </section>
    <section class="twitch-chat">
       <div class="viewers-stream">
            <p><?php echo $viewers ?> <span class="spectateur">Spectateurs</span></p>
        </div>
        
        <?php echo '<iframe src="http://www.twitch.tv/' .$channelId . '/chat?popout=" frameborder="0" scrolling="no" height="487"></iframe>' ?>  
    </section>
    <div class="cf"></div> 
    </div>
    
   
    
   
</div>

  
<section class="twitch-content">
   <div class="container">
    <article class="twitch-qui">
        <img src="./images/icon/qui.png" alt="qui suis-je">
        <p>Bonjour à toutes et à tous ! Vidéo Maker sur Youtube de 18 ans. Membre de Feed The Patricks et fan des mods magiques de Minecraft. Je réalise aussi des vidéos sur différents jeux mobiles et osu !</p>
    </article>
    <article>
        <img src="./images/icon/contenu.png" alt="le contenu">
        <p>Ici c'est le bazar ! Vous pourrez découvrir mes séances de jeu sur pleins de trucs, du minecraft, des jeux mobiles comme Clash of Clans ou encore Brave Frontier ainsi que mes séances d’entraînements sur osu! ainsi que les compétitions que j'y organise.</p>
    </article>
    <article>
        <img src="./images/icon/me-retrouver.png" alt="me retrouver">
        <p>Vous pouvez me rejoindre sur mes différents réseaux sociaux. Vous verrez c'est marrant.</p>
    </article>
    <article class="twitch-aider">
        <img src="./images/icon/aider-la-chaine.png" alt="aider la chaine">
        <p>Pour m'aider à financer les récompenses des compétitions et améliorer la chaîne vous pouvez réaliser un don en cliquant sur le bouton sous le lecteur de stream (le rouge, celui avec écrit faire un don et un gros paquet cadeau).

Merci à tous et surtout, Hope you like it !</p>
    </article>
    <div class="cf"></div>
    <article class="twitch-faq">
       <img src="./images/icon/faq.png" alt="faq">
        <div class="question">+ Comment t’appelles tu ?</div>
        <div class="answer">Julien</div>
        <div class="question">+ Ton âge ?</div>
        <div class="answer">18 ans o/</div>
        <div class="question">+ Quand as-tu commencé Youtube ? </div>
        <div class="answer">Un peu plus de deux ans !</div>
        <div class="question">+ Qu’est-ce qui t’a motivé à emprunter ce chemin ?</div>
        <div class="answer">Je jouais déjà avec VeryBadCubes et j’avais participé à quelques tournages bien fun qui m’ont vraiment donné envie de me lancer !
</div>
        <div class="question">+ Quand et comment as tu découvert Minecraft ?</div>
        <div class="answer">Pendant l’alpha tout au début, et ce grâce à notre cher ami Fantasio !
</div>
        <div class="question">+ Et pour Brave Frontier ? Ou Clash Of Clans ?</div>
        <div class="answer">Les deux en me baladant sur le store mobile !
</div>
        <div class="question">+ Tes projets pour l’avenir ?</div>
        <div class="answer">Étant dès (depuis) Septembre à l'Université dans mon propre chez moi, je pense me consacrer plus au lives, ça m’éclate vraiment de jouer avec vous et vos réactions ! 
</div>
    </article>
    <div class="cf"></div>
    </div>
</section> 
 
<?php include 'include/footer.php'; ?>