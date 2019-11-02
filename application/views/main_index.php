      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <!-- <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li> -->
        </ol>
        <div class="carousel-inner">
          
        <div class="carousel-item active">
            <!-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></svg> -->
            <img src="<?php echo base_url('assets/slider/pic1.png') ?>" alt="Dean">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1>DEAN - PROFESOR MADYA DR.</h1>
                <p>AG. ASRI BIN AG. IBRAHIM</p>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <!-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></svg> -->
            <img src="<?php echo base_url('assets/slider/pic3.jpg') ?>" alt="Dean">
            <div class="container">
              <!-- <div class="carousel-caption">
                <h1>Another example headline.</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
              </div> -->
            </div>
          </div>
          
          <!-- <div class="carousel-item">
            <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></svg>
            <img src="<?php //echo base_url('assets/slider/pic2.jpg') ?>" alt="Dean">
            <div class="container">
              <div class="carousel-caption text-right">
                <h1>Another example headline.</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
              </div>
            </div>
          </div> -->
          <!-- <div class="carousel-item">
            <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></svg>
            <div class="container">
              <div class="carousel-caption text-right">
                <h1>One more for good measure.</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
              </div>
            </div>
          </div> -->

        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <!-- Content -->
      <div class="container">
        <!-- <h1 class="featurette-heading"><b>Faculty Of Computing & Informatics</b></h1> -->
        <!-- <p>
          Faculty of Computing and Informatics (FCI) known as Labuan School of Informatics Science (LSIS) 
          was established in May 1999, offering prgrammes in the field of information technology, which is characterised as 
          ‘soft science’ and oriented towards the business environment. In October 2003 Universiti Malaysia Sabah was recognised 
          by Multimedia Development Corporation (MDeC) for ICT- facilitated business that develop or use multimedia technologies to 
          produce and enhance their products and services (quality graduates). Originally, LSIS offered two programmes during its 
          establishment. However on the 1st of June 2014, LSIS was transformed to Faculty and named Faculty of Computing and Informatics (FCI).
        </p> -->
        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Faculty Of Computing & Informatics</h2>
            <p class="lead">Faculty of Computing and Informatics (FCI) known as Labuan School of Informatics Science (LSIS) 
          was established in May 1999. In October 2003 Universiti Malaysia Sabah was recognised by Multimedia Development Corporation (MDeC) for ICT- facilitated business that develop or use multimedia technologies to 
          produce and enhance their products and services (quality graduates). On the 1st of June 2014, LSIS was transformed to Faculty and named Faculty of Computing and Informatics (FCI).</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="<?php echo base_url('assets/img-web/front-page-1.png') ?>" alt="Generic placeholder image">
          </div>
        </div>
        <hr class="featurette-divider">
        
        <div class="row">
          <div class="col-lg-8">
            <div class="card mb-4 border-primary shadow-sm">
                <div class="card-header">
                  <h4><i class="far fa-newspaper"></i> News | <a href="<?php echo base_url() ?>Main/listPost/1">More</a></h4> 
                </div>
                <?php if($listNews != false){
                  echo '<ul class="list-group list-group-flush">';
                  foreach ($listNews as $news) {
                    echo '<li class="list-group-item"><div class="card-text"><a href="'.base_url("Post/view/".$news->post_type_id."/".$news->post_id).'">'.$news->post_title.'</a></div> <small class="text-muted">'. date("d/m/Y", strtotime($news->post_date)).'</small></li>';
                  }
                  echo '</ul>';
                }else{
                  echo 
                  '<ul class="list-group list-group-flush">
                    No News
                  </ul>';
                }

                ?>
            </div>
            <div class="card mb-4 border-primary shadow-sm">
                <div class="card-header">
                  <h4><i class="far fa-calendar-alt"></i> Event(s) | <a href="<?php echo base_url() ?>Main/listPost/2">More</a></h4>
                </div>
                <?php if($listEvents != false){
                    echo '<ul class="list-group list-group-flush">';
                    foreach ($listEvents as $event) {
                      echo '<li class="list-group-item"><div class="card-text"><a href="'.base_url("Post/view/".$event->post_type_id."/".$event->post_id).'">'.$event->post_title.'</a></div> <small class="text-muted">'. date("d/m/Y", strtotime($event->post_date)).'</small></li>';
                  }
                  echo '</ul>';
                }else{
                  echo 
                    '<ul class="list-group list-group-flush">
                        No News
                    </ul>';
                }

                ?>
            </div>
          </div>
          <div class="col-lg-4">
              <div class="lead">
                <u>
                  #Twitter
                </u>
              </div>
              <blockquote class="twitter-tweet"><p lang="in" dir="ltr">KUNJUNGAN HORMAT KEPADA TYT YANG DIPERTUA NEGERI SABAH OLEH NAIB CANSELOR UMS.<br><br>Foto oleh : Korporat UMS <a href="https://t.co/5PC9zQvlfw">pic.twitter.com/5PC9zQvlfw</a></p>&mdash; UMS Official (@UMS_EcoCampus) <a href="https://twitter.com/UMS_EcoCampus/status/1108277393695870976?ref_src=twsrc%5Etfw">March 20, 2019</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
        </div>
        <hr class="featurette-divider">
        </div>
      <!-- /.container -->
      
</body>

