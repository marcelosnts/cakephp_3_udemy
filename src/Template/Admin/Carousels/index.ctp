<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Carousels</h2>
    </div>
    <div class="p-2">
        <?= $this->Html->link(
                __('New Carousel'),
                ['action' => 'add '],
                ['class' => 'btn btn-outline-success btn-sm']
            )
        ?>
    </div>
</div>

<?= $this->Flash->render() ?>

<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th class="d-none d-sm-table-cell">Order</th>
                <th class="d-none d-lg-table-cell">Situation</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($carousels as $carousel): ?>
                <tr>
                    <th><?= $this->Number->format($carousel->id) ?></th>
                    <td><?= h($carousel->carousel_name) ?></td>
                    <td class="d-none d-sm-table-cell"><?= h($carousel->slide_order) ?></td>
                    <td class="d-none d-lg-table-cell">
                        <?php
                            if($carousel->situation->id == 1){
                                echo "<span class='badge badge-success'>" . $carousel->situation->situation_name . "</span>";
                            }else {
                                echo "<span class='badge badge-danger'>" . $carousel->situation->situation_name . "</span>";
                            }
                        ?>
                    </td>
                    <td class="text-center">
                        <span class="d-none d-md-block">

                            <?= $this->Html->link(__('<i class="fas fa-angle-double-up"></i>'),
                                    ['controller' => 'Carousels', 'action' => 'changeCarouselOrder', $carousel->id],
                                    ['class' => 'btn btn-outline-info btn-sm', 'escape' => false]
                                )
                            ?>
                            <?= $this->Html->link(
                                    __('View'),
                                    ['action' => 'view', $carousel->id],
                                    ['class' => 'btn btn-outline-primary btn-sm']
                                )
                            ?>

                            <?= $this->Html->link(
                                    __('Edit'),
                                    ['action' => 'edit', $carousel->id],
                                    ['class' => 'btn btn-outline-warning btn-sm']
                                )
                            ?>

                            <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['action' => 'delete', $carousel->id],
                                    ['class' => 'btn btn-outline-danger btn-sm']
                                )
                            ?>

                        </span>
                        <div class="dropdown d-block d-md-none">
                            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Actions
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                                <?= $this->Html->link(__('<i class="fas fa-angle-double-up"></i>'),
                                        ['controller' => 'Carousels', 'action' => 'view', $carousel->id],
                                        ['class' => 'dropdown-item', 'escape' => false]
                                    )
                                ?>
                                <?= $this->Html->link(__('Edit'),
                                        ['controller' => 'Carousels', 'action' => 'view', $carousel->id],
                                        ['class' => 'dropdown-item']
                                    )
                                ?>
                                <?= $this->Html->link(__('View'),
                                        ['controller' => 'Carousels', 'action' => 'edit', $carousel->id],
                                        ['class' => 'dropdown-item']
                                    )
                                ?>
                                <?= $this->Form->postLink(__('Delete'),
                                        ['controller' => 'Carousels', 'action' => 'delete', $carousel->id],
                                        ['class' => 'dropdown-item', 'confirm' => __('This action cannot be reverted! Are you sure?')]
                                    )
                                ?>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
