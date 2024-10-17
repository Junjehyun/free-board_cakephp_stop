<?php
    $this->assign('title', '연도별 기록실');
?>
<div class="container flex justify-start">
    <select name="year" class="form-select w-1/4" id="yearSelect">
        <option value="">연도 선택</option>
            <?php foreach ($years as $id => $year): ?>
                <option value="<?= $id ?>">
                    <?= h($year)?>
                시즌 순위</option>
            <?php endforeach; ?>
    </select>
</div>
<div class="container mx-auto mt-8">
    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2 text-center">순위</th>
                <th class="border border-gray-300 px-4 py-2 text-center">팀</th>
                <th class="border border-gray-300 px-4 py-2 text-center">시합</th>
                <th class="border border-gray-300 px-4 py-2 text-center">승</th>
                <th class="border border-gray-300 px-4 py-2 text-center">패</th>
                <th class="border border-gray-300 px-4 py-2 text-center">무</th>
                <th class="border border-gray-300 px-4 py-2 text-center">승률</th>
                <th class="border border-gray-300 px-4 py-2 text-center">승차</th>
                <th class="border border-gray-300 px-4 py-2 text-center">최근10</th>
                <th class="border border-gray-300 px-4 py-2 text-center">연속</th>
                <th class="border border-gray-300 px-4 py-2 text-center">홈</th>
                <th class="border border-gray-300 px-4 py-2 text-center">원정</th>
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
<script>
    //h1 연도 타이틀 동적 설정
    const yearSelect = document.getElementById('yearSelect');
    const yearTitle = document.getElementById('yearTitle');

    yearSelect.addEventListener('change', function() {
        const selectedYear = yearSelect.options[yearSelect.selectedIndex].text;
        yearTitle.innerText = `${selectedYear} 순위`;
    });

    // selectbox ajax
    $('#yearSelect').on('change', function() {
        //const yearId = $(this).val();

        // 실제 연도 값
        const selectedYear = $(this).val();
        console.log('selectedYear:', selectedYear);

        if (selectedYear) {
            $.ajax({
                url: '/year/getTeamRecords/' + selectedYear,
                type: 'GET',
                data: { year: selectedYear },
                dataType: 'json',
                success: function(response) {
                    console.log('서버로부터 응답:', response); // response 형식 확인
                    if (Array.isArray(response.records)) {
                        updateTable(response.records);  // 배열이면 테이블 업데이트
                    } else {
                        console.error("응답이 배열이 아닙니다.", response.records);
                    }
                },
                error: function() {
                    alert('에러가 발생 했습니다.');
                }
            });
        }
    });

    function updateTable(records) {
        const tbody = $('table tbody');
        tbody.empty();

        //받은 데이터를 테이블에 추가
        records.forEach(function(record){
            const row = `
                <tr class="bg-white">
                    <td class="border border-gray-300 px-4 py-2 text-center">${record.ranking}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">${record.team_name}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">${record.games_played}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">${record.wins}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">${record.losses}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">${record.draws}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">${record.win_rate}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">${record.game_diff}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">${record.last_10_games}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">${record.streak}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">${record.home_record}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">${record.away_record}</td>
                </tr>
            `;
            tbody.append(row); // 새로 생성된 행을 테이블에 추가
        });
    }
</script>
