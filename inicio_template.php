<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v7.0"></script>
    <div class="container d-flex flex-column">
        <div class="row d-flex flex-row">
            <div class="col-xl-7 d-flex flex-column desc">
                <div>
                  <h2 class="title"><strong><?php echo $entries->title;?></strong></h2>
                      <p><?php echo explode('PARTICIPANTES',$entries->description)[0];?></p>
                    <div class="row no-gutters d-flex flex-row">
                      <div class="col-xl-3 d-flex flex-column justify-content-center align-items-center">
                        <!-- Start: Links -->
                        <ul class="list-inline d-flex flex-row">
                            <li class="list-inline-item"><a href="https://open.spotify.com/show/123R2sTGjaiP3xaOkg8nhP?si=GXQH0PpHQhaS4HFg8v4UsA" style="color: rgb(61,61,61);"><i class="fab fa-spotify" style="font-size: 32px;"></i></a></li>
                            <li class="list-inline-item"><a href="https://www.deezer.com/br/show/1292132" style="color: rgb(61,61,61);"><img style="width: 32px;height: 32px;" src="assets\img\49080.png"></a></li>
                            <li class="list-inline-item"><a href="https://castbox.fm/channel/O-Cinema-%C3%A9-id2886716?country=us" style="color: rgb(61,61,61);"><img style="width: 32px;height: 32px;" src="assets\img\castbox_podcastcidademarekting.jpg"></a></li>
                        </ul>
                        <!-- End: Links -->
                        </div>
                        <div class="col-xl-3 text-monospace d-flex flex-column justify-content-xl-center">
                            <p class="text-center" style="font-size: .8em;">DURAÇÃO: <?php echo get_duration($duration); ?></p></p>
                        </div>
                        <div class="col-xl-6 d-flex flex-column justify-content-xl-center">
                            <p class="text-monospace text-center" style="font-size: .8em;">PARTICIPANTES: <?php  echo get_participantes($entries->description); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col d-flex flex-column justify-content-center player" >

                <img id="img-player"class="img-fluid" src="<?php echo $thumbnail;?>" style="width: 420px;pointer-events: none;z-index: 2;">

                <iframe style="position:relative; top:-100px;z-index: 1;" id="playerFrame" src="https://castbox.fm/app/castbox/player/id2886716/id<?php echo $id; ?>?v=8.22.10&autoplay=0&hide_list=1"  frameborder="0" width="100%" height="200px"></iframe>

            </div>
        </div>
        <div class="row d-flex flex-row" id="row-recent">
            <div class="col-xl-7">
                <div class="row" style="margin-top: 5%;">
                    <div class="col">
                        <h4><strong>Episódios Recentes</strong></h4>
                        <ul class="list-group" style="margin-top: 5vh;">
                          <?php foreach($all_entries as $key=>$entry): ?>

                          <li class="list-group-item">
                              <div class="row d-flex flex-row">
                                  <div class="col-xl-2 d-flex flex-column align-items-center justify-content-xl-center align-items-xl-center recent"><button onclick="location.href='inicio?episodio=<?php echo rawurlencode($entry->title) ;?>'"class="btn shadow-none" type="button" style="height: 100%;"><i class="fa fa-play-circle" style="font-size: 50px;"></i></button></div>
                                  <div class="col d-flex flex-column">
                                      <h5><strong><?php echo $entry->title;?></strong></h5>
                                      <p style="font-weight:300;"><?php echo explode('PARTICIPANTES',strip_tags($entry->description))[0];?></p>
                                      <p class="text-monospace text-center" style="font-size: .8em;">DURAÇÃO: <?php echo get_duration($durations[$key]);?></p>
                                  </div>
                              </div>
                          </li>
                        <?php endforeach; ?>
                        </ul><a class="d-block btn btn-dark" href="episodios" style="width: 235px;margin-right: auto;margin-left: auto;margin-top: 3%;margin-bottom: 3%;">VER TODOS OS EPISÓDIOS</a></div>

                </div>
            </div>
            <div class="col mt-5">
<div class="fb-comments" data-colorscheme="light" data-href="<?php echo $page_link;?>" data-numposts="5" data-width="100%"></div>

            </div>
        </div>
    </div>
