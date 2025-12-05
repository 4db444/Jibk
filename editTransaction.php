<?php
    include "TransactionController.php";

    $transaction = TransactionController::ShowTransaction($_POST["table"], $_POST["id"])->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <title>Document</title>
    </head>
    <body>
        <?php
            include "./components/header.php";
        ?>
        <form  action="./updateTransaction.php" method="post" class="bg-white w-[400px] p-4 flex flex-col gap-3 rounded mx-auto ">
            <h1 class="text-center text-2xl text-green-600 font-semibold capitalize">update <?= $_POST["table"] ?></h1>

            <div>
                <label class="block capitalize" for="title">title</label>
                <input class="w-full border border-gray border-1 px-2 py-1 rounded-[7px]" type="text" value="<?= $transaction["title"] ?>" name="title" id="title" required>
            </div>
            <div>
                <label class="block capitalize" for="amount">amount</label>
                <input class="w-full border border-gray border-1 px-2 py-1 rounded-[7px]" type="number" value="<?= $transaction["amount"] ?>" name="amount" id="amount" required>
            </div>
            <div>
                <label for="description" class="block capitalize">description</label>
                <textarea name="description" class="resize-none w-full border border-gray border-1 px-2 py-1 rounded-[7px]" value="<?= $transaction["description"] ?>" id="description"><?= $transaction["description"] ?></textarea>
            </div>
            <div>
                <label class="block capitalize" for="date">date</label>
                <input class="w-full border border-gray border-1 px-2 py-1 rounded-[7px]" type="date" id="date" name="date" value="<?= $transaction["date"] ?>">
            </div>

            <input type="hidden" name="id" value="<?= $transaction["id"] ?>">
            <input type="hidden" name="type" value="<?= $_POST["table"] ?>">


            <button type="submit" class="capitalize bg-green-500 text-white p-2 rounded">submit</button>
        </form>
    </body>
</html>