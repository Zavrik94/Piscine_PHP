let list = document.getElementById('ft_list');
let todo_all = document.getElementsByClassName('elem');

function delete_task(task_param) {
    if (confirm('you want to delete this?')) {
        let task = document.getElementById('ft_list');
        task.removeChild(task_param);
        setCookie(task_param.getAttribute("name").trim(), encodeURIComponent(task_param.innerHTML), -1);
    }
}

function getRndInteger(min, max) {
    return Math.floor(Math.random() * (max - min + 1) ) + min;
}

function setCookie(cname, cvalue, exdays) {
    let d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    document.cookie = cname + "=" + cvalue + ";expires=" + d.toUTCString() + ";path=/";
}

window.onload = function() {
    let coo = [];
    document.cookie.split(';').forEach(function(elem) {
        let a = elem.split('=');
        if (parseInt(a[0]) == a[0]) {
            coo.push(a);
        }
    });

    if (coo) {
        let i = coo.length - 1;
        for (i; i >= 0; i--) {
            list.innerHTML += '<div name="' + coo[i][0] + '" class="elem" onclick="delete_task(this)">' + decodeURIComponent(coo[i][1]) + '</div>';
        }
    }
    
    document.getElementById('add').onclick = function () {
        let new_task_text = prompt("Create new To Do");
        if (new_task_text == '') {
            return ;
        }
        if (todo_all) {
            let new_task = document.createElement('div');
            let text = document.createTextNode(new_task_text);
            new_task.appendChild(text);
            new_task.classList.add('elem');
            new_task.setAttribute('onclick', 'delete_task(this)');
            list.insertBefore(new_task, todo_all[0]);
        } else {
            list.innerHTML += '<div class="elem" onclick="delete_task(this)">' + new_task_text + '</div>';
        }
        setCookie(getRndInteger(0, 100000), encodeURIComponent(list.children[0].innerHTML), 2);
    }
}
