<?php
    include "TransactionController.php";

    $transaction = TransactionController::ShowTransaction($_POST["table"], $_POST["id"])->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> -->
        <title>Document</title>
    </head>
    <body>
        <form  action="./updateTransaction.php" method="post">
            <div>
                <label for="title">title</label>
                <input type="text" value="<?= $transaction["title"] ?>" name="title" id="title" required>
            </div>
            <div>
                <label for="amount">amount</label>
                <input type="number" value="<?= $transaction["amount"] ?>" name="amount" id="amount" required>
            </div>
            <div>
                <label for="description">description</label>
                <textarea name="description" value="<?= $transaction["description"] ?>" id="description"><?= $transaction["description"] ?></textarea>
            </div>
            <div>
                <label for="date">date</label>
                <input type="date" id="date" name="date" value="<?= $transaction["date"] ?>">
            </div>
            <select name="type"  id="type" required>
                <option><?= $_POST["table"] ?></option>
            </select>

            <input type="hidden" name="id" value="<?= $transaction["id"] ?>">

            <button type="submit">submit</button>
        </form>
    </body>
</html>