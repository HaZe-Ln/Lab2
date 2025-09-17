<?php
    $amount = filter_input(INPUT_POST, 'investment', FILTER_VALIDATE_FLOAT);
    $rate = filter_input(INPUT_POST, 'interest_rate', FILTER_VALIDATE_FLOAT);
    $duration = filter_input(INPUT_POST, 'years', FILTER_VALIDATE_INT);

    if ($amount === FALSE) {
        $error_text = 'Investment must be a valid number.';
    } elseif ($amount <= 0) {
        $error_text = 'Investment must be greater than zero.';
    } elseif ($rate === FALSE) {
        $error_text = 'Interest rate must be a valid number.';
    } elseif ($rate <= 0) {
        $error_text = 'Interest rate must be greater than zero.';
    } elseif ($rate > 15) {
        $error_text = 'Interest rate must be less than or equal to 15.';
    } elseif ($duration === FALSE) {
        $error_text = 'Years must be a valid whole number.';
    } elseif ($duration <= 0) {
        $error_text = 'Years must be greater than zero.';
    } elseif ($duration > 30) {
        $error_text = 'Years must be less than 31.';
    } else {
        $error_text = '';
    }

    if ($error_text !== '') {
        include('index.php');
        exit();
    }

    $final_value = $amount;
    $counter = 1;
    while ($counter <= $duration) {
        $final_value += $final_value * $rate / 100;
        $counter++;
    }

    $amount_formatted = '$' . number_format($amount, 2);
    $rate_formatted = $rate . '%';
    $final_value_formatted = '$' . number_format($final_value, 2);

    $current_date = date('m/d/Y');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <main>
        <h1>Future Value Calculator</h1>

        <label>Investment Amount:</label>
        <span><?php echo $amount_formatted; ?></span><br>

        <label>Yearly Interest Rate:</label>
        <span><?php echo $rate_formatted; ?></span><br>

        <label>Number of Years:</label>
        <span><?php echo $duration; ?></span><br>

        <label>Future Value:</label>
        <span><?php echo $final_value_formatted; ?></span><br>

        <p>This calculation was done on <?php echo $current_date; ?>.</p>
    </main>
</body>
</html>