<?php
$errors = [];
if (Session::getSession("errors")) {
    $errors = Session::getSession("errors");
}

?>
<!-- <div class=" flex justify-center flex-col  items-center  ml-64  overflow-hidden  m-5 w-3/4  self-center h-auto pt-10">
    <form class="w-3/4 mx-auto bg-gray-700 border border-gray-600  p-6 rounded-lg" action="<?= WEBROOT ?>" method="post">
        <div class="flex flex-row  justify-between items-center w-full  border-b mb-2 border-gray-500">
            <div>
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Form Connexion</h5>
            </div>
            <hr>
        </div>
        <div id="alert-2" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 <?= add_class_hidden('error_connexion'); ?>" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
                <?= $errors["error_connexion"] ?? "" ?>
            </div>
        </div>
        <div class="mb-5">
            <label for="login" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">login</label>
            <input type="text" name="login" id="login" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-300 dark:placeholder-gray-900 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500 <?= add_class_invalid('login'); ?>" />
            <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                <?= $errors["login"] ?? "" ?>
            </p>
        </div>
        <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">password</label>
            <input type="password" name="password" id="password" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-300 dark:placeholder-gray-900 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500 <?= add_class_invalid('password'); ?>" />
            <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                <?= $errors["password"] ?? "" ?>
            </p>
        </div>

        <div>
            <input value="connexion" name="action" type="hidden">
            <input value="security" name="controller" type="hidden">
            <button type="submit" name="btnConnexion" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Connexion</button>

        </div>

    </form>
</div> -->

