<main role="main">
    <div class="jumbotron sobre-empresa">
        <div class="container">
            <h2 class="display-4 text-center sob-emp-titulo">About us</h2>

            <?php
                foreach($aboutComps as $key => $aboutComp){
            ?>
                <div class="row featurette">
                    <?php if($key % 2 == 0): ?>
                        <div class="col-md-7 order-md-2">
                    <?php else: ?>
                        <div class="col-md-7">
                    <?php endif; ?>

                        <h2 class="featurette-heading"><?= $aboutComp->title ?></h2>
                        <p class="lead"><?= $aboutComp->description ?></p>
                    </div>
                    <div class="col-md-5 order-md-1">
                        <?=
                            $this->Html->image('../files/aboutComp/' . $aboutComp->id . '/' . $aboutComp->image, [
                                'class' => 'featurette-image img-fluid mx-auto',
                                'alt' => 'Company image'
                            ])
                        ?>
                    </div>
                </div>

                <hr class="featurette-divider">
            <?php
                }
            ?>
        </div>
    </div>
</main>

