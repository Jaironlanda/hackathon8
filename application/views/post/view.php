  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4"><?php echo $postContent[0]->post_title ?></h1>

        <!-- Author -->
        <p class="lead">
          by
          <?php echo $postContent[0]->username ?>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Posted on <?php echo date("d, D M Y", strtotime($postContent[0]->post_date)) ?></p>

        <hr>

        <!-- Preview Image -->
        <!-- <img class="img-fluid rounded" src="http://placehold.it/900x300" alt=""> -->

        <!-- <hr> -->

        <!-- Post Content -->
        <p><?php echo $postContent[0]->post_content ?></p>

        <hr>
      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <!-- <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div> -->



        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header"><i class="fab fa-twitter"></i> #Twitter</h5>
          <div class="card-body">
          <blockquote class="twitter-tweet"><p lang="in" dir="ltr">KUNJUNGAN HORMAT KEPADA TYT YANG DIPERTUA NEGERI SABAH OLEH NAIB CANSELOR UMS.<br><br>Foto oleh : Korporat UMS <a href="https://t.co/5PC9zQvlfw">pic.twitter.com/5PC9zQvlfw</a></p>&mdash; UMS Official (@UMS_EcoCampus) <a href="https://twitter.com/UMS_EcoCampus/status/1108277393695870976?ref_src=twsrc%5Etfw">March 20, 2019</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->