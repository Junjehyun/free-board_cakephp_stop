<?php
    $this->assign('title', '연도별 기록실');
?>
<!-- 처음부터 전부 다시 시작, 너무 놀았다 제대로 하자. -->
<div class="container grid justify-center">
    <select name="year" class="form-select" id="yearSelect">
        <option value="">Select Year</option>
    </select>
</div>
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold text-left mb-6" id="yearTitle"><?php //$defaultYear ?>시즌 순위</h1>
    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2 text-center">rank</th>
                <th class="border border-gray-300 px-4 py-2 text-center">team</th>
                <th class="border border-gray-300 px-4 py-2 text-center">games</th>
                <th class="border border-gray-300 px-4 py-2 text-center">wins</th>
                <th class="border border-gray-300 px-4 py-2 text-center">loses</th>
                <th class="border border-gray-300 px-4 py-2 text-center">draw</th>
                <th class="border border-gray-300 px-4 py-2 text-center">rate</th>
                <th class="border border-gray-300 px-4 py-2 text-center">diff</th>
                <th class="border border-gray-300 px-4 py-2 text-center">last10</th>
                <th class="border border-gray-300 px-4 py-2 text-center">streak</th>
                <th class="border border-gray-300 px-4 py-2 text-center">home</th>
                <th class="border border-gray-300 px-4 py-2 text-center">away</th>
            </tr>
        </thead>
        <tbody>
            <?php //foreach ($teamRecords as $record): ?>
                <tr class="bg-white">
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <?php //$record->ranking ?>
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <?php //$record->team_name ?>
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <?php //$record->games_played ?>
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <?php //$record->wins ?>
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <?php //$record->losses ?>
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <?php //$record->draws ?>
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <?php //$record->win_rate ?>
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <?php //$record->game_diff ?>
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <?php //$record->last_10_games ?>
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <?php //$record->streak ?>
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <?php //$record->home_record ?>
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <?php //$record->away_record ?>
                    </td>
                </tr>
            <?php //endforeach; ?>
        </tbody>
    </table>
</div>
<script>
    // h1 연도 타이틀 동적 설정
    // const yearSelect = document.getElementById('yearSelect');
    // const yearTitle = document.getElementById('yearTitle');

    // yearSelect.addEventListener('change', function() {
    //     const selectedYear = yearSelect.options[yearSelect.selectedIndex].text;
    //     yearTitle.innerText = `${selectedYear} 순위`;
    // });
</script>
