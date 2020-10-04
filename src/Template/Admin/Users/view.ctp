<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">View User</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('All users'),
                    ['controller' => 'users', 'action' => 'index'],
                    ['class' => 'btn btn-outline-info btn-sm'])
            ?>
            <?= $this->Html->link(__('Edit'),
                    ['controller' => 'users', 'action' => 'edit', $user->id],
                    ['class' => 'btn btn-outline-warning btn-sm'])
            ?>
            <?= $this->Html->link(__('Edit password'),
                    ['controller' => 'users', 'action' => 'editPassword', $user->id],
                    ['class' => 'btn btn-outline-warning btn-sm'])
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
                <?= $this->Html->link(__('Edit'),
                        ['controller' => 'users', 'action' => 'edit', $user->id],
                        ['class' => 'dropdown-item'])
                ?>
                <?= $this->Html->link(__('Edit password'),
                        ['controller' => 'users', 'action' => 'editPassword', $user->id],
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

<dl class="row">
    <dt class="col-sm-3">User image</dt>
    <dd class="col-sm-9">
        <div class="profile-img">
            <?php if(!empty($user->image)): ?>
                <?= $this->Html->image('../files/user/' . $user->id . '/' . $user->image,
                        ['class' => 'rounded-circle', 'width' => '120', 'height' => '120'])
                ?> &nbsp;
            <?php else: ?>
                <?= $this->Html->image('../files/avatar_default.png',
                        ['class' => 'rounded-circle', 'width' => '120', 'height' => '120'])
                ?> &nbsp;
            <?php endif; ?>
            <div class="edit">
                <?= $this->Html->link(
                        '<i class="fa fa-pencil-alt"></i>',
                        ['controller' => 'Users', 'action' => 'changeUserPic', $user->id],
                        ['escape' => false]
                    )
                ?>
            </div>
        </div>
    </dd>

    <dt class="col-sm-3">Id</dt>
    <dd class="col-sm-9"><?= $this->Number->format($user->id) ?></dd>

    <dt class="col-sm-3">Name</dt>
    <dd class="col-sm-9"><?= h($user->name) ?></dd>

    <dt class="col-sm-3">E-mail</dt>
    <dd class="col-sm-9"><?= h($user->email) ?></dd>

    <dt class="col-sm-3">Username</dt>
    <dd class="col-sm-9"><?= h($user->username) ?></dd>

    <dt class="col-sm-3 text-truncate">Created at:</dt>
    <dd class="col-sm-9"><?= h($user->created) ?></dd>

    <dt class="col-sm-3 text-truncate">Modified at:</dt>
    <dd class="col-sm-9"><?= h($user->modified) ?></dd>
</dl>
