<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Animal Fact Bot</title>
    <link rel="stylesheet" href="styles.css">
</head>

<?php

$animalFacts = [
    "A group of flamingos is called a 'flamboyance'.",
    "Octopuses have three hearts and blue blood.",
    "Elephants are the only animals that can't jump.",
    "A snail can sleep for three years without waking up.",
    "Koalas sleep up to 22 hours a day."
];


$randomFact = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['message'])) {

    $randomFact = $animalFacts[array_rand($animalFacts)];
}
?>

<body>
    <div class="chat-container">
        <header class="chat-header"><h2>Random Animal Fact Bot</h2></header>
        <div class="chat-box">

       
            <div class="chat bot">
                <div class="message">
                    <p>Hey! Want to hear some random facts?</p>
                </div>
            </div>

            <?php if (!empty($_POST['message'])): ?>
                <div class="chat user">
                    <div class="message">
                        <p><?php echo htmlspecialchars($_POST['message']); ?></p>
                    </div>
                </div>

          
                <div class="chat bot">
                    <div class="message">
                        <p><?php echo $randomFact; ?></p>
                    </div>
                </div>
            <?php endif; ?>
            
        </div>

      
        <form method="POST" class="chat-input">
            <input type="text" placeholder="Type your message..." id="userInput" name="message" required>
            <button type="submit">Send</button>
        </form>
    </div>
</body>
</html>
