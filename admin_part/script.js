function searchTable() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.querySelector(".table");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        tdFirstName = tr[i].getElementsByTagName("td")[3];
        tdLastName = tr[i].getElementsByTagName("td")[4];
        tdEmail = tr[i].getElementsByTagName("td")[5];

        if (tdFirstName || tdLastName || tdEmail) {
            txtValueFirstName = tdFirstName.textContent || tdFirstName.innerText;
            txtValueLastName = tdLastName.textContent || tdLastName.innerText;
            txtValueEmail = tdEmail.textContent || tdEmail.innerText;

            if (
                (filter && txtValueFirstName.toUpperCase().indexOf(filter) > -1) ||
                (filter && txtValueLastName.toUpperCase().indexOf(filter) > -1) ||
                (filter && txtValueEmail.toUpperCase().indexOf(filter) > -1)
            ) {
                tr[i].style.backgroundColor = "#A5DDE6";

                // Scroll to the first matched row
                tr[i].scrollIntoView({
                    behavior: 'smooth',
                    block: 'nearest',
                    inline: 'start'
                });
                
            } else {
                tr[i].style.backgroundColor = "";
            }
        }
    }
}