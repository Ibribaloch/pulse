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
  </div>
  <script src="scripts\app.min.js"></script>
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