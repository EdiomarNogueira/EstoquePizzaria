var clock = document.getElementById('relogio');


setInterval(function() {
    clock.innerHTML = ("Horário: " + ((new Date).toLocaleString().substr(11, 8)));
}, 1000);