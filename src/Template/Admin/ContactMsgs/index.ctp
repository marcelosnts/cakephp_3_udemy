<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContactMsg[]|\Cake\Collection\CollectionInterface $contactMsgs
 */
?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Contact Messages</h2>
    </div>
    <div class="p-2">
        <?= $this->Html->link(
                __('New Contact Message'),
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
                <th class="d-none d-sm-table-cell">Email</th>
                <th class="d-none d-sm-table-cell">Subject</th>
                <th class="d-none d-lg-table-cell">Situation</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contactMsgs as $contactMsg): ?>
                <tr class="table-<?= $contactMsg->conts_msgs_sit->color->color ?>">
                    <th><?= $this->Number->format($contactMsg->id) ?></th>
                    <td><?= h($contactMsg->name) ?></td>
                    <td class="d-none d-sm-table-cell"><?= h($contactMsg->email) ?></td>
                    <td class="d-none d-sm-table-cell"><?= h($contactMsg->subject) ?></td>
                    <td class="d-none d-lg-table-cell">
                        <span class='badge badge-<?= $contactMsg->conts_msgs_sit->color->color ?>'> <?= $contactMsg->conts_msgs_sit->situation ?></span>
                    </td>
                    <td class="text-center">
                        <span class="d-none d-md-block">
                            <?= $this->Html->link(
                                    __('View'),
                                    ['action' => 'view', $contactMsg->id],
                                    ['class' => 'btn btn-primary btn-sm']
                                )
                            ?>

                            <?= $this->Html->link(
                                    __('Edit'),
                                    ['action' => 'edit', $contactMsg->id],
                                    ['class' => 'btn btn-warning btn-sm']
                                )
                            ?>

                            <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['action' => 'delete', $contactMsg->id],
                                    ['class' => 'btn btn-danger btn-sm']
                                )
                            ?>

                        </span>
                        <div class="dropdown d-block d-md-none">
                            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Actions
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                                <?= $this->Html->link(__('<i class="fas fa-angle-double-up"></i>'),
                                        ['controller' => 'ContactMsgs', 'action' => 'view', $contactMsg->id],
                                        ['class' => 'dropdown-item', 'escape' => false]
                                    )
                                ?>
                                <?= $this->Html->link(__('Edit'),
                                        ['controller' => 'ContactMsgs', 'action' => 'view', $contactMsg->id],
                                        ['class' => 'dropdown-item']
                                    )
                                ?>
                                <?= $this->Html->link(__('View'),
                                        ['controller' => 'ContactMsgs', 'action' => 'edit', $contactMsg->id],
                                        ['class' => 'dropdown-item']
                                    )
                                ?>
                                <?= $this->Form->postLink(__('Delete'),
                                        ['controller' => 'ContactMsgs', 'action' => 'delete', $contactMsg->id],
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
