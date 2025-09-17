<?php
    $item_desc = filter_input(INPUT_POST, 'product_description');
    $price = filter_input(INPUT_POST, 'list_price');
    $discount_rate = filter_input(INPUT_POST, 'discount_percent');

    $discount_amount = $price * $discount_rate / 100;
    $final_price = $price - $discount_amount;

    $price_formatted = "$" . number_format($price, 2);
    $discount_rate_formatted = $discount_rate . "%";
    $discount_amount_formatted = "$" . number_format($discount_amount, 2);
    $final_price_formatted = "$" . number_format($final_price, 2);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <main>
        <h1>Product Discount Calculator</h1>

        <label>Product Description:</label>
        <span><?php echo htmlspecialchars($item_desc); ?></span><br>

        <label>List Price:</label>
        <span><?php echo htmlspecialchars($price_formatted); ?></span><br>

        <label>Standard Discount:</label>
        <span><?php echo htmlspecialchars($discount_rate_formatted); ?></span><br>

        <label>Discount Amount:</label>
        <span><?php echo $discount_amount_formatted; ?></span><br>

        <label>Discount Price:</label>
        <span><?php echo $final_price_formatted; ?></span><br>
    </main>
</body>
</html>