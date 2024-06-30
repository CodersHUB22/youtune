<?php
function fetchYouTubeVideoIds($query) {
    $query = urlencode(htmlspecialchars($query, ENT_QUOTES, 'UTF-8'));
    $search_url = "https://www.youtube.com/results?search_query={$query}&sp=EgIQAQ%253D%253D";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $search_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($curl, CURLOPT_TIMEOUT, 30);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_MAXREDIRS, 5);

    $html = curl_exec($curl);

    if (curl_errno($curl)) {
        echo '<div class="alert alert-danger text-center" role="alert">Error fetching YouTube data: ' . htmlspecialchars(curl_error($curl), ENT_QUOTES, 'UTF-8') . '</div>';
        curl_close($curl);
        return [];
    }

    curl_close($curl);

    preg_match_all('/\/watch\?v=([a-zA-Z0-9_-]{11})/', $html, $matches);

    if (!empty($matches[1])) {
        return $matches[1];
    } else {
        return [];
    }
}

$query = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['query'])) {
    $query = htmlspecialchars($_POST['query'], ENT_QUOTES, 'UTF-8');
    $video_ids = fetchYouTubeVideoIds($query);
    $totalVideos = count($video_ids);
} else {
    $totalVideos = 0;
}

echo "<div class='row' id='videoThumbnails'>";
if ($totalVideos > 0) {
    foreach ($video_ids as $video_id) {
        $thumbnail_url = "https://img.youtube.com/vi/{$video_id}/0.jpg";
        $video_embed_url = "https://www.youtube.com/embed/{$video_id}?autoplay=1&amp;controls=1&amp;loop=1&amp;mute=0";

        echo "<div class='col-lg-4 mb-4 video-thumbnail' id='video{$video_id}'>
                <div class='card' style='position: relative;'>
                    <img src='{$thumbnail_url}' alt='Video Thumbnail' style='width: 100%; height: auto; max-width: 600px; cursor: pointer;' onclick='playVideo(\"{$video_embed_url}\", \"{$video_id}\")'>
                </div>
              </div>";
    }
} else {
    echo "<div class='col-lg-12'>
            <div class='alert alert-warning text-center' role='alert'>
                No results found for '" . htmlspecialchars($query, ENT_QUOTES, 'UTF-8') . "'
            </div>
          </div>";
}
echo "</div>";

echo "<div id='videoContainer' class='mt-4'></div>";

echo "<script>
        function playVideo(videoEmbedUrl, videoId) {
            var videoContainer = document.getElementById('videoContainer');
            var videoThumbnails = document.getElementById('videoThumbnails');
            var selectedVideoThumbnail = document.getElementById('video' + videoId);
            
            // Hide other video thumbnails
            var thumbnails = videoThumbnails.getElementsByClassName('video-thumbnail');
            for (var i = 0; i < thumbnails.length; i++) {
                thumbnails[i].style.display = 'none';
            }
            
            // Display selected video in container
            videoContainer.innerHTML = '<iframe src=\"' + videoEmbedUrl + '\" allowfullscreen=\"true\" style=\"width: 100%; height: 400px; border: none;\"></iframe>';
        }

        // Display JavaScript warning if disabled
        document.addEventListener('DOMContentLoaded', function() {
            var jsEnabledWarning = document.createElement('div');
            jsEnabledWarning.innerHTML = '<div class=\"alert alert-danger text-center\" role=\"alert\">Please enable JavaScript to fully experience this website.</div>';
            document.body.insertBefore(jsEnabledWarning, document.body.firstChild);
        });
      </script>";
echo "<div style='height: 100px;'></div>";
?>