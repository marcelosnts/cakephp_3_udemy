<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContsMsgsSit[]|\Cake\Collection\CollectionInterface $contsMsgsSits
 */
?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Contact Messages Situations</h2>
    </div>
    <div class="p-2">
        <?= $this->Html->link(
                __('New Contact Message Situation'),
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
                <th>Situation</th>
                <th class="d-none d-sm-table-cell">Color</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contsMsgsSits as $contsMsgsSit): ?>
                <tr>
                    <th><?= $this->Number->format($contsMsgsSit->id) ?></th>
                    <td><?= h($contsMsgsSit->situation) ?></td>
                    <td class="d-none d-sm-table-cell"><?= h($contsMsgsSit->color->color_name) ?></td>
                    <td class="text-center">
                        <span class="d-none d-md-block">
                            <?= $this->Html->link(
                                    __('View'),
                                    ['action' => 'view', $contsMsgsSit->id],
                                    ['class' => 'btn btn-outline-primary btn-sm']
                                )
                            ?>

                            <?= $this->Html->link(
                                    __('Edit'),
                                    ['action' => 'edit', $contsMsgsSit->id],
                                    ['class' => 'btn btn-outline-warning btn-sm']
                                )
                            ?>

                            <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['action' => 'delete', $contsMsgsSit->id],
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
                                        ['controller' => 'ContsMsgsSits', 'action' => 'view', $contsMsgsSit->id],
                                        ['class' => 'dropdown-item', 'escape' => false]
                                    )
                                ?>
                                <?= $this->Html->link(__('Edit'),
                                        ['controller' => 'ContsMsgsSits', 'action' => 'view', $contsMsgsSit->id],
                                        ['class' => 'dropdown-item']
                                    )
                                ?>
                                <?= $this->Html->link(__('View'),
                                        ['controller' => 'ContsMsgsSits', 'action' => 'edit', $contsMsgsSit->id],
                                        ['class' => 'dropdown-item']
                                    )
                                ?>
                                <?= $this->Form->postLink(__('Delete'),
                                        ['controller' => 'ContsMsgsSits', 'action' => 'delete', $contsMsgsSit->id],
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
