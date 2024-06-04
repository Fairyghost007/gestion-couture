<div class=" flex justify-center flex-col  items-center  ml-64  overflow-hidden  m-5 w-3/4  self-center h-auto pt-10">
    <form class="w-3/4 mx-auto bg-gray-700 border border-gray-600  p-6 rounded-lg" action="<?= WEBROOT ?>" method="post">
        <div class="flex flex-row  justify-between items-center w-full  border-b mb-2 border-gray-500">
            <div>
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Form Article</h5>
            </div>
            <hr>
        </div>
        <div class="mb-5">
            <label for="libelle" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Libelle</label>
            <input type="libelle" name="libelle" id="libelle" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-300 dark:placeholder-gray-900 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        </div>
        <div class="mb-5">
            <label for="qteStock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">QteStock</label>
            <input type="qteStock" name="qteStock" id="qteStock" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-300 dark:placeholder-gray-900 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        </div>
        <div class="mb-5">
            <label for="prixAppro" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">prixAppro</label>
            <input type="int" name="prixAppro" id="prixAppro" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-300 dark:placeholder-gray-900 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        </div>
        <div class="mb-5">
            <label for="categorieId" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categorie</label>
            <select id="categorieId" name="categorieId" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-300 dark:placeholder-gray-900 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500">

                <option>...</option>
                <?php foreach ($categories as $categorie) : ?>
                    <option value="<?= $categorie['id'] ?>"><?= $categorie['nomCategorie'] ?></option>
                <?php endforeach; ?>


            </select>
        </div>
        <div class="mb-5 ">
            <label for="typeId" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
            <select id="typeId" name="typeId" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-300 dark:placeholder-gray-900 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500">

                <option>...</option>
                <?php foreach ($types as $type) : ?>
                    <option value="<?= $type['id'] ?>"><?= $type['nomType'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>

            <input value="save-article" name="action" type="hidden">
            <input value="article" name="controller" type="hidden">
            <button type="submit" name="btnSave" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ADD</button>

        </div>

    </form>
</div>