$(document).ready(function() {

  let table = $('#department').DataTable({
    "lengthMenu": [5, 20, 40, 60, 80, 100],
    "pageLength": 5,
    "lengthChange": false
    
  });
    
    var tableHeader = ["Name", "Email", "Age"];
    var tableData = [
      { name: "John Doe", email: "johndoe@example.com", age: 30 },
      { name: "Jane Smith", email: "janesmith@example.com", age: 28 },
      // More data objects...
    ];
  
    // Populate the table header
    var headerRow = $('#header-row');
    $.each(tableHeader, function(index, value) {
      headerRow.append('<th>' + value + '</th>');
    });
  
    // Populate the table body
    var tableBody = $('#table-body');
    $.each(tableData, function(index, data) {
      var row = $('<tr>');
      row.append('<td>' + data.name + '</td>');
      row.append('<td>' + data.email + '</td>');
      row.append('<td>' + data.age + '</td>');
      tableBody.append(row);
    });
  });
  