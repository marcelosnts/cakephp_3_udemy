<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Position $position
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Position'), ['action' => 'edit', $position->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Position'), ['action' => 'delete', $position->id], ['confirm' => __('Are you sure you want to delete # {0}?', $position->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Positions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Position'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Carousels'), ['controller' => 'Carousels', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Carousel'), ['controller' => 'Carousels', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="positions view large-9 medium-8 columns content">
    <h3><?= h($position->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Position Name') ?></th>
            <td><?= h($position->position_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Position') ?></th>
            <td><?= h($position->position) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($position->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($position->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($position->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Carousels') ?></h4>
        <?php if (!empty($position->carousels)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Carousel Name') ?></th>
                <th scope="col"><?= __('Image') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Button Title') ?></th>
                <th scope="col"><?= __('Link') ?></th>
                <th scope="col"><?= __('Slide Order') ?></th>
                <th scope="col"><?= __('Position Id') ?></th>
                <th scope="col"><?= __('Color Id') ?></th>
                <th scope="col"><?= __('Situation Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($position->carousels as $carousels): ?>
            <tr>
                <td><?= h($carousels->id) ?></td>
                <td><?= h($carousels->carousel_name) ?></td>
                <td><?= h($carousels->image) ?></td>
                <td><?= h($carousels->title) ?></td>
                <td><?= h($carousels->description) ?></td>
                <td><?= h($carousels->button_title) ?></td>
                <td><?= h($carousels->link) ?></td>
                <td><?= h($carousels->slide_order) ?></td>
                <td><?= h($carousels->position_id) ?></td>
                <td><?= h($carousels->color_id) ?></td>
                <td><?= h($carousels->situation_id) ?></td>
                <td><?= h($carousels->created) ?></td>
                <td><?= h($carousels->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Carousels', 'action' => 'view', $carousels->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Carousels', 'action' => 'edit', $carousels->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Carousels', 'action' => 'delete', $carousels->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carousels->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
