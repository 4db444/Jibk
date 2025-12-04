<?php
    include "TransactionController.php";
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

    <h1>transactions</h1>

    <table border="1" class>
        <thead>
            <tr>
                <th>title</th>
                <th>amount</th>
                <th>type</th>
                <th>date</th>
                <th>description</th>
                <th>actions</th>
            </tr>
        </thead>
        <?php
            $query_res = TransactionController::ShowAllTransactions();

            echo "<tbody>";
            while ($row = $query_res->fetch(PDO::FETCH_ASSOC)){
                echo "
                <tr>
                    <td>
                        {$row["title"]} 
                    </td>
                    <td>
                        {$row["amount"]} 
                    </td>
                    <td>
                        {$row["table"]} 
                    </td>
                    <td>
                        {$row["date"]} 
                    </td>
                    <td>
                        {$row["description"]} 
                    </td>
                    <td>
                        <form action='editTransaction.php' method='post'>
                            <input type='hidden' value='{$row['id']}' name='id'/>
                            <input type='hidden' value='{$row['table']}' name='table'/>
                            <button type='submit'>update</button>
                        </form>

                        <form action='deleteTransaction.php' method='post'>
                            <input type='hidden' value='{$row['id']}' name='id'/>
                            <input type='hidden' value='{$row['table']}' name='table'/>
                            <button type='submit'>delete</button>
                        </form>
                    </td>
                </tr>
                ";
            }
            echo "</tbody>";
        ?>
    </table>
</body>
</html>