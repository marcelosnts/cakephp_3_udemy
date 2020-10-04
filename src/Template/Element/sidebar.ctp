<nav class="sidebar">
    <ul class="list-unstyled">
        <li>
            <?= $this->Html->link(
                __('<i class="fas fa-tachometer-alt"></i> Dashboard'),
                ['controller' => 'welcome', 'action' => 'index'],
                ['escape' => false]
            ) ?>
        </li>
        <li>
            <?= $this->Html->link(
                    '<i class="fas fa-users"></i> Users',
                    ['controller' => 'Users', 'action' => 'index'],
                    ['escape' => false]
            ) ?>
        </li>
        <li>
            <?= $this->Html->link(
                    '<i class="fas fa-sliders-h"></i> Carousels',
                    ['controller' => 'Carousels', 'action' => 'index'],
                    ['escape' => false]
            ) ?>
        </li>
        <li>
            <?= $this->Html->link(
                    '<i class="fas fa-sliders-h"></i> Services',
                    ['controller' => 'Services', 'action' => 'view', '1'],
                    ['escape' => false]
            ) ?>
        </li>
        <li>
            <?= $this->Html->link(
                    '<i class="fas fa-sliders-h"></i> Depoinments',
                    ['controller' => 'Depoinments', 'action' => 'view', '1'],
                    ['escape' => false]
            ) ?>
        </li>
        <li>
            <?= $this->Html->link(
                    '<i class="fas fa-info"></i> Companies About',
                    ['controller' => 'AboutComps', 'action' => 'index'],
                    ['escape' => false]
            ) ?>
        </li>
        <li>
            <?= $this->Html->link(
                    '<i class="fas fa-envelope"></i> Contact Messages',
                    ['controller' => 'ContactMsgs', 'action' => 'index'],
                    ['escape' => false]
            ) ?>
        </li>
        <li>
            <?= $this->Html->link(
                    '<i class="fas fa-newspaper"></i> Articles',
                    ['controller' => 'Articles', 'action' => 'index'],
                    ['escape' => false]
            ) ?>
        </li>
        <li>
            <?= $this->Html->link(
                    '<i class="fas fa-user"></i> About Author',
                    ['controller' => 'AboutAuthors', 'action' => 'edit', 1],
                    ['escape' => false]
            ) ?>
        </li>
        <li>
            <?= $this->Html->link(
                    '<i class="fas fa-share-alt"></i> Social',
                    ['controller' => 'SocialNets', 'action' => 'index'],
                    ['escape' => false]
            ) ?>
        </li>
        <li>
            <?= $this->Html->link(
                __('<i class="fas fa-sign-out-alt"></i> Logout'),
                ['controller' => 'users', 'action' => 'logout'],
                ['escape' => false]
            ) ?>
        </li>
    </ul>
</nav>
