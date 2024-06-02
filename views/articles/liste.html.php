<?php
require_once("../controllers/article.controller.php");
$articleController = new ArticleController();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="tailwind.config.js"></script>
    <link rel="stylesheet" href="<?= WEBROOT ?>/css/list.css">
</head>

<body>
    <div class=" flex justify-between flex-col items-center    right-0 w-full-64 ml-64  h-auto gap-4 pt-20 ">
        <div class="flex  content-between items-center flex-col  w-11/12 p-5 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
            <div class="flex flex-row  justify-between items-center w-full  p-2  border-b mb-3 border-gray-500">
                <div>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Liste Article</h5>
                </div>

                <a href="<?= WEBROOT ?>/?controller=article&action=form-article" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Nouveau</a>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg  w-full">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                id
                            </th>
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
                            <th scope="col" class="px-6 py-3">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($articles as $article) : ?>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4"><?= $article['id']; ?></td>
                                <td class="px-6 py-4"><?= $article['libelle']; ?></td>
                                <td class="px-6 py-4"><?= $article['qteStock']; ?></td>
                                <td class="px-6 py-4"><?= $article['prixAppro']; ?></td>
                                <td class="px-6 py-4"><?= $article['nomCategorie']; ?></td>
                                <td class="px-6 py-4"><?= $article['nomType']; ?></td>
                                <td class="px-4 py-3 text-xs ">
                                    <a href="<?= WEBROOT ?>/?action=update&id=<?= $article['id'] ?>" class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full dark:bg-blue-700 dark:text-blue-100">Modifier</a>
                                    <a href="<?= WEBROOT ?>/?action=delete&id=<?= $article['id'] ?>" class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">Supprimer</a>
                                </td>

                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
        <?php if ($articleController->numberofpageArticle() > 1) : ?>
            <div>
                <nav aria-label="Page navigation example">
                    <ul class="inline-flex -space-x-px text-base h-10">
                        <li>
                            <?php if ($page > 1) : ?>
                                <a href="<?= WEBROOT ?>/?controller=article&action=liste-article&page=<?= ($page - 1) ?>" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                            <?php else : ?>
                                <span class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">Previous</span>
                            <?php endif; ?>
                        </li>
                        <?php for ($i = 1; $i <= $articleController->numberofpageArticle(); $i++) : ?>
                            <?php if ($page != $i) : ?>
                                <li><a href="<?= WEBROOT ?>/?controller=article&action=liste-article&page=<?= $i ?>" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"><?= $i ?></a></li>
                            <?php else : ?>
                                <li><a href="<?= WEBROOT ?>/?controller=article&action=liste-article&page=<?= $i ?>" class="flex items-center justify-center px-4 h-10 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white"><?= $i ?></a></li>
                            <?php endif; ?>
                        <?php endfor; ?>
                        <li>
                            <?php if ($page < $articleController->numberofpageArticle()) : ?>
                                <a href="<?= WEBROOT ?>/?controller=article&action=liste-article&page=<?= ($page + 1) ?>" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                            <?php else : ?>
                                <span class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">Next</span>
                            <?php endif; ?>
                        </li>
                    </ul>
                </nav>
            </div>
        <?php endif; ?>


    </div>


</body>

</html>