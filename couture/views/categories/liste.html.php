

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="tailwind.config.js"></script>
    <link rel="stylesheet" href="<?=WEBROOT?>/css/list.css">
</head>
</head>
<body>
    <div class="flex justify-center flex-col items-center    right-0 w-full-64 ml-64  h-auto pt-20">
        <div class="flex  content-between items-center flex-col  w-11/12 p-5 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
        <div class="flex flex-row  justify-between items-center w-full  p-2  border-b mb-3 border-gray-500">
            <div><h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Liste Type</h5></div>
            
            <a  href="<?=WEBROOT?>/?controller=categorie&action=form-categorie" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Nouveau</a>
        </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg  w-full">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                id
                            </th>
                            <th scope="col" class="px-6 py-3">
                                nomType
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $categorie) : ?>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4"><?=$categorie['id']; ?></td>
                                <td class="px-6 py-4"><?=$categorie['nomCategorie']; ?></td>
                                <td class="px-4 py-3 text-xs ">
                                    <a href="<?= WEBROOT ?>/?controller=categorie&action=updateCategorie&id=<?= $categorie['id'] ?>" class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full dark:bg-blue-700 dark:text-blue-100">Modifier</a>
                                    <a href="<?= WEBROOT ?>/?controller=categorie&action=deleteCategorie&id=<?= $categorie['id'] ?>" class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">Supprimer</a>

                                </td>
                            </tr>
                            
                        <?php endforeach; ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</body>
</html>