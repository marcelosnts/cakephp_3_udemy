<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Depoinment $depoinment
 */
?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Edit <?= $depoinment->title ?></h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('View'),
                    ['controller' => 'Depoinments', 'action' => 'view', $depoinment->id],
                    ['class' => 'btn btn-outline-success btn-sm'])
            ?>
        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Actions
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('View'),
                        ['controller' => 'Depoinments', 'action' => 'view', $depoinment->id],
                        ['class' => 'dropdown-item'])
                ?>
            </div>
        </div>
    </div>
</div><hr>
<?= $this->Flash->render() ?>

<?= $this->Form->create($depoinment) ?>

    <div class="form-row">
        <div class="form-group col-md-12">
            <label><span class="text-danger">*</span> Depoinment name</label>
            <?= $this->Form->control('depoinment_name', ['class' => 'form-control', 'placeholder' => 'Depoinment name', 'label' => false]) ?>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12">
            <label><span class="text-danger">*</span> Depoinment Description</label>
            <?= $this->Form->control('depoinment_desc', ['class' => 'form-control', 'placeholder' => 'Depoinment Description', 'label' => false]) ?>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label><span class="text-danger">*</span> Video 1</label>
            <?= $this->Form->control('video_one', ['class' => 'form-control', 'placeholder' => 'Video 1', 'label' => false]) ?>
        </div>
        <div class="form-group col-md-4">
            <label><span class="text-danger">*</span> Video 2</label>
            <?= $this->Form->control('video_two', ['class' => 'form-control', 'placeholder' => 'Video 2', 'label' => false]) ?>
        </div>
        <div class="form-group col-md-4">
            <label><span class="text-danger">*</span> Video 3</label>
            <?= $this->Form->control('video_three', ['class' => 'form-control', 'placeholder' => 'Video 3', 'label' => false]) ?>
        </div>
    </div>

    <p>
        <span class="text-danger">* </span>Required
    </p>
    <button type="submit" class="btn btn-warning">Save</button>

<?= $this->Form->end() ?>
