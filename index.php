<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My chatbot project</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="chat-container">
        <header class="chat-header">
            <h2>Chatbot</h2>
        </header>

        <div class="chat-box">

        <div class="chat bot">
                <div class="message">
                    <p>Hey! What is your request today?</p>
                </div>
            </div>
           
            <div class="chat user">
                <div class="message"><?php echo isset($_GET['message']) ? $_GET ['message'] : ''; ?>
                    <p></p>
                </div>
            </div>
        </div>

        <form method="GET" class="chat-input">
            <input type="text" placeholder="Type your message..." id="userInput" name="message">
            <button>Send</button>
        </form>
    </div>
</body>
</html>