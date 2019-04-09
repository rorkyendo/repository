<div class=" col-9" id="collapsibleNavbar" >
            <form class="" action="<?php echo base_url()?>repository/page/search" method="get">
              <div class="input-group">
                <input type="text" class="form-control" name="title" placeholder="Search by Title...">&nbsp;
              </div>
              <br>
              <div class="input-group">
                    <input type="text" class="form-control" name="author" placeholder="Search by Author...">&nbsp;
                    <input type="text" class="form-control" name="category" placeholder="Search by Category...">&nbsp;
              </div>
              <br>
              <button class="btn btn-primary col-md-4" type="submit">
                <i class="fa fa-search">Cari</i>
              </button>
            </form>
              <div class="row"> &nbsp; </div>
              <div class="row"> &nbsp; </div>
              <?php if($this->session->userdata('search')==false){ ?>
              <div class="row">
                <h2 style="font-family :Arial ;font-size:20px;"><b> Recently Added </b></h2>
              </div>
              <?php } ?>
              <br>
                <?php foreach ($repository as $key): ?>
                  <div class="row">
                  <div class="col-md-3">
                    <div class="card shadow-sm h-md-250">
                      <img src="<?php echo base_url().$key->repository_cover_image?>" height="200px" class="img-responsive" alt="">
                    </div>
                  </div>
                  <div class="col-md-9">
                  <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                      <strong class="d-inline-block mb-2 text-primary"><?php echo $key->nama_repository_category?></strong>
                      <h3 class="mb-0">
                        <a class="text-dark" href="<?php echo base_url().'repository/page/detail/'.$key->id_repository?>"><?php echo $key->title?></a>
                      </h3>
                      <div class="mb-1 text-muted"><?php echo $key->nama_depan." ".$key->nama_belakang ?> (<?php echo date("Y-m-d D",strtotime($key->created_time))?>)</div>
                      <hr>
                      <p class="card-text mb-auto">
                        <?php
                        // strip tags to avoid breaking any html
                        $string = strip_tags($key->abstract);
                        if (strlen($string) > 250) {

                        // truncate string
                        $stringCut = substr($string, 0, 250);
                        $endPoint = strrpos($stringCut, ' ');

                        //if the string doesn't contain any space then it will cut without word basis.
                        $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                        $string .= '...';
                        }
                        ?>
                        <?php echo $string?>
                      </p>
                      <a href="<?php echo base_url().'repository/page/detail/'.$key->id_repository?>">Continue reading</a>
                    </div>
                  </div>
                </div>
              </div>
              <br>
            <?php endforeach; ?>
              <?php echo $links ?>
<br>
  </div>
