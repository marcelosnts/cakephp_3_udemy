<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Change <strong><?= $user->name ?></strong> profile pic</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('View'),
                    ['controller' => 'users', 'action' => 'view', $user->id],
                    ['class' => 'btn btn-outline-success btn-sm'])
            ?>
        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Actions
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('View'),
                        ['controller' => 'users', 'action' => 'view', $user->id],
                        ['class' => 'dropdown-item'])
                ?>
            </div>
        </div>
    </div>
</div><hr>
<?= $this->Flash->render() ?>

<?= $this->Form->create($user, ['enctype' => 'multipart/form-data']) ?>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label><span class="text-danger">*</span> Profile Picture (150x150)</label>
            <?= $this->Form->control('image', ['type' => 'file', 'label' => false, 'onChange' => 'previewImage()']) ?>
        </div>

        <div class="form-group col-md-6">
            <?php
                if($user->image !== null){
                    $old_image = '../../../files/user/' . $user->id . '/' . $user->image;
                }else{
                    $old_image = '../../../files/user/preview_img.png';
                }
            ?>

            <img id="preview-img" src="<?= $old_image ?>" alt="<?= $user->name ?>" class="img-thumbnail" style="width: 150px; height: 150px">
        </div>
    </div>

    <p>
        <span class="text-danger">* </span> Required
    </p>
    <button type="submit" class="btn btn-warning">Save</button>

<?= $this->Form->end() ?>

