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
            <?= $this->Html->link(__('Edit'),
                    ['controller' => 'users', 'action' => 'editProfile'],
                    ['class' => 'btn btn-outline-warning btn-sm'])
            ?>
            <?= $this->Html->link(__('Change password'),
                    ['controller' => 'users', 'action' => 'editProfilePassword'],
                    ['class' => 'btn btn-outline-danger btn-sm'])
            ?>
        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Actions
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('Edit'),
                        ['controller' => 'users', 'action' => 'editProfile'],
                        ['class' => 'dropdown-item'])
                ?>
                <?= $this->Html->link(__('Edit'),
                    ['controller' => 'users', 'action' => 'editProfilePassword'],
                    ['class' => 'btn btn-outline-danger btn-sm'])
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
                        ['controller' => 'Users', 'action' => 'changeProfilePic'],
                        ['escape' => false]
                    )
                ?>
            </div>
        </div>
    </dd>

    <dt class="col-sm-3">Id</dt>
    <dd class="col-sm-9"><?= $user->id ?></dd>

    <dt class="col-sm-3">Name</dt>
    <dd class="col-sm-9"><?= $user->name ?></dd>

    <dt class="col-sm-3">E-mail</dt>
    <dd class="col-sm-9"><?= $user->email ?></dd>

    <dt class="col-sm-3">Username</dt>
    <dd class="col-sm-9"><?= $user->username ?></dd>
</dl>
