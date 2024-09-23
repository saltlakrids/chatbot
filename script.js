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


const chatBox = document.getElementById('chatBox');
        const chatForm = document.getElementById('chatForm');
        const userInput = document.getElementById('userInput');

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
            messageDiv.innerHTML = `<div class="message"><p>${message}</p></div>`;
            chatBox.appendChild(messageDiv);
            chatBox.scrollTop = chatBox.scrollHeight; 
        }

   
        chatForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const message = userInput.value;

         
            fetch('facts.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({ message: message })
            })
            .then(response => response.json())
            .then(data => {
                appendMessage('user', message);
                appendMessage('bot', data.bot);
                userInput.value = ''; 
                countCharacters(); 
            });
        });

       
        function countCharacters() {
            const maxLength = 6;
            const input = userInput.value;
            const charCount = document.getElementById('charCount');

            charCount.textContent = `${input.length}/${maxLength} characters`;
            userInput.style.color = input.length > maxLength ? 'red' : 'black';

         
            if (input.length > maxLength) {
                userInput.value = input.slice(0, maxLength);
                charCount.textContent = `${maxLength}/${maxLength} characters`;
                userInput.style.color = 'red';
            }
        }