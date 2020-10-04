<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Change <strong><?= $carousel->name ?></strong> carousel pic</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('View'),
                    ['controller' => 'carousels', 'action' => 'view', $carousel->id],
                    ['class' => 'btn btn-outline-success btn-sm'])
            ?>
        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Actions
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('View'),
                        ['controller' => 'carousels', 'action' => 'view', $carousel->id],
                        ['class' => 'dropdown-item'])
                ?>
            </div>
        </div>
    </div>
</div><hr>
<?= $this->Flash->render() ?>

<?= $this->Form->create($carousel, ['enctype' => 'multipart/form-data']) ?>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label><span class="text-danger">*</span> Profile Picture (1920x854)</label>
            <?= $this->Form->control('image', ['type' => 'file', 'label' => false, 'onChange' => 'previewImage()']) ?>
        </div>

        <div class="form-group col-md-6">
            <?php
                if($carousel->image !== null){
                    $old_image = '../../../files/carousel/' . $carousel->id . '/' . $carousel->image;
                }else{
                    $old_image = '../../../files/carousel/preview_img.png';
                }
            ?>

            <img id="preview-img" src="<?= $old_image ?>" alt="<?= $carousel->name ?>" class="img-thumbnail" style="width: 250px; height: 150px">
        </div>
    </div>

    <p>
        <span class="text-danger">* </span> Required
    </p>
    <button type="submit" class="btn btn-warning">Save</button>

<?= $this->Form->end() ?>

