'use strict';
{
    // 予約アップデートパネル
    const update_btns = document.querySelectorAll('.update_btn');
    const updates = document.querySelectorAll('.reservation__field--update');
    const update_cancel = document.querySelectorAll('.update_cancel');
    console.log(updates);

    for (let i = 0; i < update_btns.length; i++) {
        update_btns[i].addEventListener('click', () => { updates[i].classList.remove('reservation_update_hidden') });
        update_cancel[i].addEventListener('click', () => { updates[i].classList.add('reservation_update_hidden') });
    }


    // 予約キャンセルパネル
    const cancel_btns = document.querySelectorAll('.cancel_btn');
    const cancels = document.querySelectorAll('.reservation__field--cancel');
    const cancel_cancel = document.querySelectorAll('.cancel_cancel');
    console.log(cancel_cancel);

    for (let i = 0; i < cancel_btns.length; i++) {
        cancel_btns[i].addEventListener('click', () => { cancels[i].classList.remove('reservation_cancel_hidden') });
        cancel_cancel[i].addEventListener('click', () => { cancels[i].classList.add('reservation_cancel_hidden') });
    }

    const keyframes = {
        opacity: [1, 0],
    };

    const options = {
        duration: 1000,
        delay: 1500,
        easing: 'ease',
        fill: 'forwards',
    }

    const message = document.querySelector('.message');
    message.animate(keyframes, options);
}
