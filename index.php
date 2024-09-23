<?php
require 'facts.php'; 
?>

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
        <div class="chat-box">

         
            <?php if (!empty($_SESSION['chat'])): ?>
                <?php foreach ($_SESSION['chat'] as $chat): ?>
                    <?php if (isset($chat['user'])): ?>
                        <div class="chat user">
                            <div class="message">
                                <p><?php echo $chat['user']; ?></p>
                            </div>
                        </div>
                    <?php elseif (isset($chat['bot'])): ?>
                        <div class="chat bot">
                            <div class="message">
                                <p><?php echo $chat['bot']; ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
            
        </div>

        <form method="POST" class="chat-input" onsubmit="return checkInputLength()">
            <input type="text" placeholder="Type 'animal' or 'human'..." id="userInput" name="message" required oninput="countCharacters()">
            <button type="submit">Go</button>
            <div class="counter" id="charCount">0/6 characters</div>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>
