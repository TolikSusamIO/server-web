const display = document.getElementById('display');

function append(value) {
    display.value += value;
}

function clearDisplay() {
    display.value = '';
}

document.addEventListener('keydown', function(event) {

    const allowed = '0123456789+-*/().^!';

    if (allowed.includes(event.key)) {
        display.value += event.key;
    }

    if (event.key === 'Backspace') {
        display.value = display.value.slice(0, -1);
    }

    if (event.key === 'Enter') {
        event.preventDefault();
        document.forms[0].submit();
    }

});