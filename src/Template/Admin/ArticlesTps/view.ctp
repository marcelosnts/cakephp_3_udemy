<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArticlesTp $articlesTp
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Articles Tp'), ['action' => 'edit', $articlesTp->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Articles Tp'), ['action' => 'delete', $articlesTp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articlesTp->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Articles Tps'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Articles Tp'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="articlesTps view large-9 medium-8 columns content">
    <h3><?= h($articlesTp->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($articlesTp->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($articlesTp->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($articlesTp->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($articlesTp->modified) ?></td>
        </tr>
    </table>
</div>
