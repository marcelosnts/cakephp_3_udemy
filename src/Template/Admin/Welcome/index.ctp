<h2>Bem vindo <?= $user['name'] ?></h2>
<?= $this->Html->link(__('Logout'), ['controller' => 'users', 'action' => 'logout']) ?>
