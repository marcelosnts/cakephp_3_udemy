<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContactMsg $contactMsg
 */
?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">View Message</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Edit'),
                    ['controller' => 'ContactMsgs', 'action' => 'edit', $contactMsg->id],
                    ['class' => 'btn btn-outline-warning btn-sm'])
            ?>
        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Actions
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">

                <?= $this->Html->link(__('Edit'),
                        ['controller' => 'ContactMsgs', 'action' => 'edit', $contactMsg->id],
                        ['class' => 'dropdown-item'])
                ?>
            </div>
        </div>
    </div>
</div><hr>

<?= $this->Flash->render() ?>

<dl class="row">
    <dt class="col-sm-3">Id</dt>
    <dd class="col-sm-9"><?= $this->Number->format($contactMsg->id) ?></dd>

    <dt class="col-sm-3">Name</dt>
    <dd class="col-sm-9"><?= h($contactMsg->name) ?></dd>

    <dt class="col-sm-3">Email</dt>
    <dd class="col-sm-9"><?= h($contactMsg->email) ?></dd>

    <dt class="col-sm-3">Message</dt>
    <dd class="col-sm-9"><?= h($contactMsg->message) ?></dd>

    <dt class="col-sm-3">User</dt>
    <dd class="col-sm-9"><?= h($contactMsg->user_id) ?></dd>

    <dt class="col-sm-3">Situation</dt>
    <dd class="col-sm-9">
        <span class='badge badge-<?= $contactMsg->conts_msgs_sit->color->color ?>'> <?= $contactMsg->conts_msgs_sit->situation ?></span>
    </dd>

    <dt class="col-sm-3 text-truncate">Created at:</dt>
    <dd class="col-sm-9"><?= h($contactMsg->created) ?></dd>

    <dt class="col-sm-3 text-truncate">Modified at:</dt>
    <dd class="col-sm-9"><?= h($contactMsg->modified) ?></dd>
</dl>

