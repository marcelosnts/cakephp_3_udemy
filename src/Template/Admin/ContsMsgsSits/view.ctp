<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContsMsgsSit $contsMsgsSit
 */
?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">View Contact Messages Situations</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Edit'),
                    ['controller' => 'ContsMsgsSits', 'action' => 'edit', $contsMsgsSit->id],
                    ['class' => 'btn btn-outline-warning btn-sm'])
            ?>
        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Actions
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">

                <?= $this->Html->link(__('Edit'),
                        ['controller' => 'ContsMsgsSits', 'action' => 'edit', $contsMsgsSit->id],
                        ['class' => 'dropdown-item'])
                ?>
            </div>
        </div>
    </div>
</div><hr>

<?= $this->Flash->render() ?>

<dl class="row">
    <dt class="col-sm-3">Id</dt>
    <dd class="col-sm-9"><?= $this->Number->format($contsMsgsSit->id) ?></dd>

    <dt class="col-sm-3">Situation</dt>
    <dd class="col-sm-9"><?= h($contsMsgsSit->situation) ?></dd>

    <dt class="col-sm-3">Color</dt>
    <dd class="col-sm-9"><?= h($contsMsgsSit->color->color_name) ?></dd>

    <dt class="col-sm-3 text-truncate">Created at:</dt>
    <dd class="col-sm-9"><?= h($contsMsgsSit->created) ?></dd>

    <dt class="col-sm-3 text-truncate">Modified at:</dt>
    <dd class="col-sm-9"><?= h($contsMsgsSit->modified) ?></dd>
</dl>

