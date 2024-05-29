<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="tailwind.config.js"></script>
</head>
<body>
    

<nav class="bg-gray-50 dark:bg-gray-800  p-0  w-full-64 ml-64">
    <div class="flex  justify-between gap-4 items-center mx-auto max-w-screen-xl p-4 ">
        <!-- <div class=" w-1/5"></div> -->
        <!-- <div class="flex  justify-beltween gap-4 items-cente w-2/3"></div> -->
        <div class=" w-3/4"><input type="text" id="search-navbar" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search..."></div>
            
        <div class="flex items-center space-x-6 rtl:space-x-reverse">
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 float-end">Logout</button>
        </div>
        
    </div>
</nav>

</body>
</html>