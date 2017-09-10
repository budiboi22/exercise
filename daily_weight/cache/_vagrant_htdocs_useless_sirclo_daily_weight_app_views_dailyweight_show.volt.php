<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Show</div>

    <!-- Table -->

    <table class="table">
        <tbody>
            <tr>
                <td align="left">Date</td>
                <td align="left"><?= $data['date'] ?></td>
            </tr>
            <tr>
                <td align="left">Max Weight</td>
                <td align="left"><?= $data['max'] ?></td>
            </tr>
            <tr>
                <td align="left">Min Weight</td>
                <td align="left"><?= $data['min'] ?></td>
            </tr>
            <tr>
                <td align="left">Variance</td>
                <td align="left"><?= $data['max'] - $data['min'] ?></td>
            </tr>
        </tbody>
    </table>
</div>

<a href="/dailyweight" class="btn btn-default" role="button">Back</a>