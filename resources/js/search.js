const search = document.querySelector("#search");
const searchResults = document.querySelector("#search-results");

search.addEventListener("input", () => {
    const val = search.value.trim();

    if (val.length < 2) {
        searchResults.classList.add("hidden");
        searchResults.innerHTML = "";
        return;
    }

    fetch(`/api/search?q=${encodeURIComponent(val)}`)
        .then(res => res.json())
        .then(data => {

            searchResults.innerHTML = "";

            if (data.events.length === 0 && data.categories.length === 0) {
                searchResults.classList.add("hidden");
                return;
            }

            searchResults.classList.remove("hidden");

            data.events.forEach(event => {
                searchResults.innerHTML += `
                    <a href="/event/${event.slug_en}">
                        <div class="p-2 border border-gray-200 rounded-lg mb-2 flex items-center gap-2 bg-gray-800 text-white">
                            <img class="h-[50px] w-[50px] object-cover rounded" src="/storage/${event.image}">
                            <span>${event.title_en}</span>
                        </div>
                    </a>
                `;
            });

            data.categories.forEach(category => {
                searchResults.innerHTML += `
                    <a href="/category/${category.slug_en}">
                        <div class="p-2 border border-gray-200 rounded-lg mb-2 bg-gray-800 text-white">
                            ${category.name_en}
                        </div>
                    </a>
                `;
            });

        })
        .catch(err => {
            console.error("Search error:", err);
        });
});
