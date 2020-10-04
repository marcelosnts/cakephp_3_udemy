<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">View About Company</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('All About Companies'),
                    ['controller' => 'AboutComps', 'action' => 'index'],
                    ['class' => 'btn btn-outline-info btn-sm'])
            ?>
            <?= $this->Html->link(__('Edit'),
                    ['controller' => 'AboutComps', 'action' => 'edit', $aboutComp->id],
                    ['class' => 'btn btn-outline-warning btn-sm'])
            ?>
            <?= $this->Html->link(__('Edit password'),
                    ['controller' => 'AboutComps', 'action' => 'editPassword', $aboutComp->id],
                    ['class' => 'btn btn-outline-warning btn-sm'])
            ?>
            <?= $this->Form->postLink(__('Delete'),
                    ['controller' => 'AboutComps', 'action' => 'delete', $aboutComp->id],
                    ['class' => 'btn btn-outline-danger btn-sm', 'confirm' => __('This action cannot be reverted! Are you sure?')])
            ?>
        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Actions
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('All About Companies'),
                        ['controller' => 'AboutComps', 'action' => 'index'],
                        ['class' => 'dropdown-item'])
                ?>
                <?= $this->Html->link(__('Edit'),
                        ['controller' => 'AboutComps', 'action' => 'edit', $aboutComp->id],
                        ['class' => 'dropdown-item'])
                ?>
                <?= $this->Html->link(__('Edit password'),
                        ['controller' => 'AboutComps', 'action' => 'editPassword', $aboutComp->id],
                        ['class' => 'dropdown-item'])
                ?>
                <?= $this->Form->postLink(__('Delete'),
                        ['controller' => 'AboutComps', 'action' => 'delete', $aboutComp->id],
                        ['class' => 'dropdown-item', 'confirm' => __('This action cannot be reverted! Are you sure?')])
                ?>
            </div>
        </div>
    </div>
</div><hr>

<?= $this->Flash->render() ?>

<dl class="row">
    <dt class="col-sm-3">Company image</dt>
    <dd class="col-sm-9">
        <div class="profile-img">
            <?php if(!empty($aboutComp->image)): ?>
                <?= $this->Html->image('../files/aboutComp/' . $aboutComp->id . '/' . $aboutComp->image,
                        ['class' => '', 'width' => '250', 'height' => '120'])
                ?> &nbsp;
            <?php else: ?>
                <?= $this->Html->image('../files/aboutComp/preview_img.jpg',
                        ['class' => '', 'width' => '250', 'height' => '120'])
                ?> &nbsp;
            <?php endif; ?>
            <div class="edit">
                <?= $this->Html->link(
                        '<i class="fa fa-pencil-alt"></i>',
                        ['controller' => 'AboutComps', 'action' => 'changeCompPic', $aboutComp->id],
                        ['escape' => false]
                    )
                ?>
            </div>
        </div>
    </dd>

    <dt class="col-sm-3">Id</dt>
    <dd class="col-sm-9"><?= $this->Number->format($aboutComp->id) ?></dd>

    <dt class="col-sm-3">Title</dt>
    <dd class="col-sm-9"><?= h($aboutComp->title) ?></dd>

    <dt class="col-sm-3">Description</dt>
    <dd class="col-sm-9"><?= h($aboutComp->description) ?></dd>

    <dt class="col-sm-3">Situation</dt>
    <dd class="col-sm-9">
        <?php
            if($aboutComp->situation->id == 1){
                echo "<span class='badge badge-success'>" . $aboutComp->situation->situation_name . "</span>";
            }else {
                echo "<span class='badge badge-danger'>" . $aboutComp->situation->situation_name . "</span>";
            }
        ?>
    </dd>

    <dt class="col-sm-3">Company Order</dt>
    <dd class="col-sm-9"><?= h($aboutComp->company_order) ?></dd>

    <dt class="col-sm-3 text-truncate">Created at:</dt>
    <dd class="col-sm-9"><?= h($aboutComp->created) ?></dd>

    <dt class="col-sm-3 text-truncate">Modified at:</dt>
    <dd class="col-sm-9"><?= h($aboutComp->modified) ?></dd>
</dl>
