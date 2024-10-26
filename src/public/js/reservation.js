'use strict';
{
    // 予約時「今日以降」のみ選択設定
    window.onload = function(){
        let getToday = new Date();
        let y = getToday.getFullYear();
        let m = getToday.getMonth() + 1;
        let d = getToday.getDate();
        let today = y + "-" + m.toString().padStart(2,'0') + "-" + d.toString().padStart(2,'0');
        document.getElementById("datepicker2").setAttribute("min",today);
    }

    // 予約確認リアルタイム表示
    const select_date = document.querySelector('input[class="select_date"]');
    const reserved_date = document.querySelector('.reserved_date');

    select_date.addEventListener('input', () => {
        reserved_date.textContent = select_date.value;
    });

    const select_time = document.querySelector('.select_time');
    const reserved_time = document.querySelector('.reserved_time');

    select_time.addEventListener('input', () => {
        reserved_time.textContent = select_time.value;
    });

    const select_number = document.querySelector('.select_number');
    const reserved_number = document.querySelector('.reserved_number');

    select_number.addEventListener('input', () => {
        reserved_number.textContent = `${select_number.value}人`;
    });
}
