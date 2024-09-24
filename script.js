const chatBox = document.getElementById('chatBox');
const chatForm = document.getElementById('chatForm');
const userInput = document.getElementById('userInput');
const charCount = document.getElementById('charCount');
const maxLength = 6;

fetch('facts.php?action=history')
    .then(response => response.json())
    .then(data => {
        data.forEach(message => {
            if (message.user) {
                appendMessage('user', message.user);
            } else if (message.bot) {
                appendMessage('bot', message.bot);
            }
        });
    });

function appendMessage(type, message) {
    const messageDiv = document.createElement('div');
    messageDiv.classList.add('chat', type);
    messageDiv.innerHTML = `<p class="message">${message}</p>`;
    chatBox.appendChild(messageDiv);
    chatBox.scrollTop = chatBox.scrollHeight;
}

chatForm.addEventListener('submit', function (e) {
    e.preventDefault();
    const message = userInput.value;


    if (message.length > maxLength) {
        userInput.value = message.slice(0, maxLength); 
    }


    fetch('facts.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({ message: userInput.value })
    })
    .then(response => response.json())
    .then(data => {
        appendMessage('user', userInput.value);
        appendMessage('bot', data.bot);
        userInput.value = ''; 
        countCharacters();
    });
});


function countCharacters() {
    const inputLength = userInput.value.length;
    charCount.textContent = `${inputLength}/${maxLength} characters`;
    userInput.style.color = inputLength > maxLength ? 'red' : 'black';

    if (inputLength > maxLength) {
        userInput.value = userInput.value.slice(0, maxLength);
        charCount.textContent = `${maxLength}/${maxLength} characters`;
    }
}


userInput.addEventListener('input', countCharacters);
