<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Add Article</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
                <?= $this->Html->link(__('All Articles'), ['controller' => 'Articles', 'action' => 'index'], ['class' => 'btn btn-outline-info btn-sm']) ?>
            </span>
            <div class="dropdown d-block d-md-none">
                <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Actions
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                    <?= $this->Html->link(__('All Articles'), ['controller' => 'Articles', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
                </div>
            </div>
    </div>
</div><hr>

<?= $this->Flash->render() ?>

<?= $this->Form->create($article, ['enctype' => 'multipart/form-data']) ?>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label><span class="text-danger">*</span> Title</label>
            <?= $this->Form->control('title', ['class' => 'form-control', 'placeholder' => 'Title', 'label' => false]) ?>
        </div>

        <div class="form-group col-md-6">
            <label><span class="text-danger">*</span> Slug</label>
            <?= $this->Form->control('slug', ['class' => 'form-control', 'placeholder' => 'Slug', 'label' => false]) ?>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-12">
            <label><span class="text-danger">*</span> Description</label>
            <?= $this->Form->control('article_description', ['class' => 'form-control', 'id' => 'ck-one', 'placeholder' => 'Description', 'rows' => 4, 'label' => false]) ?>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-12">
            <label> Content</label>
            <?= $this->Form->control('content', ['class' => 'form-control', 'id' => 'ck-two', 'placeholder' => 'Content', 'rows' => 4, 'label' => false]) ?>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label> Keywords</label>
            <?= $this->Form->control('keywords', ['class' => 'form-control', 'placeholder' => 'Keywords', 'label' => false]) ?>
        </div>

        <div class="form-group col-md-6">
            <label> SEO Description</label>
            <?= $this->Form->control('description', ['class' => 'form-control', 'placeholder' => 'SEO Description', 'label' => false]) ?>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-12">
            <label> Brief</label>
            <?= $this->Form->control('brief', ['class' => 'form-control', 'id' => 'ck-three', 'placeholder' => 'Brief', 'rows' => 4, 'label' => false]) ?>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label><span class="text-danger">*</span> Robot</label>
            <?= $this->Form->control('robot_id', ['class' => 'form-control', 'label' => false]) ?>
        </div>

        <div class="form-group col-md-6">
            <label><span class="text-danger">*</span> Situation</label>
            <?= $this->Form->control('situation_id', ['class' => 'form-control', 'label' => false]) ?>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label><span class="text-danger">*</span> Type</label>
            <?= $this->Form->control('articles_tp_id', ['class' => 'form-control', 'label' => false]) ?>
        </div>

        <div class="form-group col-md-6">
            <label><span class="text-danger">*</span> Category</label>
            <?= $this->Form->control('articles_cat_id', ['class' => 'form-control', 'label' => false]) ?>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label><span class="text-danger">*</span> Article Image (500x400)</label>
            <?= $this->Form->control('image', ['type' => 'file', 'label' => false, 'onChange' => 'previewImage()']) ?>
        </div>

        <div class="form-group col-md-6">
            <?php
                if($article->image !== null){
                    $old_image = '../../files/article/' . $article->id . '/' . $article->image;
                }else{
                    $old_image = '../../files/article/preview_img.jpg';
                }
            ?>

            <img id="preview-img" src="<?= $old_image ?>" alt="<?= $article->name ?>" class="img-thumbnail" style="width: 250px; height: 150px">
        </div>
    </div>

    <p>
        <span class="text-danger">* </span>Required
    </p>

    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>

<?= $this->Form->end() ?>

<?= $this->element('ckeditor') ?>
