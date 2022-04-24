const title = document.getElementById('title');
const content = document.getElementById('content');
const form = document.getElementById('form');
const clear = document.getElementById('clear');


form.addEventListener('submit', (e) => {
    let messages = []
    const errorColour = '#FFA7A7';

    if (title.value === '' || title.value == null) {
        title.style.background = errorColour;
        e.preventDefault()
    }
    if (content.value === '' || content.value == null) {
        content.style.background = errorColour;
        e.preventDefault()
    }
    else {
        form.submit();
    }

})

clear.addEventListener('click', e => {
    e.preventDefault();
    window.confirm('Are you sure you want to clear?');
    document.getElementById('form').reset();
});