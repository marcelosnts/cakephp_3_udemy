<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">View Article</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('All Articles'),
                    ['controller' => 'Articles', 'action' => 'index'],
                    ['class' => 'btn btn-outline-info btn-sm'])
            ?>
            <?= $this->Html->link(__('Edit'),
                    ['controller' => 'Articles', 'action' => 'edit', $article->id],
                    ['class' => 'btn btn-outline-warning btn-sm'])
            ?>
            <?= $this->Form->postLink(__('Delete'),
                    ['controller' => 'Articles', 'action' => 'delete', $article->id],
                    ['class' => 'btn btn-outline-danger btn-sm', 'confirm' => __('This action cannot be reverted! Are you sure?')])
            ?>
        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Actions
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('All Articles'),
                        ['controller' => 'Articles', 'action' => 'index'],
                        ['class' => 'dropdown-item'])
                ?>
                <?= $this->Html->link(__('Edit'),
                        ['controller' => 'Articles', 'action' => 'edit', $article->id],
                        ['class' => 'dropdown-item'])
                ?>
                <?= $this->Form->postLink(__('Delete'),
                        ['controller' => 'Articles', 'action' => 'delete', $article->id],
                        ['class' => 'dropdown-item', 'confirm' => __('This action cannot be reverted! Are you sure?')])
                ?>
            </div>
        </div>
    </div>
</div><hr>

<?= $this->Flash->render() ?>

<dl class="row">
    <dt class="col-sm-3">Article image</dt>
    <dd class="col-sm-9">
        <div class="profile-img">
            <?php if(!empty($article->image)): ?>
                <?= $this->Html->image('../files/article/' . $article->id . '/' . $article->image,
                        ['class' => '', 'width' => '250', 'height' => '120'])
                ?> &nbsp;
            <?php else: ?>
                <?= $this->Html->image('../files/article/preview_img.jpg',
                        ['class' => '', 'width' => '250', 'height' => '120'])
                ?> &nbsp;
            <?php endif; ?>
            <div class="edit">
                <?= $this->Html->link(
                        '<i class="fa fa-pencil-alt"></i>',
                        ['controller' => 'Articles', 'action' => 'changeArticlePic', $article->id],
                        ['escape' => false]
                    )
                ?>
            </div>
        </div>
    </dd>

    <dt class="col-sm-3">Id</dt>
    <dd class="col-sm-9"><?= $this->Number->format($article->id) ?></dd>

    <dt class="col-sm-3">Title</dt>
    <dd class="col-sm-9"><?= h($article->title) ?></dd>

    <dt class="col-sm-3">Article Description</dt>
    <dd class="col-sm-9"><?= $article->article_description ?></dd>

    <dt class="col-sm-3">Content</dt>
    <dd class="col-sm-9"><?= $article->content ?></dd>

    <dt class="col-sm-3">Slug</dt>
    <dd class="col-sm-9"><?= h($article->slug) ?></dd>

    <dt class="col-sm-3">Keywords</dt>
    <dd class="col-sm-9"><?= h($article->keywords) ?></dd>

    <dt class="col-sm-3">SEO Description</dt>
    <dd class="col-sm-9"><?= h($article->description) ?></dd>

    <dt class="col-sm-3">Brief</dt>
    <dd class="col-sm-9"><?= $article->brief ?></dd>

    <dt class="col-sm-3">Viewed</dt>
    <dd class="col-sm-9"><?= h($article->viewed) ?></dd>

    <dt class="col-sm-3">Robot</dt>
    <dd class="col-sm-9"><?= h($article->robot->name) ?></dd>

    <dt class="col-sm-3">User</dt>
    <dd class="col-sm-9"><?= h($article->user->name) ?></dd>

    <dt class="col-sm-3">Situation</dt>
    <dd class="col-sm-9">
        <span class='badge badge-<?= $article->situation->color->color ?>'><?= $article->situation->situation_name ?></span>
    </dd>

    <dt class="col-sm-3">Type</dt>
    <dd class="col-sm-9"><?= h($article->articles_tp->name) ?></dd>

    <dt class="col-sm-3">Category</dt>
    <dd class="col-sm-9"><?= h($article->articles_cat->name) ?></dd>

    <dt class="col-sm-3 text-truncate">Created at:</dt>
    <dd class="col-sm-9"><?= h($article->created) ?></dd>

    <dt class="col-sm-3 text-truncate">Modified at:</dt>
    <dd class="col-sm-9"><?= h($article->modified) ?></dd>
</dl>
