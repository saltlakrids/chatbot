
function countCharacters() {
    const input = document.getElementById('userInput');
    const charCount = document.getElementById('charCount');
    const maxLength = 6;

    charCount.textContent = `${input.value.length}/${maxLength} characters`;

    if (input.value.length > maxLength) {
        input.classList.add('error');
        charCount.style.color = 'red';
    } else {
        input.classList.remove('error');
        charCount.style.color = 'gray';
    }
}


function checkInputLength() {
    const input = document.getElementById('userInput');
    const maxLength = 6;

    if (input.value.length > maxLength) {
        input.classList.add('error');
        return false; 
    }
    return true; 
}
