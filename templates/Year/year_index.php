<?php $this->assign('title', '연도별 기록실'); ?>

<div class="container grid justify-center">
    <h1 class="text-center mb-3">연도별 기록</h1>
    <select name="year" class="form-select">
        <option value="">Select Year</option>
        <?php foreach ($years as $id => $year): ?>
            <option value="<?= $id ?>"><?= $year ?></option>
        <?php endforeach; ?>
    </select>
</div>
