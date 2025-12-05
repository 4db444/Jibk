<?php
    include "TransactionController.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
    <?php include "./components/header.php" ?>
    <div id="modal" class="fixed w-full h-full bg-black/50 top-0 left-0 flex justify-center items-center hidden">
        <form  action="./addTransaction.php" method="post" class="bg-white w-[400px] p-4 flex flex-col gap-3 rounded">
            <h1 class="text-center text-2xl text-green-600 font-semibold">Add Transaction</h1>
            <div>
                <label for="title" class="block capitalize">title</label>
                <input class="w-full border border-gray border-1 px-2 py-1 rounded-[7px]" type="text" name="title" id="title" required>
            </div>
            <div>
                <label for="amount" class="block capitalize">amount</label>
                <input class="w-full border border-gray border-1 px-2 py-1 rounded-[7px]" type="number" name="amount" id="amount" required>
            </div>
            <div>
                <label for="description" class="block capitalize">description</label>
                <textarea class="resize-none w-full border border-gray border-1 px-2 py-1 rounded-[7px]" name="description" id="description"></textarea>
            </div>
            <div>
                <label for="date" class="block capitalize">date</label>
                <input class="w-full border border-gray border-1 px-2 py-1 rounded-[7px]" type="date" id="date" name="date">
            </div>

            <div>
                <label class="block capitalize" for="type">type</label>
                <select class="w-full border border-gray border-1 px-2 py-1 rounded-[7px]" name="type" id="type" required>
                    <option value="" selected disabled>select a transaction type</option>
                    <option value="expenses">Expense</option>
                    <option value="incomes">Income</option>
                </select>
            </div>
            <button type="submit" class="bg-green-500 text-white p-2 rounded">submit</button>
        </form>
    </div>

    <div class="flex justify-between p-3">
        <h1 class="text-4xl">Transactions</h1>
        <button id="add-modal-btn" class="bg-green-600 text-white rounded p-3">Add Transaction</button>
    </div>

    <table border="1" class="mx-auto border-collapse border border-gray-400 w-full">
        <thead>
            <tr class="border-b border-blue-800 p-2 capitalize">
                <th class="text-start">title</th>
                <th class="text-start">amount</th>
                <th class="text-start">type</th>
                <th class="text-start">date</th>
                <th class="text-start">description</th>
                <th class="text-start">actions</th>
            </tr>
        </thead>
        <?php
            $query_res = TransactionController::ShowAllTransactions();

            echo "<tbody>";
            while ($row = $query_res->fetch(PDO::FETCH_ASSOC)){
                echo "
                <tr class=\"border-b border-blue-800\">
                    <td>
                        {$row["title"]} 
                    </td>
                    <td>
                        {$row["amount"]} 
                    </td>
                    <td> <span class=\"aspect-1/1 block w-[25px] h-[25px] border text-" . ($row["table"] == "expenses" ? "red" : "green") . "-600 border-" . ($row["table"] == "expenses" ? "red" : "green") . "-600 border-3 rounded-full flex justify-center items-center\">" .
                        ($row["table"] == "incomes" ? 
                        "<i class=\"fa-solid fa-arrow-down\"></i>"
                        :
                        "<i class=\"fa-solid fa-arrow-up\"></i>")
                        ."
                    </span></td>
                    <td>
                        {$row["date"]} 
                    </td>
                    <td>
                        {$row["description"]} 
                    </td>
                    <td class=\"flex gap-2 p-3\">
                        <form action='editTransaction.php' method='post'>
                            <input type='hidden' value='{$row['id']}' name='id'/>
                            <input type='hidden' value='{$row['table']}' name='table'/>
                            <button type='submit' class=\"text-white bg-yellow-500 p-2 rounded-[10px] capitalize\">update</button>
                        </form>

                        <form action='deleteTransaction.php' method='post'>
                            <input type='hidden' value='{$row['id']}' name='id'/>
                            <input type='hidden' value='{$row['table']}' name='table'/>
                            <button type='submit' class=\"text-white bg-red-500 p-2 rounded-[10px] capitalize\">delete</button>
                        </form>
                    </td>
                </tr>
                ";
            }
            echo "</tbody>";
        ?>
    </table>


    <script>
        let modal = document.getElementById("modal");
        document.getElementById("add-modal-btn").addEventListener("click", () => {
            modal.classList.toggle("hidden");
        });
        modal.addEventListener("click", e => {
            if(e.target.id === "modal"){
                modal.classList.add("hidden")
            }
        });
    </script>
</body>
</html>