'use strict';
{
    const menu_boxes = document.querySelectorAll('.menu_box');
    const menu_panel = document.querySelector('.menu_panel');

    menu_boxes.forEach((menu_box) => {
        menu_box.addEventListener('click', () => {
            menu_panel.classList.toggle('menu_panel_hidden');
        });
    });
}
