<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Edit <?= $user->name ?></h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('All users'),
                    ['controller' => 'users', 'action' => 'index'],
                    ['class' => 'btn btn-outline-info btn-sm'])
            ?>
            <?= $this->Html->link(__('View'),
                    ['controller' => 'users', 'action' => 'view', $user->id],
                    ['class' => 'btn btn-outline-success btn-sm'])
            ?>
            <?= $this->Form->postLink(__('Delete'),
                    ['controller' => 'users', 'action' => 'delete', $user->id],
                    ['class' => 'btn btn-outline-danger btn-sm', 'confirm' => __('This action cannot be reverted! Are you sure?')])
            ?>
        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Actions
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('All users'),
                        ['controller' => 'users', 'action' => 'index'],
                        ['class' => 'dropdown-item'])
                ?>
                <?= $this->Html->link(__('View'),
                        ['controller' => 'users', 'action' => 'view', $user->id],
                        ['class' => 'dropdown-item'])
                ?>
                <?= $this->Form->postLink(__('Delete'),
                        ['controller' => 'users', 'action' => 'delete', $user->id],
                        ['class' => 'dropdown-item', 'confirm' => __('This action cannot be reverted! Are you sure?')])
                ?>
            </div>
        </div>
    </div>
</div><hr>
<?= $this->Flash->render() ?>

<?= $this->Form->create($user) ?>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label><span class="text-danger">*</span> Name</label>
            <?= $this->Form->control('name', ['class' => 'form-control', 'placeholder' => 'Name', 'label' => false]) ?>
        </div>
        <div class="form-group col-md-6">
            <label><span class="text-danger">*</span> E-mail</label>
            <?= $this->Form->control('email', ['class' => 'form-control', 'placeholder' => 'Email', 'label' => false]) ?>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-12">
            <label><span class="text-danger">*</span> Username</label>
            <?= $this->Form->control('username', ['class' => 'form-control', 'placeholder' => 'Username', 'label' => false]) ?>
        </div>
    </div>

    <p>
        <span class="text-danger">* </span>Campo obrigatório
    </p>
    <button type="submit" class="btn btn-warning">Salvar</button>

<?= $this->Form->end() ?>
