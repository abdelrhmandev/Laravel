// const category = $('[data-kt-recipes-table-filter="category"]');
$(row).find('td:eq(5)').attr('data-order', data.created_at));



var searchTerm = paymentValue.toLowerCase(),
regex = '\\b' + searchTerm + '\\b';

datatable
.column(4).search(regex, true, false)
.column(5).search( $('#month').val() )
.draw();