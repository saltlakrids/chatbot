<?php
session_start();

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

if (!isset($_SESSION['chat'])) {
    $_SESSION['chat'] = [['bot' => "Would you like to hear an animal fact or a human fact?"]];
}

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'history') {
    echo json_encode($_SESSION['chat']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
    $userInput = strtolower(trim($_POST['message']));
    $_SESSION['chat'][] = ['user' => htmlspecialchars($userInput)];

    $botMessage = handleUserInput($userInput, $animalFacts, $humanFacts);
    $_SESSION['chat'][] = ['bot' => $botMessage];

    maintainChatHistory();
    echo json_encode(['user' => $userInput, 'bot' => $botMessage]);
    exit;
}

function handleUserInput($input, $animalFacts, $humanFacts) {
    switch ($input) {
        case 'animal':
            return "Here’s an animal fact for you: " . $animalFacts[array_rand($animalFacts)];
        case 'human':
            return "Here’s a human fact for you: " . $humanFacts[array_rand($humanFacts)];
        default:
            return "I didn’t quite catch that, so here’s an animal fact for you: " . $animalFacts[array_rand($animalFacts)];
    }
}

function maintainChatHistory() {
    $_SESSION['chat'] = array_slice($_SESSION['chat'], -6, 6, true);
}
?>
