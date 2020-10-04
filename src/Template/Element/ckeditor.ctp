<?php
    $ckeditor = 'https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js';

    echo $this->Html->script($ckeditor, ['block' => 'script']);

    echo $this->Html->scriptBlock("
        ClassicEditor.create(document.querySelector( '#ck-one' ));

        ClassicEditor.create(document.querySelector( '#ck-two' ));

        ClassicEditor.create(document.querySelector( '#ck-three' ));
    ", ['block' => 'script']);
?>
