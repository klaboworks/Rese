'use strict';
{
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
