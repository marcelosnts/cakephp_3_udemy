<nav class="navbar navbar-expand navbar-dark bg-primary">
    <a class="sidebar-toggle text-light mr-3">
        <span class="navbar-toggler-icon"></span>
    </a>
    <a class="navbar-brand" href="#">Celke</a>

    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle menu-header" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                    <?php if(!empty($userProfile->image)): ?>
                        <?= $this->Html->image('../files/user/' . $userProfile->id . '/' . $userProfile->image,
                                ['class' => 'rounded-circle', 'width' => '20', 'height' => '20'])
                        ?> &nbsp;
                    <?php else: ?>
                        <?= $this->Html->image('../files/avatar_default.png',
                                ['class' => 'rounded-circle', 'width' => '20', 'height' => '20'])
                        ?> &nbsp;
                    <?php endif; ?>
                    <span class="d-none d-sm-inline">
                        <?= current(str_word_count($userProfile->name, 2)) ?>
                    </span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <?= $this->Html->link('<i class="fas fa-user"></i> Perfil',
                        ['controller' => 'Users', 'action' => 'profile'],
                        ['class' => 'dropdown-item', 'escape' => false])
                    ?>
                    <?= $this->Html->link('<i class="fas fa-sign-out-alt"></i> Sair',
                        ['controller' => 'Users', 'action' => 'logout'],
                        ['class' => 'dropdown-item', 'escape' => false])
                    ?>
                </div>
            </li>
        </ul>
    </div>
</nav>
