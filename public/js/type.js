document.addEventListener("DOMContentLoaded", async (event) => {
    const page = 1;
    await loadTypes(page);
});

async function loadTypes(page) {
    try {
        const response = await fetch(`http://localhost:8010/?controller=api-type&action=api-liste-type&page=${page}`);
        const data = await response.json();

        // Debugging statement
        console.log("Data fetched from API:", data);

        if (data.types && data.totalPages) {
            renderTypes(data.types);
            renderPagination(page, data.totalPages);
        } else {
            console.error("Invalid data structure:", data);
        }
    } catch (error) {
        console.error("Error fetching types:", error);
    }
}

function renderTypes(types) {
    const tableBody = document.querySelector("tbody");
    tableBody.innerHTML = ""; // Clear existing rows

    types.forEach(type => {
        const row = document.createElement("tr");
        row.classList.add("bg-white", "border-b", "dark:bg-gray-800", "dark:border-gray-700", "hover:bg-gray-50", "dark:hover:bg-gray-600");
        row.innerHTML = `
            <td class="px-6 py-4">${type.id}</td>
            <td class="px-6 py-4">${type.nomType}</td>
            <td class="px-4 py-3 text-xs">
                <a href="${WEBROOT}/?controller=type&action=updateType&id=${type.id}" class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full dark:bg-blue-700 dark:text-blue-100">Modifier</a>
                <a href="${WEBROOT}/?controller=type&action=deleteType&id=${type.id}" class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">Supprimer</a>
            </td>
        `;
        tableBody.appendChild(row);
    });
}

function renderPagination(currentPage, totalPages) {
    const paginationContainer = document.querySelector("nav[aria-label='Page navigation example'] ul");
    paginationContainer.innerHTML = ""; // Clear existing pagination

    if (currentPage > 1) {
        paginationContainer.innerHTML += `<li><a href="#" onclick="loadTypes(${currentPage - 1})" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a></li>`;
    } else {
        paginationContainer.innerHTML += `<li><span class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">Previous</span></li>`;
    }

    for (let i = 1; i <= totalPages; i++) {
        if (currentPage !== i) {
            paginationContainer.innerHTML += `<li><a href="#" onclick="loadTypes(${i})" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">${i}</a></li>`;
        } else {
            paginationContainer.innerHTML += `<li><a href="#" class="flex items-center justify-center px-4 h-10 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">${i}</a></li>`;
        }
    }

    if (currentPage < totalPages) {
        paginationContainer.innerHTML += `<li><a href="#" onclick="loadTypes(${currentPage + 1})" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a></li>`;
    } else {
        paginationContainer.innerHTML += `<li><span class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">Next</span></li>`;
    }
}
