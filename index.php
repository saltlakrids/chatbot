<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Fact Bot</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="chat-container">
        <header class="chat-header"><h2>Random Fact Bot</h2></header>
        <div class="chat-box" id="chatBox">
        <p class="static" >Would you like to hear an animal fact or a human fact?</p>
        </div>

        <form id="chatForm" class="chat-input">
            
            <input type="text" placeholder="Type 'animal' or 'human'..." id="userInput" name="message" required oninput="countCharacters()">
            <button type="submit">Go</button>
            <div class="counter" id="charCount">0/6 characters</div>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>
