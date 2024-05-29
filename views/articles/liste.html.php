

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="tailwind.config.js"></script>
</head>
</head>
<body>
    <div class=" flex content-center flex-col items-center  ml-64  overflow-hidden  m-5 w-3/4 h-auto pt-10">
        <div class="flex  content-between items-center flex-col  w-11/12 p-5 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
        <div class="flex flex-row  justify-between items-center w-full  p-2  border-b mb-3 border-gray-500">
            <div><h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Liste Article</h5></div>
            
            <a  href="<?=WEBROOT?>/?action=form-article" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Nouveau</a>
        </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg  w-full">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Libelle
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Qte Stock
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Prix
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Categorie
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Type
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($articles as $article) : ?>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4"><?=$article['libelle']; ?></td>
                                <td class="px-6 py-4"><?=$article['qteStock']; ?></td>
                                <td class="px-6 py-4"><?=$article['prixAppro']; ?></td>
                                <td class="px-6 py-4"><?=$article['nomCategorie']; ?></td>
                                <td class="px-6 py-4"><?=$article['nomType']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>


</body>
</html>