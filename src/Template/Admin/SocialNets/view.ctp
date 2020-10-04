<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SocialNet $socialNet
 */
?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">View Social Media</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('All SocialNets'),
                    ['controller' => 'SocialNets', 'action' => 'index'],
                    ['class' => 'btn btn-outline-info btn-sm'])
            ?>
            <?= $this->Html->link(__('Edit'),
                    ['controller' => 'SocialNets', 'action' => 'edit', $socialNet->id],
                    ['class' => 'btn btn-outline-warning btn-sm'])
            ?>
            <?= $this->Html->link(__('Edit password'),
                    ['controller' => 'SocialNets', 'action' => 'editPassword', $socialNet->id],
                    ['class' => 'btn btn-outline-warning btn-sm'])
            ?>
            <?= $this->Form->postLink(__('Delete'),
                    ['controller' => 'SocialNets', 'action' => 'delete', $socialNet->id],
                    ['class' => 'btn btn-outline-danger btn-sm', 'confirm' => __('This action cannot be reverted! Are you sure?')])
            ?>
        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Actions
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('All SocialNets'),
                        ['controller' => 'SocialNets', 'action' => 'index'],
                        ['class' => 'dropdown-item'])
                ?>
                <?= $this->Html->link(__('Edit'),
                        ['controller' => 'SocialNets', 'action' => 'edit', $socialNet->id],
                        ['class' => 'dropdown-item'])
                ?>
                <?= $this->Html->link(__('Edit password'),
                        ['controller' => 'SocialNets', 'action' => 'editPassword', $socialNet->id],
                        ['class' => 'dropdown-item'])
                ?>
                <?= $this->Form->postLink(__('Delete'),
                        ['controller' => 'SocialNets', 'action' => 'delete', $socialNet->id],
                        ['class' => 'dropdown-item', 'confirm' => __('This action cannot be reverted! Are you sure?')])
                ?>
            </div>
        </div>
    </div>
</div><hr>

<?= $this->Flash->render() ?>

<dl class="row">
    <dt class="col-sm-3">Id</dt>
    <dd class="col-sm-9"><?= $this->Number->format($socialNet->id) ?></dd>

    <dt class="col-sm-3">Title</dt>
    <dd class="col-sm-9"><?= h($socialNet->title) ?></dd>

    <dt class="col-sm-3">Link</dt>
    <dd class="col-sm-9"><?= h($socialNet->link) ?></dd>

    <dt class="col-sm-3">Icon</dt>
    <dd class="col-sm-9"><span class="<?= $socialNet->icon ?>"></span></dd>

    <dt class="col-sm-3">Situation</dt>
    <dd class="col-sm-9">
        <span class='badge badge-<?= $socialNet->situation->color->color ?>'><?= $socialNet->situation->situation_name?></span>
    </dd>

    <dt class="col-sm-3 text-truncate">Created at:</dt>
    <dd class="col-sm-9"><?= h($socialNet->created) ?></dd>

    <dt class="col-sm-3 text-truncate">Modified at:</dt>
    <dd class="col-sm-9"><?= h($socialNet->modified) ?></dd>
</dl>
