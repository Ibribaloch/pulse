<?php
include('usercheck.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('header.php'); ?>
</head>
<body>
  <div class="app dk" id="app">
    <?php include('sidebar.php'); ?>
    <div id="content" class="app-content white bg box-shadow-z2" role="main">
      <div class="app-header hidden-lg-up white lt box-shadow-z1">
      </div>
        <?php include('footer.php'); ?>
      <div class="app-body" id="view">
        <div class="page-content">
          <div class="row-col">
            <div class="col-lg-9 b-r no-border-md">
              <div class="padding">
                <div class="page-title m-b">
                <h1 class="inline m-a-0">Browse</h1>
                <?php include('genre.php'); ?>
                    <div id="songContainer" class="row">
                      <?php include('song.php'); ?>
                    </div>
                  <div class="text-center"><a href="scroll.item.html" class="btn btn-sm white rounded jscroll-next">Show
                      More</a></div>
                </div>
              </div>
            </div>
            <?php include('likes.php'); ?>
          </div>
        </div>
      </div>
    </div>
    <?php include('switcher.php'); ?>
    <div class="modal white lt fade" id="search-modal" data-backdrop="false"><a data-dismiss="modal"
        class="text-muted text-lg p-x modal-close-btn">&times;</a>
      <div class="row-col">
        <div class="p-a-lg h-v row-cell v-m">
          <div class="row">
            <div class="col-md-8 offset-md-2">
              <form action="https://flatfull.com/themes/pulse/search.html" class="m-b-md">
                <div class="input-group input-group-lg"><input type="text" class="form-control"
                    placeholder="Type keyword" data-ui-toggle-class="hide" data-ui-target="#search-result"> <span
                    class="input-group-btn"><button class="btn b-a no-shadow white" type="submit">Search</button></span>
                </div>
              </form>
              <div id="search-result" class="animated fadeIn">
                <p class="m-b-md"><strong>23</strong> <span class="text-muted">Results found
                    for:</span><strong>Keyword</strong></p>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="row item-list item-list-sm item-list-by m-b">
                      <div class="col-xs-12">
                        <div class="item r" data-id="item-9"
                          data-src="http://api.soundcloud.com/tracks/264094434/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                          <div class="item-media"><a href="track.detail.html" class="item-media-content"
                              style="background-image: url('images/b8.jpg')"></a></div>
                          <div class="item-info">
                            <div class="item-title text-ellipsis"><a href="track.detail.html">All I Need</a></div>
                            <div class="item-author text-sm text-ellipsis"><a href="artist.detail.html"
                                class="text-muted">Pablo Nouvelle</a></div>
                            <div class="item-meta text-sm text-muted"></div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-12">
                        <div class="item r" data-id="item-10"
                          data-src="http://api.soundcloud.com/tracks/237514750/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                          <div class="item-media"><a href="track.detail.html" class="item-media-content"
                              style="background-image: url('images/b9.jpg')"></a></div>
                          <div class="item-info">
                            <div class="item-title text-ellipsis"><a href="track.detail.html">The Open Road</a></div>
                            <div class="item-author text-sm text-ellipsis"><a href="artist.detail.html"
                                class="text-muted">Postiljonen</a></div>
                            <div class="item-meta text-sm text-muted"></div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-12">
                        <div class="item r" data-id="item-2"
                          data-src="http://api.soundcloud.com/tracks/259445397/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                          <div class="item-media"><a href="track.detail.html" class="item-media-content"
                              style="background-image: url('images/b1.jpg')"></a></div>
                          <div class="item-info">
                            <div class="item-title text-ellipsis"><a href="track.detail.html">Fireworks</a></div>
                            <div class="item-author text-sm text-ellipsis"><a href="artist.detail.html"
                                class="text-muted">Kygo</a></div>
                            <div class="item-meta text-sm text-muted"></div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-12">
                        <div class="item r" data-id="item-4"
                          data-src="http://api.soundcloud.com/tracks/230791292/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                          <div class="item-media"><a href="track.detail.html" class="item-media-content"
                              style="background-image: url('images/b3.jpg')"></a></div>
                          <div class="item-info">
                            <div class="item-title text-ellipsis"><a href="track.detail.html">What A Time To Be
                                Alive</a></div>
                            <div class="item-author text-sm text-ellipsis"><a href="artist.detail.html"
                                class="text-muted">Judith Garcia</a></div>
                            <div class="item-meta text-sm text-muted"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="row item-list item-list-sm item-list-by m-b">
                      <div class="col-xs-12">
                        <div class="item">
                          <div class="item-media rounded"><a href="artist.detail.html" class="item-media-content"
                              style="background-image: url('images/a1.jpg')"></a></div>
                          <div class="item-info">
                            <div class="item-title text-ellipsis"><a href="artist.detail.html">James Garcia</a>
                              <div class="text-sm text-muted">9 songs</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-12">
                        <div class="item">
                          <div class="item-media rounded"><a href="artist.detail.html" class="item-media-content"
                              style="background-image: url('images/a8.jpg')"></a></div>
                          <div class="item-info">
                            <div class="item-title text-ellipsis"><a href="artist.detail.html">Sara King</a>
                              <div class="text-sm text-muted">14 songs</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-12">
                        <div class="item">
                          <div class="item-media rounded"><a href="artist.detail.html" class="item-media-content"
                              style="background-image: url('images/a9.jpg')"></a></div>
                          <div class="item-info">
                            <div class="item-title text-ellipsis"><a href="artist.detail.html">Douglas Torres</a>
                              <div class="text-sm text-muted">20 songs</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-12">
                        <div class="item">
                          <div class="item-media rounded"><a href="artist.detail.html" class="item-media-content"
                              style="background-image: url('images/a5.jpg')"></a></div>
                          <div class="item-info">
                            <div class="item-title text-ellipsis"><a href="artist.detail.html">Judy Woods</a>
                              <div class="text-sm text-muted">23 songs</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="top-search" class="btn-groups"><strong class="text-muted">Top searches:</strong> <a href="#"
                  class="btn btn-xs white">Happy</a> <a href="#" class="btn btn-xs white">Music</a> <a href="#"
                  class="btn btn-xs white">Weekend</a> <a href="#" class="btn btn-xs white">Summer</a> <a href="#"
                  class="btn btn-xs white">Holiday</a> <a href="#" class="btn btn-xs white">Blue</a> <a href="#"
                  class="btn btn-xs white">Soul</a> <a href="#" class="btn btn-xs white">Calm</a> <a href="#"
                  class="btn btn-xs white">Nice</a> <a href="#" class="btn btn-xs white">Home</a> <a href="#"
                  class="btn btn-xs white">SLeep</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="share-modal" class="modal fade animate">
      <div class="modal-dialog">
        <div class="modal-content fade-down">
          <div class="modal-header">
            <h5 class="modal-title">Share</h5>
          </div>
          <div class="modal-body p-lg">
            <div id="share-list" class="m-b"><a href="#"
                class="btn btn-icon btn-social rounded btn-social-colored indigo" title="Facebook"><i
                  class="fa fa-facebook"></i> <i class="fa fa-facebook"></i></a> <a href="#"
                class="btn btn-icon btn-social rounded btn-social-colored light-blue" title="Twitter"><i
                  class="fa fa-twitter"></i> <i class="fa fa-twitter"></i></a> <a href="#"
                class="btn btn-icon btn-social rounded btn-social-colored red-600" title="Google+"><i
                  class="fa fa-google-plus"></i> <i class="fa fa-google-plus"></i></a> <a href="#"
                class="btn btn-icon btn-social rounded btn-social-colored blue-grey-600" title="Trumblr"><i
                  class="fa fa-tumblr"></i> <i class="fa fa-tumblr"></i></a> <a href="#"
                class="btn btn-icon btn-social rounded btn-social-colored red-700" title="Pinterst"><i
                  class="fa fa-pinterest"></i> <i class="fa fa-pinterest"></i></a></div>
            <div><input class="form-control" value="http://plamusic.com/slug"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="scripts/app.min.js"></script>
  <script>
document.addEventListener('DOMContentLoaded', function() {
    // Function to load songs based on genre
    function loadSongs(genre) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'song.php?genre=' + encodeURIComponent(genre), true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById('songContainer').innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    }

    // Add event listener to genre dropdown items
    document.querySelectorAll('#genreDropdown .dropdown-item').forEach(function(item) {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            var genre = this.getAttribute('data-genre');
            loadSongs(genre);
            document.querySelector('#genreDropdown .dropdown-item.active').classList.remove('active');
            this.classList.add('active');
            document.querySelector('.btn.dropdown-toggle').textContent = this.textContent;
        });
    });
});
</script>

</body>
</html>