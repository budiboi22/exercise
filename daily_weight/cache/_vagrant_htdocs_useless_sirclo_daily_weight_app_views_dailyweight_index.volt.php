<?php $totalMax = 0; ?>
<?php $totalMin = 0; ?>
<?php $v166466846972747429791iterator = $data; $v166466846972747429791incr = 0; $v166466846972747429791loop = new stdClass(); $v166466846972747429791loop->self = &$v166466846972747429791loop; $v166466846972747429791loop->length = count($v166466846972747429791iterator); $v166466846972747429791loop->index = 1; $v166466846972747429791loop->index0 = 1; $v166466846972747429791loop->revindex = $v166466846972747429791loop->length; $v166466846972747429791loop->revindex0 = $v166466846972747429791loop->length - 1; ?><?php foreach ($v166466846972747429791iterator as $data) { ?><?php $v166466846972747429791loop->first = ($v166466846972747429791incr == 0); $v166466846972747429791loop->index = $v166466846972747429791incr + 1; $v166466846972747429791loop->index0 = $v166466846972747429791incr; $v166466846972747429791loop->revindex = $v166466846972747429791loop->length - $v166466846972747429791incr; $v166466846972747429791loop->revindex0 = $v166466846972747429791loop->length - ($v166466846972747429791incr + 1); $v166466846972747429791loop->last = ($v166466846972747429791incr == ($v166466846972747429791loop->length - 1)); ?>
    <?php if ($v166466846972747429791loop->first) { ?>
        <table class="table table-striped table-hover" id="table-daily-weight">
        <thead>
        <tr>
            <th>Date</th>
            <th class="text-right">Max</th>
            <th class="text-right">Min</th>
            <th class="text-right">Variance</th>
            <th class="text-right" style="width: 20%">Action</th>
        </tr>
        </thead>
        <tbody>
    <?php } ?>
    <tr>
        <td><?= $data['date'] ?></td>
        <td class="text-right"><?= $data['max'] ?></td>
        <td class="text-right"><?= $data['min'] ?></td>
        <td class="text-right"><?= $data['max'] - $data['min'] ?></td>
        <td class="text-right">
            <a href="/dailyweight/show/<?= $data['date'] ?>" class="btn btn-xs btn-default" role="button">
                <i class="glyphicon glyphicon-search"></i>
            </a>
            <a href="/dailyweight/edit/<?= $data['date'] ?>" class="btn btn-xs btn-default" role="button">
                <i class="glyphicon glyphicon-edit"></i>
            </a>
            <a href="/dailyweight/delete/<?= $data['date'] ?>" class="btn btn-xs btn-default" role="button">
                <i class="glyphicon glyphicon-trash"></i>
            </a>
        </td>
    </tr>
    <?php $totalMax += $data['max']; ?>
    <?php $totalMin += $data['min']; ?>

    <?php if ($v166466846972747429791loop->last) { ?>
        <tr>
            <td><strong>Average</strong></td>
            <td class="text-right"><?= $totalMax / $v166466846972747429791loop->length ?></td>
            <td class="text-right"><?= $totalMin / $v166466846972747429791loop->length ?></td>
            <td class="text-right"><?= $totalMax / $v166466846972747429791loop->length - $totalMin / $v166466846972747429791loop->length ?></td>
            <td></td>
        </tr>
        </tbody>
        </table>
    <?php } ?>
<?php $v166466846972747429791incr++; } ?>

<a href="/dailyweight/add" class="btn btn-default" style="margin-bottom:25px;" role="button">Add</a>