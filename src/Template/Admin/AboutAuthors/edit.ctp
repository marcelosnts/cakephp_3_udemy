<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AboutAuthor $aboutAuthor
 */
?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Edit About Author</h2>
    </div>
</div>

<?= $this->Flash->render() ?>

<?= $this->Form->create($aboutAuthor) ?>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label><span class="text-danger">*</span> Title</label>
            <?= $this->Form->control('title', ['class' => 'form-control', 'placeholder' => 'Title', 'label' => false]) ?>
        </div>
        <div class="form-group col-md-6">
            <label><span class="text-danger">*</span> Situation</label>
            <?= $this->Form->control('situation', ['class' => 'form-control', 'placeholder' => 'Situation', 'label' => false]) ?>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-12">
            <label><span class="text-danger">*</span> Description</label>
            <?= $this->Form->control('description', ['class' => 'form-control', 'id' => 'ck-one', 'placeholder' => 'Username', 'label' => false]) ?>
        </div>
    </div>

    <p>
        <span class="text-danger">* </span>Campo obrigatório
    </p>
    <button type="submit" class="btn btn-warning">Salvar</button>

<?= $this->Form->end() ?>

<?= $this->element('ckeditor') ?>
