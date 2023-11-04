function export_data()
{
    var table = document.getElementById('table_resp');
    var rows = [];
    for(var i = 0, row; row = table.rows[i]; i++)
    {
        C1 = row.cells[0].innerText;
        C2 = row.cells[1].innerText;
        C3 = row.cells[2].innerText;
        C4 = row.cells[3].innerText;
        C5 = row.cells[4].innerText;
        C6 = row.cells[5].innerText;
        C7 = row.cells[6].innerText;
        rows.push([C1, C2, C3, C4, C5, C6, C7]);
    }
    csvContent = "data:text/csv;charset=utf-8,";
    rows.forEach(   function(rowArray)
                    {
                        row = rowArray.join(';');
                        csvContent += row + '\r\n';
                    }
                );
    var encodedUri = encodeURI(csvContent);
    var link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", "responsables.csv");
    document.body.appendChild(link);
    link.click();
}