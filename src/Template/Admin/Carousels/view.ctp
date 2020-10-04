<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">View Carousel</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('All Carousels'),
                    ['controller' => 'Carousels', 'action' => 'index'],
                    ['class' => 'btn btn-outline-info btn-sm'])
            ?>
            <?= $this->Html->link(__('Edit'),
                    ['controller' => 'Carousels', 'action' => 'edit', $carousel->id],
                    ['class' => 'btn btn-outline-warning btn-sm'])
            ?>
            <?= $this->Html->link(__('Edit password'),
                    ['controller' => 'Carousels', 'action' => 'editPassword', $carousel->id],
                    ['class' => 'btn btn-outline-warning btn-sm'])
            ?>
            <?= $this->Form->postLink(__('Delete'),
                    ['controller' => 'Carousels', 'action' => 'delete', $carousel->id],
                    ['class' => 'btn btn-outline-danger btn-sm', 'confirm' => __('This action cannot be reverted! Are you sure?')])
            ?>
        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Actions
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('All Carousels'),
                        ['controller' => 'Carousels', 'action' => 'index'],
                        ['class' => 'dropdown-item'])
                ?>
                <?= $this->Html->link(__('Edit'),
                        ['controller' => 'Carousels', 'action' => 'edit', $carousel->id],
                        ['class' => 'dropdown-item'])
                ?>
                <?= $this->Html->link(__('Edit password'),
                        ['controller' => 'Carousels', 'action' => 'editPassword', $carousel->id],
                        ['class' => 'dropdown-item'])
                ?>
                <?= $this->Form->postLink(__('Delete'),
                        ['controller' => 'Carousels', 'action' => 'delete', $carousel->id],
                        ['class' => 'dropdown-item', 'confirm' => __('This action cannot be reverted! Are you sure?')])
                ?>
            </div>
        </div>
    </div>
</div><hr>

<?= $this->Flash->render() ?>

<dl class="row">
    <dt class="col-sm-3">Carousel image</dt>
    <dd class="col-sm-9">
        <div class="profile-img">
            <?php if(!empty($carousel->image)): ?>
                <?= $this->Html->image('../files/carousel/' . $carousel->id . '/' . $carousel->image,
                        ['class' => '', 'width' => '250', 'height' => '120'])
                ?> &nbsp;
            <?php else: ?>
                <?= $this->Html->image('../files/carousel/preview_img.jpg',
                        ['class' => '', 'width' => '250', 'height' => '120'])
                ?> &nbsp;
            <?php endif; ?>
            <div class="edit">
                <?= $this->Html->link(
                        '<i class="fa fa-pencil-alt"></i>',
                        ['controller' => 'Carousels', 'action' => 'changeCarouselPic', $carousel->id],
                        ['escape' => false]
                    )
                ?>
            </div>
        </div>
    </dd>

    <dt class="col-sm-3">Id</dt>
    <dd class="col-sm-9"><?= $this->Number->format($carousel->id) ?></dd>

    <dt class="col-sm-3">Name</dt>
    <dd class="col-sm-9"><?= h($carousel->carousel_name) ?></dd>

    <dt class="col-sm-3">Title</dt>
    <dd class="col-sm-9"><?= h($carousel->title) ?></dd>

    <dt class="col-sm-3">Description</dt>
    <dd class="col-sm-9"><?= h($carousel->description) ?></dd>

    <dt class="col-sm-3">Button Title</dt>
    <dd class="col-sm-9"><?= h($carousel->button_title) ?></dd>

    <dt class="col-sm-3">Button Link</dt>
    <dd class="col-sm-9"><?= h($carousel->link) ?></dd>

    <dt class="col-sm-3">Button Color</dt>
    <dd class="col-sm-9">
        <button class="btn btn-<?= h($carousel->color->color) ?> btn-sm">
            <?= h($carousel->color->color_name) ?>
        </button>
    </dd>

    <dt class="col-sm-3">Text Position</dt>
    <dd class="col-sm-9"><?= h($carousel->position->position_name) ?></dd>

    <dt class="col-sm-3">Slide Order</dt>
    <dd class="col-sm-9"><?= h($carousel->slide_order) ?></dd>

    <dt class="col-sm-3">Situation</dt>
    <dd class="col-sm-9">
        <?php
            if($carousel->situation->id == 1){
                echo "<span class='badge badge-success'>" . $carousel->situation->situation_name . "</span>";
            }else {
                echo "<span class='badge badge-danger'>" . $carousel->situation->situation_name . "</span>";
            }
        ?>
    </dd>

    <dt class="col-sm-3 text-truncate">Created at:</dt>
    <dd class="col-sm-9"><?= h($carousel->created) ?></dd>

    <dt class="col-sm-3 text-truncate">Modified at:</dt>
    <dd class="col-sm-9"><?= h($carousel->modified) ?></dd>
</dl>