<div class="bg-white dark:bg-gray-300 min-h-screen flex items-center">
    <div class="container px-6 py-36 mx-auto  bg-gray-50 dark:bg-gray-800 border border-gray-600  p-6 rounded-lg">
        <div class="lg:flex">
            <div class="lg:w-1/2">
                <svg class="  w-auto  h-14  rounded-lg" width="auto" height="auto" viewBox="0 0 3762 1050" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="3762" height="1050" fill="#4B5563" />
                    <path d="M887 396.491L854.247 421.619C836.176 398.077 814.475 380.282 789.162 368.123C763.84 355.99 736.036 349.923 705.731 349.923C672.598 349.923 641.922 357.886 613.695 373.767C585.468 389.675 563.569 411.029 548.05 437.837C532.514 464.637 524.746 494.789 524.746 528.284C524.746 578.885 542.119 621.109 576.855 654.992C611.574 688.833 655.389 705.774 708.266 705.774C766.453 705.774 815.096 683.007 854.247 637.482L887 662.317C866.3 688.66 840.452 709.023 809.492 723.422C778.54 737.805 743.959 745 705.731 745C633.068 745 575.777 720.846 533.799 672.468C498.588 631.657 481 582.375 481 524.622C481 463.844 502.295 412.709 544.938 371.234C587.58 329.759 640.974 309 705.179 309C743.959 309 778.963 316.678 810.19 332.008C841.443 347.338 867.05 368.83 887 396.491Z" fill="white" />
                    <path d="M1869 347.679V309H2190V347.679H2059.38V704H1999.62V347.679H1869Z" fill="white" />
                    <path d="M3100.16 671.734H3278.45V709H3063V310H3280V347.266H3100.16H3099.16V348.266V473.939V474.939H3100.16H3278.45V512.206H3100.16H3099.16V513.206V670.734V671.734H3100.16Z" fill="white" stroke="black" stroke-width="2" />
                    <path d="M2717.15 347.679V481.959L2798.48 482.482C2830 482.482 2853.28 479.969 2868.4 474.962C2883.51 469.971 2895.33 461.928 2903.79 450.935C2912.26 439.925 2916.49 427.616 2916.49 414.026C2916.49 400.774 2912.2 388.735 2903.63 377.894C2895.06 367.052 2883.78 359.33 2869.85 354.676C2855.96 350.006 2832.78 347.679 2800.43 347.679H2717.15ZM2670 309H2764.01C2816.43 309 2851.99 310.821 2870.55 314.395C2898.57 319.791 2921.39 331.324 2938.92 348.977C2956.48 366.58 2965.25 388.347 2965.25 414.144C2965.25 435.642 2959.2 454.56 2947.13 470.865C2935.05 487.186 2917.78 499.494 2895.29 507.824C2872.83 516.153 2841.81 520.419 2802.18 520.587L2972 704H2913.65L2743.83 520.587H2717.15V704H2670V309Z" fill="white" />
                    <path d="M1166.99 375.642H1093.83V419.373C1101.7 427.639 1114.3 440.995 1129.64 457.417V409.122H1166.99C1191.14 409.122 1209.25 422.701 1209.25 450.909C1209.25 471.634 1198.3 494.528 1164.92 495.275C1175.54 506.685 1186.64 518.618 1197.81 530.702C1220.65 534.182 1235.08 546.376 1236.92 572.861C1248.58 585.431 1259.87 597.626 1270.3 608.888C1272.58 599.871 1273.75 589.772 1273.75 578.472C1273.75 541.215 1256.76 515.251 1225.07 505.452C1239.02 491.162 1245.81 475 1245.81 450.909C1245.81 406.129 1218.66 375.642 1166.99 375.642Z" fill="white" />
                    <path d="M1233.04 605.872C1231.13 610.772 1228.5 615.113 1224.98 618.779C1216.31 627.905 1202.25 633.03 1180.69 633.03H1130.55V529.558H1150.42C1177.2 554.323 1206.3 581.182 1233.04 605.872ZM1003.79 397.321C1006.15 399.677 1008.59 401.921 1011.03 403.942C1011.93 404.726 1012.83 405.44 1013.73 406.148C1013.73 406.148 1013.77 406.186 1013.84 406.262C1013.88 406.262 1013.92 406.336 1014.03 406.336C1014.07 406.412 1014.14 406.447 1014.22 406.523C1016.62 408.618 1028.58 419.092 1053.29 439.218C1055.24 440.826 1057.16 442.509 1058.96 444.269C1065.07 450.142 1077.52 461.85 1093.94 477.151V667.297H1179.94C1211.21 667.297 1235.66 659.74 1251.79 643.467C1255.31 639.951 1258.39 635.986 1261.05 631.647C1273.99 643.579 1285.8 654.467 1295.82 663.669C1296.77 664.546 1297.68 665.373 1298.59 666.213C1297.59 666.993 1296.57 667.753 1295.52 668.491C1291.44 671.348 1286.98 673.991 1283.03 676.824C1262.4 689.257 1239.12 697.245 1215.41 701.476C1209.1 702.534 1202.15 702.8 1195.74 703.644C1191.63 703.671 1183.27 703.803 1177.94 703.776C1185.47 703.989 1195.37 704.65 1202.37 703.803C1236.81 702.19 1269.99 690.155 1298.04 670.79C1299.09 670.069 1300.1 669.284 1301.14 668.545C1302.1 669.423 1303.06 670.303 1303.99 671.151C1318.28 684.319 1327.39 692.734 1328.48 693.707C1327.51 692.661 1319.25 683.682 1306.17 669.541C1305.33 668.654 1304.45 667.706 1303.58 666.765C1304.59 666.02 1305.63 665.319 1306.63 664.55C1336.65 641.326 1359.93 609.371 1371.18 572.816L1373.3 566.467L1374.78 559.907C1379.27 542.793 1380.59 524.223 1380.38 506.607C1380.03 502.029 1379.16 490.894 1378.74 486.503C1377.94 482.165 1375.98 471.161 1375.1 466.638C1373.85 462.273 1370.75 451.4 1369.48 447.223C1367.01 441.217 1364.55 434.366 1361.98 428.467C1359.88 424.421 1354.79 414.21 1352.62 410.507C1342.3 393.023 1329.41 377.204 1314.64 363.265C1311.22 360.487 1302.6 352.524 1299.02 350.276C1216.84 288.194 1102.66 299.039 1028.73 363.423C1026.45 365.433 1024.19 367.469 1021.99 369.56C1021.33 370.17 1020.67 370.829 1020.03 371.464C1019.37 372.074 1018.76 372.682 1018.12 373.317C1015.34 376.093 1012.63 378.949 1010.01 381.94C1011.57 383.764 1013.22 385.51 1014.91 387.204C1015.89 388.181 1016.8 389.082 1017.67 389.849C1019.61 387.654 1021.59 385.51 1023.61 383.395C1024.51 382.441 1025.47 381.488 1026.39 380.564C1028.3 378.659 1030.27 376.754 1032.28 374.955C1033.42 373.871 1034.62 372.787 1035.81 371.756C1036.29 371.332 1036.76 370.909 1037.27 370.511C1046.6 362.417 1056.84 355.012 1068.03 348.398C1134.45 308.219 1224.3 308.906 1287.99 354.244C1291.01 356.468 1295.68 359.27 1298.39 361.864C1316.82 376.649 1332.97 394.663 1345.27 414.872C1347.5 418.417 1352.35 428.231 1354.47 431.934C1357.04 437.567 1359.46 444.154 1361.98 449.841C1363.33 453.889 1366.3 464.309 1367.62 468.435C1368.44 472.696 1370.65 483.356 1371.42 487.509C1371.92 491.821 1372.79 502.481 1373.27 506.87C1375.18 550.939 1362.4 593.369 1336.09 628.813C1330.69 635.479 1325.17 642.515 1318.91 648.441C1316.07 650.953 1312.49 655.318 1309.42 657.435L1304.09 661.799L1301.18 664.155C1300.35 663.242 1299.52 662.342 1298.67 661.388C1288.99 650.948 1277.44 638.491 1264.8 624.8C1255.73 615.037 1246.13 604.638 1236.19 593.939C1216.76 572.989 1196.17 550.807 1176.45 529.558C1165.46 517.738 1154.74 506.18 1144.57 495.33C1139.47 489.832 1134.49 484.482 1129.76 479.395C1115.7 464.356 1103.4 451.227 1093.94 441.201C1087.16 433.944 1081.79 428.333 1078.42 424.852C1076.66 423.058 1074.97 421.148 1073.39 419.166C1053.18 394.516 1042.72 382.62 1040.62 380.187C1040.54 380.114 1040.5 380.038 1040.47 380L1040.32 379.85C1040.24 379.776 1040.2 379.739 1040.2 379.739C1039.19 378.393 1038.07 377.083 1036.9 375.773C1034.21 378.205 1031.58 380.673 1029.03 383.219L1028.77 383.48C1030.04 384.864 1031.21 386.286 1032.29 387.631C1039.23 396.311 1042.64 403.831 1040.28 406.186C1037.92 408.542 1030.42 405.14 1021.68 398.22C1020.44 397.283 1019.24 396.273 1018 395.151C1016.09 393.541 1014.18 391.746 1012.27 389.84C1009.57 387.182 1007.13 384.489 1004.99 381.909C997.304 372.595 993.365 364.439 995.879 361.933C998.353 359.462 1006.34 363.205 1015.46 370.686C1018.19 367.955 1020.93 365.375 1023.74 362.831C1007.54 349.438 990.929 343.865 984.366 350.448C977.653 357.144 983.615 374.24 997.717 390.736C999.554 392.944 1001.62 395.151 1003.79 397.321Z" fill="white" />
                    <path d="M1044.76 701.024C954.227 625.415 941.161 493.33 1006.09 404.708C1004.45 403.228 1002.86 401.746 1001.35 400.237C1000.24 399.125 999.151 397.988 998.143 396.93C993.876 402.618 989.874 408.57 986.163 414.761C927.908 508.409 953.564 639.568 1038.51 708.429C1191.52 834.485 1425.05 725.996 1434.19 530.154C1419.62 720.042 1193.93 825.04 1044.76 701.024Z" fill="white" />
                    <path d="M1501 309H1581.68V551.05C1581.68 604.83 1611.64 632.855 1662.94 632.855C1714.79 632.855 1744.75 604.83 1744.75 551.05V309H1826V550.486C1826 653.585 1749.94 704 1661.78 704C1573.6 704 1501 653.585 1501 550.486V309Z" fill="white" />
                    <path d="M2255 309H2335.68V551.05C2335.68 604.83 2365.64 632.855 2416.94 632.855C2468.79 632.855 2498.75 604.83 2498.75 551.05V309H2580V550.486C2580 653.585 2503.94 704 2415.78 704C2327.6 704 2255 653.585 2255 550.486V309Z" fill="white" />
                </svg>

                <h1 class="mt-4 text-gray-600 dark:text-gray-300 md:text-lg">Welcome back</h1>

                <h1 class="mt-4 text-2xl font-medium text-gray-800 capitalize lg:text-3xl dark:text-white">
                    login to your account
                </h1>
            </div>

            <div class="mt-8 lg:w-1/2 lg:mt-0">
                <form class="w-full lg:max-w-xl" action="<?= WEBROOT ?>" method="post">
                    <div class="mb-5">
                        <label for="login" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">login</label>
                        <div class="relative flex items-center">
                            <span class="absolute">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-3 text-gray-300 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </span>

                            <input type="text"  name="login" id="login" class="bg-gray-700 py-3  px-11 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-300 dark:placeholder-gray-900 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500 <?= add_class_invalid('login'); ?>">
                        </div>
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            <?= $errors["login"] ?? "" ?>
                        </p>
                    </div>
                    <div class="mb-5">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">password</label>
                        <div class="relative flex items-center mt-4">
                            <span class="absolute">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-3 text-gray-300 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </span>
                            <input type="password" name="password" id="password" class="  py-3  px-11 bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-300 dark:placeholder-gray-900 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500 <?= add_class_invalid('password'); ?>">
                        </div>
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            <?= $errors["password"] ?? "" ?>
                        </p>
                    </div>

                    <div class="mt-8 md:flex md:items-center ">
                        <input value="connexion" name="action" type="hidden">
                        <input value="security" name="controller" type="hidden">
                        <button type="submit" name="btnConnexion" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Connexion</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php Session::removeSession("errors"); ?>