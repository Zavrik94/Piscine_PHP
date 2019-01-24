'use strict';

document.querySelectorAll('.tbodytr').forEach(row => row.addEventListener("click", function () {
    this.querySelectorAll('td').forEach(function(td) {
        let name = td.getAttribute('name');
        let form = document.querySelector('div.change_form');
        let curNode;

        if (name == 'category') {
            // curNode = form.querySelectorAll('select[name="' + name + '"]>option');
            // curNode.forEach(function(node) {
            //     console.log(node.getAttribute('selected'));
            //     if (node.getAttribute('selected')) {

            //     }
            // })
        } else if (name == 'about') {
            curNode = form.querySelector('textarea[name="' + name + '"]');
            curNode.innerText = td.innerText;
        } else if (name == 'img') {
            curNode = form.querySelector('input[name="' + name + '"]');
            curNode.setAttribute('value', td.childNodes[0].getAttribute('src'))
        } else if ((curNode = form.querySelector('input[name="' + name + '"]'))) {
            curNode.setAttribute('value', td.innerText)
        }
    });
}));
