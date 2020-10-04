<main role="main">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php
                $slide_marc = 0;
                foreach($carousels as $carousel){
                    if($slide_marc == 0){
                    echo '<li data-target="#myCarousel" data-slide-to="'.$slide_marc.'" class="active"></li>';
                    }else{
                    echo '<li data-target="#myCarousel" data-slide-to="'.$slide_marc.'"></li>';
                    }
                    $slide_marc++;
                }
            ?>
        </ol>
        <div class="carousel-inner">
            <?php
                $slide_count = 0;
                foreach($carousels as $carousel){
                    if($slide_count == 0){
                        echo '<div class="carousel-item active">';
                    }else{
                        echo '<div class="carousel-item">';
                    }

                    echo $this->Html->image('../files/carousel/'.$carousel->id . '/'.$carousel->image, ['class' => 'first-slide img-fluid', 'alt' => 'First slide']);
                    echo '<div class="container">';
                    echo '<div class="carousel-caption '.$carousel->position->position.'">';

                    if($carousel->title != ""){
                        echo '<h1 class="d-none d-md-block">' . $carousel->title . '</h1>';
                    }
                    if($carousel->description != ""){
                        echo '<p class="d-none d-md-block">' . $carousel->description . '</p>';
                    }
                    if(($carousel->button_title != "") AND ($carousel->link != "") AND ($carousel->color_id != "")){
                        echo '<p><a class="btn btn-lg btn-'.$carousel->color->color.'" href="'.$carousel->link.'" role="button">'.$carousel->button_title.'</a></p>';
                    }

                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    $slide_count++;
                }
            ?>

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

    <div class="jumbotron servicos">
        <div class="container">
            <h2 class="display-4 text-center titulo-servicos"><?= $services->title ?></h2>
            <div class="card-deck">
                <div class="card text-center">
                    <div class="tamanho-icone">
                        <i class="<?= $services->icon_sv_one ?>"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $services->title_sv_one ?></h5>
                        <p class="card-text"><?= $services->desc_sv_one ?></p>
                    </div>
                </div>
                <div class="card text-center">
                    <div class="tamanho-icone">
                        <i class="<?= $services->icon_sv_two ?>"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $services->title_sv_two ?></h5>
                        <p class="card-text"><?= $services->desc_sv_two ?></p>
                    </div>
                </div>
                <div class="card text-center">
                    <div class="tamanho-icone">
                        <i class="<?= $services->icon_sv_three ?>"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $services->title_sv_three ?></h5>
                        <p class="card-text"><?= $services->desc_sv_three ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="jumbotron depoimento">
        <div class="container">
            <h2 class="display-4 text-center titulo-depoimento"><?= $depoinments->depoinment_name ?></h2>
            <p class="lead text-center desc-depoimento"><?= $depoinments->depoinment_desc ?></p>
            <div class="card-deck">
                <div class="card text-center">
                    <div class="embed-responsive embed-responsive-16by9">
                        <?= $depoinments->video_one ?>
                    </div>
                </div>
                <div class="card text-center">
                    <div class="embed-responsive embed-responsive-16by9">
                        <?= $depoinments->video_two ?>
                    </div>
                </div>
                <div class="card text-center">
                    <div class="embed-responsive embed-responsive-16by9">
                    <?= $depoinments->video_three ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="jumbotron ult-art">
        <div class="container">
            <h2 class="display-4 text-center titulo-ult-art">Ultimos Artigos</h2>
            <p class="lead text-center desc-depoimento">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
            <div class="card-deck">
                <?php foreach($lastArticles as $lastArticle): ?>
                    <div class="card text-center">
                        <?php
                            $image = $this->Html->image('../files/article/' . $lastArticle->id . '/' . $lastArticle->image,
                                        ['class' => 'card-img-top']
                                    );

                            echo $this->Html->link($image,
                                    ['controller' => 'Article', 'action' => 'view', $lastArticle->slug], ['escape' => false]
                                );
                        ?>
                        <div class="card-body">
                            <h5 class="card-title title-post-home">
                                <?= $this->Html->link($lastArticle->title, ['controller' => 'Article', 'action' => 'view', $lastArticle->slug]) ?>
                            </h5>
                            <p class="card-text"><?= $lastArticle->description ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</main>
