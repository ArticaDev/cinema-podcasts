

        <div>
            <div class="row d-flex flex-row" style="margin-top: 2vh;">
                <div class="col-xl-4 d-flex flex-column align-self-start justify-content-xl-end"><form id="search" class="form-inline d-flex justify-content-center md-form form-sm mt-0 mb-0">
  <i class="fas fa-search" aria-hidden="true"></i>
  <input id="search-input" class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Pesquisar"
    aria-label="Search">
</form></div>
                <div class="col" style="height: 0px;;"></div>
<!--                 <div class="col d-flex flex-column align-self-start justify-content-xl-center align-items-xl-end" id="categories"><select class="browser-default custom-select mb-0">
  <option selected>Categoria</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select></div> -->
            </div>
            <!-- Start: Rows --><div id="eps" class="row row-cols-1 row-cols-md-3 mt-4">
    <!-- Card -->


<!-- template para novo card -->
<?php foreach($entries as $key=>$entry): ?>

  <div class="col mb-4">
     <div class="card h-100">
        <div class="view overlay">

           <!-- thumbnail com botao play -->
           <div id="thumbnail" class="thumbContainer">
             <a href="inicio?episodio=<?php echo $entry->title ;?>">
              <img   class="card-img-top " src="<?php echo $thumbnails[$key];?>"
                 alt="Card image cap">
                 </a>
              <i  class="playBtn fa-4x far  fa-play-circle"></i>
           </div>

            <!-- Descricao do podcast -->
           <div style="display: none" id="description">
             <?php echo '<br>'.explode("Site", $entry->description)[0];?>
           </div>
        </div>
        <!--Card content-->
        <div class="card-body">
           <!--Title-->
           <h4 class="card-title"><?php echo $entry->title?></h4>
           <!--Text-->

           <p class="card-text mt-3 text-monospace d-flex justify-content-center text-uppercase">Duração: <?php echo get_duration($durations[$key]);?></p>
           <p class="card-text mt-3 text-monospace d-flex justify-content-center text-uppercase">Data de envio: <?php echo (new DateTime($entry->pubDate))->format('d/m/Y'); ?></p>
           <a class="btn d-flex justify-content-center btn-dark " id="more" >Ver Mais</a>
        </div>
     </div>
  </div>
<?php endforeach; ?>

<!-- fim do template -->



</div>
      <a id="see-more" class="d-block btn btn-dark" href="#" style="width: 235px;margin-right: auto;margin-left: auto;margin-top: 3%;margin-bottom: 3%;">VER TODOS OS EPISÓDIOS</a></div>
  
