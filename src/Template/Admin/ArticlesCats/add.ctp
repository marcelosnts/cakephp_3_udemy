<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArticlesCat $articlesCat
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Articles Cats'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Situations'), ['controller' => 'Situations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Situation'), ['controller' => 'Situations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="articlesCats form large-9 medium-8 columns content">
    <?= $this->Form->create($articlesCat) ?>
    <fieldset>
        <legend><?= __('Add Articles Cat') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('situation_id', ['options' => $situations]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
