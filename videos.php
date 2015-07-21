<?php 
$page = 'Vidéos ';
include 'include/head.php'; 
header('Content-Type: text/html; charset=utf-8');

$key = 'AIzaSyDIZUG3GVG5j71hK8GPDj82L-roWsxfnGs';
$maxResults = 9;

function covtime($youtube_time){
  $start = new DateTime('@0'); // Unix epoch
  $start->add(new DateInterval($youtube_time));
  return $start->format('i:s');
}

function covDate($youtube_date){
    $ts = strtotime($youtube_date);
    return date("d-m-Y H:i:s", $ts);
}
function covRelease($youtube_date){
    $ts = strtotime($youtube_date);
    return date("d/m/Y", $ts);
}

function sortFunction( $a, $b ) {
    return strtotime($b["vidPublication"]) - strtotime($a["vidPublication"]);
}


//Get upload playlist id

$jsonChannelId = file_get_contents("https://www.googleapis.com/youtube/v3/channels?part=contentDetails&forUsername=darkbxakid&key=$key");
$parsed_channelId = json_decode($jsonChannelId);


$channelId = $parsed_channelId->{'items'}[0]->{'contentDetails'}->{'relatedPlaylists'}->{'uploads'};


// Get videos id

$jsonPlaylist = file_get_contents("https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=$maxResults&playlistId=$channelId&key=$key");
$parsed_playlist = json_decode($jsonPlaylist);

//BOUCLE

    for ($i=0; $i<$maxResults; $i++){
        $vidId[$i] = $parsed_playlist->{'items'}[$i]->{'snippet'}->{'resourceId'}->{'videoId'};

        // Get videos infos
        $jsonInfos = file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=statistics%2C+contentDetails%2C+snippet&id=$vidId[$i]&key=$key");
        $parsed_infos = json_decode($jsonInfos);
        
        //titles + viewCount + duration + date
        $vidTitle = $parsed_playlist->{'items'}[$i]->{'snippet'}->{'title'};

        $vidDuration = $parsed_infos->{'items'}[0]->{'contentDetails'}->{'duration'};
        $vidPublication = $parsed_infos->{'items'}[0]->{'snippet'}->{'publishedAt'};
        
// ARRAY
        $vidInfos[$i] = array (
            "vidTitle" => $vidTitle, 
            "vidDuration" => covTime($vidDuration),
            "vidViews" => $parsed_infos->{'items'}[0]->{'statistics'}->{'viewCount'},
            "vidPublication" => covDate($vidPublication),
            "vidRelease" => covRelease($vidPublication),
            "videoId" => $vidId[$i]
        );
        
usort($vidInfos, "sortFunction");

}

?>

<div class="container">
    <section class="youtube">
        <?php
            for ($i=0; $i<$maxResults; $i++){
            echo "
            <a href='https://www.youtube.com/watch?v=" . $vidInfos[$i]['videoId'] . "' target='_blank'>
            <article class='video-youtube'>
            
            <img src='http://img.youtube.com/vi/" . $vidInfos[$i]['videoId'] . "/mqdefault.jpg'>
            <h3>" . $vidInfos[$i]['vidTitle'] . "</h3> 
            <p class='date'>" . $vidInfos[$i]['vidRelease'] ."</p>
            <p class='views'>" . $vidInfos[$i]['vidViews'] ." vues</p>
            <p class='duration'>" . $vidInfos[$i]['vidDuration'] ."</p>
            <div class='cf'></div>
            </article></a>
            "; 
            }
        ?>
    </section><!-- youtube -->
    <div class="cf"></div>
</div><!-- container -->

<?php include 'include/footer.php'; ?>