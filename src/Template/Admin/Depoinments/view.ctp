<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Depoinment $depoinment
 */
?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">View Depoinments</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Edit'),
                    ['controller' => 'Depoinments', 'action' => 'edit', $depoinment->id],
                    ['class' => 'btn btn-outline-warning btn-sm'])
            ?>
        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Actions
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">

                <?= $this->Html->link(__('Edit'),
                        ['controller' => 'Depoinments', 'action' => 'edit', $depoinment->id],
                        ['class' => 'dropdown-item'])
                ?>
            </div>
        </div>
    </div>
</div><hr>

<?= $this->Flash->render() ?>

<dl class="row">
    <dt class="col-sm-3">Id</dt>
    <dd class="col-sm-9"><?= $this->Number->format($depoinment->id) ?></dd>

    <dt class="col-sm-3">Title</dt>
    <dd class="col-sm-9"><?= h($depoinment->depoinment_name) ?></dd>

    <dt class="col-sm-3">Description</dt>
    <dd class="col-sm-9"><?= h($depoinment->depoinment_desc) ?></dd>

    <dt class="col-sm-3">Video 1</dt>
    <dd class="col-sm-9"><?= h($depoinment->video_one) ?></dd>

    <dt class="col-sm-3">Video 2</dt>
    <dd class="col-sm-9"><?= h($depoinment->video_two) ?></dd>

    <dt class="col-sm-3">Video 3</dt>
    <dd class="col-sm-9"><?= h($depoinment->video_three) ?></dd>

    <dt class="col-sm-3 text-truncate">Created at:</dt>
    <dd class="col-sm-9"><?= h($depoinment->created) ?></dd>

    <dt class="col-sm-3 text-truncate">Modified at:</dt>
    <dd class="col-sm-9"><?= h($depoinment->modified) ?></dd>
</dl>

