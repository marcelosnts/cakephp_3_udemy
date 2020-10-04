<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArticlesCat $articlesCat
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Articles Cat'), ['action' => 'edit', $articlesCat->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Articles Cat'), ['action' => 'delete', $articlesCat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articlesCat->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Articles Cats'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Articles Cat'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Situations'), ['controller' => 'Situations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Situation'), ['controller' => 'Situations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="articlesCats view large-9 medium-8 columns content">
    <h3><?= h($articlesCat->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($articlesCat->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Situation') ?></th>
            <td><?= $articlesCat->has('situation') ? $this->Html->link($articlesCat->situation->situation_name, ['controller' => 'Situations', 'action' => 'view', $articlesCat->situation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($articlesCat->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($articlesCat->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($articlesCat->modified) ?></td>
        </tr>
    </table>
</div>
