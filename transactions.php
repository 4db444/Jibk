<?php
    include "modal.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form  action="./addTransaction.php" method="post">
        <div>
            <label for="title">title</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="amount">amount</label>
            <input type="number" name="amount" id="amount" required>
        </div>
        <div>
            <label for="description">description</label>
            <textarea name="description" id="description"></textarea>
        </div>
        <div>
            <label for="date">date</label>
            <input type="date" id="date" name="date">
        </div>
        <select name="type" id="type" required>
            <option value="" selected disabled>select a transaction type</option>
            <option value="expenses">Expense</option>
            <option value="incomes">Income</option>
        </select>
        <button type="submit">submit</button>
    </form>
</body>
</html>