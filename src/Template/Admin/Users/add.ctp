<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">New User</h2>
    </div>
    <div class="p-2">
        <?= $this->Html->link(
                __('All Users'),
                ['controller' => 'users', 'action' => 'index'],
                ['class' => 'btn btn-outline-info btn-sm']
            )
        ?>
    </div>
</div><hr>

<?= $this->Flash->render() ?>

<?= $this->Form->create($user) ?>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label><span class="text-danger">*</span> Name</label>
            <?= $this->Form->control('name', ['class' => 'form-control', 'placeholder' => 'Full name', 'label' => false]) ?>
        </div>


        <div class="form-group col-md-6">
            <label><span class="text-danger">*</span> E-mail</label>
            <?= $this->Form->control('email', ['class' => 'form-control', 'placeholder' => 'Email', 'label' => false]) ?>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label><span class="text-danger">*</span> Username</label>
            <?= $this->Form->control('username', ['class' => 'form-control', 'placeholder' => 'Username', 'label' => false]) ?>
        </div>

        <div class="form-group col-md-6">
            <label>Senha</label>
            <?= $this->Form->control('password', ['class' => 'form-control', 'placeholder' => 'Password', 'label' => false]) ?>
        </div>
    </div>

    <p>
        <span class="text-danger">* </span>Campo obrigatório
    </p>

    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>

<?= $this->Form->end() ?>

