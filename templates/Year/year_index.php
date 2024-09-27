<?php $this->assign('title', '연도별 기록실'); ?>

<div class="container grid justify-center">
    <h1 class="text-center mb-3">연도별 기록</h1>
    <select name="year" class="form-select">
        <option value="">Select Year</option>
        <?php foreach ($years as $id => $year): ?>
            <option value="<?= $id ?>" <?= $year == $defaultYear ? 'selected' : '' ?>>
                <?= $year ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold text-center mb-6">2023년도 KBO리그 순위</h1>
    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2 text-center">순위</th>
                <th class="border border-gray-300 px-4 py-2 text-center">팀이름</th>
                <th class="border border-gray-300 px-4 py-2 text-center">시합</th>
                <th class="border border-gray-300 px-4 py-2 text-center">승</th>
                <th class="border border-gray-300 px-4 py-2 text-center">패</th>
                <th class="border border-gray-300 px-4 py-2 text-center">무</th>
                <th class="border border-gray-300 px-4 py-2 text-center">승률</th>
                <th class="border border-gray-300 px-4 py-2 text-center">게임차</th>
                <th class="border border-gray-300 px-4 py-2 text-center">최근</th>
                <th class="border border-gray-300 px-4 py-2 text-center">연속</th>
                <th class="border border-gray-300 px-4 py-2 text-center">홈 성적</th>
                <th class="border border-gray-300 px-4 py-2 text-center">원정 성적</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($teamRecords as $record): ?>
                <tr class="bg-white">
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <?= $record->ranking ?>
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <?= $record->team_name ?>
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <?= $record->games_played ?>
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <?= $record->wins ?>
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <?= $record->losses ?>
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <?= $record->draws ?>
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <?= $record->win_rate ?>
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <?= $record->game_diff ?>
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <?= $record->last_10_games ?>
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <?= $record->streak ?>
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <?= $record->home_record ?>
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <?= $record->away_record ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
