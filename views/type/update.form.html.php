<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Type</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="tailwind.config.js"></script>
    <link rel="stylesheet" href="<?=WEBROOT?>/css/list.css">
</head>
<body>
    <div class="flex justify-center flex-col items-center ml-64 overflow-hidden m-5 w-3/4 self-center h-auto pt-10">
        <form class="w-3/4 mx-auto bg-gray-700 border border-gray-600 p-6 rounded-lg" method="POST" action="<?=WEBROOT?>">
            <div class="flex flex-row justify-between items-center w-full border-b mb-2 border-gray-500">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Update Type</h5>
            </div>

            <div class="mb-5">
                <label for="nomType" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom Type:</label>
                <input type="text" id="nomType" name="nomType" value="<?= $type['nomType'] ?>" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-300 dark:placeholder-gray-900 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>

            <div>
                <input type="hidden" name="action" value="modifier-type">
                <input type="hidden" name="controller" value="type">
                <input type="hidden" name="id" value="<?= $type['id'] ?>">
                <button type="submit" name="btnUpdateType" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
            </div>
        </form>
    </div>
</body>
</html>
