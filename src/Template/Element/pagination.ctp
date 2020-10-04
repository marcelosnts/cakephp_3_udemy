<?php
    $paginator = $this->Paginator->setTemplates([
        'number' => '<li class="page-item">
                        <a class="page-link" href="{{url}}">{{text}}</a>
                    </li>',
        'current' => '<li class="page-item active">
                        <a class="page-link" href="{{url}}">{{text}}</a>
                    </li>',
        'first' => '<li class="page-item">
                        <a class="page-link" href="{{url}}">&laquo First</a>
                    </li>',
        'nextActive' => '<li class="page-item">
                        <a class="page-link" href="{{url}}">&gt</a>
                    </li>',
        'prevActive' => '<li class="page-item">
                        <a class="page-link" href="{{url}}">&lt</a>
                    </li>',
        'last' => '<li class="page-item">
                        <a class="page-link" href="{{url}}">Last &raquo</a>
                    </li>',
    ]);
?>

<nav aria-label="paginacao">
    <ul class="pagination pagination-sm justify-content-center">
        <?php
            echo $paginator->first();

            if($paginator->hasPrev()){
                echo $paginator->prev();
            }

            echo $paginator->numbers();

            if($paginator->hasNext()){
                echo $paginator->next();
            }

            echo $paginator->last();
        ?>
    </ul>
</nav>

