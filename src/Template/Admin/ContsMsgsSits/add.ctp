<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContsMsgsSit $contsMsgsSit
 */
?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">New Contact Message Situation</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
                <?= $this->Html->link(__('All Contacts Message Situations'), ['controller' => 'ContsMsgsSits', 'action' => 'index'], ['class' => 'btn btn-outline-info btn-sm']) ?>
            </span>
            <div class="dropdown d-block d-md-none">
                <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Actions
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                    <?= $this->Html->link(__('All Contacts Message Situations'), ['controller' => 'ContsMsgsSits', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
                </div>
            </div>
    </div>
</div><hr>

<?= $this->Flash->render() ?>

<?= $this->Form->create($contsMsgsSit) ?>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label><span class="text-danger">*</span> Situation</label>
            <?= $this->Form->control('Situation', ['class' => 'form-control', 'placeholder' => 'Situation', 'label' => false]) ?>
        </div>

        <div class="form-group col-md-6">
            <label><span class="text-danger">*</span> Color</label>
            <?= $this->Form->control('color_id', ['class' => 'form-control', 'label' => false]) ?>
        </div>
    </div>

    <p>
        <span class="text-danger">* </span>Required
    </p>

    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>

<?= $this->Form->end() ?>

