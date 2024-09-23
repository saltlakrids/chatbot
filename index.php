<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Fact Bot</title>
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


$humanFacts = [
    "Humans are the only species known to blush.",
    "The human brain is more active at night than during the day.",
    "Human bones are about five times stronger than steel of the same density.",
    "The average human body contains enough fat to make seven bars of soap.",
    "Your body has about 37.2 trillion cells, constantly working to keep you alive."
];


$botMessage = "Would you like to hear an animal fact or a human fact?";
$randomFact = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['message'])) {
    $userInput = strtolower(trim($_POST['message'])); 

    if ($userInput === 'animal') {
        $randomFact = $animalFacts[array_rand($animalFacts)];
        $botMessage = "Here’s an animal fact for you:";
    } elseif ($userInput === 'human') {
        $randomFact = $humanFacts[array_rand($humanFacts)];
        $botMessage = "Here’s a human fact for you:";
    } else {
       
        $randomFact = $animalFacts[array_rand($animalFacts)];
        $botMessage = "I didn’t quite catch that, so here’s an animal fact for you:";
    }
}
?>

<body>
    <div class="chat-container">
        <header class="chat-header"><h2>Random Fact Bot</h2></header>
        <div class="chat-box">
            
    
            <div class="chat bot">
                <div class="message">
                    <p><?php echo $botMessage; ?></p>
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
            <input type="text" placeholder="Type 'animal' or 'human'..." id="userInput" name="message" required>
            <button type="submit">Send</button>
        </form>
    </div>
</body>
</html>
