<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Service $service
 */
?>

<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Edit <?= $service->title ?></h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('View'),
                    ['controller' => 'Services', 'action' => 'view', $service->id],
                    ['class' => 'btn btn-outline-success btn-sm'])
            ?>
        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Actions
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('View'),
                        ['controller' => 'Services', 'action' => 'view', $service->id],
                        ['class' => 'dropdown-item'])
                ?>
            </div>
        </div>
    </div>
</div><hr>
<?= $this->Flash->render() ?>

<?= $this->Form->create($service) ?>

    <div class="form-row">
        <div class="form-group col-md-12">
            <label><span class="text-danger">*</span> Title</label>
            <?= $this->Form->control('sv_title', ['class' => 'form-control', 'placeholder' => 'Service Title', 'label' => false]) ?>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label><span class="text-danger">*</span> Icon Sv 1</label>
            <?= $this->Form->control('icon_sv_one', ['class' => 'form-control', 'placeholder' => 'Icon Sv 1', 'label' => false]) ?>
        </div>
        <div class="form-group col-md-6">
            <label><span class="text-danger">*</span> Title Sv 1</label>
            <?= $this->Form->control('title_sv_one', ['class' => 'form-control', 'placeholder' => 'Title Sv 1', 'label' => false]) ?>
        </div>
    </div>
    <div class="row col-md-12">
        <div class="form-group col-md-12">
            <label><span class="text-danger">*</span> Description Sv 1</label>
            <?= $this->Form->control('desc_sv_one', ['class' => 'form-control', 'placeholder' => 'Description Sv 1', 'label' => false]) ?>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label><span class="text-danger">*</span> Icon Sv 2</label>
            <?= $this->Form->control('icon_sv_two', ['class' => 'form-control', 'placeholder' => 'Icon Sv 2', 'label' => false]) ?>
        </div>
        <div class="form-group col-md-6">
            <label><span class="text-danger">*</span> Title Sv 2</label>
            <?= $this->Form->control('title_sv_two', ['class' => 'form-control', 'placeholder' => 'Title Sv 2', 'label' => false]) ?>
        </div>
    </div>
    <div class="row col-md-12">
        <div class="form-group col-md-12">
            <label><span class="text-danger">*</span> Description Sv 2</label>
            <?= $this->Form->control('desc_sv_two', ['class' => 'form-control', 'placeholder' => 'Description Sv 2', 'label' => false]) ?>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label><span class="text-danger">*</span> Icon Sv 3</label>
            <?= $this->Form->control('icon_sv_three', ['class' => 'form-control', 'placeholder' => 'Icon Sv 3', 'label' => false]) ?>
        </div>
        <div class="form-group col-md-6">
            <label><span class="text-danger">*</span> Title Sv 3</label>
            <?= $this->Form->control('title_sv_three', ['class' => 'form-control', 'placeholder' => 'Title Sv 3', 'label' => false]) ?>
        </div>
    </div>
    <div class="row col-md-12">
        <div class="form-group col-md-12">
            <label><span class="text-danger">*</span> Description Sv 3</label>
            <?= $this->Form->control('desc_sv_three', ['class' => 'form-control', 'placeholder' => 'Description Sv 3', 'label' => false]) ?>
        </div>
    </div>

    <p>
        <span class="text-danger">* </span>Required
    </p>
    <button type="submit" class="btn btn-warning">Save</button>

<?= $this->Form->end() ?>
