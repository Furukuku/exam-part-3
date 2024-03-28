<form action="<?= site_url("search"); ?>" method="post" class="d-flex flex-wrap align-items-center justify-content-between">
    <p class="fs-2"><?= count($assignments); ?> Assignments</p>
    <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>">
    <div class="d-flex gap-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="easy" value="1" <?= isset($values) && isset($values["easy"]) ? "checked" : ""; ?> id="easy">
            <label class="form-check-label" for="easy">Easy</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="intermediate" value="1" <?= isset($values) && isset($values["intermediate"]) ? "checked" : ""; ?> id="intermediate">
            <label class="form-check-label" for="intermediate">Intermediate</label>
        </div>
    </div>
    <div>
        <select name="track" class="form-select">
            <option value="">All</option>
<?php
            foreach ($tracks as $track) {
?>
            <option value="<?= $track; ?>" <?= isset($values) && $values["track"] == $track ? "selected" : ""; ?>><?= $track; ?></option>
<?php
            }
?>
        </select>
    </div>
</form>
<table class="table table-striped table-bordered">
    <thead class="table-secondary">
        <tr>
            <th>Assignment</th>
            <th>Sequence num</th>
            <th>Level</th>
            <th>Track</th>
        </tr>
    </thead>
    <tbody>
<?php
        foreach ($assignments as $assignment) {
?>
        <tr>
            <td><?= $assignment["name"]; ?></td>
            <td><?= $assignment["sequence_num"]; ?></td>
            <td><?= $assignment["level"]; ?></td>
            <td><?= $assignment["track"]; ?></td>
        </tr>
<?php
        }
?>
    </tbody>
</table>