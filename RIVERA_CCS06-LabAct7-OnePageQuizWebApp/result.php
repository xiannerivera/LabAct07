<?php

require "vendor/autoload.php";

session_start();

use App\QuestionManager;

$score = null;
try {
    $manager = new QuestionManager;
    $manager->initialize();

    if (!isset($_SESSION['answers'])) {
        throw new Exception('Missing answers');
    }

    // Check if all questions are answered
    $questionSize = $manager->getQuestionSize();
    if (count($_SESSION['answers']) !== $questionSize) {
        throw new Exception('All questions are not answered');
    }

    $score = $manager->computeScore($_SESSION['answers']);
} catch (Exception $e) {
    echo '<h1>An error occurred:</h1>';
    echo '<p>' . $e->getMessage() . '</p>';
    exit;
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiz</title>
</head>
<body>

<h1>Thank You!</h1>
<h3>
    Congratulations <?php echo $_SESSION['complete_name']; ?> (<?php echo $_SESSION['email']; ?>)! <br />
    Score: <span style="color: blue"><?php echo $score; ?></span> out of <?php echo $manager->getQuestionSize() ;?> items <br />
    Your Answers:
</h3>
    <ol>
    <?php for($number=1;$number<=10;$number++): ?>
        <li><?php echo $_SESSION['answers'][$number]; ?> <?php $manager->checkAnsSingle($_SESSION['answers'][$number], $number); ?></li>
    <?php endfor; ?>
    </ol>
<!-- DEBUG MODE -->
<pre>
<?php
var_dump($_SESSION);
?>
</pre>

</body>
</html>