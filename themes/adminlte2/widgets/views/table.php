<table id="" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="">
    <thead>
    <?php
    echo '<tr role="row">';
    foreach ($columns as $key => $item) {
        echo '<th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="">'.$item.'</th>';
    }
    echo '</tr>';
    ?>
    </thead>
    <tbody>
    <?php
    foreach ($dataProvider->getModels() as $key => $item) {
        echo '<tr role="row" class="odd">';
        foreach ($item->attributes as $attribute) {
            echo '<td class="sorting_1">' . $attribute . '</td>';
        }
        echo '</tr>';
    }
    ?>
    </tbody>
    <tfoot>
    <tr>
        <th rowspan="1" colspan="1">Listado</th>
    </tr>
    </tfoot>
</table>