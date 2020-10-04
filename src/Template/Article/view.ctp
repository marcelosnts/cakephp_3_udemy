<main role="main">
    <div class="jumbotron blog">
        <div class="container">
            <div class="row">
                <div class="col-md-8 blog-main">
                    <?php if($article): ?>
                        <div class="blog-post">
                            <h2 class="blog-post-title"><?= $article->title ?></h2>
                            <p class="blog-post-meta">
                                <?php
                                    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                                    date_default_timezone_set('America/Sao_Paulo');
                                    $date = date_format($article->created, 'Y-m-d H:i:s');

                                    echo strftime('%d de %B de %Y', strtotime($date));
                                ?>
                            </p>

                            <?= $article->content ?>
                        </div><!-- /.blog-post -->

                        <nav class="blog-pagination">
                            <?php
                                if($articlePrev){
                                    echo $this->Html->link(__('Previous'),
                                        ['controller' => 'Article', 'action' => 'view', $articlePrev->slug],
                                        ['class' => 'btn btn-outline-primary']
                                    );
                                }else{
                                    echo '<button class="btn btn-outline-secondary disabled">Previous</button>';
                                }
                                echo '&nbsp';
                                if($articleNext){
                                    echo $this->Html->link(__('Next'),
                                        ['controller' => 'Article', 'action' => 'view', $articleNext->slug],
                                        ['class' => 'btn btn-outline-primary']
                                    );
                                }else{
                                    echo '<button class="btn btn-outline-secondary disabled">Next</button>';
                                }
                            ?>
                        </nav>
                    <?php else: ?>
                        <div class="alert alert-danger">
                            Article not found!
                        </div>
                    <?php endif; ?>
                </div><!-- /.blog-main -->

                <aside class="col-md-4 blog-sidebar">
                    <?php if($aboutAuthor && $aboutAuthor->situation_id == 1) : ?>
                        <div class="p-3 mb-3 bg-light rounded">
                            <h4 class="font-italic"><?= $aboutAuthor->title ?></h4>
                            <p class="mb-0"><?= $aboutAuthor->description ?></p>
                        </div>
                    <?php endif; ?>

                    <div class="p-3">
                        <h4 class="font-italic">Recently posted</h4>
                        <ol class="list-unstyled mb-0">
                            <?php foreach($lastArticles as $lastArticle): ?>
                                <li>
                                    <?= $this->Html->link($lastArticle->title,
                                            ['controller' => 'Article', 'action' => 'view', $lastArticle->slug]
                                        );
                                    ?>
                                </li>
                            <?php endforeach; ?>
                        </ol>
                    </div>

                    <div class="p-3">
                        <h4 class="font-italic">Destaques</h4>
                        <ol class="list-unstyled">
                            <?php foreach($spotlightArticles as $spotlightArticle): ?>
                                <li>
                                    <?= $this->Html->link($spotlightArticle->title,
                                            ['controller' => 'Article', 'action' => 'view', $spotlightArticle->slug]
                                        );
                                    ?>
                                </li>
                            <?php endforeach; ?>
                        </ol>
                    </div>

                    <div class="p-3">
                        <h4 class="font-italic">Social Medias</h4>
                        <ol class="list-unstyled">
                            <?php foreach($socialNets as $socialNet): ?>
                                <li>
                                    <a href="<?= $socialNet->link ?>"> <span class="<?= $socialNet->icon ?>"></span> <?= $socialNet->title ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ol>
                    </div>
                </aside><!-- /.blog-sidebar -->

            </div><!-- /.row -->


            <hr class="featurette-divider">
        </div>
    </div>
</main>
