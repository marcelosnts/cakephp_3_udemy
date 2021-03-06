<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContactMsg $contactMsg
 */
?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">New Message</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
                <?= $this->Html->link(__('All Messages'), ['controller' => 'ContactMsgs', 'action' => 'index'], ['class' => 'btn btn-outline-info btn-sm']) ?>
            </span>
            <div class="dropdown d-block d-md-none">
                <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Actions
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                    <?= $this->Html->link(__('All Messages'), ['controller' => 'ContactMsgs', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
                </div>
            </div>
    </div>
</div><hr>

<?= $this->Flash->render() ?>

<?= $this->Form->create($contactMsg) ?>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label><span class="text-danger">*</span> Name</label>
            <?= $this->Form->control('name', ['class' => 'form-control', 'placeholder' => 'Name', 'label' => false]) ?>
        </div>

        <div class="form-group col-md-6">
            <label><span class="text-danger">*</span> Email</label>
            <?= $this->Form->control('email', ['class' => 'form-control', 'placeholder' => 'Email', 'label' => false]) ?>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-12">
            <label> Message</label>
            <?= $this->Form->control('message', ['class' => 'form-control', 'placeholder' => 'Message', 'label' => false]) ?>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label> Subject</label>
            <?= $this->Form->control('subject', ['class' => 'form-control', 'placeholder' => 'Subject', 'label' => false]) ?>
        </div>

        <div class="form-group col-md-4">
            <label> User</label>
            <?= $this->Form->control('user_id', ['class' => 'form-control', 'label' => false]) ?>
        </div>

        <div class="form-group col-md-4">
            <label> Situation</label>
            <?= $this->Form->control('conts_msgs_sit_id', ['class' => 'form-control', 'label' => false]) ?>
        </div>
    </div>

    <p>
        <span class="text-danger">* </span>Required
    </p>

    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>

<?= $this->Form->end() ?>

