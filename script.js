function countCharacters() {
    const input = document.getElementById('userInput');
    const charCount = document.getElementById('charCount');
    const maxLength = 6;


    if (input.value.length > maxLength) {
        const excessLength = input.value.length - maxLength;
        charCount.textContent = `${input.value.length}/${maxLength} characters`;

  
        const normalText = input.value.slice(0, maxLength); 
        const excessText = input.value.slice(maxLength); 
        input.value = normalText; 

       
        const displayText = `${normalText}<span class="error-char">${excessText}</span>`;
        input.setAttribute('data-display', displayText); 
        input.classList.add('error'); 
        charCount.style.color = 'red';
    } else {
        charCount.textContent = `${input.value.length}/${maxLength} characters`;
        input.classList.remove('error'); 
        charCount.style.color = 'gray';
    }
}

function checkInputLength() {
    const input = document.getElementById('userInput');
    const maxLength = 6;


    return input.value.length <= maxLength; 
}


document.addEventListener('input', function() {
    const input = document.getElementById('userInput');
    input.style.color = input.value.length > 6 ? 'red' : 'black';
    input.innerHTML = input.getAttribute('data-display') || input.value;
});
