<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article[]|\Cake\Collection\CollectionInterface $articles
 */
?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Articles</h2>
    </div>
    <div class="p-2">
        <?= $this->Html->link(
                __('New Article'),
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
                <th>Title</th>
                <th class="d-none d-sm-table-cell">Viewed</th>
                <th class="d-none d-lg-table-cell">User</th>
                <th class="d-none d-lg-table-cell">Situation</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articles as $article): ?>
                <tr>
                    <th><?= $this->Number->format($article->id) ?></th>
                    <td><?= h($article->title) ?></td>
                    <td class="d-none d-sm-table-cell"><?= h($article->viewed) ?></td>
                    <td class="d-none d-sm-table-cell"><?= h($article->user->name) ?></td>
                    <td class="d-none d-lg-table-cell">
                        <span class='badge badge-<?= $article->situation->color->color ?>'> <?= $article->situation->situation_name ?></span>
                    </td>
                    <td class="text-center">
                        <span class="d-none d-md-block">
                            <?= $this->Html->link(
                                    __('View'),
                                    ['action' => 'view', $article->id],
                                    ['class' => 'btn btn-outline-primary btn-sm']
                                )
                            ?>

                            <?= $this->Html->link(
                                    __('Edit'),
                                    ['action' => 'edit', $article->id],
                                    ['class' => 'btn btn-outline-warning btn-sm']
                                )
                            ?>

                            <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['action' => 'delete', $article->id],
                                    ['class' => 'btn btn-outline-danger btn-sm']
                                )
                            ?>

                        </span>
                        <div class="dropdown d-block d-md-none">
                            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Actions
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                                <?= $this->Html->link(__('Edit'),
                                        ['controller' => 'Articles', 'action' => 'view', $article->id],
                                        ['class' => 'dropdown-item']
                                    )
                                ?>
                                <?= $this->Html->link(__('View'),
                                        ['controller' => 'Articles', 'action' => 'edit', $article->id],
                                        ['class' => 'dropdown-item']
                                    )
                                ?>
                                <?= $this->Form->postLink(__('Delete'),
                                        ['controller' => 'Articles', 'action' => 'delete', $article->id],
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
