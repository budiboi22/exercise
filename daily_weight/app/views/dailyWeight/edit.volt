<form action="/dailyweight/save" method="POST">
    <div class="form-group">
        <label for="date">Date</label>
        <input type="text" class="form-control" id="date" placeholder="Date" value="{{ data['date'] }}">
    </div>
    <div class="form-group">
        <label for="max">Max</label>
        <input type="number" class="form-control" id="Max" placeholder="Max" value="{{ data['max'] }}">
    </div>
    <div class="form-group">
        <label for="min">Min</label>
        <input type="number" class="form-control" id="Min" placeholder="Min" value="{{ data['min'] }}">
    </div>
    <button type="submit" class="btn btn-success">Save</button>
    <a href="/dailyweight" class="btn btn-default" role="button">Back</a>
</form>