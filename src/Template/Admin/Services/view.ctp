<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Service $service
 */
?>

<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">View Services</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Edit'),
                    ['controller' => 'Services', 'action' => 'edit', $service->id],
                    ['class' => 'btn btn-outline-warning btn-sm'])
            ?>
        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Actions
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">

                <?= $this->Html->link(__('Edit'),
                        ['controller' => 'Services', 'action' => 'edit', $service->id],
                        ['class' => 'dropdown-item'])
                ?>
            </div>
        </div>
    </div>
</div><hr>

<?= $this->Flash->render() ?>

<dl class="row">
    <dt class="col-sm-3">Id</dt>
    <dd class="col-sm-9"><?= $this->Number->format($service->id) ?></dd>

    <dt class="col-sm-3">Title</dt>
    <dd class="col-sm-9"><?= h($service->sv_title) ?></dd>

    <dt class="col-sm-3">Icon 1</dt>
    <dd class="col-sm-9"><i class="<?= $service->icon_sv_one ?>"></i> - <?= h($service->icon_sv_one) ?></dd>

    <dt class="col-sm-3">Title 1</dt>
    <dd class="col-sm-9"><?= h($service->title_sv_one) ?></dd>

    <dt class="col-sm-3">Description 1</dt>
    <dd class="col-sm-9"><?= h($service->desc_sv_one) ?></dd>

    <dt class="col-sm-3">Icon 2</dt>
    <dd class="col-sm-9"><i class="<?= $service->icon_sv_two ?>"></i> - <?= h($service->icon_sv_two) ?></dd>

    <dt class="col-sm-3">Title 2</dt>
    <dd class="col-sm-9"><?= h($service->title_sv_two) ?></dd>

    <dt class="col-sm-3">Description 2</dt>
    <dd class="col-sm-9"><?= h($service->desc_sv_two) ?></dd>

    <dt class="col-sm-3">Icon 3</dt>
    <dd class="col-sm-9"><i class="<?= $service->icon_sv_three ?>"></i> - <?= h($service->icon_sv_three) ?></dd>

    <dt class="col-sm-3">Title 3</dt>
    <dd class="col-sm-9"><?= h($service->title_sv_three) ?></dd>

    <dt class="col-sm-3">Description 3</dt>
    <dd class="col-sm-9"><?= h($service->desc_sv_three) ?></dd>

    <dt class="col-sm-3 text-truncate">Created at:</dt>
    <dd class="col-sm-9"><?= h($service->created) ?></dd>

    <dt class="col-sm-3 text-truncate">Modified at:</dt>
    <dd class="col-sm-9"><?= h($service->modified) ?></dd>
</dl>

