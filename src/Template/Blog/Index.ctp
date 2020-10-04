<main role="main">
    <div class="jumbotron blog">
        <div class="container">
            <h2 class="display-4 text-center blog-titulo">Blog</h2>
            <div class="row">
                <div class="col-md-8 blog-main">

                    <?php foreach($articles as $article): ?>
                        <div class="row featurette">
                            <div class="col-md-7 order-md-2">
                                <h2 class="featurette-heading blog-post-title">
                                    <?= $this->Html->link($article->title,
                                            ['controller' => 'Article', 'action' => 'view', $article->slug],
                                            ['class' => 'cont-lendo-post']
                                        )
                                    ?>
                                </h2>
                                <p class="lead">
                                    <?= $article->article_description ?>
                                    <?= $this->Html->link(__('Keep reading'),
                                            ['controller' => 'Article', 'action' => 'view', $article->slug],
                                            ['class' => 'cont-lendo-post text-danger']
                                        )
                                    ?>
                                </p>
                            </div>
                            <div class="col-md-5 order-md-1">
                                <a href="artigo.html">
                                    <?php
                                        $image = $this->Html->image('../files/article/' . $article->id . '/' . $article->image, [
                                            'class' => 'featurette-image img-fluid mx-auto',
                                            'alt' => $article->title
                                        ]);
                                        echo $this->Html->link($image,
                                            ['controller' => 'Article', 'action' => 'view', $article->slug],
                                            ['escape' => false]
                                        )
                                    ?>
                                </a>
                            </div>
                        </div>
                        <hr class="featurette-divider">
                    <?php endforeach; ?>

                    <?= $this->element('site_pagination') ?>
                </div>

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
                                </>
                            <?php endforeach; ?>
                        </ol>
                    </div>

                    <div class="p-3">
                        <h4 class="font-italic">Redes Sociais</h4>
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

        </div>
    </div>
</main>
