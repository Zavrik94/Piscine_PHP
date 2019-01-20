'use strict';

document.querySelectorAll('.tbodytr').forEach(row => row.addEventListener("click", function () {
    this.querySelectorAll('td').forEach(function(td) {
        let name = td.getAttribute('name');
        let form = document.querySelector('div.change_form');
        let curNode;

        if (name == 'category') {
            curNode = form.querySelector('select[name="' + name + '"]');
            curNode.childNodes.forEach(function(cn) {
                console.log(cn);
                // console.log(cn.getAttribute('selected'), cn.getAttribute('value'));
                // if (cn.getAttribute('selected')) {
                //     cn.setAttribute('selected', 'false');
                // }
                // if ()
            });
        } else if (name == 'about') {
            curNode = form.querySelector('textarea[name="' + name + '"]');
            curNode.innerText = td.innerText;
        } else if (name == 'img') {
            curNode = form.querySelector('input[name="' + name + '"]');
            curNode.setAttribute('value', td.childNodes[0].getAttribute('src'))
        } else {
            curNode = form.querySelector('[name="' + name + '"]');
            curNode.setAttribute('value', td.innerText)
        }
    });
}));

