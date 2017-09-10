{% set totalMax = 0 %}
{% set totalMin = 0 %}
{% for data in data %}
    {% if loop.first %}
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
    {% endif %}
    <tr>
        <td>{{ data['date'] }}</td>
        <td class="text-right">{{ data['max'] }}</td>
        <td class="text-right">{{ data['min'] }}</td>
        <td class="text-right">{{ data['max'] - data['min'] }}</td>
        <td class="text-right">
            <a href="/dailyweight/show/{{ data['date'] }}" class="btn btn-xs btn-default" role="button">
                <i class="glyphicon glyphicon-search"></i>
            </a>
            <a href="/dailyweight/edit/{{ data['date'] }}" class="btn btn-xs btn-default" role="button">
                <i class="glyphicon glyphicon-edit"></i>
            </a>
            <a href="/dailyweight/delete/{{ data['date'] }}" class="btn btn-xs btn-default" role="button">
                <i class="glyphicon glyphicon-trash"></i>
            </a>
        </td>
    </tr>
    {% set totalMax += data['max'] %}
    {% set totalMin += data['min'] %}

    {% if loop.last %}
        <tr>
            <td><strong>Average</strong></td>
            <td class="text-right">{{ totalMax / loop.length }}</td>
            <td class="text-right">{{ totalMin / loop.length }}</td>
            <td class="text-right">{{ totalMax / loop.length - totalMin / loop.length }}</td>
            <td></td>
        </tr>
        </tbody>
        </table>
    {% endif %}
{% endfor %}

<a href="/dailyweight/add" class="btn btn-default" style="margin-bottom:25px;" role="button">Add</a>