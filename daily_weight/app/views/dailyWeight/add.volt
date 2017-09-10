<form action="/dailyweight/save" method="POST">
    <div class="form-group">
        <label for="date">Date</label>
        <input type="date" class="form-control" name="date" id="date" placeholder="Date">
    </div>
    <div class="form-group">
        <label for="max">Max Weight</label>
        <input type="number" class="form-control" name="max" id="max" placeholder="Max Weight">
    </div>
    <div class="form-group">
        <label for="min">Min Weight</label>
        <input type="number" class="form-control" name="min" id="min" placeholder="Min Weight">
    </div>
    <button type="submit" class="btn btn-success">Save</button>
    <a href="/dailyweight" class="btn btn-default" role="button">Back</a>
</form>
