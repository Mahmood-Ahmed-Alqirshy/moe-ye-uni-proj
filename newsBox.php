<div class="p-4 mb-3 bg-light rounded" id="news-container">
  <?php
  $serverIP = (strlen($_SERVER['SERVER_ADDR']) > 5 ? $_SERVER['SERVER_ADDR'] : "localhost");
  $DB = new PDO('mysql:host=localhost;dbname=moe', 'root', '1234');
  $DB->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
  $sql = "SELECT ID as id, title, post_date as postDate, cover FROM news ORDER BY post_date DESC LIMIT 3;";
  $schools = $DB->prepare($sql);
  $schools->execute();
  $data = $schools->fetchAll();
  foreach ($data as $value) {
    echo '<a href="http://' . $serverIP . '/moe-yemen/news/' . $value->id . '" style="text-decoration: none; color: black;">';
    echo '<div class="row">';
    echo '<img class="col-5 news-thumbnail-img " src="http://' . $serverIP . '/moe-yemen/news/covers/' . $value->cover . '" alt="">';
    echo '<p class="col-7 ellipsis" style="display:flex; align-items:center; justify-content:center;">' . $value->title . '</p>';
    echo '</div>';
    echo '</a>';
    echo '<hr>';
  }
  ?>
</div>